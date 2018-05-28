<?php

class ActivityNoteService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
  'IntegrationFaultType' => '\\IntegrationFaultType',
  'CreateActivityNotes' => '\\CreateActivityNotes',
  'CreateActivityNotesResponse' => '\\CreateActivityNotesResponse',
  'ReadActivityNotes' => '\\ReadActivityNotes',
  'ReadActivityNotesResponse' => '\\ReadActivityNotesResponse',
  'UpdateActivityNotes' => '\\UpdateActivityNotes',
  'UpdateActivityNotesResponse' => '\\UpdateActivityNotesResponse',
  'DeleteActivityNotes' => '\\DeleteActivityNotes',
  'DeleteActivityNotesResponse' => '\\DeleteActivityNotesResponse',
  'ActivityNote' => '\\ActivityNote',
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
        $wsdl = $ppmcfg['PPM_PROTOCOL'].'://'.$ppmcfg['PPM_HOST'].':'.$ppmcfg['PPM_PORT'].'/p6ws/services/ActivityNoteService?wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param CreateActivityNotes $params
     * @return CreateActivityNotesResponse
     */
    public function CreateActivityNotes(CreateActivityNotes $params)
    {
      return $this->__soapCall('CreateActivityNotes', array($params));
    }

    /**
     * @param ReadActivityNotes $params
     * @return ReadActivityNotesResponse
     */
    public function ReadActivityNotes(ReadActivityNotes $params)
    {
      return $this->__soapCall('ReadActivityNotes', array($params));
    }

    /**
     * @param UpdateActivityNotes $params
     * @return UpdateActivityNotesResponse
     */
    public function UpdateActivityNotes(UpdateActivityNotes $params)
    {
      return $this->__soapCall('UpdateActivityNotes', array($params));
    }

    /**
     * @param DeleteActivityNotes $params
     * @return DeleteActivityNotesResponse
     */
    public function DeleteActivityNotes(DeleteActivityNotes $params)
    {
      return $this->__soapCall('DeleteActivityNotes', array($params));
    }

}
