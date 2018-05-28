<?php
/**
 * Created by PhpStorm.
 * User: KarpSA
 * Date: 22.03.2017
 * Time: 9:48
 */
namespace modules\reports;

use modules\Shared;

class Mstat extends Shared {

    public function getWstat($data){

        $sql="SELECT pDate, DAY(pDate) AS rday,
                    SUM(pquant) AS wplan,
                    SUM(fquant) AS wfact
              FROM wpl_workplains
              GROUP BY DAY(pDate)";
        $tsql="SELECT pDate,
                    SUM(pQuant) AS wplan,
                    SUM(fQuant) AS wfact
              FROM wpl_workplains";
        $tres=$this->cdb->selectRow($tsql);
        $res=$this->cdb->select($sql);
        $out=array();
        $tplan=0;
        $tfact=0;
        $i=0;
        foreach($res as $r){
            $out[$i]['id']='p-'.$r['pDate'];
            $out[$i]['pdate']=date('d.m',strtotime($r['pDate']));
            $tplan+=$r['wplan'];
            $tfact+=$r['wfact'];
            $out[$i]['wplan']=round(($tplan/$tres['wplan'])*100,1);
            $out[$i]['wfact']=round(($tfact/$tres['wplan'])*100,1);
            $i++;
        }
        return $this->result($out);
    }

    public function getWprogressTree(){
        $res=array();
        $projectsNode=$this->_getProjectsTree();
        $cagentsNode=$this->_getCagentsTree();
        $res[]=array('id'=>'proj','text'=>'Проекты','children'=>$projectsNode);
        $res[]=array('id'=>'cagen','text'=>'Подрядчики','children'=>$cagentsNode);

        return $this->result($res,'children');
    }

    private function _getProjectsTree(){
        global $_SESSION;
        $UID=$_SESSION['userId'];
        if(isset($_SESSION['admUser']) && $_SESSION['admUser']===true){
            $res=$this->_getProjectsByParentId(0);
        }else{
            $res=$this->_getRootsProjectsTree($UID);
        }
        return $res;
    }

    private function _getProjectsByParentId($parentId){
        $sql="SELECT ap.id, ap.projName AS `text` FROM ast_projects ap WHERE ap.parentId=? AND ap.delDate IS NULL";
        $res=$this->cdb->select($sql,$parentId);
        if($res==null){
            return false;
        }
        foreach ($res as &$r)
        {
            $child=$this->_getProjectsByParentId($r['id']);
            if($child!==false){
                $r['children']=$child;
            }else{
                $child=$this->_getCagentsByProject($r['id']);
                if($child!=false){
                    $r['children']=$child;
                }else{
                    $r['leaf']=true;
                }
            }
            $r['id']='proj-'.$r['id'].'cagen-0';
        }
        return $res;
    }

    private function _getRootsProjectsTree($userId){
        $sql = "SELECT ap.id,  ap.projName AS `text`
                  FROM ast_projects ap, acl_groups_projects agp, acl_groups_users agu
                  WHERE agp.groupId = agu.groupId
                  AND agp.projId = ap.id
                  AND ap.delDate IS NULL
                  AND agu.userId = ?
                  AND ap.parentId NOT IN (SELECT ap1.id
                                          FROM ast_projects ap1, acl_groups_projects agp1, acl_groups_users agu1
                                          WHERE agp1.groupId = agu1.groupId
                                          AND agp1.projId = ap1.id
                                          AND agu1.userId = ?)";
        $res=$this->cdb->select($sql,$userId,$userId);
        if($res==null){
            return false;
        }
        foreach ($res as &$r)
        {
            $child=$this->_getProjectsByParentId($r['id']);
            if($child!==false){
                $r['children']=$child;
            }else{
                $child=$this->_getCagentsByProject($r['id']);
                if($child!=false){
                    $r['children']=$child;
                }else{
                    $r['leaf']=true;
                }
            }
            $r['id']='proj-'.$r['id'].'cagen-0';
        }
        return $res;
    }

