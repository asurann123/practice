<?php
try {
	$db = new PDO('mysql:host=localhost;dbname=restaurant','penguin','top^hat');
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	//Eggplant with Chili Sauceは辛い
	//影響を受ける行数に関心がなければ
	//exec()の返り値を保持する必要はない
	$db->exec("UPDATE dishes SET is_spicy = 1
                      WHERE dish_name = 'Eggplant with Chili Sauce'");
	//Lobster with Chili Sauce は辛くて高い
	$db->exec("UPDATE dishes SET is_spicy = 1,price=price * 2
                       WHERE dish_name = 'Lobster with Chili Sauce' ");
} catch (PDOException $e) {
	print "Could not connect" . $e->getMessage();
}

?>