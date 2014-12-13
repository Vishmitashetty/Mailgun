
<?php
require_once 'init.php';

if (isset($_POST['name'], $_POST['email'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];

	$validate = $mailgunValidate->get('address/validate', [
 		'address' => $email
		])->http_response_body;

	if ($validate->is_valid) {
		 $hash = $mailgunOptIn->generateHash(MAILGUN_LIST, MAILGUN_SECRET, $email);

		 $mailgun->sendMessage(MAILGUN_DOMAIN, [
		 	'from'		=> 'noreply@vish.org',
		 	'to'		=> $email,
		 	'subject'	=> 'Please confirm your subscription',
		 	'html'		=> "
		 	Hello {$name},<br><br>
		 	You Signed in our mailing list.Please confirm below <br><br>
		 	http://localhost/mailinglist/confirm.php?hash={$hash}
		 	"
		 	]);
		 $mailgun->post('lists/' . MAILGUN_LIST . '/members', [
		 	'name'			=>$name,
		 	'address'		=>$email,
		 	'subscribed'	=>'no'

		 	]);
		 header('Location: ./');
   }
}

?>
<!doctype html>
<html>
 <head>
 	<meta charset="utf-8">
 	<title>Subscribe| Mailing List</title>
 	<link rel="stylesheet" href="css/global.css">
 </head>
<body>

	 <div class="container">
	 	<form action="subscribe.php" method="post">
	 		 <div class="feild">
	 		 	<label>
	 		 		Name <br>
	 		 		<input type="text" name="subject" autocomplete="off">
	 		 	</label>
	 		 </div>
	 		 <br><br>
	 		 <div class="feild">
	 		 	<label>
	 		 		Email <br>
	 		 		<input type="text" name="email" autocomplete="off">
	 		 	</label>
	 		 </div>
	 		 <br><br>
	 		 <input type="submit" value="Subscribe" class="button">
	 		</form>
	 	</div>
	</body>
</html>