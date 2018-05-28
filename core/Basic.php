<?php

namespace Botb {
    require_once('Params.php');
    require_once('Secure.php');

    abstract class Basic
    {
        protected $cdb;
        protected $param;
        protected $timeLine = array();

        function __construct()
        {
            global $db;
            $this->cdb = $db;
            if (isset($_SESSION['debug'])) {
                unset($_SESSION['debug']);
            }
        }

        protected function result($res, $root = false, $args = false)
        {
            global $_SESSION;
            if (!$res) {
                $r = (!$root || $root == 'children' || $root == 'data') ? array(
                    "success" => false,
                    "data" => array(),
                    "msg" => false
                ) : array(
                    "success" => false,
                    "data" => array(),
                    "msg" => $root
                );
            } else {
                if (!$root) {
                    $r = array(
                        "success" => true,
                        "data" => $res
                    );

                } elseif ($root == 'multi') {
                    $r['success'] = true;
                    foreach ($res as $k => $v) {
                        $r[$k] = $res[$k];
                    }
                } else {
                    $r = array(
                        "success" => true,
                        $root => $res
                    );
                }
            }
            if ($args !== false) {
                $r = $this->insArgs($r, $args);
            }
            if (isset ($_SESSION ['debug'])) {
                $r ['debuglog'] = $_SESSION ['debug'];
            }
            if (count($this->timeLine) > 0) {
                $r['timeline'] = $this->timeLine;
            }
            return $r;
        }

        private function insArgs($r, $args)
        {
            foreach ($args as $k => $v) {
                $r [$k] = $v;
            }
            return $r;
        }

        static function lZ($d)
        {
            if ($d < 10) {
                $d = '0' . $d;
            }
            return $d;
        }

        static function lZRange($d, $r)
        {
            return str_pad($d, $r, '0', STR_PAD_LEFT);
        }

        static function debugLog($var)
        {
            global $_SESSION;
            $_SESSION['debug'][] = $var;
        }

        protected function _makeSign($signstr)
        {
            return array(
                'md5' => md5($signstr),
                'sha' => sha1($signstr)
            );
        }

        public function translit($str)
        {
            $str = mb_strtoupper($str, 'UTF-8');
            $tr = array(
                "А" => "A",
                "Б" => "B",
                "В" => "B",
                "Г" => "G",
                "Д" => "D",
                "Е" => "E",
                "Ж" => "J",
                "З" => "Z",
                "И" => "I",
                "Й" => "Y",
                "К" => "K",
                "Л" => "L",
                "М" => "M",
                "Н" => "H",
                "О" => "O",
                "П" => "P",
                "Р" => "P",
                "С" => "C",
                "Т" => "T",
                "У" => "U",
                "Ф" => "F",
                "Х" => "H",
                "Ц" => "TS",
                "Ч" => "CH",
                "Ш" => "SH",
                "Щ" => "SCH",
                "Ъ" => "",
                "Ы" => "YI",
                "Ь" => "",
                "Э" => "E",
                "Ю" => "YU",
                "Я" => "YA"
            );
            return strtr($str, $tr);
        }

        protected function _getChildrens($parentId, $table, $out = array(), $child = false)
        {
            //if(count($out)==0) $out=array();
            if (!$child) {
                $out [] = $parentId;
            }
            $sql = "SELECT id FROM " . $table . " WHERE parentId=?";
            $rs = $this->cdb->select($sql, $parentId);
            if ($rs != NULL) {
                for ($i = 0; $i < count($rs); $i++) {
                    $out [] = $rs [$i] ['id'];
                    $childs = $this->_getChildrens($rs [$i] ['id'], $table, $out, true);
                    if (count($childs) > 0) {
                        $out = array_merge($out, $childs);
                    }
                }
            }
            return $out;
        }

        protected function array_search2d_by_field($needle, $haystack, $field)
        {
            foreach ($haystack as $index => $innerArray) {
                if (isset ($innerArray [$field]) && $innerArray [$field] === $needle) {
                    return ( int )$index;
                }
            }
            return false;
        }

