<?php

class ReadActivityCodePath
{

    /**
     * @var int[] $ObjectId
     */
    protected $ObjectId = null;

    /**
     * @var ActivityCodeFieldType[] $Field
     */
    protected $Field = null;

    /**
     * @param int[] $ObjectId
     * @param ActivityCodeFieldType[] $Field
     */
    public function __construct(array $ObjectId, array $Field)
    {
      $this->ObjectId = $ObjectId;
      $this->Field = $Field;
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
     * @return ReadActivityCodePath
     */
    public function setObjectId(array $ObjectId)
    {
      $this->ObjectId = $ObjectId;
      return $this;
    }

    /**
     * @return ActivityCodeFieldType[]
     */
    public function getField()
    {
      return $this->Field;
    }

    /**
     * @param ActivityCodeFieldType[] $Field
     * @return ReadActivityCodePath
     */
    public function setField(array $Field)
    {
      $this->Field = $Field;
      return $this;
    }

}
