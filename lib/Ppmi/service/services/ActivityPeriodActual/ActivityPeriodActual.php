<?php

class ActivityPeriodActual
{

    /**
     * @var int $ActivityObjectId
     */
    protected $ActivityObjectId = null;

    /**
     * @var float $ActualExpenseCost
     */
    protected $ActualExpenseCost = null;

    /**
     * @var float $ActualLaborCost
     */
    protected $ActualLaborCost = null;

    /**
     * @var float $ActualLaborUnits
     */
    protected $ActualLaborUnits = null;

    /**
     * @var float $ActualMaterialCost
     */
    protected $ActualMaterialCost = null;

    /**
     * @var float $ActualNonLaborCost
     */
    protected $ActualNonLaborCost = null;

    /**
     * @var float $ActualNonLaborUnits
     */
    protected $ActualNonLaborUnits = null;

    /**
     * @var \DateTime $CreateDate
     */
    protected $CreateDate = null;

    /**
     * @var CreateUser $CreateUser
     */
    protected $CreateUser = null;

    /**
     * @var float $EarnedValueCost
     */
    protected $EarnedValueCost = null;

    /**
     * @var float $EarnedValueLaborUnits
     */
    protected $EarnedValueLaborUnits = null;

    /**
     * @var int $FinancialPeriodObjectId
     */
    protected $FinancialPeriodObjectId = null;

    /**
     * @var boolean $IsBaseline
     */
    protected $IsBaseline = null;

    /**
     * @var boolean $IsTemplate
     */
    protected $IsTemplate = null;

    /**
     * @var \DateTime $LastUpdateDate
     */
    protected $LastUpdateDate = null;

    /**
     * @var LastUpdateUser $LastUpdateUser
     */
    protected $LastUpdateUser = null;

    /**
     * @var float $PlannedValueCost
     */
    protected $PlannedValueCost = null;

    /**
     * @var float $PlannedValueLaborUnits
     */
    protected $PlannedValueLaborUnits = null;

    /**
     * @var int $ProjectObjectId
     */
    protected $ProjectObjectId = null;

    /**
     * @var int $WBSObjectId
     */
    protected $WBSObjectId = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getActivityObjectId()
    {
      return $this->ActivityObjectId;
    }

    /**
     * @param int $ActivityObjectId
     * @return ActivityPeriodActual
     */
    public function setActivityObjectId($ActivityObjectId)
    {
      $this->ActivityObjectId = $ActivityObjectId;
      return $this;
    }

    /**
     * @return float
     */
    public function getActualExpenseCost()
    {
      return $this->ActualExpenseCost;
    }

