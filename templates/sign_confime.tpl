<!DOCTYPE html>
<html>
  <head>
    <title>確認画面</title>
    <meta charset="utf-8">
  </head>
<body>
  <h1>確認画面</h1>

  <h2>{$line}</h2>
  <p>あなたのお名前「{$note}」</p>
    <p>あなたのアドレス「{$email}」</p>
      <p>あなたが決めたパスワード</p>
  <h2>{$line}</h2>
  <p>こちらの内容で間違いないですか？</p>

  <form action="./sign_register.php" method="post">
    <input type="hidden" name="note" value="{$note}">
    <input type="hidden" name="email" value="{$email}">
    <input type="hidden" name="pass" value="{$pass}">
    {if $upload}
      <input type="hidden" name="tmp_file_path" value="{$image}">
      <img src="{$image}">
    {/if}
    <input type="submit" value="登録する">
    <input type="button" onClick="location.href='http://192.168.33.10:3000/login/sign_up.php'" value="戻る">
  </form>
  </body>
</html>
