<html>
<meta http-equiv="expires" content="0">
<?
  require("config.php");

$query="Select deposition.*,
Oborud.Nazvan 
as Nazvan1,
sotrudniki.fFIO 
as Ispolnitel2, 
TypeWork.Type 
as WorkType,  
TypeAkt.Type 
as Top,
Station.fName
as Station,
Predpr1.fName
as Filial,
ARMs.fName
as ARM
 
from deposition
left join Oborud on deposition.fDevice=Oborud.idO  
left join sotrudniki on deposition.fWFIO=sotrudniki.fId  
left join TypeWork on deposition.WorkType=TypeWork.idW
 left join TypeAkt on deposition.fType=TypeAkt.Fid   
left join Station on deposition.fStation=Station.fCod
left join Predpr1 on deposition.fFilial=Predpr1.fId
left join ARMs on deposition.fARM=ARMs.fId

  
where id=".$id;
$result = mysql_query ($query) or die("Erorr in query: <br><i>".$query."</i>");
?> 


<body background="pics/index_05.jpg">

<caption><font size="5"><b><u><center>Заявка </b><i><?=$id?></u></center></i></font></caption>

<table border=0 width=100% align=center>

<tr valign=top>
<td width=50%>
<table border=1 width=100% align=center bordercolor=C0C0C0 cellspacing=0 cellpadding=0><br>

<tr>
<th align=center width=50% colspan=2 bgcolor=FFC0CB height=30>Содержание заявки</th>
</tr>

<? while ($row=mysql_fetch_array($result))
{?>

 
<tr><th align=left>Дата вход. документа</th>
<td align=left bgcolor=98FB98><i><?=$row["fDateBegin"]?></i></td>
</tr>

<tr>
<th align=left>Станция</th>
<td align=left bgcolor=98FB98><i><?=$row["Station"]?></i></td>
</tr>

<tr>
<th align=left>Предприятие</th>
<td align=left bgcolor=98FB98><i><?=$row["Filial"]?></i></td>
</tr>

<tr>
<th align=left>Рабочее место</th>
<td align=left bgcolor=98FB98><i><?=$row["ARM"]?></i></td>
</tr>

<tr><th align=left>Кабинет</th>
<td align=left bgcolor=98FB98><i><?=$row["Kabinet"]?></i></td>
</tr>

<tr><th align=left>Конт. телефоны</th>
<td align=left bgcolor=98FB98><i><?=$row["Telephon"]?></i></td>
</tr>

 <tr><th align=left>Текст заявки</th>
<td align=left bgcolor=98FB98><i><?=$row["fBText"]?></i></td>
</tr>

<tr><th align=left>Заявитель</th>
<td align=left bgcolor=98FB98><i><?=$row["Depositor"]?></i></td>
</tr>

 </table>
<br>

  
<td width=50% valign=top align=center>
<table border=1 width=100% align=center bordercolor=C0C0C0 cellspacing=0 cellpadding=0><br>
 
<tr>
<th align=center width=50% colspan=2 bgcolor=FFC0CB height=30>Отметка об исполнении</th>
</tr>
 
 
<tr>
<th align=left width=20%>Оборудование</th>
<td align=left bgcolor=98FB98><i><?=$row["Nazvan1"]?></i></td>
</tr>

 
<tr>
<th align=left width=20%>Инв.номер</th>
<td align=left bgcolor=98FB98><i><?=$row["fInvN"]?></i></td>
</tr>

<tr>
<th align=left width=20%>Исполнитель</th>
<td align=left bgcolor=98FB98><i><?=$row["Ispolnitel2"]?></i></td>
</tr>
<tr>
<th align=left width=20%>Отметка исполнителя</th>
<td align=left bgcolor=98FB98><i><?=$row["fWText"]?></i></td>
</tr>
<tr>
<th align=left width=20%>Дата исполнения</th>
<td align=left bgcolor=98FB98><i><?=$row["fWDate"]?></i></td>
</tr>
</table>
</td>
</tr>
</table>
<center>
<?if (($sec==2) or ($Nomer==$row["fWFIO"])) {?>
 <a href=updTelefon.php?id=<?=$row["id"]?>>Редактировать_данные</a> 
<?}?>
<br>
<a href=Naryad.php?id=<?=$row["id"]?>>Экспорт наряда в WORD</a> 
<?}?>
</body>
</html>   