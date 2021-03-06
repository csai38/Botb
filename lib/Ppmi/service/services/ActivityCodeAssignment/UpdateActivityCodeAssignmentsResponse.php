<?php

class UpdateActivityCodeAssignmentsResponse
{

    /**
     * @var boolean $Return
     */
    protected $Return = null;

    /**
     * @param boolean $Return
     */
    public function __construct($Return)
    {
      $this->Return = $Return;
    }

    /**
     * @return boolean
     */
    public function getReturn()
    {
      return $this->Return;
    }

    /**
     * @param boolean $Return
     * @return UpdateActivityCodeAssignmentsResponse
     */
    public function setReturn($Return)
    {
      $this->Return = $Return;
      return $this;
    }

}
