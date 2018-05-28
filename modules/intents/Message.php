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
use \BotbLib\Languniq\MessageHandler;
class Message extends Shared
{

    private $phraseWords = array();
    private $origPhrase = null;

    function __construct(\Botb\MessageRouter &$router)
    {
        parent::__construct();
        $this->r=$router;
        $this->origPhrase = $this->r->getRequest()->getText();
        $this->phraseWords = explode(" ",$this->origPhrase);
    }

    public function run()
    {
        $mh = new MessageHandler($this->r->getRequest()->getText());
        $subject = $mh->getSubject();

        $msg = "111";
        $this->r->sendMessage($this->r->getRequest()->getChatId(), $msg);
    }
}