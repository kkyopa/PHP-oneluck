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
      <tr>
        {foreach from=$indexdata item=current}
        <td>{$current.id}</td>
        <td>{$current.content}</td>


        {if $current.attach_filename}
          <td><img src='./images/"$current.attach_filename'/></td>
        {else}
          <td>no image</td>
         {/if}


        <td><form method="POST" action="delete.php">
       <input type="hidden" name="id" value='{$current.id}'>
       <input type="submit" value="削除"></form></td>
        <td>
          <a href="/luckfile/edit_menu.php?id={$current.id}">編集</a>
        </td>
        <td>
          <a href="/luckfile/show.php?id={$current.id}">詳細</a>
        </td>
      </tr>
  {/foreach}
 </table>
</body>
</html>
