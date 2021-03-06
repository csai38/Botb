<?php
/**
 * Created by PhpStorm.
 * User: KarpSA
 * Date: 20.11.2017
 * Time: 18:56
 */
namespace BotbLib\Esms;

class Relay
{
    public $ip="192.168.0.1",$tz=TZ;

    function __construct($GateIP=null)
    {
        $this->ip=($GateIP!=null)?$GateIP:'192.168.0.1';
    }

    public function url($url,$post="")
    {
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_BINARYTRANSFER,false);
        curl_setopt($ch,CURLOPT_HEADER,false);
        curl_setopt($ch,CURLOPT_TIMEOUT, 90);
        $header = array();
        $header[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
        $header[] = 'Accept-Charset: Windows-1251,utf-8;q=0.7,*;q=0.7';
        $header[] = 'Accept-Language: ru-ru,ru;q=0.8,en-us;q=0.5,en;q=0.3';
        $header[] = 'Pragma: ';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        unset ($header);
        if(!empty($post)) {curl_setopt($ch, CURLOPT_POST, 1); curl_setopt($ch, CURLOPT_POSTFIELDS, $post);}
        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }

    public function utf2hex($str)
    {
        $l=mb_strlen($str);
        $res='';
        for ($i=0;$i<$l;$i++)
        {
            $s = mb_substr($str,$i,1);
            $s = mb_convert_encoding($s, 'UCS-2LE', 'UTF-8');
            $s = dechex(ord(substr($s, 1, 1))*256+ord(substr($s, 0, 1)));
            if (mb_strlen($s)<4) $s = str_repeat("0",(4-mb_strlen($s))).$s;
            $res.=$s;
        }
        return $res;
    }

    public function hex2utf($str)
    {
        $l=mb_strlen($str)/4;
        $res='';
        for ($i=0;$i<$l;$i++) $res.=html_entity_decode('&#'.hexdec(mb_substr($str,$i*4,4)).';',ENT_NOQUOTES,'UTF-8');
        return $res;
    }

    //отправляет смску
    public function send($number,$text)
    {
        $url = 'http://'.$this->ip.'/goform/goform_set_cmd_process';
        $post='isTest=false&';
        $post.= 'goformId=SEND_SMS&';
        $post.= 'notCallback=true&';
        $post.= 'Number='.urlencode($number).'&';
        $date = gmdate('y;m;d;h;i;s;'.$this->tz,time()+($this->tz*3600));
        $post.= 'sms_time='.urlencode($date).'&';
        $post.= 'MessageBody='.($this->utf2hex($text)).'&';
        $post.= 'ID=-1&';
        $post.= 'encode_type=UNICODE';
        return $this->url($url,$post);
    }

    public function sendMessage(Message $msg){
        $url = 'http://'.$this->ip.'/goform/goform_set_cmd_process';
        $post='isTest=false&';
        $post.= 'goformId=SEND_SMS&';
        $post.= 'notCallback=true&';
        $post.= 'Number='.urlencode($msg->Number).'&';
        $date = gmdate('y;m;d;h;i;s;'.$this->tz,time()+($this->tz*3600));
        $post.= 'sms_time='.urlencode($date).'&';
        $post.= 'MessageBody='.($this->utf2hex($msg->Text)).'&';
        $post.= 'ID=-1&';
        $post.= 'encode_type=UNICODE';
        return $this->url($url,$post);
    }

    //возвращает массив всех смсок
    public function get_sms()
    {
        $cont=$this->url('http://'.$this->ip.'/goform/goform_get_cmd_process?cmd=sms_data_total&page=0&data_per_page=5000&mem_store=1&tags=10&order_by=order+by+id+desc');
        $cont = json_decode($cont,true);
        $cont = $cont['messages'];
        foreach ($cont as $id => $arr) $cont[$id]['content']=$this->hex2utf(($cont[$id]['content']));
        return $cont;
    }

    //удаляет все смс
    public function clear_sms($cont=0)
    {
        if ($cont===0) $cont=$this->get_sms();
        $list_id='';
        $url = 'http://'.$this->ip.'/goform/goform_set_cmd_process';
        foreach ($cont as $id => $arr) $list_id.=$cont[$id]['id'].';';
        $post='isTest=false&goformId=DELETE_SMS&msg_id='.urlencode($list_id).'¬Callback=true';
        return $this->url($url,$post);
    }
}
?>