<?php
/* 表示に関するファイル */

//menuクラスを読み込み
require_once ('menu.class.php');

//メニューの表示に使う関数
function displayMenu($name,$price) {
	$sent_message ="・" . $name .'　' . $price . '円　' .'<input type="number" name="' . $name .'" value="0" min="0" max="10" step="1"><br>';;
	return $sent_message;
}

//レシートの合計金額を計算する関数
function itemTotal($item,$number,$source = null){
	if (is_null($source)) {
		$item_total = $item * $number;
	}else{
		$item_mluti = $item * $number;
		$item_total = $item_mluti + $number * 100;
	}

	return $item_total;
}

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

//フォーム作成（レシート画面）
if ('POST' == $_SERVER['REQUEST_METHOD']) {
	//からあげ定食のセット
	$fried_chicken_set->setSource($_POST['source']);

	//それぞれの合計
	$curry_total = itemTotal($curry->getPrice(),$_POST['カレー']);
	$chicken_nanban_total = itemTotal($chicken_nanban_set->getPrice(),$_POST['チキン南蛮']);
	$fried_chicken_total = itemTotal($fried_chicken_set->getPrice(),$_POST['からあげ定食'],$_POST['source']);

	//全部の合計
	$total_fee = totalSum($curry_total,$chicken_nanban_total,$fried_chicken_total);
	print "合計:" . $total_fee . "円<br>";

	//内訳を表示する
	print '内訳<br>';
	foreach ($_POST as $key => $value) {
		if ($value > 0) {
			if ($key == 'source') {
				print "→" . $fried_chicken_set->getSource('name');
			}else{
				print $key . "　" . $value . "個<br>";
			}
		}
	}

}else{
	$link = $_SERVER['PHP_SELF'];

	//メニューの表示
	print '<form method="post" action="' . $link . '"><h2>注文画面</h2>';
	print displayMenu($curry->getName(),$curry->getPrice());
	print displayMenu($chicken_nanban_set->getName(),$chicken_nanban_set->getPrice());
	print displayMenu($fried_chicken_set->getName(),$fried_chicken_set->getPrice());
		print 'からあげ定食用ソース<select name="source" size="1">';
		print '<option value="0">なし</option>
				<option value="1">タルタルソース</option>
				<option value="2">チリソース</option>
				<option value="3">ブラックペッパーソース</option>';
		print '</select><br>';
	print '<input type="submit" name="submit" value="注文"></form>';
}
?>