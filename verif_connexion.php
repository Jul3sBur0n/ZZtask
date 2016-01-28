<?php
include 'sessionstarter.php';

include 'function_connexion.php';


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
	$_SESSION['error'] = 10;
	$_SESSION['connexion'] = 0;
	if(checkParam($_POST['pseudo']))
		$_SESSION['login'] = $_POST['pseudo'];
	header('location:index.php');
}
else
{
	if(verificationConnexion($_POST['pseudo'],$_POST['password']))
	{
		$_SESSION['connexion'] = 1;
		$_SESSION['admin'] = isAdmin($_POST['pseudo']);
		$_SESSION['login'] = $_POST['pseudo'];
		header('Location:tasklist.php');

	}
	else
	{
		$_SESSION['login'] = $_POST['pseudo'];
		$_SESSION['error'] = 20;
		$_SESSION['connexion'] = 0;
		header('Location:index.php');
	}
}
?>
	</body>
</html>
