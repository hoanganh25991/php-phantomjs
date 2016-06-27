<?php
namespace Redoc;
require_once __DIR__ . "/vendor/autoload.php";
use JonnyW\PhantomJs\Client;

$client = Client::getInstance();

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

/**
 * @see JonnyW\PhantomJs\Http\Response
 **/
$response = $client->getMessageFactory()->createResponse();

// Send the request
/* setPath to phantomjs, this deal with Windows error not found executable file*/
$phantomJsPath = "/bin/phantomjs";
if(DIRECTORY_SEPARATOR == "\\"){
    $phantomJsPath = __DIR__ . "/bin/phantomjs.exe";
}
$client->getEngine()->setPath($phantomJsPath);
$client->send($request, $response);

echo "success";
die;