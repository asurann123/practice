<?php
$cities = array(
		array('citi' => 'NewYork',
				'state' => 'NY',
				'count' => 8008278),
		array('citi' => 'LosAngeles',
				'state' => 'CA',
				'count' => 3694820),
		array('citi' => 'Chicago',
				'state' => 'IL',
				'count' => 2896016),
		array('citi' => 'Houston',
				'state' => 'TX',
				'count' => 1953631),
		array('citi' => 'Philadelphia',
				'state' => 'PA',
				'count' => 1517550),
		array('citi' => 'Phoenix',
				'state' => 'PA',
				'count' => 1321045),
		array('citi' => 'SanDiego',
				'state' => 'CA',
				'count' => 1223400),
		array('citi' => 'Dallas',
				'state' => 'TX',
				'count' => 1100580),
		array('citi' => 'SanAntonio',
				'state' => 'TX',
				'count' => 1144646),
		array('citi' => 'Detroit',
				'state' => 'MI',
				'count' => 951270)
);
//配列の初期化
$states = [];
//並べ替えの処理
array_multisort(array_column($cities, 'count'), SORT_DESC, $cities);

foreach ($cities as $index => $citi) {
	echo($citi['citi']);
	echo (' ');
	echo($citi['count']);
	echo('<br>');
	//すでにある都市なのか判定
	$flag = array_key_exists($citi['state'],$states);
	if ($flag == true) {
		$states[$citi['state']] += $citi['count'];
	}else{
		$states += [$citi['state']=>$citi['count']];
	}


}
//州と人口の表示
echo '州ごとの人口<br>';
foreach ($states as $key => $value){
	echo $key . ':';
	echo $value . '<br>';
}
?>

