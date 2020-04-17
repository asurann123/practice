<?php
if ('POST' == $_SERVER['REQUEST_METHOD']) {
	$sweets = $_POST['sweet'];
	print 'あなたの選択した麺は、' . $_POST['noodle'] . 'です<br>';
	foreach ($sweets as $sweet) {
		print '選択されたスイーツは、' . $sweet . 'が、' . $_POST['sweet_q'] . '個です。<br>';
	}
}else{
	$link = $_SERVER['PHP_SELF'];
	print<<<_HTML_
<form method="post" action="$link">
Braised Noodles with: <select name="noodle">
<option>crab meat</option>
<option>mushroom</option>
<option>barbecued pork</option>
<option>shredded ginger and green onion</option>
</select>
<br>
Sweet:<select name="sweet[]" multiple>
<option value="puff"> Sesame Seed Puff
<option value="square">Coconut Milk Gelatin square
<option value="cake">Brown Sugar Cake
<option value="ricemeat">Sweet Rice and meat
</select>
<br>
Sweet Quantity: <input type="text" name="sweet_q">
<br>
<input type="submit" name="submit" value="Order">
</form>
_HTML_;

}
?>