<?php

mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('chat') or die(mysql_error());
mysql_query("SET NAMES 'UTF8'") or die(mysql_error());