<?php
namespace modules\intents\intentObjects;
class ForecastMdsh extends \BotbLib\Languniq\BaseIntent{
	

	public function OnProjectsByMegaProjectOfSubject(){


	    return 'NOTHINGSAY';
	}

	public function Forecast(){
		return 'NOTHINGSAY';
	}

	public function subjectOfOnProject(){
		return "Ожидаемое выполнение МСГ 78%,\nтребуется увеличение основных рабочих до 48 чел.\nПрогнозный результат с учетом технического предела 92%";
	}
}