<?
require("config.php");

if (isset($fWText)) {
 $query = "update deposition set
 NomAkt ='".$NomAkt."',
 fDevice ='".$fDevice."',
 fSerN ='".$fSerN."',
 fInvN='".$fInvN."',
 fGod='".$fGod."' ,
 fWDate ='".$fWDate."',
 fWFIO ='".$fWFIO."',
 fStatus='".$fStatus."',
fWText ='".$fWText."',
 fType='".$fType."' 
where id=".$id;
 $result = mysql_query ($query) or die ("Ошибка в запросе к таблице!<i><br>".$query);
 header("Location: outbox.php");
   }
else {  
 $query="Select * from deposition where id=".$id;
  $result = mysql_query ($query) or die("Could not create table deposition");
 $row=mysql_fetch_array($result);    } ?>

<?
require("stil.php");
?>
<body background="pics/index_05.jpg">
<form name=fType action=verdikt.php method=post>
<input type=hidden name=id value=<?=$row["id"]?>>
<input type=hidden name=fType value=<?=$fType?>>

<select name=fe size=5
ONCHANGE='parent.ggg.location.href =
"verdikt.php?fType="+this.options[this.selectedIndex].value+"&id=<?=$id?>"'>
<? $query="select * from TypeAkt";
   $result=mysql_query($query) or die ("ошибка в запросе".$query);
   while ($row=mysql_fetch_array($result)) {?>
     <option value="<?=$row["Fid"]?>"> <?=$row["Type"]?></option>
<?}?>

<?
if ($fType==1) {  ?>
<table align=center width=80% border=1>
<caption><font size="5" color=000080><b><center>Акт выполненных работ</center></font></caption>

<tr>
  <td align=right width=40%>В ходе произведенного обследования специалистом 
ЛОИС-4,было обнаружено следующее: </td>
  <td align=left ><textarea name=fStatus size=4 cols=40><?=$row["fStatus"]?></textarea></td>
</tr>
<tr>
  <td align=right >Выполнены следующие виды работ:</td>
  <td align=left >
<textarea name=fWText size=4 cols=40><?=$row["fWText"]?></textarea></td> 
</tr>

<tr>
  <td align=right >зав №</td>
  <td align=left title="(серийный номер)"  >
<input type=text name=fSerN value="<?=$row["fSerN"]?>"></td>
</tr>
<tr>
  <td align=right >инв №</td>
  <td align=left title="(инвентарный номер)"  >
<input type=text name=fInvN value="<?=$row["fInvN"]?>"></td>
</tr>
<tr>
  <td align=right >Работу выполнил:</td>
  <td align=left title="(фам.имя специалиста)" >
<select name=fWFIO>
    <Option selected="selected" value=" ">-выберите исполнителя-</option>
<? $query="select * from sotrudniki by fFIO ASC";
   $result=mysql_query($query) or die ("ошибка в запросе".$query);
   while ($row1=mysql_fetch_array($result)) {
?>
<OPTION VALUE="<? echo $row1["fId"]?>"
       <?if ($row["fWFIO"]==$row1["fId"]) {print(" selected");}?>>
      <?print($row1["fFIO"]);?></OPTION>
      <?}?>
    </SELECT>
</td>
</tr>
<tr>
  <td align=right >Дата составления акта</td>
  <td align=left title="(год-месяц-дата)" >
<input type=text name=fWDate value="<?=$row["fWDate"]?>"></td>
</tr>
 
</table>
<center><br><input type=submit value=Сохранить>
<?}?>
 
<?
if ($fType==2) {  ?>
<table align=center width=80% border=1>
<caption><font size="5" color=000080><b><center>Акт осмотра</center></font></caption>
<tr>
  <td align=right width=40%>год выпуска :</td>
  <td align=left title="(год выпуска)" width=60%>
<input type=text name=fGod value=''></td>
</tr>
<tr>
  <td align=right >Настоящий  акт  составлен:</td>
  <td align=left title="(фам.имя специалиста)" >
<select name=fWFIO>
    <Option selected="selected" value=" ">-выберите исполнителя-</option>
<? $query="select * from sotrudniki";
   $result=mysql_query($query) or die ("ошибка в запросе".$query);
   while ($row=mysql_fetch_array($result)) {
?>
    <option value="<?=$row["fId"]?>"> <?=$row["fFIO"]?></option>
<?}?>
</select></td>
</tr>

<tr>
  <td align=right >в том, что произведен технический осмотр</td>
  <td >
    <SELECT NAME="fDevice">
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
  <td align=right  >номер акта:</td>
  <td align=left title="(номер акта)"  >
<input type=text name=NomAkt value=''></td>
</tr>
  
<tr>
  <td align=right  >зав №</td>
  <td align=left title="(серийный номер)"  >
<input type=text name=fSerN value=''></td>
</tr>
<tr>
  <td align=right >инв №</td>
  <td align=left title="(инвентарный номер)"  >
<input type=text name=fInvN value=''></td>
</tr>
<tr>
  <td align=right  >Осмотром установлено:</td>
  <td align=left ><textarea name=fStatus rows=3 cols=40></textarea></td>
</tr>
<tr>
  <td align=right >Заключение:</td>
  <td align=left >
<textarea name=fWText rows=3 cols=40></textarea></td> 
</tr>
<tr>
  <td align=right  >Дата составления акта</td>
  <td align=left title="(год-месяц-дата)"  >
<input type=text name=fWDate value=''></td>
</tr>
 
</table>
<center><br><input type=submit value=Сохранить>
<?}?> 

<?
if ($fType==3) {  ?>
<table align=center width=100% border=1>
<caption><font size="5" color=000080><b><center>Акт обследования</center></font></caption>
<tr>
  <td align=right width=40%>специалист  ЛОИС-4 установил</td>
  <td align=left width=60%><textarea name=fStatus rows=3 cols=40></textarea></td>
</tr>
<tr>
  <td align=right >Необходимо приобрести следующее количество оборудования, 
материалов и выполнить организационно-технические мероприятия:</td>
  <td align=left  >
<textarea name=fWText rows=3 cols=40></textarea></td>
</tr>
<tr>
  <td align=right  >Работу выполнил:</td>
  <td align=left title="(фам.имя специалиста)"  >
<select name=fWFIO>
    <Option selected="selected" value=" ">-выберите исполнителя-</option>
<? $query="select * from sotrudniki";
   $result=mysql_query($query) or die ("ошибка в запросе".$query);
   while ($row=mysql_fetch_array($result)) {
?>
    <option value="<?=$row["fId"]?>"> <?=$row["fFIO"]?></option>
<?}?>
</select></td>
</tr>
<tr>
  <td align=right >Дата составления акта</td>
  <td align=left title="(год-месяц-дата)"  >
<input type=text name=fWDate value=''></td>
</tr>

</table>
<center><br><input type=submit value=Сохранить>
<?}?> 
    
</form>
</body> 
 