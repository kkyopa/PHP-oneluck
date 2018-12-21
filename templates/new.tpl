<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>フォーム入力</title>
    <link href="./style.css" rel="stylesheet" type="text/css">
  </head>
<body>
  <input type="button" onClick="location.href='http://192.168.33.10:3000/luckfile/index.php'" value="みんなの投稿">
<div>
  <h1>投稿画面</h1>
  <form action="confime.php" method="post" enctype="multipart/form-data">
    投稿内容：<input type="text" name="note"><br>
    画像投稿:<input name="file_upload" type="file" /><br>
    <input type="submit" value="確認する">
  </form>
</div>


</body>
</html>
