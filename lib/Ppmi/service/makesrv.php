<?php
/**
 * Created by PhpStorm.
 * User: KarpSA
 * Date: 03.05.2017
 * Time: 16:07
 */
require_once(__DIR__."/../../../libs/autoload.php");
include_once (__DIR__ . '/config.php');

$generator = new \Wsdl2PhpGenerator\Generator();
$tr=array(
    '"'.$wsconfig['protocol']=>'$ppmcfg["PPM_PROTOCOL"]."',
    $wsconfig['host']=>'".$ppmcfg["PPM_HOST"]."',
    $wsconfig['port']=>'".$ppmcfg["PPM_PORT"]."'
);
foreach ($wsconfig['srvs'] as $serv){
    if(!is_dir(__DIR__.'/services/'.$serv['name'])){
        mkdir(__DIR__.'/services/'.$serv['name'],0777);
    }
    $generator->generate(new \Wsdl2PhpGenerator\Config(array(
            'inputFile' => $serv['url'],
            'outputDir' => 'services/'.$serv['name']
        ))
    );

    $cnt=file_get_contents('services/'.$serv['name'].'/'.$serv['name'].'Service.php');
    $cnt=str_replace('$wsdl) {','$wsdl) { global $ppmcfg;',$cnt);
    $cnt=str_replace("'",'"',$cnt);
    $cnt=strtr($cnt,$tr);
    $cnt=str_replace('"',"'",$cnt);
    file_put_contents('services/'.$serv['name'].'/'.$serv['name'].'Service.php',$cnt);
}



//$generator->generate(
//    new \Wsdl2PhpGenerator\Config(array(
//        'inputFile' => 'http://eppm.tks.local:8206/p6ws/services/ResourceService?wsdl',
//        'outputDir' => 'classes/resources'
//    ))
//);
echo "End generate";