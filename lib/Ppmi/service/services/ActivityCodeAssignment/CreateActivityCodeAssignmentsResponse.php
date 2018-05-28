<?php

class CreateActivityCodeAssignmentsResponse
{

    /**
     * @var ObjectId[] $ObjectId
     */
    protected $ObjectId = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ObjectId[]
     */
    public function getObjectId()
    {
      return $this->ObjectId;
    }

    /**
     * @param ObjectId[] $ObjectId
     * @return CreateActivityCodeAssignmentsResponse
     */
    public function setObjectId(array $ObjectId = null)
    {
      $this->ObjectId = $ObjectId;
      return $this;
    }

}
