<?php
namespace Botb;
require_once 'Basic.php';
class Secure extends Basic {
	private function getUserModules() {
		global $_SESSION;
		// print_r($_SESSION['userId'];
		$sql = "SELECT sys_сmodules.modPrefix
                FROM sys_сmodules, sso_user_modules
                WHERE sys_сmodules.id=sso_user_modules.modId
                AND sso_user_modules.userId=?";
		$mods = $this->cdb->select ($sql, $_SESSION ['userId']);
		if (count ( $mods ) == 0) {
			return false;
		} else {
			return $mods;
		}
	}
	public function createApp() {
		global $config;
		$paths = "";
		$controls = "";
        $modules=$this->getUserModules();
		for($i=0;$i<count($modules);$i++)
		{
            $paths=$paths.",".$modules[$i]['modPrefix']." : '".$config['mod_dir']."/".strtolower($modules[$i]['modPrefix'])."'";
            $controls=$controls.", '".$modules[$i]['modPrefix'].".controller.".$modules[$i]['modPrefix']."main'";
		}
        $app = "Ext.Loader.setConfig({"
            . "enabled: true,"
            ." paths: {"
            ."  Ext: '/ext', 'Ext.ux': '/ext/ux',"
            ." 'Ext.pivot': '/ext/pivot',"
            ." 'Ext.exporter': '/ext/exporter',"
            ." 'Sga.ux': '/js/sgux',"
            ." 'Sjs': '/js'" . $paths
            ."}});"
            ."Ext.application({"
            ."  requires: ['Ext.Loader','CTH.DirectAPI'],"
            ."  models: [],stores: [],"
            ."  views: ['Vmain','ChpassWin','LoginWin'],"
            ."  controllers: ['Cmain' " . $controls . "],"
            ."  name: 'CTH', appFolder: '/app',"
            ."  mainView: 'Vmain',"
            ."  isOffline: false,"
            //."  launch: function(){"
            //."      //Ext.create('SGD.view.Main');"
            //."      //Sga.getLang();"
            //."      //Ext.TaskManager.start({run: Sga.ping, interval: 30000});"
            //."  },"
            ."  listen:{"
            ."      global:{"
            ."          online: 'onOnline',"
            ."          offline: 'onOffline'"
            ."      }"
            ."  },"
            ."  onOnline: function(){ CTH.isOffline=false},"
            ."  onOffline: function(){ CTH.isOffline=true}"
            ."});";
		return $app;
	}
	static function getUserApi($dblink) {
		global $_SESSION;
		$sql = 'SELECT sys_methods_api';
	}
	static function getUserProjectsIds() {
		global $db, $_SESSION;
		$sql = 'SELECT cnm_contracts.projId
				 FROM cnm_contracts, sso_user_cagents
				 WHERE sso_user_cagents.uId = ?
				 AND (cnm_contracts.csId = sso_user_cagents.caId
				 OR cnm_contracts.caId = sso_user_cagents.caId)
				 GROUP BY cnm_contracts.projId';
		return $db->selectCol ( $sql, $_SESSION ['userId'] );
	}
	static function getUserProjects() {
		global $db, $_SESSION;
		$sql = 'SELECT ast_projects.id, ast_projects.projName, ast_projects.startDate, ast_projects.endDate
				 FROM ast_projects, cnm_contracts, sso_user_cagents
				 WHERE ast_projects.id=cnm_contracts.projId
				 AND sso_user_cagents.uId = ?
				 AND (cnm_contracts.csId = sso_user_cagents.caId
				 OR cnm_contracts.caId = sso_user_cagents.caId)
				 GROUP BY cnm_contracts.projId';
		$sql2 = 'SELECT ast_projects.id, ast_projects.projName, ast_projects.startDate, ast_projects.endDate
					 FROM ast_projects, sso_user_cagents
					 WHERE ast_projects.caId=sso_user_cagents.caId
					 AND sso_user_cagents.uId = ?
					 GROUP BY ast_projects.id';
		$res = $db->select ( $sql, $_SESSION ['userId'] );
		if ($res == NULL) { // Если значение равно нулю, возможно еще нет контрактов по проекту получаем список проектов по владельцу
			$res = $db->select ( $sql2, $_SESSION ['userId'] );
		}
		return $res;
	}
	static function checkUserProject($projId) {
		global $db, $_SESSION;
		$sql = 'SELECT COUNT(ast_projects.id)
				 FROM ast_projects, cnm_contracts, sso_user_cagents
				 WHERE ast_projects.id=cnm_contracts.projId
				 AND sso_user_cagents.uId = ?
				 AND ast_projects.id = ?
				 AND (cnm_contracts.csId = sso_user_cagents.caId
				 OR cnm_contracts.caId = sso_user_cagents.caId)';
		$res = $db->selectCell ( $sql, $_SESSION ['userId'], $projId );
		
		if ($res > 0) {
			return true;
		} else {
			return false;
		}
	}
}
?>