        protected function getSEperiod($pdate)
        {
            global $config;
            $startDay = (isset($config ['startDay']))?$config['startDay']:1;
            $cda = date_parse($pdate); // текущая дата
            if ($startDay != 1) {
                $out [0] = date('Y-m-d', mktime(0, 0, 0, $cda ['month'] - 1, $startDay, $cda ['year'])); // Первый день
                $out [1] = date('Y-m-d', mktime(0, 0, 0, $cda ['month'], $startDay - 1, $cda ['year'])); // Последний день
            } else {
                $out [0] = date('Y-m-d', mktime(0, 0, 0, $cda ['month'], 1, $cda ['year'])); // Первый день
                $out [1] = date('Y-m-d', mktime(0, 0, 0, $cda ['month'] + 1, 0, $cda ['year'])); // Последний день
            }
            return $out;
        }

        protected function calcDiffKf($s, $e, $t1, $t2)
        {
            global $config;
            $endPr = strtotime('2015-10-31');
            $endG = strtotime('2015-05-31');
            $maxDayAdd = $config ['maxDayAdd'] * 86400;
            // Переводим даты в timestamp

            $st = strtotime($s);
            $et = strtotime($e);
            $sp = strtotime($t1);
            $ep = strtotime($t2) + 86399; // прибавляем к окончанию длинну 1 дня - 1 секунда
            // Производим выравнивание освоения
            /*$dse = $et - $st;
            if ($dse < 6480000) {
                $et = $et + $dse;
            } else {
                $et = $et + 6480000;
            }
            if ($et > $endPr) {
                $et = $endPr;
            } elseif ($et < $endPr && $et > $endG) {
                $et = $endPr;
            }*/

            // Проверяем что начало не больше конца
            if ($st > $et) return 0;
            // Если даты одинаковые прибавляем к окончанию длинну 1 дня - 1 секунда
            $et += 86399;
            if ($st == $et) {
                $pLength = 1;
            } else {
                $pLength = $et - $st;
            }
            if ($sp <= $st && $et <= $ep) {
                $diff = $et - $st;
            } elseif ($st <= $sp && $et <= $ep && $sp < $et) {
                $diff = $et - $sp;
            } elseif ($sp <= $st && $st < $ep && $ep <= $et) {
                $diff = $ep - $st;
            } elseif ($st < $sp && $ep < $et) {
                $diff = $ep - $sp;
            } else {
                $diff = 0;
            }
            $k = $diff / $pLength;
            return $k;
        }

        protected function calcCostInPeriod($costSum, $st, $et, $period)
        {
            $pd = $this->getSEperiod($period);
            $k = $this->calcDiffKf($st, $et, $pd [0], $pd [1]);
            return round($costSum * $k, 2);
        }

        protected function smail($data)
        {
            // Data
            // $data['to']- Mail adress //string or array
            // $data['cc'] - Copy mail adress //string or array
            // $data['bcc'] - Copy blank adress //string or array
            // $data['title'] - Subjct message
            // $data['message'] - Message
            global $config;
            // Для отправки HTML-письма должен быть установлен заголовок Content-type
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

            // Дополнительные заголовки
            // $headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
            $headers .= 'From: ' . $config ['nfmail'] . ' <' . $config ['fmail'] . '>' . "\r\n";
            if (isset ($data ['cc'])) {
                if (is_array($data ['cc'])) {
                    $cc = implode(',', $data ['cc']);
                } else {
                    $cc = $data ['cc'];
                }
                $headers .= 'Cc: ' . $cc . "\r\n";
            }
            if (isset ($data ['bcc'])) {
                if (is_array($data ['bcc'])) {
                    $bcc = implode(',', $data ['bcc']);
                } else {
                    $bcc = $data ['bcc'];
                }
                $headers .= 'Bcc: ' . $bcc . "\r\n";
            }
            mail($data ['to'], $data ['title'], $data ['message'], $headers);
        }

