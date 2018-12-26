<!DOCTYPE html>
<html>
  <head>
    <title>確認画面</title>
    <meta charset="utf-8">
  </head>
  <body>
    <h3>本文a</h3>
{$name.content}


{is_file_upload = false;}

{tmp_upload_path = './images/'.$_FILES['file_upload']['name'];}


{if move_uploaded_file($_FILES['file_upload']['tmp_name'], $tmp_upload_path))}
  <p>アップロード完了<p>
  $is_file_upload = true;
{else}
   <p>アップロード失敗<p>
{/if}






<input type="button" onClick="location.href='http://192.168.33.10:3000/luckfile/index.php'" value="みんなの投稿">
</body>
</html>
