<?php

class ReadAllActivityExpensesByWBSResponse
{

    /**
     * @var ActivityExpense[] $ActivityExpense
     */
    protected $ActivityExpense = null;

    
    public function __construct()
    {
    
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
     * @return ReadAllActivityExpensesByWBSResponse
     */
    public function setActivityExpense(array $ActivityExpense = null)
    {
      $this->ActivityExpense = $ActivityExpense;
      return $this;
    }

}
