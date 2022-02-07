<?php

use GuzzleHttp\Exception\RequestException;

require_once('./vendor/autoload.php');
require_once('./responses.php');
require_once('./services/ArticleService.php');


class ArticleController
{

  private $_articleService;

  function __construct()
  {
    $this->_articleService = new ArticleService();
  }

  public function articleFitsInBox()
  {
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
      $this->_articleService = new ArticleService();
      $boxes = $this->_articleService->getBoxesThatArticleFitsInside($articleId);
      return okResponse($boxes, true);
    } catch (RequestException $e) {
      // I should check more exceptions here
      resourceNotFoundResponse();
    }
  }
}
