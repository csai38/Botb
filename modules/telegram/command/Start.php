<?php
/**
* Created by PhpStorm.
* User: KarpSA
* Date: 20.03.2017
* Time: 23:45
*/

namespace modules\telegram\command;
require_once(__DIR__ . '/../../Shared.php');
use modules\Shared;

class Start extends Shared
{
    private $cmdp=null;

    function __construct(\modules\telegram\CommandRouter &$router)
    {
        parent::__construct();
        $this->r=$router;
    }

    public function run(){
        if(!$this->_checkUser()){
            $this->_regUser();
        }
        $btnRepo=array("text"=>"Отчеты","callback_data"=>"/reports");
        $btnDocs=array("text"=>"Справка","callback_data"=>"/help");
        $btnProfile=array("text"=>"Профиль","callback_data"=>"/profile");
        $keys=[[$btnRepo,$btnDocs],[$btnProfile]];
        $kbd=new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup($keys);
        $message="Здравствуйте!\nВыберите раздел...";
        $this->r->sendMessage($this->r->getRequest()->getChatId(), trim($message),$kbd);
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

    private function _regUser()
    {
        global $_SESSION;
        $sql="INSERT INTO acl_users (?#) VALUES(?a)";
        $iData=array();
        $iData['userId']=$this->r->getRequest()->getUserId();
        $iData['chatId']=$this->r->getRequest()->getChatId();
        $id=$this->r->getCdb()->query($sql,array_keys($iData),array_values($iData));
    }
}