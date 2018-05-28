<?php
/**
 * Created by PhpStorm.
 * User: KarpSA
 * Date: 20.11.2017
 * Time: 18:44
 */

include_once("etc/init.php");

try{
    //Форматируем входные данные
    $content=file_get_contents("php://input");
    file_put_contents('lastq',$content);
    $req = new \modules\telegram\hRequest($content);
    //Если комманда отдаем ее CommandRouter
    if($req->cmd!=null && $req->chain==null && $req->isCallback==false){
        $cr=new \modules\telegram\CommandRouter($req);
        $cr->routeCommand($req->cmd);
    }elseif($req->cmd==null && $req->chain!=null && $req->isCallback==false){
        $cr=new \modules\telegram\CommandRouter($req);
        $cr->routeCommand($req->chain['cmd'],$req->chain['action']);
    }elseif($req->isCallback==true && $req->cmd==null){
        $qr=new \modules\telegram\QueryRouter($req);
        $qr->routeQuery($req->getQuery());
    }elseif($req->isCallback==true && $req->cmd!=null){
        $cr=new \modules\telegram\CommandRouter($req);
        $cr->routeCommand($req->cmd);
    }else{
        $msg = new \modules\telegram\MessageRouter($req);
        $msg->routeMessage();
    }

}catch(\TelegramBot\Api\Exception $e){
    echo $e->getMessage();
}
