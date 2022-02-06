<?php

class Box
{
  private $_id;
  private $_name;
  private $_width;
  private $_height;
  private $_depth;
  private $_weight;

  public function __construct($id, $name, $width, $height, $depth, $weight)
  {
    $this->setId($id);
    $this->setName($name);
    $this->setWidth($width);
    $this->setHeight($height);
    $this->setDepth($depth);
    $this->setWeight($weight);
  }

  public function setId($id)
  {
    $this->_id = $id;
  }
  public function setName($name)
  {
    $this->_name = $name;
  }
  public function setWeight($weight)
  {
    $this->_weight = $weight;
  }
  public function setDepth($depth)
  {
    $this->_depth = $depth;
  }
  public function setWidth($width)
  {
    $this->_width = $width;
  }
  public function setHeight($height)
  {
    $this->_height = $height;
  }

  public function asArray()
  {
    $box = array();
    $box['id'] = $this->_id;
    $box['name'] = $this->_name;
    $box['weight'] = $this->_weight;
    $box['width'] = $this->_width;
    $box['depth'] = $this->_depth;
    $box['height'] = $this->_height;
    return $box;
  }
}
