<?php
    //扱いやすいように変数に代入
    $nickname = htmlspecialchars($_POST["nickname"]);
    $email = htmlspecialchars($_POST["email"]);
    $content = htmlspecialchars($_POST["content"]);


    // データーベースとのやり取りの処理を記述

    // ステップ1 データーベースに接続する
    //　データベース接続文字列 
    // mysql: 接続するデータベースの種類
    // dbname データベース名
    // host パソコンのアドレス　localhost このプログラムが存在している場所と同じサーバー
    // 空欄入れないように記述するルール

    // $dsn = 'mysql:dbname=phpkiso3;host=localhost';

    // // $user データベース接続用ユーザー名
    // // $password データベース接続用ユーザーのパスワード
    // $user = 'root';
    // $password='';

    // // データベース接続オブジェクト
    // $dbh = new PDO($dsn, $user, $password);

    // // 今から実行するSQL文を文字コードutf8 で送るという設定（文字化け防止）
    // $dbh->query('SET NAMES utf8');
     require('dbconnect.php');

    // ステップ2 SQL文実行
    $sql = 'INSERT INTO `survey` (`nickname`,`email`,`content`) VALUES("'.$nickname.'","'.$email.'","'.$content.'");';

    // SQL文を実行する準備
    // -> アロー演算子
    $stmt = $dbh->prepare($sql);

    // SQL文を実行
    $stmt->execute();

    // ステップ3 データベースの切断(オブジェクトを空っぽにしている)
    $dbh = null;

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>送信完了</title>
</head>
<body>
  <h1>お問い合わせありがとうございました！</h1>
  <h3>お問い合わせ内容</h3>
  ニックネーム:<?php echo htmlspecialchars($_POST["nickname"]); ?><br>
  メールアドレス:<?php echo htmlspecialchars($_POST["email"]); ?><br>
  お問い合わせ内容:<?php echo htmlspecialchars($_POST["content"]); ?><br>
</body>
</html>