        public static function sendmail($data,$isHtml=false)
        {
            // Data
            // $data['to']- Mail adress //string or array
            // $data['cc'] - Copy mail adress //string or array
            // $data['bcc'] - Copy blank adress //string or array
            // $data['title'] - Subjct message
            // $data['message'] - Message
            global $config;
            $headers="";
            // Для отправки HTML-письма должен быть установлен заголовок Content-type
            if($isHtml) {
                $headers .= 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            }else{
                $headers .= 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
            }

            // Дополнительные заголовки
            // $headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
            $headers .= 'From: ' . $config ['nfmail'] . ' <' . $config ['fmail'] . '>' . "\r\n";
            if (isset ($data ['cc'])) {
                if (is_array($data ['cc'])) {
                    $cc = implode(',', $data ['cc']);
                } else {
                    $cc = $data ['cc'];
                }
                $headers .= 'Cc: ' . $cc . "\r\n";
            }
            if (isset ($data ['bcc'])) {
                if (is_array($data ['bcc'])) {
                    $bcc = implode(',', $data ['bcc']);
                } else {
                    $bcc = $data ['bcc'];
                }
                $headers .= 'Bcc: ' . $bcc . "\r\n";
            }
            mail($data ['to'], $data ['title'], $data ['message'], $headers);
        }

        static function setParamAsObj($param, $value) // Set param as object
        {
            $out = array();
            $out [$param] = $value;
            return ( object )$out;
        }

        static function convertMessageEncodingOfEMStructure($struct,$message){
            $charset=null;
            if(isset($struct->parameters)) {
                foreach ($struct->parameters as $s) {
                    if(isset($s->attribute) && $s->attribute == "charset"){
                        $message = iconv($s->value,'utf-8',$message);
                    }
                }
            }
            return $message;
        }

        protected function Data2Array($data)
        {
            $res = array();
            if (!is_array($data)) {
                $res [0] = ( array )$data;
            } else {
                for ($i = 0; $i < count($data); $i++) {
                    $res [$i] = ( array )$data [$i];
                }
            }
            return $res;
        }

        protected function forest2list($in, &$out, $child = 'children', $level = 0, $clearChild = false)
        {
            if (is_array($in)) {
                for ($i = 0; $i < count($in); $i++) {
                    $a = array();
                    foreach ($in [$i] as $k => $v) {
                        if ($k != 'expanded' && $k != 'leaf' && $k != $child) {
                            $a [$k] = $v;
                        }
                    }
                    $a ['level'] = $level;
                    $a ['hc'] = (isset ($in [$i] [$child]) && count($in [$i] [$child]) > 0) ? true : false;
                    $out [] = $a;
                    if (isset ($in [$i] [$child])) {
                        // $out=array_merge($out,
                        $this->forest2list($in [$i] [$child], $out, $child, $level + 1, $clearChild);
                        if ($clearChild) unset($in [$i] [$child]);
                    }
                }
            }
            return $out;
        }

