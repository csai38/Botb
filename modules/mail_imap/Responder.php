<?php
/**
 * Created by PhpStorm.
 * User: skarp
 * Date: 29.03.2018
 * Time: 17:35
 */

namespace modules\mail_imap;
require_once(__DIR__ . '/../Shared.php');
use \modules\Shared;
use \BotbLib\Languniq\IntentHandler;

class Responder extends Shared
{
    private $phraseWords = array();
    private $origPhrase = null;

    function __construct($message)
    {
        parent::__construct();
        $this->origPhrase = trim($message);
        $this->phraseWords = explode(" ",$this->origPhrase);
    }

    public function run()
    {
        $mh = new IntentHandler($this->origPhrase,"ru-ru",__DIR__ . "/../intents/langs",__DIR__ . "/../intents/intentObjects");
        $msg = $mh->response();
        return $msg;
    }
}