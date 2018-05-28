<?php

class IntegrationFaultType
{

    /**
     * @var IntegrationFaultCodeType $ErrorType
     */
    protected $ErrorType = null;

    /**
     * @var int $ErrorCode
     */
    protected $ErrorCode = null;

    /**
     * @var string $ErrorDescription
     */
    protected $ErrorDescription = null;

    /**
     * @var string $StackTrace
     */
    protected $StackTrace = null;

    /**
     * @param IntegrationFaultCodeType $ErrorType
     * @param int $ErrorCode
     */
    public function __construct($ErrorType, $ErrorCode)
    {
      $this->ErrorType = $ErrorType;
      $this->ErrorCode = $ErrorCode;
    }

    /**
     * @return IntegrationFaultCodeType
     */
    public function getErrorType()
    {
      return $this->ErrorType;
    }

    /**
     * @param IntegrationFaultCodeType $ErrorType
     * @return IntegrationFaultType
     */
    public function setErrorType($ErrorType)
    {
      $this->ErrorType = $ErrorType;
      return $this;
    }

    /**
     * @return int
     */
    public function getErrorCode()
    {
      return $this->ErrorCode;
    }

    /**
     * @param int $ErrorCode
     * @return IntegrationFaultType
     */
    public function setErrorCode($ErrorCode)
    {
      $this->ErrorCode = $ErrorCode;
      return $this;
    }

    /**
     * @return string
     */
    public function getErrorDescription()
    {
      return $this->ErrorDescription;
    }

    /**
     * @param string $ErrorDescription
     * @return IntegrationFaultType
     */
    public function setErrorDescription($ErrorDescription)
    {
      $this->ErrorDescription = $ErrorDescription;
      return $this;
    }

    /**
     * @return string
     */
    public function getStackTrace()
    {
      return $this->StackTrace;
    }

    /**
     * @param string $StackTrace
     * @return IntegrationFaultType
     */
    public function setStackTrace($StackTrace)
    {
      $this->StackTrace = $StackTrace;
      return $this;
    }

}
