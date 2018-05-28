<?php
/**
 * Created by PhpStorm.
 * User: KarpSA
 * Date: 09.05.2017
 * Time: 8:00
 */
require_once (__DIR__.'/service/services/Authentication/autoload.php');

class Ppmi{

    private $isAuth=false;
    private $currInstId=1;
    private $currIncEnc='UTF-8';
    private $dbType=false; //FALSE - Oracle, TRUE - MSSQL
    private $aCookie='';
    private $authSrv=null;

    protected $serviceClasses=array();
    protected $Classes=array();
    /**
     * Ppmi constructor.
     * @param array $ppmDbInst
     * @param null $username
     * @param null $password
     */
    function __construct($cfg)
    {
        /** @var TYPE_NAME $this */
        $GLOBALS['ppmcfg']=$cfg;
        if(isset($cfg['DB_TYPE'])) $this->dbType=$cfg['DB_TYPE'];
        $this->authSrv=new AuthenticationService();
    }

    public function IsAuth(){
        return $this->isAuth;
    }
    /**
     * @param $user
     * @param $pass
     * @return bool
     */
    public function auth($user,$pass,$instId=null,$enc=null){

        try{
            $this->currInstId = ($instId!=null)?$instId:$this->currInstId;
            $this->currIncEnc = ($enc!=null)?$enc:$this->currIncEnc;
            $res=$this->authSrv->Login(new Login($user,$pass,$this->currInstId));
            if($res->getReturn()){
                $this->aCookie=$this->authSrv->_cookies['JSESSIONID'][0];
                $this->isAuth=true;
                return true;
            }else{
                return false;
            }
        }catch(Exception $e){
            //echo $e->getMessage();
            return false;
        }
    }

    public function cAuth($aCookie){
        $this->aCookie=$aCookie;
        $this->authSrv->__setCookie('JSESSIONID',$this->aCookie);
        $status = $this->getSessionInfo();
        //print_r($status);
        if($status!=null && $status->getIsValid()==1){
            $this->isAuth=true;
            return true;
        }else{
            return false;
        }
    }

    public function GetToken(){
        return $this->aCookie;
    }

    public function Logout(){
        $res=$this->authSrv->Logout(null);
        return $res->getReturn();
    }

    private function getSessionInfo()
    {
        try {
            return $this->authSrv->ReadSessionProperties(null);
        }catch (Exception $e){
            return null;
        }
    }
    /**
     * @return array Database instances
     */
    public static function GetDbInst($cfg){

        $GLOBALS['ppmcfg']=$cfg;
        $out=array();
        $auth=new AuthenticationService();
        $dbi=new DatabaseInstance(null,null,null,null,null);
        $obj=$auth->ReadDatabaseInstances($dbi);
        $res=$obj->getDatabaseInstance();
        if(count($res)>0){
            foreach ($res as $r){
                $out[]=array('id'=>$r->getDatabaseInstanceId(),'dbname'=>$r->getDatabaseName(),'enc'=>$r->getDatabaseEncoding());
            }
        }
        return $out;
    }

    function __call($name, $arguments)
    {
        //
        if(!$this->isAuth){
            die("Error, status 403 Forbidden");
        }
        if(isset($this->serviceClasses[$name])){
            return $this->serviceClasses[$name];
        }else{
            if (is_dir(__DIR__ . '/service/services/' . $name) && file_exists(__DIR__ . '/service/services/' . $name . '/' . $name . 'Service.php')) {
                require_once (__DIR__ . '/service/services/' . $name . '/autoload.php');
                $clName=$name.'Service';
                $class = new $clName();
                $class->__setCookie('JSESSIONID',$this->aCookie);
                $this->serviceClasses[$name] = $class;
                return $class;
            }else{
                return null;
            }
        }
    }

    function __get($name)
    {
        return $this->Classes[$name];
    }

    function __set($name, $value)
    {
        $this->Classes[$name]=$value;
    }

    public static function O2A($obj,$fields=null){
        $out=array();
        if(is_array($obj)){
            foreach ($obj as $r){
                $out[]=self::ObjArrConvert($r,$fields);
            }
        }else{
            $out=self::ObjArrConvert($obj,$fields);
        }
        return $out;
    }

    public static function ObjArrConvert($obj,$fields)
    {
        if(is_object($obj)){
            $rc=new ReflectionClass($obj);
            $prop=$rc->getProperties(ReflectionProperty::IS_PROTECTED);
            //print_r($prop);
            $r=array();
            foreach($prop as $p){
                $pname='get'.$p->getName();
                //echo gettype($obj->$pname())."::".$obj->$pname()."\n";
                if(is_object($obj->$pname()) || is_array($obj->$pname())){
                    if(is_object($obj->$pname()) && get_class($obj->$pname())=="DateTime") {
                        $r[$p->getName()] = $obj->$pname()->format('Y-m-d H:i:s');
                    }else {
                        $r[$p->getName()] = self::O2A($obj->$pname(), $fields);
                    }
                }else {
                    if ($fields != null) {
                        if (in_array($p->getName(), $fields)) {
                            $r[$p->getName()] = $obj->$pname();
                        }
                    } else {
                        $r[$p->getName()] = $obj->$pname();
                    }
                }
            }
            return $r;
        }else{
            return $obj;
        }
    }

