<?php
if(!isset($_SESSION))
{
session_start();
}

include 'function_connexion.php';

function checkParam($a)
{
	return (isset($a) && !empty($a));
}
?>
<html>
	<head>
		<meta charset="utf_8"/>
		<title>
			Connexion
		</title>
	</head>
	<body>
<?php
if (!checkParam($_POST['pseudo']) || !checkParam($_POST['password']))
{
	header('location:index.php');
}
else
{
	
	$fichier = fopen('db_user.txt','r');
	if( verificationConnexion($fichier,$_POST['pseudo'],$_POST['password']) )
	{
		echo "Tu as bien été identifié";
	}
	else
	{
		echo "Mauvaise connexion";
	}	
	
	fclose($fichier);


}
?>
	</body>
</html>
