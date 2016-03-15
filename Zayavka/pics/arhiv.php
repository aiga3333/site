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
function load(url) {
 parent.ggg.location.href= url; 
 
}
// -->
</script>


<?
require("config.php");
if ($sec==1){ 
 $query="Select deposition.*,
Oborud.Nazvan 
as Nazvan1,
sotrudniki.fFIO 
as fWFIO,
TypeAkt.Type 
as fType,
TypeAkt.Fid 
as fTypeId,
TypeWork.Type 
as WorkType, 
Predpr.Otdel
as fPredp,
Predpr.NameP
as Tip,
OtchetMesyac.Mesyac
as Mesyac1    
from deposition
left join Oborud on deposition.fDevice=Oborud.idO  
left join sotrudniki on deposition.fWFIO=sotrudniki.fId 
left join TypeWork on deposition.WorkType=TypeWork.idW
left join Predpr on deposition.Predp=Predpr.fId
left join TypeAkt on deposition.fType=TypeAkt.Fid
left join OtchetMesyac on deposition.DateOtm=OtchetMesyac.idM 

where ((fWFIO<>'') and (fWFIO='".$Nomer."')) order by id DESC";
$result = mysql_query ($query) or die("Erorr in query: <br><i>".$query."</i>");
}
if ($sec==2){ 
$query="Select deposition.*,
Oborud.Nazvan 
as Nazvan1,
sotrudniki.fFIO 
as fWFIO,
TypeAkt.Type 
as fType,
TypeAkt.Fid 
as fTypeId,
TypeWork.Type 
as WorkType, 
Predpr.Otdel
as fPredp,
Predpr.NameP
as Tip,
OtchetMesyac.Mesyac
as Mesyac1    
from deposition
left join Oborud on deposition.fDevice=Oborud.idO  
left join sotrudniki on deposition.fWFIO=sotrudniki.fId 
left join TypeWork on deposition.WorkType=TypeWork.idW
left join Predpr on deposition.Predp=Predpr.fId
left join TypeAkt on deposition.fType=TypeAkt.Fid
left join OtchetMesyac on deposition.DateOtm=OtchetMesyac.idM 
where fWFIO<>'' order by id DeSC";
$result = mysql_query ($query) or die("Erorr in query: <br><i>".$query."</i>");
}
 ?>

<body background="pics/index_05.jpg">
   
<font size=6" color=000080><b><center>Журнал регистрации заявок</center></b></font><br>
<? if ($sec==1){   ?>
<center><a href=addTelefon.php>Добавить исполненную заявку по телефону</a>
</center><br>

<font color=DC143C size=2>Чтобы отредактировать данные по заявке поступившей по телефону,нужно зайти в саму заявку, там будет ссылка для редактирования</font>

<table border="0" align="center" width="100%">
<th width=3% bgcolor=lightblue>№</th>
<th width=9% bgcolor=lightblue><font size=2>Дата вх.документа</th></font>
<th width=20% bgcolor=lightblue><font size=2>Предприятие</th></font>
<th width=10% bgcolor=lightblue><font size=2>Тип оборуд.</th></font>
<th width=25% bgcolor=lightblue><font size=2>Причина вызова</th></font> 
<th width=15% bgcolor=lightblue><font size=2>Исполнитель</th></font>
<th width=9% bgcolor=lightblue><font size=2>Дата исполнения</th></font>
<th width=9% bgcolor=lightblue><font size=2>Отчетный месяц</th></font>
 
<? while ($row=mysql_fetch_array($result)) {?>
<tr
onMouseOver="this.style.backgroundColor='00FF7F'" 
    onMouseOut="this.style.backgroundColor=''" 
    onClick="load('info.php?id=<?=$row["id"]?>')">         
<td><?=$row["id"]?></td>
<td><font size=2><?=$row["fDateBegin"]?></td></font>
<td><font size=2><?=$row["Tip"]?>(<?=$row["fPredp"]?>)</td></font>
<td><font size=2><?=$row["Nazvan1"]?></td></font>
<?$s = substr($row["fBText"], 0, 30);?>
<td><font size=2><?=$s?></td>
 <td><font size=2><?=$row["fWFIO"]?></td></font>
<td><font size=2><?=$row["fWDate"]?></td></font>
<td><font size=2><?=$row["Mesyac1"]?></td></font>                   
</tr>
<? } ?>
</table>
<center><a href=addTelefon.php>Добавить исполненную заявку по телефону</a>
</center>

<? } ?>
<?if ($sec==2){ ?> 
<center><a href=addTelefon.php>Добавить исполненную заявку по телефону</a>
</center><br>

<font color=DC143C size=2>Чтобы отредактировать данные по заявке поступившей по телефону,нужно зайти в саму заявку, там будет ссылка для редактирования</font>
<table border="0" align="center" width="100%">

<th width=5% bgcolor=mediumseagreen>№</th>
<th width=9% bgcolor=mediumseagreen><font size=2>Дата вх.документа</th></font></a>
<th width=20% bgcolor=mediumseagreen><font size=2>Предприятие</th></font>
<th width=10% bgcolor=mediumseagreen><font size=2>Тип оборуд.</th></font>
<th width=20% bgcolor=mediumseagreen><font size=2>Причина вызова</th></font> 
<th width=15% bgcolor=mediumseagreen><font size=2>Исполнитель</th></font>
<th width=9% bgcolor=mediumseagreen><font size=2>Дата исполнения</th></font>
<th width=9% bgcolor=mediumseagreen><font size=2>Отчетный месяц</th></font> 
<th width=3% bgcolor=mediumseagreen><font size=2></th></font>  

 
<? while ($row=mysql_fetch_array($result)) {?>
<tr bgcolor=palegreen
onMouseOver="this.style.backgroundColor='00FF7F'" 
    onMouseOut="this.style.backgroundColor=''" 
    onClick="load('info.php?id=<?=$row["id"]?>')">  
       
<td align=center><?=$row["id"]?></td>
<td align=center><font size=2><?=$row["fDateBegin"]?></td></font>
<td><font size=2><?=$row["Tip"]?>(<?=$row["fPredp"]?>)</td></font>
<td align=center><font size=2><?=$row["Nazvan1"]?></td></font>
<?$s = substr($row["fBText"], 0, 25);?>
<td><font size=2><?=$s?></td></font>
<td><font size=2><?=$row["fWFIO"]?></td></font>
<td align=center><font size=2><?=$row["fWDate"]?></td></font>
<td align=center><font size=2><?=$row["Mesyac1"]?></td></font>

<?if ($row["otmetka"]==1){ ?>                         
<td><img border="0" src="pics/tel.jpg" width="25" height="25"></td>                        
<? } ?>
</tr>
<? } ?>
</table>
<br><center><a href=addTelefon.php>Добавить заявку по телефону</a>
</center>


<?}?>

<?if ($sec==3){ ?> 
<table border="0" align="center" width="100%">
<th width=3% bgcolor=lightsilver>№</th>
<th width=9% bgcolor=lightsilver><font size=2>Дата вх.документа</th></font>
<th width=20% bgcolor=lightsilver><font size=2>Предприятие</th></font>
<th width=10% bgcolor=lightsilver><font size=2>Тип оборуд.</th></font>
<th width=25% bgcolor=lightsilver><font size=2>Причина вызова</th></font> 
<th width=15% bgcolor=lightsilver><font size=2>Исполнитель</th></font>
<th width=9% bgcolor=lightsilver><font size=2>Дата исполнения</th></font>
<th width=9% bgcolor=lightsilver><font size=2>Отчетный месяц</th></font>
<?}?> 
 </body>
</html>
