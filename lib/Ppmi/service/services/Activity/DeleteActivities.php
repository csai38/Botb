<?php

class DeleteActivities
{

    /**
     * @var int[] $ObjectId
     */
    protected $ObjectId = null;

    /**
     * @param int[] $ObjectId
     */
    public function __construct(array $ObjectId)
    {
      $this->ObjectId = $ObjectId;
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
     * @return DeleteActivities
     */
    public function setObjectId(array $ObjectId)
    {
      $this->ObjectId = $ObjectId;
      return $this;
    }

}
