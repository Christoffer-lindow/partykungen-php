<?php


require_once './vendor/autoload.php';

use GuzzleHttp\Client;

class ApiClient
{

  private $_client;

  function __construct()
  {
    $this->_client = new Client(['base_uri' => 'https://partykungen.se']);
  }

  public function getArticle($articleId)
  {
    $response = $this->_client->request('get', "/{$articleId}.json");
    return $response;
  }
}
