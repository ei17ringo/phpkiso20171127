<?php

  // どのデータを消すのか指定してる情報をGET送信で取得
  // var_dump($_GET['code']);

  // echo 'delete.phpに移動してるよ';

  if (isset($_GET['code'])){

      //step1
      // データベースに接続
      require('dbconnect.php');

      //step2
      // SQL実行
      $sql = 'DELETE FROM `survey` WHERE `code`='.$_GET['code'];

      // SQL文を実行する準備
      $stmt = $dbh->prepare($sql);

      // SQL文を実行
      $stmt->execute();

      //step3
      // データベースの破棄
      $dbh = null;

      //view.phpに戻る
      header('Location: view.php');
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
不正なアクセスしないでね。
</body>
</html>