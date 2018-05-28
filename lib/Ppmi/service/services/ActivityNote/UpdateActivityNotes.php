<?php

class UpdateActivityNotes
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
     * @return UpdateActivityNotes
     */
    public function setActivityNote(array $ActivityNote)
    {
      $this->ActivityNote = $ActivityNote;
      return $this;
    }

}
