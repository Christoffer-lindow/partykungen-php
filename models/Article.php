<?php
require_once('./vendor/autoload.php');

use DVDoug\BoxPacker\Item;

class ArticleException extends Exception
{
}

class Article implements Item
{
  private $_id;
  private $_name;
  private $_weight;
  private $_width;
  private $_depth;
  private $_height;
  private $_length;
  private $_article_id;
  private $_keepFlat;

  function __construct($id, $name, $weight, $length, $height, $depth, $width, $article_id, $keepFlat)
  {
    // We could (and should) run validations on the fields
    $this->_setArticleId($id);
    $this->_name = $name;
    $this->_keepFlat = $keepFlat;
    $this->_length = $length;
    $this->_height = $height;
    $this->_depth = $depth;
    $this->_width = $width;
    $this->_weight = $weight;
    $this->_article_id = $article_id;
  }

  public function getDescription(): string
  {
    return $this->_name;
  }

  public function getKeepFlat(): bool
  {
    return $this->_keepFlat;
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

  public function getDepth(): int
  {
    return $this->_width;
  }
  public function getWeight(): int
  {
    return $this->_weight;
  }

  public function getWidth(): int
  {
    return $this->_width;
  }

  public function getHeight()
  {
    return $this->_height;
  }

  public function getLength(): int
  {
    return $this->_length;
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
