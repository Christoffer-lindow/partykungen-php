<?php
require_once('./vendor/autoload.php');

use DVDoug\BoxPacker\Packer;

class AppPacker
{

  private $_packer;

  function __construct()
  {
    $_packer = new Packer();
  }
}
