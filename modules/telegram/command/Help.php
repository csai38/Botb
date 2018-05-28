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

class Help extends Shared
{
    private $cmdp=null;

    function __construct(\modules\telegram\CommandRouter &$router)
    {
        parent::__construct();
        $this->r=$router;
    }

    public function run(){
        $msg="/start - Главное меню\n/reg - Запрос на регистрацию\n/wstat - Отчет по прогрессу";
        $this->r->sendMessage($this->r->getRequest()->getChatId(), trim($msg));
    }
}