    private function prepareDate($matches)
    {
        if($this->dbType){
            return "CONVERT(datetime,".$matches[1].",120)";
        }else{
            return "TO_DATE(".$matches[1].", 'yyyy-mm-dd hh24:mi:ss')";
        }
    }

    private function prepareFilter($filter){
        $reg='/d2\(([0-9-]+)\)/';
        return preg_replace_callback($reg, array($this, 'prepareDate'), $filter);
    }

    //Project EPS Integration Methods
    public function getEpsTree($filter=null,$includeProjects=false){
        $srv=$this->EPS();
        $fields=['ObjectId','ParentObjectId','Id','Name'];
        $rr=new ReadEPS($fields);
        $rr->setFilter((($filter==null)?"ParentObjectId IS NULL":"ParentObjectId = ".$filter));
        $res=self::O2A($srv->ReadEPS($rr)->getEps(),$fields);
        if(empty($res)){
            return null;
        }
        foreach ($res as &$re) {
            $childs=$this->getEpsTree($re['ObjectId'],$includeProjects);
            if($childs!=null){
                $re['children']=$childs;
                $re['countchilds']=count($childs);
            }else{
                $re['countchilds']=0;
            }
            if($includeProjects==true){
                $projects=$this->getProjects($re['ObjectId']);
                if(!empty($projects)){
                    $re['children']=(isset($re['children']))?array_merge($re['children'],$projects):$projects;
                    $re['countchilds']+=count($projects);
                }
            }
            $re['ntype']='eps';
        }
        return $res;
    }

    //End Project EPS Integrations
    //Projects Integration Methods//
    /**
     * @param null $projCode
     * @return array ['ObjectId','Id','Name','WBSObjectId']
     */
    public function getProjects($epsId=null)
    {
        $fields=['ObjectId','Id','Name','WBSObjectId','GUID','Status'];
        $serv=$this->Project();
        $rp=new ReadProjects($fields);
        if($epsId != null) {
            $rp->setFilter("ParentEPSObjectId = ".$epsId);
        }
        $res=$serv->ReadProjects($rp)->getProject();
        $out = self::O2A($res,$fields);
        if(!empty($out)) {
            foreach ($out as &$o) {
                $o['ntype'] = 'project';
            }
        }
        return $out;
    }
    //End Project Integration Methords//
    //WBS Projects Integrations methods
    /**
     * @param $RootWBSId
     * @return array ['ObjectId','ParentObjectId','Code','Name']
     */
    public function getWbs($RootWBSId)
    {
        $srv=$this->WBS();
        $fields=['ObjectId','ParentObjectId','Code','Name','GUID','SequenceNumber'];
        $res=self::O2A($srv->ReadAllWBS(new ReadAllWBS($RootWBSId,$fields))->getWbs(),$fields);
        if(!empty($res)) {
            foreach ($res as &$re) {
                $re['ntype']='wbs';
            }
        }else{
            return null;
        }
        return $res;
    }

    public function getWbsTree($RootWBSId)
    {
        $srv=$this->WBS();
        $fields=['ObjectId','ParentObjectId','Code','Name','GUID'];
        $res=self::O2A($srv->ReadAllWBS(new ReadAllWBS($RootWBSId,$fields))->getWbs(),$fields);
        if(empty($res)){
            return null;
        }
        foreach ($res as &$re) {
            $childs=$this->getWbsTree($re['ObjectId']);
            if($childs!=null){
                $re['children']=$childs;
                $re['countchilds']=count($childs);
            }else{
                $re['countchilds']=0;
            }
            $re['ntype']='wbs';
        }
        return $res;
    }
    //WBS Projects Integrations methods
    //Activity Projects Integrations methods
    public function getTasks($WbsId,$filter=null)
    {
        $srv=$this->Activity();
        $fields=['ObjectId','WBSObjectId','Id','Name','StartDate','FinishDate','Type'];
        $rr=new ReadAllActivitiesByWBS($WbsId,$fields);
        if($filter!=null) $rr->setFilter($this->prepareFilter($filter));
        $res=self::O2A($srv->ReadAllActivitiesByWBS($rr)->getActivity(),$fields);
        foreach ($res as &$re) {
            $re['ntype']='task';
        }
        return $res;
    }
    //End Activity Projects Integrations methods
    //Resources Integration
    public function getResources($filter=null){
        $srv=$this->Resource();
        $fields=['ObjectId','ParentObjectId','Id','Name','Title','ResourceType'];
        $rr=new ReadResources($fields);
        if($filter!=null) $rr->setFilter($this->prepareFilter($filter));
        $res=self::O2A($srv->ReadResources($rr)->getResource(),$fields);
        return $res;
    }

