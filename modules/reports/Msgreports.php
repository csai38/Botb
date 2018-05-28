<?php
/**
 * Created by PhpStorm.
 * User: skarp
 * Date: 02.05.2018
 * Time: 18:57
 */

namespace modules\reports;


use modules\iviews\MdschDb;
use modules\iviews\WorkProgress;
use modules\Shared;


class Msgreports extends Shared
{
    public function _getMsgReportData($rdate,$projId=null,$objId=null,$caId=null,$adInfo=null){
        if($projId!=null && !is_array($projId)){
            $projId=array($projId);
        }
        $repodate=strtotime($rdate);
        $sep=$this->getSEperiod(date('Y-m-d',$repodate));
        $sqlTaskTotal="SELECT tasks.pdate, 
                SUM(tasks.tasklw * tasks.pquant) AS pquant,
                SUM(tasks.tasklw * tasks.fquant) AS fquant
                FROM ast_plobjects AS plobject,stp_taskplains AS tasks
                WHERE plobject.objCode=tasks.objCode
                AND pdate BETWEEN ? AND ?
                { AND plobject.projId IN (?a) }
                { AND plobject.id = ?}
                { AND plobject.caId = ?}";
        $hrSql="SELECT hresource.pdate AS ARRAY_KEY,
                SUM(hresource.pquant) AS pquant,
                SUM(hresource.fquant) AS fquant
                FROM ast_plobjects AS plobject, stp_hresource AS hresource
                WHERE plobject.objCode = hresource.objCode
                AND pdate BETWEEN ? AND ?
                { AND plobject.projId IN (?a) }
                { AND plobject.id = ?}
                { AND plobject.caId = ?}
                GROUP BY DAY(pdate)";
        $sqlTask=$sqlTaskTotal . ' GROUP BY DAY(pdate)';
        $tres = $this->cdb->selectRow($sqlTaskTotal,$sep[0],$sep[1],empty($projId)?DBSIMPLE_SKIP:$projId,empty($objId)?DBSIMPLE_SKIP:$objId,empty($caId)?DBSIMPLE_SKIP:$caId);
        $res = $this->cdb->select($sqlTask,$sep[0],$sep[1],empty($projId)?DBSIMPLE_SKIP:$projId,empty($objId)?DBSIMPLE_SKIP:$objId,empty($caId)?DBSIMPLE_SKIP:$caId);
        $hres = $this->cdb->select($hrSql,$sep[0],$sep[1],empty($projId)?DBSIMPLE_SKIP:$projId,empty($objId)?DBSIMPLE_SKIP:$objId,empty($caId)?DBSIMPLE_SKIP:$caId);
        /*
        * $data=array массив данных для построения графика
        * $data[rdate] = date reports
        * $data[tt][project] = Project Name
        * $data[tt][object] = Object works
        * $data[tt][bulder] = Contragent of constraction
        * $data[tt][series] = Points date series Abcissa
        * $data[wp][plan] = Percent plain work progress
        * $data[wp][fact] = Percent fact work progress
        * $data[hr][plan] = Value plan human resources
        * $data[hr][fact] = Value fact human resources
        * $data[hr][max] = Максимальное значение людей в периоде
        * $data[tl][dayp] = Percent day tasks complete
        * $data[tl][monthp] = Percent month tasks complete on current day
        * $data[tl][wpd] = Dynamic work progress
        * $data[tl][hrd] = Dynamic human resources
        * $data[reponame] = mixed uniqe name
        */
        //print_data($hres);
        if(empty($hres)){
            $hres=array();
        }
        $out=array();

        if(empty($tres)){
            return null;
        }
        $out['rdate']=$rdate;
        $out['msp']=0;
        $out['msf']=0;
        $out['pmp']=0;
        $out['pmf']=0;
        $out['tt']['series']=array();
        $out['wp']['plan']=array();
        $out['wp']['fact']=array();
        $out['hr']['plan']=array();
        $out['hr']['fact']=array();
        $out['tl']['wpd']=0;
        $out['tl']['hrd']=0;
        $out['tl']['dayp']=0;
        $out['tl']['monthp']=0;
        $out['tl']['tforecast']=0;
        $out['wp']['max']=100;
        $out['hr']['max']=100;
        $out['reponame']=((isset($adInfo['projId']))?'proj-'.$adInfo['projId']:'').((!empty($objId))?'-obj-'.$objId:'').((!empty($caId))?'-ca-'.$caId:'').('-rd-'.$rdate);
        $tplan=0;
        $tfact=0;
        $tforecast=0;
        $i=0;
        $wpMax=120;
        $hrMax=0;
        $midPerfomance=0;
        $sumHrFact=0;
        $lastHrCountFact=0;
        $curDateIndex=0;
        $forecast=0;

        foreach($res as $r){
            $currentDate = strtotime($r['pdate']);
            $out['tt']['series'][$i] = date('d.m',$currentDate);
            $out['wp']['plan'][$i]=0;
            $out['wp']['fact'][$i]=0;
            $out['hr']['plan'][$i]=0;
            $out['hr']['fact'][$i]=0;
            if($tres['pquant'] != 0){
                $tplan+=$r['pquant'];
                $tfact+=$r['fquant'];
                $out['wp']['plan'][$i]=round(($tplan/$tres['pquant'])*100,0);
                $out['wp']['fact'][$i]=round(($tfact/$tres['pquant'])*100,0);
            }
            if(isset($hres[$r['pdate']])){
                $out['hr']['plan'][$i]=$hres[$r['pdate']]['pquant'];
                $out['hr']['fact'][$i]=$hres[$r['pdate']]['fquant'];
                $sumHrFact+=$out['hr']['fact'][$i];
                if($hrMax<$hres[$r['pdate']]['pquant']){
                    $hrMax=$hres[$r['pdate']]['pquant'];
                }
                if($hrMax<$hres[$r['pdate']]['fquant']){
                    $hrMax=$hres[$r['pdate']]['fquant'];
                }
            }
            if($currentDate==$repodate){
                $curDateIndex=$i;
                $out['tl']['dayp'] = round(($r['fquant']/$r['pquant'])*100,0);
                $out['tl']['monthp']= round(($tfact/$tplan)*100,0);
                //Считаем динамику производства и численности
                $prevDayPerf=1;
                $currentDayPerf=0;
                $prevDayHr = 1;
                $currentDayHr=0;
                if($repodate > strtotime($sep[0])) {
                    if (isset($hres[$res[$i - 1]['pdate']]['fquant']) && $hres[$res[$i - 1]['pdate']]['fquant'] != 0) {
                        $prevDayPerf = $res[$i - 1]['fquant'] / $hres[$res[$i - 1]['pdate']]['fquant'];
                        $prevDayHr = $hres[$res[$i - 1]['pdate']]['fquant'];
                    }
                    if (isset($hres[$r['pdate']]['fquant']) && $hres[$r['pdate']]['fquant'] != 0) {
                        $currentDayPerf = $r['fquant'] / $hres[$r['pdate']]['fquant'];
                        $currentDayHr = $hres[$r['pdate']]['fquant'];
                    }
                    $out['tl']['wpd'] = ($prevDayPerf==0)?0:round(($currentDayPerf / $prevDayPerf * 100) - 100,0);
                    $out['tl']['hrd'] = ($prevDayHr==0)?0:round(($currentDayHr / $prevDayHr * 100) - 100,0);
                }else{
                    $out['tl']['wpd']=0;
                    $out['tl']['hrd']=0;
                }
                $lastHrCountFact = $out['hr']['fact'][$i];
                if($sumHrFact>0){
                    $midPerfomance=$tfact / $sumHrFact;
                    //$midPerfomance=$r['fquant']/$lastHrCountFact;
                }
                $tforecast=$tfact;
                $out['msp']=$out['wp']['plan'][$i];
                $out['msf']=$out['wp']['fact'][$i];
                $out['pmp']=$out['hr']['plan'][$i];
                $out['pmf']=$out['hr']['fact'][$i];
            }
            if($repodate<$currentDate){
                $out['wp']['fact'][$i]=null;
                unset($out['hr']['fact'][$i]);
                //Расчет прогноза
                $tforecast += ($midPerfomance * $lastHrCountFact);
                $out['wp']['forecast'][$i]=round(($tforecast/$tres['pquant'])*100,0);
                $forecast=$out['wp']['forecast'][$i];
            }else{
                //$out['wp']['forecast'][$i]=$out['wp']['fact'][$i];
                $out['wp']['forecast'][$i]=null;
            }
            $i++;
        }
        if($i > 15) {
            //Кромсаем массивы
            if ($curDateIndex < 7) {
                $leftIdx = 0;
                $rightIdx = 14;
            } elseif ($curDateIndex >= 8 && $curDateIndex < 22) {
                $leftIdx = 8;
                $rightIdx = 22;
            } else {
                $leftIdx = $i - 17;
                $rightIdx = $i - 1;
            }
            for($j=0;$j<$i;$j++){
                if($j<$leftIdx || $j>$rightIdx){
                    unset($out['tt']['series'][$j]);
                    unset($out['wp']['plan'][$j]);
                    unset($out['wp']['fact'][$j]);
                    unset($out['hr']['plan'][$j]);
                    unset($out['hr']['fact'][$j]);
                    unset($out['wp']['forecast'][$j]);
                }
            }
        }
        $out['tl']['tforecast']=$forecast;
        if($forecast * 1.1 > $wpMax){
            $wpMax=round( $forecast*1.1);
        }
        $out['wp']['max']=$wpMax;
        $out['hr']['max']=round($hrMax*1.1);
        return $out;
    }

