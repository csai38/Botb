<?php

class ActivityComment
{

    /**
     * @var int $ActivityObjectId
     */
    protected $ActivityObjectId = null;

    /**
     * @var \DateTime $CommentDate
     */
    protected $CommentDate = null;

    /**
     * @var CommentText $CommentText
     */
    protected $CommentText = null;

    /**
     * @var \DateTime $CreateDate
     */
    protected $CreateDate = null;

    /**
     * @var CreateUser $CreateUser
     */
    protected $CreateUser = null;

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
     * @var string $PersonalName
     */
    protected $PersonalName = null;

    /**
     * @var boolean $ReadFlag
     */
    protected $ReadFlag = null;

    /**
     * @var string $TimeDiff
     */
    protected $TimeDiff = null;

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
     * @return ActivityComment
     */
    public function setActivityObjectId($ActivityObjectId)
    {
      $this->ActivityObjectId = $ActivityObjectId;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCommentDate()
    {
      if ($this->CommentDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->CommentDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $CommentDate
     * @return ActivityComment
     */
    public function setCommentDate(\DateTime $CommentDate = null)
    {
      if ($CommentDate == null) {
       $this->CommentDate = null;
      } else {
        $this->CommentDate = $CommentDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return CommentText
     */
    public function getCommentText()
    {
      return $this->CommentText;
    }

    /**
     * @param CommentText $CommentText
     * @return ActivityComment
     */
    public function setCommentText($CommentText)
    {
      $this->CommentText = $CommentText;
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
     * @return ActivityComment
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
     * @return ActivityComment
     */
    public function setCreateUser($CreateUser)
    {
      $this->CreateUser = $CreateUser;
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
     * @return ActivityComment
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
     * @return ActivityComment
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
     * @return ActivityComment
     */
    public function setObjectId($ObjectId)
    {
      $this->ObjectId = $ObjectId;
      return $this;
    }

    /**
     * @return string
     */
    public function getPersonalName()
    {
      return $this->PersonalName;
    }

    /**
     * @param string $PersonalName
     * @return ActivityComment
     */
    public function setPersonalName($PersonalName)
    {
      $this->PersonalName = $PersonalName;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getReadFlag()
    {
      return $this->ReadFlag;
    }

    /**
     * @param boolean $ReadFlag
     * @return ActivityComment
     */
    public function setReadFlag($ReadFlag)
    {
      $this->ReadFlag = $ReadFlag;
      return $this;
    }

    /**
     * @return string
     */
    public function getTimeDiff()
    {
      return $this->TimeDiff;
    }

    /**
     * @param string $TimeDiff
     * @return ActivityComment
     */
    public function setTimeDiff($TimeDiff)
    {
      $this->TimeDiff = $TimeDiff;
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
     * @return ActivityComment
     */
    public function setUserObjectId($UserObjectId)
    {
      $this->UserObjectId = $UserObjectId;
      return $this;
    }

}
