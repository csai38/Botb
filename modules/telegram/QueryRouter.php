<?php
/**
 * Created by PhpStorm.
 * User: KarpSA
 * Date: 20.03.2017
 * Time: 20:06
 */
namespace modules\telegram;
require_once(__DIR__ . '/../../core/Router.php');
class QueryRouter extends \Botb\Router
{
    public function routeQuery($params)
    {
        $req=explode(':',$params);
        $class = "\\modules\\query\\".ucfirst(strtolower($req[0]));
        if(file_exists(__DIR__ . '/query/' . ucfirst(strtolower($req[0])) . '.php')) {
            require_once(__DIR__ . '/query/' . ucfirst(strtolower($req[0])) . '.php');
            $cmd = new $class($this);
            $cmd->exequteQuery($req);
        }else{
            $msg="Я вас не понял.\n/help - список команд";
            $this->sendMessage($this->getRequest()->getChatId(),$msg);
        }
    }
}