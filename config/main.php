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
$config['ttoken']="";
//SMS sending module IP adress
$esms['ip']='192.168.0.1';
//enable log query
$config['log']=true;
$config ['nfmail'] = "ALEX";
$config ['fmail'] = "";
//Exchange Web server config
$config ['ews_server'] = "";
$config ['ews_login'] = "";
$config ['ews_pass'] = "";

$config['phantomjs']='/usr/bin/phantomjs';


$config['reports']['ilow']=70;
$config['reports']['imid']=90;
$config['reports']['inorm']=130;

