<?php
/**
 * Created by PhpStorm.
 * User: skarp
 * Date: 22.02.2018
 * Time: 16:27
 */

namespace BotbLib\Languniq;

class IntentHandler
{
    private $cdb;
    private $originalPhrase;
    private $messageWords;
    private $lang;
    private $subject;
    private $scope;
    private $tconditions;
    private $metadata=array();
    private $tplPath;
    private $classesPath;
    private $dra;

    function __construct($inputText,$lang,$tplPath,$classesPath)
    {
        global $db;
        $this->cdb = $db;
        $this->tplPath = $tplPath;
        $this->classesPath = $classesPath;
        $this->lang = $lang;
        $phrase = mb_strtolower($inputText);
        $this->originalPhrase = $this->stringToDigits($phrase);
        $this->messageWords = explode(" ",trim($this->originalPhrase));

        $this->tconditions = $this->_getConditions();
        $this->scope = $this->_getScope();
        $this->subject = $this->_getSubject();
        $this->metadata = $this->_getMetaData();

        $drPath = $this->tplPath."/".mb_strtolower($this->lang)."/defaultresponses.json";
        $this->dra = json_decode(file_get_contents($drPath));
    }

    private function _getNs(){
        //global $_SERVER;
        $clp=str_replace('/','\\',realpath($this->classesPath));
        $dr=str_replace('/','\\',DOC_ROOT);
        return str_replace($dr,'',$clp);
    }

    static function print_data($data){
        if(is_array($data)){
            echo "<pre>";
            print_r($data);
            echo "</pre>";
        }else{
            echo $data."\n";
        }
        echo "*****************\n";
    }

    private function _getSubject(){
        //Определяем класс предмета запроса и ключевые выражения
        $asubjects = json_decode(file_get_contents($this->tplPath."/".mb_strtolower($this->lang)."/subject.json"),true);
        $m=array();
        foreach($asubjects as $asubject){
            $matches=array();
            preg_match_all($asubject['exp'],$this->originalPhrase,$matches);
            if(!empty($matches[0][0])){
                $m["class"]=$asubject['class'];
                if(count($matches)>1){
                    for ($i = 1; $i < count($matches); $i++) {
                        if ($matches[$i][0] != " " && $matches[$i][0] != ""){
                            $m['params'][]=trim($matches[$i][0]);

                        }
                    }
                }
                $m["pos"]=mb_strpos($this->originalPhrase,$matches[0][0]);
                return $m;
            }
        }
    }

    private function _makeLikeByWord($fieldName){
        $r="";
        for($i=0;$i<count($this->messageWords);$i++){
            $r .= (($i > 0)?" OR ":"")."`".$fieldName."` LIKE '%".$this->messageWords[$i]."%'";
        }
        return $r;
    }

    private function strpos_recursive($haystack, $needle, $offset = 0, &$results = array()) {
        $offset = mb_strpos($haystack, $needle, $offset);
        if($offset === false) {
            return $results;
        } else {
            $results[] = $offset;
            return $this->strpos_recursive($haystack, $needle, ($offset + 1), $results);
        }
    }

    private function _getKeyPhrase($keyWords){
        $search = explode(',',$keyWords);
        $founds=array();
        $mlenghth=0;
        for($i=0;$i<count($search);$i++){
            $found = $this->strpos_recursive($this->originalPhrase, $search[$i]);
            if($found){
                foreach($found as $pos) {
                    $len=mb_strlen($search[$i]);
                    if($mlenghth < $len) {
                        $mlenghth = $len;
                        $founds=array($search[$i],$pos);
                    }
                }
            }
        }
        return $founds;
    }



    private function _getScope(){
        $ascope = json_decode(file_get_contents($this->tplPath."/".mb_strtolower($this->lang)."/scope.json"),true);
        $m=array();
        $len=0;
        foreach ($ascope as $tpl){
            $matches=array();
            $re=$tpl[1];
            preg_match_all($re,$this->originalPhrase,$matches);
            if(count($matches)>0){
                if(count($matches)>$len) {
                    if (!empty($matches[0][0]) && count($matches) > 1) {
                        $found = array();
                        $found['scope'] = $tpl[0];
                        $found['params'] = array();
                        for ($i = 1; $i < count($matches); $i++) {
                            if ($matches[$i][0] != " " && $matches[$i][0] != "") {
                                $found['params'][]=trim($matches[$i][0]);;
                            }
                        }
                        $found['pos'] = mb_strpos($this->originalPhrase, $matches[0][0]);
                        $m = $found;
                    }
                }
            }
        }
        return $m;
    }

    private function _getConditions(){
        $tcPath=$this->tplPath."/".mb_strtolower($this->lang)."/tcondition.json";
        $cns = json_decode(file_get_contents($tcPath), true);
        $m = array();
        foreach ($cns as $tpl) {
            $matches = array();
            $re = $tpl["exp"];
            preg_match_all($re, $this->originalPhrase, $matches);
            if (count($matches) > 0) {
                if (!empty($matches[0][0])) {
                    //echo "<pre>";
                    //print_r($matches);
                    //echo "</pre>";
                    $found = array();
                    $found["func"] = $tpl["func"];
                    if ($tpl["len"] > 0 && count($matches) > 1) {
                        $found['params'] = array();
                        for ($i = 1; $i < count($matches); $i++) {
                            if ($matches[$i][0] != " " && $matches[$i][0] != "") {
                                //$s['k']= explode(" ",trim($matches[$i][0]));
                                //$s['v'] = trim($matches[$i][0]);
                                $found['params'][]=trim($matches[$i][0]);
                            }
                        }
                    }
                    //echo $this->originalPhrase." :: ".print_r($matches[0]);
                    $found['pos'] = mb_strpos($this->originalPhrase, $matches[0][0]);
                    $m = $found;
                }
            }
        }
        return $m;
    }

