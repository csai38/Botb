<?php

class CreateActivitiesResponse
{

    /**
     * @var int[] $ObjectId
     */
    protected $ObjectId = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int[]
     */
    public function getObjectId()
    {
      return $this->ObjectId;
    }

    /**
     * @param int[] $ObjectId
     * @return CreateActivitiesResponse
     */
    public function setObjectId(array $ObjectId = null)
    {
      $this->ObjectId = $ObjectId;
      return $this;
    }

}
