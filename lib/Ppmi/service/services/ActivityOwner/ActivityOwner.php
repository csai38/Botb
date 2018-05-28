<?php

class ActivityOwner
{

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
     * @var boolean $IsActivityFlagged
     */
    protected $IsActivityFlagged = null;

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
     * @var int $ProjectObjectId
     */
    protected $ProjectObjectId = null;

    /**
     * @var int $UserObjectId
     */
    protected $UserObjectId = null;

    
    public function __construct()
    {
    
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
     * @return ActivityOwner
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
     * @return ActivityOwner
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
     * @return ActivityOwner
     */
    public function setCreateUser($CreateUser)
    {
      $this->CreateUser = $CreateUser;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getIsActivityFlagged()
    {
      return $this->IsActivityFlagged;
    }

    /**
     * @param boolean $IsActivityFlagged
     * @return ActivityOwner
     */
    public function setIsActivityFlagged($IsActivityFlagged)
    {
      $this->IsActivityFlagged = $IsActivityFlagged;
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
     * @return ActivityOwner
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
     * @return ActivityOwner
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
     * @return ActivityOwner
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
     * @return ActivityOwner
     */
    public function setLastUpdateUser($LastUpdateUser)
    {
      $this->LastUpdateUser = $LastUpdateUser;
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
     * @return ActivityOwner
     */
    public function setProjectObjectId($ProjectObjectId)
    {
      $this->ProjectObjectId = $ProjectObjectId;
      return $this;
    }

    /**
     * @return int
     */
    public function getUserObjectId()
    {
      return $this->UserObjectId;
    }

    /**
     * @param int $UserObjectId
     * @return ActivityOwner
     */
    public function setUserObjectId($UserObjectId)
    {
      $this->UserObjectId = $UserObjectId;
      return $this;
    }

}
