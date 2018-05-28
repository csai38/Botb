<?php

class ReadActivityCommentsResponse
{

    /**
     * @var ActivityComment[] $ActivityComment
     */
    protected $ActivityComment = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ActivityComment[]
     */
    public function getActivityComment()
    {
      return $this->ActivityComment;
    }

    /**
     * @param ActivityComment[] $ActivityComment
     * @return ReadActivityCommentsResponse
     */
    public function setActivityComment(array $ActivityComment = null)
    {
      $this->ActivityComment = $ActivityComment;
      return $this;
    }

}
