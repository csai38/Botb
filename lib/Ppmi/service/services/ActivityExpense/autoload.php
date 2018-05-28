<?php


 function autoload_e3b8cea74d29e51a21dd84843ac99b65($class)
{
    $classes = array(
        'ActivityExpenseService' => __DIR__ .'/ActivityExpenseService.php',
        'IntegrationFaultType' => __DIR__ .'/IntegrationFaultType.php',
        'IntegrationFaultCodeType' => __DIR__ .'/IntegrationFaultCodeType.php',
        'CreateActivityExpenses' => __DIR__ .'/CreateActivityExpenses.php',
        'CreateActivityExpensesResponse' => __DIR__ .'/CreateActivityExpensesResponse.php',
        'ReadActivityExpenses' => __DIR__ .'/ReadActivityExpenses.php',
        'ReadActivityExpensesResponse' => __DIR__ .'/ReadActivityExpensesResponse.php',
        'ActivityExpenseFieldType' => __DIR__ .'/ActivityExpenseFieldType.php',
        'UpdateActivityExpenses' => __DIR__ .'/UpdateActivityExpenses.php',
        'UpdateActivityExpensesResponse' => __DIR__ .'/UpdateActivityExpensesResponse.php',
        'DeleteActivityExpenses' => __DIR__ .'/DeleteActivityExpenses.php',
        'DeleteActivityExpensesResponse' => __DIR__ .'/DeleteActivityExpensesResponse.php',
        'ReadAllActivityExpensesByWBS' => __DIR__ .'/ReadAllActivityExpensesByWBS.php',
        'ReadAllActivityExpensesByWBSResponse' => __DIR__ .'/ReadAllActivityExpensesByWBSResponse.php',
        'ActivityExpense' => __DIR__ .'/ActivityExpense.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_e3b8cea74d29e51a21dd84843ac99b65');

// Do nothing. The rest is just leftovers from the code generation.
{
}
