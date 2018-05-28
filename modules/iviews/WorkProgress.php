<?php
/**
 * Created by PhpStorm.
 * User: KarpSA
 * Date: 16.03.2017
 * Time: 9:32
 */
/*
 * $data=array массив данных для построения графика
 * $data[rdate] = date reports
 * $data[tt][project] = Project Name
 * $data[tt][object] = Object works
 * $data[tt][bulder] = Contragent of constraction
 * $data[tt][series] = Points date series Abcissa
 * $data[wp][plan] = Percent plain work progress
 * $data[wp][fact] = Percent fact work progress
 * $data[hr][plan] = Value plan human resources
 * $data[hr][fact] = Value fact human resources
 * $data[hr][max] = Максимальное значение людей в периоде
 * $data[tl][dayp] = Percent day tasks complete
 * $data[tl][monthp] = Percent month tasks complete on current day
 * $data[tl][wpd] = Dynamic work progress
 * $data[tl][hrd] = Dynamic human resources
 * $data[reponame] = mixed uniqe name
*/


namespace modules\iviews;

use Botb\Basic;
use BotbLib\PchartEx\pImageEx;

class WorkProgress
{
    function __construct()
    {

    }

    private function getColorTl($val)
    {
        $color = array("R" => 255, "G" => 255, "B" => 255, "Alpha" => 100);
        if ($val <= 70) {
            $color = array("R" => 255, "G" => 127, "B" => 96, "Alpha" => 50);
        } elseif ($val > 70 && $val <= 90) {
            $color = array("R" => 255, "G" => 215, "B" => 0, "Alpha" => 50);
        } elseif ($val > 90 && $val <= 130) {
            $color = array("R" => 34, "G" => 139, "B" => 34, "Alpha" => 50);
        } elseif ($val > 130) {
            $color = array("R" => 32, "G" => 178, "B" => 170, "Alpha" => 50);
        }
        return $color;
    }

    private function getColorPN($val)
    {
        $color = array("R" => 105, "G" => 105, "B" => 105, "Alpha" => 100);
        if ($val < 0) {
            $color = array("R" => 255, "G" => 0, "B" => 0, "Alpha" => 100);
        } elseif ($val > 0) {
            $color = array("R" => 0, "G" => 128, "B" => 0, "Alpha" => 100);
        }
        return $color;
    }

