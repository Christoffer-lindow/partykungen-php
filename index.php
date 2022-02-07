<?php


require_once('./Route.php');
require_once('./controllers/ArticleController.php');


Route::add('/', function () {
  include 'pages/home.php';
});

Route::add('/article', function () {
  $articleController = new ArticleController();
  $articleController->articleFitsInBox();
}, 'get');

Route::run('/');
