<?php

session_start();

$new_language = $_GET["lan"];

$_SESSION["langage"] = $new_language;

?>