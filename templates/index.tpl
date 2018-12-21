<!DOCTYPE html>
<html>
<head>
  <title>a</title>
  <meta charset="utf-8">
</head>
<body>



<table border='10'>

  foreach($record_list as $record) {
      echo "<tr>";
      echo "<td>" . $record['id'] . "</td>";
      echo "<td>" . $record['content'] . "</td>";
      if ($record['attach_filename']) {
          echo "<td><img src='./images/" . $record['attach_filename'] . "'/></td>";
      } else {
          echo "<td>no image</td>";
      }

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
