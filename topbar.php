<?php
$file = "topbar";
include("languages.php");
include($lang_file);
if (isset($_SESSION['login']) && isset($_SESSION['role'])){
	switch($_SESSION['role']){
		
		case 1:
			$aff = $TXT_ROLE_1;
			break;
		default:
		case 0:
			$aff = $TXT_ROLE_0;
			break;
}
?>
