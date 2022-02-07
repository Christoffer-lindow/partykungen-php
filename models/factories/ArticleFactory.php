<?php

class ArticleFactory
{

  public function articleFromVariant($id, $name, $variant)
  {
    new Article($id, $name, $variant->weight, $variant->height, $variant->depth, $variant->width, true);
  }
}
