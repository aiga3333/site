<?
require("config.php");
if (isset($DateOtm)) {
$query = "update deposition set
VidOborud='".$VidOborud."',
VidRabot='".$VidRabot."',
DateOtm='".$DateOtm."',
YearOtm='".date("Y")."',
fDevice='".$fDevice."',
Kol='".$Kol."'
where id=".$id;
$result = mysql_query ($query) or die ("Ошибка в запросе к таблице!<i><br>".$query);
header("Location: arhiv.php?order=Otmetka&arr=A");
}
else{
$query="Select * from deposition where id=".$id;
$result = mysql_query ($query) or die("Could not create table deposition");
$row=mysql_fetch_array($result);    
$date=date("Y-m-j H:i:s"); 
} 
?>
<body background="pics/index_05.jpg">

<caption><font size="6" color=000080><b><center>Отметка для отчетности по заявке №<?=$id?></center></font></caption>
<form name=upd action=addOtmet.php method=post>
<input type=hidden name=id value=<?=$row["id"]?>>

<table align=center width=80% border=1>
<tr>
  <td align=right width=50%>Отчетный месяц</td>
  <td>
    <SELECT NAME="DateOtm">
<?for ($i=1;$i<13;$i++) {
?>
    <option value="<?=$i?>" <?if ($i==$Otm) print("selected");?>> 
<?=$monate[$i];?></option>
<?}?>
</select>
</td>
</tr>
 
<tr>
  <td align=right>Вид работ </td>
<td>
    <SELECT NAME="VidRabot">
     <Option selected="selected" value=" ">--- Наименование работ ---</option>
<? $query="select * from VidRab ORDER BY Nazvan2 ASC";
   $result=mysql_query($query) or die ("ошибка в запросе".$query);
   while ($row=mysql_fetch_array($result)) {
?>
    <option value="<?=$row["idR"]?>"> <?=$row["Nazvan2"]?></option>
<?}?>
</select>
  </td></tr>

<tr>
<td align=right>Количество </td>
<td align=left><input type=text name=Kol value='1' size=10>штук</td></tr>

<tr>                             
  <td align=right>Оборудование</td>
  <td>
    <SELECT NAME="VidOborud">
     <Option selected="selected" value=" ">-Выберите оборудование-</option>
<? $query="select * from Oborud";
   $result=mysql_query($query) or die ("ошибка в запросе".$query);
   while ($row=mysql_fetch_array($result)) {
?>
    <option value="<?=$row["idO"]?>"> <?=$row["Nazvan"]?></option>
<?}?>
</select>
</td>
</tr>


<tr>
  <td align=right>Вид задач </td>
<td>
    <SELECT NAME="fDevice">
  <Option selected="selected" value=" ">--- Вид задач ---</option>
 <? $query="select * from Oborud order by Nazvan ASC";
   $result2=mysql_query($query) or die ("ошибка в запросе".$query);
   while ($row2=mysql_fetch_array($result2)) {?>
   <OPTION VALUE="<?=$row2["idO"]?>" 
 >
   <? print($row2["Nazvan"]);?></OPTION>
      <?}?>
    </SELECT>
</td>
</tr>
 
</table>

<center><br><input type=submit value=Сохранить>
</form>
</body>