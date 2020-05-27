<?php

class Menu {
	protected $price;
	protected $name;
	protected $total_price;

	function __construct($price,$name) {
		$this->price = $price;
		$this->name = $name;
	}

	public function sumItem($param) {
		$this->total_price= $this->price * $param;
	}

	public function getName() {
		return $this->name;
	}

	public function getPrice() {
		return $this->price;
	}

	public function getTotalPrice(){
		return $this->total_price;
	}

	//存在しないプロパティに値をセットしようとする
	public function __set($prop,$val) {
		echo "存在しないプロパティ $prop に、値 $val を設定しようとしています。 \n";
	}

	//存在しないプロパティへアクセスする
	public function __get($prop) {
		echo "プロパティ $prop は存在しません";
	}

}

class Curry extends Menu{

}

class ChickenNanban extends Menu{

}

class FriedChicknSet  extends  Menu{
	protected $source;
	protected $source_price;

	public function setSource($id) {
		if ($id == 1) {
			$this->source = 'タルタルソース';
		}elseif ($id == 2){
			$this->source = 'チリソース';
		}elseif ($id == 3){
			$this->source = 'ブラックペッパーソース';
		}
		$this->source_price = 100;
	}

	public function sumFee($param) {
		parent::sumItem($param);
		$set_fee = $this->source_price * $param + $this->price * $param;
		$this->total_price = $set_fee;
	}

	public function getSource() {
		return $this->source;
	}
}




?>