<?php

class ObjectId
{

    /**
     * @var int $ActivityObjectId
     */
    protected $ActivityObjectId = null;

    /**
     * @var int $ActivityCodeTypeObjectId
     */
    protected $ActivityCodeTypeObjectId = null;

    /**
     * @param int $ActivityObjectId
     * @param int $ActivityCodeTypeObjectId
     */
    public function __construct($ActivityObjectId, $ActivityCodeTypeObjectId)
    {
      $this->ActivityObjectId = $ActivityObjectId;
      $this->ActivityCodeTypeObjectId = $ActivityCodeTypeObjectId;
    }

    /**
     * @return int
     */
    public function getActivityObjectId()
    {
      return $this->ActivityObjectId;
    }

    /**
     * @param int $ActivityObjectId
     * @return ObjectId
     */
    public function setActivityObjectId($ActivityObjectId)
    {
      $this->ActivityObjectId = $ActivityObjectId;
      return $this;
    }

    /**
     * @return int
     */
    public function getActivityCodeTypeObjectId()
    {
      return $this->ActivityCodeTypeObjectId;
    }

    /**
     * @param int $ActivityCodeTypeObjectId
     * @return ObjectId
     */
    public function setActivityCodeTypeObjectId($ActivityCodeTypeObjectId)
    {
      $this->ActivityCodeTypeObjectId = $ActivityCodeTypeObjectId;
      return $this;
    }

}
