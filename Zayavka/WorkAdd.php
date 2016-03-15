<?
require("config.php");

if (isset($Type)) {
  $query = "insert into TypeWork (
    Type) 
   values ('".$Type."')";
 $result = mysql_query ($query) or die ("Ошибка в запросе к таблице!<i><br>".$query);
  }
  $query="Select * from TypeWork";
  $result = mysql_query ($query) or die("Could not create table Hosts");
?>
<body background=pics/index_05.jpg>
<a href=add.php><img src=pics/left.png title="Назад" width=20></a> 
<center>
 <table border=1 width=80%>
 <th width=10%>№</th>
 <th width=80%>Тип заявки</th>
 <th width=10%></th>
 
<?   while ($row=mysql_fetch_array($result)) {?>
  <tr>
   <td align=center><?=$row["idW"]?></td>
   <td align=left><?=$row["Type"]?></td>
   <td align=center><a href=WorkDel.php?idW=<?=$row["idW"]?>>
<img src=pics/del.gif title=Удалить border=0></a></td>
  </tr>
<?}?>
 <form action=WorkAdd.php method=post name=add>
 <tr>
  <td></td>
  <td><input type=text size=40 name=Type></td>
  <td align=center><input type=submit value="Добавить"></td>
 </tr>
 </form>
 </table> </center>
<a href=add.php><img src=pics/left.png title="Назад" width=20></a> 

<body>
  