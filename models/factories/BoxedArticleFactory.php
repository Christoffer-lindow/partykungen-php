<?php

require_once('./models/BoxedArticle.php');
class BoxedArticleFactory
{

  public function createBoxedArticle($article, $box)
  {
    $boxedArticle = new BoxedArticle($article, $box);
    return $boxedArticle;
  }
}
