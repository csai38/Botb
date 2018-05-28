<?php

class ReadActivityCodeAssignmentsResponse
{

    /**
     * @var ActivityCodeAssignment[] $ActivityCodeAssignment
     */
    protected $ActivityCodeAssignment = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ActivityCodeAssignment[]
     */
    public function getActivityCodeAssignment()
    {
      return $this->ActivityCodeAssignment;
    }

    /**
     * @param ActivityCodeAssignment[] $ActivityCodeAssignment
     * @return ReadActivityCodeAssignmentsResponse
     */
    public function setActivityCodeAssignment(array $ActivityCodeAssignment = null)
    {
      $this->ActivityCodeAssignment = $ActivityCodeAssignment;
      return $this;
    }

}
