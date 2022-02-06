<?php
require_once('./models/Response.php');

function databaseConnectionErrorResponse()
{
  $response = new Response(500, false, null);
  $response->addMessage("Could not connect to db");
  $response->send();
}

function badParamsResponse($message)
{
  $response = new Response(400, false, null);
  $response->addMessage($message);
  $response->send();
}

function resourceNotFoundResponse()
{
  $response = new Response(404, true, null);
  $response->addMessage("Could not find article with id");
  $response->send();
}

function methodNotAllowedResponse()
{
  $response = new Response(405, false, null);
  $response->addMessage("Request method not allowed");
  $response->send();
}

function okResponse($returnData, $toCache)
{
  $response = new Response(200, true, $returnData);
  $response->toCache($toCache);
  $response->send();
}
