<?php
function get_submitted_value($errors, $val) {
	if ($errors) {
		return $val;
	}
}
function get_error_msg($errors, $key) {
	if (@ $errors[$key]) {
		return sprintf('<span class="error">%s</span>', $errors[$key]);
	}
}
function get_error_class($errors, $key) {
	if (@ $errors[$key]) {
		return 'class="error"';
	}
}
?>
<form action="/" method="post" enctype="multipart/form-data">
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
		<label for="name">Your name</label>
		<?= get_error_msg($errors, 'name') ?>
		<input type="text" name="name" id="name" value="<?= get_submitted_value($errors, $name) ?>" <?= get_error_class($errors, 'name') ?>/>
	</p>
	<p>
		<label for="email">Your e-mail address (optional)</label>
		<?= get_error_msg($errors, 'email') ?>
		<input type="text" name="email" id="email" value="<?= get_submitted_value($errors, $email) ?>" <?= get_error_class($errors, 'email') ?>/>
	</p>
	<p>
		<label for="msg">Your message</label>
		<?= get_error_msg($errors, 'msg') ?>
		<textarea name="msg" id="msg" rows="10" cols="30" <?= get_error_class($errors, 'msg') ?>><?= get_submitted_value($errors, $msg) ?></textarea>
	</p>
	<p>
		<label for="q">Which one is really the fastest: <em>Achilles</em> or the <em>tortoise</em>?</label>
		<?= get_error_msg($errors, 'q') ?>
		<input type="text" name="q" value="<?= get_submitted_value($errors, $q) ?>" id="q" <?= get_error_class($errors, 'q') ?>/>
		<span class="help">Needed to prove you're human.</span>
	</p>
	<p class="submit">
		<input type="submit" name="submit" value="Send message" />
	</p>
</form>
