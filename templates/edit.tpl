<!DOCTYPE html>
<html>
　<head>
    　  <title>みんなの投稿</title>
    <meta charset="utf-8">
</head>
<body>
<h1>編集画面</h1>

<form action="edit_exec.php" method="post">
<table border='1'>
  <tr>
    <td>内容</td>"
    <td>
      <input type='text' name='content'value='{$content}'/>
    </td>
  </tr>
</table>

<input type="hidden" name="id" value='{$id}'/>
<input type="submit" value="編集" />
</form>
</body>
</html>
