<?
require("config.php");

if (isset($fWText)) {
$query="insert into deposition (
           fStation,
           fFilial,
           fARM,
           VhodZayav,
           fDateBegin,
           IshodZayav,
           fDateIsx,
           Adres,
           Kabinet,
           Telephon,
           WorkType,   
           fBText,
           Depositor,
           fPost
           ) 
          values ( 
             '".$fStation."',
             '".$fFilial."',
             '".$fARM."',
             '".$VhodZayav."',
             '".$fDateBegin."',
             '".$IshodZayav."',
             '".$fDateIsx."', 
             '".$Adres."',
             '".$Kabinet."',
             '".$Telephon."',
             '".$WorkType."',
             '".$fBText."',
             '".$Depositor."',
             '".$fPost."')";
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
$date=date("Y-m-j H:i:s");?>
  
<?
require("stil.php");
?>
<body background="pics/index_05.jpg">
<form name=fType action=akt_osm.php method=post>

<center><font size="5" color=000080><b><center>��� ������� ������������ ��������� ������������</center></font></center>
<table align=center width=80% border=1>
<tr>
  <td align=right >���������  ���  ���������:</td>
  <td align=left title="(���.��� �����������)" >
<select name=fWFIO>
    <Option selected="selected" value=" ">-�������� �����������-</option>
<? 
   $query = "SELECT *, Otdel.fName as Otd FROM sotrudniki left join Otdel on sotrudniki.fOtdel=Otdel.fId where Otdel.fName='".$otdel."'";
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
  <td align=right width=40%>��� ������� :</td>
  <td align=left title="(��� �������)" width=60%>
<input type=text name=fGod value=''></td>
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

</body> 
