<!DOCTYPE html>
<html>
	<head>
		<title>Chat (COMET Test)</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="js/cometClient.js"></script>
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
	</head>
<body>
	<div id="container">
		<div id="messages"></div>
		<fieldset>
			<legend>New Message</legend>
			<dl>
				<dt><label for="name">Username</label></dt>
				<dd><input type="text" name="name" id="name" value="" /></dd>
			</dl>
			<dl>
				<dt><label for="text">Message</label></dt>
				<dd><textarea name="text" id="text"></textarea></dd>
			</dl>
			<dl>
				<dt> </dt>
				<dd><input type="button" id="sendButton" value="Send" /></dd>
			</dl>
		</fieldset>
	</div>
</body>
</html>