<?php


 function autoload_4ec75f6d2016fb810a50dec08c60e0ce($class)
{
    $classes = array(
        'ActivityService' => __DIR__ .'/ActivityService.php',
        'IntegrationFaultType' => __DIR__ .'/IntegrationFaultType.php',
        'IntegrationFaultCodeType' => __DIR__ .'/IntegrationFaultCodeType.php',
        'CreateActivities' => __DIR__ .'/CreateActivities.php',
        'CreateActivitiesResponse' => __DIR__ .'/CreateActivitiesResponse.php',
        'ReadActivities' => __DIR__ .'/ReadActivities.php',
        'ReadActivitiesResponse' => __DIR__ .'/ReadActivitiesResponse.php',
        'ActivityFieldType' => __DIR__ .'/ActivityFieldType.php',
        'UpdateActivities' => __DIR__ .'/UpdateActivities.php',
        'UpdateActivitiesResponse' => __DIR__ .'/UpdateActivitiesResponse.php',
        'DeleteActivities' => __DIR__ .'/DeleteActivities.php',
        'DeleteActivitiesResponse' => __DIR__ .'/DeleteActivitiesResponse.php',
        'CopyActivity' => __DIR__ .'/CopyActivity.php',
        'CopyActivityResponse' => __DIR__ .'/CopyActivityResponse.php',
        'ReadAllActivitiesByWBS' => __DIR__ .'/ReadAllActivitiesByWBS.php',
        'ReadAllActivitiesByWBSResponse' => __DIR__ .'/ReadAllActivitiesByWBSResponse.php',
        'DissolveActivity' => __DIR__ .'/DissolveActivity.php',
        'DissolveActivityResponse' => __DIR__ .'/DissolveActivityResponse.php',
        'Activity' => __DIR__ .'/Activity.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_4ec75f6d2016fb810a50dec08c60e0ce');

// Do nothing. The rest is just leftovers from the code generation.
{
}
