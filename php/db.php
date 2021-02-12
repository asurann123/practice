<?php

define("DBNAME",'test');
define("DB_USER","test");
define("DB_PASS","test");
class SingletonPDO extends PDO{

//スコープ演算子 static で宣言しておいて後で：：でアクセスできる
    protected static $dbh;

    protected static $dsn='mysql:host=mysql;dbname=' . DBNAME . ';charset=utf8;';

    //DBへの接続
    public function __construct(){

        parent::__construct(self::$dsn,DB_USER,DB_PASS);
    }

    public static function connect(){

        try{
            if(!self::$dbh){
                self::$dbh=new self();
                self::$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            return self::$dbh;

        }catch(PDOException $e){

            if(!isInService()){
                echo $e->getFile () . ':' . $e->getLine () . ' ' . $e->getMessage () . ' ' . $e->getTraceAsString ();
                echo "<br><br>";
            }
            echo "データベースエラーが発生しています。";
            error_log ( $e->getFile () . ':' . $e->getLine () . ' ' . $e->getMessage () . ' ' . $e->getTraceAsString () );

        }
    }
}


class Data {
	protected $item;
	protected $price;
	protected $taste;

	public function getMenueData(){
		return $this->getMenuByDb();
	}

	public function getSourceData(){
		return $this->getSourceByDb();
	}

	public function displayMethod($which){
		if ($which == 'item') {
			return $this->item;
		}elseif ($which == 'price') {
			return $this->price;
		}elseif ($which == 'taste'){
			return $this->taste;
		}
	}

	//dbから引っ張る処理
    private function getMenuByDb() {

	    $dbh = SingletonPDO::connect();

        $sql = "SELECT
                    item,
                    price
                FROM
                    menu
                ";

        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS,"Data");

    }

    private function getSourceByDb() {

        $dbh = SingletonPDO::connect();
        $sql = "SELECT
                    taste,
                    price
                FROM
                    source
                ";

        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS,"Data");
    }
}

$data = new Data();
//メニューの取得
$menus = $data->getMenueData();
//ソースを取得
$sources = $data->getSourceData();


//フォーム作成（レシート画面）
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    //処理部
    $menu_array = array();
    $option_array = array();
    foreach ($_POST as $key => $value) {
    	foreach ($menus as $item) {
    		if ($key == $item->displayMethod('item')) {
    			$res1 = $value * $item->displayMethod('price');
                array_push($menu_array,$res1);
            }
        }
        foreach ($sources as $source) {
        	if ($key == $source->displayMethod('taste')){
        		$res2 = $value * $source->displayMethod('price');
                 array_push($option_array,$res2);
             }
         }
    }
    $menu_sum = array_sum($menu_array);
    $option_sum = array_sum($option_array);
    $total = $option_sum + $menu_sum;
    //表示部
    print "お会計" . $total . "円です<br>内訳<br>";
    foreach ($_POST as $key => $value) {
        if ($value >= 1) {
            print "・" . $key  . "　" . $value . "つ<br>";
        }
    }

}else{
    $link = $_SERVER['PHP_SELF'];
    //メニューの表示
    foreach ($menus as $item) {
    	print " ・" . $item->displayMethod('item'). "　" . $item->displayMethod('price'). "円<br>";
    	if ($item->displayMethod('item')== 'からあげ') {
            print 'からあげ定食用ソース(+100円)<br>' . '<select name="menu[]" multiple>';
            foreach ($sources as $source) {
            	print '<option value="source">' . $source->displayMethod('taste');
            }
            print '</select><br>';
        }
    }
    print '<form method="post" action="' . $link . '"><h2>注文画面</h2>';
    foreach ($menus as $value) {
    	print "・" . $value->displayMethod('item'). '<input type="number" name="' . $value->displayMethod('item'). '" value="0" min="0" max="10" step="1"><br>';
    	if ($value->displayMethod('item')== 'からあげ') {
        	foreach ($sources as $source) {
        		print "&emsp;・" . $source->displayMethod('taste'). '<input type="number" name="' . $source->displayMethod('taste'). '" value="0" min="0" max="10" step="1"><br>';
            }
        }
    }
    print '<input type="submit" name="submit" value="注文"></form>';
}
?>