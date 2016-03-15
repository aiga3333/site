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
TypeAkt.Fid 
as fTypeId,
Predpr.Otdel
as fPredp,
Predpr.NameP
as Tip,
TypeAkt.Type 
as Top
 
from deposition
left join Oborud on deposition.fDevice=Oborud.idO  
 
left join sotrudniki on deposition.fWFIO=sotrudniki.fId  
left join TypeWork on deposition.WorkType=TypeWork.idW
left join Predpr on deposition.Predp=Predpr.fId
left join TypeAkt on deposition.fType=TypeAkt.Fid   
 
where id=".$id;
$result = mysql_query ($query) or die("Erorr in query: <br><i>".$query."</i>");
?> 


<body background="pics/index_05.jpg">

<caption><font size="5"><b><center>Заявка № <u> </b><i><?=$id?></u></center></i></font></caption>

<table border=0 width=100% align=center>

<tr>
<td width=50%>
<table border=1 width=100% align=center bordercolor=C0C0C0 cellspacing=0 cellpadding=0><br>

<tr>
<th align=center width=50% colspan=2 bgcolor=FFC0CB height=30>Содержание заявки</th>
</tr>

<? while ($row=mysql_fetch_array($result))
{?>

<tr>
<th align=left width=20%>Номер вход. документа</th>
<td align=left bgcolor=98FB98><i><?=$row["VhodZayav"]?></i></td>
</tr>

<tr><th align=left>Дата вход. документа</th>
<td align=left bgcolor=98FB98><i><?=$row["fDateBegin"]?></i></td>
</tr>

<tr><th align=left>Номер исход. документа</th>
<td align=left bgcolor=98FB98><i><?=$row["IshodZayav"]?></i></td>
</tr>

<tr><th align=left>Дата исход. документа</th>
<td align=left bgcolor=98FB98><i><?=$row["fDateIsx"]?></i></td>
</tr>

<tr>
<th align=left>Предприятие</th>
<td align=left bgcolor=98FB98><i><?=$row["Tip"]?>(<?=$row["fPredp"]?>)</i></td>
</tr>

<tr><th align=left>Адрес предприятия</th>
<td align=left bgcolor=98FB98><i><?=$row["Adres"]?></i></td>
</tr>

<tr><th align=left>Кабинет</th>
<td align=left bgcolor=98FB98><i><?=$row["Kabinet"]?></i></td>
</tr>

<tr><th align=left>Конт. телефоны</th>
<td align=left bgcolor=98FB98><i><?=$row["Telephon"]?></i></td>
</tr>

<tr><th align=left>Вид работы</th>
<td align=left bgcolor=98FB98><i><?=$row["WorkType"]?></i></td>
</tr>

<tr><th align=left>Текст заявки</th>
<td align=left bgcolor=98FB98><i><?=$row["fBText"]?></i></td>
</tr>

<tr><th align=left>Заявитель</th>
<td align=left bgcolor=98FB98><i><?=$row["Depositor"]?></i></td>
</tr>

<tr><th align=left>Должность</th>
<td align=left bgcolor=98FB98><i><?=$row["fPost"]?></i></td>
</tr>

</table>

<table border=1 width=100% align=center bordercolor=C0C0C0 cellspacing=0 cellpadding=0><br>


<tr>
<th align=center width=50% colspan=2 bgcolor=FFC0CB height=30>О назначении исполнителя</th>
</tr>

<tr>
<th align=left width=20%>Визирование</th>
<td align=left bgcolor=98FB98><i><?=$row["fVisa"]?></i></td>
</tr>

<tr><th align=left>Назначенный исполнитель</th>
<td align=left bgcolor=98FB98><i><?=$row["Ispolnitel"]?></i></td>
</tr>

<tr><th align=left>Отметка руководителя</th>
<td align=left bgcolor=98FB98><i><?=$row["fBossText"]?></i></td>
</tr>

<tr><th align=left>Дата назначения</th>
<td align=left bgcolor=98FB98><i><?=$row["fBossDate"]?></i></td>
</tr>

<tr>
<th align=left>Назначил:</th>
<td align=left bgcolor=98FB98><i><?=$row["fBoss"]?></i></td>
</tr>
</table>
</td>

<td width=50% valign=top align=center>
<table border=1 width=100% align=center bordercolor=C0C0C0 cellspacing=0 cellpadding=0><br>

<tr>
<th align=center width=50% colspan=2 bgcolor=FFC0CB height=30>Отметка об исполнении</th>
</tr>
 
<tr>
<th align=left width=20%>Тип акта</th>
<td align=left bgcolor=98FB98><i><?=$row["Top"]?></i> 
  
<?if ($sec==1){ ?> 
<a href=Naryad.php?id=<?=$row["id"]?>>
<img src=pics/printer3.gif height=18 title=Распечатать_наряд border=0></a>

<a href=akt<?=$row["fTypeId"]?>.php?id=<?=$row["id"]?>> 
<img src=pics/print.wmf height=18 title=Распечатать_акт border=0></a>

<?}?>

<?if ($sec==2){ ?> 
<a href=Naryad.php?id=<?=$row["id"]?>>
<img src=pics/printer3.gif height=18 title=Распечатать_наряд border=0></a>

<a href=akt<?=$row["fTypeId"]?>.php?id=<?=$row["id"]?>> 
<img src=pics/print.wmf height=18 title=Распечатать_акт border=0></a>
 
<?}?>
</td>
</tr>

<tr>
<th align=left width=20%>Установлено то что</th>
<td align=left bgcolor=98FB98><i><?=$row["fStatus"]?></i></td>
</tr>

<tr>
<th align=left width=20%>Оборудование</th>
<td align=left bgcolor=98FB98><i><?=$row["Nazvan1"]?></i></td>
</tr>

<tr>
<th align=left width=20%>Год выпуска оборуд.</th>
<td align=left bgcolor=98FB98><i><?=$row["fGod"]?></i></td>
</tr>

<tr>
<th align=left width=20%>сер.номер</th>
<td align=left bgcolor=98FB98><i><?=$row["fSerN"]?></i></td>
</tr>

<tr>
<th align=left width=20%>инв.номер</th>
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
<table border=1 width=100% align=center bordercolor=C0C0C0 cellspacing=0 cellpadding=0><br>
<tr>
<th align=center width=50% colspan=2 bgcolor=FFC0CB height=30>Формирование отчетной таблицы</th>
</tr>
<tr>
<th align=left width=20%>Отчетный месяц</th>
<td align=left bgcolor=98FB98><i><?=$row["DateOtm"]?></i></td>
</tr>

<tr><th align=left>Вид оборудования</th>
<td align=left bgcolor=98FB98><i><?=$row["VidOborud"]?></i></td>
</tr>

<tr><th align=left>Вид работ</th>
<td align=left bgcolor=98FB98><i><?=$row["VidRabot"]?></i></td>
</tr>

<tr><th align=left>Количество</th>
<td align=left bgcolor=98FB98><i><?=$row["Kol"]?></i></td>
</tr>

</table>

</td>
</tr>
<tr>
<td>
</td></tr>
</table>

<?}?>

</body>
</html>   