    /**
     * @param float $ActualExpenseCost
     * @return ActivityPeriodActual
     */
    public function setActualExpenseCost($ActualExpenseCost)
    {
      $this->ActualExpenseCost = $ActualExpenseCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getActualLaborCost()
    {
      return $this->ActualLaborCost;
    }

    /**
     * @param float $ActualLaborCost
     * @return ActivityPeriodActual
     */
    public function setActualLaborCost($ActualLaborCost)
    {
      $this->ActualLaborCost = $ActualLaborCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getActualLaborUnits()
    {
      return $this->ActualLaborUnits;
    }

    /**
     * @param float $ActualLaborUnits
     * @return ActivityPeriodActual
     */
    public function setActualLaborUnits($ActualLaborUnits)
    {
      $this->ActualLaborUnits = $ActualLaborUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getActualMaterialCost()
    {
      return $this->ActualMaterialCost;
    }

    /**
     * @param float $ActualMaterialCost
     * @return ActivityPeriodActual
     */
    public function setActualMaterialCost($ActualMaterialCost)
    {
      $this->ActualMaterialCost = $ActualMaterialCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getActualNonLaborCost()
    {
      return $this->ActualNonLaborCost;
    }

    /**
     * @param float $ActualNonLaborCost
     * @return ActivityPeriodActual
     */
    public function setActualNonLaborCost($ActualNonLaborCost)
    {
      $this->ActualNonLaborCost = $ActualNonLaborCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getActualNonLaborUnits()
    {
      return $this->ActualNonLaborUnits;
    }

    /**
     * @param float $ActualNonLaborUnits
     * @return ActivityPeriodActual
     */
    public function setActualNonLaborUnits($ActualNonLaborUnits)
    {
      $this->ActualNonLaborUnits = $ActualNonLaborUnits;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreateDate()
    {
      if ($this->CreateDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->CreateDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $CreateDate
     * @return ActivityPeriodActual
     */
    public function setCreateDate(\DateTime $CreateDate = null)
    {
      if ($CreateDate == null) {
       $this->CreateDate = null;
      } else {
        $this->CreateDate = $CreateDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return CreateUser
     */
    public function getCreateUser()
    {
      return $this->CreateUser;
    }

    /**
     * @param CreateUser $CreateUser
     * @return ActivityPeriodActual
     */
    public function setCreateUser($CreateUser)
    {
      $this->CreateUser = $CreateUser;
      return $this;
    }

    /**
     * @return float
     */
    public function getEarnedValueCost()
    {
      return $this->EarnedValueCost;
    }

    /**
     * @param float $EarnedValueCost
     * @return ActivityPeriodActual
     */
    public function setEarnedValueCost($EarnedValueCost)
    {
      $this->EarnedValueCost = $EarnedValueCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getEarnedValueLaborUnits()
    {
      return $this->EarnedValueLaborUnits;
    }

    /**
     * @param float $EarnedValueLaborUnits
     * @return ActivityPeriodActual
     */
    public function setEarnedValueLaborUnits($EarnedValueLaborUnits)
    {
      $this->EarnedValueLaborUnits = $EarnedValueLaborUnits;
      return $this;
    }

    /**
     * @return int
     */
    public function getFinancialPeriodObjectId()
    {
      return $this->FinancialPeriodObjectId;
    }

    /**
     * @param int $FinancialPeriodObjectId
     * @return ActivityPeriodActual
     */
    public function setFinancialPeriodObjectId($FinancialPeriodObjectId)
    {
      $this->FinancialPeriodObjectId = $FinancialPeriodObjectId;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getIsBaseline()
    {
      return $this->IsBaseline;
    }

    /**
     * @param boolean $IsBaseline
     * @return ActivityPeriodActual
     */
    public function setIsBaseline($IsBaseline)
    {
      $this->IsBaseline = $IsBaseline;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getIsTemplate()
    {
      return $this->IsTemplate;
    }

    /**
     * @param boolean $IsTemplate
     * @return ActivityPeriodActual
     */
    public function setIsTemplate($IsTemplate)
    {
      $this->IsTemplate = $IsTemplate;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdateDate()
    {
      if ($this->LastUpdateDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->LastUpdateDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $LastUpdateDate
     * @return ActivityPeriodActual
     */
    public function setLastUpdateDate(\DateTime $LastUpdateDate = null)
    {
      if ($LastUpdateDate == null) {
       $this->LastUpdateDate = null;
      } else {
        $this->LastUpdateDate = $LastUpdateDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return LastUpdateUser
     */
    public function getLastUpdateUser()
    {
      return $this->LastUpdateUser;
    }

    /**
     * @param LastUpdateUser $LastUpdateUser
     * @return ActivityPeriodActual
     */
    public function setLastUpdateUser($LastUpdateUser)
    {
      $this->LastUpdateUser = $LastUpdateUser;
      return $this;
    }

    /**
     * @return float
     */
    public function getPlannedValueCost()
    {
      return $this->PlannedValueCost;
    }

    /**
     * @param float $PlannedValueCost
     * @return ActivityPeriodActual
     */
    public function setPlannedValueCost($PlannedValueCost)
    {
      $this->PlannedValueCost = $PlannedValueCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getPlannedValueLaborUnits()
    {
      return $this->PlannedValueLaborUnits;
    }

    /**
     * @param float $PlannedValueLaborUnits
     * @return ActivityPeriodActual
     */
    public function setPlannedValueLaborUnits($PlannedValueLaborUnits)
    {
      $this->PlannedValueLaborUnits = $PlannedValueLaborUnits;
      return $this;
    }

    /**
     * @return int
     */
    public function getProjectObjectId()
    {
      return $this->ProjectObjectId;
    }

    /**
     * @param int $ProjectObjectId
     * @return ActivityPeriodActual
     */
    public function setProjectObjectId($ProjectObjectId)
    {
      $this->ProjectObjectId = $ProjectObjectId;
      return $this;
    }

    /**
     * @return int
     */
    public function getWBSObjectId()
    {
      return $this->WBSObjectId;
    }

    /**
     * @param int $WBSObjectId
     * @return ActivityPeriodActual
     */
    public function setWBSObjectId($WBSObjectId)
    {
      $this->WBSObjectId = $WBSObjectId;
      return $this;
    }

}