    private function _getProjectsByUID(){
        global $_SESSION;
        $UID=$_SESSION['userId'];
        if(isset($_SESSION['admUser']) && $_SESSION['admUser']===true){
            $sql = "SELECT id FROM ast_projects";
            $res = $this->cdb->selectCol($sql);
        }else {
            $sql = "SELECT ap1.id
              FROM ast_projects ap1, acl_groups_projects agp1, acl_groups_users agu1
              WHERE agp1.groupId = agu1.groupId
              AND agp1.projId = ap1.id
              AND agu1.userId = ?";
            $res = $this->cdb->selectCol($sql, $UID);
        }
        return $res;
    }

    private function _getCagentsTree(){
        $projIds=$this->_getProjectsByUID();
        $sql="SELECT ast_cagents.id, CONCAT(ast_cagents.stateForm, ' ', ast_cagents.caName) AS `text`,
                CONCAT(ast_cagents.stateForm, ' ', ast_cagents.caFname) AS qtip
              FROM ast_cagents, oio_contracts, oio_orders
              WHERE ast_cagents.id = oio_contracts.caId
              AND oio_contracts.id = oio_orders.cntId
              AND oio_orders.projId IN (?a)";
        $res=$this->cdb->select($sql,$projIds);
        foreach ($res as &$re)
        {
            $child=$this->_getProjectsByCagent($re['id']);
            if($child!=null){
                $re['children']=$child;
            }
            $re['id']='cagen-'.$re['id'];
        }
        return $res;
    }

    private function _getProjectsByCagent($caId){
        $sql="SELECT ast_projects.id, ast_projects.projName AS `text`
              FROM ast_projects, oio_contracts, oio_orders
              WHERE ast_projects.id=oio_orders.projId
              AND oio_contracts.id=oio_orders.cntId
              AND oio_contracts.caId=?";
        $res=$this->cdb->select($sql,$caId);
        foreach ($res as &$r){
            $r['id']='cagen-'.$caId.'-proj-'.$r['id'];
            $r['leaf']=true;
        }
        return $res;
    }

    private function _getCagentsByProject($projId){
        $sql="SELECT ast_cagents.id, CONCAT(ast_cagents.stateForm, ' ', ast_cagents.caName) AS `text`,
                CONCAT(ast_cagents.stateForm, ' ', ast_cagents.caFname) AS qtip
              FROM ast_cagents, oio_contracts, oio_orders
              WHERE ast_cagents.id = oio_contracts.caId
              AND oio_contracts.id = oio_orders.cntId
              AND oio_orders.projId=?";
        $res=$this->cdb->select($sql,$projId);
        if($res==null) return false;
        foreach ($res as &$r){
            $r['id']='proj-'.$projId.'-cagen-'.$r['id'];
            $r['leaf']=true;
        }
        return $res;
    }

