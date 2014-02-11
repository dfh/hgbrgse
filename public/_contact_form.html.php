<?php
function is_err($mask = 0) {
	global $errors;
	if ($mask) {
		return $errors & $mask;
	} else {
		return !! $errors;
	}
}
function err_class($mask) {
	return is_err($mask) ? 'class="error"' : '';
}
function wrap_err($str) {
	return sprintf('<span class="error">%s</span>', $str);
}
function input_attrs($key, $val, $mask) {
	global $errors;
	return sprintf('name="%s" id="%s" %s class="%s"',
		$key, $key, $val ? (is_err() ? "value=\"$val\"" : '') : '',
		is_err($mask) ? 'error' : '');
}
?>
<form action="/#contact" method="post" enctype="multipart/form-data">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && ! $errors):
?>
	<p class="msg">
		Thank you. I'll get back to you as soon as I can.
	</p>
<?php
endif;
?>
	<p>
		<label for="name">
<?=
is_err(ERR_NAME_MISSING) ?
	wrap_err('Please enter your name:') :
	'Your name'
?>
		</label>
		<input type="text" <?= input_attrs('name', $name, ERR_NAME_MISSING) ?> />
	</p>
	<p>
		<label for="email">
<?=
is_err(ERR_EMAIL_INVALID) ?
	wrap_err('Please enter a valid e-mail address:') :
	'Your e-mail address (optional)'
?>
		</label>
		<input type="text" <?= input_attrs('email', $email, ERR_EMAIL_INVALID) ?> />
	</p>
	<p>
		<label for="msg">
<?=
is_err(ERR_MSG_MISSING) ?
	wrap_err('Please enter a message:') :
	'Your message'
?>
		</label>
		<textarea rows="10" cols="30" <?= input_attrs('msg', null, ERR_MSG_MISSING) ?>><?= is_err() ? $msg : '' ?></textarea>
	</p>
	<p>
		<label for="q">Which one is really the fastest: <em>Achilles</em> or the <em>tortoise</em>?</label>
<?php
if (is_err(ERR_CAPTCHA_MISSING))
	echo wrap_err('Please answer the question.');
elseif (is_err(ERR_CAPTCHA_WRONG_ANSWER))
	echo wrap_err('Must be a turbo-charged tortoise!');
elseif (is_err(ERR_CAPTCHA_INVALID_ANSWER))
	echo wrap_err('Please answer either <em>Achilles</em> or <em>tortoise</em>.');
?>
		<input type="text" <?= input_attrs('q', $q, ERR_CAPTCHA_MISSING | ERR_CAPTCHA_WRONG_ANSWER | ERR_CAPTCHA_INVALID_ANSWER) ?>/>
		<span class="help">Needed to prove you're human.</span>
	</p>
	<p class="submit">
		<input type="submit" name="submit" value="Send message" />
	</p>
</form>
