<?php


 function autoload_0acc4deebf438020607555467ec48001($class)
{
    $classes = array(
        'ActivityOwnerService' => __DIR__ .'/ActivityOwnerService.php',
        'IntegrationFaultType' => __DIR__ .'/IntegrationFaultType.php',
        'IntegrationFaultCodeType' => __DIR__ .'/IntegrationFaultCodeType.php',
        'CreateActivityOwners' => __DIR__ .'/CreateActivityOwners.php',
        'CreateActivityOwnersResponse' => __DIR__ .'/CreateActivityOwnersResponse.php',
        'ObjectId' => __DIR__ .'/ObjectId.php',
        'ReadActivityOwners' => __DIR__ .'/ReadActivityOwners.php',
        'ReadActivityOwnersResponse' => __DIR__ .'/ReadActivityOwnersResponse.php',
        'ActivityOwnerFieldType' => __DIR__ .'/ActivityOwnerFieldType.php',
        'UpdateActivityOwners' => __DIR__ .'/UpdateActivityOwners.php',
        'UpdateActivityOwnersResponse' => __DIR__ .'/UpdateActivityOwnersResponse.php',
        'DeleteActivityOwners' => __DIR__ .'/DeleteActivityOwners.php',
        'DeleteActivityOwnersResponse' => __DIR__ .'/DeleteActivityOwnersResponse.php',
        'ActivityOwner' => __DIR__ .'/ActivityOwner.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_0acc4deebf438020607555467ec48001');

// Do nothing. The rest is just leftovers from the code generation.
{
}