    public function getDashbordData()
    {
        $res=array();
        $p['id']='proj-2';
        $p['text']='Месторождение 1';
        $p['caption']='Месторождение 1';
        $p['msp']=31;
        $p['msf']=23;
        $p['pmp']=5521;
        $p['pmf']=3244;
        $p['dpc']=396;
        $p['tpcp']=47;
        $p['tpcf']=36;
        $p['dynw']=7;
        $p['dynp']=-12;
        $p['projType']='b';
        $p['imsrc']=$this->_getImageMPReport($p);
        //
        $c=array();
        $c['id']='proj-1';
        $c['text']='ПСП';
        $c['caption']='Приемо-сдаточный пункт';
        $c['msp']=45;
        $c['msf']=23;
        $c['pmp']=1521;
        $c['pmf']=1244;
        $c['dpc']=86;
        $c['tpcp']=47;
        $c['tpcf']=36;
        $c['dynw']=12;
        $c['dynp']=-19;
        $c['imsrc']=$this->_getImageMPReport($c);
        $c['leaf']=true;
        //
        $p['children'][]=$c;
        $c=array();
        $c['id']='proj-3';
        $c['text']='Энергообеспечение';
        $c['caption']='Проекты энергообеспечения';
        $c['msp']=47;
        $c['msf']=63;
        $c['pmp']=591;
        $c['pmf']=617;
        $c['dpc']=86;
        $c['tpcp']=36;
        $c['tpcf']=35;
        $c['dynw']=15;
        $c['dynp']=25;
        $c['imsrc']=$this->_getImageMPReport($c);

        $cc=array();
        $cc['id']='proj-4';
        $cc['text']='ГТЭС 48МВт';
        $cc['caption']='Газотурбинная электростанция 48МВт';
        $cc['msp']=47;
        $cc['msf']=63;
        $cc['pmp']=591;
        $cc['pmf']=617;
        $cc['dpc']=86;
        $cc['tpcp']=36;
        $cc['tpcf']=35;
        $cc['dynw']=15;
        $cc['dynp']=25;
        $cc['imsrc']=$this->_getImageMPReport($cc);
        $cc['leaf']=true;
        //
        $c['children'][]=$cc;


        $cc=array();
        $cc['id']='proj-5';
        $cc['text']='ВЛ 110кВ';
        $cc['caption']='ВЛ 110кВ';
        $cc['msp']=47;
        $cc['msf']=63;
        $cc['pmp']=591;
        $cc['pmf']=617;
        $cc['dpc']=86;
        $cc['tpcp']=36;
        $cc['tpcf']=35;
        $cc['dynw']=15;
        $cc['dynp']=25;
        $cc['imsrc']=$this->_getImageMPReport($cc);
        $cc['leaf']=true;
        //
        $c['children'][]=$cc;
        $p['children'][]=$c;
        //
        $c=array();
        $c['id']='proj-6';
        $c['text']='ЦПС';
        $c['caption']='Центральный пункт сбора';
        $c['msp']=45;
        $c['msf']=35;
        $c['pmp']=234;
        $c['pmf']=156;
        $c['dpc']=76;
        $c['tpcp']=78;
        $c['tpcf']=57;
        $c['dynw']=-15;
        $c['dynp']=20;
        $c['imsrc']=$this->_getImageMPReport($c);
        $c['leaf']=true;

        $p['children'][]=$c;

        $c=array();
        $c['id']='proj-7';
        $c['text']='Обустройство КП';
        $c['caption']='Обустройство кустовых площадок';
        $c['msp']=45;
        $c['msf']=35;
        $c['pmp']=234;
        $c['pmf']=156;
        $c['dpc']=76;
        $c['tpcp']=78;
        $c['tpcf']=57;
        $c['dynw']=-15;
        $c['dynp']=20;
        $c['imsrc']=$this->_getImageMPReport($c);

        $cc=array();
        $cc['id']='proj-9';
        $cc['text']='Куст 1';
        $cc['caption']='Куст 1';
        $cc['msp']=47;
        $cc['msf']=63;
        $cc['pmp']=591;
        $cc['pmf']=617;
        $cc['dpc']=86;
        $cc['tpcp']=36;
        $cc['tpcf']=35;
        $cc['dynw']=15;
        $cc['dynp']=25;
        $cc['imsrc']=$this->_getImageMPReport($cc);
        $cc['leaf']=true;
        //
        $c['children'][]=$cc;

        $cc=array();
        $cc['id']='proj-10';
        $cc['text']='Куст 2';
        $cc['caption']='Куст 2';
        $cc['msp']=47;
        $cc['msf']=63;
        $cc['pmp']=591;
        $cc['pmf']=617;
        $cc['dpc']=86;
        $cc['tpcp']=36;
        $cc['tpcf']=35;
        $cc['dynw']=15;
        $cc['dynp']=25;
        $cc['imsrc']=$this->_getImageMPReport($cc);
        $cc['leaf']=true;
        //
        $c['children'][]=$cc;

        $p['children'][]=$c;

        $c=array();
        $c['id']='proj-11';
        $c['text']='Обустройство инф-ры';
        $c['caption']='Обустройство инфраструктуры';
        $c['msp']=45;
        $c['msf']=35;
        $c['pmp']=234;
        $c['pmf']=156;
        $c['dpc']=76;
        $c['tpcp']=78;
        $c['tpcf']=57;
        $c['dynw']=-15;
        $c['dynp']=20;
        $c['imsrc']=$this->_getImageMPReport($c);
        $c['leaf']=true;
        $p['children'][]=$c;
        $res[]=$p;

        $p['id']='proj-8';
        $p['text']='Месторождение 2';
        $p['caption']='Месторождение 2';
        $p['msp']=65;
        $p['msf']=55;
        $p['pmp']=2521;
        $p['pmf']=2244;
        $p['dpc']=96;
        $p['tpcp']=85;
        $p['tpcf']=70;
        $p['dynw']=15;
        $p['dynp']=10;
        $p['projType']='b';
        $p['imsrc']=$this->_getImageMPReport($p);
        $p['children']=array();
        $res[]=$p;
        return $this->result($res,'children');
    }

