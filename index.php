<?php

header('Content-TYPE: application/json');

if(empty($_GET['api_key'])){
    echo 'Error!';exit();
}

$dbh = new PDO('mysql:host=db;dbname=artur_shop','artur_base','artur_pwd');

$sql ="SELECT * FROM `tabs` WHERE `api_key` = :api_key";
$stmt = $dbh->prepare($sql);
$stmt->execute(['api_key' => $_GET['api_key']]);

/*$stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
$pdoExec = $stmt->execute(['id' => $_GET['api_key']]);

$pdoExec = $stmt->execute();*/

$result = $stmt->fetchAll();

if($result){
    $result = [
      'id' => $result['id'],
      'login' => $result['name'],
      'money' => $result['name'],
    ];
    echo json_encode($result);
}
else{
    echo 'Error!'; exit();
}






























/*
<?php
use Stripe\Stripe;
use Slim\Http\Request;
use Slim\Http\Response;

require_once __DIR__ . '/vendor/autoload.php';

$app = new \Slim\App;

$app->add(function ($request, $response, $next) {
    \Stripe\Stripe::setApiKey('sk_test_51IK8ySC7TRGrENFZDscbCb8YvQvzrABQDmNHvjU14VRaIsRubEgLD1l6xbJN4LaPlShoSd7HUYGWakFRoEj4ZjWa00iCXoPuUo');

    return $next($request, $response);

});

$app->post('/checkout_session', function (Request $request, Response $response) {
    $params = json_decode($request->getBody());
    $payment_method_types = [
        'usd' => ['card','alipay'],
        'eur' => ['card','ideal', 'giropay'],
        'pln' => ['card'],
    ] ;
    $session = \Stripe\Checkout\Session::create([
        'success_url' => 'http://my.local/client/',
        'cancel_url' => 'http://my.local/client/',
        'mode' => 'payment',
        'payment_method_types' => $payment_method_types[$params->currency],
        'metadata' => [
            'cause' => $params->cause,
        ],
        'submit_type' => 'donate',
        'line_items' => [[
            'price_data' => [
                'currency' => $params->currency,
                'product_data' => [
                    'name' => 'qwert432y',
                ],
                'unit_amount' => $params->amount,
            ],
            'quantity' => 1,
        ]],
    ]);
    return $response->withJson([ 'id' => $session->id ])->withStatus(200);
});

$app->run();*/



