<!DOCTYPE html>
<?php
include 'sessionstarter.php';
include 'function_connexion.php'
?>

<html>
<head> <title> Bijour </title> </head>
<body>

<?php


if (!checkParam($_POST['pseudo']) || !checkParam($_POST['password']) || !checkParam($_POST['confpass'])) //Oublie d'un champ
{
	$_SESSION['error'] = 10;
	header('location: registeration.php');
}
elseif(strpbrk($_POST['pseudo'],";:!:;") || strpbrk($_POST['password'],";:!:; "))
{
	$_SESSION['error'] = 40;
	header('location: registeration.php');
}
elseif($_POST['confpass']!=$_POST['password'])
{

}

elseif(!logcheck($_POST['password']) || !logcheck($_POST['pseudo']))
{
	$_SESSION['error'] = 50;
	header('location: registeration.php');	
}

else
{
	if(registerationcheck($_POST['pseudo']))
	{
		newuser($_POST['pseudo'],$_POST['password']);
		$_SESSION['login'] = $_POST['pseudo'];
		header('location: index.php');
	}
	else
	{
		$_SESSION['error'] = 30;
		header('location: registeration.php');
	}
}
?>
</body>
</html>
