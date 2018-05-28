<?php

class UpdateActivityCodes
{

    /**
     * @var ActivityCode[] $ActivityCode
     */
    protected $ActivityCode = null;

    /**
     * @param ActivityCode[] $ActivityCode
     */
    public function __construct(array $ActivityCode)
    {
      $this->ActivityCode = $ActivityCode;
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
     * @return UpdateActivityCodes
     */
    public function setActivityCode(array $ActivityCode)
    {
      $this->ActivityCode = $ActivityCode;
      return $this;
    }

}
