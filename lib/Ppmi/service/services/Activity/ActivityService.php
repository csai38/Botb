<?php

class ActivityService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
  'IntegrationFaultType' => '\\IntegrationFaultType',
  'CreateActivities' => '\\CreateActivities',
  'CreateActivitiesResponse' => '\\CreateActivitiesResponse',
  'ReadActivities' => '\\ReadActivities',
  'ReadActivitiesResponse' => '\\ReadActivitiesResponse',
  'UpdateActivities' => '\\UpdateActivities',
  'UpdateActivitiesResponse' => '\\UpdateActivitiesResponse',
  'DeleteActivities' => '\\DeleteActivities',
  'DeleteActivitiesResponse' => '\\DeleteActivitiesResponse',
  'CopyActivity' => '\\CopyActivity',
  'CopyActivityResponse' => '\\CopyActivityResponse',
  'ReadAllActivitiesByWBS' => '\\ReadAllActivitiesByWBS',
  'ReadAllActivitiesByWBSResponse' => '\\ReadAllActivitiesByWBSResponse',
  'DissolveActivity' => '\\DissolveActivity',
  'DissolveActivityResponse' => '\\DissolveActivityResponse',
  'Activity' => '\\Activity',
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
        $wsdl = $ppmcfg['PPM_PROTOCOL'].'://'.$ppmcfg['PPM_HOST'].':'.$ppmcfg['PPM_PORT'].'/p6ws/services/ActivityService?wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param CreateActivities $params
     * @return CreateActivitiesResponse
     */
    public function CreateActivities(CreateActivities $params)
    {
      return $this->__soapCall('CreateActivities', array($params));
    }

    /**
     * @param ReadActivities $params
     * @return ReadActivitiesResponse
     */
    public function ReadActivities(ReadActivities $params)
    {
      return $this->__soapCall('ReadActivities', array($params));
    }

    /**
     * @param UpdateActivities $params
     * @return UpdateActivitiesResponse
     */
    public function UpdateActivities(UpdateActivities $params)
    {
      return $this->__soapCall('UpdateActivities', array($params));
    }

    /**
     * @param DeleteActivities $params
     * @return DeleteActivitiesResponse
     */
    public function DeleteActivities(DeleteActivities $params)
    {
      return $this->__soapCall('DeleteActivities', array($params));
    }

    /**
     * @param CopyActivity $params
     * @return CopyActivityResponse
     */
    public function CopyActivity(CopyActivity $params)
    {
      return $this->__soapCall('CopyActivity', array($params));
    }

    /**
     * @param ReadAllActivitiesByWBS $params
     * @return ReadAllActivitiesByWBSResponse
     */
    public function ReadAllActivitiesByWBS(ReadAllActivitiesByWBS $params)
    {
      return $this->__soapCall('ReadAllActivitiesByWBS', array($params));
    }

    /**
     * @param DissolveActivity $params
     * @return DissolveActivityResponse
     */
    public function DissolveActivity(DissolveActivity $params)
    {
      return $this->__soapCall('DissolveActivity', array($params));
    }

}
