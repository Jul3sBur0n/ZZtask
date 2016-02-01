<?php
if(!isset($_SESSION))
{
session_start();
$_SESSION['connexion'] = 0;
$_SESSION['login'] = "";
$_SESSION['error'] = 0;
$_SESSION['admin'] =0;
$_SESSION['lang'] ="en";
}
?>
