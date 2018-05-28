<?php

class ReadActivityCodeAssignments
{

    /**
     * @var ActivityCodeAssignmentFieldType[] $Field
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
     * @param ActivityCodeAssignmentFieldType[] $Field
     */
    public function __construct(array $Field)
    {
      $this->Field = $Field;
    }

    /**
     * @return ActivityCodeAssignmentFieldType[]
     */
    public function getField()
    {
      return $this->Field;
    }

    /**
     * @param ActivityCodeAssignmentFieldType[] $Field
     * @return ReadActivityCodeAssignments
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
     * @return ReadActivityCodeAssignments
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
     * @return ReadActivityCodeAssignments
     */
    public function setOrderBy($OrderBy)
    {
      $this->OrderBy = $OrderBy;
      return $this;
    }

}
