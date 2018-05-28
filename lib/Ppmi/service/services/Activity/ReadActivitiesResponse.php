<?php

class ReadActivitiesResponse
{

    /**
     * @var Activity[] $Activity
     */
    protected $Activity = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Activity[]
     */
    public function getActivity()
    {
      return $this->Activity;
    }

    /**
     * @param Activity[] $Activity
     * @return ReadActivitiesResponse
     */
    public function setActivity(array $Activity = null)
    {
      $this->Activity = $Activity;
      return $this;
    }

}
