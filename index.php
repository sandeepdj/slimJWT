<?php
require 'vendor/autoload.php';


// Set the current mode
$app = new \Slim\Slim(array(
    'mode' => 'production',
    'debug' => true,
    
));
$app->response->headers->set('Content-Type', 'application/json');

// Only invoked if mode is "production"
$app->configureMode('production', function () use ($app) {
    $app->config(array(
        'log.enable' => true,
        'debug' => false
    ));
});

// Only invoked if mode is "development"
$app->configureMode('development', function () use ($app) {
    $app->config(array(
        'log.enable' => false,
        'debug' => true
    ));
});

$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

$app->get('/books/:id', function ($id) {
    echo "Hello, $id";
    
});
$aBitOfInfo = function (\Slim\Route $route) {
    echo "Current route is " . $route->getName();
};

$app->get('/foo', $aBitOfInfo, function () {
    echo "foo";
});


$app->post('/books', function () use ($app) {
    $body = $app->request->getBody();
     
    
   //  $data = json_decode($body, true);
    print_r($body);
});

// API group
$app->group('/api', function () use ($app) {
    
        // Library group
        $app->group('/library', function () use ($app) {
    
            // Get book with ID
            $app->get('/books/:id', function ($id) {
    
            });
    
            // Update book with ID
            $app->put('/books/:id', function ($id) {
    
            });
    
            // Delete book with ID
            $app->delete('/books/:id', function ($id) {
    
            });
    
        });
    
    });


$app->run();
?>
