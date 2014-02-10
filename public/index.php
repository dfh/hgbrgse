<?php

/**
 * hgbrg.se
 */

require 'lib/functions.php';

$debug = @ $_GET['d'];

date_default_timezone_set('Europe/Stockholm');

define('EMAIL_TO', 'David Högberg <david@hgbrg.se>');
define('CAPTCHA_ANSWER', 'achilles');

$errors = array();

// contact form request?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$status = '201 Created';

	$name = @ $_POST['name'];
	$msg = @ $_POST['msg'];
	$q = @ $_POST['q'];
	$email = @ $_POST['email'];

	if (! $name) {
		$errors['name'] = 'Please enter your name.';
	}

	if (! $msg) {
		$errors['msg'] = 'Please enter a message.';
	}

	// CONTINUEHERE
	if (! $q) {
		$errors['q'] = 'Please answer the question.';
	} elseif (strtolower( $q ) == 'tortoise') {
		$errors['q'] = 'Must be a turbo-charged tortoise!';
	} elseif (strtolower( $q ) != CAPTCHA_ANSWER) {
		$errors['q'] = "Please answer either 'Achilles' or 'tortoise'.";
	}

	if (@ $_POST['email']) {
		if (! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
			$errors['email'] = 'The given e-mail address seems to be invalid.';
		}
	}

	if (! $errors) {
		$file = $_SERVER['PHP_SELF'];
		$time = date('c');
		$sender = $name;
		if ($email) {
			$sender .= " ($email)";
		}
		$message = sprintf("%s sent a message to you from http://hgbrg.se:
			
---

%s

---

I am %s, and date('c') is %s.",
			$sender, $msg, $file, date('c'));


		$res = mail(
			EMAIL_TO,
			sprintf('Message from %s', $name),
			$message
		);

		if (! $res) {
			$status = '500 Internal Server Error';
		}
	
	// there were errors
	} else {
		$status = '400 Bad Request';
	}
	header('HTTP/1.1 ' . $status);
}

require '_index.html.php';
