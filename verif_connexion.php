<?php
if(!isset($_SESSION))
{
session_start();
}

function checkParam($a)
{
	return (isset($a) && !empty($a));
}



