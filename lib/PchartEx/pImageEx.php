<?php
/**
 * Created by PhpStorm.
 * User: skarp
 * Date: 12.04.2018
 * Time: 15:06
 */

namespace BotbLib\PchartEx;

class pImageEx extends \pImage
{
    function renderRaw()
    {
        if ( $this->TransparentBackground ) { imagealphablending($this->Picture,false); imagesavealpha($this->Picture,true); }
        imagepng($this->Picture);
        imagedestroy($this->Picture);
    }

    function drawDevGrid(){
        //Draw horizontal lines
        $h = $this->getHeight();
        $w = $this->getWidth();
        $lh=10;
        $lw=10;
        while ($lh < $h){
            $this->drawLine(0,$lh,$w,$lh,array("R"=>224,"G"=>224,"B"=>224));
            $lh+=10;
        }
        while ($lw < $w){
            $this->drawLine($lw,0,$lw,$h,array("R"=>224,"G"=>224,"B"=>224));
            $lw+=10;
        }
    }
}