<?php

require_once 'init.php';
if(isset($_GET['hash']))
{
	$hash = $mailgunOptIn->validateHash(MAILGUN_SECRET, $_GET['hash']);

	if($hash)
	{
		$list = $hash['mailingList'];
		$email = $hash['recipient Address'];

		$mailgun->put('lists/' . MAILGUN_LIST . '/members/' . $email, [
			'subscribed' => 'yes'

			]);
		$mailgun->sendMessage(MAILGUN_DOMAIN, [
			'from'		=> 'noreply@vishmita.com',
			'to'		=> $email,
			'subject'	=> 'You ave just subscribed',
			'text'		=> 'Thanks for confirming, you are now subscribed.'

			]);
		header('Location: ./');
	}
}

?>