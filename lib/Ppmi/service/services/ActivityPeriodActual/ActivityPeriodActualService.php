<?php

class ActivityPeriodActualService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
  'IntegrationFaultType' => '\\IntegrationFaultType',
  'CreateActivityPeriodActuals' => '\\CreateActivityPeriodActuals',
  'CreateActivityPeriodActualsResponse' => '\\CreateActivityPeriodActualsResponse',
  'ObjectId' => '\\ObjectId',
  'ReadActivityPeriodActuals' => '\\ReadActivityPeriodActuals',
  'ReadActivityPeriodActualsResponse' => '\\ReadActivityPeriodActualsResponse',
  'UpdateActivityPeriodActuals' => '\\UpdateActivityPeriodActuals',
  'UpdateActivityPeriodActualsResponse' => '\\UpdateActivityPeriodActualsResponse',
  'DeleteActivityPeriodActuals' => '\\DeleteActivityPeriodActuals',
  'DeleteActivityPeriodActualsResponse' => '\\DeleteActivityPeriodActualsResponse',
  'ActivityPeriodActual' => '\\ActivityPeriodActual',
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
        $wsdl = $ppmcfg['PPM_PROTOCOL'].'://'.$ppmcfg['PPM_HOST'].':'.$ppmcfg['PPM_PORT'].'/p6ws/services/ActivityPeriodActualService?wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param CreateActivityPeriodActuals $params
     * @return CreateActivityPeriodActualsResponse
     */
    public function CreateActivityPeriodActuals(CreateActivityPeriodActuals $params)
    {
      return $this->__soapCall('CreateActivityPeriodActuals', array($params));
    }

    /**
     * @param ReadActivityPeriodActuals $params
     * @return ReadActivityPeriodActualsResponse
     */
    public function ReadActivityPeriodActuals(ReadActivityPeriodActuals $params)
    {
      return $this->__soapCall('ReadActivityPeriodActuals', array($params));
    }

    /**
     * @param UpdateActivityPeriodActuals $params
     * @return UpdateActivityPeriodActualsResponse
     */
    public function UpdateActivityPeriodActuals(UpdateActivityPeriodActuals $params)
    {
      return $this->__soapCall('UpdateActivityPeriodActuals', array($params));
    }

    /**
     * @param DeleteActivityPeriodActuals $params
     * @return DeleteActivityPeriodActualsResponse
     */
    public function DeleteActivityPeriodActuals(DeleteActivityPeriodActuals $params)
    {
      return $this->__soapCall('DeleteActivityPeriodActuals', array($params));
    }

}
