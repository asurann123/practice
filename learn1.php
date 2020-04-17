<?php
if ('POST' == $_SERVER['REQUEST_METHOD']) {
	if (validation_form()) {
		process_form();
	}else{
		show_form();
	}
}else{
	show_form();
}

function process_form() {
	print "Hello,  " . $_POST['my_name'];
}

function show_form() {
	$link = $_SERVER['PHP_SELF'];
	print <<<_HTML_
<form method="post" action="$link">
Your name: <input type="text" name="my_name">
<br>
<input type="submit" value="Say Hello">
</form>
_HTML_;
}

function validation_form() {
	if (strlen($_POST['my_name']) < 3) {
		return false;
	}else{
		return true;
	}
}

?>