<?php
/**
 * Created by PhpStorm.
 * User: KarpSA
 * Date: 04.05.2017
 * Time: 16:47
 */
$wsconfig['ssl']=false;
$wsconfig['protocol']=($wsconfig['ssl'])?'https':'http';
$wsconfig['host']='eppm.tks.local';
$wsconfig['port']='8206';

$wsconfig['srvs']=array();
$wsconfig['srvs'][0]['name']='ActivityCodeAssignment';
$wsconfig['srvs'][0]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ActivityCodeAssignmentService?wsdl';

$wsconfig['srvs'][1]['name']='ActivityCode';
$wsconfig['srvs'][1]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ActivityCodeService?wsdl';

$wsconfig['srvs'][2]['name']='ActivityCodeType';
$wsconfig['srvs'][2]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ActivityCodeTypeService?wsdl';

$wsconfig['srvs'][3]['name']='ActivityComment';
$wsconfig['srvs'][3]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ActivityCommentService?wsdl';

$wsconfig['srvs'][4]['name']='ActivityExpense';
$wsconfig['srvs'][4]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ActivityExpenseService?wsdl';

$wsconfig['srvs'][5]['name']='ActivityNote';
$wsconfig['srvs'][5]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ActivityNoteService?wsdl';

$wsconfig['srvs'][6]['name']='ActivityOwner';
$wsconfig['srvs'][6]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ActivityOwnerService?wsdl';

$wsconfig['srvs'][7]['name']='ActivityPeriodActual';
$wsconfig['srvs'][7]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ActivityPeriodActualService?wsdl';

$wsconfig['srvs'][8]['name']='Activity';
$wsconfig['srvs'][8]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ActivityService?wsdl';

$wsconfig['srvs'][9]['name']='ActivityRisk';
$wsconfig['srvs'][9]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ActivityRiskService?wsdl';

$wsconfig['srvs'][10]['name']='ActivityStep';
$wsconfig['srvs'][10]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ActivityStepService?wsdl';

$wsconfig['srvs'][11]['name']='ActivityStepTemplateItem';
$wsconfig['srvs'][11]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ActivityStepTemplateItemService?wsdl';

$wsconfig['srvs'][12]['name']='ActivityStepTemplate';
$wsconfig['srvs'][12]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ActivityStepTemplateService?wsdl';

$wsconfig['srvs'][13]['name']='Authentication';
$wsconfig['srvs'][13]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/AuthenticationService?wsdl';

$wsconfig['srvs'][14]['name']='BaselineProject';
$wsconfig['srvs'][14]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/BaselineProjectService?wsdl';

$wsconfig['srvs'][15]['name']='BaselineType';
$wsconfig['srvs'][15]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/BaselineTypeService?wsdl';

$wsconfig['srvs'][16]['name']='CBSDurationSummary';
$wsconfig['srvs'][16]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/CBSDurationSummaryService?wsdl';

$wsconfig['srvs'][17]['name']='CBS';
$wsconfig['srvs'][17]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/CBSService?wsdl';

$wsconfig['srvs'][18]['name']='Calendar';
$wsconfig['srvs'][18]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/CalendarService?wsdl';

$wsconfig['srvs'][19]['name']='CostAccount';
$wsconfig['srvs'][19]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/CostAccountService?wsdl';

$wsconfig['srvs'][20]['name']='Currency';
$wsconfig['srvs'][20]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/CurrencyService?wsdl';

$wsconfig['srvs'][21]['name']='DocumentCategory';
$wsconfig['srvs'][21]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/DocumentCategoryService?wsdl';

$wsconfig['srvs'][22]['name']='Document';
$wsconfig['srvs'][22]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/DocumentService?wsdl';

$wsconfig['srvs'][23]['name']='DocumentStatusCode';
$wsconfig['srvs'][23]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/DocumentStatusCodeService?wsdl';

$wsconfig['srvs'][24]['name']='EPSBudgetChangeLog';
$wsconfig['srvs'][24]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/EPSBudgetChangeLogService?wsdl';

$wsconfig['srvs'][25]['name']='EPSFunding';
$wsconfig['srvs'][25]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/EPSFundingService?wsdl';

$wsconfig['srvs'][26]['name']='EPSNote';
$wsconfig['srvs'][26]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/EPSNoteService?wsdl';

$wsconfig['srvs'][27]['name']='EPS';
$wsconfig['srvs'][27]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/EPSService?wsdl';

$wsconfig['srvs'][28]['name']='EPSSpendingPlan';
$wsconfig['srvs'][28]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/EPSSpendingPlanService?wsdl';

$wsconfig['srvs'][29]['name']='ExpenseCategory';
$wsconfig['srvs'][29]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ExpenseCategoryService?wsdl';

$wsconfig['srvs'][30]['name']='Export';
$wsconfig['srvs'][30]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ExportService?wsdl';

$wsconfig['srvs'][31]['name']='FinancialPeriod';
$wsconfig['srvs'][31]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/FinancialPeriodService?wsdl';

$wsconfig['srvs'][32]['name']='FundingSource';
$wsconfig['srvs'][32]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/FundingSourceService?wsdl';

$wsconfig['srvs'][33]['name']='GlobalPreferences';
$wsconfig['srvs'][33]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/GlobalPreferencesService?wsdl';

$wsconfig['srvs'][34]['name']='GlobalProfile';
$wsconfig['srvs'][34]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/GlobalProfileService?wsdl';

$wsconfig['srvs'][35]['name']='GlobalReplace';
$wsconfig['srvs'][35]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/GlobalReplaceService?wsdl';

$wsconfig['srvs'][36]['name']='Import';
$wsconfig['srvs'][36]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ImportService?wsdl';

$wsconfig['srvs'][37]['name']='IssueHistory';
$wsconfig['srvs'][37]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/IssueHistoryService?wsdl';

$wsconfig['srvs'][38]['name']='Job';
$wsconfig['srvs'][38]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/V1/JobService?wsdl';

$wsconfig['srvs'][39]['name']='JobService';
$wsconfig['srvs'][39]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/JobServiceService?wsdl';

$wsconfig['srvs'][40]['name']='Resource';
$wsconfig['srvs'][40]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ResourceService?wsdl';

$wsconfig['srvs'][41]['name']='ResourceAssignment';
$wsconfig['srvs'][41]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ResourceAssignmentService?wsdl';

$wsconfig['srvs'][42]['name']='Project';
$wsconfig['srvs'][42]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/ProjectService?wsdl';

$wsconfig['srvs'][43]['name']='Spread';
$wsconfig['srvs'][43]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/SpreadService?wsdl';

$wsconfig['srvs'][44]['name']='WBS';//http://eppm.tks.local:8206/p6ws/services/WBSService?wsdl
$wsconfig['srvs'][44]['url']=$wsconfig['protocol'].'://'.$wsconfig['host'].':'.$wsconfig['port'].'/p6ws/services/WBSService?wsdl';