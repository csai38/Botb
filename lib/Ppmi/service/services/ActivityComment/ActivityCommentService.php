<?php

class ActivityCommentService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
  'IntegrationFaultType' => '\\IntegrationFaultType',
  'CreateActivityComments' => '\\CreateActivityComments',
  'CreateActivityCommentsResponse' => '\\CreateActivityCommentsResponse',
  'ReadActivityComments' => '\\ReadActivityComments',
  'ReadActivityCommentsResponse' => '\\ReadActivityCommentsResponse',
  'UpdateActivityComments' => '\\UpdateActivityComments',
  'UpdateActivityCommentsResponse' => '\\UpdateActivityCommentsResponse',
  'ActivityComment' => '\\ActivityComment',
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
        $wsdl = $ppmcfg['PPM_PROTOCOL'].'://'.$ppmcfg['PPM_HOST'].':'.$ppmcfg['PPM_PORT'].'/p6ws/services/ActivityCommentService?wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param CreateActivityComments $params
     * @return CreateActivityCommentsResponse
     */
    public function CreateActivityComments(CreateActivityComments $params)
    {
      return $this->__soapCall('CreateActivityComments', array($params));
    }

    /**
     * @param ReadActivityComments $params
     * @return ReadActivityCommentsResponse
     */
    public function ReadActivityComments(ReadActivityComments $params)
    {
      return $this->__soapCall('ReadActivityComments', array($params));
    }

    /**
     * @param UpdateActivityComments $params
     * @return UpdateActivityCommentsResponse
     */
    public function UpdateActivityComments(UpdateActivityComments $params)
    {
      return $this->__soapCall('UpdateActivityComments', array($params));
    }

}
