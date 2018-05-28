<?php

class ReadActivityNotesResponse
{

    /**
     * @var ActivityNote[] $ActivityNote
     */
    protected $ActivityNote = null;

    
    public function __construct()
    {
    
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
     * @return ReadActivityNotesResponse
     */
    public function setActivityNote(array $ActivityNote = null)
    {
      $this->ActivityNote = $ActivityNote;
      return $this;
    }

}
