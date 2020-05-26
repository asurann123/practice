<?php

class Menu {
	public $name;
	public $price;

	function __construct($price,$name) {
		$this->price = $price;
		$this->name = $name;
	}
}

class Curry extends Menu{

}

class ChickenNanban extends Menu{

}

class FriedChicknSet  extends  Menu{
	public $source;
	function __construct($price,$name,$source) {
		$this->price = $price;
		$this->name = $name;
		$this->source = $source;
	}
}
$curry = new Curry(850,'カレー');
$chicken_nanban = new ChickenNanban(900,'チキン南蛮');
$fried_chicken_set = new FriedChicknSet(800,'からあげ定食','タルタルソース');

?>