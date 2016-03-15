<?
require("config.php");
if (!isset($arr)) $arr="DE";
if (!isset($order)) $order="id";
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
Station.fName
as Station,
Predpr1.fName
as Filial,
ARMs.fName
as ARM,
Predpr.Otdel
as fPredp,
Predpr.NameP
as Tip
from deposition
left join Oborud on deposition.fDevice=Oborud.idO  
left join sotrudniki on deposition.fWFIO=sotrudniki.fId 
left join TypeWork on deposition.WorkType=TypeWork.idW
left join Station on deposition.fStation=Station.fCod
left join Predpr1 on deposition.fFilial=Predpr1.fId
left join ARMs on deposition.fARM=ARMs.fId
left join TypeAkt on deposition.fType=TypeAkt.Fid
left join Predpr on deposition.Predp=Predpr.fId";
if ($sec<2) {$query=$query." where (((";
  if ($period==0) {$query=$query." (DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")";}
  else {$query=$query." YEAR(fWDate)='".$year."'";}
  $query=$query.") or (DateOtm='0')) and (fWDate>0) and (fWFIO='".$Nomer."'))";}
else {$query=$query." where (((";
  if ($period==0) {$query=$query." (DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")";}
  else {$query=$query." YEAR(fWDate)='".$year."'";}
  $query=$query.") or (DateOtm='0')) and (fWDate>0))";}
if (isset($order)) {$query=$query." order by ".$order." ".$arr."SC";} 
 else {$query=$query." order by id ".$arr."SC";}
$result = mysql_query ($query) or die("Erorr in query: <br><i>".$query."</i>");
?>
<html>
<STYLE TYPE="text/css">                     
<!-- 
 TD {text-decoration:none; font-family: Arial,sans-serif;
 font: 75% Arial,sans-serif;}
 TH {text-decoration:none; font-family: Arial,sans-serif;
 font: BOLD 80% Arial,sans-serif;}
 A {text-decoration:none; font-family: Arial,sans-serif;
 font: BOLD 100% Arial,sans-serif; color: black}
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
    
<font size=6" color=000080><b><center>Журнал регистрации заявок</center></b></font><br>
<? if ($sec==1){   ?>
<center><a href=addTelefon1.php>Добавить исполненную заявку по телефону</a>
</center><br>

<font color=DC143C size=2>При добавлении заявки в поле "задачи" есть опция <u>Доп.работа</u>,туда входят работы порученные руководством,заполнение табеля,профсоюзные работы и т.д.</font>

<table border="0" align="center" width="100%">
<th width=3% bgcolor=lightblue>№</th>
<th width=9% bgcolor=lightblue><font size=2>Дата вх.документа</th></font>
<th width=24% bgcolor=lightblue><font size=2>Предприятие</th></font>
<th width=10% bgcolor=lightblue><font size=2>Задача</th></font>
<th width=30% bgcolor=lightblue><font size=2>Причина вызова</th></font> 
<th width=15% bgcolor=lightblue><font size=2>Исполнитель</th></font>
<th width=9% bgcolor=lightblue><font size=2>Дата исполнения</th></font>
  
 <? while ($row=mysql_fetch_array($result)) {?>
<tr 
onMouseOver="this.style.backgroundColor='00FF7F'" 
    onMouseOut="this.style.backgroundColor=''"  
<?if ($row["otmetka"]==1){ ?>                         
    onClick="load('info3.php?id=<?=$row["id"]?>')">  
<? }
else {?>
onClick="load('info.php?id=<?=$row["id"]?>')">  
<?}?>      
<td><?=$row["id"]?></td>
<td><font size=2><?=$row["fDateBegin"]?></td></font>
<td><font size=2><?=$row["Filial"]?> ст.<?=$row["Station"]?>(<?=$row["ARM"]?>)</td></font>
<td><font size=2><?=$row["Nazvan1"]?></td></font>
<?$s = substr($row["fBText"], 0, 30).'...';?>
<td><font size=2><?=$s?></td>
<td><font size=2><?=$row["fWFIO"]?></td></font>
<td><font size=2><?=$row["fWDate"]?></td></font>
 </font>
 
<?if ($row["otmetka"]==1){ ?>                         
<td><img border="0" src="pics/tel.jpg" width="18" height="13"></td>
<?} else  { ?>
<td><img border="0" src="pics/ispoln.gif" width="18" height="13"></td>                        
<?}?>
                  
</tr>
<? } ?>
</table>
<center><a href=addTelefon1.php>Добавить исполненную заявку по телефону</a>
</center>
<? } ?>

