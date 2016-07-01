<?php
namespace Redoc;
require_once __DIR__ . "/vendor/autoload.php";
use JonnyW\PhantomJs\Client;
$a = 10;
$b = ["proxy" => "remote debug"];
var_dump($b);
echo $a;
$client = Client::getInstance();
var_dump("client instance");


/**
 * @see JonnyW\PhantomJs\Http\PdfRequest
 **/
$request = $client->getMessageFactory()->createPdfRequest('https://github.com', 'GET');
chdir("abc");
$pdfFilePath = "document.pdf";
$request->setOutputFile($pdfFilePath);
$request->setFormat('A4');
$request->setOrientation('landscape');
$request->setMargin('1cm');
var_dump("set option");

/* test render image */
//$width = 800;
//$height = 600;
//$top = 0;
//$left = 0;
//$request->setOutputFile('file.jpg');
//$request->setViewportSize($width, $height);
//$request->setCaptureDimensions($width, $height, $top, $left);

/**
 * @see JonnyW\PhantomJs\Http\Response
 **/
$response = $client->getMessageFactory()->createResponse();

// Send the request
/* setPath to phantomjs, this deal with Windows error not found executable file*/
$phantomJsPath = "/bin/phantomjs";
if(DIRECTORY_SEPARATOR == "\\"){
    $phantomJsPath = "/bin/phantomjs.exe";
}
$client->getEngine()->setPath(__DIR__ . $phantomJsPath);

/* get request, build reponse to pdf */
$client->send($request, $response);
var_dump("send request > build response");