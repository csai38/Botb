<?php

class CopyActivity
{

    /**
     * @var int $ObjectId
     */
    protected $ObjectId = null;

    /**
     * @var int $TargetProjectObjectId
     */
    protected $TargetProjectObjectId = null;

    /**
     * @var int $TargetWBSObjectId
     */
    protected $TargetWBSObjectId = null;

    /**
     * @var string $TargetActivityId
     */
    protected $TargetActivityId = null;

    /**
     * @var boolean $CopyResourceAndRoleAssignments
     */
    protected $CopyResourceAndRoleAssignments = null;

    /**
     * @var boolean $CopyRelationships
     */
    protected $CopyRelationships = null;

    /**
     * @var boolean $CopyActivityCodes
     */
    protected $CopyActivityCodes = null;

    /**
     * @var boolean $CopyActivityNotes
     */
    protected $CopyActivityNotes = null;

    /**
     * @var boolean $CopyActivityExpenses
     */
    protected $CopyActivityExpenses = null;

    /**
     * @var boolean $CopyActivitySteps
     */
    protected $CopyActivitySteps = null;

    /**
     * @var boolean $CopyProjectDocuments
     */
    protected $CopyProjectDocuments = null;

    /**
     * @var boolean $CopyPastPeriodActuals
     */
    protected $CopyPastPeriodActuals = null;

    /**
     * @param int $ObjectId
     */
    public function __construct($ObjectId)
    {
      $this->ObjectId = $ObjectId;
    }

    /**
     * @return int
     */
    public function getObjectId()
    {
      return $this->ObjectId;
    }

    /**
     * @param int $ObjectId
     * @return CopyActivity
     */
    public function setObjectId($ObjectId)
    {
      $this->ObjectId = $ObjectId;
      return $this;
    }

    /**
     * @return int
     */
    public function getTargetProjectObjectId()
    {
      return $this->TargetProjectObjectId;
    }

    /**
     * @param int $TargetProjectObjectId
     * @return CopyActivity
     */
    public function setTargetProjectObjectId($TargetProjectObjectId)
    {
      $this->TargetProjectObjectId = $TargetProjectObjectId;
      return $this;
    }

    /**
     * @return int
     */
    public function getTargetWBSObjectId()
    {
      return $this->TargetWBSObjectId;
    }

    /**
     * @param int $TargetWBSObjectId
     * @return CopyActivity
     */
    public function setTargetWBSObjectId($TargetWBSObjectId)
    {
      $this->TargetWBSObjectId = $TargetWBSObjectId;
      return $this;
    }

    /**
     * @return string
     */
    public function getTargetActivityId()
    {
      return $this->TargetActivityId;
    }

    /**
     * @param string $TargetActivityId
     * @return CopyActivity
     */
    public function setTargetActivityId($TargetActivityId)
    {
      $this->TargetActivityId = $TargetActivityId;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getCopyResourceAndRoleAssignments()
    {
      return $this->CopyResourceAndRoleAssignments;
    }

    /**
     * @param boolean $CopyResourceAndRoleAssignments
     * @return CopyActivity
     */
    public function setCopyResourceAndRoleAssignments($CopyResourceAndRoleAssignments)
    {
      $this->CopyResourceAndRoleAssignments = $CopyResourceAndRoleAssignments;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getCopyRelationships()
    {
      return $this->CopyRelationships;
    }

    /**
     * @param boolean $CopyRelationships
     * @return CopyActivity
     */
    public function setCopyRelationships($CopyRelationships)
    {
      $this->CopyRelationships = $CopyRelationships;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getCopyActivityCodes()
    {
      return $this->CopyActivityCodes;
    }

    /**
     * @param boolean $CopyActivityCodes
     * @return CopyActivity
     */
    public function setCopyActivityCodes($CopyActivityCodes)
    {
      $this->CopyActivityCodes = $CopyActivityCodes;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getCopyActivityNotes()
    {
      return $this->CopyActivityNotes;
    }

    /**
     * @param boolean $CopyActivityNotes
     * @return CopyActivity
     */
    public function setCopyActivityNotes($CopyActivityNotes)
    {
      $this->CopyActivityNotes = $CopyActivityNotes;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getCopyActivityExpenses()
    {
      return $this->CopyActivityExpenses;
    }

    /**
     * @param boolean $CopyActivityExpenses
     * @return CopyActivity
     */
    public function setCopyActivityExpenses($CopyActivityExpenses)
    {
      $this->CopyActivityExpenses = $CopyActivityExpenses;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getCopyActivitySteps()
    {
      return $this->CopyActivitySteps;
    }

    /**
     * @param boolean $CopyActivitySteps
     * @return CopyActivity
     */
    public function setCopyActivitySteps($CopyActivitySteps)
    {
      $this->CopyActivitySteps = $CopyActivitySteps;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getCopyProjectDocuments()
    {
      return $this->CopyProjectDocuments;
    }

    /**
     * @param boolean $CopyProjectDocuments
     * @return CopyActivity
     */
    public function setCopyProjectDocuments($CopyProjectDocuments)
    {
      $this->CopyProjectDocuments = $CopyProjectDocuments;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getCopyPastPeriodActuals()
    {
      return $this->CopyPastPeriodActuals;
    }

    /**
     * @param boolean $CopyPastPeriodActuals
     * @return CopyActivity
     */
    public function setCopyPastPeriodActuals($CopyPastPeriodActuals)
    {
      $this->CopyPastPeriodActuals = $CopyPastPeriodActuals;
      return $this;
    }

}
