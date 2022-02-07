<?php

require_once('./vendor/autoload.php');
require_once('./models/AppBox.php');

use DVDoug\BoxPacker\ItemList;
use DVDoug\BoxPacker\PackedBox;
use DVDoug\BoxPacker\VolumePacker;

class AppPacker
{

  private $_box;
  private $_itemList;

  function __construct($box)
  {
    $this->_box = $box;
    $this->_itemList = new ItemList();
  }
  function addItem($item)
  {

    $this->_itemList->insert($item);
  }
  function pack(): PackedBox
  {
    $volumePacker = new VolumePacker($this->_box, $this->_itemList);
    return $volumePacker->pack();
  }
}
