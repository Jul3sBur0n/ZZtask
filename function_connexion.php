<?php

function verificationConnexion($fichier,$pseudo,$password)
{
	do
	{
		$ligne = fgets($fichier);
		if(!feof($fichier))
			list($user, $pass, $email) = explode(" ",$ligne);
	}while(!feof($fichier) && ($user != $pseudo || $pass != $password));
	return($user == $pseudo && $pass == $password);
}

?>
