<?php

class CreateActivityOwners
{

    /**
     * @var ActivityOwner[] $ActivityOwner
     */
    protected $ActivityOwner = null;

    /**
     * @param ActivityOwner[] $ActivityOwner
     */
    public function __construct(array $ActivityOwner)
    {
      $this->ActivityOwner = $ActivityOwner;
    }

    /**
     * @return ActivityOwner[]
     */
    public function getActivityOwner()
    {
      return $this->ActivityOwner;
    }

    /**
     * @param ActivityOwner[] $ActivityOwner
     * @return CreateActivityOwners
     */
    public function setActivityOwner(array $ActivityOwner)
    {
      $this->ActivityOwner = $ActivityOwner;
      return $this;
    }

}
