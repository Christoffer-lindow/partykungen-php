<?php

require_once('./vendor/autoload.php');

use DVDoug\BoxPacker\Box;

class AppBox implements Box
{
  private $_maxWeight;
  private $_width;
  private $_length;
  private $_depth;
  private $_name;

  function __construct($maxWeight, $length, $width, $depth, $name)
  {
    // Validation could be done here by setter methods
    $this->_maxWeight = $maxWeight;
    $this->_length = $length;
    $this->_width = $width;
    $this->_depth = $depth;
    $this->_name = $name;
  }
  function getEmptyWeight(): int
  {
    return 0;
  }
  function getMaxWeight(): int
  {
    return $this->_maxWeight;
  }
  function getReference(): string
  {
    return $this->_name;
  }
  function getOuterDepth(): int
  {
    return $this->_depth;
  }
  function getInnerDepth(): int
  {
    return $this->_depth;
  }
  function getOuterLength(): int
  {
    return $this->_length;
  }
  function getInnerLength(): int
  {
    return $this->_length;
  }
  function getOuterWidth(): int
  {
    return $this->_width;
  }
  function getInnerWidth(): int
  {
    return $this->_width;
  }
  public function asArray()
  {
    $appBox = array();
    $appBox['name'] = $this->getReference();
    $appBox['weight'] = $this->getMaxWeight();
    $appBox['width'] = $this->getInnerWidth();
    $appBox['depth'] = $this->getInnerDepth();
    $appBox['length'] = $this->getInnerLength();
    return $appBox;
  }
}
