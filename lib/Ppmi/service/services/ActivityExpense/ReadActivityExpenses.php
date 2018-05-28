<?php

class ReadActivityExpenses
{

    /**
     * @var ActivityExpenseFieldType[] $Field
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
     * @param ActivityExpenseFieldType[] $Field
     */
    public function __construct(array $Field)
    {
      $this->Field = $Field;
    }

    /**
     * @return ActivityExpenseFieldType[]
     */
    public function getField()
    {
      return $this->Field;
    }

    /**
     * @param ActivityExpenseFieldType[] $Field
     * @return ReadActivityExpenses
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
     * @return ReadActivityExpenses
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
     * @return ReadActivityExpenses
     */
    public function setOrderBy($OrderBy)
    {
      $this->OrderBy = $OrderBy;
      return $this;
    }

}
