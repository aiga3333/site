<html>
<meta http-equiv="expires" content="0">
<?
  require("config.php");

$query="Select deposition.*,
Oborud.Nazvan 
as Nazvan1,
sotrudniki.fFIO 
as Ispolnitel2, 
TypeWork.Type 
as WorkType, 
TypeAkt.Fid 
as fTypeId,
TypeAkt.Type 
as Top, 
Station.fName
as Station,
Predpr1.fName
as Filial,
ARMs.fName
as ARM
from deposition 
left join sotrudniki on deposition.fWFIO=sotrudniki.fId 
left join TypeWork on deposition.WorkType=TypeWork.idW
left join Station on deposition.fStation=Station.fCod
left join Predpr1 on deposition.fFilial=Predpr1.fId
left join ARMs on deposition.fARM=ARMs.fId
left join Oborud on deposition.fDevice=Oborud.idO  
left join TypeAkt on deposition.fType=TypeAkt.Fid   
 
where id=".$id;
$result = mysql_query ($query) or die("Erorr in query: <br><i>".$query."</i>");
?> 


<body background="pics/index_05.jpg">

<caption><font size="5"><b><u><center>������ </b><i><?=$id?></u></center></i></font></caption>

<table border=0 width=100% align=center>

<tr valign=top>
<td width=50%>
<table border=1 width=100% align=center bordercolor=C0C0C0 cellspacing=0 cellpadding=0><br>

<tr>
<th align=center width=50% colspan=2 bgcolor=FFC0CB height=30>���������� ������</th>
</tr>

<? while ($row=mysql_fetch_array($result))
{?>

<tr>
<th align=left width=20%>����� ����. ���������</th>
<td align=left bgcolor=98FB98><i><?=$row["VhodZayav"]?></i></td>
</tr>

<tr><th align=left>���� ����. ���������</th>
<td align=left bgcolor=98FB98><i><?=$row["fDateBegin"]?></i></td>
</tr>

<tr><th align=left>����� �����. ���������</th>
<td align=left bgcolor=98FB98><i><?=$row["IshodZayav"]?></i></td>
</tr>

<tr><th align=left>���� �����. ���������</th>
<td align=left bgcolor=98FB98><i><?=$row["fDateIsx"]?></i></td>
</tr>

<tr>
<th align=left>�������</th>
<td align=left bgcolor=98FB98><i><?=$row["Station"]?></i></td>
</tr>

<tr>
<th align=left>�����������</th>
<td align=left bgcolor=98FB98><i><?=$row["Filial"]?></i></td>
</tr>

<tr>
<th align=left>������� �����</th>
<td align=left bgcolor=98FB98><i><?=$row["ARM"]?></i></td>
</tr>

<tr><th align=left>����� �����������</th>
<td align=left bgcolor=98FB98><i><?=$row["Adres"]?></i></td>
</tr>

<tr><th align=left>�������</th>
<td align=left bgcolor=98FB98><i><?=$row["Kabinet"]?></i></td>
</tr>

<tr><th align=left>����. ��������</th>
<td align=left bgcolor=98FB98><i><?=$row["Telephon"]?></i></td>
</tr>

<tr><th align=left>��� ������</th>
<td align=left bgcolor=98FB98><i><?=$row["WorkType"]?></i></td>
</tr>

<tr><th align=left>����� ������</th>
<td align=left bgcolor=98FB98><i><?=$row["fBText"]?></i></td>
</tr>

<tr><th align=left>���������</th>
<td align=left bgcolor=98FB98><i><?=$row["Depositor"]?></i></td>
</tr>

<tr><th align=left>���������</th>
<td align=left bgcolor=98FB98><i><?=$row["fPost"]?></i></td>
</tr>
</table> 
 
<td width=50% valign=top align=center>
<table border=1 width=100% align=center bordercolor=C0C0C0 cellspacing=0 cellpadding=0><br>


<tr>
<th align=center width=50% colspan=2 bgcolor=FFC0CB height=30>� ���������� �����������</th>
</tr>

<tr>
<th align=left width=20%>�����������</th>
<td align=left bgcolor=98FB98><i><?=$row["fVisa"]?></i></td>
</tr>
<form method=post action=otkaz.php>
<input type=hidden name=id value=<?=$id?>>
<input type=hidden name=Ispolnitel2 value=<?=$row["Ispolnitel2"]?>>
<tr><th align=left>����������� �����������</th>
<td align=left bgcolor=98FB98><i><?=$row["Ispolnitel2"]?></i><input type=submit value="����� �� ����������"></td>
</tr>
</form>

<tr><th align=left>������� ������������</th>
<td align=left bgcolor=98FB98><i><?=$row["fBossText"]?></i></td>
</tr>

<tr><th align=left>���� ����������</th>
<td align=left bgcolor=98FB98><i><?=$row["fBossDate"]?></i></td>
</tr>

<tr>
<th align=left>��������:</th>
<td align=left bgcolor=98FB98><i><?=$row["fBoss"]?></i></td>
</tr>

  
 </td>
</tr>
</table>
<br>
<table border=1 width=100% align=center bordercolor=C0C0C0 cellspacing=0 cellpadding=0><br>


<tr>
<th align=center width=50% colspan=2 bgcolor=FFC0CB height=30>� ���������� �����������</th>
</tr>

<tr>
<th align=left width=20%>�����������</th>
<td align=left bgcolor=98FB98><i><?=$row["fVisa"]?></i></td>
</tr>
</table>
</body>
<br>
<center>
<a href=export1.php?id=<?=$row["id"]?>><u>������� ������ � WORD</u></a> 
</center> 
<?}?>

</html>   