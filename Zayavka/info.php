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
left join Oborud on deposition.fDevice=Oborud.idO   
left join sotrudniki on deposition.fWFIO=sotrudniki.fId  
left join TypeWork on deposition.WorkType=TypeWork.idW
left join TypeAkt on deposition.fType=TypeAkt.Fid   
left join Station on deposition.fStation=Station.fCod
left join Predpr1 on deposition.fFilial=Predpr1.fId
left join ARMs on deposition.fARM=ARMs.fId
 
where id=".$id;
$result = mysql_query ($query) or die("Erorr in query: <br><i>".$query."</i>");
?> 
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

<caption><font size="5"><b><center>Заявка №<u></b><i><?=$id?></u></center></i></font></caption>

<table border=0 width=100% align=center>
<tr valign=top>
 <td width=50%>
  <table border=1 width=100% align=center bordercolor=C0C0C0 cellspacing=0 cellpadding=0><br>
   <tr>
    <th align=center width=50% colspan=2 bgcolor=FFC0CB height=30>Содержание заявки</th>
   </tr>
   <? while ($row=mysql_fetch_array($result)) {?>
   <tr>
    <th align=left width=20%>Номер вход. документа</th>
    <td align=left bgcolor=98FB98><i><?=$row["VhodZayav"]?></i></td>
   </tr>
   <tr> 
    <th align=left>Дата вход. документа</th>
    <td align=left bgcolor=98FB98><i><?=$row["fDateBegin"]?></i></td>
   </tr>
   <tr>
    <th align=left>Номер исход. документа</th>
    <td align=left bgcolor=98FB98><i><?=$row["IshodZayav"]?></i></td>
   </tr>
   <tr>
    <th align=left>Дата исход. документа</th> 
    <td align=left bgcolor=98FB98><i><?=$row["fDateIsx"]?></i></td>
   </tr>
   <tr>
    <th align=left>Станция</th>
    <td align=left bgcolor=98FB98><i><?=$row["Station"]?></i></td>
   </tr>
   <tr>
    <th align=left>Предприятие</th>
    <td align=left bgcolor=98FB98><i><?=$row["Filial"]?></i></td>
   </tr>
   <tr>
    <th align=left>Рабочее место</th>
    <td align=left bgcolor=98FB98><i><?=$row["ARM"]?></i></td>
   </tr>
   <tr>
    <th align=left>Кабинет</th>
    <td align=left bgcolor=98FB98><i><?=$row["Kabinet"]?></i></td>
   </tr>
   <tr>
    <th align=left>Конт. телефоны</th>
    <td align=left bgcolor=98FB98><i><?=$row["Telephon"]?></i></td>
   </tr>
   <tr>
    <th align=left>Вид работы</th>
    <td align=left bgcolor=98FB98><i><?=$row["WorkType"]?></i></td>
   </tr>
   <tr>
    <th align=left>Текст заявки</th>
    <td align=left bgcolor=98FB98><i><?=$row["fBText"]?></i></td>
   </tr>
   <tr>
    <th align=left>Заявитель</th>
    <td align=left bgcolor=98FB98><i><?=$row["Depositor"]?></i></td>
   </tr>
   <tr>
    <th align=left>Должность</th>
    <td align=left bgcolor=98FB98><i><?=$row["fPost"]?></i></td>
   </tr>
  </table>
  <br><center>
<? 
 if (($sec<3)  and ($row["Top"]=='') and ($row["fDevice"]==0)) { ?>
<a href=updNaryad.php?id=<?=$row["id"]?>>Редактировать_наряд</a><br> 
<?} 
 if (($sec<3)  and ($row["Top"]<>'') ) { ?>
<a href=updAkt.php?id=<?=$row["id"]?>>Редактировать_акт</a> <br>
<?}
 if ($sec<3) { ?> 
<a href=export.php?id=<?=$row["id"]?>>Экспорт наряда в WORD</a>
<?}?>
  <table border=1 width=100% align=center bordercolor=C0C0C0 cellspacing=0 cellpadding=0><br>
   <tr>
    <th align=center width=50% colspan=2 bgcolor=FFC0CB height=30>О назначении исполнителя</th>
   </tr>
   <tr>
    <th align=left width=20%>Визирование</th>
    <td align=left bgcolor=98FB98><i><?=$row["fVisa"]?></i></td>
   </tr>
   <tr>
    <th align=left>Назначенный исполнитель</th>
    <td align=left bgcolor=98FB98><i><?=$row["Ispolnitel"]?></i></td>
   </tr>
   <tr>
    <th align=left>Отметка руководителя</th>
    <td align=left bgcolor=98FB98><i><?=$row["fBossText"]?></i></td>
   </tr>
   <tr>
    <th align=left>Дата назначения</th>
    <td align=left bgcolor=98FB98><i><?=$row["fBossDate"]?></i></td>
   </tr>
   <tr>
    <th align=left>Назначил:</th>
    <td align=left bgcolor=98FB98><i><?=$row["fBoss"]?></i></td>
   </tr> 
  </table>
 </td>
 <td width=50% valign=top align=center>
  <table border=1 width=100% align=center bordercolor=C0C0C0 cellspacing=0 cellpadding=0><br>
   <tr>
    <th align=center width=50% colspan=2 bgcolor=FFC0CB height=30>Отметка об исполнении</th>
   </tr>
   <tr>
    <th align=left width=20%>Тип акта</th>
    <td align=left bgcolor=98FB98><i><?=$row["Top"]?></i> 
    <?if ($row["Top"]<>'')   { ?> 
     <a href=akt<?=$row["fTypeId"]?>.php?id=<?=$row["id"]?>> 
     <img src=pics/print.wmf height=18 title=Распечатать_акт border=0></a>
    <?}?>
    </td>
   </tr>
   <tr>
    <th align=left width=20%>Установлено</th>
    <td align=left bgcolor=98FB98><i><?=$row["fStatus"]?></i></td>
   </tr>
   <tr>
    <th align=left width=20%>Оборудование</th>
    <td align=left bgcolor=98FB98><i><?=$row["Nazvan1"]?></i></td>
   </tr>
   <tr>
    <th align=left width=20%>Модель</th>
    <td align=left bgcolor=98FB98><i><?=$row["fModel"]?></i></td>
   </tr>
   <tr>
    <th align=left width=20%>Год выпуска оборуд.</th>
    <td align=left bgcolor=98FB98><i><?=$row["fGod"]?></i></td>
   </tr>
   <tr>
    <th align=left width=20%>сер.номер</th>
    <td align=left bgcolor=98FB98><i><?=$row["fSerN"]?></i></td>
   </tr>
   <tr>
    <th align=left width=20%>инв.номер</th>
    <td align=left bgcolor=98FB98><i><?=$row["fInvN"]?></i></td>
   </tr>
   <tr>
    <th align=left width=20%>Исполнитель</th>
    <td align=left bgcolor=98FB98><i><?=$row["Ispolnitel2"]?></i></td>
   </tr>
   <tr>
    <th align=left width=20%>Отметка исполнителя</th>
    <td align=left bgcolor=98FB98><i><?=$row["fWText"]?></i></td>
   </tr>
   <tr>
    <th align=left width=20%>Дата исполнения</th>
    <td align=left bgcolor=98FB98><i><?=$row["fWDate"]?></i></td>
   </tr>
  </table>
<? if ($sec==10){   ?>

<table border=1 width=100% align=center bordercolor=C0C0C0 cellspacing=0 cellpadding=0><br>
 <th align=center width=50% colspan=2 bgcolor=FFC0CB height=30>Отметка руководителя</th>
 <tr>
   <form name=upd action=addOtmet.php method=post>
   <input type=hidden name=id value=<?=$row["id"]?>>
    <th align=left width=50%>Отчетный месяц</th>
    <td bgcolor=98FB98>
     <SELECT NAME="DateOtm">
      <?for ($i=1;$i<13;$i++) {?>
      <option value="<?=$i?>" <?if (($i==$Otm) or ($i==$row["fDateOtm"])) print("selected");?>><?=$monate[$i];?></option>
      <?}?>
     </select>
    </td>
   </tr>
  <tr>
   <th align=left>Вид работ </th>
   <td bgcolor=98FB98>
     <SELECT NAME="VidRabot">
      <Option selected="selected" value=" ">--- Наименование работ ---</option>
      <? $query="select * from VidRab ORDER BY Nazvan2 ASC";
         $result=mysql_query($query) or die ("ошибка в запросе".$query);
         while ($row2=mysql_fetch_array($result)) {?>
          <option value="<?=$row2["idR"]?>" <?if ($row2["idR"]==$row["VidRabot"]) {?> selected<?}?>> <?=$row2["Nazvan2"]?></option>
         <?}?>
     </select>
   </td>
  </tr>
  <tr>
   <th align=left>Количество </th>
   <td align=left bgcolor=98FB98><input type=text name=Kol value='<?=$row["Kol"]?>' size=10>штук
   </td>
  </tr>
  <tr>                             
   <th align=left>Оборудование</th>
   <td bgcolor=98FB98>
    <SELECT NAME="VidOborud">
     <Option selected="selected" value=" ">-Выберите оборудование-</option>   
      <? $query="select * from Oborud where fHardware=1";
         $result=mysql_query($query) or die ("ошибка в запросе".$query);
         while ($row2=mysql_fetch_array($result)) {?>
     <option value="<?=$row2["idO"]?>"<?if ($row2["idO"]==$row["VidOborud"]) {?> selected<?}?>> <?=$row2["Nazvan"]?></option>
     <?}?>
    </select>
   </td>
  </tr>
  <tr>
   <th align=left>Вид задач </th>
   <td bgcolor=98FB98>
    <SELECT NAME="fDevice">
     <Option selected="selected" value=" ">--- Вид задач ---</option>
     <? $query="select * from Oborud where fHardware=0 order by Nazvan ASC";
        $result2=mysql_query($query) or die ("ошибка в запросе".$query);
        while ($row2=mysql_fetch_array($result2)) {?>
        <OPTION VALUE="<?=$row2["idO"]?>"<?if ($row2["idO"]==$row["fDevice"]) {?> selected<?}?>><? print($row2["Nazvan"]);?></OPTION>
     <?}?>
    </SELECT>
   </td>
  </tr>
  <tr><td colspan=2 ALIGN=CENTER>
   <input type=submit value=Сохранить>
  </td></tr>
  </form>
<?}?>
</tr>
</table>
</td>
</tr>
</table>
<?}?>
</body>
</html>   