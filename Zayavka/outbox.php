<?
require("config.php");
?>

<html>
<STYLE TYPE="text/css">                     
<!-- 
 TD {text-decoration:none; font-family: Arial,sans-serif;
 font: 75% Arial,sans-serif;}
 TH {text-decoration:none; font-family: Arial,sans-serif;
 font: BOLD 80% Arial,sans-serif;}
 A {text-decoration:none; font-family: Arial,sans-serif;
 font: BOLD 100% Arial,sans-serif; color:black}
 FONT {font-family: Arial,sans-serif;}
--> 
</STYLE> 
<head>
<meta http-equiv="expires" content="0">
</head>
<script language="JavaScript">
<!--
function load(url) {
 parent.ggg.location.href= url; 
 
}
// -->
</script>

 <body background="pics/index_05.jpg">
<font size=6" color=000080><b><center>К исполнению
<?=$id;?>
</center></b></font><br>

<?
if (isset($id)) 
{
$query="Select deposition.*,
  	 sotrudniki.fFIO as Ispolnitel,
	 sotrudniki.IspolnDolj as Ispolnitel2,
	 sotrudniki.fEmail as Ispolnitel3,
	 TypeWork.Type as WorkType, 
	 Station.fName as Station,
	 Predpr1.fName as Filial,
	 ARMs.fName as ARM
	from 
 	 deposition 
	  left join sotrudniki on deposition.Ispolnitel=sotrudniki.fId 
	  left join TypeWork on deposition.WorkType=TypeWork.idW
	  left join Station on deposition.fStation=Station.fCod
	  left join Predpr1 on deposition.fFilial=Predpr1.fId
	  left join ARMs on deposition.fARM=ARMs.fId
	where 
          ((fWDate='0000-00-00') and (sotrudniki.fFIO='".$id."')) 
	order by VhodZayav DESC";
$result = mysql_query ($query) or die("Erorr in query: <br><i>".$query."</i>");
?>
<table border="0" align="center" width="100%">

<th width=4% BGCOLOR=mediumseagreen>№</th>
<th width=3% BGCOLOR=mediumseagreen>вх. №</th>
<th width=8% BGCOLOR=mediumseagreen>Дата заявки</th>
<th width=25% BGCOLOR=mediumseagreen>Подразделение</th>
<th width=10% BGCOLOR=mediumseagreen>ФИО заявителя</th>
<th width=31% BGCOLOR=mediumseagreen>Причина вызова</th>
<th width=12% BGCOLOR=mediumseagreen>Исполнитель</th>
<th width=7% BGCOLOR=mediumseagreen></th> 

<? while ($row=mysql_fetch_array($result))
{?>
<tr bgcolor=palegreen
onMouseOver="this.style.backgroundColor='00FF7F'" 
    onMouseOut="this.style.backgroundColor=''" 
    onClick="load('info2.php?id=<?=$row["id"]?>')"
title="<?=$row["WorkType"]?>">         

<td align=center><?=$row["id"]?></td>
<td align=center><?=$row["VhodZayav"]?></td>
<td align=center><?=$row["fDateBegin"]?></td>
<td align=left><?=$row["Filial"]?> (<?=$row["ARM"]?>) ст.<?=$row["Station"]?> </td>
<td align=left><?=$row["Depositor"]?> </td>
<td align=left><?=$row["fBText"]?></td>
<td align=left><a href="outbox.php?id=<?=$row["Ispolnitel"]?>"><?=$row["Ispolnitel"]?></a></td>

<?if ($sec<3) {?>
<td align=left>
<a href=addNaryad.php?id=<?=$row["id"]?>><img src="pics/close.png" height=19 title="Закрытие наряда" border=0></a>
<a href=verdikt.php?id=<?=$row["id"]?>><img src="pics/akts.png" height=19 title="Оформление акта" border=0></a>

<?if ($row["Ispolnitel3"]>'') {?><a href=mail.php?id=<?=$row["id"]?>><img src="pics/e-mail.png" height=19 title="Оповестить исполнителя" border=0></a></td><?}?>
<?}?>

</tr>
<?}?>
</table> 
<br>
<hr>
<font size=6" color=000080><b><center>К исполнению</center></b></font><br>
<?}

