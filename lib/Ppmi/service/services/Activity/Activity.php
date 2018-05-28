<?php

class Activity
{

    /**
     * @var float $AccountingVariance
     */
    protected $AccountingVariance = null;

    /**
     * @var float $AccountingVarianceLaborUnits
     */
    protected $AccountingVarianceLaborUnits = null;

    /**
     * @var int $ActivityOwnerUserId
     */
    protected $ActivityOwnerUserId = null;

    /**
     * @var ActualDuration $ActualDuration
     */
    protected $ActualDuration = null;

    /**
     * @var float $ActualExpenseCost
     */
    protected $ActualExpenseCost = null;

    /**
     * @var \DateTime $ActualFinishDate
     */
    protected $ActualFinishDate = null;

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
     * @var \DateTime $ActualStartDate
     */
    protected $ActualStartDate = null;

    /**
     * @var float $ActualThisPeriodLaborCost
     */
    protected $ActualThisPeriodLaborCost = null;

    /**
     * @var float $ActualThisPeriodLaborUnits
     */
    protected $ActualThisPeriodLaborUnits = null;

    /**
     * @var float $ActualThisPeriodMaterialCost
     */
    protected $ActualThisPeriodMaterialCost = null;

    /**
     * @var float $ActualThisPeriodNonLaborCost
     */
    protected $ActualThisPeriodNonLaborCost = null;

    /**
     * @var float $ActualThisPeriodNonLaborUnits
     */
    protected $ActualThisPeriodNonLaborUnits = null;

    /**
     * @var float $ActualTotalCost
     */
    protected $ActualTotalCost = null;

    /**
     * @var float $ActualTotalUnits
     */
    protected $ActualTotalUnits = null;

    /**
     * @var AtCompletionDuration $AtCompletionDuration
     */
    protected $AtCompletionDuration = null;

    /**
     * @var float $AtCompletionExpenseCost
     */
    protected $AtCompletionExpenseCost = null;

    /**
     * @var float $AtCompletionLaborCost
     */
    protected $AtCompletionLaborCost = null;

    /**
     * @var float $AtCompletionLaborUnits
     */
    protected $AtCompletionLaborUnits = null;

    /**
     * @var float $AtCompletionLaborUnitsVariance
     */
    protected $AtCompletionLaborUnitsVariance = null;

    /**
     * @var float $AtCompletionMaterialCost
     */
    protected $AtCompletionMaterialCost = null;

    /**
     * @var float $AtCompletionNonLaborCost
     */
    protected $AtCompletionNonLaborCost = null;

    /**
     * @var float $AtCompletionNonLaborUnits
     */
    protected $AtCompletionNonLaborUnits = null;

    /**
     * @var float $AtCompletionTotalCost
     */
    protected $AtCompletionTotalCost = null;

    /**
     * @var float $AtCompletionTotalUnits
     */
    protected $AtCompletionTotalUnits = null;

    /**
     * @var float $AtCompletionVariance
     */
    protected $AtCompletionVariance = null;

    /**
     * @var boolean $AutoComputeActuals
     */
    protected $AutoComputeActuals = null;

    /**
     * @var float $Baseline1Duration
     */
    protected $Baseline1Duration = null;

    /**
     * @var \DateTime $Baseline1FinishDate
     */
    protected $Baseline1FinishDate = null;

    /**
     * @var float $Baseline1PlannedDuration
     */
    protected $Baseline1PlannedDuration = null;

    /**
     * @var float $Baseline1PlannedExpenseCost
     */
    protected $Baseline1PlannedExpenseCost = null;

    /**
     * @var float $Baseline1PlannedLaborCost
     */
    protected $Baseline1PlannedLaborCost = null;

    /**
     * @var float $Baseline1PlannedLaborUnits
     */
    protected $Baseline1PlannedLaborUnits = null;

    /**
     * @var float $Baseline1PlannedMaterialCost
     */
    protected $Baseline1PlannedMaterialCost = null;

    /**
     * @var float $Baseline1PlannedNonLaborCost
     */
    protected $Baseline1PlannedNonLaborCost = null;

    /**
     * @var float $Baseline1PlannedNonLaborUnits
     */
    protected $Baseline1PlannedNonLaborUnits = null;

    /**
     * @var float $Baseline1PlannedTotalCost
     */
    protected $Baseline1PlannedTotalCost = null;

    /**
     * @var \DateTime $Baseline1StartDate
     */
    protected $Baseline1StartDate = null;

    /**
     * @var float $BaselineDuration
     */
    protected $BaselineDuration = null;

    /**
     * @var \DateTime $BaselineFinishDate
     */
    protected $BaselineFinishDate = null;

    /**
     * @var float $BaselinePlannedDuration
     */
    protected $BaselinePlannedDuration = null;

    /**
     * @var float $BaselinePlannedExpenseCost
     */
    protected $BaselinePlannedExpenseCost = null;

    /**
     * @var float $BaselinePlannedLaborCost
     */
    protected $BaselinePlannedLaborCost = null;

    /**
     * @var float $BaselinePlannedLaborUnits
     */
    protected $BaselinePlannedLaborUnits = null;

    /**
     * @var float $BaselinePlannedMaterialCost
     */
    protected $BaselinePlannedMaterialCost = null;

    /**
     * @var float $BaselinePlannedNonLaborCost
     */
    protected $BaselinePlannedNonLaborCost = null;

    /**
     * @var float $BaselinePlannedNonLaborUnits
     */
    protected $BaselinePlannedNonLaborUnits = null;

    /**
     * @var float $BaselinePlannedTotalCost
     */
    protected $BaselinePlannedTotalCost = null;

    /**
     * @var \DateTime $BaselineStartDate
     */
    protected $BaselineStartDate = null;

    /**
     * @var float $BudgetAtCompletion
     */
    protected $BudgetAtCompletion = null;

    /**
     * @var CBSCode $CBSCode
     */
    protected $CBSCode = null;

    /**
     * @var int $CBSId
     */
    protected $CBSId = null;

    /**
     * @var int $CBSObjectId
     */
    protected $CBSObjectId = null;

    /**
     * @var CalendarName $CalendarName
     */
    protected $CalendarName = null;

    /**
     * @var int $CalendarObjectId
     */
    protected $CalendarObjectId = null;

    /**
     * @var float $CostPercentComplete
     */
    protected $CostPercentComplete = null;

    /**
     * @var float $CostPercentOfPlanned
     */
    protected $CostPercentOfPlanned = null;

    /**
     * @var float $CostPerformanceIndex
     */
    protected $CostPerformanceIndex = null;

    /**
     * @var float $CostPerformanceIndexLaborUnits
     */
    protected $CostPerformanceIndexLaborUnits = null;

    /**
     * @var float $CostVariance
     */
    protected $CostVariance = null;

    /**
     * @var float $CostVarianceIndex
     */
    protected $CostVarianceIndex = null;

    /**
     * @var float $CostVarianceIndexLaborUnits
     */
    protected $CostVarianceIndexLaborUnits = null;

    /**
     * @var float $CostVarianceLaborUnits
     */
    protected $CostVarianceLaborUnits = null;

    /**
     * @var \DateTime $CreateDate
     */
    protected $CreateDate = null;

    /**
     * @var CreateUser $CreateUser
     */
    protected $CreateUser = null;

    /**
     * @var \DateTime $DataDate
     */
    protected $DataDate = null;

    /**
     * @var float $Duration1Variance
     */
    protected $Duration1Variance = null;

    /**
     * @var DurationPercentComplete $DurationPercentComplete
     */
    protected $DurationPercentComplete = null;

    /**
     * @var float $DurationPercentOfPlanned
     */
    protected $DurationPercentOfPlanned = null;

    /**
     * @var DurationType $DurationType
     */
    protected $DurationType = null;

    /**
     * @var float $DurationVariance
     */
    protected $DurationVariance = null;

    /**
     * @var \DateTime $EarlyFinishDate
     */
    protected $EarlyFinishDate = null;

    /**
     * @var \DateTime $EarlyStartDate
     */
    protected $EarlyStartDate = null;

    /**
     * @var float $EarnedValueCost
     */
    protected $EarnedValueCost = null;

    /**
     * @var float $EarnedValueLaborUnits
     */
    protected $EarnedValueLaborUnits = null;

    /**
     * @var float $EstimateAtCompletionCost
     */
    protected $EstimateAtCompletionCost = null;

    /**
     * @var float $EstimateAtCompletionLaborUnits
     */
    protected $EstimateAtCompletionLaborUnits = null;

    /**
     * @var float $EstimateToComplete
     */
    protected $EstimateToComplete = null;

    /**
     * @var float $EstimateToCompleteLaborUnits
     */
    protected $EstimateToCompleteLaborUnits = null;

    /**
     * @var \DateTime $ExpectedFinishDate
     */
    protected $ExpectedFinishDate = null;

    /**
     * @var float $ExpenseCost1Variance
     */
    protected $ExpenseCost1Variance = null;

    /**
     * @var float $ExpenseCostPercentComplete
     */
    protected $ExpenseCostPercentComplete = null;

    /**
     * @var float $ExpenseCostVariance
     */
    protected $ExpenseCostVariance = null;

    /**
     * @var \DateTime $ExternalEarlyStartDate
     */
    protected $ExternalEarlyStartDate = null;

    /**
     * @var \DateTime $ExternalLateFinishDate
     */
    protected $ExternalLateFinishDate = null;

    /**
     * @var string $Feedback
     */
    protected $Feedback = null;

    /**
     * @var \DateTime $FinishDate
     */
    protected $FinishDate = null;

    /**
     * @var float $FinishDate1Variance
     */
    protected $FinishDate1Variance = null;

    /**
     * @var float $FinishDateVariance
     */
    protected $FinishDateVariance = null;

    /**
     * @var int $FloatPath
     */
    protected $FloatPath = null;

    /**
     * @var int $FloatPathOrder
     */
    protected $FloatPathOrder = null;

    /**
     * @var float $FreeFloat
     */
    protected $FreeFloat = null;

    /**
     * @var GUID $GUID
     */
    protected $GUID = null;

    /**
     * @var boolean $HasFutureBucketData
     */
    protected $HasFutureBucketData = null;

    /**
     * @var Id $Id
     */
    protected $Id = null;

    /**
     * @var boolean $IsBaseline
     */
    protected $IsBaseline = null;

    /**
     * @var boolean $IsCritical
     */
    protected $IsCritical = null;

    /**
     * @var boolean $IsLongestPath
     */
    protected $IsLongestPath = null;

    /**
     * @var boolean $IsNewFeedback
     */
    protected $IsNewFeedback = null;

    /**
     * @var boolean $IsStarred
     */
    protected $IsStarred = null;

    /**
     * @var boolean $IsTemplate
     */
    protected $IsTemplate = null;

    /**
     * @var boolean $IsWorkPackage
     */
    protected $IsWorkPackage = null;

    /**
     * @var float $LaborCost1Variance
     */
    protected $LaborCost1Variance = null;

    /**
     * @var float $LaborCostPercentComplete
     */
    protected $LaborCostPercentComplete = null;

    /**
     * @var float $LaborCostVariance
     */
    protected $LaborCostVariance = null;

