<?php

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

//フォーム作成（レシート画面）
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    //処理部
    $menu_array = array();
    $option_array = array();
    foreach ($_POST as $key => $value) {
        foreach ($menu as $item) {
            if ($key == $item['item']) {
                $res1 = $value * $item['price'];
                array_push($menu_array,$res1);
            }
        }
         foreach ($sources as $source) {
             if ($key == $source['taste']) {
                 $res2 = $value * $source['price'];
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

    foreach ($menu as $item) {
        print " ・" . $item['item'] . "　" . $item['price'] . "円<br>";
        if ($item['item'] == 'からあげ') {
            print 'からあげ定食にはソースを追加できます<br>(+100円)<br>' . '<select name="menu[]" multiple>';
            foreach ($sources as $source) {
                print '<option value="source">' . $source['taste'];
            }
            print '</select><br>';
        }
    }
    print '<form method="post" action="' . $link . '"><h2>注文画面</h2>';
    foreach ($menu as $value) {
        print "・" . $value['item'] . '<input type="number" name="' . $value['item'] . '" value="0" min="0" max="10" step="1"><br>';
        if ($value['item'] == 'からあげ') {
            foreach ($sources as $source) {
                print "&emsp;・" . $source['taste'] . '<input type="number" name="' . $source['taste'] . '" value="0" min="0" max="10" step="1"><br>';
            }
        }
    }
    print '<input type="submit" name="submit" value="注文"></form>';
}

?>