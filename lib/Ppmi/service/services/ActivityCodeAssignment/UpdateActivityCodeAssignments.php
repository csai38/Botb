<?php

class UpdateActivityCodeAssignments
{

    /**
     * @var ActivityCodeAssignment[] $ActivityCodeAssignment
     */
    protected $ActivityCodeAssignment = null;

    /**
     * @param ActivityCodeAssignment[] $ActivityCodeAssignment
     */
    public function __construct(array $ActivityCodeAssignment)
    {
      $this->ActivityCodeAssignment = $ActivityCodeAssignment;
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
     * @return UpdateActivityCodeAssignments
     */
    public function setActivityCodeAssignment(array $ActivityCodeAssignment)
    {
      $this->ActivityCodeAssignment = $ActivityCodeAssignment;
      return $this;
    }

}
