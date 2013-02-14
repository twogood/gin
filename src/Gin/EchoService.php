<?php

namespace Gin;

use Tonic\Resource;
use Tonic\Response;

/**
 *  @uri /echo/:message
 */
class EchoService extends Resource
{
  /**
   * @method GET
   * @throws \Tonic\Exception
   * @return \Tonic\Response
   */
  public function get($message)
  {
     return new Response(Response::OK, json_encode(array('message'=>$message)));
  }
}

