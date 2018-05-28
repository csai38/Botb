<?php

class ActivityCodeAssignment
{

    /**
     * @var ActivityCodeDescription $ActivityCodeDescription
     */
    protected $ActivityCodeDescription = null;

    /**
     * @var int $ActivityCodeObjectId
     */
    protected $ActivityCodeObjectId = null;

    /**
     * @var ActivityCodeTypeName $ActivityCodeTypeName
     */
    protected $ActivityCodeTypeName = null;

    /**
     * @var int $ActivityCodeTypeObjectId
     */
    protected $ActivityCodeTypeObjectId = null;

    /**
     * @var ActivityCodeTypeScope $ActivityCodeTypeScope
     */
    protected $ActivityCodeTypeScope = null;

    /**
     * @var ActivityCodeValue $ActivityCodeValue
     */
    protected $ActivityCodeValue = null;

    /**
     * @var ActivityId $ActivityId
     */
    protected $ActivityId = null;

    /**
     * @var ActivityName $ActivityName
     */
    protected $ActivityName = null;

    /**
     * @var int $ActivityObjectId
     */
    protected $ActivityObjectId = null;

    /**
     * @var \DateTime $CreateDate
     */
    protected $CreateDate = null;

    /**
     * @var CreateUser $CreateUser
     */
    protected $CreateUser = null;

    /**
     * @var boolean $IsBaseline
     */
    protected $IsBaseline = null;

    /**
     * @var boolean $IsTemplate
     */
    protected $IsTemplate = null;

    /**
     * @var \DateTime $LastUpdateDate
     */
    protected $LastUpdateDate = null;

    /**
     * @var LastUpdateUser $LastUpdateUser
     */
    protected $LastUpdateUser = null;

    /**
     * @var string $ProjectId
     */
    protected $ProjectId = null;

    /**
     * @var int $ProjectObjectId
     */
    protected $ProjectObjectId = null;

    /**
     * @var int $WBSObjectId
     */
    protected $WBSObjectId = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ActivityCodeDescription
     */
    public function getActivityCodeDescription()
    {
      return $this->ActivityCodeDescription;
    }

    /**
     * @param ActivityCodeDescription $ActivityCodeDescription
     * @return ActivityCodeAssignment
     */
    public function setActivityCodeDescription($ActivityCodeDescription)
    {
      $this->ActivityCodeDescription = $ActivityCodeDescription;
      return $this;
    }

    /**
     * @return int
     */
    public function getActivityCodeObjectId()
    {
      return $this->ActivityCodeObjectId;
    }

    /**
     * @param int $ActivityCodeObjectId
     * @return ActivityCodeAssignment
     */
    public function setActivityCodeObjectId($ActivityCodeObjectId)
    {
      $this->ActivityCodeObjectId = $ActivityCodeObjectId;
      return $this;
    }

    /**
     * @return ActivityCodeTypeName
     */
    public function getActivityCodeTypeName()
    {
      return $this->ActivityCodeTypeName;
    }

    /**
     * @param ActivityCodeTypeName $ActivityCodeTypeName
     * @return ActivityCodeAssignment
     */
    public function setActivityCodeTypeName($ActivityCodeTypeName)
    {
      $this->ActivityCodeTypeName = $ActivityCodeTypeName;
      return $this;
    }

    /**
     * @return int
     */
    public function getActivityCodeTypeObjectId()
    {
      return $this->ActivityCodeTypeObjectId;
    }

    /**
     * @param int $ActivityCodeTypeObjectId
     * @return ActivityCodeAssignment
     */
    public function setActivityCodeTypeObjectId($ActivityCodeTypeObjectId)
    {
      $this->ActivityCodeTypeObjectId = $ActivityCodeTypeObjectId;
      return $this;
    }

    /**
     * @return ActivityCodeTypeScope
     */
    public function getActivityCodeTypeScope()
    {
      return $this->ActivityCodeTypeScope;
    }

    /**
     * @param ActivityCodeTypeScope $ActivityCodeTypeScope
     * @return ActivityCodeAssignment
     */
    public function setActivityCodeTypeScope($ActivityCodeTypeScope)
    {
      $this->ActivityCodeTypeScope = $ActivityCodeTypeScope;
      return $this;
    }

