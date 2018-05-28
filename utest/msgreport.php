<?php
/**
 * Created by PhpStorm.
 * User: skarp
 * Date: 27.02.2018
 * Time: 18:26
 */
error_reporting(E_ALL);
set_time_limit(0);
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

use modules\reports\Msgreports;

$repo=new Msgreports();
$rdate="2018-04-10";
$projId=1;
$fname=md5($rdate.$projId);
$cachePath=__DIR__."/../cashe/".$fname;
$cacheEnable=false;

if(file_exists($cachePath) && $cacheEnable){
    $res=file_get_contents($cachePath);
}else{
    $res=$repo->makeReport($rdate,$projId);
    file_put_contents($cachePath,$res);
}


//$nmsg = array();
//$nmsg['to'] = 'sg.ceom@gmail.com';
//$nmsg['title'] = "Отчет по месячно-суточному плану";
//$nmsg['message'] = $res;
//\Botb\Basic::sendmail($nmsg,true);
/*
$message = new \BotbLib\Tmail\Emessage($config['fmail'],$config['nfmail']);
$message->to('sg.ceom@gmail.com');
$message->addData('Отчет_МСГ_'.$rdate.'.html',base64_encode($res),'text\html');
$message->body = 'Отчет по выполнению месячного плана';
$message->send();
echo "Ok";
*/
echo $res;