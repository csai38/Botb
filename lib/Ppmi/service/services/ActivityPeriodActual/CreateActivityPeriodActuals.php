<?php

class CreateActivityPeriodActuals
{

    /**
     * @var ActivityPeriodActual[] $ActivityPeriodActual
     */
    protected $ActivityPeriodActual = null;

    /**
     * @param ActivityPeriodActual[] $ActivityPeriodActual
     */
    public function __construct(array $ActivityPeriodActual)
    {
      $this->ActivityPeriodActual = $ActivityPeriodActual;
    }

    /**
     * @return ActivityPeriodActual[]
     */
    public function getActivityPeriodActual()
    {
      return $this->ActivityPeriodActual;
    }

    /**
     * @param ActivityPeriodActual[] $ActivityPeriodActual
     * @return CreateActivityPeriodActuals
     */
    public function setActivityPeriodActual(array $ActivityPeriodActual)
    {
      $this->ActivityPeriodActual = $ActivityPeriodActual;
      return $this;
    }

}
