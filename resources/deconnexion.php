<?php
// la destruction des variables de sessions
session_unset();
// la destruction de la session elle même
session_destroy(); //destruction de toutes les donnée dans la session

$_SERVER['REQUEST_URI'] = "/glg3/";
// var_dump($_SERVER['REQUEST_URI']);
?>