    private function _getImageMPReport($data){
        /*
         * $data['msp'] - плановый процент выполнения МСГ
         * $data['msf'] - фактический процент выполнения МСГ
         * $data['pmp'] - плановая численность
         * $data['pmf'] - фактическая численность
         */
        //Готовим данные
        $mPlan = new pData();
        $mPlan->addPoints(array($data['msp'],(100-$data['msp'])),"MsgPlain");
        $mPlan->setSerieDescription("MsgPlain","план");
        $mPlan->addPoints(array("A1","A2"),"Labels");
        $mPlan->setAbscissa("Labels");
        $mPlan->loadPalette(__DIR__."/../lib/Pchart/palettes/default.color", true);

        $mdiff=($data['msp']!=0)?$data['msf']/$data['msp']*100:1;
        $mFact = new pData();
        $mFact->addPoints(array($data['msf'],(100-$data['msf'])),"MsgFact");
        $mFact->setSerieDescription("MsgFact","факт");
        $mFact->addPoints(array("B1","B2"),"Labels");
        $mFact->setAbscissa("Labels");
        $mFact->loadPalette($this->_getPalette($mdiff), true);

        $pdiff=($data['pmp']!=0)?$data['pmf']/$data['pmp']*100:1;
        if($pdiff > 100){
            $pd=array(100,0);
        }else{
            $pd=array($pdiff,(100-$pdiff));
        }
        $mobFact = new pData();
        $mobFact->addPoints($pd,"Mob");
        $mobFact->setSerieDescription("Mob","факт. численность");
        $mobFact->addPoints(array("FP","NP"),"Labels");
        $mobFact->setAbscissa("Labels");
        $mobFact->loadPalette($this->_getPalette($pdiff), true);

        //Создаем холст
        $mp = new pImage(460,180,$mPlan);
        //Вставляем текст
        $mp->setFontProperties(array("FontName"=>__DIR__."/../lib/Pchart/fonts/pfdindisplaypro-reg.ttf","FontSize"=>16));
        $mp->drawText(115,15,"Прогресс МСГ",array("R"=>80,"G"=>80,"B"=>80,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));
        $mp->drawText(345,15,"Людские ресурсы",array("R"=>80,"G"=>80,"B"=>80,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));

        $mp->drawText(115,80,$data['msp']."%",array("R"=>80,"G"=>80,"B"=>80,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));
        $mp->drawText(115,100,$data['msf']."%",array("R"=>80,"G"=>80,"B"=>80,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));

        $mp->drawText(345,80,number_format($data['pmp'], 0, ',', ' '),array("R"=>80,"G"=>80,"B"=>80,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));
        $mp->drawText(345,100,number_format($data['pmf'], 0, ',', ' '),array("R"=>80,"G"=>80,"B"=>80,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));

        $mp->drawLine(90,90,140,90);
        $mp->drawLine(315,90,380,90);

        //Создаем плановую диаграмму
        $mpChart = new pPie($mp,$mPlan);
        $cfg['ORadius']=48;
        $cfg['IRadius']=36;
        $cfg['Border']=true;
        $cfg['BorderR']=204;
        $cfg['BorderG']=204;
        $cfg['BorderB']=204;
        $cfg['Shadow']=false;
        $mpChart->draw2DRing(115,90,$cfg);
        $mp->drawLegend(55, 165, array("Style" => LEGEND_NOBORDER, "Mode" => LEGEND_HORIZONTAL, "FontSize" => 16));
        //Создаем фактическую диаграмму
        $mp->DataSet = $mFact;
        $mfChart = new pPie($mp,$mFact);
        $cfg['ORadius']=64;
        $cfg['IRadius']=52;
        $mfChart->draw2DRing(115,90,$cfg);
        $mp->drawLegend(120, 165, array("Style" => LEGEND_NOBORDER, "Mode" => LEGEND_HORIZONTAL, "FontSize" => 16));
        //Создаем диаграмму численности
        $mp->DataSet=$mobFact;
        $pcChart = new pPie($mp,$mobFact);
        $cfg['ORadius']=64;
        $cfg['IRadius']=52;
        $pcChart->draw2DRing(345,90,$cfg);
        $mp->drawLegend(255, 165, array("Style" => LEGEND_NOBORDER, "Mode" => LEGEND_HORIZONTAL, "FontSize" => 16));

        //Формируем вывод в base64
        ob_start();
        $mp->renderRaw();
        $imageData=ob_get_contents();
        ob_end_clean();
        $base64 = base64_encode($imageData);
        return $base64;
    }

