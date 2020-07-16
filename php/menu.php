<?php
/* 表示に関するファイル */

//menuクラスを読み込み
require_once ('menu.class.php');

//メニューごとの合計
function itemTotal($item,$number){
	$item_total = $item * $number;
	return $item_total;
}

//合計金額を表示
function totalSum(...$numbers) {
	$sum_number = 0;
	foreach ($numbers as $number) {
		$sum_number += $number;
	}
	return $sum_number;
}

//インスタンス化
$curry = new Curry(850,'カレー');
$chicken_nanban_set = new ChickenNanban(1200,'チキン南蛮');
$fried_chicken_set = new FriedChicknSet(1000,'からあげ定食');

//レシート画面
if ('POST' == $_SERVER['REQUEST_METHOD']) {

	//からあげ定食のソースを設定
	$fried_chicken_set->setSource($_POST['source']);

	//メニューごとの合計
	$curry_total = itemTotal($curry->getPrice(),$_POST['カレー']);
	$chicken_nanban_total = itemTotal($chicken_nanban_set->getPrice(),$_POST['チキン南蛮']);
	//ソースを付けた時の合計
	$fried_chicken_total = itemTotal($fried_chicken_set->getPrice(),$_POST['からあげ定食']);
	if ($_POST['source'] > 0) {
		$source_total = $_POST['からあげ定食'] * $fried_chicken_set->getSource('price');
		$fried_chicken_total += $source_total;
	}

	//全部の合計
	$total_fee = totalSum($curry_total,$chicken_nanban_total,$fried_chicken_total);
	print "合計:" . $total_fee . "円<br>";

	//内訳を表示する
	print '内訳<br>';
	foreach ($_POST as $key => $value) {
		if ($key == 'source') {
			print $fried_chicken_set->getSource('name');
		}elseif ($value > 0) {
			print $key . "　" . $value . "つ<br>";
		}
	}

//メニュー画面
}else{
	$link = $_SERVER['PHP_SELF'];

	//メニューの表示
	print '<form method="post" action="' . $link . '"><h2>注文画面</h2>';
	$curry->displayMenu();
	$chicken_nanban_set->displayMenu();
	$fried_chicken_set->displayMenu();
		//からあげ定食用のソースを選択できるようにする
		print 'からあげ定食用ソース<select name="source" size="1">';
		print '<option value="0">なし</option>
				<option value="1">タルタルソース</option>
				<option value="2">チリソース</option>
				<option value="3">ブラックペッパーソース</option>';
		print '</select><br>';
	print '<input type="submit" name="submit" value="注文"></form>';
}
?>