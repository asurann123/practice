<?php
<<<<<<< HEAD
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
=======
<<<<<<< HEAD
>>>>>>> develop

?>
=======
class Data {
    static function getMenu() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=learn','hogehoge','hogehoge');
            $sql = "SELECT
                           item,
                           price
                        FROM
                           menu";

            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print 'Could not connect:' . $e->getMessage();
        }
    }

    static function getSource() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=learn','hogehoge','hogehoge');
            $sql = "SELECT
                           taste,
                           price
                        FROM
                           source";

            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print 'Could not connect:' . $e->getMessage();
        }
    }
}

$sources = Data::getSource();
$menu = Data::getMenu();

/* foreach ($sources as $source) {
    print $source['taste'] . "<br>";
} */


$html = <<<_HTML_
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
<?php
Sweet Quantity: <input type="text" name="sweet_q">
<br>
_HTML_;

print $html;

/* if ('POST' == $_SERVER['REQUEST_METHOD']) {
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
?> */
>>>>>>> add_error_message
