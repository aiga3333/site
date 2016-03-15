<html>
<head>
<meta http-equiv="expires" content="0">
</head>  
 

<?
require("config.php");

if (isset($NameP)) {
  $query = "insert into Predpr (
    NameP,
    Otdel) 
   values ( 
    '".$NameP."',
    '".$Otdel."')";
 $result = mysql_query ($query) or die ("Ошибка в запросе к таблице!<i><br>".$query);
  }
  $query="Select * from Predpr order by NameP ASC";
  $result = mysql_query ($query) or die("Could not create table Hosts");
?>
<body background=pics/index_05.jpg>
<center>
 <table border=1 width=80%>
 <th>№</th>
 <th>Подразделение</th>
 <th>Отдел</th>
 <?   while ($row=mysql_fetch_array($result)) {?>
  <tr>
   <td align=center><?=$row["fId"]?></td>
   <td align=left><?=$row["NameP"]?></td>
   <td align=left><?=$row["Otdel"]?></td>
<? if ($sec==2){   ?>
   <td align=center><a href=PredDel.php?fId=<?=$row["fId"]?>><img src=pics/del.gif title=Удалить border=0></a></td>
 <?}?> </tr>
<?}?>
 <form action=PredpAdd.php method=post name=add>
 <tr>
  <td></td>
  <td><input type=text name=NameP></td>
  <td><input type=text name=Otdel></td>
  <td align=center><input type=submit value="Добавить"></td>
 </tr>
 </form>
 </table>
<body>

</html> 