<?php

use GuzzleHttp\Exception\RequestException;

require_once('./Route.php');
require_once('./models/Response.php');
require_once('./models/ApiClient.php');
require_once('./vendor/autoload.php');
require_once('./responses.php');
require_once('./models/AppPacker.php');




Route::add('/', function () {
  include 'pages/home.php';
});


// get article
Route::add('/article', function () {
  $articleId = $_GET['article_id'];
  $client = new ApiClient();
  $packer = new AppPacker();
  try {
    $response = $client->getArticle($articleId);
    return okResponse(json_decode($response->getBody()), true);
  } catch (RequestException $e) {
    $notFound = new Response($e->getResponse()->getStatusCode(), false, json_decode($e->getResponse()->getBody()));
    return $notFound->send();
  }

  // return here

}, 'get');

// Post route example
Route::add('/article', function () {
  // Something here
}, 'post');

// Accept only numbers as parameter example. 
Route::add('/foo/([0-9]*)/bar', function ($var1) {
  echo $var1 . ' is a great number!';
});

Route::run('/');
