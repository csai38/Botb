<?php

class DeleteActivityCodeAssignments
{

    /**
     * @var ObjectId[] $ObjectId
     */
    protected $ObjectId = null;

    /**
     * @param ObjectId[] $ObjectId
     */
    public function __construct(array $ObjectId)
    {
      $this->ObjectId = $ObjectId;
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
     * @return DeleteActivityCodeAssignments
     */
    public function setObjectId(array $ObjectId)
    {
      $this->ObjectId = $ObjectId;
      return $this;
    }

}