    private function _getPalette($val){
        global $config;
        if($val < $config['reports']['ilow']){
            return __DIR__."/../lib/Pchart/palettes/grlow.color";
        }elseif($val >= $config['reports']['ilow'] && $val < $config['reports']['imid']){
            return __DIR__."/../lib/Pchart/palettes/grmid.color";
        }elseif($val >= $config['reports']['imid'] && $val < $config['reports']['inorm']){
            return __DIR__."/../lib/Pchart/palettes/grnorm.color";
        }elseif($val >= $config['reports']['inorm']){
            return __DIR__."/../lib/Pchart/palettes/grhigh.color";
        }else{
            return __DIR__."/../lib/Pchart/palettes/default.color";
        }
    }

    public function getWprogressReport($qstr,$rdate){

        $query=$this->_getQuery($qstr);
        if($query==null){
            $query=array('cagen'=>0,'proj'=>0);
        }elseif(!isset($query['proj'])){
            $query['proj']=0;
        }elseif(!isset($query['cagen'])){
            $query['cagen']=0;
        }
        $query['rdate']=$rdate;
        $projIds=$this->_getProjectsByUID();
        $chartData=$this->_getChartData($projIds,$query);
        $worksData=$this->_getWorksData($projIds,$query);
        $workersData=$this->_getWorkersData($projIds,$query);
        $adRes=array('works'=>$worksData,'workers'=>$workersData);
        return $this->result($chartData,'data',$adRes);
    }

    private function _getQuery($qstr){
        $qarr=explode('-',$qstr);
        $query=array();
        if(count($qarr)>1) {
            for ($i = 0; $i < count($qarr); $i = $i + 2) {
                $query[$qarr[$i]] = $qarr[$i + 1];
            }
        }else{
            return null;
        }
        return $query;
    }

