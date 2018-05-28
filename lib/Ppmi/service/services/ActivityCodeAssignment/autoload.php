<?php


 function autoload_d8892ff4f7e5e8ee5fbffd012b4c9d5f($class)
{
    $classes = array(
        'ActivityCodeAssignmentService' => __DIR__ .'/ActivityCodeAssignmentService.php',
        'IntegrationFaultType' => __DIR__ .'/IntegrationFaultType.php',
        'IntegrationFaultCodeType' => __DIR__ .'/IntegrationFaultCodeType.php',
        'CreateActivityCodeAssignments' => __DIR__ .'/CreateActivityCodeAssignments.php',
        'CreateActivityCodeAssignmentsResponse' => __DIR__ .'/CreateActivityCodeAssignmentsResponse.php',
        'ObjectId' => __DIR__ .'/ObjectId.php',
        'ReadActivityCodeAssignments' => __DIR__ .'/ReadActivityCodeAssignments.php',
        'ReadActivityCodeAssignmentsResponse' => __DIR__ .'/ReadActivityCodeAssignmentsResponse.php',
        'ActivityCodeAssignmentFieldType' => __DIR__ .'/ActivityCodeAssignmentFieldType.php',
        'UpdateActivityCodeAssignments' => __DIR__ .'/UpdateActivityCodeAssignments.php',
        'UpdateActivityCodeAssignmentsResponse' => __DIR__ .'/UpdateActivityCodeAssignmentsResponse.php',
        'DeleteActivityCodeAssignments' => __DIR__ .'/DeleteActivityCodeAssignments.php',
        'DeleteActivityCodeAssignmentsResponse' => __DIR__ .'/DeleteActivityCodeAssignmentsResponse.php',
        'ActivityCodeAssignment' => __DIR__ .'/ActivityCodeAssignment.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_d8892ff4f7e5e8ee5fbffd012b4c9d5f');

// Do nothing. The rest is just leftovers from the code generation.
{
}
