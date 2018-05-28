<?php

class DeleteActivityOwners
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
     * @return DeleteActivityOwners
     */
    public function setObjectId(array $ObjectId)
    {
      $this->ObjectId = $ObjectId;
      return $this;
    }

}