    private function _getChartData($projIds,$query){
        $se=$this->getSEperiod($query['rdate'],1);
        //print_r($projIds);
        //Формируем данные по выполненным объемам работ и численности
        $sqlWT="SELECT SUM(owp_plworks.pquant * owp_plworks.lworks) AS twp
                FROM owp_plainsrev, owp_plworks
                WHERE owp_plainsrev.id = owp_plworks.owppId
                AND owp_plainsrev.isCurrent = 1
                AND owp_plainsrev.pdate = ?
                AND owp_plworks.pdate BETWEEN ? AND ?
                AND owp_plworks.pdate IS NOT NULL";

        $sqlW="SELECT owp_plworks.pdate, SUM(owp_plworks.pquant * owp_plworks.lworks) AS pwp, SUM(owp_plworks.fquant * owp_plworks.lworks) AS fwp
                FROM owp_plainsrev, owp_plworks
                WHERE owp_plainsrev.id = owp_plworks.owppId
                AND owp_plainsrev.isCurrent = 1
                AND owp_plainsrev.pdate = ?
                AND owp_plworks.pdate BETWEEN ? AND ?
                AND owp_plworks.pdate IS NOT NULL";

        $sqlR="SELECT owp_plresources.pdate AS ARRAY_KEY, SUM(owp_plresources.pCount) AS ppc, SUM(owp_plresources.fCount) AS fpc
                FROM owp_plainsrev, owp_plresources WHERE owp_plainsrev.id=owp_plresources.owppId
                AND owp_plainsrev.isCurrent=1
                AND owp_plainsrev.pdate = ?
                AND owp_plresources.resType='W'
                AND owp_plresources.pdate BETWEEN ? AND ?
                AND owp_plresources.pdate IS NOT NULL";

        if($query['cagen']==0 && $query['proj']==0){
            $sqlW=$sqlW." AND owp_plainsrev.projId IN (?a) GROUP BY owp_plworks.pdate";
            $wRes=$this->cdb->select($sqlW,$se[0],$se[0],$se[1],$projIds);

            $sqlWT=$sqlWT." AND owp_plainsrev.projId IN (?a)";
            $wTRes=$this->cdb->selectCell($sqlWT,$se[0],$se[0],$se[1],$projIds);

            $sqlR=$sqlR." AND owp_plainsrev.projId IN (?a) GROUP BY owp_plresources.pdate";
            $rRes=$this->cdb->select($sqlR,$se[0],$se[0],$se[1],$projIds);
        }elseif($query['cagen']!=0 && $query['proj']==0){
            $sqlW=$sqlW." AND owp_plainsrev.projId IN (?a) AND owp_plainsrev.caId=? GROUP BY owp_plworks.pdate";
            $wRes=$this->cdb->select($sqlW,$se[0],$se[0],$se[1],$projIds,$query['cagen']);

            $sqlWT=$sqlWT." AND owp_plainsrev.projId IN (?a) AND owp_plainsrev.caId=?";
            $wTRes=$this->cdb->selectCell($sqlWT,$se[0],$se[0],$se[1],$projIds,$query['cagen']);

            $sqlR=$sqlR." AND owp_plainsrev.projId IN (?a) AND owp_plainsrev.caId=? GROUP BY owp_plresources.pdate";
            $rRes=$this->cdb->select($sqlR,$se[0],$se[0],$se[1],$projIds,$query['cagen']);
        }elseif($query['cagen']==0 && $query['proj']!=0){
            $projs=$this->_getChildrens($query['proj'],'ast_projects');

            $sqlW=$sqlW." AND owp_plainsrev.projId IN(?a) GROUP BY owp_plworks.pdate";
            $wRes=$this->cdb->select($sqlW,$se[0],$se[0],$se[1],$projs);

            $sqlWT=$sqlWT." AND owp_plainsrev.projId IN(?a)";
            $wTRes=$this->cdb->selectCell($sqlWT,$se[0],$se[0],$se[1],$projs);

            $sqlR=$sqlR." AND owp_plainsrev.projId IN(?a) GROUP BY owp_plresources.pdate";
            $rRes=$this->cdb->select($sqlR,$se[0],$se[0],$se[1],$projs);
        }else{
            $projs=$this->_getChildrens($query['proj'],'ast_projects');

            $sqlW=$sqlW." AND owp_plainsrev.projId IN(?a) AND owp_plainsrev.caId=? GROUP BY owp_plworks.pdate";
            $wRes=$this->cdb->select($sqlW,$se[0],$se[0],$se[1],$projs,$query['cagen']);

            $sqlWT=$sqlWT." AND owp_plainsrev.projId IN(?a) AND owp_plainsrev.caId=?";
            $wTRes=$this->cdb->selectCell($sqlWT,$se[0],$se[0],$se[1],$projs,$query['cagen']);

            $sqlR=$sqlR." AND owp_plainsrev.projId IN(?a) AND owp_plainsrev.caId=? GROUP BY owp_plresources.pdate";
            $rRes=$this->cdb->select($sqlR,$se[0],$se[0],$se[1],$projs,$query['cagen']);
        }
        //Обрабатываем данные для вывода
        $out=array();
        $c=0;
        $cwp=0;
        $cwf=0;
        $cdate=strtotime($query['rdate']);
        foreach($wRes as $w)
        {
            $pDateArray=date_parse($w['pdate']);
            $rdate=strtotime($w['pdate']);
            $r=array();
            $r['id']=$c;
            $r['pdate']=self::lZ($pDateArray['day']).'.'.self::lZ($pDateArray['month']);
            $cwp+=$w['pwp'];
            $cwf+=$w['fwp'];
            $r['dtw']=round($w['pwp']/$wTRes*100);
            $r['dtf']=round($w['fwp']/$wTRes*100);
            //echo $cwp."\n";
            $r['pwp']=round($cwp/$wTRes*100,1);
            $r['fwp']=round($cwf/$wTRes*100,1);
            if(isset($rRes[$w['pdate']])){
                $r['ppc']=$rRes[$w['pdate']]['ppc'];
                $r['fpc']=$rRes[$w['pdate']]['fpc'];
            }else{
                $r['ppc']=null;
                $r['fpc']=null;
            }
            //echo $cdate;
            if($cdate < $rdate){
                $r['dtf']=null;
                $r['fwp']=null;
                $r['fpc']=null;
            }
            $out[]=$r;
            $c++;
        }

        return $out;
    }

