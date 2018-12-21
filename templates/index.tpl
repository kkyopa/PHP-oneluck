<!DOCTYPE html>
<html>
<head>
  <title>a</title>
  <meta charset="utf-8">
</head>
<body>



  <table border='1'>
  <tr>
  <td>内容</td>
  <td><input type='text' name='content' value='{$indexdata}'/></td>
  <td><input type='file' name='attach_filename' value='{$attach_filename}'/></td>
  </tr>
  </table>


 <td><form method="POST" action="delete.php">
<input type="hidden" name="id" value="'.htmlspecialchars($record['id'], ENT_QUOTES | ENT_HTML5, 'UTF-8').'">
<input type="submit" value="削除"></form></td>

 <td>
<a href="/luckfile/edit_menu.php?id='.$record['id'].'">編集</a>
</td>
<td>
<a href="/luckfile/show.php?id='.$record['id'].'">詳細</a>
</td></tr>

 </table>
</body>
</html>
