<?php

class DissolveActivity
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
     * @return DissolveActivity
     */
    public function setObjectId($ObjectId)
    {
      $this->ObjectId = $ObjectId;
      return $this;
    }

}
