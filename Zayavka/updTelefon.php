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
 $result = mysql_query ($query) or die ("Ошибка в запросе к таблице!<i><br>".$query);
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
<caption><font size="5" color=000080><b><u><center>Внесение изменений в заявку №</b>
<font color=DC143C><i><?=$id?></u></center></i></font></font></caption>

<form action=updTelefon.php method=post>
<center>
<table  border=1 align=center width="70%">
<input type=hidden name=id value=<?=$row["id"]?>>                   
<br>

<tr>
  <th align=right width=40%>Дата поступления заявки</th>
  <td align=left title="(год-месяц-дата)"><input type=text name=fDateBegin value="<?=$row["fDateBegin"]?>"></td>
</tr>


<tr>
<th align=right>Структурное подразделение</th>
<td align=left title="(Название организации)">
<table align=center width=100%>
<tr><td>Станция:</td>
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
 <tr><td>Филиал:</td>
<td bgcolor=grey>
<SELECT NAME="Filial">
<Option value="">-выберите предприятие-</option>
      <? 
       $query="Select * from Predpr1 order by fName ASC";
       $result0 = mysql_query ($query) or die("Could not create table Predpr");
       while ($row1=mysql_fetch_array($result0)) { ?>
     <OPTION VALUE="<?=$row1["fId"]?>" <?if ($row1["fId"]==$row["fFilial"]) print("selected");?>>
   <? print($row1["fName"]);?></OPTION>
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
       while ($row1=mysql_fetch_array($result0)) { ?>
     <OPTION VALUE="<?=$row1["fId"]?>" <?if ($row1["fId"]==$row["fARM"]) print("selected");?>>
   <? print($row1["fName"]);?></OPTION>
      <?}?>
    </SELECT>
  <a href=ARMAdd.php title="Изменить список"><img src=pics/add.gif></a>
</td></tr>
</table>
</td></tr>
<tr>
  <th align=right>№ Кабинета</th>
  <td align=left title="(кабинет заявителя)"><input type=text name=Kabinet value="<?=$row["Kabinet"]?>"></td>
</tr>

<tr>
  <th align=right>Конт. телефоны</th>
  <td align=left title="(телефон заявителя)"><input type=text name=Telephon value="<?=$row["Telephon"]?>"></td>
</tr>

<tr>
  <th align=right>Задача</th>
  <td align=left title="(Оборудование)">  
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
  <th align=right>Заявитель</th>
  <td align=left title="(ФИО Заявителя)"><input type=text name=Depositor value="<?=$row["Depositor"]?>"></td>
</tr>

<tr>
  <th align=right>Заводской номер</th>
  <td align=left title="(инвентарный)"><input type=text name=fInvN value="<?=$row["fInvN"]?>"></td>
</tr>

<tr>
  <th align=right>Причина вызова</th>
<td  align=left  title="(Причина вызова)">
<textarea size=4 cols=50 name=fBText><?=$row["fBText"]?></textarea></td>
 
</td>

</tr>

<tr>
  <th align=right>Работу выполнил:</th>
  <td align=left title="(ФИО исполнителя)"> 
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
  <th align=right>Принятые меры</th>
  <td align=left title="(Принятые меры)">
<textarea size=4 cols=50 name=fWText><?=$row["fWText"]?></textarea></td>
</tr>


<tr>
  <th align=right>Дата выполнения заявки</th>
  <td align=left title="(год-месяц-дата)"><input type=text name=fWDate value="<?=$row["fWDate"]?>"></td>
</tr>
 
</table>
<br><input type="submit" value="Сохранить">
</form>
</body>
 