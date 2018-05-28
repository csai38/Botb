<?php
namespace modules\intents\intentObjects;

use Botb\Basic;
use modules\iviews\WorkProgress;
use modules\Shared;

class Mdsch extends \BotbLib\Languniq\BaseIntent{
	

	public function subjectOfOnProject(){

	    $repo = new WorkProgress();
	    $data=$repo->getReport();
	    return array('',$data,false);
	}

	public function subjectOfOnMegaProject(){
        return "Прогресс выполнения месячного задания на " . date('d.m.Y') . "\n Жилой комплекс 69% / 60%\n Энергообеспечение 24% / 36%\n Теплотрасса 25% / 14%";
	}

	public function subjectOfOnContractorByProject(){

        $data['rdate'] = date('Y-m-d');
        $data['tt']['project'] = 'Новая Высота';
        //$data['tt']['object'] = null;
        $data['tt']['bulder'] = 'Строй Мех Монтаж';
        $data['tt']['series'] = array('16.04','17.04','18.04', '19.04', '20.04','21.04', '22.04', '23.04', '24.04', '25.04', '26.04', '27.04', '28.04', '29.04','30.04');
        $data['wp']['plan'] = array(47, 49, 54, 57, 60, 63, 66, 69, 70, 74, 79, 84,90,94,100);
        $data['wp']['fact'] = array(34, 37, 46, 48, 51, 53, 56, 60);
        $data['wp']['forecast'] = array(null, null, null, null, null, null, null, null, 62,65,67,71,73,75,78);
        $data['hr']['plan'] = array(20, 25, 25, 25, 27, 35, 37, 40, 40, 40, 40, 40, 40, 40, 40);
        $data['hr']['fact'] = array(15, 18, 29, 34, 34, 34,34,36);
        //$data['hr']['forecast'] = array(null, null, null, null, null, null, null, null, 48,48,48,48,48,48,48);
        $data['wp']['min'] = 30;
        $data['wp']['max'] = 120;
        $data['hr']['max'] = 40;
        $data['tl']['dayp'] = 95;
        $data['tl']['monthp'] = 87;
        $data['tl']['wpd'] = 32;
        $data['tl']['hrd'] = 6;
        $data['reponame']='wp201703053658';
	    $repo = new WorkProgress();
        $data=$repo->getReport($data);
        return array('',$data,false);
	}
}