if ($sec==1){ 
$query="Select deposition.*,
sotrudniki.fFIO 
as Ispolnitel,
sotrudniki.IspolnDolj 
as Ispolnitel2,
TypeWork.Type 
as WorkType, 
Station.fName
as Station,
Predpr1.fName
as Filial,
ARMs.fName
as ARM
from deposition 
left join sotrudniki on deposition.Ispolnitel=sotrudniki.fId 
left join TypeWork on deposition.WorkType=TypeWork.idW
 left join Station on deposition.fStation=Station.fCod
left join Predpr1 on deposition.fFilial=Predpr1.fId
left join ARMs on deposition.fARM=ARMs.fId
where ((Ispolnitel<>'') and (fWDate='0000-00-00') and (Ispolnitel='".$Nomer."')) order by VhodZayav DESC";
$result = mysql_query ($query) or die("Erorr in query: <br><i>".$query."</i>");
}
if ($sec>=2){ 
$query="Select deposition.*,
sotrudniki.fFIO 
as Ispolnitel,
sotrudniki.IspolnDolj 
as Ispolnitel2,
sotrudniki.fEmail 
as Ispolnitel3,
TypeWork.Type 
as WorkType, 
Station.fName
as Station,
Predpr1.fName
as Filial,
ARMs.fName
as ARM
from deposition 
left join sotrudniki on deposition.Ispolnitel=sotrudniki.fId 
left join TypeWork on deposition.WorkType=TypeWork.idW
 left join Station on deposition.fStation=Station.fCod
left join Predpr1 on deposition.fFilial=Predpr1.fId
left join ARMs on deposition.fARM=ARMs.fId
where ((Ispolnitel<>'') and (fWDate='0000-00-00') ) order by VhodZayav DESC";
$result = mysql_query ($query) or die("Erorr in query: <br><i>".$query."</i>");
}
 
?>
   
<? if ($sec>0){   ?>

<table border="0" align="center" width="100%">

<th width=4% BGCOLOR=Goldenrod>№</th>
<th width=3% BGCOLOR=Goldenrod>вх. №</th>
<th width=8% BGCOLOR=Goldenrod>Дата заявки</th>
<th width=25% BGCOLOR=Goldenrod>Подразделение</th>
<th width=10% BGCOLOR=Goldenrod>ФИО заявителя</th>
<th width=31% BGCOLOR=Goldenrod>Причина вызова</th>
<th width=12% BGCOLOR=Goldenrod>Исполнитель</th>
<th width=7% BGCOLOR=Goldenrod></th> 


<? while ($row=mysql_fetch_array($result))
{?>
<tr bgcolor=Khaki
onMouseOver="this.style.backgroundColor='Darkkhaki'" 
    onMouseOut="this.style.backgroundColor=''" 
    onClick="load('info2.php?id=<?=$row["id"]?>')"
title="<?=$row["WorkType"]?>">         

<td align=center><?=$row["id"]?></td>
<td align=center><?=$row["VhodZayav"]?></td>
<td align=center><?=$row["fDateBegin"]?></td>
<td align=left><?=$row["Filial"]?> (<?=$row["ARM"]?>) ст.<?=$row["Station"]?> </td>
<td align=left><?=$row["Depositor"]?> </td>
<td align=left><?=$row["fBText"]?></td>
<td align=left><a href="outbox.php?id=<?=$row["Ispolnitel"]?>"><?=$row["Ispolnitel"]?></a></td>

<?if ($sec=10) {?>
<td align=left>
<a href=addNaryad.php?id=<?=$row["id"]?>><img src="pics/close.png" height=19 title="Закрытие наряда" border=0></a>
<a href=verdikt.php?id=<?=$row["id"]?>><img src="pics/akts.png" height=19 title="Оформление акта" border=0></a>

<?if ($row["Ispolnitel3"]>'') {?><a href=mail.php?id=<?=$row["id"]?>><img src="pics/e-mail.png" height=19 title="Оповестить исполнителя" border=0></a></td><?}?>
<?}?>

</tr>
<?}?>
</table> 

<?}?>
</body>
</html>