    private function _getTinfoDisplay($tiPath){
        $tcPath=$this->tplPath."/".mb_strtolower($this->lang)."/tinfo.json";
        $cns = json_decode(file_get_contents($tcPath), true);
        foreach ($cns as $ti){
            $re=$ti['exp'];
            $matches=array();
            preg_match_all($re,$this->originalPhrase,$matches);
            if(!empty($matches[0][0])){

            }
        }
    }

    private function _getMetaData(){
        return array();
    }

    private function _compileQuery(){
        $queryObject = array();
        if(isset($this->subject['class'])&&isset($this->scope['scope'])) {
            $queryObject['class'] = $this->subject['class'];
            if ($this->subject['pos'] < $this->scope['pos']) {
                $queryObject['method'] = 'subjectOf' . $this->scope['scope'];
            } else {
                $queryObject['method'] = $this->scope['scope'].'OfSubject';
            }
        }elseif(isset($this->subject['class'])&&!isset($this->scope['scope'])) {
            $queryObject['class'] = $this->subject['class'];
            $queryObject['method'] = $this->subject['class'];
        }elseif(!isset($this->subject['class'])&&isset($this->scope['scope'])){
            $queryObject['class'] = null;
            $queryObject['method'] = $this->scope['scope'];
        }else{
            $queryObject['class']=null;
            $queryObject['method']=null;
        }
        $queryObject['params'][0]=(isset($this->tconditions['func']))?$this->tconditions['func']:null;
        $queryObject['params'][1]=(isset($this->tconditions['params']))?$this->tconditions['params']:null;
        $queryObject['params'][2]=(isset($this->scope['params']))?$this->scope['params']:null;
        $queryObject['params'][3]=$this->messageWords;
        return $queryObject;
    }

    private function _clearOfRegex($regex){
        $search = array('/','(',')','.','*');
        $rgSymv = trim(str_replace($search,' ',$regex));
        $rgAr = explode(' ',$rgSymv);
        $this->originalPhrase = trim(str_replace($rgAr,'',$this->originalPhrase));
        self::print_data($this->originalPhrase);
    }

    private function _makeIntentObject(){

    }


    public function response(){
        $query = $this->_compileQuery();
        //self::print_data($query);
        if(empty($query['class']) && empty($query['method'])){
            $this->_logNoResponse($query);
            return $this->dra->nocompetents;
        }elseif(!empty($query['class'])){
            $class=$this->_getClass($query['class']);
            if(!method_exists($class,$query['method'])){
                $this->_makeMethod($query['class'],$query['method']);
                $this->_logNoResponse($query);
                return $this->dra->notresponse;
            }else {
                $res = call_user_func_array(array(&$class, $query['method']), $query['params']);
                if($res=='NOTHINGSAY'){
                    return $this->dra->notresponse;
                }
                return $res;
            }
        }
    }

    private function _getClass($className){
        $ns=$this->_getNs();
        $ns=mb_substr($ns,1);
        //echo $ns;
        $class = $ns."\\".$className;
        if(!class_exists($class)){
            $cc = "<?php\nnamespace $ns;\n";
            $cc .= "class $className extends \\BotbLib\\Languniq\\BaseIntent{\n";
            $cc .= "\t\n";
            $cc .= "}";
            $classPath = $this->classesPath."/".$className.".php";
            if(!file_exists($classPath)){
                file_put_contents($classPath,$cc);
                chmod($classPath,0664);
            }
            require_once($classPath);
        }
        //echo $class;
        $cl = new $class();
        return $cl;
    }

    private function _logNoResponse($query){
        $sql="INSERT INTO req_noresponse (?#) VALUES (?a)";
        $i['pdate']=date('Y-m-d H:i:s');
        $i['message']=$this->originalPhrase;
        $i['lang']=$this->lang;
        $i['query']=serialize($query);
        $this->cdb->query($sql,array_keys($i),array_values($i));
    }

    private function _makeMethod($className,$mdName){
        $classPath = $this->classesPath."/".$className.".php";
        $classContent = file_get_contents($classPath);
        $classContent = preg_replace('/}$/','',$classContent);
        $classContent .= "\n\tpublic function $mdName(){\n\t\treturn 'NOTHINGSAY';\n\t}\n}";
        file_put_contents($classPath,$classContent);
    }

    private function stringToDigits($string){
        $tcPath=$this->tplPath."/".mb_strtolower($this->lang)."/digitsdic.json";
        if(!file_exists($tcPath)){
            echo "Not found dic";
        }
        $dic = json_decode(file_get_contents($tcPath), true);
        foreach($dic['decades'] as $dec){
            foreach($dic['units'] as $unit){
                if(empty($dec['str'])){
                    $nidle=$unit['str'];
                }else {
                    $nidle = $dec['str'] . " " . $unit['str'];
                }
                $sum = $dec['dig']+$unit['dig'];
                $string = str_replace($nidle,$sum,$string);
            }
        }
        return $string;
    }
}

