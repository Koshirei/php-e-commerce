<?php

use Languages\Languages;

session_start();

if (!isset($_SESSION["langage"])) $_SESSION["langage"] = "FR";

if (!isset($_SESSION["cart"])) $_SESSION["cart"] = [];

$langue = new Languages($_SESSION["langage"]);
$traductions = $langue->getLanguage();