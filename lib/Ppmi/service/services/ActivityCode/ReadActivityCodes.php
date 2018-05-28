<?php

class ReadActivityCodes
{

    /**
     * @var ActivityCodeFieldType[] $Field
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
     * @param ActivityCodeFieldType[] $Field
     */
    public function __construct(array $Field)
    {
      $this->Field = $Field;
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
     * @return ReadActivityCodes
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
     * @return ReadActivityCodes
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
     * @return ReadActivityCodes
     */
    public function setOrderBy($OrderBy)
    {
      $this->OrderBy = $OrderBy;
      return $this;
    }

}
