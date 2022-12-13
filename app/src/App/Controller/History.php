<?php

namespace App\Controller;

use Framework\Response\Response;
use Services\mysql_PDO\getHistory;

class History
{
  public function __invoke()
  {
    require './init_session.php';

    if (!isset($_SESSION["user"])) header("Location: /");

    $selectHistory = new getHistory();
    $history = $selectHistory->selectAllHistoryCommonByUserID($_SESSION["user"]->getId());

    return new Response('history.html.twig', ['get' => $_POST, "language" => $traductions, "user"=>$_SESSION["user"], "history"=> $history ] );
      
  }
}
