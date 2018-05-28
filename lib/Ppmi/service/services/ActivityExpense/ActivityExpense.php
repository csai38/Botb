<?php

class ActivityExpense
{

    /**
     * @var AccrualType $AccrualType
     */
    protected $AccrualType = null;

    /**
     * @var ActivityId $ActivityId
     */
    protected $ActivityId = null;

    /**
     * @var ActivityName $ActivityName
     */
    protected $ActivityName = null;

    /**
     * @var int $ActivityObjectId
     */
    protected $ActivityObjectId = null;

    /**
     * @var float $ActualCost
     */
    protected $ActualCost = null;

    /**
     * @var float $ActualUnits
     */
    protected $ActualUnits = null;

    /**
     * @var float $AtCompletionCost
     */
    protected $AtCompletionCost = null;

    /**
     * @var float $AtCompletionUnits
     */
    protected $AtCompletionUnits = null;

    /**
     * @var boolean $AutoComputeActuals
     */
    protected $AutoComputeActuals = null;

    /**
     * @var string $CBSCode
     */
    protected $CBSCode = null;

    /**
     * @var int $CBSId
     */
    protected $CBSId = null;

    /**
     * @var CostAccountId $CostAccountId
     */
    protected $CostAccountId = null;

    /**
     * @var CostAccountName $CostAccountName
     */
    protected $CostAccountName = null;

    /**
     * @var int $CostAccountObjectId
     */
    protected $CostAccountObjectId = null;

    /**
     * @var \DateTime $CreateDate
     */
    protected $CreateDate = null;

    /**
     * @var CreateUser $CreateUser
     */
    protected $CreateUser = null;

    /**
     * @var DocumentNumber $DocumentNumber
     */
    protected $DocumentNumber = null;

    /**
     * @var ExpenseCategoryName $ExpenseCategoryName
     */
    protected $ExpenseCategoryName = null;

    /**
     * @var int $ExpenseCategoryObjectId
     */
    protected $ExpenseCategoryObjectId = null;

    /**
     * @var string $ExpenseDescription
     */
    protected $ExpenseDescription = null;

    /**
     * @var ExpenseItem $ExpenseItem
     */
    protected $ExpenseItem = null;

    /**
     * @var float $ExpensePercentComplete
     */
    protected $ExpensePercentComplete = null;

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
     * @var int $ObjectId
     */
    protected $ObjectId = null;

    /**
     * @var boolean $OverBudget
     */
    protected $OverBudget = null;

    /**
     * @var float $PlannedCost
     */
    protected $PlannedCost = null;

    /**
     * @var float $PlannedUnits
     */
    protected $PlannedUnits = null;

    /**
     * @var float $PricePerUnit
     */
    protected $PricePerUnit = null;

    /**
     * @var ProjectId $ProjectId
     */
    protected $ProjectId = null;

    /**
     * @var int $ProjectObjectId
     */
    protected $ProjectObjectId = null;

    /**
     * @var float $RemainingCost
     */
    protected $RemainingCost = null;

    /**
     * @var float $RemainingUnits
     */
    protected $RemainingUnits = null;

    /**
     * @var UnitOfMeasure $UnitOfMeasure
     */
    protected $UnitOfMeasure = null;

    /**
     * @var Vendor $Vendor
     */
    protected $Vendor = null;

    /**
     * @var int $WBSObjectId
     */
    protected $WBSObjectId = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return AccrualType
     */
    public function getAccrualType()
    {
      return $this->AccrualType;
    }

    /**
     * @param AccrualType $AccrualType
     * @return ActivityExpense
     */
    public function setAccrualType($AccrualType)
    {
      $this->AccrualType = $AccrualType;
      return $this;
    }

    /**
     * @return ActivityId
     */
    public function getActivityId()
    {
      return $this->ActivityId;
    }

    /**
     * @param ActivityId $ActivityId
     * @return ActivityExpense
     */
    public function setActivityId($ActivityId)
    {
      $this->ActivityId = $ActivityId;
      return $this;
    }

    /**
     * @return ActivityName
     */
    public function getActivityName()
    {
      return $this->ActivityName;
    }

