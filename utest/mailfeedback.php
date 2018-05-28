<?php
/**
 * Created by PhpStorm.
 * User: skarp
 * Date: 08.05.2018
 * Time: 21:31
 */

include_once(__DIR__."/../etc/init.php");

class TestFeedback extends \modules\Shared{


    public function makeFeedBack(){
        $subject=htmlspecialchars('Запрос комментария');
        $alt['itemcaption']='TestProject';
        $c='<html><body>Прошу дать комментарии<br/>'.$this->applyTamplate($alt,__DIR__.'/../modules/reports/tpls/msg/dbitem_object.tpl').'</body></html>';
        $body=htmlspecialchars($c);
        $link='mailto:skarp@tks.ms?subject='.$subject.'&body='.$body;
        $cnt['maillink']=$link;
        $cnt['maillinktext']='FeedBack';

        return $this->applyTamplate($cnt,__DIR__.'/../modules/reports/tpls/page.tpl');
    }
}

$a=new TestFeedback();
echo $a->makeFeedBack();