    /**
     * @var float $LaborUnits1Variance
     */
    protected $LaborUnits1Variance = null;

    /**
     * @var float $LaborUnitsPercentComplete
     */
    protected $LaborUnitsPercentComplete = null;

    /**
     * @var float $LaborUnitsVariance
     */
    protected $LaborUnitsVariance = null;

    /**
     * @var \DateTime $LastUpdateDate
     */
    protected $LastUpdateDate = null;

    /**
     * @var LastUpdateUser $LastUpdateUser
     */
    protected $LastUpdateUser = null;

    /**
     * @var \DateTime $LateFinishDate
     */
    protected $LateFinishDate = null;

    /**
     * @var \DateTime $LateStartDate
     */
    protected $LateStartDate = null;

    /**
     * @var LevelingPriority $LevelingPriority
     */
    protected $LevelingPriority = null;

    /**
     * @var LocationName $LocationName
     */
    protected $LocationName = null;

    /**
     * @var int $LocationObjectId
     */
    protected $LocationObjectId = null;

    /**
     * @var float $MaterialCost1Variance
     */
    protected $MaterialCost1Variance = null;

    /**
     * @var float $MaterialCostPercentComplete
     */
    protected $MaterialCostPercentComplete = null;

    /**
     * @var float $MaterialCostVariance
     */
    protected $MaterialCostVariance = null;

    /**
     * @var MaximumDuration $MaximumDuration
     */
    protected $MaximumDuration = null;

    /**
     * @var MinimumDuration $MinimumDuration
     */
    protected $MinimumDuration = null;

    /**
     * @var MostLikelyDuration $MostLikelyDuration
     */
    protected $MostLikelyDuration = null;

    /**
     * @var Name $Name
     */
    protected $Name = null;

    /**
     * @var float $NonLaborCost1Variance
     */
    protected $NonLaborCost1Variance = null;

    /**
     * @var float $NonLaborCostPercentComplete
     */
    protected $NonLaborCostPercentComplete = null;

    /**
     * @var float $NonLaborCostVariance
     */
    protected $NonLaborCostVariance = null;

    /**
     * @var float $NonLaborUnits1Variance
     */
    protected $NonLaborUnits1Variance = null;

    /**
     * @var float $NonLaborUnitsPercentComplete
     */
    protected $NonLaborUnitsPercentComplete = null;

    /**
     * @var float $NonLaborUnitsVariance
     */
    protected $NonLaborUnitsVariance = null;

    /**
     * @var string $NotesToResources
     */
    protected $NotesToResources = null;

    /**
     * @var int $ObjectId
     */
    protected $ObjectId = null;

    /**
     * @var float $PercentComplete
     */
    protected $PercentComplete = null;

    /**
     * @var PercentCompleteType $PercentCompleteType
     */
    protected $PercentCompleteType = null;

    /**
     * @var float $PerformancePercentComplete
     */
    protected $PerformancePercentComplete = null;

    /**
     * @var float $PhysicalPercentComplete
     */
    protected $PhysicalPercentComplete = null;

    /**
     * @var PlannedDuration $PlannedDuration
     */
    protected $PlannedDuration = null;

    /**
     * @var float $PlannedExpenseCost
     */
    protected $PlannedExpenseCost = null;

    /**
     * @var \DateTime $PlannedFinishDate
     */
    protected $PlannedFinishDate = null;

    /**
     * @var float $PlannedLaborCost
     */
    protected $PlannedLaborCost = null;

    /**
     * @var float $PlannedLaborUnits
     */
    protected $PlannedLaborUnits = null;

    /**
     * @var float $PlannedMaterialCost
     */
    protected $PlannedMaterialCost = null;

    /**
     * @var float $PlannedNonLaborCost
     */
    protected $PlannedNonLaborCost = null;

    /**
     * @var float $PlannedNonLaborUnits
     */
    protected $PlannedNonLaborUnits = null;

    /**
     * @var \DateTime $PlannedStartDate
     */
    protected $PlannedStartDate = null;

    /**
     * @var float $PlannedTotalCost
     */
    protected $PlannedTotalCost = null;

    /**
     * @var float $PlannedTotalUnits
     */
    protected $PlannedTotalUnits = null;

    /**
     * @var float $PlannedValueCost
     */
    protected $PlannedValueCost = null;

    /**
     * @var float $PlannedValueLaborUnits
     */
    protected $PlannedValueLaborUnits = null;

    /**
     * @var \DateTime $PostResponsePessimisticFinish
     */
    protected $PostResponsePessimisticFinish = null;

    /**
     * @var \DateTime $PostResponsePessimisticStart
     */
    protected $PostResponsePessimisticStart = null;

    /**
     * @var \DateTime $PreResponsePessimisticFinish
     */
    protected $PreResponsePessimisticFinish = null;

    /**
     * @var \DateTime $PreResponsePessimisticStart
     */
    protected $PreResponsePessimisticStart = null;

    /**
     * @var \DateTime $PrimaryConstraintDate
     */
    protected $PrimaryConstraintDate = null;

    /**
     * @var PrimaryConstraintType $PrimaryConstraintType
     */
    protected $PrimaryConstraintType = null;

    /**
     * @var PrimaryResourceId $PrimaryResourceId
     */
    protected $PrimaryResourceId = null;

    /**
     * @var PrimaryResourceName $PrimaryResourceName
     */
    protected $PrimaryResourceName = null;

    /**
     * @var int $PrimaryResourceObjectId
     */
    protected $PrimaryResourceObjectId = null;

    /**
     * @var string $ProjectId
     */
    protected $ProjectId = null;

    /**
     * @var string $ProjectName
     */
    protected $ProjectName = null;

    /**
     * @var int $ProjectObjectId
     */
    protected $ProjectObjectId = null;

    /**
     * @var RemainingDuration $RemainingDuration
     */
    protected $RemainingDuration = null;

    /**
     * @var \DateTime $RemainingEarlyFinishDate
     */
    protected $RemainingEarlyFinishDate = null;

    /**
     * @var \DateTime $RemainingEarlyStartDate
     */
    protected $RemainingEarlyStartDate = null;

    /**
     * @var float $RemainingExpenseCost
     */
    protected $RemainingExpenseCost = null;

    /**
     * @var float $RemainingFloat
     */
    protected $RemainingFloat = null;

    /**
     * @var float $RemainingLaborCost
     */
    protected $RemainingLaborCost = null;

    /**
     * @var float $RemainingLaborUnits
     */
    protected $RemainingLaborUnits = null;

    /**
     * @var \DateTime $RemainingLateFinishDate
     */
    protected $RemainingLateFinishDate = null;

    /**
     * @var \DateTime $RemainingLateStartDate
     */
    protected $RemainingLateStartDate = null;

    /**
     * @var float $RemainingMaterialCost
     */
    protected $RemainingMaterialCost = null;

    /**
     * @var float $RemainingNonLaborCost
     */
    protected $RemainingNonLaborCost = null;

    /**
     * @var float $RemainingNonLaborUnits
     */
    protected $RemainingNonLaborUnits = null;

    /**
     * @var float $RemainingTotalCost
     */
    protected $RemainingTotalCost = null;

    /**
     * @var float $RemainingTotalUnits
     */
    protected $RemainingTotalUnits = null;

    /**
     * @var \DateTime $ResumeDate
     */
    protected $ResumeDate = null;

    /**
     * @var \DateTime $ReviewFinishDate
     */
    protected $ReviewFinishDate = null;

    /**
     * @var boolean $ReviewRequired
     */
    protected $ReviewRequired = null;

    /**
     * @var ReviewStatus $ReviewStatus
     */
    protected $ReviewStatus = null;

    /**
     * @var float $SchedulePercentComplete
     */
    protected $SchedulePercentComplete = null;

    /**
     * @var float $SchedulePerformanceIndex
     */
    protected $SchedulePerformanceIndex = null;

    /**
     * @var float $SchedulePerformanceIndexLaborUnits
     */
    protected $SchedulePerformanceIndexLaborUnits = null;

    /**
     * @var float $ScheduleVariance
     */
    protected $ScheduleVariance = null;

    /**
     * @var float $ScheduleVarianceIndex
     */
    protected $ScheduleVarianceIndex = null;

    /**
     * @var float $ScheduleVarianceIndexLaborUnits
     */
    protected $ScheduleVarianceIndexLaborUnits = null;

    /**
     * @var float $ScheduleVarianceLaborUnits
     */
    protected $ScheduleVarianceLaborUnits = null;

    /**
     * @var \DateTime $SecondaryConstraintDate
     */
    protected $SecondaryConstraintDate = null;

    /**
     * @var SecondaryConstraintType $SecondaryConstraintType
     */
    protected $SecondaryConstraintType = null;

    /**
     * @var \DateTime $StartDate
     */
    protected $StartDate = null;

    /**
     * @var float $StartDate1Variance
     */
    protected $StartDate1Variance = null;

    /**
     * @var float $StartDateVariance
     */
    protected $StartDateVariance = null;

    /**
     * @var Status $Status
     */
    protected $Status = null;

    /**
     * @var \DateTime $SuspendDate
     */
    protected $SuspendDate = null;

    /**
     * @var float $ToCompletePerformanceIndex
     */
    protected $ToCompletePerformanceIndex = null;

    /**
     * @var float $TotalCost1Variance
     */
    protected $TotalCost1Variance = null;

    /**
     * @var float $TotalCostVariance
     */
    protected $TotalCostVariance = null;

    /**
     * @var float $TotalFloat
     */
    protected $TotalFloat = null;

    /**
     * @var Type $Type
     */
    protected $Type = null;

    /**
     * @var float $UnitsPercentComplete
     */
    protected $UnitsPercentComplete = null;

    /**
     * @var int $UnreadCommentCount
     */
    protected $UnreadCommentCount = null;

    /**
     * @var WBSCode $WBSCode
     */
    protected $WBSCode = null;

    /**
     * @var WBSName $WBSName
     */
    protected $WBSName = null;

    /**
     * @var int $WBSObjectId
     */
    protected $WBSObjectId = null;

    /**
     * @var string $WBSPath
     */
    protected $WBSPath = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return float
     */
    public function getAccountingVariance()
    {
      return $this->AccountingVariance;
    }

    /**
     * @param float $AccountingVariance
     * @return Activity
     */
    public function setAccountingVariance($AccountingVariance)
    {
      $this->AccountingVariance = $AccountingVariance;
      return $this;
    }

    /**
     * @return float
     */
    public function getAccountingVarianceLaborUnits()
    {
      return $this->AccountingVarianceLaborUnits;
    }

    /**
     * @param float $AccountingVarianceLaborUnits
     * @return Activity
     */
    public function setAccountingVarianceLaborUnits($AccountingVarianceLaborUnits)
    {
      $this->AccountingVarianceLaborUnits = $AccountingVarianceLaborUnits;
      return $this;
    }

    /**
     * @return int
     */
    public function getActivityOwnerUserId()
    {
      return $this->ActivityOwnerUserId;
    }

    /**
     * @param int $ActivityOwnerUserId
     * @return Activity
     */
    public function setActivityOwnerUserId($ActivityOwnerUserId)
    {
      $this->ActivityOwnerUserId = $ActivityOwnerUserId;
      return $this;
    }