        // Метод создание модели данных
        protected function _makeModelData($st, $ed, $cxtype = '', $currentDate = null, $blockEdit = true, $cfg = array())
        {
            global $months, $config;
            // print_r($res);
            $stDateArray = date_parse($st);
            $enDateArray = date_parse($ed);

            if ($currentDate == null) {
                $currentDate = date('Y-m-d');
            }
            $currDarray = date_parse($currentDate);
            //print_r($currDarray);
            // print_r($stDateArray);
            $sm = $stDateArray ['month'];
            $sy = $stDateArray ['year'];

            $em = $enDateArray ['month'];
            $ey = $enDateArray ['year'];


            $resp = array();

            for ($i = $sm; $i <= 12; $i++) {

                $pd = date('Y-m-d', mktime(0, 0, 0, $i, $config['startDay'] - 1, $sy));
                $pda = date_parse($pd);
                $periods_columns = array();
                $periods_pfields ['name'] = 'p-' . $pda ['year'] . self::lZ($pda ['month']) . self::lZ($pda ['day']);
                //$periods_pfields ['critical'] = true;
                //$periods_pfields ['type'] = 'float';

                $periods_ppfields ['name'] = '_p-' . $pda ['year'] . self::lZ($pda ['month']) . self::lZ($pda ['day']);
                //$periods_ppfields ['critical'] = true;
                //$periods_ppfields ['type'] = 'float';

                $periods_fields ['name'] = 'fp-' . $pda ['year'] . self::lZ($pda ['month']) . self::lZ($pda ['day']);
                //$periods_fields ['type'] = 'float';

                $periods_dfields ['name'] = 'cp-' . $pda ['year'] . self::lZ($pda ['month']) . self::lZ($pda ['day']);
                //$periods_dfields ['type'] = 'string';

                $periods_columns ['xtype'] = ($cxtype == '') ? 'numbercolumn' : $cxtype;
                if ($cxtype == '') {
                    $periods_columns ['format'] = '0,000.##';

                }

                // $periods_columns['xtype']='numbercolumn';
                $periods_columns ['dataIndex'] = 'p-' . $pda ['year'] . self::lZ($pda ['month']) . self::lZ($pda ['day']);
                $periods_columns ['text'] = $months [$pda ['month']] . ' ' . $pda ['year'];

                $periods_columns ['width'] = (isset($cfg['width'])) ? $cfg['width'] : 95;
                //$periods_columns ['ignoreExport'] = false;
                $periods_columns ['align'] = 'right';
                //$periods_columns ['cellWrap'] = true;
                if ($blockEdit) {
                    if (mktime(0, 0, 0, $i, 1, $sy) < mktime(0, 0, 0, $currDarray['month'] - 1, 1, $currDarray['year'])) {
                        $periods_columns ['tdCls'] = 'lastplain-col';
                    } else {
                        $periods_columns ['editor'] = array('xtype' => 'textfield', 'selectOnFocus' => 'true');
                    }
                } else {
                    $periods_columns ['editor'] = array('xtype' => 'textfield', 'selectOnFocus' => 'true');
                }
                if (isset($cfg['hideLastp'])) {
                    if (mktime(0, 0, 0, $i, 1, $sy) < mktime(0, 0, 0, $currDarray['month'] - 1, 1, $currDarray['year'])) $periods_columns ['hidden'] = $cfg['hideLastp'];
                }
                $periods_dbfields ['akey'] = 'p-' . $pda ['year'] . self::lZ($pda ['month']) . self::lZ($pda ['day']);
                $periods_dbfields ['val'] = $pd;

                $bperiods_dbfields ['akey'] = '_p-' . $pda ['year'] . self::lZ($pda ['month']) . self::lZ($pda ['day']);
                $bperiods_dbfields ['val'] = $pd;

                $fperiods_dbfields ['akey'] = 'fp-' . $pda ['year'] . self::lZ($pda ['month']) . self::lZ($pda ['day']);
                $fperiods_dbfields ['val'] = $pd;

                $resp ['meta'] ['metaData'] ['tfields'] [] = $periods_pfields;
                $resp ['meta'] ['metaData'] ['tfields'] [] = $periods_fields;
                $resp ['meta'] ['metaData'] ['tfields'] [] = $periods_ppfields;
                $resp ['meta'] ['metaData'] ['tfields'] [] = $periods_dfields;
                $resp ['meta'] ['metaData'] ['columns'] [] = $periods_columns;
                $resp ['pdbfields'] [] = $periods_dbfields;
                $resp ['fdbfields'] [] = $fperiods_dbfields;
                $resp ['bdbfields'] [] = $bperiods_dbfields;

                if ($i == 12 && $sy != $ey && $sy < $ey) {
                    $i = 0;
                    $sy++;
                } elseif (($i == 12 && $sy == $ey) || ($i == $em && $sy == $ey)) {
                    break;
                }
            }
            // echo '<pre>';
            // print_r($resp);
            // echo '</pre>';
            return $resp;
        }

        protected function _applyModel($rec, $model)
        {
            // Создаем элементы массива
            foreach ($model as $m) {
                if (!isset($rec [$m ['akey']])) $rec [$m ['akey']] = 0;
                if (!isset($rec ['f' . $m ['akey']])) $rec ['f' . $m ['akey']] = 0;
                if (!isset($rec ['_' . $m ['akey']])) $rec ['_' . $m ['akey']] = 0;
                if (!isset($rec ['c' . $m ['akey']])) $rec ['c' . $m ['akey']] = '';
            }
            return $rec;
        }

        protected function _summModel(&$rec, $model, $chRecs, &$tp = 0, &$ftp = 0, &$tp_ = 0)
        {
            foreach ($chRecs as $r) {
                foreach ($model as $m) {
                    if (isset($r[$m['akey']])) {
                        $rec [$m ['akey']] += $r[$m ['akey']];
                        $rec ['f' . $m ['akey']] += $r['f' . $m ['akey']];
                        $rec ['_' . $m ['akey']] += $r['_' . $m ['akey']];

                        $tp += $r[$m ['akey']];
                        $ftp += $r['f' . $m ['akey']];
                        $tp_ += $r['_' . $m ['akey']];
                    }
                }
            }
        }

