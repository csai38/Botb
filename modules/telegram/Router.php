<?php
/**
* Created by PhpStorm.
* User: KarpSA
* Date: 20.03.2017
* Time: 23:47
*/
namespace modules\telegram;
abstract class Router
{

    protected $bot = null;
    protected $req;
    protected $cdb = null;

    function __construct(\modules\telegram\hRequest &$request)
    {
        global $config, $db;
        //@ $this->bot \TelegramBot\Api\BotApi
        $this->bot = new \TelegramBot\Api\BotApi($config['ttoken']);
        $this->req = $request;
        $this->cdb = $db;
    }


    public function sendMessage($chatId, $message, $keyBoard=null)
    {
        $this->bot->sendMessage($chatId, $message, null, false, null, $keyBoard);
    }

    public function sendPhoto($chatId, $photo, $caption='', $keyBoard=null)
    {
        $this->bot->sendPhoto($chatId, $photo, $caption, null, $keyBoard);
    }

    public function getCdb()
    {
        return $this->cdb;
    }

    public function getBot()
    {
        return $this->bot;
    }

    public function getRequest() {
        return $this->req;
    }
}