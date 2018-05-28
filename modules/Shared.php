<?php
/**
 * Created by PhpStorm.
 * User: KarpSA
 * Date: 22.03.2017
 * Time: 9:48
 */
namespace modules;

require_once (__DIR__.'/../core/Basic.php');
abstract class Shared extends \Botb\Basic {
    protected $r;

    protected function getProjectName($projId){
        return $this->cdb->selectCell("SELECT projName FROM ast_projects WHERE id=?",$projId);
    }

    protected function applyTamplate($data,$tpl){
        $regexp='/zp\:([a-zA-Z0-9]+)\:/';
        $tplcontent = file_get_contents($tpl);

        preg_match_all($regexp,$tplcontent,$matches);

        for($i=0;$i<count($matches[0]);$i++){
            if(isset($data[$matches[1][$i]])){
                $tplcontent=str_replace($matches[0][$i],$data[$matches[1][$i]],$tplcontent);
            }else{
                $tplcontent=str_replace($matches[0][$i],'',$tplcontent);
            }
        }
        return $tplcontent;
    }
}