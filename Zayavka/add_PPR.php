<?
 require("config.php");
 $d=date("m");
 $err=0;
if (isset($fDateBegin)) {
 if (!isset($fBText)) {$err=1;}
 if (!isset($fWText)) {$err=2;}
 if (!isset($fWDate)) {$err=3;}
 if (!isset($fWFIO)) { $err=4;}
 if (!isset($Station)) { $err=5;}
 if (!isset($Filial)) { $err=6;}
 if (!isset($ARM)) { $err=7;}
 if (!isset($fDevice)) { $err=8;}
 $query="insert into deposition (
           fDateBegin,
           fFilial,
           fStation,
           fARM,
           Kabinet,
           Telephon,
           fDevice,
           Depositor,
           fInvN,
           fBText,
           fWFIO,
           fWText,
           fWDate,
           otmetka,DateOtm) 
          values (
             '".$fDateBegin."',
             '".$Filial."',
             '".$Station."',
             '".$ARM."',
             '".$Kabinet."',
             '".$Telephon."', 
             '".$fDevice."',
             '".$Depositor."',
             '".$InvN."',
             '".$fBText."',
             '".$fWFIO."',
             '".$fWText."',
             '".$fWDate."',
             '1',
             '".date("m")."')";
$result = mysql_query ($query) or die ("Could not adding into table deposition!<i><br>".$query); 
setcookie("formStation",$Station,time()+360000);
setcookie("formFilial",$Filial,time()+360000);
setcookie("formARM",$ARM,time()+360000);
setcookie("formidO",$fDevice,time()+360000);
header("Location: arhiv.php");  
}
else{
$query="select * from Oborud order by Nazvan ASC";
   $result=mysql_query($query) or die ("������ � �������".$query);
  $date=date("Y-m-j H:i:s");?>
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
 
<body background="pics/index_05.jpg"> 

<caption><font size="5" color=000080><b><center>�������� ���������� �� ��������� ���</center></font></caption>
<center>�� ���������� ���������������� ����� �� ������������ �����������
<form name=upd action=addTelefon2.php method=post>
<center><table border=0 width=70% align=center>
 <tr bgcolor=palegreen>
<th align=right width=40%>���� ���������� ���</th>
<td align=left>
<input type=text  name=fDateBegin value=<?=$date?> 
title="(���_�����_����)">
</td>
</tr>

 <tr bgcolor=palegreen>
<th align=right bordercolor=C0C0C0>����������� �������������</th>

<td align=left title="">
<table>
<tr><td>�������:</td>
<td bgcolor=grey>
<SELECT NAME="Station">
<Option value=""></option>
      <? 
       $query="Select * from Station order by fName ASC";
       $result0 = mysql_query ($query) or die("Could not create table Predpr");
       while ($row=mysql_fetch_array($result0)) { ?>
     <OPTION VALUE="<?=$row["fCod"]?>" <?if (($row["fCod"]==30) or ($row["fCod"]==$formStation)) print("selected");?>>
   <? print($row["fName"]);?></OPTION>
      <?}?>
    </SELECT>
</td></tr>
 <tr><td>������:</td>
<td bgcolor=grey>
<SELECT NAME="Filial">
<Option value=""></option>
      <? 
       $query="Select * from Predpr1 order by fName ASC";
       $result0 = mysql_query ($query) or die("Could not create table Predpr");
       while ($row=mysql_fetch_array($result0)) { ?>
     <OPTION VALUE="<?=$row["fId"]?>" <?if (($row["fId"]==99) or ($row["fId"]==$formFilial)) print("selected");?>>
   <? print($row["fName"]);?></OPTION>
      <?}?>
    </SELECT>
</td></tr>
<tr><td>������� �����:</td>
<td bgcolor=grey>
<SELECT NAME="ARM">
<Option selected="selected" value=" ">-�������� ������� ����� -</option>
      <?
       $query="Select * from ARMs order by fName ASC";
       $result0 = mysql_query ($query) or die("Could not create table Predpr");
       while ($row=mysql_fetch_array($result0)) { ?>
     <OPTION VALUE="<?=$row["fId"]?>" <?if ($row["fId"]==$formARM) print("selected");?>>
   <? print($row["fName"]);?></OPTION>
      <?}?>
    </SELECT>
</td></tr>

</table>
</td>
</tr>
</table>
<hr>
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


 </form>
</body> 
<?}?>  