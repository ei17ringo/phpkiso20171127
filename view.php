<?php

    // // ステップ1 データーベースに接続する
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
    $sql = 'SELECT * FROM `survey`;';

    // SQL文を実行する準備
    // -> アロー演算子
    $stmt = $dbh->prepare($sql);

    // SQL文を実行
    $stmt->execute();

    // ステップ3 データベースの切断(オブジェクトを空っぽにしている)
    // $dbh = null;

?>
<!DOCTYPE html>
<html>
<head>
  <title>お問い合わせ一覧</title>
</head>
<body>
<h1>お問い合わせ一覧</h1>
<?php

//while 条件指定ができる繰り返し文
// while (1) 無限ループ
while (1) {
  //一行取得
  $record = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($record == false){
    //処理を中断する
    break;
  }

  // 連想配列のキーがカラム名と同じものになっている！！！

?>
  <?php echo $record["code"]; ?><br>
  <?php echo $record["nickname"]; ?><br>
  <?php echo $record["email"]; ?><br>
  <?php echo $record["content"]; ?><br>
  
  <a href="edit.php?code=<?php echo $record["code"]; ?>"><button >編集</button></a>
  <a href="delete.php?code=<?php echo $record["code"]; ?>"><button >削除</button></a>
  <hr>
<?php
}
  
   // ステップ3 データベースの切断(オブジェクトを空っぽにしている)
    $dbh = null;

    //宿題
    // リストタグかtableタグを使って、画面を装飾してみましょう
    // bootsnippからタグを拝借して反映するのもgood

?>

</body>
</html>