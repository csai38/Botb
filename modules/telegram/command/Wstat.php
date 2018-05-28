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

class Wstat extends Shared
{

    function __construct(\modules\telegram\CommandRouter &$router)
    {
        parent::__construct();
        $this->r=$router;
    }

    public function run(){
        if($this->_checkUser()){
            $btnTtl=array("text"=>"Сводный отчет","callback_data"=>"WPR:P:0");
            $btnProj=array("text"=>"Проекты","callback_data"=>"WPL:P:0");
            $btnBld=array("text"=>"Подрядчики","callback_data"=>"WPL:B:0");
            $keys=[[$btnTtl],[$btnProj,$btnBld]];
            $kbd=new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup($keys);
            $this->r->sendMessage($this->r->getRequest()->getChatId(), 'Выберите раздел...',$kbd);
        }else {
            $this->r->sendMessage($this->r->getRequest()->getChatId(), 'Привет! Как дела?');
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
}