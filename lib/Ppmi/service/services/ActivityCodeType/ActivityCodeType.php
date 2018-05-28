<?php

class ActivityCodeType
{

    /**
     * @var \DateTime $CreateDate
     */
    protected $CreateDate = null;

    /**
     * @var CreateUser $CreateUser
     */
    protected $CreateUser = null;

    /**
     * @var string $EPSCodeTypeHierarchy
     */
    protected $EPSCodeTypeHierarchy = null;

    /**
     * @var int $EPSObjectId
     */
    protected $EPSObjectId = null;

    /**
     * @var boolean $IsBaseline
     */
    protected $IsBaseline = null;

    /**
     * @var boolean $IsSecureCode
     */
    protected $IsSecureCode = null;

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
     * @var Length $Length
     */
    protected $Length = null;

    /**
     * @var Name $Name
     */
    protected $Name = null;

    /**
     * @var int $ObjectId
     */
    protected $ObjectId = null;

    /**
     * @var int $ProjectObjectId
     */
    protected $ProjectObjectId = null;

    /**
     * @var string $RefProjectObjectIds
     */
    protected $RefProjectObjectIds = null;

    /**
     * @var Scope $Scope
     */
    protected $Scope = null;

    /**
     * @var int $SequenceNumber
     */
    protected $SequenceNumber = null;

    
    public function __construct()
    {
    
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
     * @return ActivityCodeType
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
     * @return ActivityCodeType
     */
    public function setCreateUser($CreateUser)
    {
      $this->CreateUser = $CreateUser;
      return $this;
    }

    /**
     * @return string
     */
    public function getEPSCodeTypeHierarchy()
    {
      return $this->EPSCodeTypeHierarchy;
    }

    /**
     * @param string $EPSCodeTypeHierarchy
     * @return ActivityCodeType
     */
    public function setEPSCodeTypeHierarchy($EPSCodeTypeHierarchy)
    {
      $this->EPSCodeTypeHierarchy = $EPSCodeTypeHierarchy;
      return $this;
    }

    /**
     * @return int
     */
    public function getEPSObjectId()
    {
      return $this->EPSObjectId;
    }

    /**
     * @param int $EPSObjectId
     * @return ActivityCodeType
     */
    public function setEPSObjectId($EPSObjectId)
    {
      $this->EPSObjectId = $EPSObjectId;
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
     * @return ActivityCodeType
     */
    public function setIsBaseline($IsBaseline)
    {
      $this->IsBaseline = $IsBaseline;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getIsSecureCode()
    {
      return $this->IsSecureCode;
    }

    /**
     * @param boolean $IsSecureCode
     * @return ActivityCodeType
     */
    public function setIsSecureCode($IsSecureCode)
    {
      $this->IsSecureCode = $IsSecureCode;
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
     * @return ActivityCodeType
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
     * @return ActivityCodeType
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
     * @return ActivityCodeType
     */
    public function setLastUpdateUser($LastUpdateUser)
    {
      $this->LastUpdateUser = $LastUpdateUser;
      return $this;
    }

    /**
     * @return Length
     */
    public function getLength()
    {
      return $this->Length;
    }

    /**
     * @param Length $Length
     * @return ActivityCodeType
     */
    public function setLength($Length)
    {
      $this->Length = $Length;
      return $this;
    }

    /**
     * @return Name
     */
    public function getName()
    {
      return $this->Name;
    }

    /**
     * @param Name $Name
     * @return ActivityCodeType
     */
    public function setName($Name)
    {
      $this->Name = $Name;
      return $this;
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
     * @return ActivityCodeType
     */
    public function setObjectId($ObjectId)
    {
      $this->ObjectId = $ObjectId;
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
     * @return ActivityCodeType
     */
    public function setProjectObjectId($ProjectObjectId)
    {
      $this->ProjectObjectId = $ProjectObjectId;
      return $this;
    }

    /**
     * @return string
     */
    public function getRefProjectObjectIds()
    {
      return $this->RefProjectObjectIds;
    }

    /**
     * @param string $RefProjectObjectIds
     * @return ActivityCodeType
     */
    public function setRefProjectObjectIds($RefProjectObjectIds)
    {
      $this->RefProjectObjectIds = $RefProjectObjectIds;
      return $this;
    }

    /**
     * @return Scope
     */
    public function getScope()
    {
      return $this->Scope;
    }

    /**
     * @param Scope $Scope
     * @return ActivityCodeType
     */
    public function setScope($Scope)
    {
      $this->Scope = $Scope;
      return $this;
    }

    /**
     * @return int
     */
    public function getSequenceNumber()
    {
      return $this->SequenceNumber;
    }

    /**
     * @param int $SequenceNumber
     * @return ActivityCodeType
     */
    public function setSequenceNumber($SequenceNumber)
    {
      $this->SequenceNumber = $SequenceNumber;
      return $this;
    }

}