<?if ($sec>1){ ?> 

<center>
<a href=addTelefon1.php>Добавить исполненную заявку по телефону</a>
<br>
<a href=addAktOsm.php>Добавить Акт осмотра техсостояния</a>
<form action="searchObject.php" method="post">
<input type="text" name="search" maxlength="100" size="60">
<input type="button" name="submit" value="Найти">
</form>
</center> 

<table border=0 align=center width=100%>

<th width=5% bgcolor=mediumseagreen>
  <a href=arhiv.php?order=id&arr=<?if ($arr=="A") {print("DE");} else {print("A");}?>>
   №
  <?if ($order=="id") {print("<b> &uarr;</b>");} else  {print("<b> &uarr;&darr;</b>");}?>
  </a>
</th>
<th width=9% bgcolor=mediumseagreen>
  <a href=arhiv.php?order=fDateBegin&arr=<?if ($arr=="A") {print("DE");} else {print("A");}?>>
   Дата вх.документа
   <?if ($order=="fDateBegin") {print("<b> &uarr;</b>");} else  {print("<b> &uarr;&darr;</b>");}?>
  </a>
</th></font>
<th width=20% bgcolor=mediumseagreen>
 <a href=arhiv.php?order=Filial&arr=<?if ($arr=="A") {print("DE");} else {print("A");}?>>
  Предприятие
  <?if ($order=="Filial") {print("<b> &uarr;</b>");} else  {print("<b> &uarr;&darr;</b>");}?>
 </a>
</th>
<th width=10% bgcolor=mediumseagreen>
 <a href=arhiv.php?order=Nazvan1&arr=<?if ($arr=="A") {print("DE");} else {print("A");}?>>
  Задача
   <?if ($order=="Nazvan1") {print("<b> &uarr;</b>");} else  {print("<b> &uarr;&darr;</b>");}?>
 </a>
</th>
<th width=26% bgcolor=mediumseagreen>
<a href=arhiv.php?order=fBText&arr=<?if ($arr=="A") {print("DE");} else {print("A");}?>>
  Причина вызова
   <?if ($order=="fBText") {print("<b> &uarr;</b>");} else  {print("<b> &uarr;&darr;</b>");}?>
 </a>
</th>
<th width=18% bgcolor=mediumseagreen>
 <a href=arhiv.php?order=fWFIO&arr=<?if ($arr=="A") {print("DE");} else {print("A");}?>>
  Исполнитель
   <?if ($order=="fWFIO") {print("<b> &uarr;</b>");} else  {print("<b> &uarr;&darr;</b>");}?>
 </a>
</th>
<th width=9% bgcolor=mediumseagreen>
<font size=2>
 <a href=arhiv.php?order=fWDate&arr=<?if ($arr=="A") {print("DE");} else {print("A");}?>>
  Дата исполнения
   <?if ($order=="fWDate") {print("<b> &uarr;</b>");} else  {print("<b> &uarr;&darr;</b>");}?>
 </a>
</th>
<th width=3% bgcolor=mediumseagreen>
<font size=2>
 <a href=arhiv.php?order=Otmetka&arr=<?if ($arr=="A") {print("DE");} else {print("A");}?>>
  Тип
   <?if ($order=="Otmetka") {print("<b> &uarr;</b>");} else  {print("<b> &uarr;&darr;</b>");}?>
 </a>
</th>

 
<? $c=1;
   while ($row=mysql_fetch_array($result)) {
?>
<?if ($row["VidRabot"]<>'') { ?>                         
<tr bgcolor=<? if ($c>1) {$c=0; print("palegreen ");} else {print("Lightgreen ");} $c++;?>
onMouseOver="this.style.backgroundColor='00FF7F'" 
onMouseOut="this.style.backgroundColor=''"  
<?if ($row["otmetka"]==1){ ?>                         
    onClick="load('info3.php?id=<?=$row["id"]?>')">  <? }else {?>
onClick="load('info.php?id=<?=$row["id"]?>')"
>  
<?}?> 
<?}?> 


<?if  ($row["VidRabot"]=='') { ?>                         
<tr bgcolor=<? if ($c>1) {$c=0; print("skyblue ");} else {print("Lightskyblue ");} $c++;?>
onMouseOver="this.style.backgroundColor='00FF7F'" 
onMouseOut="this.style.backgroundColor=''"  
<?if ($row["otmetka"]==1){ ?>                         
    onClick="load('info3.php?id=<?=$row["id"]?>')">  
<? }
else {?>
onClick="load('info.php?id=<?=$row["id"]?>')"
>  
<?}?> 
<?}?>   
   
<td align=center><?=$row["id"]?></td>
<td align=center><font size=2><?=$row["fDateBegin"]?></td></font>
<td><font size=2><?=$row["Filial"]?> ст.<?=$row["Station"]?>(<?=$row["ARM"]?>)</td></font>
<td align=center><font size=2><?=$row["Nazvan1"]?></td></font>
<?$s = substr($row["fBText"], 0, 27).'...';?>
<td><font size=2><?=$s?></td></font>
<td><font size=2><?=$row["fWFIO"]?></td></font>
<td align=center><font size=2><?=$row["fWDate"]?></td></font> 
 
<?if ($row["otmetka"]==1){ ?>                         
<td align=center><img border="0" src="pics/phone.png" title="заявки,принятые по телефону" height="20"></td><?}
  if ($row["otmetka"]==0){ ?>
<td align=center><img border="0" src="pics/write.png" title="заявки в бумажном виде" height="20"></td>                        
<?}?>
<?if ($row["otmetka"]==2){ ?>
<td align=center><img border="0" src="pics/document.png" title="работы оформленные актом техсостояния" height="20"></td>                        
<?}?>

<? } ?>
</tr>
<? } ?>
</table>
<br> 
</center>
</body>
</html>
