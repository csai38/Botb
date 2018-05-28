<?php


 function autoload_d9e73da881994174ff2676c9ca21f24b($class)
{
    $classes = array(
        'ActivityPeriodActualService' => __DIR__ .'/ActivityPeriodActualService.php',
        'IntegrationFaultType' => __DIR__ .'/IntegrationFaultType.php',
        'IntegrationFaultCodeType' => __DIR__ .'/IntegrationFaultCodeType.php',
        'CreateActivityPeriodActuals' => __DIR__ .'/CreateActivityPeriodActuals.php',
        'CreateActivityPeriodActualsResponse' => __DIR__ .'/CreateActivityPeriodActualsResponse.php',
        'ObjectId' => __DIR__ .'/ObjectId.php',
        'ReadActivityPeriodActuals' => __DIR__ .'/ReadActivityPeriodActuals.php',
        'ReadActivityPeriodActualsResponse' => __DIR__ .'/ReadActivityPeriodActualsResponse.php',
        'ActivityPeriodActualFieldType' => __DIR__ .'/ActivityPeriodActualFieldType.php',
        'UpdateActivityPeriodActuals' => __DIR__ .'/UpdateActivityPeriodActuals.php',
        'UpdateActivityPeriodActualsResponse' => __DIR__ .'/UpdateActivityPeriodActualsResponse.php',
        'DeleteActivityPeriodActuals' => __DIR__ .'/DeleteActivityPeriodActuals.php',
        'DeleteActivityPeriodActualsResponse' => __DIR__ .'/DeleteActivityPeriodActualsResponse.php',
        'ActivityPeriodActual' => __DIR__ .'/ActivityPeriodActual.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_d9e73da881994174ff2676c9ca21f24b');

// Do nothing. The rest is just leftovers from the code generation.
{
}
