<?php

use GuzzleHttp\Exception\RequestException;

require_once('./Route.php');
require_once('./vendor/autoload.php');
require_once('./responses.php');
require_once('./services/ArticleService.php');




Route::add('/', function () {
  include 'pages/home.php';
});


// get article
Route::add('/article', function () {
  $articleId = $_GET['article_id'];
  if (!is_numeric($articleId)) {
    return badParamsResponse("article id needs to be a number");
  }
  if (strlen($articleId) < 5) {
    return badParamsResponse("article id needs to be atleast 5 characters long");
  }
  if (strlen($articleId) > 7) {
    return badParamsResponse("article id cannot be longer than 7 characters");
  }
  try {
    $articleService = new ArticleService();
    $boxes = $articleService->getBoxesThatArticleFitsInside($articleId);
    return okResponse($boxes, true);
  } catch (RequestException $e) {
    // I should check more exceptions here
    resourceNotFoundResponse();
  }
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