        protected function _summModelDetails($rec, $cc, $model, $chRecords, $criteria)
        {
            //$cc=array('BWC','MTC','MTB','EQC','EQB','OTB');
            $out = array();
            //Применяем модель деталей к записи
            foreach ($cc['cc'] as $c) {
                $r = array();
                $r['id'] = $rec['id'] . '-' . $c;
                $r['dId'] = $rec['id'];
                $r['costCat'] = $c;
                $r['artId'] = $cc['ids'][$c]['artId'];
                $r = $this->_applyModel($r, $model);
                foreach ($chRecords as $chRecs) {
                    foreach ($chRecs['detail'] as $cr) {
                        if ($r[$criteria] == $cr[$criteria]) {
                            foreach ($model as $m) {
                                if (isset($r[$m['akey']])) {
                                    $r [$m ['akey']] += $cr[$m ['akey']];
                                    $r ['f' . $m ['akey']] += $cr['f' . $m ['akey']];
                                    $r ['_' . $m ['akey']] += $cr['_' . $m ['akey']];
                                }
                            }
                        }
                    }
                }
                $out[] = $r;
            }
            return $out;
        }

        protected function _extractDetails($in, &$out)
        {
            for ($i = 0; $i < count($in); $i++) {

                if (isset($in[$i]['detail'])) {
                    //$out=array_merge($out, $i['detail']);
                    for ($j = 0; $j < count($in[$i]['detail'][$j]); $j++) $out[] = $in[$i]['detail'][$j];
                    $in[$i]['detail'] = null;
                    unset($in[$i]['detail']);
                }
                if (isset($in[$i]['children'])) {
                    $in[$i]['children'] = $this->_extractDetails($in[$i]['children'], $out);
                }
                /*
                if(isset($in[$i]['detail'])){
                    $out=array_merge($out, $in[$i]['detail']);
                    unset($in[$i]['detail']);
                }
                if(isset($in[$i]['children'])) {
                    //if(count($in[$i]['children'])>0) {
                        $this->_extractDetails($in[$i]['children'], $out);
                    //}else{
                    //    unset($in[$i]);
                    //}
                }
                */
            }
            return $in;
        }

        protected function _compressDataRecord($cr, $model)
        {
            foreach ($model as $m) {
                if (isset($cr[$m['akey']]) && $cr[$m['akey']] == 0) {
                    unset($cr[$m['akey']]);
                }
                if (isset($cr['f' . $m['akey']]) && $cr['f' . $m['akey']] == 0) {
                    unset($cr['f' . $m['akey']]);
                }
                if (isset($cr['_' . $m['akey']]) && $cr['_' . $m['akey']] == 0) {
                    unset($cr['_' . $m['akey']]);
                }
            }
            return $cr;
        }

        protected function _makeIfQuery($dbf, $table_column_sum, $table_column_date)
        {
            $out = "";

            for ($i = 0; $i < count($dbf); $i++) {
                $dbw = $this->getSEperiod($dbf [$i] ['val']);
                if ($i != 0) {
                    $out = $out . " ,";
                }
                $out = $out . " SUM(IF(" . $table_column_date . " BETWEEN '" . $dbw [0] . "' AND '" . $dbw [1] . "'," . $table_column_sum . ",0)) AS `" . $dbf [$i] ['akey'] . "`";
            }
            // echo $out;
            return $out;
        }