    public function getReport($data=null){

        if ($data==null) {
            $data['rdate'] = date('Y-m-d');
            $data['tt']['project'] = 'Новая Высота';
            //$data['tt']['object'] = null;
            //$data['tt']['bulder'] = 'Строй Мех Монтаж';
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
            $data['tl']['tforecast']=72;
            $data['reponame']='wp201703053658';
        }
        //if(file_exists(__DIR__.'/cache/'.$data['reponame'].'.png')){
        //    return new CURLFile(__DIR__.'/cache/'.$data['reponame'].'.png');
        //}else{
        //    $fname=__DIR__.'/cache/'.$data['reponame'].'.png';
        //}
        $dar=date_parse($data['rdate']);

        /* Create and populate the pData object */
        $store = new \pData();

        $store->loadPalette(__DIR__ . "/palettes/gpn.color", true);

        $store->addPoints($data['wp']['plan'], "План");
        $store->addPoints($data['wp']['fact'], "Факт");
        $store->addPoints($data['wp']['forecast'], "Прогноз");
        $store->addPoints($data['hr']['plan'], "Численность план");
        $store->addPoints($data['hr']['fact'], "Численность факт");
        //$store->addPoints($data['hr']['forecast'], "Численность прогноз");
        $store->setAxisName(0, "Выполнение плана %\nнарастающим итогом");
        $store->setAxisName(1, "Численность");

        $store->addPoints($data['tt']['series'], "Неделя");
        $store->setAbscissa("Неделя");

        $store->setSerieOnAxis("План", 0);
        $store->setSerieOnAxis("Факт", 0);
        $store->setSerieOnAxis("Прогноз", 0);
        $store->setSerieOnAxis("Численность план", 1);
        $store->setSerieOnAxis("Численность факт", 1);
        //$store->setSerieOnAxis("Численность прогноз", 1);
        $store->setAxisPosition(1, AXIS_POSITION_RIGHT);

        /* Create the pChart object */
        $mp = new pImageEx(1000, 570, $store);
        /* Set the default font */
        $mp->setFontProperties(array("FontName" => __DIR__. '/fonts/pfdindisplaypro-reg.ttf', "FontSize" => 11));
        //$mp->drawDevGrid();

        //-----------------Заголовки-------------------//
        $mt = "Отчет выполнения месячно-суточного плана за " .Basic::lZ($dar['day']).".".Basic::lZ($dar['month']).".".$dar['year'];
        $mp->drawText(40, 30, $mt, array("FontSize" => 16));
        $rptext='';
        if (isset($data['tt']['object'])) {
            $rptext .= "Проект: " . $data['tt']['project'];
        }
        if (isset($data['tt']['object'])) {
            $rptext .= "    Объект: " . $data['tt']['object'];
        }

        if (isset($data['tt']['bulder'])) {
            $rptext .= "    Подрядчик: " . $data['tt']['bulder'];
        }
        $mp->drawText(40, 50, $rptext, array("FontSize" => 12));
        $mp->drawText(965, 320, "Численность чел.", array("FontSize" => 11, "Angle" => 90));
        //---------------------------------------------//
        //-----------------График МСГ------------------//
        /* Define the chart area */
        $mp->setGraphArea(90, 90, 930, 420);
        /* Draw the scale */
        //$scaleSettings = array("GridR"=>200,"GridG"=>200,"GridB"=>200,"DrawSubTicks"=>FALSE,"CycleBackground"=>TRUE);
        $AxisBoundaries = array(0 => array("Min" => 0, "Max" => $data['wp']['max']), 1 => array("Min" => 0, "Max" => ($data['hr']['max']) * 1.1));
        $ScaleSettings = array("Mode" => SCALE_MODE_MANUAL, "ManualScale" => $AxisBoundaries, "DrawSubTicks" => false, "DrawArrows" => false, "DrawYLines" => array(0, 1), "Pos" => SCALE_POS_LEFTRIGHT);
        $mp->drawScale($ScaleSettings);

        /* Write the chart legend */
        $mp->drawLegend(480, 60, array("Style" => LEGEND_NOBORDER, "Mode" => LEGEND_HORIZONTAL, "FontSize" => 11));
        /* Рисуем столбы */
        $settings = array(//"DisplayPos"=>LABEL_POS_INSIDE,
            "DisplaySize" => 11,
            "DisplayValues" => true,
            "Surrounding" => -30
        );
        /*
        $store->setSerieDrawable("Численность план",true);
        $store->setSerieDrawable("Численность факт",true);
        $store->setSerieDrawable("План",false);
        $store->setSerieDrawable("Факт",true);
        */

        $store->setSerieDrawable("Численность план", false);
        $store->setSerieDrawable("Численность факт", false);
        //$store->setSerieDrawable("Численность прогноз", false);
        $store->setSerieDrawable("Прогноз", false);
        $store->setSerieDrawable("План", true);
        $store->setSerieDrawable("Факт", true);
        //$store->setSerieDrawable("Прогноз", true);
        $mp->drawBarChart($settings);
        /* Рисуем прогноз столбы*/
        $store->setSerieDrawable("Численность план", false);
        $store->setSerieDrawable("Численность факт", false);
        //$store->setSerieDrawable("Численность прогноз", false);
        $store->setSerieDrawable("Прогноз", true);
        $store->setSerieDrawable("План", true);
        $store->setSerieDrawable("Факт", false);
        //$store->setSerieDrawable("Прогноз", false);
        $mp->drawBarChart($settings);
        /* Рисуем линнии */
        $store->setSerieDrawable("Численность план", true);
        $store->setSerieDrawable("Численность факт", true);
        //$store->setSerieDrawable("Численность прогноз", true);
        $store->setSerieDrawable("План", false);
        $store->setSerieDrawable("Факт", false);
        $store->setSerieDrawable("Прогноз", false);
        $mp->drawSplineChart(array("DisplayValues" => true,
            "DisplayColor" => DISPLAY_AUTO,
            //"DisplayPos"=>LABEL_POS_INSIDE,
            "DisplayOffset" => 15));
        $mp->drawPlotChart(array("PlotSize" => 3, "PlotBorder" => false));

        //-------------------Разделитель----------------//

        //$mp->drawLine(0,350,700,350,array("R"=>224,"G"=>224,"B"=>224,"Ticks"=>4,"Weight"=>0.5));

        //------------------Светофоры--------------------//
        $xpos=170;
        $ypos=470;

        if (isset($data['tl']['dayp'])) {
            $dayp=($data['tl']['dayp']>300)?'>300':$data['tl']['dayp'];
            $mp->drawText($xpos, $ypos," Выполнение плана\nза прошедшие сутки", array("FontSize" => 11,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));
            $mp->drawFilledCircle($xpos, $ypos+50, 30, $this->getColorTl($data['tl']['dayp']));
            $mp->drawText($xpos, $ypos+50, $dayp . "%", array("FontSize" => 14,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));
            //$mp->drawLine(180,365,180,405);
        }

        if (isset($data['tl']['monthp'])) {
            $mp->drawText(340, 470,"Выполнение плана месяца\nна " .Basic::lZ($dar['day']).".".Basic::lZ($dar['month']).".".$dar['year'], array("FontSize" => 11,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));
            $mp->drawFilledCircle(340, 520, 30, $this->getColorTl($data['tl']['monthp']));
            $mp->drawText(340, 520, $data['tl']['monthp'] . "%", array("FontSize" => 14,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));
            //$mp->drawLine(380,365,380,405);
        }
        if (isset($data['tl']['tforecast'])) {
            $mp->drawText(520, 470,"Прогноз выполнения\nплана месяца", array("FontSize" => 11,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));
            $mp->drawFilledCircle(520, 520, 30, $this->getColorTl($data['tl']['tforecast']));
            $mp->drawText(520, 520, $data['tl']['tforecast'] . "%", array("FontSize" => 14,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));
            //$mp->drawLine(540,365,540,405);
        }

        if (isset($data['tl']['wpd'])) {
            $mp->drawText(710, 470,"Динамика\nпроизводства СМР", array("FontSize" => 11,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));
            $mp->drawCircle(710, 520, 30, 30, $this->getColorPN($data['tl']['wpd']));
            $mp->drawText(710, 520, (($data['tl']['wpd'] > 0) ? "+" : "") . $data['tl']['wpd'] . "%", array("FontSize" => 14,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));
            //$mp->drawLine(540,365,540,405);
        }

        if (isset($data['tl']['hrd'])) {
            $mp->drawText(890, 470,"Динамика\nчисленности", array("FontSize" => 11,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));
            $mp->drawCircle(890, 520, 30, 30, $this->getColorPN($data['tl']['hrd']));
            $mp->drawText(890, 520, (($data['tl']['hrd'] > 0) ? "+" : "") . $data['tl']['hrd'] . "%", array("FontSize" => 14,"Align"=>TEXT_ALIGN_MIDDLEMIDDLE));
        }

        //-----------------Круговые диаграммы по прогрессу и численности---------------//


        //-----------------------------------------------//
        //$mp->Antialias = true;
        /* Render the picture (choose the best way) */
        //$mp->Render($fname);
        //return new CURLFile($fname);
        //Формируем вывод в base64
        ob_start();
        $mp->renderRaw();
        $imageData=ob_get_contents();
        ob_end_clean();
        $base64 = base64_encode($imageData);
        //$data = 'data:image/png;base64, '.$base64;
        return $base64;
    }
}
?>