    private function _getWorksData($projIds,$query){
        $se=$this->getSEperiod($query['rdate'],1);
        //print_r($projIds);
        //Формируем данные по выполненным объемам работ и численности
        $sqlWT="SELECT ast_worktypes.id AS ARRAY_KEY, SUM(owp_plworks.pquant * owp_plworks.lworks) AS twp
                FROM ast_worktypes, owp_plainsrev, owp_plworks
                WHERE owp_plainsrev.id = owp_plworks.owppId
                AND ast_worktypes.id=owp_plworks.wtId
                AND owp_plainsrev.isCurrent = 1
                AND owp_plainsrev.pdate = ?
                AND owp_plworks.pdate BETWEEN ? AND ?
                AND owp_plworks.pdate IS NOT NULL";

        $sqlW="SELECT ast_worktypes.id, ast_worktypes.vrName AS workType,
                  SUM(owp_plworks.pquant * owp_plworks.lworks) AS pwp,
                  SUM(owp_plworks.fquant * owp_plworks.lworks) AS fwp
                FROM ast_worktypes, owp_plainsrev, owp_plworks
                WHERE owp_plainsrev.id = owp_plworks.owppId
                AND ast_worktypes.id=owp_plworks.wtId
                AND owp_plainsrev.isCurrent = 1
                AND owp_plainsrev.pdate = ?
                AND owp_plworks.pdate BETWEEN ? AND ?
                AND owp_plworks.pdate IS NOT NULL";

        if($query['cagen']==0 && $query['proj']==0){
            $sqlW=$sqlW." AND owp_plainsrev.projId IN (?a) GROUP BY owp_plworks.wtId";
            $wRes=$this->cdb->select($sqlW,$se[0],$se[0],$query['rdate'],$projIds);

            $sqlWT=$sqlWT." AND owp_plainsrev.projId IN (?a) GROUP BY owp_plworks.wtId";
            $wTRes=$this->cdb->select($sqlWT,$se[0],$se[0],$se[1],$projIds);
        }elseif($query['cagen']!=0 && $query['proj']==0){
            $sqlW=$sqlW." AND owp_plainsrev.projId IN (?a) AND owp_plainsrev.caId=? GROUP BY owp_plworks.wtId";
            $wRes=$this->cdb->select($sqlW,$se[0],$se[0],$query['rdate'],$projIds,$query['cagen']);

            $sqlWT=$sqlWT." AND owp_plainsrev.projId IN (?a) AND owp_plainsrev.caId=? GROUP BY owp_plworks.wtId";
            $wTRes=$this->cdb->select($sqlWT,$se[0],$se[0],$se[1],$projIds,$query['cagen']);
        }elseif($query['cagen']==0 && $query['proj']!=0){
            $projs=$this->_getChildrens($query['proj'],'ast_projects');

            $sqlW=$sqlW." AND owp_plainsrev.projId IN (?a) GROUP BY owp_plworks.wtId";
            $wRes=$this->cdb->select($sqlW,$se[0],$se[0],$query['rdate'],$projs);

            $sqlWT=$sqlWT." AND owp_plainsrev.projId IN (?a) GROUP BY owp_plworks.wtId";
            $wTRes=$this->cdb->select($sqlWT,$se[0],$se[0],$se[1],$projs);
        }else{
            $projs=$this->_getChildrens($query['proj'],'ast_projects');

            $sqlW=$sqlW." AND owp_plainsrev.projId IN (?a) AND owp_plainsrev.caId=? GROUP BY owp_plworks.wtId";
            $wRes=$this->cdb->select($sqlW,$se[0],$se[0],$query['rdate'],$projs,$query['cagen']);

            $sqlWT=$sqlWT." AND owp_plainsrev.projId IN (?a) AND owp_plainsrev.caId=? GROUP BY owp_plworks.wtId";
            $wTRes=$this->cdb->select($sqlWT,$se[0],$se[0],$se[1],$projs,$query['cagen']);
        }
        //Обрабатываем данные для вывода
        $out=array();
        foreach($wRes as $w)
        {
            $r=array();
            $r['id']=$w['id'];
            $r['workType']=$w['workType'];
            if(isset($wTRes[$w['id']])) {
                $r['pwp'] = round(doubleval($w['pwp'] / $wTRes[$w['id']]['twp']), 2);
                $r['fwp'] = round(doubleval($w['fwp'] / $wTRes[$w['id']]['twp']), 2);
            }
            $out[]=$r;
        }
        return $out;
    }

