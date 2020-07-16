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
	
	public function getNameAndPrice() {
		$message = $this->getName().'　' . $this->getPrice(). '円　' ;
		return $message;
	}
	
	public function makeInputTag() {
		$tag = '<input type="number" name="' . $this->name .'" value="0" min="0" max="9" step="1"><br>';
		return $tag;
	}
	
	public function displayMenu() {
		echo $this->getNameAndPrice() . $this->makeInputTag();
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
		$this->source = new Source($id);
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

	function __construct($id) {
		$this->price = 100;
		if ($id == 1) {
			$this->name= 'タルタルソース';
		}elseif ($id == 2){
			$this->name= 'チリソース';
		}elseif ($id == 3){
			$this->name= 'ブラックペッパーソース';
		}
	}

}


?>