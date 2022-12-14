<?php

namespace App\Controller;

use Framework\Response\Response;
use Services\mysql_PDO\getHistory;

class adminHistory
{
  public function __invoke()
  {
    require './init_session.php';

    if (!isset($_SESSION["user"])) header("Location: /");
    if ($_SESSION["user"]->getRole() !== "ADMIN") header("Location: /");

    $selectHistory = new getHistory();
    $history = $selectHistory->selectAllHistoryCommon();

    return new Response('history.html.twig', ['get' => $_POST, "language" => $traductions, "user"=>$_SESSION["user"], "history"=> $history, "adminMode" => true ] );
      
  }
}
