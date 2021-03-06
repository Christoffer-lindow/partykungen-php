<?php

class Response
{

  private $_success;
  private $_httpStatusCode;
  private $_messages = array();
  private $_data;
  private $_toCache = false;
  private $_responseData = array();

  function __construct($httpStatusCode, $success, $data)
  {
    $this->_httpStatusCode = $httpStatusCode;
    $this->_success = $success;
    $this->_data = $data;
  }


  public function setSuccess($success)
  {
    $this->_success = $success;
  }

  public function setHttpStatusCode($httpStatusCode)
  {
    $this->_httpStatusCode = $httpStatusCode;
  }

  public function addMessage($message)
  {
    $this->_messages[] = $message;
  }

  public function setData($data)
  {
    $this->_data = $data;
  }
  public function toCache($toCache)
  {
    $this->_toCache = $toCache;
  }

  private function setCacheHeaders()
  {
    if ($this->_toCache == true) {
      header('Cache-control: max-age=60');
    } else {
      header('Cache-control: no-cache, no-store');
    }
  }

  private function _handleErrorCase()
  {
    http_response_code(500);

    $this->_responseData['statusCode'] = 500;
    $this->_responseData['success'] = false;
    $this->addMessage("Response creation error");
    $this->_responseData['messages'] = $this->_messages;
  }

  private function _handleSuccessCase()
  {
    http_response_code($this->_httpStatusCode);
    $this->_responseData['statusCode'] = $this->_httpStatusCode;
    $this->_responseData['success'] = $this->_success;
    $this->_responseData['messages'] = $this->_messages;
    $this->_responseData['data'] = $this->_data;
  }

  public function send()
  {
    header('Content-type: application/json;charset=utf-8');
    $this->setCacheHeaders();

    if (($this->_success !== true && $this->_success !== false)
      || !is_numeric($this->_httpStatusCode)
    ) {
      $this->_handleErrorCase();
    } else {
      $this->_handleSuccessCase();
    }
    echo json_encode($this->_responseData);
  }
}
