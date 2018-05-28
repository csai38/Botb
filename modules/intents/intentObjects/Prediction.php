<?php
namespace modules\intents\intentObjects;
class Prediction extends \BotbLib\Languniq\BaseIntent{
	

	public function subjectOfOnProject(){
        return "Ожидаемое выполнение месячного плана 78%,\nтребуется увеличение основных рабочих до 48 чел.\nПрогнозный результат с учетом технического предела 92%";
	}

	public function subjectOfOnContractorByProjectAndObject(){
        return "Ожидаемое выполнение месячного плана 65%,\nтребуется увеличение основных рабочих до 25 чел.\nПрогнозный результат с учетом технического предела 83%";
	}

	public function subjectOfOnContractorByProject(){
        return "Ожидаемое выполнение месячного плана 78%,\nтребуется увеличение основных рабочих до 48 чел.\nПрогнозный результат с учетом технического предела 92%";
	}
}