<?php

class ActivityCode
{

    /**
     * @var CodeTypeName $CodeTypeName
     */
    protected $CodeTypeName = null;

    /**
     * @var int $CodeTypeObjectId
     */
    protected $CodeTypeObjectId = null;

    /**
     * @var CodeTypeScope $CodeTypeScope
     */
    protected $CodeTypeScope = null;

    /**
     * @var CodeValue $CodeValue
     */
    protected $CodeValue = null;

    /**
     * @var Color $Color
     */
    protected $Color = null;

    /**
     * @var \DateTime $CreateDate
     */
    protected $CreateDate = null;

    /**
     * @var CreateUser $CreateUser
     */
    protected $CreateUser = null;

    /**
     * @var Description $Description
     */
    protected $Description = null;

    /**
     * @var \DateTime $LastUpdateDate
     */
    protected $LastUpdateDate = null;

    /**
     * @var LastUpdateUser $LastUpdateUser
     */
    protected $LastUpdateUser = null;

    /**
     * @var int $ObjectId
     */
    protected $ObjectId = null;

    /**
     * @var int $ParentObjectId
     */
    protected $ParentObjectId = null;

    /**
     * @var int $ProjectObjectId
     */
    protected $ProjectObjectId = null;

    /**
     * @var int $SequenceNumber
     */
    protected $SequenceNumber = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return CodeTypeName
     */
    public function getCodeTypeName()
    {
      return $this->CodeTypeName;
    }

    /**
     * @param CodeTypeName $CodeTypeName
     * @return ActivityCode
     */
    public function setCodeTypeName($CodeTypeName)
    {
      $this->CodeTypeName = $CodeTypeName;
      return $this;
    }

    /**
     * @return int
     */
    public function getCodeTypeObjectId()
    {
      return $this->CodeTypeObjectId;
    }

    /**
     * @param int $CodeTypeObjectId
     * @return ActivityCode
     */
    public function setCodeTypeObjectId($CodeTypeObjectId)
    {
      $this->CodeTypeObjectId = $CodeTypeObjectId;
      return $this;
    }

    /**
     * @return CodeTypeScope
     */
    public function getCodeTypeScope()
    {
      return $this->CodeTypeScope;
    }

    /**
     * @param CodeTypeScope $CodeTypeScope
     * @return ActivityCode
     */
    public function setCodeTypeScope($CodeTypeScope)
    {
      $this->CodeTypeScope = $CodeTypeScope;
      return $this;
    }

    /**
     * @return CodeValue
     */
    public function getCodeValue()
    {
      return $this->CodeValue;
    }

    /**
     * @param CodeValue $CodeValue
     * @return ActivityCode
     */
    public function setCodeValue($CodeValue)
    {
      $this->CodeValue = $CodeValue;
      return $this;
    }

    /**
     * @return Color
     */
    public function getColor()
    {
      return $this->Color;
    }

    /**
     * @param Color $Color
     * @return ActivityCode
     */
    public function setColor($Color)
    {
      $this->Color = $Color;
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
     * @return ActivityCode
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
     * @return ActivityCode
     */
    public function setCreateUser($CreateUser)
    {
      $this->CreateUser = $CreateUser;
      return $this;
    }

    /**
     * @return Description
     */
    public function getDescription()
    {
      return $this->Description;
    }

    /**
     * @param Description $Description
     * @return ActivityCode
     */
    public function setDescription($Description)
    {
      $this->Description = $Description;
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
     * @return ActivityCode
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
     * @return ActivityCode
     */
    public function setLastUpdateUser($LastUpdateUser)
    {
      $this->LastUpdateUser = $LastUpdateUser;
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
     * @return ActivityCode
     */
    public function setObjectId($ObjectId)
    {
      $this->ObjectId = $ObjectId;
      return $this;
    }

    /**
     * @return int
     */
    public function getParentObjectId()
    {
      return $this->ParentObjectId;
    }

    /**
     * @param int $ParentObjectId
     * @return ActivityCode
     */
    public function setParentObjectId($ParentObjectId)
    {
      $this->ParentObjectId = $ParentObjectId;
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
     * @return ActivityCode
     */
    public function setProjectObjectId($ProjectObjectId)
    {
      $this->ProjectObjectId = $ProjectObjectId;
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
     * @return ActivityCode
     */
    public function setSequenceNumber($SequenceNumber)
    {
      $this->SequenceNumber = $SequenceNumber;
      return $this;
    }

}
