<?header("Content-type: application/vnd.ms-word");
   header("Content-Disposition: attachment;Filename=�����.doc");
   header("Content-Transfer-Encoding: binary");?>


<html>

<head>
<meta http-equiv="expires" content="0">

<meta http-equiv=Content-Type content="text/html; charset=windows-1251">
<meta name=Generator content="Microsoft Word 11 (filtered)">
<title>��� �������</title>
<style>
<!--
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin:0cm;
	margin-bottom:.0001pt;
	font-size:10.0pt;
	font-family:"Times New Roman";}
h2
	{margin:0cm;
	margin-bottom:.0001pt;
	text-align:center;
	page-break-after:avoid;
	font-size:14.0pt;
	font-family:"Times New Roman";}
h3
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:72.0pt;
	margin-bottom:.0001pt;
	text-indent:36.0pt;
	page-break-after:avoid;
	font-size:12.0pt;
	font-family:"Times New Roman";
	font-weight:normal;}
h4
	{margin-top:0cm;
	margin-right:-5.65pt;
	margin-bottom:0cm;
	margin-left:0cm;
	margin-bottom:.0001pt;
	page-break-after:avoid;
	font-size:12.0pt;
	font-family:"Times New Roman";
	font-weight:normal;}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{margin:0cm;
	margin-bottom:.0001pt;
	font-size:10.0pt;
	font-family:"Times New Roman";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{margin:0cm;
	margin-bottom:.0001pt;
	font-size:10.0pt;
	font-family:"Times New Roman";}
p.MsoTitle, li.MsoTitle, div.MsoTitle
	{margin:0cm;
	margin-bottom:.0001pt;
	text-align:center;
	font-size:14.0pt;
	font-family:"Times New Roman";
	font-weight:bold;}
p.MsoBodyText, li.MsoBodyText, div.MsoBodyText
	{margin-top:0cm;
	margin-right:-7.15pt;
	margin-bottom:0cm;
	margin-left:0cm;
	margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Times New Roman";}
p.MsoBlockText, li.MsoBlockText, div.MsoBlockText
	{margin-top:0cm;
	margin-right:-14.25pt;
	margin-bottom:0cm;
	margin-left:288.0pt;
	margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Times New Roman";}
 /* Page Definitions */
 @page Section1
	{size:595.3pt 841.9pt;
	margin:1.0cm 42.55pt 1.0cm 89.85pt;}
div.Section1
	{page:Section1;}
-->
</style>

</head>
<?
  require("config.php");
$query="Select deposition.*,
Oborud.Nazvan 
as Nazvan1,
sotrudniki.fFIO 
as fWFIO, 
Station.fName
as Station,
Predpr1.fName
as Filial,
ARMs.fName
as ARM
from deposition 
left join Oborud on deposition.fDevice=Oborud.idO  
left join sotrudniki on deposition.fWFIO=sotrudniki.fId 
left join Station on deposition.fStation=Station.fCod
left join Predpr1 on deposition.fFilial=Predpr1.fId
left join ARMs on deposition.fARM=ARMs.fId
where id=".$id;
$result = mysql_query ($query) or die ("������ � ������� � �������!<i><br>".$query); 
?>

<body lang=RU>
<? while ($row=mysql_fetch_array($result))
{?>

<div class=Section1>

<p class=MsoNormal align=center style='margin-right:-7.15pt;text-align:center'><b><span
style='font-size:12.0pt'>��Ҡ� � <u><?=$row["NomAkt"]?> </u></span></b></p>

<p class=MsoNormal align=center style='text-align:center'><b><span
style='font-size:12.0pt'>������� ������������ ��������� ������������</span></b></p>

<p class=MsoNormal align=center style='text-align:center'><span
style='font-size:12.0pt'>�� <u><?=$row["fDateBegin"]?> ����</u></span></p>

<p class=MsoNormal align=center style='text-align:center'><span
style='font-size:12.0pt'>&nbsp;</span></p>

<p class=MsoNormal><span style='font-size:12.0pt'>���������<b>� </b>���
���������:&nbsp;<u><?=$row["fWFIO"]?>&nbsp;</u></span></p>

<p class=MsoNormal><span style='font-size:12.0pt'>&nbsp;</span></p>

<p class=MsoNormal><span style='font-size:12.0pt'>� ���, ��� </span><span
style='position:absolute;z-index:1;margin-left:615px;margin-top:13px;
width:2px;height:2px'><img width=2 height=2 src="akt4.files/image001.gif"></span><span
style='font-size:12.0pt'>�������� ����������� ������:&nbsp;
<u><?=$row["Nazvan1"]?>&nbsp;��� �������&nbsp;<?=$row["fGod"]?>�.&nbsp;
���&nbsp;<?=$row["fSerN"]?>&nbsp;���&nbsp;<?=$row["fInvN"]?></u></span></p>

<p class=MsoNormal><span style='font-size:12.0pt'>&nbsp;</span></p>

<p class=MsoNormal><span style='font-size:12.0pt'>�������������� � <u><?=$row["Filial"]?> ��.<?=$row["Station"]?>(<?=$row["ARM"]?>)&nbsp;�����&nbsp;
<?=$row["Adres"]?>&nbsp;�������&nbsp;<?=$row["Kabinet"]?></u></span></p>

<p class=MsoNormal><span style='font-size:12.0pt'>&nbsp;</span></p>

<p class=MsoNormal><span style='font-size:12.0pt'>�</span><span
style='font-size:12.0pt'>������� �����������:<u>&nbsp;<?=$row["fStatus"]?></u></span></p>

<p class=MsoNormal><span style='font-size:12.0pt'>&nbsp;</span></p>

<p class=MsoNormal><span style='font-size:12.0pt'>����������:<u>&nbsp;<?=$row["fWText"]?></u></span></p>

<p class=MsoNormal><span style='font-size:12.0pt'>&nbsp;</span></p>

<p class=MsoNormal><span style='font-size:12.0pt'>&nbsp;</span></p>

<p class=MsoNormal><span style='font-size:12.0pt'>&nbsp;</span></p>

<p class=MsoNormal><span style='font-size:12.0pt'>� ����������� ��������������
������������������������������������������������ �����</span></p>

<p class=MsoNormal><span style='font-size:12.0pt'>�������ꠠ����������������������
�</span>������������������������������������������������������������&nbsp;&nbsp;&nbsp;&nbsp;<?=$row["fWFIO"]?>
<span style='font-size:8.0pt'>���������� </span></p>

<p class=MsoNormal>______________________________���������������������������������������������
���_______________________________</p>

<p class=MsoNormal><span style='font-size:8.0pt'>��������� (�������)��������������������������������������������������������������������������������������������������������������������������
(�������)</span></p>

<p class=MsoNormal>�____�_____________ 2011 ��䠠 ��������������������������������������������������&nbsp;&nbsp;&nbsp;&nbsp;<u><?=$row["fWDate"]?></u></p>

<p class=MsoNormal>�����������:�������������������������������������������������������������������������������������
</p>

<p class=MsoNormal>&nbsp;</p>

<p class=MsoNormal>&nbsp;</p>

 <?  }?>
</body>

</html>
