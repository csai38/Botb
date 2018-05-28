<?php

class ActivityCodeAssignmentService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
  'IntegrationFaultType' => '\\IntegrationFaultType',
  'CreateActivityCodeAssignments' => '\\CreateActivityCodeAssignments',
  'CreateActivityCodeAssignmentsResponse' => '\\CreateActivityCodeAssignmentsResponse',
  'ObjectId' => '\\ObjectId',
  'ReadActivityCodeAssignments' => '\\ReadActivityCodeAssignments',
  'ReadActivityCodeAssignmentsResponse' => '\\ReadActivityCodeAssignmentsResponse',
  'UpdateActivityCodeAssignments' => '\\UpdateActivityCodeAssignments',
  'UpdateActivityCodeAssignmentsResponse' => '\\UpdateActivityCodeAssignmentsResponse',
  'DeleteActivityCodeAssignments' => '\\DeleteActivityCodeAssignments',
  'DeleteActivityCodeAssignmentsResponse' => '\\DeleteActivityCodeAssignmentsResponse',
  'ActivityCodeAssignment' => '\\ActivityCodeAssignment',
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
        $wsdl = $ppmcfg['PPM_PROTOCOL'].'://'.$ppmcfg['PPM_HOST'].':'.$ppmcfg['PPM_PORT'].'/p6ws/services/ActivityCodeAssignmentService?wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param CreateActivityCodeAssignments $params
     * @return CreateActivityCodeAssignmentsResponse
     */
    public function CreateActivityCodeAssignments(CreateActivityCodeAssignments $params)
    {
      return $this->__soapCall('CreateActivityCodeAssignments', array($params));
    }

    /**
     * @param ReadActivityCodeAssignments $params
     * @return ReadActivityCodeAssignmentsResponse
     */
    public function ReadActivityCodeAssignments(ReadActivityCodeAssignments $params)
    {
      return $this->__soapCall('ReadActivityCodeAssignments', array($params));
    }

    /**
     * @param UpdateActivityCodeAssignments $params
     * @return UpdateActivityCodeAssignmentsResponse
     */
    public function UpdateActivityCodeAssignments(UpdateActivityCodeAssignments $params)
    {
      return $this->__soapCall('UpdateActivityCodeAssignments', array($params));
    }

    /**
     * @param DeleteActivityCodeAssignments $params
     * @return DeleteActivityCodeAssignmentsResponse
     */
    public function DeleteActivityCodeAssignments(DeleteActivityCodeAssignments $params)
    {
      return $this->__soapCall('DeleteActivityCodeAssignments', array($params));
    }

}
