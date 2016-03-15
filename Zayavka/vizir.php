<?
require("config.php"); 
 if (isset($Ispolnitel)) {
 $query = "update deposition set
 fWFIO ='".$Ispolnitel."',
 Ispolnitel ='".$Ispolnitel."',
 fBoss='".$fBoss."',
 fVisa='".$fVisa."',
 fBossText='".$fBossText."',
 fBossDate='".$fBossDate."'
 where id=".$id;
 $result = mysql_query ($query) or die ("Ошибка в запросе к таблице!<i><br>".$query);
 header("Location: inbox.php");}
else {
$query="Select deposition.*,
TypeWork.Type 
as WorkType,  
Station.fName
as Station,
Predpr1.fName
as Filial,
ARMs.fName
as ARM,
TypeWork.Type 
as WorkType
from deposition  
left join TypeWork on deposition.WorkType=TypeWork.idW
left join Station on deposition.fStation=Station.fCod
left join Predpr1 on deposition.fFilial=Predpr1.fId
left join ARMs on deposition.fARM=ARMs.fId
where id=".$id;
  $result = mysql_query ($query) or die("Could not create table deposition");
 $row=mysql_fetch_array($result); }
 $date=date("Y-m-j H:i:s");
?>           
<?require("stil.php");
?>

<body background="pics/index_05.jpg">
<center>
<caption><font size="6" color=000080><b><center>Назначение исполнителя</center></b></font></caption>


<hr>
<font size=5> <b>Заявка № </b><i><?=$id?></i></font>
<table align=center width=100%>
<tr>
  <td align=left valign=top width=50%>
  <font size=3>
  <b>исх. </b>
  <i><?=$row["IshodZayav"]?></i><BR>
  <b>от:</b> 
  <i><?=$row["fDateIsx"]?></i>
  </font></td>

  
  <td align=right>
  <font size=3>
  <b>вх. </b>
  <i><?=$row["VhodZayav"]?></i><br>
  <b>от: </b>
  <i><?=$row["fDateBegin"]?><br>
  <?=$row["Filial"]?>(<?=$row["ARM"]?>) ст.<?=$row["Station"]?> <br>
  <?=$row["Adres"]?><br>
  <?=$row["Kabinet"]?><br>
  <?=$row["Telephon"]?><br>
  <?=$row["WorkType"]?></i>
  </font></td>
</tr> 
</table>
<table align=center width=70%> 
<tr>
  <td align=center><font size=4><i><?=$row["fBText"]?></i></font></td>
</tr>
</table>
<table align=center width=100%>
<tr>
   <td align=left width=30%><font size=4><b>Заявитель: </b><i><?=$row["fPost"]?> <?=$row["Depositor"]?></font></i></td>
</tr>

</table>
<br>
<hr>


<form action=vizir.php method=post>
<input type=hidden name=id value=<?=$row["id"]?>>
<table align=center width=80% border=0>
<tr>
  <td align=right><b>Виза: </td>
  <td align=left title="">
    <SELECT NAME="fVisa">
      
     <OPTION VALUE="к исполнению">к исполнению</OPTION>
     <OPTION VALUE="для руководства">для руководства</OPTION>
     <OPTION VALUE="предоставить отчет">предоставить отчет</OPTION>
    </SELECT>
</td>
<td align=right><b>Исполнитель: </td>
<td><select name=Ispolnitel>
    <Option selected="selected" value=" ">-выберите исполнителя-</option>
<? $query="select * from sotrudniki order by fFIO ASC";
   $result=mysql_query($query) or die ("ошибка в запросе".$query);
   while ($row=mysql_fetch_array($result)) {
?>
    <option value="<?=$row["fId"]?>"> <?=$row["fFIO"]?></option>
<?}?>
</select></td>

</tr>
<tr>
  <td align=right><b>Отметка руководителя</td>
  <td align=left colspan=3 title=""><TextAREA name=fBossText cols=80 rows=3></TEXTAREA></td>
</tr>
<tr>
  <td align=right><b>Дата</td>
  <td align=left title="(Год_Месяц_Дата)"><input type=text name=fBossDate value=<?=$date?>></td>
</tr>
<tr>
  <td align=right><b>Подпись</td>
  <td align=left title="">
     <SELECT NAME="fBoss">
      <OPTION VALUE="Сотник А.Н">Сотник А.Н.</OPTION>
     <OPTION VALUE="Гапонов Д">Гапонов Д</OPTION>
    </SELECT></td>
</tr>
</table>
<center><br><input type=submit value=Сохранить>
</form>
<hr>

</body>