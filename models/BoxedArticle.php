<?php

class BoxedArticle
{
  private $_article;
  private $_box;

  function __construct($article, $box)
  {
    $this->_article = $article;
    $this->_box = $box;
  }

  function asArray()
  {
    $array = array();
    $array['box'] = $this->_box->asArray();
    $array['article'] = $this->_article->asArray();
    return $array;
  }
}
