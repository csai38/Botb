<?php

class CreateActivityNotes
{

    /**
     * @var ActivityNote[] $ActivityNote
     */
    protected $ActivityNote = null;

    /**
     * @param ActivityNote[] $ActivityNote
     */
    public function __construct(array $ActivityNote)
    {
      $this->ActivityNote = $ActivityNote;
    }

    /**
     * @return ActivityNote[]
     */
    public function getActivityNote()
    {
      return $this->ActivityNote;
    }

    /**
     * @param ActivityNote[] $ActivityNote
     * @return CreateActivityNotes
     */
    public function setActivityNote(array $ActivityNote)
    {
      $this->ActivityNote = $ActivityNote;
      return $this;
    }

}
