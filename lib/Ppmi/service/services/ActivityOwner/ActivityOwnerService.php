<?php

class ActivityOwnerService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
  'IntegrationFaultType' => '\\IntegrationFaultType',
  'CreateActivityOwners' => '\\CreateActivityOwners',
  'CreateActivityOwnersResponse' => '\\CreateActivityOwnersResponse',
  'ObjectId' => '\\ObjectId',
  'ReadActivityOwners' => '\\ReadActivityOwners',
  'ReadActivityOwnersResponse' => '\\ReadActivityOwnersResponse',
  'UpdateActivityOwners' => '\\UpdateActivityOwners',
  'UpdateActivityOwnersResponse' => '\\UpdateActivityOwnersResponse',
  'DeleteActivityOwners' => '\\DeleteActivityOwners',
  'DeleteActivityOwnersResponse' => '\\DeleteActivityOwnersResponse',
  'ActivityOwner' => '\\ActivityOwner',
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
        $wsdl = $ppmcfg['PPM_PROTOCOL'].'://'.$ppmcfg['PPM_HOST'].':'.$ppmcfg['PPM_PORT'].'/p6ws/services/ActivityOwnerService?wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param CreateActivityOwners $params
     * @return CreateActivityOwnersResponse
     */
    public function CreateActivityOwners(CreateActivityOwners $params)
    {
      return $this->__soapCall('CreateActivityOwners', array($params));
    }

    /**
     * @param ReadActivityOwners $params
     * @return ReadActivityOwnersResponse
     */
    public function ReadActivityOwners(ReadActivityOwners $params)
    {
      return $this->__soapCall('ReadActivityOwners', array($params));
    }

    /**
     * @param UpdateActivityOwners $params
     * @return UpdateActivityOwnersResponse
     */
    public function UpdateActivityOwners(UpdateActivityOwners $params)
    {
      return $this->__soapCall('UpdateActivityOwners', array($params));
    }

    /**
     * @param DeleteActivityOwners $params
     * @return DeleteActivityOwnersResponse
     */
    public function DeleteActivityOwners(DeleteActivityOwners $params)
    {
      return $this->__soapCall('DeleteActivityOwners', array($params));
    }

}