        protected function right_letter($str)
        {
            $array = $arrReplace = array(
                'q' => 'й',
                'w' => 'ц',
                'e' => 'у',
                'r' => 'к',
                't' => 'е',
                'y' => 'н',
                'u' => 'г',
                'i' => 'ш',
                'o' => 'щ',
                'p' => 'з',
                '[' => 'х',
                ']' => 'ъ',
                'a' => 'ф',
                's' => 'ы',
                'd' => 'в',
                'f' => 'а',
                'g' => 'п',
                'h' => 'р',
                'j' => 'о',
                'k' => 'л',
                'l' => 'д',
                ';' => 'ж',
                "'" => 'э',
                'z' => 'я',
                'x' => 'ч',
                'c' => 'с',
                'v' => 'м',
                'b' => 'и',
                'n' => 'т',
                'm' => 'ь',
                ',' => 'б',
                '.' => 'ю',
                '/' => '.',
                '`' => 'ё',
                'Q' => 'Й',
                'W' => 'Ц',
                'E' => 'У',
                'R' => 'К',
                'T' => 'Е',
                'Y' => 'Н',
                'U' => 'Г',
                'I' => 'Ш',
                'O' => 'Щ',
                'P' => 'З',
                '{' => 'Х',
                '}' => 'Ъ',
                'A' => 'Ф',
                'S' => 'Ы',
                'D' => 'В',
                'F' => 'А',
                'G' => 'П',
                'H' => 'Р',
                'J' => 'О',
                'K' => 'Л',
                'L' => 'Д',
                ':' => 'Ж',
                '"' => 'Э',
                '|' => '/',
                'Z' => 'Я',
                'X' => 'Ч',
                'C' => 'С',
                'V' => 'М',
                'B' => 'И',
                'N' => 'Т',
                'M' => 'Ь',
                '<' => 'Б',
                '>' => 'Ю',
                '?' => ',',
                '~' => 'Ё',
                '@' => '"',
                '#' => '№',
                '$' => ';',
                '^' => ':',
                '&' => '?'
            );
            $right_letter = strtr($str, $array);
            return $right_letter;
        }

