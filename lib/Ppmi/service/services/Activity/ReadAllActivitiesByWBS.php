<?php

class ReadAllActivitiesByWBS
{

    /**
     * @var int $WBSObjectId
     */
    protected $WBSObjectId = null;

    /**
     * @var ActivityFieldType[] $Field
     */
    protected $Field = null;

    /**
     * @var string $Filter
     */
    protected $Filter = null;

    /**
     * @var string $OrderBy
     */
    protected $OrderBy = null;

    /**
     * @param int $WBSObjectId
     * @param ActivityFieldType[] $Field
     */
    public function __construct($WBSObjectId, array $Field)
    {
      $this->WBSObjectId = $WBSObjectId;
      $this->Field = $Field;
    }

    /**
     * @return int
     */
    public function getWBSObjectId()
    {
      return $this->WBSObjectId;
    }

    /**
     * @param int $WBSObjectId
     * @return ReadAllActivitiesByWBS
     */
    public function setWBSObjectId($WBSObjectId)
    {
      $this->WBSObjectId = $WBSObjectId;
      return $this;
    }

    /**
     * @return ActivityFieldType[]
     */
    public function getField()
    {
      return $this->Field;
    }

    /**
     * @param ActivityFieldType[] $Field
     * @return ReadAllActivitiesByWBS
     */
    public function setField(array $Field)
    {
      $this->Field = $Field;
      return $this;
    }

    /**
     * @return string
     */
    public function getFilter()
    {
      return $this->Filter;
    }

    /**
     * @param string $Filter
     * @return ReadAllActivitiesByWBS
     */
    public function setFilter($Filter)
    {
      $this->Filter = $Filter;
      return $this;
    }

    /**
     * @return string
     */
    public function getOrderBy()
    {
      return $this->OrderBy;
    }

    /**
     * @param string $OrderBy
     * @return ReadAllActivitiesByWBS
     */
    public function setOrderBy($OrderBy)
    {
      $this->OrderBy = $OrderBy;
      return $this;
    }

}
