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
 $result = mysql_query ($query) or die ("������ � ������� � �������!<i><br>".$query);
 header("Location: outbox.php");
   }
else {  
 $query="Select * from deposition where id=".$id;
  $result = mysql_query ($query) or die("Could not create table deposition");
 $row=mysql_fetch_array($result);    } 
$date=date("Y-m-j H:i:s");?>
  
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
   $result=mysql_query($query) or die ("������ � �������".$query);
   while ($row=mysql_fetch_array($result)) {?>
     <option value="<?=$row["Fid"]?>"> <?=$row["Type"]?></option>
<?}?>

<?
if ($fType==1) {  ?>
<table align=center width=80% border=1>
<caption><font size="5" color=000080><b><center>��� ����������� �����</center></font></caption>

<tr>
  <td align=right width=40%>� ���� �������������� ������������ ������������ 
����-4,���� ���������� ���������: </td>
  <td align=left ><textarea name=fStatus rows=3 cols=40></textarea></td>
</tr>
<tr>
  <td align=right >��������� ��������� ���� �����:</td>
  <td align=left >
<textarea name=fWText rows=3 cols=40></textarea></td> 
</tr>

<tr>
  <td align=right >��� �</td>
  <td align=left title="(�������� �����)"  >
<input type=text name=fSerN value=''></td>
</tr>
<tr>
  <td align=right >��� �</td>
  <td align=left title="(����������� �����)"  >
<input type=text name=fInvN value=''></td>
</tr>
<tr>
  <td align=right >������ ��������:</td>
  <td align=left title="(���.��� �����������)" >
<select name=fWFIO>
    <Option selected="selected" value=" ">-�������� �����������-</option>
<? $query="select * from sotrudniki";
   $result=mysql_query($query) or die ("������ � �������".$query);
   while ($row=mysql_fetch_array($result)) {
?>
    <option value="<?=$row["fId"]?>"> <?=$row["fFIO"]?></option>
<?}?>
</select></td>
</tr>
<tr>
  <td align=right >���� ����������� ����</td>
  <td align=left title="(���-�����-����)" >
<input type=text name=fWDate value=<?=$date?>></td>
</tr>
 
</table>
<center><br><input type=submit value=���������>
<?}?>
 
<?
if ($fType==2) {  ?>
<table align=center width=80% border=1>
<caption><font size="5" color=000080><b><center>��� �������</center></font></caption>
<tr>
  <td align=right width=40%>��� ������� :</td>
  <td align=left title="(��� �������)" width=60%>
<input type=text name=fGod value=''></td>
</tr>
<tr>
  <td align=right >���������  ���  ���������:</td>
  <td align=left title="(���.��� �����������)" >
<select name=fWFIO>
    <Option selected="selected" value=" ">-�������� �����������-</option>
<? $query="select * from sotrudniki";
   $result=mysql_query($query) or die ("������ � �������".$query);
   while ($row=mysql_fetch_array($result)) {
?>
    <option value="<?=$row["fId"]?>"> <?=$row["fFIO"]?></option>
<?}?>
</select></td>
</tr>

<tr>
  <td align=right >� ���, ��� ���������� ����������� ������</td>
  <td >
    <SELECT NAME="fDevice">
     <Option selected="selected" value=" ">-�������� ������������-</option>
<? $query="select * from Oborud";
   $result=mysql_query($query) or die ("������ � �������".$query);
   while ($row=mysql_fetch_array($result)) {
?>
    <option value="<?=$row["idO"]?>"> <?=$row["Nazvan"]?></option>
<?}?>
</select>
</td>
</tr>
<tr>
  <td align=right  >����� ����:</td>
  <td align=left title="(����� ����)"  >
<input type=text name=NomAkt value=''></td>
</tr>
  
<tr>
  <td align=right  >��� �</td>
  <td align=left title="(�������� �����)"  >
<input type=text name=fSerN value=''></td>
</tr>
<tr>
  <td align=right >��� �</td>
  <td align=left title="(����������� �����)"  >
<input type=text name=fInvN value=''></td>
</tr>
<tr>
  <td align=right  >�������� �����������:</td>
  <td align=left ><textarea name=fStatus rows=3 cols=40></textarea></td>
</tr>
<tr>
  <td align=right >����������:</td>
  <td align=left >
<textarea name=fWText rows=3 cols=40></textarea></td> 
</tr>
<tr>
  <td align=right  >���� ����������� ����</td>
  <td align=left title="(���-�����-����)"  >
<input type=text name=fWDate value=<?=$date?>></td>
</tr>
 
</table>
<center><br><input type=submit value=���������>
<?}?> 

<?
if ($fType==3) {  ?>
<table align=center width=100% border=1>
<caption><font size="5" color=000080><b><center>��� ������������</center></font></caption>
<tr>
  <td align=right width=40%>����������  ����-4 ���������</td>
  <td align=left width=60%><textarea name=fStatus rows=3 cols=40></textarea></td>
</tr>
<tr>
  <td align=right >���������� ���������� ��������� ���������� ������������, 
���������� � ��������� ��������������-����������� �����������:</td>
  <td align=left  >
<textarea name=fWText rows=3 cols=40></textarea></td>
</tr>
<tr>
  <td align=right  >������ ��������:</td>
  <td align=left title="(���.��� �����������)"  >
<select name=fWFIO>
    <Option selected="selected" value=" ">-�������� �����������-</option>
<? $query="select * from sotrudniki";
   $result=mysql_query($query) or die ("������ � �������".$query);
   while ($row=mysql_fetch_array($result)) {
?>
    <option value="<?=$row["fId"]?>"> <?=$row["fFIO"]?></option>
<?}?>
</select></td>
</tr>
<tr>
  <td align=right >���� ����������� ����</td>
  <td align=left title="(���-�����-����)"  >
<input type=text name=fWDate value=<?=$date?>></td>
</tr>

</table>
<center><br><input type=submit value=���������>
<?}?> 
    
</form>
</body> 
