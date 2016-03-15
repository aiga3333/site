<?
  require("config.php");
$query="Select * from deposition";
$result = mysql_query ($query) or die ("ошибка в запросе к таблице!<i><br>".$query); 
?>

<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1251">
<meta name=Generator content="Microsoft Word 11 (filtered)">
<title>здесь должно быть число</title>
<style>
<!--
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin:0cm;
	margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Times New Roman";}
@page Section1
	{size:595.3pt 841.9pt;
	margin:2.0cm 42.5pt 2.0cm 3.0cm;}
div.Section1
	{page:Section1;}
-->
</style>

</head>


<body lang=RU>

<div class=Section1>
<? while ($row=mysql_fetch_array($result))
{?>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr height=23 style='height:17.45pt'>
  <td width=319 height=23 valign=top style='width:239.25pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:17.45pt'>
  <p class=MsoNormal align=center style='text-align:center'><font size=3
  face="Times New Roman"><span style='font-size:12.0pt'>здесь должно быть число</span></font></p>
  </td>
  <td width=319 height=23 valign=top style='width:239.3pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:17.45pt'>
  <p class=MsoNormal align=center style='text-align:center'><font size=3
  face="Times New Roman"><span style='font-size:12.0pt'>здесь должно быть число</span></font></p>
  <p class=MsoNormal align=center style='text-align:center'><font size=3
  face="Times New Roman"><span style='font-size:12.0pt'>&nbsp;</span></font></p>
  </td>
 </tr>
 <tr height=94 style='height:70.3pt'>
  <td width=319 height=94 valign=top style='width:239.25pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:70.3pt'>
  <p class=MsoNormal align=center style='text-align:center'><font size=3
  face="Times New Roman"><span style='font-size:12.0pt'>&nbsp;</span></font></p>
  </td>
  <td width=319 height=94 valign=top style='width:239.3pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:70.3pt'>
  <p class=MsoNormal align=center style='text-align:center'><font size=3
  face="Times New Roman"><span style='font-size:12.0pt'>&nbsp;</span></font></p>
  </td>
 </tr>
</table>

<p class=MsoNormal><font size=3 face="Times New Roman"><span style='font-size:
12.0pt'>&nbsp;</span></font></p>

</div>
<?}?>
</body>

</html>
