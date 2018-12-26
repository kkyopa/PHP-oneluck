<!DOCTYPE html>
<html>
  <head>
    <title>確認画面</title>
    <meta charset="utf-8">
  </head>
  <body>
      <h1>確認画面</h1>
      <h1>{$line}</h1>

      <p>{$noteでよろしいですか？}</p>

      <h1>{$line}</h1>


      <form action="/luckfile/register.php" method="post">
        <input type="hidden" name="note" value="{$note}">

        {if $upload}
        <input type="hidden" name="tmp_file_path" value='{$image}'>
        <img src='{$image}'>
        {/if}
        <input type="submit" value="登録する">
        <input type="button" onClick="location.href='http://192.168.33.10:3000/luckfile/new.php'" value="戻る">
       </form>
</body>
</html>
