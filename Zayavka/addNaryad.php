<?
require("config.php"); 
if (isset($fWDate)) {
 $query = "update deposition set
 fWDate ='".$fWDate."',
 fWFIO ='".$fWFIO."',
 fWText ='".$fWText."'
where id=".$id;
 $result = mysql_query ($query) or die ("Ошибка в запросе к таблице!<i><br>".$query);
header("Location: outbox.php");}

else {
$query="Select deposition.*,
sotrudniki.fFIO 
as Ispolnitel,
sotrudniki.IspolnDolj 
as Ispolnitel2,
Station.fName
as Station,
Predpr1.fName
as Filial,
ARMs.fName
as ARM
from deposition   
left join sotrudniki on deposition.fWFIO=sotrudniki.fId  
left join Station on deposition.fStation=Station.fCod
left join Predpr1 on deposition.fFilial=Predpr1.fId
left join ARMs on deposition.fARM=ARMs.fId
where id=".$id;
$result = mysql_query ($query) or die ("ошибка в запросе к таблице!<i><br>".$query); 
 
 $row=mysql_fetch_array($result); 
}
 $date=date("Y-m-j H:i:s");
?>

           
<html>
<head>
<meta http-equiv="expires" content="0">
<meta name=Generator content="Microsoft Word 11 (filtered)">
<title>Наряд</title>
<?
require("stilNaryad.php"); 
?>

 </head>

 


<body lang=RU>
 

<div class=Section1>
<h5 align=right style='text-align:right'><font size=1 face="Times New Roman"><span
style='font-size:8.0pt'>Приказ 646Ц от 11-09-2003</span></font></h5>

<h5 align=right style='text-align:right'><font size=1 face="Times New Roman"><span
style='font-size:8.0pt'>Приложение №6</span></font></h5>

<h5 align=center style='text-align:center'><b><font size=3
face="Times New Roman"><span style='font-size:12.0pt;font-weight:bold'>Наряд на
выполнение заявки <?=$id?></span></font></b></h5>

<p class=MsoNormal><font size=2 face="Times New Roman"><span lang=RU-MO
style='font-size:10.0pt'>Дата входящей заявки <u><?=$row["fDateBegin"]?></u></span></font></p>

<p class=MsoNormal><font size=2 face="Times New Roman"><span lang=RU-MO
style='font-size:10.0pt'>&nbsp;</span></font></p>

<p class=MsoNormal><font size=2 face="Times New Roman"><span lang=RU-MO
style='font-size:10.0pt'>Ф.И.О. <u><?=$row["Depositor"]?></u></span></font></p>

<p class=MsoNormal><font size=1 face="Times New Roman"><span lang=RU-MO
style='font-size:8.0pt'>                 </span></font></p>

<p class=MsoNormal><font size=1 face="Times New Roman"><span lang=RU-MO
style='font-size:8.0pt'>&nbsp;</span></font></p>

<p class=MsoNormal><font size=2 face="Times New Roman"><span style='font-size:
10.0pt'>Структурное подразделение (отдел) <u><?=$row["Filial"]?> ст.<?=$row["Station"]?>(<?=$row["ARM"]?>)</td></font></u></span></font></p>

<p class=MsoNormal><font size=2 face="Times New Roman"><span lang=RU-MO
style='font-size:10.0pt'>Причина</span></font><span style='position:absolute;
z-index:3;margin-left:615px;margin-top:13px;width:2px;height:2px'><img width=2
height=2 src="Naryad.files/image001.gif"></span><span lang=RU-MO> вызова  
<u><?=$row["fBText"]?></u></span></p>

<form action=addNaryad.php method=post>
<input type=hidden name=id value=<?=$row["id"]?>>

<p class=MsoNormal><font size=2 face="Times New Roman"><span lang=RU-MO
style='font-size:10.0pt'>Меры по  устранению &nbsp;&nbsp; <u>
<TextAREA name=fWText cols=80 size=4></TEXTAREA></u></span></font></p>

<p class=MsoNormal><font size=2 face="Times New Roman"><span style='font-size:
10.0pt'>Работу выполнил (а): &nbsp;&nbsp;&nbsp;&nbsp; <u>
<tr>
   <td align=left title="(фам.имя специалиста)"  >
<select name=fWFIO>
    <Option selected="selected" value=" ">-выберите исполнителя-</option>
<? $query="select * from sotrudniki order by fFIO DESC";
   $result1=mysql_query($query) or die ("ошибка в запросе".$query);
   while ($row1=mysql_fetch_array($result1)) {
?>
    <option value="<?=$row1["fId"]?>" <?if ($row["Ispolnitel"]==$row1["fFIO"]) {print("selected");}?>> <?=$row1["fFIO"]?></option>
<?}?>
</select></td>
</tr>      </u>

<p class=MsoNormal><font size=1 face="Times New Roman"><span style='font-size:
8.0pt'>                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(роспись специалиста)</span></font></p>

<p class=MsoNormal><font size=1 face="Times New Roman"><span style='font-size:
8.0pt'>&nbsp;</span></font></p>

<p class=MsoNormal><font size=2 face="Times New Roman"><span lang=RU-MO
style='font-size:10.0pt'>Дата составления наряда <u>
<tr>
   <td align=left title="(Год_Месяц_Дата)">
<input type=text name=fWDate value=<?=$date?>></td>
</tr>
</span></font></p>
 </u>
<p class=MsoNormal><font size=2 face="Times New Roman"><span lang=RU-MO
style='font-size:10.0pt'>&nbsp;</span></font></p>

<h6><b><font size=2 face="Times New Roman"><span style='font-size:10.0pt;
font-weight:normal'>Заказчик___________________                        
Начальник отдела_________________</span></font></b></h6>

<p class=MsoNormal><font size=1 face="Times New Roman"><span lang=RU-MO
style='font-size:8.0pt'>                              (подпись)                                                                                       
 (подпись)</span></font></p>

<h5 align=center style='text-align:center'><b><font size=3
face="Times New Roman">&nbsp;</font></b></h5>
  
<h5 align=center style='text-align:center'><b><font size=3
face="Times New Roman">&nbsp;</font></b></h5>

<h5><b><font size=3 face="Times New Roman">&nbsp;</font></b></h5>

<h5><font size=3 face="Times New Roman">&nbsp;</font></h5>
</div>
<center><br><input type=submit value=Сохранить>
</form>

</body>

</html>
