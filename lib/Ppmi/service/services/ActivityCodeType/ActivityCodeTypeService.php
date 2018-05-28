<?php

class ActivityCodeTypeService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
  'IntegrationFaultType' => '\\IntegrationFaultType',
  'CreateActivityCodeTypes' => '\\CreateActivityCodeTypes',
  'CreateActivityCodeTypesResponse' => '\\CreateActivityCodeTypesResponse',
  'ReadActivityCodeTypes' => '\\ReadActivityCodeTypes',
  'ReadActivityCodeTypesResponse' => '\\ReadActivityCodeTypesResponse',
  'UpdateActivityCodeTypes' => '\\UpdateActivityCodeTypes',
  'UpdateActivityCodeTypesResponse' => '\\UpdateActivityCodeTypesResponse',
  'DeleteActivityCodeTypes' => '\\DeleteActivityCodeTypes',
  'DeleteActivityCodeTypesResponse' => '\\DeleteActivityCodeTypesResponse',
  'ActivityCodeType' => '\\ActivityCodeType',
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
        $wsdl = $ppmcfg['PPM_PROTOCOL'].'://'.$ppmcfg['PPM_HOST'].':'.$ppmcfg['PPM_PORT'].'/p6ws/services/ActivityCodeTypeService?wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param CreateActivityCodeTypes $params
     * @return CreateActivityCodeTypesResponse
     */
    public function CreateActivityCodeTypes(CreateActivityCodeTypes $params)
    {
      return $this->__soapCall('CreateActivityCodeTypes', array($params));
    }

    /**
     * @param ReadActivityCodeTypes $params
     * @return ReadActivityCodeTypesResponse
     */
    public function ReadActivityCodeTypes(ReadActivityCodeTypes $params)
    {
      return $this->__soapCall('ReadActivityCodeTypes', array($params));
    }

    /**
     * @param UpdateActivityCodeTypes $params
     * @return UpdateActivityCodeTypesResponse
     */
    public function UpdateActivityCodeTypes(UpdateActivityCodeTypes $params)
    {
      return $this->__soapCall('UpdateActivityCodeTypes', array($params));
    }

    /**
     * @param DeleteActivityCodeTypes $params
     * @return DeleteActivityCodeTypesResponse
     */
    public function DeleteActivityCodeTypes(DeleteActivityCodeTypes $params)
    {
      return $this->__soapCall('DeleteActivityCodeTypes', array($params));
    }

}