        protected function orfFilter($string)
        {
            /* Кол-во попадений не правильных слов в строке чтобы считать что строка написана в не правильной раскладке */
            $countErrorWords = 1;
            /* счетчик не правильных слов */
            $countError = 0;
            /* При попадении таких слов, считать что выбрана не правильная раскладка клавиатуры */
            $errorWords = array(
                'b',
                'd',
                'yt',
                'jy',
                'yf',
                'z',
                'xnj',
                'c',
                'cj',
                'njn',
                ',snm',
                'f',
                'dtcm',
                "'nj",
                'rfr',
                'jyf',
                'gj',
                'yj',
                'jyb',
                'r',
                'e',
                'ns',
                'bp',
                'pf',
                'ds',
                'nfr',
                ';t',
                'jn',
                'crfpfnm',
                "'njn",
                'rjnjhsq',
                'vjxm',
                'xtkjdtr',
                'j',
                'jlby',
                'tot',
                ',s',
                'nfrjq',
                'njkmrj',
                'ct,z',
                'cdjt',
                'rfrjq',
                'rjulf',
                'e;t',
                'lkz',
                'djn',
                'rnj',
                'lf',
                'ujdjhbnm',
                'ujl',
                'pyfnm',
                'vjq',
                'lj',
                'bkb',
                'tckb',
                'dhtvz',
                'herf',
                'ytn',
                'cfvsq',
                'yb',
                'cnfnm',
                ',jkmijq',
                'lf;t',
                'lheujq',
                'yfi',
                'cdjq',
                'ye',
                'gjl',
                'ult',
                'ltkj',
                'tcnm',
                'cfv',
                'hfp',
                'xnj,s',
                'ldf',
                'nfv',
                'xtv',
                'ukfp',
                ';bpym',
                'gthdsq',
                'ltym',
                'nenf',
                'ybxnj',
                'gjnjv',
                'jxtym',
                '[jntnm',
                'kb',
                'ghb',
                'ujkjdf',
                'yflj',
                ',tp',
                'dbltnm',
                'blnb',
                'ntgthm',
                'nj;t',
                'cnjznm',
                'lheu',
                'ljv',
                'ctqxfc',
                'vj;yj',
                'gjckt',
                'ckjdj',
                'pltcm',
                'levfnm',
                'vtcnj',
                'cghjcbnm',
                'xthtp',
                'kbwj',
                'njulf',
                'dtlm',
                '[jhjibq',
                'rf;lsq',
                'yjdsq',
                ';bnm',
                'ljk;ys',
                'cvjnhtnm',
                'gjxtve',
                'gjnjve',
                'cnjhjyf',
                'ghjcnj',
                'yjuf',
                'cbltnm',
                'gjyznm',
                'bvtnm',
                'rjytxysq',
                'ltkfnm',
                'dlheu',
                'yfl',
                'dpznm',
                'ybrnj',
                'cltkfnm',
                'ldthm',
                'gthtl',
                'ye;ysq',
                'gjybvfnm',
                'rfpfnmcz',
                'hf,jnf',
                'nhb',
                'dfi',
                'e;',
                'ptvkz',
                'rjytw',
                'ytcrjkmrj',
                'xfc',
                'ujkjc',
                'ujhjl',
                'gjcktlybq',
                'gjrf',
                '[jhjij',
                'ghbdtn',
                'pljhjdj',
                'pljhjdf',
                'ntcn',
                'yjdjq',
                'jr',
                'tuj',
                'rjt',
                'kb,j',
                'xnjkb',
                'ndj.',
                'ndjz',
                'nen',
                'zcyj',
                'gjyznyj',
                'x`',
                'xt'
            );
            /* Символы которые нужно исключить из строки */
            $delChar = array(
                '!' => '',
                '&' => '',
                '?' => '',
                '/' => ''
            );
            /* Исключения */
            $expectWord = array(
                '.ьу' => '/me'
            );
            /* Символы для замены на русские */
            $arrReplace = array(
                'q' => 'й',
                'w' => 'ц',
                'e' => 'у',
                'r' => 'к',
                't' => 'е',
                'y' => 'н',
                'u' => 'г',
                'i' => 'ш',
                'o' => 'щ',
                'p' => 'з',
                '[' => 'х',
                ']' => 'ъ',
                'a' => 'ф',
                's' => 'ы',
                'd' => 'в',
                'f' => 'а',
                'g' => 'п',
                'h' => 'р',
                'j' => 'о',
                'k' => 'л',
                'l' => 'д',
                ';' => 'ж',
                "'" => 'э',
                'z' => 'я',
                'x' => 'ч',
                'c' => 'с',
                'v' => 'м',
                'b' => 'и',
                'n' => 'т',
                'm' => 'ь',
                ',' => 'б',
                '.' => 'ю',
                '/' => '.',
                '`' => 'ё',
                'Q' => 'Й',
                'W' => 'Ц',
                'E' => 'У',
                'R' => 'К',
                'T' => 'Е',
                'Y' => 'Н',
                'U' => 'Г',
                'I' => 'Ш',
                'O' => 'Щ',
                'P' => 'З',
                '{' => 'Х',
                '}' => 'Ъ',
                'A' => 'Ф',
                'S' => 'Ы',
                'D' => 'В',
                'F' => 'А',
                'G' => 'П',
                'H' => 'Р',
                'J' => 'О',
                'K' => 'Л',
                'L' => 'Д',
                ':' => 'Ж',
                '"' => 'Э',
                '|' => '/',
                'Z' => 'Я',
                'X' => 'Ч',
                'C' => 'С',
                'V' => 'М',
                'B' => 'И',
                'N' => 'Т',
                'M' => 'Ь',
                '<' => 'Б',
                '>' => 'Ю',
                '?' => ',',
                '~' => 'Ё',
                '@' => '"',
                '#' => '№',
                '$' => ';',
                '^' => ':',
                '&' => '?'
            );
            /* Меняем ключ со значением в массиве $arrReplace */
            $arrReplace2 = array_flip($arrReplace);
            /* Удаляем некоторые символы */
            unset ($arrReplace2 ['.']);
            unset ($arrReplace2 [',']);
            unset ($arrReplace2 [';']);
            unset ($arrReplace2 ['"']);
            unset ($arrReplace2 ['?']);
            unset ($arrReplace2 ['/']);
            /* И соединяем массивы в один */
            $arrReplace = array_merge($arrReplace, $arrReplace2);
            /* Переводим в нижний регистр, удаляем пробелы с начала и конца, разбиваем предложение на слова */
            $string2 = strtr(trim(strtolower($string)), $delChar);
            $arrString = explode(" ", $string2);
            /* Проверям есть ли неправильно написаные слова и считаем их кол-во */
            foreach ($arrString as $val) {
                if (array_search($val, $errorWords)) {
                    $countError++;
                }
            }
            return ($countError >= $countErrorWords) ? strtr(strtr($string, $arrReplace), $expectWord) : $string;
        }