    private function _getWorkersData($projIds,$query){
        $se=$this->getSEperiod($query['rdate'],1);

        $sqlR="SELECT owp_plresources.resName, SUM(owp_plresources.pCount) AS ppc, SUM(owp_plresources.fCount) AS fpc
                FROM owp_plainsrev, owp_plresources WHERE owp_plainsrev.id=owp_plresources.owppId
                AND owp_plainsrev.isCurrent=1
                AND owp_plainsrev.pdate = ?
                AND owp_plresources.resType='W'
                AND owp_plresources.pdate = ?";

        if($query['cagen']==0 && $query['proj']==0){
            $sqlR=$sqlR." AND owp_plainsrev.projId IN (?a) GROUP BY owp_plresources.resName";
            $rRes=$this->cdb->select($sqlR,$se[0],$query['rdate'],$projIds);
        }elseif($query['cagen']!=0 && $query['proj']==0){
            $sqlR=$sqlR." AND owp_plainsrev.projId IN (?a) AND owp_plainsrev.caId=? GROUP BY owp_plresources.resName";
            $rRes=$this->cdb->select($sqlR,$se[0],$query['rdate'],$projIds,$query['cagen']);
        }elseif($query['cagen']==0 && $query['proj']!=0){
            $projs=$this->_getChildrens($query['proj'],'ast_projects');

            $sqlR=$sqlR." AND owp_plainsrev.projId IN (?a) GROUP BY owp_plresources.resName";
            $rRes=$this->cdb->select($sqlR,$se[0],$query['rdate'],$projs);
        }else{
            $projs=$this->_getChildrens($query['proj'],'ast_projects');

            $sqlR=$sqlR." AND owp_plainsrev.projId IN (?a) AND owp_plainsrev.caId=? GROUP BY owp_plresources.resName";
            $rRes=$this->cdb->select($sqlR,$se[0],$query['rdate'],$projs,$query['cagen']);
        }
        //Обрабатываем данные для вывода
        $out=array();
        $c=1;
        foreach($rRes as $w)
        {
            $r=array();
            $r['id']=$c;
            $r['caption']=$w['resName'];
            $r['ppc']=$w['ppc'];
            $r['fpc']=$w['fpc'];
            $out[]=$r;
            $c++;
        }
        return $out;
    }

    public function getHSEReport($data){
        $res=array();
        $a=array();
        $a['id']=1;
        $a['projName']='Проект 1';
        $a['caName']='ООО Компания 1';
        $a['sNote']='Крупное проишествие...';
        $a['hseCat']=1;
        $a['edate']='20:16 23.09.2017';
        $res[]=$a;
        $a['id']=2;
        $a['projName']='Проект 2';
        $a['caName']='ООО Компания 2';
        $a['sNote']='Значительное проишествие...';
        $a['hseCat']=2;
        $a['edate']='09:00 23.09.2017';
        $res[]=$a;
        $a['id']=3;
        $a['projName']='Проект 3';
        $a['caName']='ООО Компания 2';
        $a['sNote']='Незначительное проишествие...';
        $a['hseCat']=3;
        $a['edate']='08:00 23.09.2017';
        $res[]=$a;
        return $this->result($res);
    }
}