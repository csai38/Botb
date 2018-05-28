<?php

class ReadActivityCodeTypes
{

    /**
     * @var ActivityCodeTypeFieldType[] $Field
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
     * @param ActivityCodeTypeFieldType[] $Field
     */
    public function __construct(array $Field)
    {
      $this->Field = $Field;
    }

    /**
     * @return ActivityCodeTypeFieldType[]
     */
    public function getField()
    {
      return $this->Field;
    }

    /**
     * @param ActivityCodeTypeFieldType[] $Field
     * @return ReadActivityCodeTypes
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
     * @return ReadActivityCodeTypes
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
     * @return ReadActivityCodeTypes
     */
    public function setOrderBy($OrderBy)
    {
      $this->OrderBy = $OrderBy;
      return $this;
    }

}
