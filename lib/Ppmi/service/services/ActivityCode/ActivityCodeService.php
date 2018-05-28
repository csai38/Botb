<?php

class ActivityCodeService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
  'IntegrationFaultType' => '\\IntegrationFaultType',
  'CreateActivityCodes' => '\\CreateActivityCodes',
  'CreateActivityCodesResponse' => '\\CreateActivityCodesResponse',
  'ReadActivityCodes' => '\\ReadActivityCodes',
  'ReadActivityCodesResponse' => '\\ReadActivityCodesResponse',
  'UpdateActivityCodes' => '\\UpdateActivityCodes',
  'UpdateActivityCodesResponse' => '\\UpdateActivityCodesResponse',
  'DeleteActivityCodes' => '\\DeleteActivityCodes',
  'DeleteActivityCodesResponse' => '\\DeleteActivityCodesResponse',
  'ReadActivityCodePath' => '\\ReadActivityCodePath',
  'ReadActivityCodePathResponse' => '\\ReadActivityCodePathResponse',
  'ActivityCode' => '\\ActivityCode',
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
        $wsdl = $ppmcfg['PPM_PROTOCOL'].'://'.$ppmcfg['PPM_HOST'].':'.$ppmcfg['PPM_PORT'].'/p6ws/services/ActivityCodeService?wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param CreateActivityCodes $params
     * @return CreateActivityCodesResponse
     */
    public function CreateActivityCodes(CreateActivityCodes $params)
    {
      return $this->__soapCall('CreateActivityCodes', array($params));
    }

    /**
     * @param ReadActivityCodes $params
     * @return ReadActivityCodesResponse
     */
    public function ReadActivityCodes(ReadActivityCodes $params)
    {
      return $this->__soapCall('ReadActivityCodes', array($params));
    }

    /**
     * @param UpdateActivityCodes $params
     * @return UpdateActivityCodesResponse
     */
    public function UpdateActivityCodes(UpdateActivityCodes $params)
    {
      return $this->__soapCall('UpdateActivityCodes', array($params));
    }

    /**
     * @param DeleteActivityCodes $params
     * @return DeleteActivityCodesResponse
     */
    public function DeleteActivityCodes(DeleteActivityCodes $params)
    {
      return $this->__soapCall('DeleteActivityCodes', array($params));
    }

    /**
     * @param ReadActivityCodePath $params
     * @return ReadActivityCodePathResponse
     */
    public function ReadActivityCodePath(ReadActivityCodePath $params)
    {
      return $this->__soapCall('ReadActivityCodePath', array($params));
    }

}
