<?php
/**
 * Created by PhpStorm.
 * User: KarpSA
 * Date: 20.03.2017
 * Time: 20:03
 */

namespace modules\telegram;
require_once(__DIR__ . '/../../core/Router.php');
class CommandRouter extends \Botb\Router
{
    public function routeCommand($command,$action='')
    {
        $class = "\\modules\\telegram\\command\\".ucfirst($command);
        if(file_exists(__DIR__ . '/command/' . ucfirst($command) . '.php')) {
            require_once(__DIR__ . '/command/' . ucfirst($command) . '.php');
            $cmd = new $class($this);
            if($action!=''){
                if(!method_exists($cmd,$action)){
                    $this->sendMessage($this->getRequest()->getChatId(),"Я Вас не понял :(");
                    return;
                }
                $cmd->$action($this->getRequest()->getText());
            }else{
                $cmd->run();
            }
        }else{
            $msg="Я вас не понял :(";
            $this->sendMessage($this->getRequest()->getChatId(),$msg);
        }
    }
}
