<?php
/**
 * Created by PhpStorm.
 * User: KarpSA
 * Date: 20.11.2017
 * Time: 18:44
 */


include_once("etc/init.php");

$bot = new \TelegramBot\Api\BotApi($config['ttoken']);
//$cf= new CURLFile('/etc/pki/tks.ms/2_tks.ms.crt');
$cf='@/etc/pki/tks.ms/2_tks.ms.crt';
//echo file_get_contents('/etc/pki/tks.ms/cert.crt');
//echo $cf->getFilename()."\n";
//echo $cf->getPostFilename()."\n";
echo $bot->setWebhook('https://ex.tks.ms/tlgwh.php',$cf);
