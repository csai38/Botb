<?php


 function autoload_a250ca0f0536057b5a994bc5dd28366c($class)
{
    $classes = array(
        'ActivityNoteService' => __DIR__ .'/ActivityNoteService.php',
        'IntegrationFaultType' => __DIR__ .'/IntegrationFaultType.php',
        'IntegrationFaultCodeType' => __DIR__ .'/IntegrationFaultCodeType.php',
        'CreateActivityNotes' => __DIR__ .'/CreateActivityNotes.php',
        'CreateActivityNotesResponse' => __DIR__ .'/CreateActivityNotesResponse.php',
        'ReadActivityNotes' => __DIR__ .'/ReadActivityNotes.php',
        'ReadActivityNotesResponse' => __DIR__ .'/ReadActivityNotesResponse.php',
        'ActivityNoteFieldType' => __DIR__ .'/ActivityNoteFieldType.php',
        'UpdateActivityNotes' => __DIR__ .'/UpdateActivityNotes.php',
        'UpdateActivityNotesResponse' => __DIR__ .'/UpdateActivityNotesResponse.php',
        'DeleteActivityNotes' => __DIR__ .'/DeleteActivityNotes.php',
        'DeleteActivityNotesResponse' => __DIR__ .'/DeleteActivityNotesResponse.php',
        'ActivityNote' => __DIR__ .'/ActivityNote.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_a250ca0f0536057b5a994bc5dd28366c');

// Do nothing. The rest is just leftovers from the code generation.
{
}
