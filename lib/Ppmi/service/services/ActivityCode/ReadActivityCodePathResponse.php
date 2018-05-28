<?php

class ReadActivityCodePathResponse
{

    /**
     * @var ActivityCode[] $ActivityCode
     */
    protected $ActivityCode = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ActivityCode[]
     */
    public function getActivityCode()
    {
      return $this->ActivityCode;
    }

    /**
     * @param ActivityCode[] $ActivityCode
     * @return ReadActivityCodePathResponse
     */
    public function setActivityCode(array $ActivityCode = null)
    {
      $this->ActivityCode = $ActivityCode;
      return $this;
    }

}
