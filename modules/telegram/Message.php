<?php
/**
* Created by PhpStorm.
* User: skarp
* Date: 25.02.2018
* Time: 13:47
*/
namespace modules\langmsg;
require_once(__DIR__ . '/../Shared.php');
use \modules\Shared;
use \BotbLib\Languniq\IntentHandler;
class Message extends Shared
{

    private $phraseWords = array();
    private $origPhrase = null;

    function __construct(\modules\telegram\MessageRouter &$router)
    {
        parent::__construct();
        $this->r=$router;
        $this->origPhrase = $this->r->getRequest()->getText();
        $this->phraseWords = explode(" ",$this->origPhrase);
    }

    public function run()
    {
        $mh = new IntentHandler($this->r->getRequest()->getText(),"ru-ru",__DIR__ . "/../intents/langs",__DIR__ . "/../intents/intentObjects");
        $msg = $mh->response();
        if(!is_array($msg)) {
            $this->r->sendMessage($this->r->getRequest()->getChatId(), $msg);
        }
    }
}