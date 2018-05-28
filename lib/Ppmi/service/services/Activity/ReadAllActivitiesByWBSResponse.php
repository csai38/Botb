<?php

class ReadAllActivitiesByWBSResponse
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
     * @return ReadAllActivitiesByWBSResponse
     */
    public function setActivity(array $Activity = null)
    {
      $this->Activity = $Activity;
      return $this;
    }

}
