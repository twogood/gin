<?php


// load Tonic
require_once '../vendor/autoload.php';

$config = array(
  'load' => array('../src/Gin/*.php'), // load resources
  'mount' => array('Gin' => '/gin'), // mount in resources at URL
);

$app = new Tonic\Application($config);

#echo $app; die;

$request = new Tonic\Request();

#echo $request; die;

try {

    $resource = $app->getResource($request);

    #echo $resource; die;

    $response = $resource->exec();

} catch (Tonic\NotFoundException $e) {
    $response = new Tonic\Response(404, $e->getMessage());

} catch (Tonic\UnauthorizedException $e) {
    $response = new Tonic\Response(401, $e->getMessage());
    $response->wwwAuthenticate = 'Basic realm="My Realm"';

} catch (Tonic\Exception $e) {
    $response = new Tonic\Response($e->getCode(), $e->getMessage());
}

#echo $response;

$response->output();
