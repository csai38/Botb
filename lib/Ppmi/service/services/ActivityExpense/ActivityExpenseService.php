<?php

class ActivityExpenseService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
  'IntegrationFaultType' => '\\IntegrationFaultType',
  'CreateActivityExpenses' => '\\CreateActivityExpenses',
  'CreateActivityExpensesResponse' => '\\CreateActivityExpensesResponse',
  'ReadActivityExpenses' => '\\ReadActivityExpenses',
  'ReadActivityExpensesResponse' => '\\ReadActivityExpensesResponse',
  'UpdateActivityExpenses' => '\\UpdateActivityExpenses',
  'UpdateActivityExpensesResponse' => '\\UpdateActivityExpensesResponse',
  'DeleteActivityExpenses' => '\\DeleteActivityExpenses',
  'DeleteActivityExpensesResponse' => '\\DeleteActivityExpensesResponse',
  'ReadAllActivityExpensesByWBS' => '\\ReadAllActivityExpensesByWBS',
  'ReadAllActivityExpensesByWBSResponse' => '\\ReadAllActivityExpensesByWBSResponse',
  'ActivityExpense' => '\\ActivityExpense',
);

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     */
    public function __construct(array $options = array(), $wsdl = null)
    {
    
  foreach (self::$classmap as $key => $value) {
    if (!isset($options['classmap'][$key])) {
      $options['classmap'][$key] = $value;
    }
  }
      $options = array_merge(array (
  'features' => 1,
), $options);
      if (!$wsdl) { global $ppmcfg;
        $wsdl = $ppmcfg['PPM_PROTOCOL'].'://'.$ppmcfg['PPM_HOST'].':'.$ppmcfg['PPM_PORT'].'/p6ws/services/ActivityExpenseService?wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param CreateActivityExpenses $params
     * @return CreateActivityExpensesResponse
     */
    public function CreateActivityExpenses(CreateActivityExpenses $params)
    {
      return $this->__soapCall('CreateActivityExpenses', array($params));
    }

    /**
     * @param ReadActivityExpenses $params
     * @return ReadActivityExpensesResponse
     */
    public function ReadActivityExpenses(ReadActivityExpenses $params)
    {
      return $this->__soapCall('ReadActivityExpenses', array($params));
    }

    /**
     * @param UpdateActivityExpenses $params
     * @return UpdateActivityExpensesResponse
     */
    public function UpdateActivityExpenses(UpdateActivityExpenses $params)
    {
      return $this->__soapCall('UpdateActivityExpenses', array($params));
    }

    /**
     * @param DeleteActivityExpenses $params
     * @return DeleteActivityExpensesResponse
     */
    public function DeleteActivityExpenses(DeleteActivityExpenses $params)
    {
      return $this->__soapCall('DeleteActivityExpenses', array($params));
    }

    /**
     * @param ReadAllActivityExpensesByWBS $params
     * @return ReadAllActivityExpensesByWBSResponse
     */
    public function ReadAllActivityExpensesByWBS(ReadAllActivityExpensesByWBS $params)
    {
      return $this->__soapCall('ReadAllActivityExpensesByWBS', array($params));
    }

}
