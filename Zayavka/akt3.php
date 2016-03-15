<?header("Content-type: application/vnd.ms-word");
   header("Content-Disposition: attachment;Filename=наряд.doc");
   header("Content-Transfer-Encoding: binary");?>


<html>

<head>
<meta http-equiv="expires" content="0">

<meta http-equiv=Content-Type content="text/html; charset=windows-1251">
<meta name=Generator content="Microsoft Word 11 (filtered)">
<title>Акт обследования</title>
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
p.MsoBodyText, li.MsoBodyText, div.MsoBodyText
	{margin:0cm;
	margin-bottom:.0001pt;
	text-align:center;
	border:none;
	padding:0cm;
	font-size:12.0pt;
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
	margin:42.55pt 42.55pt 42.55pt 3.0cm;}
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

<p class=MsoTitle align=right style='text-align:right'><span style='font-size:
10.0pt;font-weight:normal'>код записи Ф-17-01       </span></p>

<p class=MsoTitle align=left style='text-align:left'>&nbsp;</p>

<p class=MsoTitle align=left style='text-align:left'>ЛОИС-4</p>

<p class=MsoTitle align=left style='text-align:left'><i><u><span
style='font-weight:normal'>г.  Караганда</span></u></i><i><span
style='font-size:10.0pt;font-weight:normal'>_</span></i></p>

<p class=MsoTitle align=left style='text-align:left'><i><u><span
style='font-weight:normal'>ул. Серова, 89</span></u></i></p>

<p class=MsoTitle align=left style='text-align:left'><i><u><span
style='font-weight:normal'>т.  93-32-13</span></u></i></p>

<p class=MsoTitle>&nbsp;</p>

<p class=MsoTitle>&nbsp;</p>

<p class=MsoTitle>&nbsp;</p>

<p class=MsoTitle>АКТ ОБСЛЕДОВАНИЯ</p>

<p class=MsoTitle>&nbsp;</p>
<? while ($row=mysql_fetch_array($result))
{?>

<p class=MsoNormal align=center style='text-align:center'><b><span
style='font-size:14.0pt'><u><?=$row["fWDate"]?></u></span></b><b><span
lang=EN-US style='font-size:14.0pt'></span></b><b><span style='font-size:14.0pt'>
</span></b></p>

<p class=MsoNormal><b><span style='font-size:14.0pt'>&nbsp;</span></b></p>

<p class=MsoNormal><b><span style='font-size:14.0pt'>&nbsp;</span></b></p>

<p class=MsoNormal style='text-align:justify'><b><span style='font-size:14.0pt'>В
ходе проведенного обследования  по заявке <u> №<?=$row["VhodZayav"]?> от <?=$row["fDateBegin"]?> </u></span></b></p>

<p class=MsoNormal style='text-align:justify'><b><span style='font-size:14.0pt'>Предприятие:
</span></b><span style='font-size:14.0pt'><u>&nbsp;&nbsp;<?=$row["Filial"]?> ст.<?=$row["Station"]?>(<?=$row["ARM"]?>)</u></span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:14.0pt'>__________________________________________________________________</span></p>

<p class=MsoNormal style='text-align:justify'><b><span style='font-size:14.0pt'>Отдел:
</span></b><span style='font-size:14.0pt'><u><?=$row["Predp"]?></u></span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:14.0pt'>__________________________________________________________________</span></p>

<p class=MsoNormal style='text-align:justify'><b><span style='font-size:14.0pt'>Адрес:</span></b><span
style='font-size:14.0pt'>&nbsp;&nbsp;<u><?=$row["Adres"]?></u><b> каб.№ &nbsp;&nbsp;</b><u><?=$row["Kabinet"]?></u><b>
тел. </b><u><?=$row["Telephon"]?></u></span></p>

<p class=MsoNormal style='text-align:justify'><b><span style='font-size:14.0pt'>специалист 
ЛОИС-4 установил: </span></b><span style='font-size:14.0pt'>&nbsp;&nbsp;<u><?=$row["fStatus"]?></u></span></p>

<p class=MsoNormal style='text-align:justify'><b><span style='font-size:14.0pt'>&nbsp;</span></b></p>

<p class=MsoNormal style='text-align:justify'><b><span style='font-size:14.0pt'>Необходимо
приобрести следующее количество оборудования, материалов и выполнить
организационно-технические мероприятия:</span></b></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:14.0pt'><u><?=$row["fWText"]?></u></span></p>


<p class=MsoNormal style='text-align:justify'><b><span style='font-size:14.0pt'>__________________________________________________________________</span></b></p>

<p class=MsoNormal style='text-align:justify'><b><span style='font-size:14.0pt'>&nbsp;</span></b></p>

<p class=MsoNormal style='text-align:justify'><b><span style='font-size:14.0pt'>Работу
выполнил:  </span></b><span style='font-size:14.0pt'> ___________________   <u><?=$row["fWFIO"]?></u>   
___________</span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:14.0pt'>                                    
          </span><span style='font-size:10.0pt'>(должность)                                
(ФИО)                                  (подпись)</span></p>

<p class=MsoNormal style='text-align:justify'><b><span style='font-size:14.0pt'>Работу
принял:       </span></b><span style='font-size:14.0pt'>________________    __________________   
___________</span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:10.0pt'>                                                  
                (должность)                                  (ФИО)                          
      (подпись)</span></p>

<p class=MsoNormal style='text-align:justify'><b><span style='font-size:14.0pt'>&nbsp;</span></b></p>

<p class=MsoNormal style='text-align:justify'><b><span style='font-size:14.0pt'>Ознакомлен
:</span></b></p>

<p class=MsoNormal style='text-align:justify'><b><span style='font-size:14.0pt'>Начальник
 подразделения ЛОИС-4   </span></b><span style='font-size:14.0pt'>___________   
  ____________</span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:10.0pt'>                                                                                                  
                                                                      (дата)</span></p>

</div>
<?  }?>

</body>

</html>
