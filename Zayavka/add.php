<?
require("config.php");
 if (isset($VhodZayav)) 
{
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
$result = mysql_query ($query) or die 
("Could not adding into table primer!<i><br>".$query); 
 header("Location: inbox.php");
}
else {
  $query="Select * from TypeWork";
  $result0 = mysql_query ($query) or die("Could not create table TypeWork");
$date=date("Y-m-j H:i:s");

?>
<?require("stil.php");
?>

<body background="pics/index_05.jpg">

<caption><font size="6" color=000080><b><center>������</center></font></caption>
<hr>
<p align=right>����� ���������</p>

<form name=upd action=add.php method=post>
<table align=center width=100% border=1>
<tr>
<td align=center width=25%>

</td>
<td align=center>
<table border=0 width=100% align=center>
<tr align=center>
<th align=right width=30% bgcolor=Lavendar bordercolor=C0C0C0>�������</th>
<td align=left title=""  >
    <SELECT NAME="fStation">
     <Option value="">-�������� �������-</option>
      <? 
        $query="Select * from Station ORDER BY fName ASC";
        $result = mysql_query ($query) or die("Could not create table Predpr");
         while ($row=mysql_fetch_array($result)) { ?>
     <OPTION VALUE="<?=$row["fCod"]?>"
       <?if ($row["fCod"]==30) {print("selected");}?>
     >
       <? print($row["fName"]);?></OPTION>
      <?}?>
    </SELECT>
</tr>
<tr align=center>
<th align=right width=30% bgcolor=Lavendar bordercolor=C0C0C0>�����������</th>
<td align=left title=""  >
    <SELECT NAME="fFilial">
     <Option value="">-�������� �����������-</option>
      <? 
        $query="Select * from Predpr1 order by fName ASC";
        $result = mysql_query ($query) or die("Could not create table Predpr");
        while ($row=mysql_fetch_array($result)) { ?>
     <OPTION VALUE="<?=$row["fId"]?>"
       <?if ($row["fId"]==99) {print("selected");}?>
     >
       <? print($row["fName"]);?></OPTION>
      <?}?>
    </SELECT>
</tr>

<tr align=center>
<th align=right width=30% bgcolor=Lavendar bordercolor=C0C0C0>����� (���)</th>
<td align=left title=""  >
    <SELECT NAME="fARM">
     <Option value="">-�������� �����-</option>
      <? 
        $query="Select * from ARMs order by fName ASC";
        $result = mysql_query ($query) or die("Could not create table Predpr");
        while ($row=mysql_fetch_array($result)) { ?>
     <OPTION VALUE="<?=$row["fId"]?>"
        >
   
       <? print($row["fName"]);?></OPTION>
      <?}?>
    </SELECT>
  <a href=ARMAdd2.php title="�������� ������"><img src=pics/add.gif></a></td>
</tr>

<tr>
<th align=right bgcolor=Lavendar>����� ����. ���������</th>
<td align=left><input type=text name=VhodZayav value='' title="(����� ��.)" size=30></td>
</tr>

<tr><th align=right bgcolor=Lavendar>���� ����. ���������</th>
<td align=left><input type=text name=fDateBegin value=<?=$date?> title="(���_�����_����)" size=30></td>
</tr>

<tr><th align=right bgcolor=Lavendar>����� �����. ���������</th>
<td align=left><input type=text name=IshodZayav value='' title="(����� ���.)" size=30></td>
</tr>

<tr><th align=right bgcolor=Lavendar>���� �����. ���������</th>
<td align=left><input type=text name=fDateIsx value=<?=$date?> title="(���_�����_����)" size=30></td>
</tr>

<tr><th align=right bgcolor=Lavendar>����� �����������</th>
<td align=left><input type=text name=Adres value='' title="(�����(�������),�����,���)" size=30></td>
</tr>

<tr><th align=right bgcolor=Lavendar>� ��������</th>
<td align=left><input type=text name=Kabinet value='' title="(����� �������)" size=30></td>
</tr>

<tr><th align=right bgcolor=Lavendar>����. ��������</th>
<td align=left><input type=text name=Telephon value='' title="(�������)" size=30></td>
</tr>
<tr>
<th align=right bgcolor=Lavendar>��� ������</th>
<td align=left title="">
    <SELECT NAME="WorkType">
<Option selected="selected" value=" ">-�������� ��� ������-</option>
      <? while ($row=mysql_fetch_array($result0)) { ?>
     <OPTION VALUE="<?=$row["idW"]?>"
       <?if ($Type==$row["idW"]) {print("selected");}?>
     >
       <?print($row["Type"]);?></OPTION>
      <?}?>
    </SELECT>
  <a href=WorkAdd.php title="�������� ������"><img src=pics/add.gif></a></td>
</tr>

 </table>

</td>
</tr>
</table>
<hr>
<p align=right>���������� ������</p>
<table align=center width=100% border=0>
<tr>
  <td align=right>����� ������</td>
  <td colspan=4"><textarea name=fBText rows=3 cols=80></textarea></td>
</tr>
</table>
<br>
<table align=center width=80% border=0>

<tr>
  <td align=right>��������� ���������</td>
  <td align=left><input type=text name=fPost value='' size=30></td>
  <td align=right>���������</td>
  <td align=left><input type=text name=Depositor value='' title="(��� ���������)" size=30></td>
</tr>

</table>

<center><br><input type=submit value=���������>
</form>
</body><?}?> 