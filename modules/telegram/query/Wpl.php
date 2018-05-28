<?php
/**
* Created by PhpStorm.
* User: KarpSA
* Date: 20.03.2017
* Time: 23:45
*/

namespace modules\query;
require_once(__DIR__ . '/../../Shared.php');
use \modules\Shared;

class Wpl extends Shared
{

    function __construct(\modules\telegram\QueryRouter &$router)
    {
        parent::__construct();
        $this->r=$router;
    }

    public function exequteQuery($params){
        if(!$this->_checkUser()){
            $this->r->sendMessage($this->r->getRequest()->getChatId(), 'Как дела?');
        }else {
            $p=$this->makeKeyPair($params);
            if($p!=null){
                if(isset($p['P'])&&!isset($p['O'])&&!isset($p['B'])){
                    $this->getProjects($p['P']); //Проекты
                }elseif(isset($p['P'])&&isset($p['O'])&&!isset($p['B'])){
                    //Объекты по проекту
                    $this->getObjectsByProject($p['P']);
                }elseif(isset($p['P'])&&!isset($p['O'])&&isset($p['B'])){
                    //Подрядчики по проекту
                }elseif(!isset($p['P'])&&!isset($p['O'])&&isset($p['B'])){
                    //Подрядчики
                }elseif(isset($p['P'])&&isset($p['O'])&&isset($p['B'])){
                    //По проекту объекту и подрядчику
                }else{
                    $btnTtl=array("text"=>"Сводный отчет","callback_data"=>"WPR:P:0");
                    $btnProj=array("text"=>"Проекты","callback_data"=>"WPL:P:0");
                    $btnBld=array("text"=>"Подрядчики","callback_data"=>"WPL:B:0");
                    $keys=[[$btnTtl],[$btnProj,$btnBld]];
                    $kbd=new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup($keys);
                    $this->r->sendMessage($this->r->getRequest()->getChatId(), 'Выберите раздел...',$kbd);
                }
            }else {
                $this->r->sendMessage($this->r->getRequest()->getChatId(), 'Уточните?');
            }
        }
    }

    private function _checkUser(){
        $sql="SELECT count(id) FROM acl_users WHERE userId=?";
        $res=$this->r->getCdb()->selectCell($sql,$this->r->getRequest()->getUserId());
        if($res>0){
            return true;
        }else{
            return false;
        }
    }

    private function getProjects($projId){
        //$this->r->getRequest()->getQuery()
        $sql="SELECT id, projName FROM ast_projects WHERE parentId=? ORDER BY seqNum";
        $res=$this->cdb->select($sql,$projId);
        //Если ни чего нет вызываем меню Объекты / Подрядчики
        if($res==null){
            $this->getObjectsBuldersMenu($projId);
        }else {
            $o = array();
            foreach ($res as $r) {
                $d = array();
                $d['callback_data'] = 'WPL:P:' . $r['id'];
                $d['text'] = $r['projName'];
                $o[] = $d;
            }
            $kbd = $this->makeIlKeyboard($o, $this->getLastQuery($this->r->getRequest()->getUserId(),$this->r->getRequest()->getChatId()));

            if($projId!=0){
                $tr = [[array('text' => 'Сводный отчет', 'callback_data' => 'WPR:P:' . $projId)]];
                $kbd = array_merge($tr, $kbd);
            }
            //error_log();
            $kmp = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup($kbd);
            //$this->r->sendMessage($this->r->getRequest()->getChatId(), 'Выберите раздел...');
            $adText=($projId==0)?'Выберите раздел...':('Проект: '.$this->getProjectName($projId).' выберите раздел');
            $this->r->sendMessage($this->r->getRequest()->getChatId(), $adText, $kmp);
        }
    }

    private function getObjectsBuldersMenu($projId){
        $btnTtl=array("text"=>"Сводный отчет","callback_data"=>"WPR:P:".$projId);
        $btnProj=array("text"=>"Объекты","callback_data"=>"WPL:O:0:P:".$projId);
        $btnBld=array("text"=>"Подрядчики","callback_data"=>"WPL:B:0:P:".$projId);
        $btnBack=array("text"=>"<- назад","callback_data"=>$this->getLastQuery($this->r->getRequest()->getUserId(),$this->r->getRequest()->getChatId()));
        $btnUp=array("text"=>"вверх","callback_data"=>'/wstat');
        $keys=[[$btnTtl],[$btnProj,$btnBld],[$btnBack,$btnUp]];
        $kbd=new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup($keys);
        $adText='Проект: '.$this->getProjectName($projId).' выберите раздел...';
        $this->r->sendMessage($this->r->getRequest()->getChatId(), $adText,$kbd);
    }

    private function getObjectsByProject($projId){
        $sql="SELECT * FROM ast_objects WHERE projId=?";
        $res=$this->cdb->select($sql,$projId);
        $o=array();
        foreach ($res as $r){
            $d=array();
            $d['text']=$r['objName'];
            $d['callback_data']='WPR:P:'.$projId.':O:'.$r['id'];
            $o[]=$d;
        }
        $keys=$this->makeIlKeyboard($o, $this->getLastQuery($this->r->getRequest()->getUserId(),$this->r->getRequest()->getChatId()),1);
        $kbd=new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup($keys);
        $adText='Проект: '.$this->getProjects($projId).' Выберите объект производства работ';
        $this->r->sendMessage($this->r->getRequest()->getChatId(), $adText, $kbd);
    }
}