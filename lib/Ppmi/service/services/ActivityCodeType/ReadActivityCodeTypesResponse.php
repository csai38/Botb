<?php

class ReadActivityCodeTypesResponse
{

    /**
     * @var ActivityCodeType[] $ActivityCodeType
     */
    protected $ActivityCodeType = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ActivityCodeType[]
     */
    public function getActivityCodeType()
    {
      return $this->ActivityCodeType;
    }

    /**
     * @param ActivityCodeType[] $ActivityCodeType
     * @return ReadActivityCodeTypesResponse
     */
    public function setActivityCodeType(array $ActivityCodeType = null)
    {
      $this->ActivityCodeType = $ActivityCodeType;
      return $this;
    }

}
