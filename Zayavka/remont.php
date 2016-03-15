<?
require("config.php");
if (isset($fId)) {
$query = "update deposition set
fStation='".$Station."',
fFilial='".$Filial."',
fARM='".$ARM."'
where id='".$fId."'";
$result = mysql_query ($query) or die ("Ошибка в запросе к таблице!<i><br>".$query);
$query = "update deposition set
DateOtm='12' where fWDate>'2011-11-30'";
/* $result = mysql_query ($query) or die ("Ошибка в запросе к таблице!<i><br>".$query);*/
}
 $query="Select deposition.*,
Predpr.Otdel
as fPredp,
Predpr.NameP
as Tip,
Predpr1.fName
as Filial,
Station.fName
as Station,
ARMs.fName
as ARM
from deposition 
left join Predpr on Predpr.fId=deposition.Predp
left join Predpr1 on Predpr1.fId=deposition.fFilial
left join Station on Station.fCod=deposition.fStation
left join ARMs on ARMs.fId=deposition.fARM
where ((fFilial='') or (fARM='') or (fStation=''))";

$result = mysql_query ($query) or die("Erorr in query: <br><i>".$query."</i>");
?>

<table border="0" align="center" width="100%">
<th width=3% bgcolor=lightblue>№</th>
<th width=20% bgcolor=lightblue><font size=2>Предприятие</th></font>
<th width=25% bgcolor=lightblue><font size=2>Причина вызова</th></font> 
 
<? while ($row=mysql_fetch_array($result)) {?>
<form method=post action=remont.php>
<input type=hidden name=fId value=<?=$row["id"]?>>
<tr>
<td><?=$row["id"]?></td>
<td><font size=2><?=$row["Filial"]?>(<?=$row["fARM"]?>)</td></font>
<?$s = substr($row["fBText"], 0, 50);?>
<td><font size=2><?=$s?>..
</td>
<td>
<table>
<tr><td>
<SELECT NAME="Station">
<Option value="">-выберите станцию-</option>
      <? 
       $query="Select * from Station order by fName ASC";
       $result0 = mysql_query ($query) or die("Could not create table Predpr");
       while ($row1=mysql_fetch_array($result0)) { ?>
     <OPTION VALUE="<?=$row1["fCod"]?>" <?if ($row1["fCod"]==$row["fStation"]) {print("selected");}?>>
   <? print($row1["fName"]);?></OPTION>
      <?}?>
    </SELECT>
<SELECT NAME="Filial">
<Option value="">-выберите предприятие-</option>
      <? 
       $query="Select * from Predpr1 order by fName ASC";
       $result0 = mysql_query ($query) or die("Could not create table Predpr");
       while ($row1=mysql_fetch_array($result0)) { ?>
     <OPTION VALUE="<?=$row1["fId"]?>" <?if ($row1["fId"]==$row["fFilial"]) {print("selected");}?>>
   <? print($row1["fName"]);?></OPTION>
      <?}?>
    </SELECT>
<SELECT NAME="ARM">
<Option value=" ">-выберите рабочее место -</option>
      <?
       $query="Select * from ARMs order by fName ASC";
       $result0 = mysql_query ($query) or die("Could not create table Predpr");
       while ($row1=mysql_fetch_array($result0)) { ?>
     <OPTION VALUE="<?=$row1["fId"]?>" <?if ($row1["fId"]==$row["fARM"]) {print("selected");}?>>
   <? print($row1["fName"]);?></OPTION>
      <?}?>
    </SELECT>
  <input type=submit value="Ok">
</td></tr>
</form>
</table>
</td>
</tr>
<? } ?>
</table>
