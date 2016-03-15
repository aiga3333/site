<?
require("config.php");

if (isset($fName)) {
  $query = "insert into ARMs (
    fName) 
   values ('".$fName."')";
 $result = mysql_query ($query) or die ("Ошибка в запросе к таблице!<i><br>".$query);
  }
  $query="Select * from ARMs order by fName ASC";
  $result = mysql_query ($query) or die("Could not create table Hosts");
?>
<html>
<head>
<meta http-equiv="expires" content="0">
</head>  

<body background=pics/index_05.jpg>
<a href=add.php><img src=pics/left.png title="Назад" width=20></a> 
<br>

<center>
 <table border=1 width=80%>
 <th width=10%>№</th>
 <th width=80%>Рабочее место(отдел)</th>
 <th width=10%></th>
<?   while ($row=mysql_fetch_array($result)) {?>
  <tr>
   <td align=center><?=$row["fId"]?></td>
   <td align=left><?=$row["fName"]?></td> 
   <td align=center><a href=ARMDel.php?fId=<?=$row["fId"]?>>
<img src=pics/del.gif title=Удалить border=0></a></td>   
</tr>
<?}?>
 <form action=ARMAdd.php method=post name=add>
 <tr>
  <td></td>
  <td><input type=text size=40 name=fName></td>
  <td align=center><input type=submit value="Добавить"></td>
 </tr>
 </form>
 </table> </center>

<a href=add.php><img src=pics/left.png title="Назад" width=20></a> 

<body>
</html>