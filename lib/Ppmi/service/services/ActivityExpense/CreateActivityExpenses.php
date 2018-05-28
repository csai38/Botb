<?php

class CreateActivityExpenses
{

    /**
     * @var ActivityExpense[] $ActivityExpense
     */
    protected $ActivityExpense = null;

    /**
     * @param ActivityExpense[] $ActivityExpense
     */
    public function __construct(array $ActivityExpense)
    {
      $this->ActivityExpense = $ActivityExpense;
    }

    /**
     * @return ActivityExpense[]
     */
    public function getActivityExpense()
    {
      return $this->ActivityExpense;
    }

    /**
     * @param ActivityExpense[] $ActivityExpense
     * @return CreateActivityExpenses
     */
    public function setActivityExpense(array $ActivityExpense)
    {
      $this->ActivityExpense = $ActivityExpense;
      return $this;
    }

}
