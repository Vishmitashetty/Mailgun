<?php

require_once 'init.php';

if(isset($_POST['subject'], $_POST['body']))
{
	$subject = $_POST['subject'];
	$body = $_POST['body'];
	$mailgun->sendMessage(MAILGUN_DOMAIN, [
		'from'		=> 'noreply@vishmita.com',
		'to'		=> MAILING_LIST,
		'subject'	=> $subject,
		'html'		=> "{$body}<br><br><a href=\"%unsubscribe_url%\">Unsubscribed</a>"

		]);
	header('Location: ./');
}

?>
<!doctype html>
<html>
 <head>
 	<meta charset="utf-8">
 	<title>Send| Mailing List</title>
 	<link rel="stylesheet" href="css/global.css">
</html>
<body>
	 <div class="container">
	 	<form action="send.php" method="post">
	 		 <div class="feild">
	 		 	<label>
	 		 		Subject
	 		 		<input type="text" name="subject" autocomplete="off">
	 		 	</label>
	 		 </div>
	 		 <br><br>
	 		 <div class="feild">
	 		 	<label>
	 		 		&nbsp;&nbsp;&nbsp;&nbsp;
	 		 		Body
	 		 		<textarea name="body" rows="8"></textarea>
	 		 	</label>
	 		 </div>
	 		 <br><br>
	 		 <input type="submit" value="Send" class="button">
	 		</form>
	 	</div>
	</body>
</html>

