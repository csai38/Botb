<?php


 function autoload_f0be650bf6c8013a71ad89690065245d($class)
{
    $classes = array(
        'ActivityCommentService' => __DIR__ .'/ActivityCommentService.php',
        'IntegrationFaultType' => __DIR__ .'/IntegrationFaultType.php',
        'IntegrationFaultCodeType' => __DIR__ .'/IntegrationFaultCodeType.php',
        'CreateActivityComments' => __DIR__ .'/CreateActivityComments.php',
        'CreateActivityCommentsResponse' => __DIR__ .'/CreateActivityCommentsResponse.php',
        'ReadActivityComments' => __DIR__ .'/ReadActivityComments.php',
        'ReadActivityCommentsResponse' => __DIR__ .'/ReadActivityCommentsResponse.php',
        'ActivityCommentFieldType' => __DIR__ .'/ActivityCommentFieldType.php',
        'UpdateActivityComments' => __DIR__ .'/UpdateActivityComments.php',
        'UpdateActivityCommentsResponse' => __DIR__ .'/UpdateActivityCommentsResponse.php',
        'ActivityComment' => __DIR__ .'/ActivityComment.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_f0be650bf6c8013a71ad89690065245d');

// Do nothing. The rest is just leftovers from the code generation.
{
}
