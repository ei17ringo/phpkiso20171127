<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
<h1>入力内容確認</h1>
<?php if ($_POST["nickname"] == ""){
  echo 'ニックネームを表示してください<br>';
}else{ ?>
ようこそ、<?php echo htmlspecialchars($_POST["nickname"]); ?>様 <br>
<?php  } ?>
<?php if ($_POST["email"] == ""){
  echo 'emailを表示してください<br>';
}else{ ?>
メールアドレス:<?php echo htmlspecialchars($_POST["email"]); ?> <br>
<?php  } ?>
<?php if ($_POST["content"] == ""){
  echo '内容を表示してください<br>';
}else{ ?>
お問い合わせ内容:<?php echo htmlspecialchars($_POST["content"]); ?> <br>
<?php  } ?>



<input type="button" value="戻る" onclick="history.back();">　

<?php if (($_POST['nickname'] != "") && ($_POST['email'] != "") && ($_POST['content'] != "")){ ?>
<form method="POST" action="thanks.php">
  <input type="hidden" name="nickname" value="<?php echo $_POST["nickname"]; ?>">
  <input type="hidden" name="email" value="<?php echo $_POST["email"]; ?>">
  <input type="hidden" name="content" value="<?php echo $_POST["content"]; ?>">
  <input type="submit" value="OK">
</form>
<?php } ?>
<?php include('copyright.php'); ?>
</body>
</html>