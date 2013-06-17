<?php error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

require_once 'mysql.php';

if (isset($_POST['name'], $_POST['text']))
{
	if (!empty($_POST['name']) && !empty($_POST['text']))
	{
		$qAddMessage = "INSERT INTO `messages`
			SET `name` = '". mysql_real_escape_string($_POST['name']) . "',
				`text` = '". mysql_real_escape_string($_POST['text']) . "',
				`posted_at` = NOW()";
		
		mysql_query($qAddMessage) or die(mysql_error());
	}
}