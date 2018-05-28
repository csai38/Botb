<?php

class ReadActivityNotes
{

    /**
     * @var ActivityNoteFieldType[] $Field
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
     * @param ActivityNoteFieldType[] $Field
     */
    public function __construct(array $Field)
    {
      $this->Field = $Field;
    }

    /**
     * @return ActivityNoteFieldType[]
     */
    public function getField()
    {
      return $this->Field;
    }

    /**
     * @param ActivityNoteFieldType[] $Field
     * @return ReadActivityNotes
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
     * @return ReadActivityNotes
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
     * @return ReadActivityNotes
     */
    public function setOrderBy($OrderBy)
    {
      $this->OrderBy = $OrderBy;
      return $this;
    }

}
