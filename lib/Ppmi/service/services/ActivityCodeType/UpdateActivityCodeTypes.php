<?php

class UpdateActivityCodeTypes
{

    /**
     * @var ActivityCodeType[] $ActivityCodeType
     */
    protected $ActivityCodeType = null;

    /**
     * @param ActivityCodeType[] $ActivityCodeType
     */
    public function __construct(array $ActivityCodeType)
    {
      $this->ActivityCodeType = $ActivityCodeType;
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
     * @return UpdateActivityCodeTypes
     */
    public function setActivityCodeType(array $ActivityCodeType)
    {
      $this->ActivityCodeType = $ActivityCodeType;
      return $this;
    }

}
