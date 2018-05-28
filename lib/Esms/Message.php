<?php
/**
 * Created by PhpStorm.
 * User: KarpSA
 * Date: 22.11.2017
 * Time: 21:22
 */
namespace BotbLib\Esms;

use BotbLib\Esms\Relay;

class Message{

    /*
     * [id] => 172
     * [number] => +79829823152
     * [content] => Загрузка
     * [tag] => 1
     * [date] => 17,11,22,21,25,08,+20
     * [draft_group_id] =>
     * [received_all_concat_sms] => 1
     * [concat_sms_total] => 0
     * [concat_sms_received] => 0
     * [sms_class] => 4
     * [sms_mem] => nv
     * [sms_submit_msg_ref] => 0 - Inbox, 1-Outbox
     */
    public $Id = -1;
    public $Sbox = 1;
    public $Number = null;
    public $Text ='';
    public $Mdate = null;
    private $relay=null;


    function __construct($data=array())
    {
        if(isset($data['id'])) {
            $this->Id = $data['id'];
        }
        if(isset($data['date'])) {
            $mda = explode(',', $data['date']);
            $this->Mdate = gmdate('Y-m-d H:i:s', mktime($mda[3], $mda[4], $mda[5], $mda[1], $mda[2], $mda[0]));
        }else{
            $this->Mdate = gmdate('Y-m-d H:i:s',time());
        }
        if(isset($data['sms_submit_msg_ref'])){
            $this->Sbox=$data['sms_submit_msg_ref'];
        }
        if(isset($data['content'])){
            $this->Text=$data['content'];
        }
        if(isset($data['number'])){
            $this->Number=$data['number'];
        }
        $this->relay = new Relay();
    }

    public function send(){
        if($this->Number==null){
            return false;
        }
        $res=json_decode($this->relay->sendMessage($this),true);
        if($res['result']=='success') {
            return true;
        }else{
            return false;
        }
    }

    public function getRelay(){
        return $this->relay;
    }

}