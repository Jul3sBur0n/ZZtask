<?php
if(!isset($_SESSION))
{
session_start();
}

function checkParam($a)
{
	return (isset($a) && !empty($a));
}

if (!checkParam($_POST['pseudo']) || !checkParam($_POST['password']))
{
	header('location:index.php');
}
else
{
	$fichier = fopen('db_user.txt','r');
	fseek($fichier,0);
	$ligne = "0";
	$ligne = fgets($fichier);
	echo " $ligne </br>";
	$ligne = fgets($fichier);
	echo " $ligne";
	fclose($fichier);


}
?>
