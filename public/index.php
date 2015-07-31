<?php

require __DIR__ . '/functions.php';

date_default_timezone_set('Europe/Stockholm');

define('EMAIL_TO', 'David Högberg <david@hgbrg.se>');
define('CAPTCHA_ANSWER', 'achilles');
define('ERR_NAME_MISSING', 1);
define('ERR_MSG_MISSING', 2);
define('ERR_CAPTCHA_MISSING', 4);
define('ERR_CAPTCHA_WRONG_ANSWER', 8);
define('ERR_CAPTCHA_INVALID_ANSWER', 16);
define('ERR_EMAIL_INVALID', 32);

$errors = 0;

// contact form request?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$status = '201 Created';

	$name = @ $_POST['name'];
	$msg = @ $_POST['msg'];
	$q = @ $_POST['q'];
	$email = @ $_POST['email'];

	if (! $name) {
		$errors |= ERR_NAME_MISSING;
	}

	if (! $msg) {
		$errors |= ERR_MSG_MISSING;
	}

	// CONTINUEHERE
	if (! $q) {
		$errors |= ERR_CAPTCHA_MISSING;
	} elseif (strtolower($q) == 'tortoise') {
		$errors |= ERR_CAPTCHA_WRONG_ANSWER;
	} elseif (strtolower($q) != CAPTCHA_ANSWER) {
		$errors |= ERR_CAPTCHA_INVALID_ANSWER;
	}

	if (@ $_POST['email']) {
		if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors |= ERR_EMAIL_INVALID;
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
