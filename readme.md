#composer
when install phantomjs ask for bitbucket auth @@

just ignore it

    composer install -v vv --ignore-platform-reqs
#phantomjs
for windows, phantomjs named phantomjs.exe

> file not found error

> setPath for Engine

    $phantomJsPath = "/bin/phantomjs";
    if(DIRECTORY_SEPARATOR == "\\"){
        $phantomJsPath = __DIR__ . "/bin/phantomjs.exe";
    }
    $client->getEngine()->setPath($phantomJsPath);
    
   
  