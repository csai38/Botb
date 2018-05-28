<?php
/**
 * Created by PhpStorm.
 * User: skarp
 * Date: 27.02.2018
 * Time: 18:26
 */
error_reporting(E_ALL);
include_once(__DIR__."/../etc/init.php");

function print_data($data){
    if(is_array($data)){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }else{
        echo $data."\n";
    }
    echo "-------------------------------\n";
}
//if(php_sapi_name()!="cli") {
    define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT']);
//}else{
//    define('DOC_ROOT', "/var/web/ex/www");
//}
/*
$message="По каким проектам Кустовые площадки крупного проекта Высота наступают ключевые вехи через три дня";
$message1="Прогресс МСГ по проекту Высота";
$message2="Какие крупные проекты завершаются через неделю";
$message3="Как дела?";
$message4="Мне нужны комментарии";
define("INTENTPLS", __DIR__ . "/../modules/intents/langs");
define("INTENTOBJ",__DIR__ . "/../modules/intents/intentObjects");
$intent = new \BotbLib\Languniq\IntentHandler($message1,"ru-ru",INTENTPLS,INTENTOBJ);
echo "*******RESPONSE******<br/>";
print_data($intent->response());
echo "<br/>";
*/
//phpinfo();
//exit();

use modules\iviews\WorkProgress;

$img = new WorkProgress();

$data = $img->getReport();

/*$msg = new \BotbLib\Tmail\Emessage('tbot@tks.ms');
$msg->to('ec-contsib@mail.ru');
$msg->body = "Message";
$msg->addData('attachment.png',$data,getimagesize($data),'image/png');
$msg->send();
*/
//echo $data;
echo '<img src="data:image/png;base64, '.$data.'" />';

?>