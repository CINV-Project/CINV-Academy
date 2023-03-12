<?php

use AdvancedJsonRpc\Dispatcher;
use Cinv\Api\Server;

$request = file_get_contents('php://input');
if ($request) {
  $dispatcher = new Dispatcher(new Server(), '/');
  echo $dispatcher->dispatch($request);
}