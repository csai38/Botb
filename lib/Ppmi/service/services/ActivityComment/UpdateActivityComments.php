<?php

class UpdateActivityComments
{

    /**
     * @var ActivityComment[] $ActivityComment
     */
    protected $ActivityComment = null;

    /**
     * @param ActivityComment[] $ActivityComment
     */
    public function __construct(array $ActivityComment)
    {
      $this->ActivityComment = $ActivityComment;
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
     * @return UpdateActivityComments
     */
    public function setActivityComment(array $ActivityComment)
    {
      $this->ActivityComment = $ActivityComment;
      return $this;
    }

}
