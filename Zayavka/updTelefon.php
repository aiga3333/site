<? 
 require("config.php");

if (isset($Filial)) {
 $query = "update deposition set
 fDateBegin='".$fDateBegin."',
 fStation='".$Station."',
 fARM='".$ARM."',
 fFilial='".$Filial."',
 Kabinet='".$Kabinet."',
 Telephon='".$Telephon."',
 fDevice='".$fDevice."',
 Depositor='".$Depositor."',  
 fInvN='".$fInvN."',
 fBText='".$fBText."',
 fWFIO='".$fWFIO."',
 fWText='".$fWText."',
 fWDate='".$fWDate."'
where id=".$id;
 $result = mysql_query ($query) or die ("������ � ������� � �������!<i><br>".$query);
 header("Location: arhiv.php");
}
else {
  $query="Select * from deposition where id=".$id ;
  $result = mysql_query ($query) or die("Could not create table");
  $row=mysql_fetch_array($result);}

?>             
<?require("stil.php");
?>
<body background="pics/index_05.jpg">
<caption><font size="5" color=000080><b><u><center>�������� ��������� � ������ �</b>
<font color=DC143C><i><?=$id?></u></center></i></font></font></caption>

<form action=updTelefon.php method=post>
<center>
<table  border=1 align=center width="70%">
<input type=hidden name=id value=<?=$row["id"]?>>                   
<br>

<tr>
  <th align=right width=40%>���� ����������� ������</th>
  <td align=left title="(���-�����-����)"><input type=text name=fDateBegin value="<?=$row["fDateBegin"]?>"></td>
</tr>


<tr>
<th align=right>����������� �������������</th>
<td align=left title="(�������� �����������)">
<table align=center width=100%>
<tr><td>�������:</td>
<td bgcolor=grey>
<SELECT NAME="Station">
<Option value=""> </option>
      <? 
       $query="Select * from Station order by fName ASC";
       $result0 = mysql_query ($query) or die("Could not create table Predpr");
       while ($row1=mysql_fetch_array($result0)) { ?>
     <OPTION VALUE="<?=$row1["fCod"]?>" <?if ($row1["fCod"]==$row["fStation"]) print("selected");?>>
   <? print($row1["fName"]);?></OPTION>
      <?}?>
    </SELECT>
</td></tr>
 <tr><td>������:</td>
<td bgcolor=grey>
<SELECT NAME="Filial">
<Option value="">-�������� �����������-</option>
      <? 
       $query="Select * from Predpr1 order by fName ASC";
       $result0 = mysql_query ($query) or die("Could not create table Predpr");
       while ($row1=mysql_fetch_array($result0)) { ?>
     <OPTION VALUE="<?=$row1["fId"]?>" <?if ($row1["fId"]==$row["fFilial"]) print("selected");?>>
   <? print($row1["fName"]);?></OPTION>
      <?}?>
    </SELECT>
</td></tr>
<tr><td>������� �����(�����):</td>
<td bgcolor=grey>
<SELECT NAME="ARM">
<Option selected="selected" value=" ">-�������� ������� ����� -</option>
      <?
       $query="Select * from ARMs order by fName ASC";
       $result0 = mysql_query ($query) or die("Could not create table Predpr");
       while ($row1=mysql_fetch_array($result0)) { ?>
     <OPTION VALUE="<?=$row1["fId"]?>" <?if ($row1["fId"]==$row["fARM"]) print("selected");?>>
   <? print($row1["fName"]);?></OPTION>
      <?}?>
    </SELECT>
  <a href=ARMAdd.php title="�������� ������"><img src=pics/add.gif></a>
</td></tr>
</table>
</td></tr>
<tr>
  <th align=right>� ��������</th>
  <td align=left title="(������� ���������)"><input type=text name=Kabinet value="<?=$row["Kabinet"]?>"></td>
</tr>

<tr>
  <th align=right>����. ��������</th>
  <td align=left title="(������� ���������)"><input type=text name=Telephon value="<?=$row["Telephon"]?>"></td>
</tr>

<tr>
  <th align=right>������</th>
  <td align=left title="(������������)">  
<?
  $query="Select * from Oborud order by Nazvan ASC";
  $result = mysql_query ($query) or die("Could not create table Hosts");
?>
    <SELECT NAME="fDevice">
     <OPTION VALUE=""></OPTION>
      <? while ($row1=mysql_fetch_array($result)) { ?>
     <OPTION VALUE="<? echo $row1["idO"]?>"
       <?if ($row["fDevice"]==$row1["idO"]) {print(" selected");}?>>
      <?print($row1["Nazvan"]);?></OPTION>
      <?}?>
    </SELECT>

</tr>

<tr>
  <th align=right>���������</th>
  <td align=left title="(��� ���������)"><input type=text name=Depositor value="<?=$row["Depositor"]?>"></td>
</tr>

<tr>
  <th align=right>��������� �����</th>
  <td align=left title="(�����������)"><input type=text name=fInvN value="<?=$row["fInvN"]?>"></td>
</tr>

<tr>
  <th align=right>������� ������</th>
<td  align=left  title="(������� ������)">
<textarea size=4 cols=50 name=fBText><?=$row["fBText"]?></textarea></td>
 
</td>

</tr>

<tr>
  <th align=right>������ ��������:</th>
  <td align=left title="(��� �����������)"> 
<?
  $query="Select * from sotrudniki order by fFIO ASC";
  $result = mysql_query ($query) or die("Could not create table Hosts");
?>
    <SELECT NAME="fWFIO">
     <OPTION VALUE=""></OPTION>
      <? while ($row1=mysql_fetch_array($result)) { ?>
     <OPTION VALUE="<? echo $row1["fId"]?>"
       <?if ($row["fWFIO"]==$row1["fId"]) {print(" selected");}?>>
      <?print($row1["fFIO"]);?></OPTION>
      <?}?>
    </SELECT>

</tr>

<tr>
  <th align=right>�������� ����</th>
  <td align=left title="(�������� ����)">
<textarea size=4 cols=50 name=fWText><?=$row["fWText"]?></textarea></td>
</tr>


<tr>
  <th align=right>���� ���������� ������</th>
  <td align=left title="(���-�����-����)"><input type=text name=fWDate value="<?=$row["fWDate"]?>"></td>
</tr>
 
</table>
<br><input type="submit" value="���������">
</form>
</body>
 