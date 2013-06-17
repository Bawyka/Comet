<?php error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

require_once 'mysql.php';
require_once 'cometServer.php';

$server = new COMETServer();
$server->handleRequest();