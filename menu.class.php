<?php

abstract class Menu {
	protected $price;
	protected $name;

	function __construct($price,$name) {
		$this->price = $price;
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}

	public function getPrice() {
		return $this->price;
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

	public function setSource($id) {
		if ($id == 1) {
			$this->source = new Source('タルタルソース');
		}elseif ($id == 2){
			$this->source = new Source('チリソース');
		}elseif ($id == 3){
			$this->source = new Source('ブラックペッパーソース');
		}
	}

	public function getSource($param) {
		if ($param == 'name') {
			return $this->source->name;
		}elseif($param == 'price'){
			return $this->source->price;
		}
	}

}

class Source extends Menu{

	function __construct($name) {
		$this->price = 100;
		$this->name = $name;
	}

}




?>