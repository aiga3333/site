<? header("Content-type: application/vnd.ms-word");
   header("Content-Disposition: attachment;Filename=акт.doc");
   header("Content-Transfer-Encoding: binary");
?>
<html>
<head>
<meta http-equiv="expires" content="0">
<meta http-equiv=Content-Type content="text/html; charset=windows-1251">
<meta name=Generator content="Microsoft Word 11 (filtered)">
<title>Акт выполненых работ</title>

<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin:0cm;
	margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Times New Roman";
	layout-grid-mode:line;}
h1
	{margin:0cm;
	margin-bottom:.0001pt;
	text-align:center;
	page-break-after:avoid;
	border:none;
	padding:0cm;
	font-size:12.0pt;
	font-family:"Times New Roman";}
h3
	{margin:0cm;
	margin-bottom:.0001pt;
	text-align:center;
	page-break-after:avoid;
	font-size:12.0pt;
	font-family:"Times New Roman";
	font-weight:normal;}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{margin:0cm;
	margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Times New Roman";
	layout-grid-mode:line;}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{margin:0cm;
	margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Times New Roman";
	layout-grid-mode:line;}
p.MsoTitle, li.MsoTitle, div.MsoTitle
	{margin:0cm;
	margin-bottom:.0001pt;
	text-align:center;
	font-size:14.0pt;
	font-family:"Times New Roman";
	font-weight:bold;}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{margin:0cm;
	margin-bottom:.0001pt;
	font-size:8.0pt;
	font-family:Tahoma;
	layout-grid-mode:line;}
p.1, li.1, div.1
	{margin:0cm;
	margin-bottom:.0001pt;
	font-size:10.0pt;
	font-family:"Courier New";
	layout-grid-mode:line;}
p.10, li.10, div.10
	{margin:0cm;
	margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Times New Roman";
	layout-grid-mode:line;}
p.11, li.11, div.11
	{margin:0cm;
	margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Times New Roman";
	layout-grid-mode:line;}
p.2, li.2, div.2
	{margin:0cm;
	margin-bottom:.0001pt;
	text-align:center;
	page-break-after:avoid;
	font-size:12.0pt;
	font-family:"Times New Roman";
	layout-grid-mode:line;
	font-weight:bold;}
p.12, li.12, div.12
	{margin:0cm;
	margin-bottom:.0001pt;
	text-align:center;
	page-break-after:avoid;
	font-size:12.0pt;
	font-family:"Times New Roman";
	layout-grid-mode:line;}
p.3, li.3, div.3
	{margin:0cm;
	margin-bottom:.0001pt;
	text-align:center;
	page-break-after:avoid;
	font-size:12.0pt;
	font-family:"Times New Roman";
	layout-grid-mode:line;}
 /* Page Definitions */
 @page Section1
	{size:595.45pt 841.7pt;
	margin:11.9pt 22.1pt 17.0pt 68.05pt;}
div.Section1
	{page:Section1;}
-->
</style>

</head>
<?
  require("config.php");
$query="Select deposition.*,
sotrudniki.fFIO 
as fWFIO, 
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
?>

<body lang=RU>
<div class=Section1>

<p class=MsoNormal align=right style='text-align:right'><font size=1
face="Times New Roman"><span style='font-size:8.0pt'>код записи Ф-17-02</span></font></p>

<p class=MsoNormal><b><font size=1 face="Times New Roman"><span
style='font-size:8.0pt;font-weight:bold'>&nbsp;</span></font></b></p>

<p class=MsoNormal><b><font size=1 face="Times New Roman"><span
style='font-size:9.0pt;font-weight:bold'>ЛОИС-4</span></font></b></p>

<p class=MsoNormal><i><u><font size=1 face="Times New Roman"><span
style='font-size:9.0pt;font-style:italic'>г. Караганда</span></font></u></i><font
size=1><span style='font-size:9.0pt'></span></font></p>

<p class=MsoNormal><i><u><font size=1 face="Times New Roman"><span
style='font-size:9.0pt;font-style:italic'>ул. Серова, 89</span></font></u></i><font
size=1><span style='font-size:9.0pt'></span></font></p>

<p class=MsoNormal><i><u><font size=1 face="Times New Roman"><span
style='font-size:9.0pt;font-style:italic'>т.  93-32-13, 93</span></font></u></i><i><u><font
size=1><span lang=EN-US style='font-size:9.0pt;font-style:italic'>-3</span></font></u></i><i><u><font
size=1><span style='font-size:9.0pt;font-style:italic'>6 -</span></font></u></i><i><u><font
size=1><span lang=EN-US style='font-size:9.0pt;font-style:italic'>88</span></font></u></i></p>

<p class=MsoNormal style='text-indent:333.15pt'><font size=1
face="Times New Roman"><span lang=EN-US style='font-size:9.0pt'> </span></font></p>

<p class=MsoTitle><b><font size=1 face="Times New Roman"><span
style='font-size:9.0pt'>    АКТ ВЫПОЛНЕННЫХ РАБОТ</span></font></b></p>

<p class=MsoTitle><b><font size=1 face="Times New Roman"><span
style='font-size:9.0pt'>&nbsp;</span></font></b></p>

