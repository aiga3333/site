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

<caption><font size="5" color=000080><b><center>Добавить заявку </center></font></caption>
 
<form name=upd action=addTelefon1.php method=post>
<center><table border=0 width=70% align=center>
 <tr bgcolor=palegreen>
<th align=right width=40%>Дата поступления заявки</th>
<td align=left>
<input type=text  name=fDateBegin value=<?=$date?> 
title="(Год_Месяц_Дата)">
</td>
</tr>

 <tr bgcolor=palegreen>
<th align=right bordercolor=C0C0C0>Структурное подразделение</th>

<td align=left title="">
<table>
<tr><td>Станция:</td>
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
 <tr><td>Филиал:</td>
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
<tr><td>Рабочее место(отдел):</td>
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
  <a href=ARMAdd.php title="Изменить список"><img src=pics/add.gif></a>
</td></tr>

</table>
</td>
</tr>

 <tr bgcolor=palegreen>
<th align=right>Заявитель</th>
<td align=left><input type=text name=Depositor value='' title="(ФИО_заявителя)"></td>
</tr>

 <tr bgcolor=palegreen>
<th align=right>№ кабинета</th>
<td align=left><input type=text name=Kabinet value='' title="(номер кабинет)"></td>
</tr>

 <tr bgcolor=palegreen>
<th align=right>Конт. телефоны</th>
<td align=left><input type=text name=Telephon value='' 
title="(рабочий_телефон)"></td>
</tr>

 <tr bgcolor=palegreen>
  <th align=right bordercolor=C0C0C0>
Задача</th>
  <td>
    <SELECT NAME="fDevice">
     <Option selected="selected" value=" "></option>
<?  while ($row=mysql_fetch_array($result)) {?>
   <OPTION VALUE="<?=$row["idO"]?>" <?if (($row["idO"]==13) or ($row["idO"]==$formidO)) print("selected");?>>
   <? print($row["Nazvan"]);?></OPTION>
      <?}?>
    </SELECT>
</td>
</tr>

 <tr bgcolor=palegreen>
<th align=right >Заводской номер</th>
<td align=left><input type=text name=InvN value='' title="(инвентарный)"></td>
</tr>

 <tr bgcolor=palegreen>
  <td align=right><b>Работу выполнил:</b></td>
  <td align=left title="(фам.имя специалиста)">

<select name=fWFIO>
 <? $query="select * from sotrudniki order by fFIO ASC";
   $result=mysql_query($query) or die ("ошибка в запросе".$query);
   while ($row=mysql_fetch_array($result)) {
?>
  <OPTION VALUE="<?=$row["fId"]?>"
       <?if ($who==$row["fFIO"]) {print("selected");}?>
     >
       <?print($row["fFIO"]);?></OPTION>
      <?}?>
    </SELECT>
</td>
</tr>

 <tr bgcolor=palegreen>
<th align=right bordercolor=<?if ($err==1) {?>coral<?} else {?>C0C0C0<?}?>>
Причина вызова</th>
<td colspan=4><textarea name=fBText rows=5 cols=50></textarea></td>
</tr>

<tr align=right bordercolor=<?if ($err==2) {?>coral<?} else {?>C0C0C0<?}?>>
<tr bgcolor=palegreen>
<th align=right>
Принятые меры</th>
<td colspan=4"><textarea name=fWText rows=5 cols=50></textarea></td>
</tr>

<tr align=right bordercolor=<?if ($err==3) {?>coral<?} else {?>C0C0C0<?}?>>
<tr bgcolor=palegreen>
<th align=right>
Дата выполнения заявки</th>
<td align=left><input type=text name=fWDate value=<?=$date?> title="(год месяц дата)">
</td>
</tr>


</table>

<center><br><input type=submit value=Сохранить>
</form>
<?require("akt_osm.php");?>
 </body> 
<?}?>  