    public function makeReport($rdate,$projId=0,$objId=0,$caId=0){
        $repoData=$this->_getProjectReportData($rdate,array('id'=>$projId));
        //$message=array('projects'=>'');
        $message=$this->_compileReport($repoData);
        //print_data($message);
        $cnt['messageheader']='Отчет по исполнению месячно-суточного плана';
        $projects=join('',$message['project']);
        $projectsdetail=join('',$message['projectdetail']);
        $cnt['messagedata']=$projects.$projectsdetail;
        return $this->applyTamplate($cnt,__DIR__.'/tpls/page.tpl');
    }

    private function _getProjectReportData($rdate, $proj=null){
        $projects=$this->cdb->select("SELECT id, projName AS caption, projFname AS fCaption FROM ast_projects WHERE parentId=?",$proj['id']);
        if(empty($projects)){
            return null;
        }
        foreach($projects as &$p){
            $pchilds=$this->_getChildrens($p['id'],'ast_projects');
            $adInfo=array('projId'=>$p['id'],'project'=>$p['caption']);
            $p['repData'] = $this->_getMsgReportData($rdate,$pchilds,null,null,$adInfo);
            $p['datatype']='project';
            //Смотрим объекты если есть добавим в потомков
            $objs=$this->_getObjectReportData($rdate,$p['id'],$p['caption']);
            if(count($pchilds)>1){ //есть потомки записываем в childrens
                $p['childrens']=$this->_getProjectReportData($rdate,$p);
                if(!empty($objs)){
                    foreach($objs as $o){
                        $p['childrens'][]=$o;
                    }
                }
                $p['leaf']=false;
            }else{
                if(!empty($objs)){
                    $p['childrens']=$objs;
                    $p['leaf']=false;
                }else{
                    $p['leaf']=true;
                }
            }
        }
        return $projects;
    }