<? while ($row=mysql_fetch_array($result))
{?>

<p class=MsoNormal style='text-align:justify'><b><font size=1
face="Times New Roman"><span style='font-size:9.0pt;font-weight:bold'>По заявке
поступившей:   </span></font></b><font size=1><span style='font-size:9.0pt'><b><span
style='font-weight:bold'></span></b><u><?=$row["fDateBegin"]?></u><b><span
style='font-weight:bold'></span></b></span></font></p>

<p class=MsoNormal style='text-align:justify'><b><font size=1
face="Times New Roman"><span style='font-size:9.0pt;font-weight:bold'>Подразделение:</span></font></b><font
size=1><span style='font-size:9.0pt'><u>&nbsp;&nbsp;<?=$row["Filial"]?></u></span></font></p>

<p class=MsoNormal style='text-align:justify'><b><font size=1
face="Times New Roman"><span style='font-size:9.0pt;font-weight:bold'>Отдел:&nbsp;&nbsp;</span></font></b><font
size=1><span style='font-size:9.0pt'><u>ст.<?=$row["Station"]?>(<?=$row["ARM"]?>)</u></span></font></p>

<p class=MsoNormal style='text-align:justify'><b><font size=1
face="Times New Roman"><span style='font-size:9.0pt;font-weight:bold'>Адрес:&nbsp;&nbsp;</span></font></b><font
size=1><span style='font-size:9.0pt'><u><?=$row["Adres"]?></u> <b><span
style='font-weight:bold'>&nbsp;&nbsp;каб.№ </span></b><u><?=$row["Kabinet"]?></u><b><span style='font-weight:
bold'>&nbsp;&nbsp; тел. &nbsp;&nbsp;</span></b><u><?=$row["Telephon"]?></u></span></font></p>

<p class=MsoNormal style='text-align:justify'><b><font size=1
face="Times New Roman"><span style='font-size:9.0pt;font-weight:bold'>В ходе
произведенного обследования специалистом ЛОИС-4, было обнаружено
следующее: </span></font></b></p>

<p class=MsoNormal><font size=1 face="Times New Roman"><span style='font-size:
9.0pt'><u><?=$row["fStatus"]?></u></span></font></p> 

<p class=MsoNormal><b><font size=1 face="Times New Roman"><span
style='font-size:9.0pt;font-weight:bold'>Выполнены следующие виды работ: </span></font></b></p>

<p class=MsoNormal><font size=1 face="Times New Roman"><span style='font-size:
9.0pt'><u><?=$row["fWText"]?></u></span></font></p> 


<p class=MsoNormal style='text-align:justify'><b><font size=1
face="Times New Roman"><span lang=EN-US style='font-size:9.0pt;font-weight:
bold'>C</span></font></b><b><font size=1><span style='font-size:9.0pt;
font-weight:bold'>ерийный номер:      </span></font></b><font size=1><span
style='font-size:9.0pt'><u><?=$row["fSerN"]?></u></span></font></p>

<p class=MsoNormal style='text-align:justify'><b><font size=1
face="Times New Roman"><span style='font-size:9.0pt;font-weight:bold'>Инвентарный
номер:   </span></font></b><font size=1><span style='font-size:9.0pt'><u><?=$row["fInvN"]?></u></span></font></p>

<p class=MsoNormal style='text-align:justify'><b><font size=1
face="Times New Roman"><span style='font-size:9.0pt;font-weight:bold'>Соответствие
конфигурации персонального компьютера  Паспорту ПК по приказу № 646-Ц от
11.09.03    </span></font></b></p>

<p class=MsoNormal style='text-align:justify'><font size=1
face="Times New Roman"><span style='font-size:9.0pt'>________________________________________________________________________________________________________________</span></font></p>

<p class=MsoNormal style='text-align:justify'><b><font size=1
face="Times New Roman"><span style='font-size:9.0pt;font-weight:bold'>Работу
выполнил: &nbsp;&nbsp;&nbsp;</span></font></b><font size=1><span style='font-size:9.0pt'>             ___________________            
      <u><?=$row["fWFIO"]?></u>             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________</span></font></p>

<p class=MsoNormal style='text-align:justify'><font size=1
face="Times New Roman"><span style='font-size:9.0pt'>                                            (должность)            
                     (ФИО)                                (подпись)</span></font></p>

<p class=MsoNormal style='text-align:justify'><b><font size=1
face="Times New Roman"><span style='font-size:9.0pt;font-weight:bold'>Работу
принял:      ___________________               
________________              _________________</span></font></b></p>

<p class=MsoNormal style='text-align:justify'><font size=1
face="Times New Roman"><span style='font-size:9.0pt'>                                            (должность)    
                             (ФИО)                                (подпись)</span></font></p>

<p class=MsoNormal style='text-align:justify'><b><font size=1
face="Times New Roman"><span style='font-size:9.0pt;font-weight:bold'>Ознакомлен
:</span></font></b></p>

<p class=MsoNormal style='text-align:justify'><b><font size=1
face="Times New Roman"><span style='font-size:9.0pt;font-weight:bold'>Начальник
подразделения ЛОИС-4:</span></font></b><font size=1><span style='font-size:9.0pt'>  
   ________________     _______________                 <u><?=$row["fWDate"]?></u></span></font></p>

<p class=MsoNormal style='text-align:justify'><font size=1
face="Times New Roman"><span style='font-size:9.0pt'>                                                                                    (ФИО)             
  (подпись)                                 (дата)</span></font></p>

 
</div>
<?  }?>
</body>

</html>
