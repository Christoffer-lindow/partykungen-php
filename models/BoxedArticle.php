<?php

class BoxedArticle
{
  private $_article;
  private $_box;

  // This class could have been:
  // BoxedArticle: {
  //    article: Article,
  //    boxes: AppBox[]  
  // }
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