    /**
     * @return ActualDuration
     */
    public function getActualDuration()
    {
      return $this->ActualDuration;
    }

    /**
     * @param ActualDuration $ActualDuration
     * @return Activity
     */
    public function setActualDuration($ActualDuration)
    {
      $this->ActualDuration = $ActualDuration;
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
     * @return Activity
     */
    public function setActualExpenseCost($ActualExpenseCost)
    {
      $this->ActualExpenseCost = $ActualExpenseCost;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getActualFinishDate()
    {
      if ($this->ActualFinishDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->ActualFinishDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $ActualFinishDate
     * @return Activity
     */
    public function setActualFinishDate(\DateTime $ActualFinishDate = null)
    {
      if ($ActualFinishDate == null) {
       $this->ActualFinishDate = null;
      } else {
        $this->ActualFinishDate = $ActualFinishDate->format(\DateTime::ATOM);
      }
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
     * @return Activity
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
     * @return Activity
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
     * @return Activity
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
     * @return Activity
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
     * @return Activity
     */
    public function setActualNonLaborUnits($ActualNonLaborUnits)
    {
      $this->ActualNonLaborUnits = $ActualNonLaborUnits;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getActualStartDate()
    {
      if ($this->ActualStartDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->ActualStartDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $ActualStartDate
     * @return Activity
     */
    public function setActualStartDate(\DateTime $ActualStartDate = null)
    {
      if ($ActualStartDate == null) {
       $this->ActualStartDate = null;
      } else {
        $this->ActualStartDate = $ActualStartDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return float
     */
    public function getActualThisPeriodLaborCost()
    {
      return $this->ActualThisPeriodLaborCost;
    }

    /**
     * @param float $ActualThisPeriodLaborCost
     * @return Activity
     */
    public function setActualThisPeriodLaborCost($ActualThisPeriodLaborCost)
    {
      $this->ActualThisPeriodLaborCost = $ActualThisPeriodLaborCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getActualThisPeriodLaborUnits()
    {
      return $this->ActualThisPeriodLaborUnits;
    }

    /**
     * @param float $ActualThisPeriodLaborUnits
     * @return Activity
     */
    public function setActualThisPeriodLaborUnits($ActualThisPeriodLaborUnits)
    {
      $this->ActualThisPeriodLaborUnits = $ActualThisPeriodLaborUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getActualThisPeriodMaterialCost()
    {
      return $this->ActualThisPeriodMaterialCost;
    }

    /**
     * @param float $ActualThisPeriodMaterialCost
     * @return Activity
     */
    public function setActualThisPeriodMaterialCost($ActualThisPeriodMaterialCost)
    {
      $this->ActualThisPeriodMaterialCost = $ActualThisPeriodMaterialCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getActualThisPeriodNonLaborCost()
    {
      return $this->ActualThisPeriodNonLaborCost;
    }

    /**
     * @param float $ActualThisPeriodNonLaborCost
     * @return Activity
     */
    public function setActualThisPeriodNonLaborCost($ActualThisPeriodNonLaborCost)
    {
      $this->ActualThisPeriodNonLaborCost = $ActualThisPeriodNonLaborCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getActualThisPeriodNonLaborUnits()
    {
      return $this->ActualThisPeriodNonLaborUnits;
    }

    /**
     * @param float $ActualThisPeriodNonLaborUnits
     * @return Activity
     */
    public function setActualThisPeriodNonLaborUnits($ActualThisPeriodNonLaborUnits)
    {
      $this->ActualThisPeriodNonLaborUnits = $ActualThisPeriodNonLaborUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getActualTotalCost()
    {
      return $this->ActualTotalCost;
    }

    /**
     * @param float $ActualTotalCost
     * @return Activity
     */
    public function setActualTotalCost($ActualTotalCost)
    {
      $this->ActualTotalCost = $ActualTotalCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getActualTotalUnits()
    {
      return $this->ActualTotalUnits;
    }

    /**
     * @param float $ActualTotalUnits
     * @return Activity
     */
    public function setActualTotalUnits($ActualTotalUnits)
    {
      $this->ActualTotalUnits = $ActualTotalUnits;
      return $this;
    }

    /**
     * @return AtCompletionDuration
     */
    public function getAtCompletionDuration()
    {
      return $this->AtCompletionDuration;
    }

    /**
     * @param AtCompletionDuration $AtCompletionDuration
     * @return Activity
     */
    public function setAtCompletionDuration($AtCompletionDuration)
    {
      $this->AtCompletionDuration = $AtCompletionDuration;
      return $this;
    }

    /**
     * @return float
     */
    public function getAtCompletionExpenseCost()
    {
      return $this->AtCompletionExpenseCost;
    }

    /**
     * @param float $AtCompletionExpenseCost
     * @return Activity
     */
    public function setAtCompletionExpenseCost($AtCompletionExpenseCost)
    {
      $this->AtCompletionExpenseCost = $AtCompletionExpenseCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getAtCompletionLaborCost()
    {
      return $this->AtCompletionLaborCost;
    }

    /**
     * @param float $AtCompletionLaborCost
     * @return Activity
     */
    public function setAtCompletionLaborCost($AtCompletionLaborCost)
    {
      $this->AtCompletionLaborCost = $AtCompletionLaborCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getAtCompletionLaborUnits()
    {
      return $this->AtCompletionLaborUnits;
    }

    /**
     * @param float $AtCompletionLaborUnits
     * @return Activity
     */
    public function setAtCompletionLaborUnits($AtCompletionLaborUnits)
    {
      $this->AtCompletionLaborUnits = $AtCompletionLaborUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getAtCompletionLaborUnitsVariance()
    {
      return $this->AtCompletionLaborUnitsVariance;
    }

    /**
     * @param float $AtCompletionLaborUnitsVariance
     * @return Activity
     */
    public function setAtCompletionLaborUnitsVariance($AtCompletionLaborUnitsVariance)
    {
      $this->AtCompletionLaborUnitsVariance = $AtCompletionLaborUnitsVariance;
      return $this;
    }

    /**
     * @return float
     */
    public function getAtCompletionMaterialCost()
    {
      return $this->AtCompletionMaterialCost;
    }

    /**
     * @param float $AtCompletionMaterialCost
     * @return Activity
     */
    public function setAtCompletionMaterialCost($AtCompletionMaterialCost)
    {
      $this->AtCompletionMaterialCost = $AtCompletionMaterialCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getAtCompletionNonLaborCost()
    {
      return $this->AtCompletionNonLaborCost;
    }

    /**
     * @param float $AtCompletionNonLaborCost
     * @return Activity
     */
    public function setAtCompletionNonLaborCost($AtCompletionNonLaborCost)
    {
      $this->AtCompletionNonLaborCost = $AtCompletionNonLaborCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getAtCompletionNonLaborUnits()
    {
      return $this->AtCompletionNonLaborUnits;
    }

    /**
     * @param float $AtCompletionNonLaborUnits
     * @return Activity
     */
    public function setAtCompletionNonLaborUnits($AtCompletionNonLaborUnits)
    {
      $this->AtCompletionNonLaborUnits = $AtCompletionNonLaborUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getAtCompletionTotalCost()
    {
      return $this->AtCompletionTotalCost;
    }

    /**
     * @param float $AtCompletionTotalCost
     * @return Activity
     */
    public function setAtCompletionTotalCost($AtCompletionTotalCost)
    {
      $this->AtCompletionTotalCost = $AtCompletionTotalCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getAtCompletionTotalUnits()
    {
      return $this->AtCompletionTotalUnits;
    }

    /**
     * @param float $AtCompletionTotalUnits
     * @return Activity
     */
    public function setAtCompletionTotalUnits($AtCompletionTotalUnits)
    {
      $this->AtCompletionTotalUnits = $AtCompletionTotalUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getAtCompletionVariance()
    {
      return $this->AtCompletionVariance;
    }

    /**
     * @param float $AtCompletionVariance
     * @return Activity
     */
    public function setAtCompletionVariance($AtCompletionVariance)
    {
      $this->AtCompletionVariance = $AtCompletionVariance;
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
     * @return Activity
     */
    public function setAutoComputeActuals($AutoComputeActuals)
    {
      $this->AutoComputeActuals = $AutoComputeActuals;
      return $this;
    }

    /**
     * @return float
     */
    public function getBaseline1Duration()
    {
      return $this->Baseline1Duration;
    }

    /**
     * @param float $Baseline1Duration
     * @return Activity
     */
    public function setBaseline1Duration($Baseline1Duration)
    {
      $this->Baseline1Duration = $Baseline1Duration;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBaseline1FinishDate()
    {
      if ($this->Baseline1FinishDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->Baseline1FinishDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $Baseline1FinishDate
     * @return Activity
     */
    public function setBaseline1FinishDate(\DateTime $Baseline1FinishDate = null)
    {
      if ($Baseline1FinishDate == null) {
       $this->Baseline1FinishDate = null;
      } else {
        $this->Baseline1FinishDate = $Baseline1FinishDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return float
     */
    public function getBaseline1PlannedDuration()
    {
      return $this->Baseline1PlannedDuration;
    }

    /**
     * @param float $Baseline1PlannedDuration
     * @return Activity
     */
    public function setBaseline1PlannedDuration($Baseline1PlannedDuration)
    {
      $this->Baseline1PlannedDuration = $Baseline1PlannedDuration;
      return $this;
    }

    /**
     * @return float
     */
    public function getBaseline1PlannedExpenseCost()
    {
      return $this->Baseline1PlannedExpenseCost;
    }

    /**
     * @param float $Baseline1PlannedExpenseCost
     * @return Activity
     */
    public function setBaseline1PlannedExpenseCost($Baseline1PlannedExpenseCost)
    {
      $this->Baseline1PlannedExpenseCost = $Baseline1PlannedExpenseCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getBaseline1PlannedLaborCost()
    {
      return $this->Baseline1PlannedLaborCost;
    }

    /**
     * @param float $Baseline1PlannedLaborCost
     * @return Activity
     */
    public function setBaseline1PlannedLaborCost($Baseline1PlannedLaborCost)
    {
      $this->Baseline1PlannedLaborCost = $Baseline1PlannedLaborCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getBaseline1PlannedLaborUnits()
    {
      return $this->Baseline1PlannedLaborUnits;
    }

    /**
     * @param float $Baseline1PlannedLaborUnits
     * @return Activity
     */
    public function setBaseline1PlannedLaborUnits($Baseline1PlannedLaborUnits)
    {
      $this->Baseline1PlannedLaborUnits = $Baseline1PlannedLaborUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getBaseline1PlannedMaterialCost()
    {
      return $this->Baseline1PlannedMaterialCost;
    }

    /**
     * @param float $Baseline1PlannedMaterialCost
     * @return Activity
     */
    public function setBaseline1PlannedMaterialCost($Baseline1PlannedMaterialCost)
    {
      $this->Baseline1PlannedMaterialCost = $Baseline1PlannedMaterialCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getBaseline1PlannedNonLaborCost()
    {
      return $this->Baseline1PlannedNonLaborCost;
    }

    /**
     * @param float $Baseline1PlannedNonLaborCost
     * @return Activity
     */
    public function setBaseline1PlannedNonLaborCost($Baseline1PlannedNonLaborCost)
    {
      $this->Baseline1PlannedNonLaborCost = $Baseline1PlannedNonLaborCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getBaseline1PlannedNonLaborUnits()
    {
      return $this->Baseline1PlannedNonLaborUnits;
    }

    /**
     * @param float $Baseline1PlannedNonLaborUnits
     * @return Activity
     */
    public function setBaseline1PlannedNonLaborUnits($Baseline1PlannedNonLaborUnits)
    {
      $this->Baseline1PlannedNonLaborUnits = $Baseline1PlannedNonLaborUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getBaseline1PlannedTotalCost()
    {
      return $this->Baseline1PlannedTotalCost;
    }

    /**
     * @param float $Baseline1PlannedTotalCost
     * @return Activity
     */
    public function setBaseline1PlannedTotalCost($Baseline1PlannedTotalCost)
    {
      $this->Baseline1PlannedTotalCost = $Baseline1PlannedTotalCost;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBaseline1StartDate()
    {
      if ($this->Baseline1StartDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->Baseline1StartDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $Baseline1StartDate
     * @return Activity
     */
    public function setBaseline1StartDate(\DateTime $Baseline1StartDate = null)
    {
      if ($Baseline1StartDate == null) {
       $this->Baseline1StartDate = null;
      } else {
        $this->Baseline1StartDate = $Baseline1StartDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return float
     */
    public function getBaselineDuration()
    {
      return $this->BaselineDuration;
    }

    /**
     * @param float $BaselineDuration
     * @return Activity
     */
    public function setBaselineDuration($BaselineDuration)
    {
      $this->BaselineDuration = $BaselineDuration;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBaselineFinishDate()
    {
      if ($this->BaselineFinishDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->BaselineFinishDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $BaselineFinishDate
     * @return Activity
     */
    public function setBaselineFinishDate(\DateTime $BaselineFinishDate = null)
    {
      if ($BaselineFinishDate == null) {
       $this->BaselineFinishDate = null;
      } else {
        $this->BaselineFinishDate = $BaselineFinishDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return float
     */
    public function getBaselinePlannedDuration()
    {
      return $this->BaselinePlannedDuration;
    }

    /**
     * @param float $BaselinePlannedDuration
     * @return Activity
     */
    public function setBaselinePlannedDuration($BaselinePlannedDuration)
    {
      $this->BaselinePlannedDuration = $BaselinePlannedDuration;
      return $this;
    }

    /**
     * @return float
     */
    public function getBaselinePlannedExpenseCost()
    {
      return $this->BaselinePlannedExpenseCost;
    }

    /**
     * @param float $BaselinePlannedExpenseCost
     * @return Activity
     */
    public function setBaselinePlannedExpenseCost($BaselinePlannedExpenseCost)
    {
      $this->BaselinePlannedExpenseCost = $BaselinePlannedExpenseCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getBaselinePlannedLaborCost()
    {
      return $this->BaselinePlannedLaborCost;
    }

    /**
     * @param float $BaselinePlannedLaborCost
     * @return Activity
     */
    public function setBaselinePlannedLaborCost($BaselinePlannedLaborCost)
    {
      $this->BaselinePlannedLaborCost = $BaselinePlannedLaborCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getBaselinePlannedLaborUnits()
    {
      return $this->BaselinePlannedLaborUnits;
    }

    /**
     * @param float $BaselinePlannedLaborUnits
     * @return Activity
     */
    public function setBaselinePlannedLaborUnits($BaselinePlannedLaborUnits)
    {
      $this->BaselinePlannedLaborUnits = $BaselinePlannedLaborUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getBaselinePlannedMaterialCost()
    {
      return $this->BaselinePlannedMaterialCost;
    }

    /**
     * @param float $BaselinePlannedMaterialCost
     * @return Activity
     */
    public function setBaselinePlannedMaterialCost($BaselinePlannedMaterialCost)
    {
      $this->BaselinePlannedMaterialCost = $BaselinePlannedMaterialCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getBaselinePlannedNonLaborCost()
    {
      return $this->BaselinePlannedNonLaborCost;
    }

    /**
     * @param float $BaselinePlannedNonLaborCost
     * @return Activity
     */
    public function setBaselinePlannedNonLaborCost($BaselinePlannedNonLaborCost)
    {
      $this->BaselinePlannedNonLaborCost = $BaselinePlannedNonLaborCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getBaselinePlannedNonLaborUnits()
    {
      return $this->BaselinePlannedNonLaborUnits;
    }

    /**
     * @param float $BaselinePlannedNonLaborUnits
     * @return Activity
     */
    public function setBaselinePlannedNonLaborUnits($BaselinePlannedNonLaborUnits)
    {
      $this->BaselinePlannedNonLaborUnits = $BaselinePlannedNonLaborUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getBaselinePlannedTotalCost()
    {
      return $this->BaselinePlannedTotalCost;
    }

    /**
     * @param float $BaselinePlannedTotalCost
     * @return Activity
     */
    public function setBaselinePlannedTotalCost($BaselinePlannedTotalCost)
    {
      $this->BaselinePlannedTotalCost = $BaselinePlannedTotalCost;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBaselineStartDate()
    {
      if ($this->BaselineStartDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->BaselineStartDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $BaselineStartDate
     * @return Activity
     */
    public function setBaselineStartDate(\DateTime $BaselineStartDate = null)
    {
      if ($BaselineStartDate == null) {
       $this->BaselineStartDate = null;
      } else {
        $this->BaselineStartDate = $BaselineStartDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return float
     */
    public function getBudgetAtCompletion()
    {
      return $this->BudgetAtCompletion;
    }

    /**
     * @param float $BudgetAtCompletion
     * @return Activity
     */
    public function setBudgetAtCompletion($BudgetAtCompletion)
    {
      $this->BudgetAtCompletion = $BudgetAtCompletion;
      return $this;
    }

    /**
     * @return CBSCode
     */
    public function getCBSCode()
    {
      return $this->CBSCode;
    }

    /**
     * @param CBSCode $CBSCode
     * @return Activity
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
     * @return Activity
     */
    public function setCBSId($CBSId)
    {
      $this->CBSId = $CBSId;
      return $this;
    }

    /**
     * @return int
     */
    public function getCBSObjectId()
    {
      return $this->CBSObjectId;
    }

    /**
     * @param int $CBSObjectId
     * @return Activity
     */
    public function setCBSObjectId($CBSObjectId)
    {
      $this->CBSObjectId = $CBSObjectId;
      return $this;
    }

    /**
     * @return CalendarName
     */
    public function getCalendarName()
    {
      return $this->CalendarName;
    }

    /**
     * @param CalendarName $CalendarName
     * @return Activity
     */
    public function setCalendarName($CalendarName)
    {
      $this->CalendarName = $CalendarName;
      return $this;
    }

    /**
     * @return int
     */
    public function getCalendarObjectId()
    {
      return $this->CalendarObjectId;
    }

    /**
     * @param int $CalendarObjectId
     * @return Activity
     */
    public function setCalendarObjectId($CalendarObjectId)
    {
      $this->CalendarObjectId = $CalendarObjectId;
      return $this;
    }

    /**
     * @return float
     */
    public function getCostPercentComplete()
    {
      return $this->CostPercentComplete;
    }

    /**
     * @param float $CostPercentComplete
     * @return Activity
     */
    public function setCostPercentComplete($CostPercentComplete)
    {
      $this->CostPercentComplete = $CostPercentComplete;
      return $this;
    }

    /**
     * @return float
     */
    public function getCostPercentOfPlanned()
    {
      return $this->CostPercentOfPlanned;
    }

    /**
     * @param float $CostPercentOfPlanned
     * @return Activity
     */
    public function setCostPercentOfPlanned($CostPercentOfPlanned)
    {
      $this->CostPercentOfPlanned = $CostPercentOfPlanned;
      return $this;
    }

    /**
     * @return float
     */
    public function getCostPerformanceIndex()
    {
      return $this->CostPerformanceIndex;
    }

    /**
     * @param float $CostPerformanceIndex
     * @return Activity
     */
    public function setCostPerformanceIndex($CostPerformanceIndex)
    {
      $this->CostPerformanceIndex = $CostPerformanceIndex;
      return $this;
    }

    /**
     * @return float
     */
    public function getCostPerformanceIndexLaborUnits()
    {
      return $this->CostPerformanceIndexLaborUnits;
    }

    /**
     * @param float $CostPerformanceIndexLaborUnits
     * @return Activity
     */
    public function setCostPerformanceIndexLaborUnits($CostPerformanceIndexLaborUnits)
    {
      $this->CostPerformanceIndexLaborUnits = $CostPerformanceIndexLaborUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getCostVariance()
    {
      return $this->CostVariance;
    }

    /**
     * @param float $CostVariance
     * @return Activity
     */
    public function setCostVariance($CostVariance)
    {
      $this->CostVariance = $CostVariance;
      return $this;
    }

    /**
     * @return float
     */
    public function getCostVarianceIndex()
    {
      return $this->CostVarianceIndex;
    }

    /**
     * @param float $CostVarianceIndex
     * @return Activity
     */
    public function setCostVarianceIndex($CostVarianceIndex)
    {
      $this->CostVarianceIndex = $CostVarianceIndex;
      return $this;
    }

    /**
     * @return float
     */
    public function getCostVarianceIndexLaborUnits()
    {
      return $this->CostVarianceIndexLaborUnits;
    }

    /**
     * @param float $CostVarianceIndexLaborUnits
     * @return Activity
     */
    public function setCostVarianceIndexLaborUnits($CostVarianceIndexLaborUnits)
    {
      $this->CostVarianceIndexLaborUnits = $CostVarianceIndexLaborUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getCostVarianceLaborUnits()
    {
      return $this->CostVarianceLaborUnits;
    }

    /**
     * @param float $CostVarianceLaborUnits
     * @return Activity
     */
    public function setCostVarianceLaborUnits($CostVarianceLaborUnits)
    {
      $this->CostVarianceLaborUnits = $CostVarianceLaborUnits;
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
     * @return Activity
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
     * @return Activity
     */
    public function setCreateUser($CreateUser)
    {
      $this->CreateUser = $CreateUser;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataDate()
    {
      if ($this->DataDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->DataDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $DataDate
     * @return Activity
     */
    public function setDataDate(\DateTime $DataDate = null)
    {
      if ($DataDate == null) {
       $this->DataDate = null;
      } else {
        $this->DataDate = $DataDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return float
     */
    public function getDuration1Variance()
    {
      return $this->Duration1Variance;
    }

    /**
     * @param float $Duration1Variance
     * @return Activity
     */
    public function setDuration1Variance($Duration1Variance)
    {
      $this->Duration1Variance = $Duration1Variance;
      return $this;
    }

    /**
     * @return DurationPercentComplete
     */
    public function getDurationPercentComplete()
    {
      return $this->DurationPercentComplete;
    }

    /**
     * @param DurationPercentComplete $DurationPercentComplete
     * @return Activity
     */
    public function setDurationPercentComplete($DurationPercentComplete)
    {
      $this->DurationPercentComplete = $DurationPercentComplete;
      return $this;
    }

    /**
     * @return float
     */
    public function getDurationPercentOfPlanned()
    {
      return $this->DurationPercentOfPlanned;
    }

    /**
     * @param float $DurationPercentOfPlanned
     * @return Activity
     */
    public function setDurationPercentOfPlanned($DurationPercentOfPlanned)
    {
      $this->DurationPercentOfPlanned = $DurationPercentOfPlanned;
      return $this;
    }

    /**
     * @return DurationType
     */
    public function getDurationType()
    {
      return $this->DurationType;
    }

    /**
     * @param DurationType $DurationType
     * @return Activity
     */
    public function setDurationType($DurationType)
    {
      $this->DurationType = $DurationType;
      return $this;
    }

    /**
     * @return float
     */
    public function getDurationVariance()
    {
      return $this->DurationVariance;
    }

    /**
     * @param float $DurationVariance
     * @return Activity
     */
    public function setDurationVariance($DurationVariance)
    {
      $this->DurationVariance = $DurationVariance;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEarlyFinishDate()
    {
      if ($this->EarlyFinishDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->EarlyFinishDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $EarlyFinishDate
     * @return Activity
     */
    public function setEarlyFinishDate(\DateTime $EarlyFinishDate = null)
    {
      if ($EarlyFinishDate == null) {
       $this->EarlyFinishDate = null;
      } else {
        $this->EarlyFinishDate = $EarlyFinishDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEarlyStartDate()
    {
      if ($this->EarlyStartDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->EarlyStartDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $EarlyStartDate
     * @return Activity
     */
    public function setEarlyStartDate(\DateTime $EarlyStartDate = null)
    {
      if ($EarlyStartDate == null) {
       $this->EarlyStartDate = null;
      } else {
        $this->EarlyStartDate = $EarlyStartDate->format(\DateTime::ATOM);
      }
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
     * @return Activity
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
     * @return Activity
     */
    public function setEarnedValueLaborUnits($EarnedValueLaborUnits)
    {
      $this->EarnedValueLaborUnits = $EarnedValueLaborUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getEstimateAtCompletionCost()
    {
      return $this->EstimateAtCompletionCost;
    }

    /**
     * @param float $EstimateAtCompletionCost
     * @return Activity
     */
    public function setEstimateAtCompletionCost($EstimateAtCompletionCost)
    {
      $this->EstimateAtCompletionCost = $EstimateAtCompletionCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getEstimateAtCompletionLaborUnits()
    {
      return $this->EstimateAtCompletionLaborUnits;
    }

    /**
     * @param float $EstimateAtCompletionLaborUnits
     * @return Activity
     */
    public function setEstimateAtCompletionLaborUnits($EstimateAtCompletionLaborUnits)
    {
      $this->EstimateAtCompletionLaborUnits = $EstimateAtCompletionLaborUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getEstimateToComplete()
    {
      return $this->EstimateToComplete;
    }

    /**
     * @param float $EstimateToComplete
     * @return Activity
     */
    public function setEstimateToComplete($EstimateToComplete)
    {
      $this->EstimateToComplete = $EstimateToComplete;
      return $this;
    }

    /**
     * @return float
     */
    public function getEstimateToCompleteLaborUnits()
    {
      return $this->EstimateToCompleteLaborUnits;
    }

    /**
     * @param float $EstimateToCompleteLaborUnits
     * @return Activity
     */
    public function setEstimateToCompleteLaborUnits($EstimateToCompleteLaborUnits)
    {
      $this->EstimateToCompleteLaborUnits = $EstimateToCompleteLaborUnits;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpectedFinishDate()
    {
      if ($this->ExpectedFinishDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->ExpectedFinishDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $ExpectedFinishDate
     * @return Activity
     */
    public function setExpectedFinishDate(\DateTime $ExpectedFinishDate = null)
    {
      if ($ExpectedFinishDate == null) {
       $this->ExpectedFinishDate = null;
      } else {
        $this->ExpectedFinishDate = $ExpectedFinishDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return float
     */
    public function getExpenseCost1Variance()
    {
      return $this->ExpenseCost1Variance;
    }

    /**
     * @param float $ExpenseCost1Variance
     * @return Activity
     */
    public function setExpenseCost1Variance($ExpenseCost1Variance)
    {
      $this->ExpenseCost1Variance = $ExpenseCost1Variance;
      return $this;
    }

    /**
     * @return float
     */
    public function getExpenseCostPercentComplete()
    {
      return $this->ExpenseCostPercentComplete;
    }

    /**
     * @param float $ExpenseCostPercentComplete
     * @return Activity
     */
    public function setExpenseCostPercentComplete($ExpenseCostPercentComplete)
    {
      $this->ExpenseCostPercentComplete = $ExpenseCostPercentComplete;
      return $this;
    }

    /**
     * @return float
     */
    public function getExpenseCostVariance()
    {
      return $this->ExpenseCostVariance;
    }

    /**
     * @param float $ExpenseCostVariance
     * @return Activity
     */
    public function setExpenseCostVariance($ExpenseCostVariance)
    {
      $this->ExpenseCostVariance = $ExpenseCostVariance;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExternalEarlyStartDate()
    {
      if ($this->ExternalEarlyStartDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->ExternalEarlyStartDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $ExternalEarlyStartDate
     * @return Activity
     */
    public function setExternalEarlyStartDate(\DateTime $ExternalEarlyStartDate = null)
    {
      if ($ExternalEarlyStartDate == null) {
       $this->ExternalEarlyStartDate = null;
      } else {
        $this->ExternalEarlyStartDate = $ExternalEarlyStartDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExternalLateFinishDate()
    {
      if ($this->ExternalLateFinishDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->ExternalLateFinishDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $ExternalLateFinishDate
     * @return Activity
     */
    public function setExternalLateFinishDate(\DateTime $ExternalLateFinishDate = null)
    {
      if ($ExternalLateFinishDate == null) {
       $this->ExternalLateFinishDate = null;
      } else {
        $this->ExternalLateFinishDate = $ExternalLateFinishDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return string
     */
    public function getFeedback()
    {
      return $this->Feedback;
    }

    /**
     * @param string $Feedback
     * @return Activity
     */
    public function setFeedback($Feedback)
    {
      $this->Feedback = $Feedback;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFinishDate()
    {
      if ($this->FinishDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->FinishDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $FinishDate
     * @return Activity
     */
    public function setFinishDate(\DateTime $FinishDate = null)
    {
      if ($FinishDate == null) {
       $this->FinishDate = null;
      } else {
        $this->FinishDate = $FinishDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return float
     */
    public function getFinishDate1Variance()
    {
      return $this->FinishDate1Variance;
    }

    /**
     * @param float $FinishDate1Variance
     * @return Activity
     */
    public function setFinishDate1Variance($FinishDate1Variance)
    {
      $this->FinishDate1Variance = $FinishDate1Variance;
      return $this;
    }

    /**
     * @return float
     */
    public function getFinishDateVariance()
    {
      return $this->FinishDateVariance;
    }

    /**
     * @param float $FinishDateVariance
     * @return Activity
     */
    public function setFinishDateVariance($FinishDateVariance)
    {
      $this->FinishDateVariance = $FinishDateVariance;
      return $this;
    }

    /**
     * @return int
     */
    public function getFloatPath()
    {
      return $this->FloatPath;
    }

    /**
     * @param int $FloatPath
     * @return Activity
     */
    public function setFloatPath($FloatPath)
    {
      $this->FloatPath = $FloatPath;
      return $this;
    }

    /**
     * @return int
     */
    public function getFloatPathOrder()
    {
      return $this->FloatPathOrder;
    }

    /**
     * @param int $FloatPathOrder
     * @return Activity
     */
    public function setFloatPathOrder($FloatPathOrder)
    {
      $this->FloatPathOrder = $FloatPathOrder;
      return $this;
    }

    /**
     * @return float
     */
    public function getFreeFloat()
    {
      return $this->FreeFloat;
    }

    /**
     * @param float $FreeFloat
     * @return Activity
     */
    public function setFreeFloat($FreeFloat)
    {
      $this->FreeFloat = $FreeFloat;
      return $this;
    }

    /**
     * @return GUID
     */
    public function getGUID()
    {
      return $this->GUID;
    }

    /**
     * @param GUID $GUID
     * @return Activity
     */
    public function setGUID($GUID)
    {
      $this->GUID = $GUID;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getHasFutureBucketData()
    {
      return $this->HasFutureBucketData;
    }

    /**
     * @param boolean $HasFutureBucketData
     * @return Activity
     */
    public function setHasFutureBucketData($HasFutureBucketData)
    {
      $this->HasFutureBucketData = $HasFutureBucketData;
      return $this;
    }

    /**
     * @return Id
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param Id $Id
     * @return Activity
     */
    public function setId($Id)
    {
      $this->Id = $Id;
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
     * @return Activity
     */
    public function setIsBaseline($IsBaseline)
    {
      $this->IsBaseline = $IsBaseline;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getIsCritical()
    {
      return $this->IsCritical;
    }

    /**
     * @param boolean $IsCritical
     * @return Activity
     */
    public function setIsCritical($IsCritical)
    {
      $this->IsCritical = $IsCritical;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getIsLongestPath()
    {
      return $this->IsLongestPath;
    }

    /**
     * @param boolean $IsLongestPath
     * @return Activity
     */
    public function setIsLongestPath($IsLongestPath)
    {
      $this->IsLongestPath = $IsLongestPath;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getIsNewFeedback()
    {
      return $this->IsNewFeedback;
    }

    /**
     * @param boolean $IsNewFeedback
     * @return Activity
     */
    public function setIsNewFeedback($IsNewFeedback)
    {
      $this->IsNewFeedback = $IsNewFeedback;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getIsStarred()
    {
      return $this->IsStarred;
    }

    /**
     * @param boolean $IsStarred
     * @return Activity
     */
    public function setIsStarred($IsStarred)
    {
      $this->IsStarred = $IsStarred;
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
     * @return Activity
     */
    public function setIsTemplate($IsTemplate)
    {
      $this->IsTemplate = $IsTemplate;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getIsWorkPackage()
    {
      return $this->IsWorkPackage;
    }

    /**
     * @param boolean $IsWorkPackage
     * @return Activity
     */
    public function setIsWorkPackage($IsWorkPackage)
    {
      $this->IsWorkPackage = $IsWorkPackage;
      return $this;
    }

    /**
     * @return float
     */
    public function getLaborCost1Variance()
    {
      return $this->LaborCost1Variance;
    }

    /**
     * @param float $LaborCost1Variance
     * @return Activity
     */
    public function setLaborCost1Variance($LaborCost1Variance)
    {
      $this->LaborCost1Variance = $LaborCost1Variance;
      return $this;
    }

    /**
     * @return float
     */
    public function getLaborCostPercentComplete()
    {
      return $this->LaborCostPercentComplete;
    }

    /**
     * @param float $LaborCostPercentComplete
     * @return Activity
     */
    public function setLaborCostPercentComplete($LaborCostPercentComplete)
    {
      $this->LaborCostPercentComplete = $LaborCostPercentComplete;
      return $this;
    }

    /**
     * @return float
     */
    public function getLaborCostVariance()
    {
      return $this->LaborCostVariance;
    }

    /**
     * @param float $LaborCostVariance
     * @return Activity
     */
    public function setLaborCostVariance($LaborCostVariance)
    {
      $this->LaborCostVariance = $LaborCostVariance;
      return $this;
    }

    /**
     * @return float
     */
    public function getLaborUnits1Variance()
    {
      return $this->LaborUnits1Variance;
    }

    /**
     * @param float $LaborUnits1Variance
     * @return Activity
     */
    public function setLaborUnits1Variance($LaborUnits1Variance)
    {
      $this->LaborUnits1Variance = $LaborUnits1Variance;
      return $this;
    }

    /**
     * @return float
     */
    public function getLaborUnitsPercentComplete()
    {
      return $this->LaborUnitsPercentComplete;
    }

    /**
     * @param float $LaborUnitsPercentComplete
     * @return Activity
     */
    public function setLaborUnitsPercentComplete($LaborUnitsPercentComplete)
    {
      $this->LaborUnitsPercentComplete = $LaborUnitsPercentComplete;
      return $this;
    }

    /**
     * @return float
     */
    public function getLaborUnitsVariance()
    {
      return $this->LaborUnitsVariance;
    }

    /**
     * @param float $LaborUnitsVariance
     * @return Activity
     */
    public function setLaborUnitsVariance($LaborUnitsVariance)
    {
      $this->LaborUnitsVariance = $LaborUnitsVariance;
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
     * @return Activity
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
     * @return Activity
     */
    public function setLastUpdateUser($LastUpdateUser)
    {
      $this->LastUpdateUser = $LastUpdateUser;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLateFinishDate()
    {
      if ($this->LateFinishDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->LateFinishDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $LateFinishDate
     * @return Activity
     */
    public function setLateFinishDate(\DateTime $LateFinishDate = null)
    {
      if ($LateFinishDate == null) {
       $this->LateFinishDate = null;
      } else {
        $this->LateFinishDate = $LateFinishDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLateStartDate()
    {
      if ($this->LateStartDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->LateStartDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $LateStartDate
     * @return Activity
     */
    public function setLateStartDate(\DateTime $LateStartDate = null)
    {
      if ($LateStartDate == null) {
       $this->LateStartDate = null;
      } else {
        $this->LateStartDate = $LateStartDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return LevelingPriority
     */
    public function getLevelingPriority()
    {
      return $this->LevelingPriority;
    }

    /**
     * @param LevelingPriority $LevelingPriority
     * @return Activity
     */
    public function setLevelingPriority($LevelingPriority)
    {
      $this->LevelingPriority = $LevelingPriority;
      return $this;
    }

    /**
     * @return LocationName
     */
    public function getLocationName()
    {
      return $this->LocationName;
    }

    /**
     * @param LocationName $LocationName
     * @return Activity
     */
    public function setLocationName($LocationName)
    {
      $this->LocationName = $LocationName;
      return $this;
    }

    /**
     * @return int
     */
    public function getLocationObjectId()
    {
      return $this->LocationObjectId;
    }

    /**
     * @param int $LocationObjectId
     * @return Activity
     */
    public function setLocationObjectId($LocationObjectId)
    {
      $this->LocationObjectId = $LocationObjectId;
      return $this;
    }

    /**
     * @return float
     */
    public function getMaterialCost1Variance()
    {
      return $this->MaterialCost1Variance;
    }

    /**
     * @param float $MaterialCost1Variance
     * @return Activity
     */
    public function setMaterialCost1Variance($MaterialCost1Variance)
    {
      $this->MaterialCost1Variance = $MaterialCost1Variance;
      return $this;
    }

    /**
     * @return float
     */
    public function getMaterialCostPercentComplete()
    {
      return $this->MaterialCostPercentComplete;
    }

    /**
     * @param float $MaterialCostPercentComplete
     * @return Activity
     */
    public function setMaterialCostPercentComplete($MaterialCostPercentComplete)
    {
      $this->MaterialCostPercentComplete = $MaterialCostPercentComplete;
      return $this;
    }

    /**
     * @return float
     */
    public function getMaterialCostVariance()
    {
      return $this->MaterialCostVariance;
    }

    /**
     * @param float $MaterialCostVariance
     * @return Activity
     */
    public function setMaterialCostVariance($MaterialCostVariance)
    {
      $this->MaterialCostVariance = $MaterialCostVariance;
      return $this;
    }

    /**
     * @return MaximumDuration
     */
    public function getMaximumDuration()
    {
      return $this->MaximumDuration;
    }

    /**
     * @param MaximumDuration $MaximumDuration
     * @return Activity
     */
    public function setMaximumDuration($MaximumDuration)
    {
      $this->MaximumDuration = $MaximumDuration;
      return $this;
    }

    /**
     * @return MinimumDuration
     */
    public function getMinimumDuration()
    {
      return $this->MinimumDuration;
    }

    /**
     * @param MinimumDuration $MinimumDuration
     * @return Activity
     */
    public function setMinimumDuration($MinimumDuration)
    {
      $this->MinimumDuration = $MinimumDuration;
      return $this;
    }

    /**
     * @return MostLikelyDuration
     */
    public function getMostLikelyDuration()
    {
      return $this->MostLikelyDuration;
    }

    /**
     * @param MostLikelyDuration $MostLikelyDuration
     * @return Activity
     */
    public function setMostLikelyDuration($MostLikelyDuration)
    {
      $this->MostLikelyDuration = $MostLikelyDuration;
      return $this;
    }

    /**
     * @return Name
     */
    public function getName()
    {
      return $this->Name;
    }

    /**
     * @param Name $Name
     * @return Activity
     */
    public function setName($Name)
    {
      $this->Name = $Name;
      return $this;
    }

    /**
     * @return float
     */
    public function getNonLaborCost1Variance()
    {
      return $this->NonLaborCost1Variance;
    }

    /**
     * @param float $NonLaborCost1Variance
     * @return Activity
     */
    public function setNonLaborCost1Variance($NonLaborCost1Variance)
    {
      $this->NonLaborCost1Variance = $NonLaborCost1Variance;
      return $this;
    }

    /**
     * @return float
     */
    public function getNonLaborCostPercentComplete()
    {
      return $this->NonLaborCostPercentComplete;
    }

    /**
     * @param float $NonLaborCostPercentComplete
     * @return Activity
     */
    public function setNonLaborCostPercentComplete($NonLaborCostPercentComplete)
    {
      $this->NonLaborCostPercentComplete = $NonLaborCostPercentComplete;
      return $this;
    }

    /**
     * @return float
     */
    public function getNonLaborCostVariance()
    {
      return $this->NonLaborCostVariance;
    }

    /**
     * @param float $NonLaborCostVariance
     * @return Activity
     */
    public function setNonLaborCostVariance($NonLaborCostVariance)
    {
      $this->NonLaborCostVariance = $NonLaborCostVariance;
      return $this;
    }

    /**
     * @return float
     */
    public function getNonLaborUnits1Variance()
    {
      return $this->NonLaborUnits1Variance;
    }

    /**
     * @param float $NonLaborUnits1Variance
     * @return Activity
     */
    public function setNonLaborUnits1Variance($NonLaborUnits1Variance)
    {
      $this->NonLaborUnits1Variance = $NonLaborUnits1Variance;
      return $this;
    }

    /**
     * @return float
     */
    public function getNonLaborUnitsPercentComplete()
    {
      return $this->NonLaborUnitsPercentComplete;
    }

    /**
     * @param float $NonLaborUnitsPercentComplete
     * @return Activity
     */
    public function setNonLaborUnitsPercentComplete($NonLaborUnitsPercentComplete)
    {
      $this->NonLaborUnitsPercentComplete = $NonLaborUnitsPercentComplete;
      return $this;
    }

    /**
     * @return float
     */
    public function getNonLaborUnitsVariance()
    {
      return $this->NonLaborUnitsVariance;
    }

    /**
     * @param float $NonLaborUnitsVariance
     * @return Activity
     */
    public function setNonLaborUnitsVariance($NonLaborUnitsVariance)
    {
      $this->NonLaborUnitsVariance = $NonLaborUnitsVariance;
      return $this;
    }

    /**
     * @return string
     */
    public function getNotesToResources()
    {
      return $this->NotesToResources;
    }

    /**
     * @param string $NotesToResources
     * @return Activity
     */
    public function setNotesToResources($NotesToResources)
    {
      $this->NotesToResources = $NotesToResources;
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
     * @return Activity
     */
    public function setObjectId($ObjectId)
    {
      $this->ObjectId = $ObjectId;
      return $this;
    }

    /**
     * @return float
     */
    public function getPercentComplete()
    {
      return $this->PercentComplete;
    }

    /**
     * @param float $PercentComplete
     * @return Activity
     */
    public function setPercentComplete($PercentComplete)
    {
      $this->PercentComplete = $PercentComplete;
      return $this;
    }

    /**
     * @return PercentCompleteType
     */
    public function getPercentCompleteType()
    {
      return $this->PercentCompleteType;
    }

    /**
     * @param PercentCompleteType $PercentCompleteType
     * @return Activity
     */
    public function setPercentCompleteType($PercentCompleteType)
    {
      $this->PercentCompleteType = $PercentCompleteType;
      return $this;
    }

    /**
     * @return float
     */
    public function getPerformancePercentComplete()
    {
      return $this->PerformancePercentComplete;
    }

    /**
     * @param float $PerformancePercentComplete
     * @return Activity
     */
    public function setPerformancePercentComplete($PerformancePercentComplete)
    {
      $this->PerformancePercentComplete = $PerformancePercentComplete;
      return $this;
    }

    /**
     * @return float
     */
    public function getPhysicalPercentComplete()
    {
      return $this->PhysicalPercentComplete;
    }

    /**
     * @param float $PhysicalPercentComplete
     * @return Activity
     */
    public function setPhysicalPercentComplete($PhysicalPercentComplete)
    {
      $this->PhysicalPercentComplete = $PhysicalPercentComplete;
      return $this;
    }

    /**
     * @return PlannedDuration
     */
    public function getPlannedDuration()
    {
      return $this->PlannedDuration;
    }

    /**
     * @param PlannedDuration $PlannedDuration
     * @return Activity
     */
    public function setPlannedDuration($PlannedDuration)
    {
      $this->PlannedDuration = $PlannedDuration;
      return $this;
    }

    /**
     * @return float
     */
    public function getPlannedExpenseCost()
    {
      return $this->PlannedExpenseCost;
    }

    /**
     * @param float $PlannedExpenseCost
     * @return Activity
     */
    public function setPlannedExpenseCost($PlannedExpenseCost)
    {
      $this->PlannedExpenseCost = $PlannedExpenseCost;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPlannedFinishDate()
    {
      if ($this->PlannedFinishDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->PlannedFinishDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $PlannedFinishDate
     * @return Activity
     */
    public function setPlannedFinishDate(\DateTime $PlannedFinishDate = null)
    {
      if ($PlannedFinishDate == null) {
       $this->PlannedFinishDate = null;
      } else {
        $this->PlannedFinishDate = $PlannedFinishDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return float
     */
    public function getPlannedLaborCost()
    {
      return $this->PlannedLaborCost;
    }

    /**
     * @param float $PlannedLaborCost
     * @return Activity
     */
    public function setPlannedLaborCost($PlannedLaborCost)
    {
      $this->PlannedLaborCost = $PlannedLaborCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getPlannedLaborUnits()
    {
      return $this->PlannedLaborUnits;
    }

    /**
     * @param float $PlannedLaborUnits
     * @return Activity
     */
    public function setPlannedLaborUnits($PlannedLaborUnits)
    {
      $this->PlannedLaborUnits = $PlannedLaborUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getPlannedMaterialCost()
    {
      return $this->PlannedMaterialCost;
    }

    /**
     * @param float $PlannedMaterialCost
     * @return Activity
     */
    public function setPlannedMaterialCost($PlannedMaterialCost)
    {
      $this->PlannedMaterialCost = $PlannedMaterialCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getPlannedNonLaborCost()
    {
      return $this->PlannedNonLaborCost;
    }

    /**
     * @param float $PlannedNonLaborCost
     * @return Activity
     */
    public function setPlannedNonLaborCost($PlannedNonLaborCost)
    {
      $this->PlannedNonLaborCost = $PlannedNonLaborCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getPlannedNonLaborUnits()
    {
      return $this->PlannedNonLaborUnits;
    }

    /**
     * @param float $PlannedNonLaborUnits
     * @return Activity
     */
    public function setPlannedNonLaborUnits($PlannedNonLaborUnits)
    {
      $this->PlannedNonLaborUnits = $PlannedNonLaborUnits;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPlannedStartDate()
    {
      if ($this->PlannedStartDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->PlannedStartDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $PlannedStartDate
     * @return Activity
     */
    public function setPlannedStartDate(\DateTime $PlannedStartDate = null)
    {
      if ($PlannedStartDate == null) {
       $this->PlannedStartDate = null;
      } else {
        $this->PlannedStartDate = $PlannedStartDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return float
     */
    public function getPlannedTotalCost()
    {
      return $this->PlannedTotalCost;
    }

    /**
     * @param float $PlannedTotalCost
     * @return Activity
     */
    public function setPlannedTotalCost($PlannedTotalCost)
    {
      $this->PlannedTotalCost = $PlannedTotalCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getPlannedTotalUnits()
    {
      return $this->PlannedTotalUnits;
    }

    /**
     * @param float $PlannedTotalUnits
     * @return Activity
     */
    public function setPlannedTotalUnits($PlannedTotalUnits)
    {
      $this->PlannedTotalUnits = $PlannedTotalUnits;
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
     * @return Activity
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
     * @return Activity
     */
    public function setPlannedValueLaborUnits($PlannedValueLaborUnits)
    {
      $this->PlannedValueLaborUnits = $PlannedValueLaborUnits;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPostResponsePessimisticFinish()
    {
      if ($this->PostResponsePessimisticFinish == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->PostResponsePessimisticFinish);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $PostResponsePessimisticFinish
     * @return Activity
     */
    public function setPostResponsePessimisticFinish(\DateTime $PostResponsePessimisticFinish = null)
    {
      if ($PostResponsePessimisticFinish == null) {
       $this->PostResponsePessimisticFinish = null;
      } else {
        $this->PostResponsePessimisticFinish = $PostResponsePessimisticFinish->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPostResponsePessimisticStart()
    {
      if ($this->PostResponsePessimisticStart == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->PostResponsePessimisticStart);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $PostResponsePessimisticStart
     * @return Activity
     */
    public function setPostResponsePessimisticStart(\DateTime $PostResponsePessimisticStart = null)
    {
      if ($PostResponsePessimisticStart == null) {
       $this->PostResponsePessimisticStart = null;
      } else {
        $this->PostResponsePessimisticStart = $PostResponsePessimisticStart->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPreResponsePessimisticFinish()
    {
      if ($this->PreResponsePessimisticFinish == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->PreResponsePessimisticFinish);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $PreResponsePessimisticFinish
     * @return Activity
     */
    public function setPreResponsePessimisticFinish(\DateTime $PreResponsePessimisticFinish = null)
    {
      if ($PreResponsePessimisticFinish == null) {
       $this->PreResponsePessimisticFinish = null;
      } else {
        $this->PreResponsePessimisticFinish = $PreResponsePessimisticFinish->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPreResponsePessimisticStart()
    {
      if ($this->PreResponsePessimisticStart == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->PreResponsePessimisticStart);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $PreResponsePessimisticStart
     * @return Activity
     */
    public function setPreResponsePessimisticStart(\DateTime $PreResponsePessimisticStart = null)
    {
      if ($PreResponsePessimisticStart == null) {
       $this->PreResponsePessimisticStart = null;
      } else {
        $this->PreResponsePessimisticStart = $PreResponsePessimisticStart->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPrimaryConstraintDate()
    {
      if ($this->PrimaryConstraintDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->PrimaryConstraintDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $PrimaryConstraintDate
     * @return Activity
     */
    public function setPrimaryConstraintDate(\DateTime $PrimaryConstraintDate = null)
    {
      if ($PrimaryConstraintDate == null) {
       $this->PrimaryConstraintDate = null;
      } else {
        $this->PrimaryConstraintDate = $PrimaryConstraintDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return PrimaryConstraintType
     */
    public function getPrimaryConstraintType()
    {
      return $this->PrimaryConstraintType;
    }

    /**
     * @param PrimaryConstraintType $PrimaryConstraintType
     * @return Activity
     */
    public function setPrimaryConstraintType($PrimaryConstraintType)
    {
      $this->PrimaryConstraintType = $PrimaryConstraintType;
      return $this;
    }

    /**
     * @return PrimaryResourceId
     */
    public function getPrimaryResourceId()
    {
      return $this->PrimaryResourceId;
    }

    /**
     * @param PrimaryResourceId $PrimaryResourceId
     * @return Activity
     */
    public function setPrimaryResourceId($PrimaryResourceId)
    {
      $this->PrimaryResourceId = $PrimaryResourceId;
      return $this;
    }

    /**
     * @return PrimaryResourceName
     */
    public function getPrimaryResourceName()
    {
      return $this->PrimaryResourceName;
    }

    /**
     * @param PrimaryResourceName $PrimaryResourceName
     * @return Activity
     */
    public function setPrimaryResourceName($PrimaryResourceName)
    {
      $this->PrimaryResourceName = $PrimaryResourceName;
      return $this;
    }

    /**
     * @return int
     */
    public function getPrimaryResourceObjectId()
    {
      return $this->PrimaryResourceObjectId;
    }

    /**
     * @param int $PrimaryResourceObjectId
     * @return Activity
     */
    public function setPrimaryResourceObjectId($PrimaryResourceObjectId)
    {
      $this->PrimaryResourceObjectId = $PrimaryResourceObjectId;
      return $this;
    }

    /**
     * @return string
     */
    public function getProjectId()
    {
      return $this->ProjectId;
    }

    /**
     * @param string $ProjectId
     * @return Activity
     */
    public function setProjectId($ProjectId)
    {
      $this->ProjectId = $ProjectId;
      return $this;
    }

    /**
     * @return string
     */
    public function getProjectName()
    {
      return $this->ProjectName;
    }

    /**
     * @param string $ProjectName
     * @return Activity
     */
    public function setProjectName($ProjectName)
    {
      $this->ProjectName = $ProjectName;
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
     * @return Activity
     */
    public function setProjectObjectId($ProjectObjectId)
    {
      $this->ProjectObjectId = $ProjectObjectId;
      return $this;
    }

    /**
     * @return RemainingDuration
     */
    public function getRemainingDuration()
    {
      return $this->RemainingDuration;
    }

    /**
     * @param RemainingDuration $RemainingDuration
     * @return Activity
     */
    public function setRemainingDuration($RemainingDuration)
    {
      $this->RemainingDuration = $RemainingDuration;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRemainingEarlyFinishDate()
    {
      if ($this->RemainingEarlyFinishDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->RemainingEarlyFinishDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $RemainingEarlyFinishDate
     * @return Activity
     */
    public function setRemainingEarlyFinishDate(\DateTime $RemainingEarlyFinishDate = null)
    {
      if ($RemainingEarlyFinishDate == null) {
       $this->RemainingEarlyFinishDate = null;
      } else {
        $this->RemainingEarlyFinishDate = $RemainingEarlyFinishDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRemainingEarlyStartDate()
    {
      if ($this->RemainingEarlyStartDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->RemainingEarlyStartDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $RemainingEarlyStartDate
     * @return Activity
     */
    public function setRemainingEarlyStartDate(\DateTime $RemainingEarlyStartDate = null)
    {
      if ($RemainingEarlyStartDate == null) {
       $this->RemainingEarlyStartDate = null;
      } else {
        $this->RemainingEarlyStartDate = $RemainingEarlyStartDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return float
     */
    public function getRemainingExpenseCost()
    {
      return $this->RemainingExpenseCost;
    }

    /**
     * @param float $RemainingExpenseCost
     * @return Activity
     */
    public function setRemainingExpenseCost($RemainingExpenseCost)
    {
      $this->RemainingExpenseCost = $RemainingExpenseCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getRemainingFloat()
    {
      return $this->RemainingFloat;
    }

    /**
     * @param float $RemainingFloat
     * @return Activity
     */
    public function setRemainingFloat($RemainingFloat)
    {
      $this->RemainingFloat = $RemainingFloat;
      return $this;
    }

    /**
     * @return float
     */
    public function getRemainingLaborCost()
    {
      return $this->RemainingLaborCost;
    }

    /**
     * @param float $RemainingLaborCost
     * @return Activity
     */
    public function setRemainingLaborCost($RemainingLaborCost)
    {
      $this->RemainingLaborCost = $RemainingLaborCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getRemainingLaborUnits()
    {
      return $this->RemainingLaborUnits;
    }

    /**
     * @param float $RemainingLaborUnits
     * @return Activity
     */
    public function setRemainingLaborUnits($RemainingLaborUnits)
    {
      $this->RemainingLaborUnits = $RemainingLaborUnits;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRemainingLateFinishDate()
    {
      if ($this->RemainingLateFinishDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->RemainingLateFinishDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $RemainingLateFinishDate
     * @return Activity
     */
    public function setRemainingLateFinishDate(\DateTime $RemainingLateFinishDate = null)
    {
      if ($RemainingLateFinishDate == null) {
       $this->RemainingLateFinishDate = null;
      } else {
        $this->RemainingLateFinishDate = $RemainingLateFinishDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRemainingLateStartDate()
    {
      if ($this->RemainingLateStartDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->RemainingLateStartDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $RemainingLateStartDate
     * @return Activity
     */
    public function setRemainingLateStartDate(\DateTime $RemainingLateStartDate = null)
    {
      if ($RemainingLateStartDate == null) {
       $this->RemainingLateStartDate = null;
      } else {
        $this->RemainingLateStartDate = $RemainingLateStartDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return float
     */
    public function getRemainingMaterialCost()
    {
      return $this->RemainingMaterialCost;
    }

    /**
     * @param float $RemainingMaterialCost
     * @return Activity
     */
    public function setRemainingMaterialCost($RemainingMaterialCost)
    {
      $this->RemainingMaterialCost = $RemainingMaterialCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getRemainingNonLaborCost()
    {
      return $this->RemainingNonLaborCost;
    }

    /**
     * @param float $RemainingNonLaborCost
     * @return Activity
     */
    public function setRemainingNonLaborCost($RemainingNonLaborCost)
    {
      $this->RemainingNonLaborCost = $RemainingNonLaborCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getRemainingNonLaborUnits()
    {
      return $this->RemainingNonLaborUnits;
    }

    /**
     * @param float $RemainingNonLaborUnits
     * @return Activity
     */
    public function setRemainingNonLaborUnits($RemainingNonLaborUnits)
    {
      $this->RemainingNonLaborUnits = $RemainingNonLaborUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getRemainingTotalCost()
    {
      return $this->RemainingTotalCost;
    }

    /**
     * @param float $RemainingTotalCost
     * @return Activity
     */
    public function setRemainingTotalCost($RemainingTotalCost)
    {
      $this->RemainingTotalCost = $RemainingTotalCost;
      return $this;
    }

    /**
     * @return float
     */
    public function getRemainingTotalUnits()
    {
      return $this->RemainingTotalUnits;
    }

    /**
     * @param float $RemainingTotalUnits
     * @return Activity
     */
    public function setRemainingTotalUnits($RemainingTotalUnits)
    {
      $this->RemainingTotalUnits = $RemainingTotalUnits;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getResumeDate()
    {
      if ($this->ResumeDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->ResumeDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $ResumeDate
     * @return Activity
     */
    public function setResumeDate(\DateTime $ResumeDate = null)
    {
      if ($ResumeDate == null) {
       $this->ResumeDate = null;
      } else {
        $this->ResumeDate = $ResumeDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getReviewFinishDate()
    {
      if ($this->ReviewFinishDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->ReviewFinishDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $ReviewFinishDate
     * @return Activity
     */
    public function setReviewFinishDate(\DateTime $ReviewFinishDate = null)
    {
      if ($ReviewFinishDate == null) {
       $this->ReviewFinishDate = null;
      } else {
        $this->ReviewFinishDate = $ReviewFinishDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return boolean
     */
    public function getReviewRequired()
    {
      return $this->ReviewRequired;
    }

    /**
     * @param boolean $ReviewRequired
     * @return Activity
     */
    public function setReviewRequired($ReviewRequired)
    {
      $this->ReviewRequired = $ReviewRequired;
      return $this;
    }

    /**
     * @return ReviewStatus
     */
    public function getReviewStatus()
    {
      return $this->ReviewStatus;
    }

    /**
     * @param ReviewStatus $ReviewStatus
     * @return Activity
     */
    public function setReviewStatus($ReviewStatus)
    {
      $this->ReviewStatus = $ReviewStatus;
      return $this;
    }

    /**
     * @return float
     */
    public function getSchedulePercentComplete()
    {
      return $this->SchedulePercentComplete;
    }

    /**
     * @param float $SchedulePercentComplete
     * @return Activity
     */
    public function setSchedulePercentComplete($SchedulePercentComplete)
    {
      $this->SchedulePercentComplete = $SchedulePercentComplete;
      return $this;
    }

    /**
     * @return float
     */
    public function getSchedulePerformanceIndex()
    {
      return $this->SchedulePerformanceIndex;
    }

    /**
     * @param float $SchedulePerformanceIndex
     * @return Activity
     */
    public function setSchedulePerformanceIndex($SchedulePerformanceIndex)
    {
      $this->SchedulePerformanceIndex = $SchedulePerformanceIndex;
      return $this;
    }

    /**
     * @return float
     */
    public function getSchedulePerformanceIndexLaborUnits()
    {
      return $this->SchedulePerformanceIndexLaborUnits;
    }

    /**
     * @param float $SchedulePerformanceIndexLaborUnits
     * @return Activity
     */
    public function setSchedulePerformanceIndexLaborUnits($SchedulePerformanceIndexLaborUnits)
    {
      $this->SchedulePerformanceIndexLaborUnits = $SchedulePerformanceIndexLaborUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getScheduleVariance()
    {
      return $this->ScheduleVariance;
    }

    /**
     * @param float $ScheduleVariance
     * @return Activity
     */
    public function setScheduleVariance($ScheduleVariance)
    {
      $this->ScheduleVariance = $ScheduleVariance;
      return $this;
    }

    /**
     * @return float
     */
    public function getScheduleVarianceIndex()
    {
      return $this->ScheduleVarianceIndex;
    }

    /**
     * @param float $ScheduleVarianceIndex
     * @return Activity
     */
    public function setScheduleVarianceIndex($ScheduleVarianceIndex)
    {
      $this->ScheduleVarianceIndex = $ScheduleVarianceIndex;
      return $this;
    }

    /**
     * @return float
     */
    public function getScheduleVarianceIndexLaborUnits()
    {
      return $this->ScheduleVarianceIndexLaborUnits;
    }

    /**
     * @param float $ScheduleVarianceIndexLaborUnits
     * @return Activity
     */
    public function setScheduleVarianceIndexLaborUnits($ScheduleVarianceIndexLaborUnits)
    {
      $this->ScheduleVarianceIndexLaborUnits = $ScheduleVarianceIndexLaborUnits;
      return $this;
    }

    /**
     * @return float
     */
    public function getScheduleVarianceLaborUnits()
    {
      return $this->ScheduleVarianceLaborUnits;
    }

    /**
     * @param float $ScheduleVarianceLaborUnits
     * @return Activity
     */
    public function setScheduleVarianceLaborUnits($ScheduleVarianceLaborUnits)
    {
      $this->ScheduleVarianceLaborUnits = $ScheduleVarianceLaborUnits;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getSecondaryConstraintDate()
    {
      if ($this->SecondaryConstraintDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->SecondaryConstraintDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $SecondaryConstraintDate
     * @return Activity
     */
    public function setSecondaryConstraintDate(\DateTime $SecondaryConstraintDate = null)
    {
      if ($SecondaryConstraintDate == null) {
       $this->SecondaryConstraintDate = null;
      } else {
        $this->SecondaryConstraintDate = $SecondaryConstraintDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return SecondaryConstraintType
     */
    public function getSecondaryConstraintType()
    {
      return $this->SecondaryConstraintType;
    }

    /**
     * @param SecondaryConstraintType $SecondaryConstraintType
     * @return Activity
     */
    public function setSecondaryConstraintType($SecondaryConstraintType)
    {
      $this->SecondaryConstraintType = $SecondaryConstraintType;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
      if ($this->StartDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->StartDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $StartDate
     * @return Activity
     */
    public function setStartDate(\DateTime $StartDate = null)
    {
      if ($StartDate == null) {
       $this->StartDate = null;
      } else {
        $this->StartDate = $StartDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return float
     */
    public function getStartDate1Variance()
    {
      return $this->StartDate1Variance;
    }

    /**
     * @param float $StartDate1Variance
     * @return Activity
     */
    public function setStartDate1Variance($StartDate1Variance)
    {
      $this->StartDate1Variance = $StartDate1Variance;
      return $this;
    }

    /**
     * @return float
     */
    public function getStartDateVariance()
    {
      return $this->StartDateVariance;
    }

    /**
     * @param float $StartDateVariance
     * @return Activity
     */
    public function setStartDateVariance($StartDateVariance)
    {
      $this->StartDateVariance = $StartDateVariance;
      return $this;
    }

    /**
     * @return Status
     */
    public function getStatus()
    {
      return $this->Status;
    }

    /**
     * @param Status $Status
     * @return Activity
     */
    public function setStatus($Status)
    {
      $this->Status = $Status;
      return $this;
    }

    /**
     * @return \DateTime
     */
    public function getSuspendDate()
    {
      if ($this->SuspendDate == null) {
        return null;
      } else {
        try {
          return new \DateTime($this->SuspendDate);
        } catch (\Exception $e) {
          return false;
        }
      }
    }

    /**
     * @param \DateTime $SuspendDate
     * @return Activity
     */
    public function setSuspendDate(\DateTime $SuspendDate = null)
    {
      if ($SuspendDate == null) {
       $this->SuspendDate = null;
      } else {
        $this->SuspendDate = $SuspendDate->format(\DateTime::ATOM);
      }
      return $this;
    }

    /**
     * @return float
     */
    public function getToCompletePerformanceIndex()
    {
      return $this->ToCompletePerformanceIndex;
    }

    /**
     * @param float $ToCompletePerformanceIndex
     * @return Activity
     */
    public function setToCompletePerformanceIndex($ToCompletePerformanceIndex)
    {
      $this->ToCompletePerformanceIndex = $ToCompletePerformanceIndex;
      return $this;
    }

    /**
     * @return float
     */
    public function getTotalCost1Variance()
    {
      return $this->TotalCost1Variance;
    }

    /**
     * @param float $TotalCost1Variance
     * @return Activity
     */
    public function setTotalCost1Variance($TotalCost1Variance)
    {
      $this->TotalCost1Variance = $TotalCost1Variance;
      return $this;
    }

    /**
     * @return float
     */
    public function getTotalCostVariance()
    {
      return $this->TotalCostVariance;
    }

    /**
     * @param float $TotalCostVariance
     * @return Activity
     */
    public function setTotalCostVariance($TotalCostVariance)
    {
      $this->TotalCostVariance = $TotalCostVariance;
      return $this;
    }

    /**
     * @return float
     */
    public function getTotalFloat()
    {
      return $this->TotalFloat;
    }

    /**
     * @param float $TotalFloat
     * @return Activity
     */
    public function setTotalFloat($TotalFloat)
    {
      $this->TotalFloat = $TotalFloat;
      return $this;
    }

    /**
     * @return Type
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param Type $Type
     * @return Activity
     */
    public function setType($Type)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return float
     */
    public function getUnitsPercentComplete()
    {
      return $this->UnitsPercentComplete;
    }

    /**
     * @param float $UnitsPercentComplete
     * @return Activity
     */
    public function setUnitsPercentComplete($UnitsPercentComplete)
    {
      $this->UnitsPercentComplete = $UnitsPercentComplete;
      return $this;
    }

    /**
     * @return int
     */
    public function getUnreadCommentCount()
    {
      return $this->UnreadCommentCount;
    }

    /**
     * @param int $UnreadCommentCount
     * @return Activity
     */
    public function setUnreadCommentCount($UnreadCommentCount)
    {
      $this->UnreadCommentCount = $UnreadCommentCount;
      return $this;
    }

    /**
     * @return WBSCode
     */
    public function getWBSCode()
    {
      return $this->WBSCode;
    }

    /**
     * @param WBSCode $WBSCode
     * @return Activity
     */
    public function setWBSCode($WBSCode)
    {
      $this->WBSCode = $WBSCode;
      return $this;
    }

    /**
     * @return WBSName
     */
    public function getWBSName()
    {
      return $this->WBSName;
    }

    /**
     * @param WBSName $WBSName
     * @return Activity
     */
    public function setWBSName($WBSName)
    {
      $this->WBSName = $WBSName;
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
     * @return Activity
     */
    public function setWBSObjectId($WBSObjectId)
    {
      $this->WBSObjectId = $WBSObjectId;
      return $this;
    }

    /**
     * @return string
     */
    public function getWBSPath()
    {
      return $this->WBSPath;
    }

    /**
     * @param string $WBSPath
     * @return Activity
     */
    public function setWBSPath($WBSPath)
    {
      $this->WBSPath = $WBSPath;
      return $this;
    }

}
