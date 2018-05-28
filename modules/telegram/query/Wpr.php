<?php
/**
 * Created by PhpStorm.
 * User: KarpSA
 * Date: 20.03.2017
 * Time: 23:45
 */

namespace modules\query {
    require_once(__DIR__ . '/../../Shared.php');

    class Wpr extends \modules\Shared
    {

        function __construct(\modules\telegram\QueryRouter &$router)
        {
            parent::__construct();
            $this->r=$router;
        }

        public function exequteQuery($params){
            if(!$this->_checkUser()){
                $this->r->sendMessage($this->r->getRequest()->getChatId(), 'Как дела?');
            }else {
                require_once (__DIR__.'/../../iviews/WorkProgress.php');
                $wp=new \WorkProgress();
                $data=array();
                $this->r->sendPhoto($this->r->getRequest()->getChatId(),$wp->getReport());
            }
        }

        private function _checkUser(){
            $sql="SELECT count(id) FROM acl_users WHERE userId=?";
            $res=$this->r->getCdb()->selectCell($sql,$this->r->getRequest()->getUserId());
            if($res>0){
                return true;
            }else{
                return false;
            }
        }

        private function getProjectInfo($projId){

        }
    }
}