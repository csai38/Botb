<?php
/**
 * Created by PhpStorm.
 * User: skarp
 * Date: 02.05.2018
 * Time: 17:26
 */

namespace modules\iviews;

use Botb\Basic;
use BotbLib\PchartEx\pImageEx;

class MdschDb
{
    public function getImageMPReport($data){
        /*
         * $data['msp'] - плановый процент выполнения МСГ
         * $data['msf'] - фактический процент выполнения МСГ
         * $data['pmp'] - плановая численность
         * $data['pmf'] - фактическая численность
         */
        //Готовим данные
        $mPlan = new \pData();
        $mPlan->addPoints(array($data['msp'],(100-$data['msp'])),"MsgPlain");
        $mPlan->setSerieDescription("MsgPlain","план");
        $mPlan->addPoints(array("A1","A2"),"Labels");
        $mPlan->setAbscissa("Labels");
        $mPlan->loadPalette(__DIR__."/palettes/default.color", true);

        $mdiff=($data['msp']!=0)?$data['msf']/$data['msp']*100:1;
        $mFact = new \pData();
        $mFact->addPoints(array($data['msf'],(100-$data['msf'])),"MsgFact");
        $mFact->setSerieDescription("MsgFact","факт");
        $mFact->addPoints(array("B1","B2"),"Labels");
        $mFact->setAbscissa("Labels");
        $mFact->loadPalette($this->_getPalette($mdiff), true);

        $pdiff=($data['pmp']!=0)?$data['pmf']/$data['pmp']*100:1;
        if($pdiff > 100){
            $pd=array(100,0);
        }else{
            $pd=array($pdiff,(100-$pdiff));
        }
        $mobFact = new \pData();
        $mobFact->addPoints($pd,"Mob");
        $mobFact->setSerieDescription("Mob","факт. численность");
        $mobFact->addPoints(array("FP","NP"),"Labels");
        $mobFact->setAbscissa("Labels");
        $mobFact->loadPalette($this->_getPalette($pdiff), true);

        //Создаем холст
        $mp = new pImageEx(460,180,$mPlan);
        //Вставляем текст
        $mp->setFontProperties(array("FontName"=>__DIR__."/fonts/pfdindisplaypro-reg.ttf","FontSize"=>16));
        $mp->drawText(115,15,"Прогресс МСГ",array("R"=>80,"G"=>80,"B"=>80,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));
        $mp->drawText(345,15,"Людские ресурсы",array("R"=>80,"G"=>80,"B"=>80,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));

        $mp->drawText(115,80,$data['msp']."%",array("R"=>80,"G"=>80,"B"=>80,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));
        $mp->drawText(115,100,$data['msf']."%",array("R"=>80,"G"=>80,"B"=>80,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));

        $mp->drawText(345,80,number_format($data['pmp'], 0, ',', ' '),array("R"=>80,"G"=>80,"B"=>80,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));
        $mp->drawText(345,100,number_format($data['pmf'], 0, ',', ' '),array("R"=>80,"G"=>80,"B"=>80,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));

        $mp->drawLine(90,90,140,90);
        $mp->drawLine(315,90,380,90);

        //Создаем плановую диаграмму
        $mpChart = new \pPie($mp,$mPlan);
        $cfg['ORadius']=48;
        $cfg['IRadius']=36;
        $cfg['Border']=true;
        $cfg['BorderR']=204;
        $cfg['BorderG']=204;
        $cfg['BorderB']=204;
        $cfg['Shadow']=false;
        $mpChart->draw2DRing(115,90,$cfg);
        $mp->drawLegend(55, 165, array("Style" => LEGEND_NOBORDER, "Mode" => LEGEND_HORIZONTAL, "FontSize" => 16));
        //Создаем фактическую диаграмму
        $mp->DataSet = $mFact;
        $mfChart = new \pPie($mp,$mFact);
        $cfg['ORadius']=64;
        $cfg['IRadius']=52;
        $mfChart->draw2DRing(115,90,$cfg);
        $mp->drawLegend(120, 165, array("Style" => LEGEND_NOBORDER, "Mode" => LEGEND_HORIZONTAL, "FontSize" => 16));

        //Создаем диаграмму численности
        $mp->DataSet=$mobFact;
        $pcChart = new \pPie($mp,$mobFact);
        $cfg['ORadius']=64;
        $cfg['IRadius']=52;
        $pcChart->draw2DRing(345,90,$cfg);
        $mp->drawLegend(255, 165, array("Style" => LEGEND_NOBORDER, "Mode" => LEGEND_HORIZONTAL, "FontSize" => 16));

        //Формируем вывод в base64
        ob_start();
        $mp->renderRaw();
        $imageData=ob_get_contents();
        ob_end_clean();
        $base64 = base64_encode($imageData);
        return $base64;
    }

    private function _getPalette($val){
        global $config;
        if($val < $config['reports']['ilow']){
            return __DIR__."/palettes/grlow.color";
        }elseif($val >= $config['reports']['ilow'] && $val < $config['reports']['imid']){
            return __DIR__."/palettes/grmid.color";
        }elseif($val >= $config['reports']['imid'] && $val < $config['reports']['inorm']){
            return __DIR__."/palettes/grnorm.color";
        }elseif($val >= $config['reports']['inorm']){
            return __DIR__."/palettes/grhigh.color";
        }else{
            return __DIR__."/palettes/default.color";
        }
    }
}