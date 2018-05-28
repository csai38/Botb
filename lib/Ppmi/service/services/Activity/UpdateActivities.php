<?php

class UpdateActivities
{

    /**
     * @var Activity[] $Activity
     */
    protected $Activity = null;

    /**
     * @param Activity[] $Activity
     */
    public function __construct(array $Activity)
    {
      $this->Activity = $Activity;
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
     * @return UpdateActivities
     */
    public function setActivity(array $Activity)
    {
      $this->Activity = $Activity;
      return $this;
    }

}
