<?php
/**
 * Created by PhpStorm.
 * User: KarpSA
 * Date: 20.11.2017
 * Time: 18:11
 */
include("db.php");
//Regional settings
date_default_timezone_set ( "Asia/Yekaterinburg" );
define("TZ","+5");
//Dependency settings
//Telegram token bot API
$config['ttoken']="349794094:AAHTD9AiGJKMtLUTEzdKqC8mwdcfm0khk5c";
//SMS sending module IP adress
$esms['ip']='192.168.0.1';
//enable log query
$config['log']=true;
$config ['nfmail'] = "ALEX";
$config ['fmail'] = "tbot@tks.ms";
//Exchange Web server config
$config ['ews_server'] = "mail.gazprom-neft.ru";
$config ['ews_login'] = "gazprom-neft\\yuzhakov.ng";
$config ['ews_pass'] = "JgnbvJ1";

$config['phantomjs']='/usr/bin/phantomjs';


$config['reports']['ilow']=70;
$config['reports']['imid']=90;
$config['reports']['inorm']=130;

