<?php

include 'function_task.php';


/*Identification function 	*/
/*Input : 2 string 			*/
/*Output : bool 			*/
function verificationConnexion($pseudo,$password)
{
	$pass = 1;
	$secret = 2;
	$ligne = searchuser($pseudo);
	if($ligne)
	{
		list($admin,$user,$secret) = explode(';:!:;',$ligne);
		$pass = hash("sha256",$pseudo.";:!:;".$password);
	}
	return (strcmp($pass."\n",$secret) == 0);
}


/* add newuser in database 	*/
/* Input: 2 String 			*/
function newuser($login,$pass)
{
	$fichier = fopen('db_user.txt','a+');
	$log = hash("sha256",$login.";:!:;".$pass);
	fputs($fichier,"0;:!:;".$login.";:!:;".$log."\n");
	fclose($fichier);
}


/* find all connection information with login 	*/
/* Input : string 								*/
/* Output : string 								*/
function searchuser($login)
{
	$fichier = fopen('db_user.txt','r');
	if($fichier)
	{
		do
		{
			$ligne = fgets($fichier);
			if(!feof($fichier))
				$arraylog= explode(';:!:;',$ligne);
		}while(!feof($fichier) && ($arraylog[1] != $login));
		fclose($fichier);
	}
	if(isset($arraylog)&&$arraylog[1] == $login)
	{
		$ligne = implode(';:!:;',$arraylog);
	}
	else
		$ligne=0;
	return $ligne;
}


/* Check if user exist 	*/
/* Input : string 		*/
/* Output : bool 		*/
function registerationcheck($login)
{
	if(searchuser($login))
		$res = false;
	else
		$res = true;
	return $res;
}

/* Check user status 	*/
/* Input : string 		*/
/* Output : Bool 		*/
function isAdmin($login)
{
	$ligne = searchuser($login);
	list($code,$rest) = explode (";:!:;",$ligne);
	return $code;
}

/* Check the length of user input 	*/
/* Input : string 					*/
/* Output : Bool 					*/
function logcheck($a)
{
	return(strlen($a) >= 4);
}

?>
