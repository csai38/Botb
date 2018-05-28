<?php
set_time_limit(0);
if(php_sapi_name()!="cli") {
    echo "NO CLI MODE \n";
    exit();
}
require_once(__DIR__ . '/etc/init.php');
if(php_sapi_name()!="cli") {
    define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT']);
}else{
    define('DOC_ROOT', "/var/web/ex/www");
}
$host = 'mail.tks.ms';
$user = 'tbot@tks.ms';
$pass = 'sFx1Doobay$5!9';
$port = 993;
$ssl = true;
$folder = 'INBOX';
$mailbox = new \JJG\Imap($host, $user, $pass, $port, $ssl, $folder);
$ids = $mailbox->getMessageIds();
if(count($ids)>0) {
    echo "Mail's detected, count (".count($ids).")\n";
    foreach ($ids as $k => $v) {
        $msg=array();
        try {
            $msg = $mailbox->getMessage($k);
            $msg['body'] = \Botb\Basic::convertMessageEncodingOfEMStructure($mailbox->getStructure($k),$msg['body']);
            $resp = new \modules\mail_imap\Responder($msg['body']);
            $reply = $resp->run();
            if(is_array($reply)){
                //[0] - Message
                //[1] - BinaryData
                //[2] - isHtml
                $message = new \BotbLib\Tmail\Emessage($config['fmail'],$config['nfmail']);
                $message->to($msg['from']);
                $message->subject = "Ответ на " . imap_utf8($msg['subject']);
                if(!$reply[2]){
                    $message->addData('attachment.png',$reply[1],'image/png');
                }
                $message->send();
            }else {
                $nmsg = array();
                $nmsg['to'] = $msg['from'];
                $nmsg['title'] = "Ответ на " . imap_utf8($msg['subject']);
                $nmsg['message'] = $reply;
                \Botb\Basic::sendmail($nmsg);
            }
            $mailbox->deleteMessage($k);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    $mailbox->expunge();
}
$ids=array();