        protected function SetAudit(&$data, $ts = null)
        {
            global $_SESSION;
            $data['lastUid'] = $_SESSION['userId'];
            $data['lastDate'] = (empty($ts)) ? date('Y-m-d H:i:s') : $ts;
        }

        static function setTaskProgress($task, $val, $msg)
        {
            $path = '/tmp/tasks' . $task . session_id();
            file_put_contents($path, serialize(array($val, $msg)));
        }

        static function endTaskProgress($task)
        {
            $path = '/tmp/tasks' . $task . session_id();
            @unlink($path);
        }

        protected function Transform2Tree($arr, $perfix = null)
        {
            $tree = new TreeBulder($arr, $perfix);
            return $tree->render();
        }

        //Управление хранилищем документов
        protected function newDocSt($projId, $docCat = 'list', $cntId, $docNum, $docDate, $docName, $resDate)
        {
            try {
                $ins = array();
                $ins['projId'] = $projId;
                $ins['docCat'] = $docCat;
                $ins['cntId'] = $cntId;
                $ins['docNum'] = $docNum;
                $ins['docDate'] = ($docDate == '') ? date('Y-m-d') : $docDate;
                $ins['docName'] = $docName;
                $ins['resDate'] = ($resDate == '') ? date('Y-m-d') : $resDate;
                $this->SetAudit($ins);
                $docSql = "INSERT INTO str_documents (?#) VALUES(?a)";
                $docId = $this->cdb->query($docSql, array_keys($ins), array_values($ins));
                return $docId;
            } catch (baseException $e) {
                return 0;
            }
        }

        protected function updDocSt($id, $updData)
        {
            try {
                $this->SetAudit($updData);
                $docSql = "UPDATE str_documents SET ?a WHERE id=?";
                $this->cdb->query($docSql, $updData, $id);
                return true;
            } catch (baseException $e) {
                return false;
            }
        }

        protected function delDocSt($id)
        {
            $updData = array();
            $updData['delDate'] = date('Y-m-d H:i:s');
            return $this->updDocSt($id, $updData);
        }

        static function randomPin() {
            $alphabet = '1234567890';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 5; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass); //turn the array into a string
        }

        protected function addChain($userId,$chatId,$cmd,$action){

            $chain=array();
            $chain['userId']=$userId;
            $chain['chatId']=$chatId;
            $chain['cmd']=$cmd;
            $chain['action']=$action;
            if($this->cdb->selectCell("SELECT COUNT(*) FROM req_chains WHERE userId=? AND chatId=?",$userId,$chatId)>0){
                $this->cdb->query("UPDATE req_chains SET cmd=?, action=? WHERE userId=? AND chatId=?",$cmd,$action,$userId,$chatId);
            }else{
                $sql="INSERT INTO req_chains (?#) VALUES(?a)";
                $this->cdb->query($sql,array_keys($chain),array_values($chain));
            }
        }

        protected function delChain($userId,$chatId){
            $sql="DELETE FROM req_chains WHERE userId=? AND chatId=?";
            $this->cdb->query($sql,$userId,$chatId);
        }

        protected function makeKeyPair($req)
        {
            if(count($req)%2==1){
                $out=array();
                for($i=1;$i<count($req);$i+=2){
                    $out[$req[$i]]=$req[$i+1];
                }
                return $out;
            }else{
                return null;
            }
        }

        protected function makeIlKeyboard($data,$lquery,$cols=2)
        {
            $kbd=[];
            $r=array();
            $j=0;
            for($i=0;$i<count($data);$i++){
                $r[]=$data[$i];
                $j++;
                if($j==$cols){
                    $kbd[]=$r;
                    $r=array();
                    $j=0;
                }elseif($i==(count($data)-1) && $j!=2){
                    $kbd[]=$r;
                }
            }
            $kbd[]=[array('text'=>'<- назад','callback_data'=>$lquery),array('text'=>'вверх','callback_data'=>'/wstat')];
            return $kbd;
        }

        protected function getLastQuery($userId,$chatId){
            $sql="SELECT query FROM sts_history WHERE userId=? AND chatId=? ORDER BY qDate DESC LIMIT 2";
            $res=$this->cdb->selectCol($sql,$userId,$chatId);
            if(count($res)==2){
                return $res[1];
            }else{
                return $res[0];
            }
        }
    }
}
?>