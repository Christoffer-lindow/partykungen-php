<?php


require_once('./Route.php');
require_once('./controllers/ArticleController.php');


Route::add('/', function () {
  include 'pages/home.php';
});

Route::add('/article', function () {
  // I want the controller to be scoped to a resource not a route
  // I would fix this if there were more routes 
  $articleController = new ArticleController();
  $articleController->articleFitsInBox();
}, 'get');

Route::run('/');
