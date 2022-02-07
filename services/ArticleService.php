<?php

require_once('./models/ApiClient.php');
require_once('./models/BoxedArticle.php');
require_once('./repo/BoxRepo.php');
class ArticleService
{

  private $_apiClient;
  private $_boxRepo;
  private $_articleFactory;
  private $_boxedArticleFactory;

  function __construct()
  {
    $this->_apiClient = new ApiClient();
    $this->_boxRepo = new BoxRepo();
    $this->_articleFactory = new ArticleFactory();
    $this->_boxedArticleFactory = new BoxedArticleFactory();
  }

  function getBoxesThatArticleFitsInside($articleId)
  {
    try {
      $response = $this->_apiClient->getArticle($articleId);
      $responseBody = json_decode($response->getBody());
      $variant = $responseBody->variant_first_buyable;
      $article = $this->_articleFactory->articleFromVariant($responseBody->id, $responseBody->name, $variant);
      $boxes = $this->_boxRepo->getBoxes();
      $returnArr = array();
      foreach ($boxes as &$box) {
        $packer = new AppPacker($box);
        $packer->addItem($article);
        $volumePacker = $packer->pack();
        $packedItems = $volumePacker->getitems();
        if ($packedItems->count() !== 0) {
          $boxedArticle = $this->_boxedArticleFactory->createBoxedArticle($article, $box);
          array_push($returnArr, $boxedArticle->asArray());
        }
      }
      return $returnArr;
    } catch (Exception $ex) {
      throw $ex;
    }
  }
}