    public function getResourcesTree($parentId=null,$filter=null){
        $srv=$this->Resource();
        $fields=['ObjectId','ParentObjectId','Id','Name','ResourceType'];
        $rr=new ReadResources($fields);
        if($parentId==null){
            $rr->setFilter("ParentObjectId IS NULL".(($filter==null)?"":" AND ".$filter));
        }else{
            $rr->setFilter("ParentObjectId = ".$parentId.(($filter==null)?"":" AND ".$filter));
        }
        $res=self::O2A($srv->ReadResources($rr)->getResource(),$fields);
        if(empty($res)){
            return null;
        }
        foreach ($res as &$r){
            $childs=$this->getResourcesTree($r['ObjectId']);
            if($childs!=null) {
                $r['children'] = $childs;
                $r['countchilds']=count($childs);
            }else{
                $r['countchilds']=0;
            }
        }
        return $res;
    }
    //End Resiurces Integration
    //ActivityAssigmentResource
    public function getResourceAssignment($TaskId=null)
    {
        $srv=$this->ResourceAssignment();
        $fields=['ObjectId','ActivityObjectId','ResourceObjectId','PlannedUnits','ActualUnits','RemainingUnits'];
        $rr=new ReadResourceAssignments($fields);
        $res=self::O2A($srv->ReadResourceAssignments($rr)->getResourceAssignment(),$fields);
        return $res;
    }

    public function getSpredResourceAssignment(array $ResourceAssignmentObjectId, $pt='Day')
    {
        $srv=$this->Spread();
        //print_r($srv);
        $fields=['PlannedUnits','ActualUnits','RemainingUnits'];
        //$ar=array(6645);
        $rr=new ReadResourceAssignmentSpread($ResourceAssignmentObjectId,$pt,$fields);
        $fields[] = 'ResourceAssignmentObjectId';
        $res=self::O2A($srv->ReadResourceAssignmentSpread($rr)->getResourceAssignmentSpread(),$fields);
        return $res;
    }

    //ActivityAssigmentResource

    //ActivityCode Services
    //ReadActivityCodeType
    /**
     * @param $projObjId
     * @return array
     */
    public function getActivityCodeTypesByProject($projObjId)
    {
        $srv=$this->ActivityCodeType();
        $fields=['ObjectId','ProjectObjectId','Scope','Name'];
        $rr=new ReadActivityCodeTypes($fields);
        if(is_array($projObjId)){
            $rr->setFilter("ProjectObjectId IN(".join(",",$projObjId).")");
        }else {
            $rr->setFilter("ProjectObjectId = " . $projObjId);
        }
        $res=self::O2A($srv->ReadActivityCodeTypes($rr)->getActivityCodeType(),$fields);
        return $res;
    }
    //CreateActivityCodeType
    /**
     * @param $acname
     * @param $projObjId
     * @return int
     */
    public function newActivityCodeTypeByProject($acname, $projObjId)
    {
        $srv=$this->ActivityCodeType();
        $act=new ActivityCodeType();
        $act->setName($acname)
            ->setProjectObjectId($projObjId)
            ->setScope('Project')
            ->setLength(12);
        $req = new CreateActivityCodeTypes(array($act));
        $resp=$srv->CreateActivityCodeTypes($req)->getObjectId();
        if(count($resp)==0) {
            return null;
        }else{
            return $resp[0];
        }
    }

    /**
     * @param $CodeTypeObjectId
     * @return array
     */
    public function getActivityCodeValues($CodeTypeObjectId)
    {
        $srv=$this->ActivityCode();
        $fields=['ObjectId','CodeTypeObjectId','CodeValue','Description'];
        $rr=new ReadActivityCodes($fields);
        $rr->setFilter("CodeTypeObjectId = ".$CodeTypeObjectId);
        $res=self::O2A($srv->ReadActivityCodes($rr)->getActivityCode(),$fields);
        return $res;
    }

    public function newActivityCodeValue($actCodeTypeId, $codeValue,$description)
    {
        $srv=$this->ActivityCode();
        $act=new ActivityCode();
        $act->setCodeTypeObjectId($actCodeTypeId)
            ->setCodeValue($codeValue)
            ->setDescription($description);
        $req=new CreateActivityCodes(array($act));
        $resp=$srv->CreateActivityCodes($req)->getObjectId();
        if(count($resp)==0) {
            return null;
        }else{
            return $resp[0];
        }
    }
    //End Activity Code Service
}