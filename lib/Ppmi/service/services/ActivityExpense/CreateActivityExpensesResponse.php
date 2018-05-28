<?php

class CreateActivityExpensesResponse
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
     * @return CreateActivityExpensesResponse
     */
    public function setObjectId(array $ObjectId = null)
    {
      $this->ObjectId = $ObjectId;
      return $this;
    }

}