    /**
     * @return ActivityCodeValue
     */
    public function getActivityCodeValue()
    {
      return $this->ActivityCodeValue;
    }

    /**
     * @param ActivityCodeValue $ActivityCodeValue
     * @return ActivityCodeAssignment
     */
    public function setActivityCodeValue($ActivityCodeValue)
    {
      $this->ActivityCodeValue = $ActivityCodeValue;
      return $this;
    }

    /**
     * @return ActivityId
     */
    public function getActivityId()
    {
      return $this->ActivityId;
    }

    /**
     * @param ActivityId $ActivityId
     * @return ActivityCodeAssignment
     */
    public function setActivityId($ActivityId)
    {
      $this->ActivityId = $ActivityId;
      return $this;
    }

    /**
     * @return ActivityName
     */
    public function getActivityName()
    {
      return $this->ActivityName;
    }

    /**
     * @param ActivityName $ActivityName
     * @return ActivityCodeAssignment
     */
    public function setActivityName($ActivityName)
    {
      $this->ActivityName = $ActivityName;
      return $this;
    }

    /**
     * @return int
     */
    public function getActivityObjectId()
    {
      return $this->ActivityObjectId;
    }

    /**
     * @param int $ActivityObjectId
     * @return ActivityCodeAssignment
     */
    public function setActivityObjectId($ActivityObjectId)
    {
      $this->ActivityObjectId = $ActivityObjectId;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreateDate()
    {
      if ($this->CreateDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->CreateDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $CreateDate
     * @return ActivityCodeAssignment
     */
    public function setCreateDate(\DateTime $CreateDate = null)
    {
      if ($CreateDate == null) {
       $this->CreateDate = null;
      } else {
        $this->CreateDate = $CreateDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return CreateUser
     */
    public function getCreateUser()
    {
      return $this->CreateUser;
    }

    /**
     * @param CreateUser $CreateUser
     * @return ActivityCodeAssignment
     */
    public function setCreateUser($CreateUser)
    {
      $this->CreateUser = $CreateUser;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getIsBaseline()
    {
      return $this->IsBaseline;
    }

    /**
     * @param boolean $IsBaseline
     * @return ActivityCodeAssignment
     */
    public function setIsBaseline($IsBaseline)
    {
      $this->IsBaseline = $IsBaseline;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getIsTemplate()
    {
      return $this->IsTemplate;
    }

    /**
     * @param boolean $IsTemplate
     * @return ActivityCodeAssignment
     */
    public function setIsTemplate($IsTemplate)
    {
      $this->IsTemplate = $IsTemplate;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdateDate()
    {
      if ($this->LastUpdateDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->LastUpdateDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $LastUpdateDate
     * @return ActivityCodeAssignment
     */
    public function setLastUpdateDate(\DateTime $LastUpdateDate = null)
    {
      if ($LastUpdateDate == null) {
       $this->LastUpdateDate = null;
      } else {
        $this->LastUpdateDate = $LastUpdateDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return LastUpdateUser
     */
    public function getLastUpdateUser()
    {
      return $this->LastUpdateUser;
    }

    /**
     * @param LastUpdateUser $LastUpdateUser
     * @return ActivityCodeAssignment
     */
    public function setLastUpdateUser($LastUpdateUser)
    {
      $this->LastUpdateUser = $LastUpdateUser;
      return $this;
    }

    /**
     * @return string
     */
    public function getProjectId()
    {
      return $this->ProjectId;
    }

    /**
     * @param string $ProjectId
     * @return ActivityCodeAssignment
     */
    public function setProjectId($ProjectId)
    {
      $this->ProjectId = $ProjectId;
      return $this;
    }

    /**
     * @return int
     */
    public function getProjectObjectId()
    {
      return $this->ProjectObjectId;
    }

    /**
     * @param int $ProjectObjectId
     * @return ActivityCodeAssignment
     */
    public function setProjectObjectId($ProjectObjectId)
    {
      $this->ProjectObjectId = $ProjectObjectId;
      return $this;
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
     * @return ActivityCodeAssignment
     */
    public function setWBSObjectId($WBSObjectId)
    {
      $this->WBSObjectId = $WBSObjectId;
      return $this;
    }

}
