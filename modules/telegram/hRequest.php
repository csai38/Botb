<?php
/**
 * Created by PhpStorm.
 * User: KarpSA
 * Date: 21.03.2017
 * Time: 7:36
 */

namespace modules\telegram;
class hRequest
{
    private $_cdb;
    private $_userId;
    private $_chatId;
    private $_text = null;
    private $_query;
    private $_content;
    public $isCallback = false;
    public $isEvent = false;
    public $cmd = null;
    public $chain=null;
    private $_mdate=null;


    function __construct($datainput)
    {
        global $config, $db;
        $this->_cdb = $db;
        if ($config['log'] === true) {
            $this->_cdb->query("INSERT INTO qsl_querylogs (reqDate,reqContent) VALUES(?,?)", date('Y-m-d H:i:s'), $datainput);
        }
        $inp = json_decode($datainput, true);
        if (isset($inp['callback_query'])) {
            $this->isCallback = true;
        }
        $this->_content = $inp;
        $this->_userId = ($this->isCallback) ? $this->_content['callback_query']['from']['id'] : $this->_content['message']['from']['id'];
        $this->_chatId = ($this->isCallback) ? $this->_content['callback_query']['message']['chat']['id'] : $this->_content['message']['chat']['id'];
        $this->_query = ($this->isCallback) ? $this->_content['callback_query']['data'] : $this->_content['message']['text'];
        $this->_text = ($this->isCallback) ? $this->_content['callback_query']['message']['text'] : $this->_content['message']['text'];
        $this->_mdate = ($this->isCallback) ? date('Y-m-d H:i:s',$this->_content['callback_query']['message']['date']) : date('Y-m-d H:i:s',$this->_content['message']['date']);
        $this->chain = $this->getChain();

        $regex = '/[\/]([a-z]+)/';
        preg_match($regex, $this->_query, $cm);
        if (count($cm) > 0) {
            $this->cmd = $cm[1];
        }
        //Запишем запрос в историю
        $this->_cdb->query("INSERT INTO sts_history (userId, chatId, query, qDate) VALUES (?,?,?,?)",
            $this->_userId,
            $this->_chatId,
            $this->_query,
            $this->_mdate
        );
    }

    public function getUserId()
    {
        return $this->_userId;
    }

    public function getChatId()
    {
        return $this->_chatId;
    }

    public function getContent()
    {
        return $this->_content;
    }

    public function getQuery()
    {
        return $this->_query;
    }

    public function getText()
    {
        return $this->_text;
    }

    public function getDate()
    {
        return $this->_mdate;
    }

    private function getChain(){
        $sql="SELECT * FROM req_chains WHERE userId=? AND chatId=?";
        $res=$this->_cdb->selectRow($sql,$this->_userId,$this->_chatId);
        if($res!=null){
            return $res;
        }else{
            return null;
        }
    }
}