<?php


require_once './vendor/autoload.php';

use GuzzleHttp\Client;

// If the app would be bigger this might have been an ArticleClient
class ApiClient
{

  private $_client;

  function __construct()
  {
    // Base uri would be set in a .env file
    $this->_client = new Client(['base_uri' => 'https://partykungen.se']);
  }

  public function getArticle($articleId)
  {
    $response = $this->_client->request('get', "/{$articleId}.json");
    return $response;
  }
}
