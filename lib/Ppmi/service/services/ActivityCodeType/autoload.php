<?php


 function autoload_f1a4b5d093139aadda5a48822168977d($class)
{
    $classes = array(
        'ActivityCodeTypeService' => __DIR__ .'/ActivityCodeTypeService.php',
        'IntegrationFaultType' => __DIR__ .'/IntegrationFaultType.php',
        'IntegrationFaultCodeType' => __DIR__ .'/IntegrationFaultCodeType.php',
        'CreateActivityCodeTypes' => __DIR__ .'/CreateActivityCodeTypes.php',
        'CreateActivityCodeTypesResponse' => __DIR__ .'/CreateActivityCodeTypesResponse.php',
        'ReadActivityCodeTypes' => __DIR__ .'/ReadActivityCodeTypes.php',
        'ReadActivityCodeTypesResponse' => __DIR__ .'/ReadActivityCodeTypesResponse.php',
        'ActivityCodeTypeFieldType' => __DIR__ .'/ActivityCodeTypeFieldType.php',
        'UpdateActivityCodeTypes' => __DIR__ .'/UpdateActivityCodeTypes.php',
        'UpdateActivityCodeTypesResponse' => __DIR__ .'/UpdateActivityCodeTypesResponse.php',
        'DeleteActivityCodeTypes' => __DIR__ .'/DeleteActivityCodeTypes.php',
        'DeleteActivityCodeTypesResponse' => __DIR__ .'/DeleteActivityCodeTypesResponse.php',
        'ActivityCodeType' => __DIR__ .'/ActivityCodeType.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_f1a4b5d093139aadda5a48822168977d');

// Do nothing. The rest is just leftovers from the code generation.
{
}
