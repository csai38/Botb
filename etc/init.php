<?php
/**
 * Created by PhpStorm.
 * User: KarpSA
 * Date: 24.11.2017
 * Time: 2:23
 */
include_once(__DIR__."/../config/main.php");
require_once(__DIR__."/../libs/autoload.php");

$dsn = 'mysqli://' . $config ['DB'] ['user'] . ':' . $config ['DB'] ['passwd'] . '@' . $config ['DB'] ['host'] . ':' . $config ['DB'] ['port'] . '/' . $config ['DB'] ['dbname'];

$db=new \DbSimple\Connect($dsn);