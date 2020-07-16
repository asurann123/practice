<?php
class Entree {
	public $name;
	public $ingredients = array();

	public function __construct($name,$ingredients){
		if (! is_array($ingredients)) {
			throw new Exception('$ingredients must be an array!!!');
		}
		$this->name = $name;
		$this->ingredients = $ingredients;
	}
	public static function hasIngredients($ingredient) {
		return in_array($ingredient,$this->ingredients);
	}
}

class ComboMeal extends Entree{
	public function hasIngredient($ingredient) {
		foreach ($this->ingredients as $entree) {
			if ($entree->hasIngredient($ingredient)) {
				return true;
			}
		}
		return false;
	}
}

/* $soup = new Entree('Chicken  Soup',array('chicken','water'));

$sandwich = new Entree('Chicken Sandwich',array('chicken','bread'));
 */

$combo = new ComboMeal('Soup + Sandwich',array($soup,$sandwich));

foreach (['chicken','water','pickles'] as $ing) {
	if ($combo->hasIngredient($ing)) {
		print "Something in the combo contains $ing" . '<br>';
	};
}

/* foreach (['chicken','lemon','bread','water'] as $ing) {
	if ($soup->hasIngredients($ing)) {
		print "Soup contains $ing.<br>";
	}
	if ($sandwich->hasIngredients($ing)) {
		print "Sandwich contains $ing. <br>";
	}
}
 */
?>