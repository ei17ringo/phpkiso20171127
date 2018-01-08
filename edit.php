<?php
  //ステップ1
  //DBの接続
  require('dbconnect.php');

  // A部分---------------------------------------------------------
  // var_dump($_POST["code"]);
  if (isset($_POST['code'])){
    // ボタンが押されたらUPDATE文を実行
    $sql = 'UPDATE `survey` SET `nickname`="'.$_POST["nickname"].'",`email`="'.$_POST["email"].'",`content`="'.$_POST['content'].'" WHERE `code` = '.$_POST['code'];
// var_dump($sql);
    $stmt = $dbh->prepare($sql);

    // SQL文を実行
    $stmt->execute();

    //ステップ3
    
    $dbh = null;

    // 一覧へ戻る
    header('Location: view.php');

  }

  // A部分 終了 ----------------------------------------------------

  // B部分---------------------------------------------------------
  
  //ステップ2
  //SQL文実行
  //SELECT文実行
  $sql = 'SELECT * FROM `survey` WHERE `code` = '.$_GET['code'];

  $stmt = $dbh->prepare($sql);

  // SQL文を実行
  $stmt->execute();

  //ヒント：ここにフェッチしたデータを保存しておく代入文を記述！！！
  $record = $stmt->fetch(PDO::FETCH_ASSOC);

  // B部分 終了 ----------------------------------------------------

  //ステップ3
  //接続の解除
  $dbh = null;

?>
<!-- C部分 -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <title>お問い合わせ</title>
</head>
<body>
  
  <div class="container">
  <h1>お問い合わせ情報編集</h1>
  <form method="POST" action="">
    <div>
        コード<br>
        <?php echo $_GET['code']; ?>
        <input type="hidden" name="code" value="<?php echo $_GET['code']; ?>"><!-- 追加 -->
    </div>
    <div>
        ニックネーム<br>
        <input type="text" name="nickname" style="width:100px" value="<?php echo $record['nickname']; ?>">
    </div>
    <div>
        メールアドレス<br>
        <input type="text" name="email" style="width: 200px" value="<?php echo $record['email']; ?>">
    </div>
    <div>
        お問い合わせ内容<br>
        <textarea name="content" cols="40" rows="5"><?php echo $record['content']; ?></textarea>
    </div>
    <input type="submit" value="送信">
  </form>
  
  <!-- <p>
  copyright erikoichinohe already reserved.<br>
  著作権はErikoIchinoheが持っています。©️
  </p> -->
  <?php include('copyright.php'); ?>
  </div>
</body>
</html>
<!-- C部分 終了-->