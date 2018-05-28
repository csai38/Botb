<?php
/**
 * Created by PhpStorm.
 * User: skarp
 * Date: 22.02.2018
 * Time: 0:52
 */
namespace modules\telegram;

require_once(__DIR__.'/Message.php');
//require_once(__DIR__ . '/../../core/Router.php');
use modules\langmsg\Message;
use TelegramBot\Api\Exception;

class MessageRouter extends \modules\telegram\Router
{
    public function routeMessage()
    {
        try {
            $msg = new Message($this);
            $msg->run();
        }catch (Exception $e) {
            $this->sendMessage($this->getRequest()->getChatId(), $e->getMessage());
        }
    }
}