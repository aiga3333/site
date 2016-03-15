<meta http-equiv="expires" content="0">
 
<?
require("config.php");

$query="Select * from deposition where id=".$id;
$result = mysql_query ($query) or die("Erorr in query: <br><i>".$query."</i>");
$row=mysql_fetch_array($result);
?>

<body background="pics/index_05.jpg">

<caption><font size="6" color=000080><b><center> Наряд от заявки №<?=$row["id"]?> <html></center></font></caption>
<table border=0 width=100% align=center>
                 
<table border=1 width=80%>
 <th>Работу выполнил:</th>
<th>В ходе обследования обнаружено следующее:</th>
<th>Дата составления акта</th>
<th>Выполнены следующие виды работ:</th>

 <?   while ($row=mysql_fetch_array($result)) {?>
  <tr>
    <td align=left><?=$row["fWFIO"]?></td>
   <td align=left><?=$row["fStatus"]?></td>
<td align=left><?=$row["fWDate"]?></td>
<td align=left><?=$row["fWText"]?></td>
   </tr>
<?}?>
</body>
</html>   