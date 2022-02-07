<?php

require_once('./models/Article.php');

class ArticleFactory
{

  public function articleFromVariant($id, $name, $variant)
  {
    $article = new Article($id, $name, $variant->weight, $variant->height, $variant->depth, $variant->width, true);
    return $article;
  }
}
