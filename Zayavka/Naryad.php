<?header("Content-type: application/vnd.ms-word");
   header("Content-Disposition: attachment;Filename=�����.doc");
   header("Content-Transfer-Encoding: binary");?>



<html>


<head>
<meta http-equiv="expires" content="0">
<meta name=Generator content="Microsoft Word 11 (filtered)">
<title>����� � <?=$id?></title>
<style>
<!--
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin:0cm;
	margin-bottom:.0001pt;
	font-size:10.0pt;
	font-family:"Times New Roman";}
h5
	{margin:0cm;
	margin-bottom:.0001pt;
	page-break-after:avoid;
	font-size:12.0pt;
	font-family:"Times New Roman";
	font-weight:normal;}
h6
	{margin-top:12.0pt;
	margin-right:0cm;
	margin-bottom:3.0pt;
	margin-left:0cm;
	font-size:11.0pt;
	font-family:"Times New Roman";}
@page Section1
	{size:595.3pt 841.9pt;
	margin:21.25pt 42.55pt 42.55pt 70.9pt;}
div.Section1
	{page:Section1;}
-->
</style>

</head>

<?
  require("config.php");
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
$result = mysql_query ($query) or die ("������ � ������� � �������!<i><br>".$query); 
?>

<body lang=RU>
<? while ($row=mysql_fetch_array($result))
{?>
<div class=Section1>
<h5 align=right style='text-align:right'><font size=1 face="Times New Roman"><span
style='font-size:8.0pt'>������ 646� �� 11-09-2003</span></font></h5>

<h5 align=right style='text-align:right'><font size=1 face="Times New Roman"><span
style='font-size:8.0pt'>���������� �6</span></font></h5>

<h5 align=center style='text-align:center'><b><font size=3
face="Times New Roman"><span style='font-size:12.0pt;font-weight:bold'>����� ��
���������� ������ � <?=$id?></span></font></b></h5>

<p class=MsoNormal><font size=2 face="Times New Roman"><span lang=RU-MO
style='font-size:10.0pt'>���� �������� ������ <u><?=$row["fDateBegin"]?></u></span></font></p>

<p class=MsoNormal><font size=2 face="Times New Roman"><span lang=RU-MO
style='font-size:10.0pt'>&nbsp;</span></font></p>

<p class=MsoNormal><font size=2 face="Times New Roman"><span lang=RU-MO
style='font-size:10.0pt'>�.�.�. <u><?=$row["Depositor"]?></u></span></font></p>

<p class=MsoNormal><font size=1 face="Times New Roman"><span lang=RU-MO
style='font-size:8.0pt'>�����������������</span></font></p>

<p class=MsoNormal><font size=1 face="Times New Roman"><span lang=RU-MO
style='font-size:8.0pt'>&nbsp;</span></font></p>

<p class=MsoNormal><font size=2 face="Times New Roman"><span style='font-size:
10.0pt'>����������� ������������� (�����) <u><?=$row["Filial"]?> ��.<?=$row["Station"]?>(<?=$row["ARM"]?>)</u></span></font></p>

<p class=MsoNormal><font size=2 face="Times New Roman"><span lang=RU-MO
style='font-size:10.0pt'>�������</span></font><span style='position:absolute;
z-index:3;margin-left:615px;margin-top:13px;width:2px;height:2px'><img width=2
height=2 src="Naryad.files/image001.gif"></span><span lang=RU-MO>������� 
<u><?=$row["fBText"]?></u></span></p>

<p class=MsoNormal><font size=2 face="Times New Roman"><span lang=RU-MO
style='font-size:10.0pt'>���� �� ����������� <u><?=$row["fWText"]?></u></span></font></p>

<p class=MsoNormal><font size=2 face="Times New Roman"><span style='font-size:
10.0pt'>������ �������� (�):� <u><?=$row["Ispolnitel2"]?>-<?=$row["Ispolnitel"]?></u></span></font></p>

<p class=MsoNormal><font size=1 face="Times New Roman"><span style='font-size:
8.0pt'>��������������������������������������������������� &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(������� �����������)</span></font></p>

<p class=MsoNormal><font size=1 face="Times New Roman"><span style='font-size:
8.0pt'>&nbsp;</span></font></p>

<p class=MsoNormal><font size=2 face="Times New Roman"><span lang=RU-MO
style='font-size:10.0pt'>���� ����������� ������ <u><?=$row["fWDate"]?></u></span></font></p>

<p class=MsoNormal><font size=2 face="Times New Roman"><span lang=RU-MO
style='font-size:10.0pt'>&nbsp;</span></font></p>

<h6><b><font size=2 face="Times New Roman"><span style='font-size:10.0pt;
font-weight:normal'>��������___________________������������������������
��������� ������ ����-4_________________</span></font></b></h6>

<p class=MsoNormal><font size=1 face="Times New Roman"><span lang=RU-MO
style='font-size:8.0pt'>����������������������������� (�������)����������������������������������������������� ���������������������������������������
�(�������)</span></font></p>

<h5 align=center style='text-align:center'><b><font size=3
face="Times New Roman">&nbsp;</font></b></h5>
  
<h5 align=center style='text-align:center'><b><font size=3
face="Times New Roman">&nbsp;</font></b></h5>

<h5><b><font size=3 face="Times New Roman">&nbsp;</font></b></h5>

<h5><font size=3 face="Times New Roman">&nbsp;</font></h5>
<?}?>
</div>

</body>

</html>
