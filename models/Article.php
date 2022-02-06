<?php

class ArticleException extends Exception
{
}

class Article
{
  private $_id;
  private $_name;
  private $_weight;
  private $_width;
  private $_height;
  private $_depth;
  private $_article_id;

  function __construct($id, $name, $weight, $width, $height, $depth, $article_id)
  {
    // We could (and should) run validations on the fields
    $this->_setArticleId($id);
    $this->_name = $name;
    $this->_width = $width;
    $this->_height = $height;
    $this->_depth = $depth;
    $this->_weight = $weight;
    $this->_article_id = $article_id;
  }

  public function getId()
  {
    return $this->_id;
  }

  public function getName()
  {
    return $this->_name;
  }

  public function getArticleId()
  {
    return $this->_article_id;
  }

  public function getWeight()
  {
    return $this->_weight;
  }

  public function getWidth()
  {
    return $this->_width;
  }

  public function getHeight()
  {
    return $this->_height;
  }

  public function getDepth()
  {
    return $this->_depth;
  }

  private function _setArticleId($id)
  {
    if (($id !== null) && (!is_numeric($id) || $id <= 0)) {
      throw new ArticleException("Article id exception");
    }
    $this->_id = $id;
  }

  public function asArray()
  {
    $article = array();
    $article['id'] = $this->getId();
    $article['name'] = $this->getName();
    $article['weight'] = $this->getWeight();
    $article['width'] = $this->getWidth();
    $article['depth'] = $this->getDepth();
    $article['height'] = $this->getHeight();
    $article['article_id'] = $this->getArticleId();
    return $article;
  }
}
