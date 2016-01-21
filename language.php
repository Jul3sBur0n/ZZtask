<?php 
//wich language import ?
if(isset($_GET['lang'])){									// if the language has just been changed
	$lang = $_GET['lang']; 
  
	setcookie('lang', $lang, time() + (3600 * 24 * 30)); 	// set the cookie
	
} 
else if(isset($_COOKIE['lang'])){							// or if there's already a cookie 
	$lang = $_COOKIE['lang'];
}
else if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){			// or if the browser gives a default language 
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
}
else {														// french by default
	$lang = 'fr';
}
 
 
 
/* Set the languages menu and the language file to include */
 
switch ($lang) {											 
  case 'en':
  $lang_file = "./languages/".$file.'_en.php';
  $TXT_CURRENT_LANGUAGE = "English";
  $TXT_LANGUAGE1_LIEN = "fr";
  break;

  case 'fr':
  default:
  $lang_file = "./languages/".$file.'_fr.php';
  $TXT_CURRENT_LANGUAGE = "Français";
  $TXT_LANGUAGE1 = "English";
  $TXT_LANGUAGE1_LIEN = "en";
  break;
 
}
?>
