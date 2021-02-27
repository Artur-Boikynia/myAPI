<?php

echo 'lol';






























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



