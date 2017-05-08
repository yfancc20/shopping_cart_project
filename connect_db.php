<?php
    
    // define:和取變數很像，只是define後的東西不能改變值，
    // 也不用加 $ 
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "root");
    define("DB_NAME", "Product_DB");
        
    function getDBObject() {

        // 資料庫的資料
        $host = DB_HOST;
        $user = DB_USER;
        $pwd = DB_PASSWORD;
        $db = DB_NAME;

        // 透過 mysql 和資料庫連線（提供資料庫的資料）
        $mysqli = new mysqli($host, $user, $pwd, $db);

        if ($mysqli->connect_error) {
            // 如果連線錯誤，die的意思是: 會 echo 出錯誤訊息，並停止程式
            die("$mysqli->connect_errno: $mysqli->connect_error");
        } else {
            // else : 沒有連線錯誤，代表連線成功，會 echo 出成功的字串
            // echo "connect ok!";
        }

        // 如果有人要呼叫這個function ( getDBObject() )
        // 就會 return $mysqli 到我的呼叫，例如下面的 $DB = getDBObject();
        return $mysqli;
    }

    // $DB 代表你得到一個資料庫給你的東西說，妳連線成功了，你可以用這個東西(上面的$mysqli，也就是現在要等於的$DB，你可以用這個東西對資料庫做操作)
    // $DB = getDBObject();

    /*
        fucnction f($x) {
            return $x + 3;
        }

        $answer = f(5);
        // f(5) = 8，所以 answer 也要＝8
        echo $answer;
    */




 ?>
