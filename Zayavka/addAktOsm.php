<?
 require("config.php");
 $d=date("m");
 $err=0;
if (isset($fDateBegin)) {
 if (!isset($fBText)) {$err=1;}
 if (!isset($fWText)) {$err=2;}
 if (!isset($fWDate)) {$err=3;}
 if (!isset($fWFIO1)) { $err=4;}
 if (!isset($Station)) { $err=5;}
 if (!isset($Filial)) { $err=6;}
 if (!isset($ARM)) { $err=7;}
 if (!isset($fDevice)) { $err=8;}
 $query="insert into deposition (
           fDateBegin,
           fFilial,
           fStation,
           fARM,
           fDevice,
           VidOborud,
           fModel,
           fSerN,
           fInvN,
           fGod,
           fBText,
           fWFIO,
           fStatus,
           fWText,
           fWDate,
           otmetka,DateOtm,fType,Kol) 
          values (
             '".$fDateBegin."',
             '".$Filial."',
             '".$Station."',
             '".$ARM."',
             '".$fDevice."',
             '".$fDevice."',
             '".$fModel."',
             '".$fSerN."',
             '".$fInvN."',
             '".$fGod."',
             '".$fBText."',
             '".$fWFIO1."',
             '".$fStatus."',
             '".$fWText."',
             '".$fWDate."',
             '2',
             '".date("m")."','2','1')";
$result = mysql_query ($query) or die ("Could not adding into table deposition!<i><br>".$query); 
setcookie("formStation",$Station,time()+360000);
setcookie("formFilial",$Filial,time()+360000);
setcookie("formARM",$ARM,time()+360000);
setcookie("formidO",$fDevice,time()+360000);
setcookie("formFIO",$fWFIO1,time()+360000);
header("Location: arhiv.php");  
}
else{
$query="select * from Oborud order by Nazvan ASC";
   $result=mysql_query($query) or die ("ошибка в запросе".$query);
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
Автозаявка по акту осмотра.<br>
<caption><font size="5" color=000080><b><center>АКТ осмотра технического состояния оборудования</center></font></caption>
 
<form name=upd action=addAktOsm.php method=post>
<input type=hidden name=fBText value="Поступление оборудования к осмотру (в ремонт).">
<center><table border=0 width=70% align=center>
 <tr bgcolor=palegreen>
<th align=right width=40%>Дата поступления оборудования к осмотру</th>
<td align=left>
<input type=text  name=fDateBegin value=<?=$date?> 
title="(Год_Месяц_Дата)">
</td>
</tr>
<tr bgcolor=palegreen>
  <th align=right >Настоящий  акт  составлен</th>
  <td align=left title="(фам.имя специалиста)" >
<select name=fWFIO1>
<? 
   $query = "SELECT *, sotrudniki.fId as id, Otdel.fName as Otd FROM sotrudniki left join Otdel on sotrudniki.fOtdel=Otdel.fId where Otdel.fName='".$otdel."' order by fFIO";
   $result=mysql_query($query) or die ("ошибка в запросе".$query);
   while ($row=mysql_fetch_array($result)) {
?>
    <option value="<?=$row["id"]?>" <?if ($row["id"]==$formFIO) print("selected");?>>
     <?=$row["fFIO"]?></option>
<?}?>
</select></td>
</tr>
<tr bgcolor=palegreen>
  <th align=right rowspan=2>в том, что произведен технический осмотр</th>
  <td >
    <SELECT NAME="fDevice">
<? $query="select * from Oborud where fHardware=1";
   $result=mysql_query($query) or die ("ошибка в запросе".$query);
   while ($row=mysql_fetch_array($result)) {
?>
    <option value="<?=$row["idO"]?>" <?if ($row["idO"]==$formidO) print("selected");?>> <?=$row["Nazvan"]?></option>
<?}?>
</select>
</td>
</tr>
<tr bgcolor=palegreen>
<td>
<table width=100%>
<tr>
  <td align=right width=20%>Модель</td>
  <td bgcolor=grey width=80% align=left title="наименование устройства"  >
<input type=text name=fModel value=''></td>
</tr>
<tr>
  <td align=right width=20%>зав №</td>
  <td bgcolor=grey align=left title="(серийный номер)"  >
<input type=text name=fSerN value=''></td>
</tr>
<tr>
  <td align=right width=20%>инв №</td>
  <td bgcolor=grey align=left title="(инвентарный номер)"  >
<input type=text name=fInvN value=''></td>
</tr>
<tr>
  <td align=right width=20%>год выпуска :</td>
  <td bgcolor=grey align=left title="(год выпуска)">
<input type=text name=fGod value=''></td>
</tr>
</td></tr></table>

<tr bgcolor=palegreen>
<th align=right bordercolor=C0C0C0>Установленного в</th>

<td align=left title="">
<table width=100%>
<tr><td align=right width=20%>Станция:</td>
<td bgcolor=grey>
<SELECT NAME="Station">
<Option value=""></option>
      <? 
       $query="Select * from Station order by fName ASC";
       $result0 = mysql_query ($query) or die("Could not create table Predpr");
       while ($row=mysql_fetch_array($result0)) { ?>
     <OPTION VALUE="<?=$row["fCod"]?>" <?if ($row["fCod"]==$formStation) print("selected");?>>
   <? print($row["fName"]);?></OPTION>
      <?}?>
    </SELECT>
</td></tr>
 <tr><td align=right >Филиал:</td>
<td bgcolor=grey>
<SELECT NAME="Filial">
<Option value=""></option>
      <? 
       $query="Select * from Predpr1 order by fName ASC";
       $result0 = mysql_query ($query) or die("Could not create table Predpr");
       while ($row=mysql_fetch_array($result0)) { ?>
     <OPTION VALUE="<?=$row["fId"]?>" <?if ($row["fId"]==$formFilial) print("selected");?>>
   <? print($row["fName"]);?></OPTION>
      <?}?>
    </SELECT>
</td></tr>
<tr><td align=right >Рабочее место:</td>
<td bgcolor=grey>
<SELECT NAME="ARM">
<Option selected="selected" value=" ">-выберите рабочее место -</option>
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
<tr bgcolor=palegreen>
  <th align=right  >Осмотром установлено</th>
  <td align=left ><textarea name=fStatus rows=3 cols=40></textarea></td>
</tr>
<tr bgcolor=palegreen>
  <th align=right >Заключение</th>
  <td align=left >
<textarea name=fWText rows=3 cols=40></textarea></td> 
</tr>
<tr>
  <th align=right  bgcolor=palegreen>Дата подписания</th>
  <td align=left title="(год-месяц-дата)"  >
<input type=text name=fWDate value=<?=$date?>></td>
</tr>
 
</table>
<center><br><input type=submit value=Сохранить>


 </form>
</body> 
<?}?>  