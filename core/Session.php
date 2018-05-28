<?php
require_once(__DIR__.'/../lib/DbSessionHandler/Zebra_Session.php');
$sesslnk=mysqli_connect($config ['DB'] ['host'],$config ['DB'] ['user'],$config ['DB'] ['passwd'],$config ['DB'] ['dbname'],$config ['DB'] ['port']);
$session=new Zebra_Session($sesslnk,'1tu819-^!7Ntq_0D5gBb5');
?>