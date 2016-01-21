<?php

function verificationConnexion($pseudo,$password)
{
	$fichier = fopen('db_user.txt','r');
	do
	{
		$ligne = fgets($fichier);
		if(!feof($fichier))
			list($user, $pass, $email) = explode(" ",$ligne);
	}while(!feof($fichier) && ($user != $pseudo || $pass != $password));
	fclose($fichier);
	return($user == $pseudo && $pass == $password);
}

?>
