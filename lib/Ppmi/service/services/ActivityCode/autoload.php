<?php


 function autoload_3af8ff7902788c9732c60197b12666e4($class)
{
    $classes = array(
        'ActivityCodeService' => __DIR__ .'/ActivityCodeService.php',
        'IntegrationFaultType' => __DIR__ .'/IntegrationFaultType.php',
        'IntegrationFaultCodeType' => __DIR__ .'/IntegrationFaultCodeType.php',
        'CreateActivityCodes' => __DIR__ .'/CreateActivityCodes.php',
        'CreateActivityCodesResponse' => __DIR__ .'/CreateActivityCodesResponse.php',
        'ReadActivityCodes' => __DIR__ .'/ReadActivityCodes.php',
        'ReadActivityCodesResponse' => __DIR__ .'/ReadActivityCodesResponse.php',
        'ActivityCodeFieldType' => __DIR__ .'/ActivityCodeFieldType.php',
        'UpdateActivityCodes' => __DIR__ .'/UpdateActivityCodes.php',
        'UpdateActivityCodesResponse' => __DIR__ .'/UpdateActivityCodesResponse.php',
        'DeleteActivityCodes' => __DIR__ .'/DeleteActivityCodes.php',
        'DeleteActivityCodesResponse' => __DIR__ .'/DeleteActivityCodesResponse.php',
        'ReadActivityCodePath' => __DIR__ .'/ReadActivityCodePath.php',
        'ReadActivityCodePathResponse' => __DIR__ .'/ReadActivityCodePathResponse.php',
        'ActivityCode' => __DIR__ .'/ActivityCode.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_3af8ff7902788c9732c60197b12666e4');

// Do nothing. The rest is just leftovers from the code generation.
{
}
