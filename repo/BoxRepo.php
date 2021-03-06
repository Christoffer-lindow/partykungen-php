<?php
require_once('./repo/IBoxRepo.php');
require_once('./models/AppBox.php');
// This is a mock repo, this could be changed to a database or a file etc.
class BoxRepo implements IBoxRepo
{

  private $_boxList;

  function __construct()
  {
    $this->_boxList =  array(
      "0" => new AppBox(5000, 180, 120, 80, "XS"),
      "1" => new AppBox(20000, 600, 600, 600, "XL")
    );
  }
  function getBoxes()
  {
    return $this->_boxList;
  }
}
