<?
require("config.php");
$query="Select deposition.*,
TypeWork.Type 
as WorkType,  
Station.fName
as Station,
Predpr1.fName
as Filial,
ARMs.fName
as ARM
from deposition  
left join TypeWork on deposition.WorkType=TypeWork.idW
 left join Station on deposition.fStation=Station.fCod
left join Predpr1 on deposition.fFilial=Predpr1.fId
left join ARMs on deposition.fARM=ARMs.fId
where Ispolnitel='' and fWFIO=0 order by id ASC";
$result = mysql_query ($query) or die ("ошибка в запросе к таблице!<i><br>".$query); 
?>
<html>
<STYLE TYPE="text/css">                     
<!-- 
 TD {text-decoration:none; font-family: Arial,sans-serif;
 font: 75% Arial,sans-serif;}
 TH {text-decoration:none; font-family: Arial,sans-serif;
 font: BOLD 80% Arial,sans-serif;}
 A {text-decoration:none; font-family: Arial,sans-serif;
 font: BOLD 100% Arial,sans-serif;}
 FONT {font-family: Arial,sans-serif;}
--> 
</STYLE> 
<head>
<meta http-equiv="expires" content="0">
</head>
<script language="JavaScript">
<!--
function load(url) {parent.ggg.location.href= url;}
// -->
</script>

<body background="pics/index_05.jpg">   
<font size=6" color=000080><b><center>Заявки без исполнителей</center></b></font>
<br>
<form action="add.php" method="post">
<?if ($sec>=2){ ?> 
<center><a href=add.php>Добавить заявку</a> 
<?}?>
<? if ($sec>0){   ?>
<table border="0" align="center" width="100%">
<tr>
<th width=4% BGCOLOR=Coral>№</th>
<th width=3% BGCOLOR=Coral>вх. №</th>
<th width=8% BGCOLOR=Coral>Дата заявки</th>
<th width=25% BGCOLOR=Coral>Подразделение</th>
<th width=12% BGCOLOR=Coral>ФИО заявителя</th>
<th width=44% BGCOLOR=Coral>Причина вызова</th>
<th width=5% BGCOLOR=Coral></th> 
</tr>

<? while ($row=mysql_fetch_array($result))
{?>
<tr bgcolor=Bisque
onMouseOver="this.style.backgroundColor='Darksalmon'" 
    onMouseOut="this.style.backgroundColor=''" 
    onClick="load('info2.php?id=<?=$row["id"]?>')"
title="<?=$row["WorkType"]?>">         
<td align=center><?=$row["id"]?></td>
<td align=center><?=$row["VhodZayav"]?></td>
<td align=center><?=$row["fDateBegin"]?></td>
<td align=left><?=$row["Filial"]?> (<?=$row["ARM"]?>) ст.<?=$row["Station"]?> </td>
<td align=left><?=$row["Depositor"]?></td>
<td align=left><?=$row["fBText"]?></td> 
<?if ($sec>=2){ ?> 
<td align=center><a href=vizir.php?id=<?=$row["id"]?>><img src="pics/user.png" height=25 title="Назначить исполнителя" border=0></a> </td>
<?  }?>
</tr>
<?  }?>
</table>
<? } ?>
<?if ($sec>=2){ ?> 
<center><a href=add.php>Добавить заявку</a> 
<?}?>
</form>
</body>
</html>