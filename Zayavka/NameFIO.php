<?
if (!isset($period)) {$period=0;}
if (!isset($quartal)) {$quartal=(int)date("n")/3;}
if ($mode==2) {
 setcookie("Otm",$mon,time()+36000);  
 $Otm=$mon;
}
if ($mode==3) {
 $period++;
 if ($period>2) $period=0;
 setcookie("period",$period,time()+36000);  
}
if ($mode==4) {
 setcookie("year",$mon,time()+36000);  
 $year=$mon;
}
if ($mode==6) {
 setcookie("quartal",$mon,time()+36000);  
 $quartal=$mon;
}
require("config.php");
?>
<html>
<STYLE TYPE="text/css">                     
<!-- 
 TD {text-decoration:none; font-family: Arial,sans-serif;
 font: 75% Arial,sans-serif;}
 TH {text-decoration:none; font-family: Arial,sans-serif;
 font: BOLD 80% Arial,sans-serif;}
 A {text-decoration:none; font-family: Arial,sans-serif;
 font: BOLD 100% Arial,sans-serif; color: black}
 FONT {font-family: Arial,sans-serif;}
--> 
</STYLE> 
<head>
<meta http-equiv="expires" content="0">
</head>
<body background="x1_d.jpg" topmargin=0 <?if (isset($mode)) {?> OnLoad="self.parent.ggg.location.reload(true)"<?}?>>
<table align=center width=100%>
<tr>
<form action=NameFIO method=post>
<td align=left >
<a href=NameFIO.php?mode=3>ќтчетный период</a> <? if ($period==0) print("(мес€ц)"); if ($period==1) print("(квартал)"); if ($period==2) print("(год)");?>:
 <?if ($mode==1) {?>
   <input type=hidden name=mode value=2>
    <select name=mon>
    <?for ($i=1;$i<13;$i++)
      {?>
      <option value=<?=$i?> <?if ($i==$Otm) print("selected");?>> <?=$monate[$i]?></option> 
     <?}?>
      <option value=0>не указан</option>
    </select>
    <input type=submit value=Ok>
<? 
   }
   if ($mode==5) {?>
   <input type=hidden name=mode value=4>
    <select name=mon>
    <?for ($i=date("Y")-1;$i<date("Y")+10;$i++)
      {?>
      <option value=<?=$i?> <?if ($i==$year) print("selected");?>> <?=$i?></option> 
     <?}?>
      <option value=0>не указан</option>
    </select>
    <input type=submit value=Ok>
<? 
   }
   if ($mode==7) {?>
   <input type=hidden name=mode value=6>
    <select name=mon>
    <?for ($i=1;$i<5;$i++)
      {?>
      <option value=<?=$i?> <?if ($i==$quartal) print("selected");?>> <?=$i?></option> 
     <?}?>
      <option value=0>не указан</option>
    </select>
    <input type=submit value=Ok>
<? 
   }
   else {
    if ($period==0) {?><a href=NameFIO.php?mode=1><font color=DC143C size=3><?=$monate[$Otm];?></font></a><?}
    if ($period==1) {?><a href=NameFIO.php?mode=7><font color=DC143C size=3><?=$quartal;?></font></a><?}
    if ($period==2) {?><a href=NameFIO.php?mode=5><font color=DC143C size=3><?=$year;?></font></a><?}?>
 <?}?>
</td>
</form>
<td align=center rowspan=2><font color=B22222 size=5><?=$otdel;?></font></td>
<td align=right>”ровень доступа:<font color=DC143C size=3><?=$sec;?></font></td></tr>
<tr>
<td align=left>дата:<font color=DC143C size=3><?=date("d.m.y");?></font></td>
<td align=right>пользователь:<font color=DC143C size=3><?echo $who?>(<?echo $Nomer?>)</font></td></tr></table>
  
</html>