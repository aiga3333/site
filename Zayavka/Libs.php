<? if ($sec<2) {?>
    <body bgcolor=coral>
     <center><font size=5>������ ��������!</font>
    </body
<?  exit;
   }
   require("config.php");
?>
<html>
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
<head>
<meta http-equiv="expires" content="0">
</head>
<script language="JavaScript">
<!--
function load(url) {parent.ggg.location.href= url;}
// -->
</script>

<body background="pics/index_05.jpg">   
<center>
<table align=center width=100% bgcolor=BDB76B cellspacing=0  cellpadding=0 rules=cols>
<tr>
 <td <?if ($mode==1) {?>bgcolor=FFF8DC<?}?> align=center title="���������� �����������"
     onMouseOver="this.style.backgroundColor='F0E68C'" 
     onMouseOut="this.style.backgroundColor=''" onClick="load('Libs.php?mode=1')">
  <font size=4>�����������</font></td>
 <td <?if ($mode==2) {?>bgcolor=FFF8DC<?}?> align=center title="���������� ����������� � ������� ����"
     onMouseOver="this.style.backgroundColor='F0E68C'" 
     onMouseOut="this.style.backgroundColor=''" onClick="load('Libs.php?mode=2')">
  <font size=4>���������</font></td>
<?if (($mode==1) or ($mode>=20)) {?>
<table bgcolor=FFF8DC border=0 align=center width=100%>
 <tr>
<? $query="select * from Otdel";
   $result=mysql_query($query);?>
  <td align=left width=50% valign=top>
   �������������:<br>
   <select size=10 name=otdel width=100%
    ONCHANGE="location.href = 'Libs.php?mode=1&id1='+this.options[this.selectedIndex].value">
   <option>������� �������������.</option>
<? while ($row=mysql_fetch_array($result)) {?>
    <option value=<?=$row["fId"]?> <?if ($row["fId"]==$id1) print("selected");?>><?=$row["fName"]?></option>
<?}?>
   </select>
   <br><a href=Libs.php?mode=10 title='�������� �������������'><img src=pics/add.gif></a>
  </td><td align=right valign=top width=50%>
<? $query="select * from sotrudniki where fOtdel='".$id1."'";
   $result=mysql_query($query);?>
  ����������:<br>
   <select size=10 name=sotrudnik width=100% 
    ONCHANGE="location.href = 'Libs.php?mode=1&id1=<?=$id1?>&id2='+this.options[this.selectedIndex].value">
   <option>������� ����������.</option>
<? while ($row=mysql_fetch_array($result)) {?>
    <option value=<?=$row["fId"]?> <?if ($row["fId"]==$id2) print("selected");?>><?=$row["fFIO"]?></option>
<?}?>
   </select>
   <br><a href=Libs.php?mode=10 title='����� ���������'><img src=pics/add_u.gif></a>
  </td>
 </tr>
<? if (isset($id2)) {?> 
 <tr>
 <td colspan=2>
<? $query="select * from sotrudniki where fId='".$id2."'";
   $result=mysql_query($query);
   $row=mysql_fetch_array($result);
?>
  <br>
  <table width=80% border=0>
   <tr>
    <td align=right width=50%>�������������:</td>
    <td align=left width=50% bgcolor=lightpalegreen><?=$row["fId"]?></td>
   </tr>
   <tr>
    <td align=right width=50%><a href=Libs.php?mode=20&id1=<?=$id1?>&id2=<?=$id2?>>������� �.�.:</a></td>
     <form name=fFIO action=Libs.php method=post>
      <input type=hidden name=id1 value=<?=$id1?>>
      <input type=hidden name=id2 value=<?=$id24?>>
    <td align=left width=50% bgcolor=lightpalegreen>
      <?if ($mode==20) {?>
         <input type=text name=fFIO value='<?=$row["fFIO"]?>' size=25><input type=submit value=".">
<?      } 
        else print($row["fFIO"]);?>
    </td>
    </form>
   </tr>
   <tr>
    <td align=right width=50%>���������:</td>
    <td align=left width=50% bgcolor=lightpalegreen><?=$row["IspolnDolj"]?></td>
   </tr>
   <tr>
    <td align=right width=50%>������� ������:</td>
    <td align=left width=50% bgcolor=lightpalegreen><?=$row["login"]?></td>
   </tr>
   <tr>
    <td align=right width=50%>������:</td>
    <td align=left width=50% bgcolor=lightpalegreen><?=$row["password"]?></td>
   </tr>
   <tr>
    <td align=right width=50%>������� �������:</td>
    <td align=left width=50% bgcolor=lightpalegreen><?=$row["sec"]?></td>
   </tr>
   <tr>
    <td align=right width=50%>e-mail:</td>
    <td align=left width=50% bgcolor=lightpalegreen><?=$row["fEmail"]?></td>
   </tr>
   <tr>
    <td align=right width=50%>������������:</td>
    <td align=left width=50% bgcolor=lightpalegreen><?=$row["fVisible"]?></td>
   </tr>
  </table>
 </td>
</tr>
<?}?>
</table>
<?}?>

</body>