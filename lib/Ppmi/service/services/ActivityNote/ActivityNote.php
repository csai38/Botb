<?php

class ActivityNote
{

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
     * @var string $Note
     */
    protected $Note = null;

    /**
     * @var string $NotebookTopicName
     */
    protected $NotebookTopicName = null;

    /**
     * @var int $NotebookTopicObjectId
     */
    protected $NotebookTopicObjectId = null;

    /**
     * @var int $ObjectId
     */
    protected $ObjectId = null;

    /**
     * @var ProjectId $ProjectId
     */
    protected $ProjectId = null;

    /**
     * @var int $ProjectObjectId
     */
    protected $ProjectObjectId = null;

    /**
     * @var string $RawTextNote
     */
    protected $RawTextNote = null;

    /**
     * @var int $WBSObjectId
     */
    protected $WBSObjectId = null;

    
    public function __construct()
    {
    
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
     * @return ActivityNote
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
     * @return ActivityNote
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
     * @return ActivityNote
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
     * @return ActivityNote
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
     * @return ActivityNote
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
     * @return ActivityNote
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
     * @return ActivityNote
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
     * @return ActivityNote
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
     * @return ActivityNote
     */
    public function setLastUpdateUser($LastUpdateUser)
    {
      $this->LastUpdateUser = $LastUpdateUser;
      return $this;
    }

    /**
     * @return string
     */
    public function getNote()
    {
      return $this->Note;
    }

    /**
     * @param string $Note
     * @return ActivityNote
     */
    public function setNote($Note)
    {
      $this->Note = $Note;
      return $this;
    }

    /**
     * @return string
     */
    public function getNotebookTopicName()
    {
      return $this->NotebookTopicName;
    }

    /**
     * @param string $NotebookTopicName
     * @return ActivityNote
     */
    public function setNotebookTopicName($NotebookTopicName)
    {
      $this->NotebookTopicName = $NotebookTopicName;
      return $this;
    }

    /**
     * @return int
     */
    public function getNotebookTopicObjectId()
    {
      return $this->NotebookTopicObjectId;
    }

    /**
     * @param int $NotebookTopicObjectId
     * @return ActivityNote
     */
    public function setNotebookTopicObjectId($NotebookTopicObjectId)
    {
      $this->NotebookTopicObjectId = $NotebookTopicObjectId;
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
     * @return ActivityNote
     */
    public function setObjectId($ObjectId)
    {
      $this->ObjectId = $ObjectId;
      return $this;
    }

    /**
     * @return ProjectId
     */
    public function getProjectId()
    {
      return $this->ProjectId;
    }

    /**
     * @param ProjectId $ProjectId
     * @return ActivityNote
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
     * @return ActivityNote
     */
    public function setProjectObjectId($ProjectObjectId)
    {
      $this->ProjectObjectId = $ProjectObjectId;
      return $this;
    }

    /**
     * @return string
     */
    public function getRawTextNote()
    {
      return $this->RawTextNote;
    }

    /**
     * @param string $RawTextNote
     * @return ActivityNote
     */
    public function setRawTextNote($RawTextNote)
    {
      $this->RawTextNote = $RawTextNote;
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
     * @return ActivityNote
     */
    public function setWBSObjectId($WBSObjectId)
    {
      $this->WBSObjectId = $WBSObjectId;
      return $this;
    }

}
