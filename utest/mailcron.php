<?php
/**
 * Created by PhpStorm.
 * User: skarp
 * Date: 27.02.2018
 * Time: 18:26
 */
error_reporting(E_ALL);
set_time_limit(0);
include_once(__DIR__."/../etc/init.php");

function print_data($data){
    if(is_array($data)){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }else{
        echo $data."\n";
    }
    echo "-------------------------------\n";
}
//if(php_sapi_name()!="cli") {
    define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT']);
//}else{
//    define('DOC_ROOT', "/var/web/ex/www");
//}
/*
$message="По каким проектам Кустовые площадки крупного проекта Высота наступают ключевые вехи через три дня";
$message1="Прогресс МСГ по проекту Высота";
$message2="Какие крупные проекты завершаются через неделю";
$message3="Как дела?";
$message4="Мне нужны комментарии";
define("INTENTPLS", __DIR__ . "/../modules/intents/langs");
define("INTENTOBJ",__DIR__ . "/../modules/intents/intentObjects");
$intent = new \BotbLib\Languniq\IntentHandler($message1,"ru-ru",INTENTPLS,INTENTOBJ);
echo "*******RESPONSE******<br/>";
print_data($intent->response());
echo "<br/>";
*/
//phpinfo();
//exit();
use modules\reports\Msgreports;

use \jamesiarmes\PhpEws\Client;
use \jamesiarmes\PhpEws\Request\CreateItemType;

use \jamesiarmes\PhpEws\ArrayType\ArrayOfRecipientsType;
use \jamesiarmes\PhpEws\ArrayType\NonEmptyArrayOfAllItemsType;
use \jamesiarmes\PhpEws\ArrayType\NonEmptyArrayOfAttachmentsType;

use \jamesiarmes\PhpEws\Enumeration\BodyTypeType;
use \jamesiarmes\PhpEws\Enumeration\MessageDispositionType;
use \jamesiarmes\PhpEws\Enumeration\ResponseClassType;

use \jamesiarmes\PhpEws\Type\BodyType;
use \jamesiarmes\PhpEws\Type\EmailAddressType;
use \jamesiarmes\PhpEws\Type\FileAttachmentType;
use \jamesiarmes\PhpEws\Type\MessageType;
use \jamesiarmes\PhpEws\Type\SingleRecipientType;


$repo=new Msgreports();
$rdate="2018-04-10";
$projId=1;
$fname=md5($rdate.$projId);
$cachePath=__DIR__."/../cashe/".$fname;
$cacheEnable=false;

if(file_exists($cachePath) && $cacheEnable){
    $res=file_get_contents($cachePath);
}else{
    $res=$repo->makeReport($rdate,$projId);
    file_put_contents($cachePath,$res);
}

$recipient_email = 'sg.ceom@gmail.com';
$recpient_name = 'Sergei Karp';

// Set connection information.
$host = $config ['ews_server'];
$username = $config ['ews_login'];
$password = $config ['ews_pass'];
$version = Client::VERSION_2010_SP2;

$client = new Client($host, $username, $password, $version);

// Open file handlers.
$file = new SplFileObject($cachePath);
$finfo = finfo_open();
$filename = 'Отчет_МСГ_'.$rdate.'.html';

// Build the request.
$request = new CreateItemType();
$request->Items = new NonEmptyArrayOfAllItemsType();

// Save the message, but do not send it.
$request->MessageDisposition = MessageDispositionType::SEND_AND_SAVE_COPY;

// Create the message.
$message = new MessageType();
$message->Subject = 'Отчет МСГ от '.date('d.m.Y',strtotime($rdate));
$message->ToRecipients = new ArrayOfRecipientsType();
$message->Attachments = new NonEmptyArrayOfAttachmentsType();

// Set the sender.
$message->From = new SingleRecipientType();
$message->From->Mailbox = new EmailAddressType();
$message->From->Mailbox->EmailAddress = $username;

// Set the recipient.
$recipient = new EmailAddressType();
$recipient->Name = $recpient_name;
$recipient->EmailAddress = $recipient_email;
$message->ToRecipients->Mailbox[] = $recipient;

// Set the message body.
$message->Body = new BodyType();
$message->Body->BodyType = BodyTypeType::HTML;
$message->Body->_ = <<<BODY
<html>
  <head></head>
  <body>
    <p>This is the report MSG</p>
  </body>
</html>
BODY;

// Build the file attachment.
$attachment = new FileAttachmentType();
$attachment->IsInline = true;
$attachment->Content = $file->openFile()->fread($file->getSize());
$attachment->Name = $filename;
$attachment->IsInline = true;
$attachment->ContentType = finfo_file($finfo, $cachePath);
$attachment->ContentId = $filename;
$message->Attachments->FileAttachment[] = $attachment;

// Add the message to the request.
$request->Items->Message[] = $message;

$response = $client->CreateItem($request);

// Iterate over the results, printing any error messages.
$response_messages = $response->ResponseMessages->CreateItemResponseMessage;
foreach ($response_messages as $response_message) {
    // Make sure the request succeeded.
    if ($response_message->ResponseClass != ResponseClassType::SUCCESS) {
        $code = $response_message->ResponseCode;
        $message = $response_message->MessageText;
        echo "Message failed to create with \"$code: $message\"\n";
        continue;
    }

    echo "Message sent successfully.\n";
}