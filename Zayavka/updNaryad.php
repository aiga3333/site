<? 
 require("config.php");

if (isset($fWDate)) {
 $query = "update deposition set
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
<caption><font size="5" color=000080><b><u><center>Страница для редактирования наряда №</b>
<font color=DC143C><i><?=$id?></u></center></i></font></font></caption>

<form action=updNaryad.php method=post>
<center>
<table  border=1 align=center width="70%">
<input type=hidden name=id value=<?=$row["id"]?>>                   
<br>
 
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
 