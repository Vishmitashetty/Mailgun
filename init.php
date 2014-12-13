<?php
require_once 'vendor/autoload.php';

define('MAILGUN_KEY', 'key-07168006e90b308e084f8cc4e9b1e76b');
define('MAILGUN_PUBKEY','pubkey-09a3da6ca2948aaa8fb01cdf34676ae3');

define('MAILGUN_DOMAIN', 'savishmita@sandbox4ba8375af84d45aab8ee55769091c61d.mailgun.orgndbox4ba8375af84d45aab8ee55769091c61d.mailgun.org');
define('MAILING_LIST', '');
define('MAILGUN_SECRET', 'iloveme');

$mailgun = new Mailgun\Mailgun(MAILGUN_KEY);
$mailgunValidate = new Mailgun\Mailgun(MAILGUN_PUBKEY);

$mailgunOptIn = $mailgun->OptInHandler();
?>