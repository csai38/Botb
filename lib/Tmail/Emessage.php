<?php
/**
 * Created by PhpStorm.
 * User: skarp
 * Date: 14.04.2018
 * Time: 11:40
 */

namespace BotbLib\Tmail;


class Emessage
{
    private $_fromAdress;
    private $_fromName;

    private $_to = array();
    private $_attach=array();
    private $_messageType = 'text';
    public $subject;
    public $body;


    function __construct($fromAdress,$fromName = null,$messageType = 'text'){
        $this->_fromAdress = $fromAdress;
        $this->_fromName = ($fromName==null)?$fromAdress:$fromName;
        $this->_messageType = $messageType;
    }

    public function to($address){
        if(is_array($address)){
            for($i=0;$i<count($address);$i++){
                $this->_to[] = $address[$i];
            }
        }else{
            $this->_to[]=$address;
        }
    }

    public function addFile($filePath,$dataType='application/octet-stream'){
        $content=file_get_contents($filePath);
        $name = basename($filePath);
        $data = chunk_split(base64_encode($content));
        $this->_attach[]=array($name,$dataType,$data);
    }

    public function addData($fileName,$data,$size,$dataType='application/octet-stream'){
        $this->_attach[]=array($fileName,$dataType,$data,$size);
    }

    public function send()
    {
        $boundary = md5(uniqid(time()));
        $hasAttch=(count($this->_attach) > 0)?true:false;
        // Email header
        $header = "From: " . $this->_fromName . " <" . $this->_fromAdress . ">" . "\n";
        //$header .= "Reply-To: ".$reply_to."\r\n";
        $header .= "MIME-Version: 1.0" . "\n";

        if ($hasAttch) {
            // Multipart wraps the Email Content and Attachment
            $header .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"\n";
            $header .= "This is a multi-part message in MIME format." . "\n";
        }
        $emessage = "--" . $boundary . "\n";
        // Email content
        // Content-type can be text/plain or text/html
        if ($this->_messageType == 'text') {
            $emessage .= "Content-type: text/plain; charset=utf-8 \n";
        }elseif($this->_messageType == 'html') {
            $emessage .= "Content-type: text/html; charset=utf-8 \n";
        }else{
            $emessage .= "Content-type: text/plain; charset=utf-8 \n";
        }
        //if($hasAttch) {
        $emessage .= "Content-Transfer-Encoding: 7bit\n";
        $emessage .= $this->body . "\n";
        $emessage .= "--" . $boundary . "\n";
        //}
        // Attachment
        for($i=0;$i<count($this->_attach);$i++) {
            $emessage .= "Content-Type: ".$this->_attach[$i][1]."; name=\"" . $this->_attach[$i][0] . "\"\n";
            $emessage .= "Content-Transfer-Encoding: base64\n";
            $emessage .= "Content-Disposition: attachment; filename=\"" . $this->_attach[$i][0] ."\"\n\n";
            $emessage .= chunk_split($this->_attach[$i][2]) . "\n\n";
            $emessage .= "--" . $boundary . "--\n";
        }
        if($hasAttch){
            for($j=0;$j<count($this->_to);$j++) {
                mail($this->_to[$j], $this->subject, $emessage, $header);

            }
        }
    }


}