    private function _getObjectReportData($rdate, $projId, $projCaption){
        $objects = $this->cdb->select("SELECT obj.id, obj.caption, cag.caFname AS cagent
                                        FROM ast_plobjects AS obj, ast_cagents AS cag
                                        WHERE cag.id = obj.caId
                                        AND obj.projId=?",$projId);
        if(empty($objects)){
            return null;
        }
        foreach($objects as &$obj){
            $obj['fCaption']=$obj['caption'];
            $obj['project']=$projCaption;
            $adInfo=array('projId'=>$projId,'project'=>$projCaption,'object'=>$obj['caption']);
            $obj['datatype']='object';
            $obj['repData']=$this->_getMsgReportData($rdate,$projId,$obj['id'],null,$adInfo);
            $obj['leaf']=true;
        }
        return $objects;
    }

    private function _compileReport($data){
        $wp=new WorkProgress();
        $mdb=new MdschDb();
        $outContent=array();
        $outContent['project']=array();
        $outContent['projectdetail']=array();
        foreach($data as $d){
            $cnt['projectcaption']=$d['fCaption'];
            $cnt['projId']=$d['repData']['reponame'];
            if($d['datatype']=='project'){
                $d['repData']['tt']['project']=$d['caption'];
            }elseif($d['datatype']=='object'){
                $d['repData']['tt']['project']=$d['project'];
                $d['repData']['tt']['object']=$d['caption'];
                $d['repData']['tt']['bulder']=$d['cagent'];
            }
            //$d['repData']['project']=$d['caption'];
            $cnt['msggraf']=$wp->getReport($d['repData']);
            if(!$d['leaf']){
                $cnt['projectsitemlist'] = $this->_compileProjectDbItems($d['childrens'], $mdb);
                $childContent=$this->_compileReport($d['childrens']);
                $content=$this->applyTamplate($cnt,__DIR__.'/tpls/msg/itemsdb.tpl');
                $outContent['project'][]=$content;
                $outContent['project']=array_merge($outContent['project'],$childContent['project']);
                $outContent['projectdetail']=array_merge($outContent['projectdetail'],$childContent['projectdetail']);
            }else{
                if(isset($d['repData']['tt']['project'])){
                    $cnt['projectcaption'] = '&raquo;&nbsp;'.$d['repData']['tt']['project'] .'&nbsp;&raquo;&nbsp;' . $cnt['projectcaption'];
                }
                $content=$this->applyTamplate($cnt,__DIR__.'/tpls/msg/itemdetails.tpl');
                $outContent['projectdetail'][]=$content;
            }
        }
        return $outContent;
    }

    private function _compileProjectDbItems($data,MdschDb $dbi){
        $outContent='';
        foreach($data as $d){
            $cnt['msgdb']=$dbi->getImageMPReport($d['repData']);
            $cnt['itemcaption']=$d['caption'];
            $cnt['rdate']=date('d.m.Y',strtotime($d['repData']['rdate']));
            $cnt['dayprogress']=$d['repData']['tl']['dayp'];
            $cnt['dayprogressstyle']=$this->_getStyleByValue($cnt['dayprogress']);
            $cnt['constrdynamic']=(($d['repData']['tl']['wpd']>0)?'+':'').$d['repData']['tl']['wpd'];
            $cnt['constrdynamicstyle']=$this->_getStyleByValuePN($d['repData']['tl']['wpd']);
            $cnt['hresourcesdynamic']=(($d['repData']['tl']['hrd']>0)?'+':'').$d['repData']['tl']['hrd'];
            $cnt['hresourcesdynamicstyle']=$this->_getStyleByValuePN($d['repData']['tl']['hrd']);
            $cnt['wpforecast']=$d['repData']['tl']['tforecast'];
            $cnt['wpforecaststyle']=$this->_getStyleByValue($cnt['wpforecast']);

            $cnt['projId']=$d['repData']['reponame'];

            if($d['datatype']=='project') {
                $outContent .= $this->applyTamplate($cnt, __DIR__.'/tpls/msg/dbitem_project.tpl');
            }elseif($d['datatype']=='object'){
                $cnt['cagent']=$d['cagent'];
                $outContent .= $this->applyTamplate($cnt, __DIR__.'/tpls/msg/dbitem_object.tpl');
            }
        }
        return $outContent;
    }

    private function _getStyleByValue($val){
        global $config;
        if($val < $config['reports']['ilow']){
            return 'style="color: #ffffff; background: #ff6633;"';
        }elseif($val >= $config['reports']['ilow'] && $val < $config['reports']['imid']){
            return 'style="color: #000000; background: #ffff66;"';
        }elseif($val >= $config['reports']['imid'] && $val < $config['reports']['inorm']){
            return 'style="color: #000000; background: #33cc66;"';
        }elseif($val >= $config['reports']['inorm']){
            return 'style="color: #ffffff; background: #009999;"';
        }else{
            return 'style="color: #000000; background: #ffffff;"';
        }
    }

    private function _getStyleByValuePN($val){
        if($val > 0){
            return 'style="color: green; background: #ffffff;"';
        }elseif($val < 0){
            return 'style="color: red; background: #ffffff;"';
        }else{
            return 'style="color: #000000; background: #ffffff;"';
        }
    }


}