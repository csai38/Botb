<?php

class CopyActivityResponse
{

    /**
     * @var int $ObjectId
     */
    protected $ObjectId = null;

    /**
     * @param int $ObjectId
     */
    public function __construct($ObjectId)
    {
      $this->ObjectId = $ObjectId;
    }

    /**
     * @return int
     */
    public function getObjectId()
    {
      return $this->ObjectId;
    }

    /**
     * @param int $ObjectId
     * @return CopyActivityResponse
     */
    public function setObjectId($ObjectId)
    {
      $this->ObjectId = $ObjectId;
      return $this;
    }

}
