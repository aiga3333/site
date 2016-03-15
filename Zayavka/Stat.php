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
 $query="Select deposition.*,
sotrudniki.fFIO 
as fWFIO
from deposition
left join sotrudniki on deposition.fWFIO=sotrudniki.fId 
";
$result = mysql_query ($query) or die("Erorr in query: <br><i>".$query."</i>");
?>
<body background="pics/index_05.jpg">
Этот раздел находится доработке!
   
<font size=6" color=000080><b><center>Статистика работы персонала</center></b></font><br>

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
<tr bgcolor=lightgreen
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
</center>

