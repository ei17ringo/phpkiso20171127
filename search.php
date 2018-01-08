<?php
    // var_dump 変数の中身を表示する
    // Undefined index: code が表示されている場合
    // POST送信されていない

    // エラーが表示されない時はPOST送信されている
    // var_dump($_POST["code"]);


    // // ステップ1 データーベースに接続する
    // view.phpとthanks.phpも書き換えましょう 
    require('dbconnect.php');

    // ステップ2 SQL文実行
    // SQLインジェクションを防ぐ！ 
    // プリペアードステートメントを使う

    // isset 変数が存在してるかチェック
    if ((isset($_POST['code'])) && ($_POST['code'] != '')){
      // POST送信されている(?は置き換えたい値がある場所に記述)
      $sql = 'SELECT * FROM `survey` WHERE `code`=?;';

      // 置き換えたいデータを配列の形で保存する
      // $data[] と書くと、配列の末尾に追加される
      // $data = $_POST['code']; -> $dataの中に1とか2とか記述された文字が格納される
      // $data[] = $_POST['code']; -> $data[0]の中に記述された文字が格納される
      $data[] = $_POST['code'];

      // SQL文を実行する準備
      // -> アロー演算子
      $stmt = $dbh->prepare($sql);

      // SQL文を実行
      $stmt->execute($data);
    }else{
      // POST送信されていない
      // 空文字が送られて来ている
      $sql = 'SELECT * FROM `survey`;';

      // SQL文を実行する準備
      // -> アロー演算子
      $stmt = $dbh->prepare($sql);

      // SQL文を実行
      $stmt->execute();
    }
    
    

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
<form action="" method="post">
  <p>検索したいcodeを入力してください。</p>
  <input type="text" name="code">
  <input type="submit" value="検索">
</form>
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