    /**
     * @param ActivityName $ActivityName
     * @return ActivityExpense
     */
    public function setActivityName($ActivityName)
    {
      $this->ActivityName = $ActivityName;
      return $this;
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
     * @return ActivityExpense
     */
    public function setActivityObjectId($ActivityObjectId)
    {
      $this->ActivityObjectId = $ActivityObjectId;
      return $this;
    }

    /**
     * @return float
     */
    public function getActualCost()
    {
      return $this->ActualCost;
    }

    /**
     * @param float $ActualCost
     * @return ActivityExpense
     */
    public function setActualCost($ActualCost)
    {
      $this->ActualCost = $ActualCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getActualUnits()
    {
      return $this->ActualUnits;
    }

    /**
     * @param float $ActualUnits
     * @return ActivityExpense
     */
    public function setActualUnits($ActualUnits)
    {
      $this->ActualUnits = $ActualUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getAtCompletionCost()
    {
      return $this->AtCompletionCost;
    }

    /**
     * @param float $AtCompletionCost
     * @return ActivityExpense
     */
    public function setAtCompletionCost($AtCompletionCost)
    {
      $this->AtCompletionCost = $AtCompletionCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getAtCompletionUnits()
    {
      return $this->AtCompletionUnits;
    }

    /**
     * @param float $AtCompletionUnits
     * @return ActivityExpense
     */
    public function setAtCompletionUnits($AtCompletionUnits)
    {
      $this->AtCompletionUnits = $AtCompletionUnits;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getAutoComputeActuals()
    {
      return $this->AutoComputeActuals;
    }

    /**
     * @param boolean $AutoComputeActuals
     * @return ActivityExpense
     */
    public function setAutoComputeActuals($AutoComputeActuals)
    {
      $this->AutoComputeActuals = $AutoComputeActuals;
      return $this;
    }

    /**
     * @return string
     */
    public function getCBSCode()
    {
      return $this->CBSCode;
    }

    /**
     * @param string $CBSCode
     * @return ActivityExpense
     */
    public function setCBSCode($CBSCode)
    {
      $this->CBSCode = $CBSCode;
      return $this;
    }

    /**
     * @return int
     */
    public function getCBSId()
    {
      return $this->CBSId;
    }

    /**
     * @param int $CBSId
     * @return ActivityExpense
     */
    public function setCBSId($CBSId)
    {
      $this->CBSId = $CBSId;
      return $this;
    }

    /**
     * @return CostAccountId
     */
    public function getCostAccountId()
    {
      return $this->CostAccountId;
    }

    /**
     * @param CostAccountId $CostAccountId
     * @return ActivityExpense
     */
    public function setCostAccountId($CostAccountId)
    {
      $this->CostAccountId = $CostAccountId;
      return $this;
    }

    /**
     * @return CostAccountName
     */
    public function getCostAccountName()
    {
      return $this->CostAccountName;
    }

    /**
     * @param CostAccountName $CostAccountName
     * @return ActivityExpense
     */
    public function setCostAccountName($CostAccountName)
    {
      $this->CostAccountName = $CostAccountName;
      return $this;
    }

    /**
     * @return int
     */
    public function getCostAccountObjectId()
    {
      return $this->CostAccountObjectId;
    }

    /**
     * @param int $CostAccountObjectId
     * @return ActivityExpense
     */
    public function setCostAccountObjectId($CostAccountObjectId)
    {
      $this->CostAccountObjectId = $CostAccountObjectId;
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
     * @return ActivityExpense
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
     * @return ActivityExpense
     */
    public function setCreateUser($CreateUser)
    {
      $this->CreateUser = $CreateUser;
      return $this;
    }

    /**
     * @return DocumentNumber
     */
    public function getDocumentNumber()
    {
      return $this->DocumentNumber;
    }

    /**
     * @param DocumentNumber $DocumentNumber
     * @return ActivityExpense
     */
    public function setDocumentNumber($DocumentNumber)
    {
      $this->DocumentNumber = $DocumentNumber;
      return $this;
    }

    /**
     * @return ExpenseCategoryName
     */
    public function getExpenseCategoryName()
    {
      return $this->ExpenseCategoryName;
    }

    /**
     * @param ExpenseCategoryName $ExpenseCategoryName
     * @return ActivityExpense
     */
    public function setExpenseCategoryName($ExpenseCategoryName)
    {
      $this->ExpenseCategoryName = $ExpenseCategoryName;
      return $this;
    }

    /**
     * @return int
     */
    public function getExpenseCategoryObjectId()
    {
      return $this->ExpenseCategoryObjectId;
    }

    /**
     * @param int $ExpenseCategoryObjectId
     * @return ActivityExpense
     */
    public function setExpenseCategoryObjectId($ExpenseCategoryObjectId)
    {
      $this->ExpenseCategoryObjectId = $ExpenseCategoryObjectId;
      return $this;
    }

    /**
     * @return string
     */
    public function getExpenseDescription()
    {
      return $this->ExpenseDescription;
    }

    /**
     * @param string $ExpenseDescription
     * @return ActivityExpense
     */
    public function setExpenseDescription($ExpenseDescription)
    {
      $this->ExpenseDescription = $ExpenseDescription;
      return $this;
    }

    /**
     * @return ExpenseItem
     */
    public function getExpenseItem()
    {
      return $this->ExpenseItem;
    }

    /**
     * @param ExpenseItem $ExpenseItem
     * @return ActivityExpense
     */
    public function setExpenseItem($ExpenseItem)
    {
      $this->ExpenseItem = $ExpenseItem;
      return $this;
    }

    /**
     * @return float
     */
    public function getExpensePercentComplete()
    {
      return $this->ExpensePercentComplete;
    }

    /**
     * @param float $ExpensePercentComplete
     * @return ActivityExpense
     */
    public function setExpensePercentComplete($ExpensePercentComplete)
    {
      $this->ExpensePercentComplete = $ExpensePercentComplete;
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
     * @return ActivityExpense
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
     * @return ActivityExpense
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
     * @return ActivityExpense
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
     * @return ActivityExpense
     */
    public function setLastUpdateUser($LastUpdateUser)
    {
      $this->LastUpdateUser = $LastUpdateUser;
      return $this;
    }

    /**
     * @return int
     */
    public function getObjectId()
    {
      return $this->ObjectId;
    }

    /**
     * @param int $ObjectId
     * @return ActivityExpense
     */
    public function setObjectId($ObjectId)
    {
      $this->ObjectId = $ObjectId;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getOverBudget()
    {
      return $this->OverBudget;
    }

    /**
     * @param boolean $OverBudget
     * @return ActivityExpense
     */
    public function setOverBudget($OverBudget)
    {
      $this->OverBudget = $OverBudget;
      return $this;
    }

    /**
     * @return float
     */
    public function getPlannedCost()
    {
      return $this->PlannedCost;
    }

    /**
     * @param float $PlannedCost
     * @return ActivityExpense
     */
    public function setPlannedCost($PlannedCost)
    {
      $this->PlannedCost = $PlannedCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getPlannedUnits()
    {
      return $this->PlannedUnits;
    }

    /**
     * @param float $PlannedUnits
     * @return ActivityExpense
     */
    public function setPlannedUnits($PlannedUnits)
    {
      $this->PlannedUnits = $PlannedUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getPricePerUnit()
    {
      return $this->PricePerUnit;
    }

    /**
     * @param float $PricePerUnit
     * @return ActivityExpense
     */
    public function setPricePerUnit($PricePerUnit)
    {
      $this->PricePerUnit = $PricePerUnit;
      return $this;
    }

    /**
     * @return ProjectId
     */
    public function getProjectId()
    {
      return $this->ProjectId;
    }

    /**
     * @param ProjectId $ProjectId
     * @return ActivityExpense
     */
    public function setProjectId($ProjectId)
    {
      $this->ProjectId = $ProjectId;
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
     * @return ActivityExpense
     */
    public function setProjectObjectId($ProjectObjectId)
    {
      $this->ProjectObjectId = $ProjectObjectId;
      return $this;
    }

    /**
     * @return float
     */
    public function getRemainingCost()
    {
      return $this->RemainingCost;
    }

    /**
     * @param float $RemainingCost
     * @return ActivityExpense
     */
    public function setRemainingCost($RemainingCost)
    {
      $this->RemainingCost = $RemainingCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getRemainingUnits()
    {
      return $this->RemainingUnits;
    }

    /**
     * @param float $RemainingUnits
     * @return ActivityExpense
     */
    public function setRemainingUnits($RemainingUnits)
    {
      $this->RemainingUnits = $RemainingUnits;
      return $this;
    }

    /**
     * @return UnitOfMeasure
     */
    public function getUnitOfMeasure()
    {
      return $this->UnitOfMeasure;
    }

    /**
     * @param UnitOfMeasure $UnitOfMeasure
     * @return ActivityExpense
     */
    public function setUnitOfMeasure($UnitOfMeasure)
    {
      $this->UnitOfMeasure = $UnitOfMeasure;
      return $this;
    }

    /**
     * @return Vendor
     */
    public function getVendor()
    {
      return $this->Vendor;
    }

    /**
     * @param Vendor $Vendor
     * @return ActivityExpense
     */
    public function setVendor($Vendor)
    {
      $this->Vendor = $Vendor;
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
     * @return ActivityExpense
     */
    public function setWBSObjectId($WBSObjectId)
    {
      $this->WBSObjectId = $WBSObjectId;
      return $this;
    }

}
