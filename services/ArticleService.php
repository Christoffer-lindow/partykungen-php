<?php

require_once('./models/ApiClient.php');
require_once('./models/BoxedArticle.php');
require_once('./repo/BoxRepo.php');
class ArticleService
{

  private $_apiClient;
  private $_boxRepo;

  function __construct()
  {
    $this->_apiClient = new ApiClient();
    $this->_boxRepo = new BoxRepo();
  }

  function getBoxesThatArticleFitsInside($articleId)
  {
    try {
      $response = $this->_apiClient->getArticle($articleId);
      $responseBody = json_decode($response->getBody());
      $variant = $responseBody->variant_first_buyable;
      $article = new Article($responseBody->id, $responseBody->name, $variant->weight, $variant->height, $variant->depth, $variant->width, true);
      $boxes = $this->_boxRepo->getBoxes();


      $returnArr = array();
      foreach ($boxes as &$box) {
        $packer = new AppPacker($box);
        $packer->addItem($article);
        $volumePacker = $packer->pack();
        $packedItems = $volumePacker->getitems();
        if ($packedItems->count() !== 0) {
          $boxedArticle = new BoxedArticle($article, $box);
          array_push($returnArr, $boxedArticle->asArray());
        }
      }
      return $returnArr;
    } catch (Exception $ex) {
    }
  }
}
