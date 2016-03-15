<?if (!isset ($Otm)) {$DateOtm=date("m");} else {$DateOtm=$Otm;}
require("config.php");
$query="Select * from deposition WHERE ((DateOtm='".$Otm."') and (YEAR(fWDate)='".$year."'))";
$result = mysql_query ($query) or die ("Could not adding into table Hosts");
?>
<STYLE TYPE="text/css">                     
<!-- 
 TD {text-decoration:none; font-family: Arial,sans-serif;
 font: 80% Arial,sans-serif;}
 TH {text-decoration:none; font-family: Arial,sans-serif;
 font: BOLD 80% Arial,sans-serif;}
 A {text-decoration:none; font-family: Arial,sans-serif;
 font: BOLD 100% Arial,sans-serif;}
 FONT {font-family: Arial,sans-serif;}
--> 
</STYLE> 
<script language="JavaScript">
<!--
function load(url) {
 parent.ggg.location.href= url; 
 
}
// -->
</script>


<body background="pics/index_05.jpg">
<center>
<a>Анализ исполнения заявок <br>на програмно-техническое обслуживание за <u><?=$monate[$Otm]?> </u>месяц.</a>
<br>
<? if ($sec>0){   ?>

<table width=80% border=0 cellspacing=0 align=center>
<tr  bgcolor=palegreen
 onMouseOver="this.style.backgroundColor='00FF7F'" 
 onMouseOut="this.style.backgroundColor=''">
 <td onClick="load('Tablica2.php?mode=1')">
  <font color="Crimson">
   <?if ($mode==1) {?><a href=Tablica2.php?mode=0 title='-'>&nbsp;-&nbsp;</a><b><?}
     else {?><a href=Tablica2.php?mode=1 title='+'>&nbsp;+&nbsp;</a><?}?>
   По обслуженной технике</b>
  <font></td>
</tr>
<?if ($mode==1) {?>
<tr><td>
<table border="0" align="center" width=90%>                                             
<?
     $query3="select * , Nazvan, Nazvan2, sum(Kol) as SK 
              from 
               deposition left join VidRab on deposition.VidRabot=VidRab.IdR
                          left join Oborud on deposition.VidOborud=Oborud.IdO
              where 
               ((DateOtm=".$DateOtm.") and (YEAR(fWDate)=".$year."))
              group by VidOborud,VidRabot,DateOtm"; 
     $result3 = mysql_query ($query3) or die ("Ошибка в запросе к таблице deposition!<i><br>".$query3);
     while ($row3=mysql_fetch_array($result3)) {?>
      <tr>
       <td width="40%" bgcolor=palegreen><?=$row3["Nazvan"]?></td>   
       <td width="40%" bgcolor=palegreen><?=$row3["Nazvan2"]?></td>        
       <td width="10%" align="center" bgcolor=palegreen><?=$row3["SK"]?></td> 
<?   }?>
</tr>
</table>
</td></tr>
<?}?>
<tr  bgcolor=palegreen
 onMouseOver="this.style.backgroundColor='00FF7F'" 
 onMouseOut="this.style.backgroundColor=''">
 <td onClick="load('Tablica2.php?mode=2')">
  <font color="Crimson">
   <?if ($mode==2) {?><a href=Tablica2.php?mode=0 title='-'>&nbsp;-&nbsp;</a><b><?}
     else {?><a href=Tablica2.php?mode=2 title='+'>&nbsp;+&nbsp;</a><?}?>
   По предприятиям</b>
  <font>
 </td>
</tr>
<?if ($mode==2) {?>
<tr>
 <td BGCOLOR=PALEGREEN>
  <table bgcolor=Beige border="1" align="center" cellspacing=0 width=90%>
   <tr>
    <td width=20% colspan=1 align=center bgcolor=Darkkhaki><b>Предприятие</b></td>                                             
    <td width=20% colspan=1 align=center bgcolor=Khaki><b>Станция</b></td>                                             
    <td width=20% colspan=1 align=center bgcolor=Wheat><b>Рабочее место</b></td>                                             
    <td width=15% colspan=1 align=center bgcolor=Bisque><b>Исполнитель</b></td>                                             
    <td width=10% colspan=1 align=center bgcolor=Lemonchiffon><b>№№ заявок</b></td>                                             
    <td width=10% align=center bgcolor=Linen><b>кол-во заявок</b></td>                                             
   </tr>
<? 
     $query="select Predpr1.fName as NAME, fFilial, count(id) as Summa from deposition
             left join Predpr1 on Predpr1.fId=deposition.fFilial
             where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate>0)) 
             group by fFilial 
             order by Summa DESC";
   $result = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
   $c=0;
   while ($row=mysql_fetch_array($result)) 
   {$c++;?>
    <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level1=<?=$row["fFilial"]?>')">  
     <td colspan=1 bgcolor=Darkkhaki><?=$c?> <b><a href=Tablica2.php?mode=<?=$mode?>&level1=<?=$row["fFilial"]?>><?=$row["NAME"]?></a></b></td>   
     <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
     <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
     <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
     <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>                                             
     <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row["Summa"]?></b></td> 
    </tr>
<?  if ((isset($level1)) and ($level1==$row["fFilial"])) {
     $query="select Station.fName as NAME, fStation, count(id) as Summa from deposition
             left join Station on Station.fCod=deposition.fStation
             where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate>0) and (fFilial=".$level1.")) group by fStation order by Summa DESC";
     $result1 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
     $c1=0;
     while ($row1=mysql_fetch_array($result1)) 
     {$c1++;?>
      <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$row1["fStation"]?>')">  
       <td align=right bgcolor=Darkkhaki>&nbsp;</td>   
       <td align=left colspan=1 bgcolor=khaki><?=$c1;?> <a href=Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$row1["fStation"]?>><?=$row1["NAME"]?></A></td>   
       <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
       <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
       <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>                                             
       <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row1["Summa"]?></b></td> 
      </tr>
<?    if ((isset($level2)) and ($level2==$row1["fStation"])) {
         $query="select ARMs.fName as ARM, fARM, count(id) as Summa from deposition
                 left join ARMs on ARMs.fId=deposition.fARM
                 where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate>0) and (fFilial=".$level1.") and (fStation='".$level2."')) 
                 group by fARM 
                 order by ARMs.fName ASC";
       $result2 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
       $c2=0;
       while ($row2=mysql_fetch_array($result2)) 
       {$c2++;?>
        <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$row2["fARM"]?>')">  
         <td align=right bgcolor=Darkkhaki>&nbsp;</td>   
         <td align=right bgcolor=khaki>&nbsp;</td>   
         <td align=left colspan=1 bgcolor=Wheat><?=$c2;?> <a href='Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$row2["fARM"]?>'><?=$row2["ARM"]?></a></td>   
         <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
         <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>                                             
         <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row2["Summa"]?></b></td> 
        </tr>
<?      if ((isset($level3)) and ($level3==$row2["fARM"])) {
  $query="select sotrudniki.fFIO as FIO, fWFIO, count(id) as Summa from deposition
          left join sotrudniki on sotrudniki.fId=deposition.fWFIO
          where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate>0) and (fFilial=".$level1.") and (fStation=".$level2.") and (fARM=".$level3.")) 
          group by fFIO 
          order by Summa DESC";
         $result3 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
         $c3=0;
         while ($row3=mysql_fetch_array($result3)) 
         {$c3++;?>
          <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$level3?>&level4=<?=$row3["fWFIO"]?>')">  
           <td width=20% colspan=1 align=center bgcolor=DarkKhaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
           <td align=left colspan=1 bgcolor=Bisque><?=$c3;?>
            <a href='Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$level3?>&level4=<?=$row3["fWFIO"]?>'><?=$row3["FIO"]?></a></td>   
           <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>
           <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row3["Summa"]?></b></td> 
          </tr>
<?      if ((isset($level4)) and ($level4==$row3["fWFIO"])) {
         $query="select id from deposition
                 where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate>0) and (fStation=".$level2.") and (fFilial='".$level1."') and (fARM='".$level3."') and (fWFIO='".$level4."'))";
         $result4 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
         while ($row4=mysql_fetch_array($result4)) 
         {?>
          <tr bgcolor=Turquoise onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('info3.php?id=<?=$row4["id"]?>')">  
           <td width=20% colspan=1 align=center bgcolor=DarkKhaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
           <td align=left colspan=1 bgcolor=Bisque>&nbsp;</td>
           <td align=center bgcolor=Lemonchiffon><a href='info3.php?id=<?=$row4["id"]?>'><?=$row4["id"]?></a></td>   
           <td width=10% colspan=1 align=center bgcolor=Linen>1</td> 
          </tr>
<? }}}}}}}}}?>
</table>
</td></tr>
<?}?>
<tr  bgcolor=palegreen
 onMouseOver="this.style.backgroundColor='00FF7F'" 
 onMouseOut="this.style.backgroundColor=''">
 <td onClick="load('Tablica2.php?mode=3')">
  <font color="Crimson">
   <?if ($mode==3) {?><a href=Tablica2.php?mode=0 title='-'>&nbsp;-&nbsp;</a><b><?}
     else {?><a href=Tablica2.php?mode=3 title='+'>&nbsp;+&nbsp;</a><?}?>
   По исполнителям</b>
  <font>
 </td>
</tr>
<?if ($mode==3) {?>
<tr>
 <td BGCOLOR=PALEGREEN>
  <table bgcolor=Beige border="1" align="center" cellspacing=0 width=90%>
   <tr>
    <td width=20% colspan=1 align=center bgcolor=Darkkhaki><b>Исполнитель</b></td>                                             
    <td width=20% colspan=1 align=center bgcolor=Khaki><b>Станция</b></td>                                             
    <td width=20% colspan=1 align=center bgcolor=Wheat><b>Предприятие</b></td>                                             
    <td width=15% colspan=1 align=center bgcolor=Bisque><b>Рабочее место</b></td>                                             
    <td width=10% colspan=1 align=center bgcolor=Lemonchiffon><b>№№ заявок</b></td>                                             
    <td width=10% align=center bgcolor=Linen><b>кол-во заявок</b></td>                                             
   </tr>
<? 
  $query="select sotrudniki.fFIO as FIO, fWFIO, count(id) as Summa from deposition
          left join sotrudniki on sotrudniki.fId=deposition.fWFIO
          where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate>0)) 
          group by fFIO 
          order by Summa DESC";
   $result = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
   $c=0;
   while ($row=mysql_fetch_array($result)) 
   {$c++;?>
    <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level1=<?=$row["fWFIO"]?>')">  
     <td colspan=1 bgcolor=Darkkhaki><?=$c?> <b><a href=Tablica2.php?mode=<?=$mode?>&level1=<?=$row["fWFIO"]?>><?=$row["FIO"]?></a></b></td>   
     <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
     <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
     <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
     <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>                                             
     <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row["Summa"]?></b></td> 
    </tr>
<?  if ((isset($level1)) and ($level1==$row["fWFIO"])) {
     $query="select Station.fName as NAME, fStation, count(id) as Summa from deposition
             left join Station on Station.fCod=deposition.fStation
             where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate>0) and (fWFIO=".$level1.")) group by fStation order by Summa DESC";
     $result1 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
     $c1=0;
     while ($row1=mysql_fetch_array($result1)) 
     {$c1++;?>
      <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$row1["fStation"]?>')">  
       <td align=right bgcolor=Darkkhaki>&nbsp;</td>   
       <td align=left colspan=1 bgcolor=khaki><?=$c1;?> <a href=Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$row1["fStation"]?>><?=$row1["NAME"]?></A></td>   
       <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
       <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
       <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>                                             
       <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row1["Summa"]?></b></td> 
      </tr>
<?    if ((isset($level2)) and ($level2==$row1["fStation"])) {
     $query="select Predpr1.fName as NAME, fFilial, count(id) as Summa from deposition
             left join Predpr1 on Predpr1.fId=deposition.fFilial
             where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate>0) and (fWFIO=".$level1.") and (fStation=".$level2.")) 
             group by fFilial 
             order by Summa DESC";
       $result2 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
       $c2=0;
       while ($row2=mysql_fetch_array($result2)) 
       {$c2++;?>
        <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$row2["fFilial"]?>')">  
         <td align=right bgcolor=Darkkhaki>&nbsp;</td>   
         <td align=right bgcolor=khaki>&nbsp;</td>   
         <td align=left colspan=1 bgcolor=Wheat><?=$c2;?> <a href='Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$row2["fFilial"]?>'><?=$row2["NAME"]?></a></td>   
         <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
         <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>                                             
         <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row2["Summa"]?></b></td> 
        </tr>
<?      if ((isset($level3)) and ($level3==$row2["fFilial"])) {
         $query="select ARMs.fName as ARM, fARM, count(id) as Summa from deposition
                 left join ARMs on ARMs.fId=deposition.fARM
                 where ((DateOtm='".$Otm."') and (YEAR(fWDate)='".$year."') and (fWDate>0) and (fWFIO='".$level1."') and (fStation='".$level2."') and (fFilial='".$level3."')) 
                 group by fARM 
                 order by ARMs.fName ASC";
         $result3 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
         $c3=0;
         while ($row3=mysql_fetch_array($result3)) 
         {$c3++;?>
          <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$level3?>&level4=<?=$row3["fARM"]?>')">  
           <td width=20% colspan=1 align=center bgcolor=DarkKhaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
           <td align=left colspan=1 bgcolor=Bisque><?=$c3;?>
            <a href='Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$level3?>&level4=<?=$row3["fARM"]?>'><?=$row3["ARM"]?></a></td>   
           <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>
           <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row3["Summa"]?></b></td> 
          </tr>
<?      if ((isset($level4)) and ($level4==$row3["fARM"])) {
         $query="select id from deposition
                 where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate>0) and (fStation=".$level2.") and (fFilial='".$level3."') and (fARM='".$level4."') and (fWFIO='".$level1."'))";
         $result4 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
         while ($row4=mysql_fetch_array($result4)) 
         {?>
          <tr bgcolor=Turquoise onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('info3.php?id=<?=$row4["id"]?>')">  
           <td width=20% colspan=1 align=center bgcolor=DarkKhaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
           <td align=left colspan=1 bgcolor=Bisque>&nbsp;</td>
           <td align=center bgcolor=Lemonchiffon><a href='info3.php?id=<?=$row4["id"]?>'><?=$row4["id"]?></a></td>   
           <td width=10% colspan=1 align=center bgcolor=Linen>1</td> 
          </tr>
<? }}}}}}}}}?>
</table>
<?}?>
</td></tr>
<tr  bgcolor=palegreen
 onMouseOver="this.style.backgroundColor='00FF7F'" 
 onMouseOut="this.style.backgroundColor=''">
 <td onClick="load('Tablica2.php?mode=4')">
  <font color="Crimson">
   <?if ($mode==4) {?><a href=Tablica2.php?mode=0 title='-'>&nbsp;-&nbsp;</a><b><?}
     else {?><a href=Tablica2.php?mode=4 title='+'>&nbsp;+&nbsp;</a><?}?>
      По станциям</b><font></td>
</tr>
<?if ($mode==4) {?>
<tr>
 <td BGCOLOR=PALEGREEN>
  <table bgcolor=Beige border="1" align="center" cellspacing=0 width=90%>
   <tr>
    <td width=20% colspan=1 align=center bgcolor=Darkkhaki><b>Станция</b></td>                                             
    <td width=20% colspan=1 align=center bgcolor=Khaki><b>Предприятие</b></td>                                             
    <td width=20% colspan=1 align=center bgcolor=Wheat><b>Рабочее место</b></td>                                             
    <td width=15% colspan=1 align=center bgcolor=Bisque><b>Исполнитель</b></td>                                             
    <td width=10% colspan=1 align=center bgcolor=Lemonchiffon><b>№№ заявок</b></td>                                             
    <td width=10% align=center bgcolor=Linen><b>кол-во заявок</b></td>                                             
   </tr>
<? $query="select Station.fName as NAME, fStation, count(id) as Summa from deposition
           left join Station on Station.fCod=deposition.fStation
           where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate>0)) group by fStation order by Summa DESC";
   $result = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
   $c=0;
   while ($row=mysql_fetch_array($result)) 
   {$c++;?>
    <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level1=<?=$row["fStation"]?>')">  
     <td colspan=1 bgcolor=Darkkhaki><?=$c?> <b><a href=Tablica2.php?mode=<?=$mode?>&level1=<?=$row["fStation"]?>><?=$row["NAME"]?></a></b></td>   
     <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
     <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
     <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
     <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>                                             
     <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row["Summa"]?></b></td> 
    </tr>
<?  if ((isset($level1)) and ($level1==$row["fStation"])) {
     $query="select Predpr1.fName as NAME, fFilial, count(id) as Summa from deposition
             left join Predpr1 on Predpr1.fId=deposition.fFilial
             where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate>0) and (fStation=".$level1.")) 
             group by fFilial 
             order by Summa DESC";
     $result1 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
     $c1=0;
     while ($row1=mysql_fetch_array($result1)) 
     {$c1++;?>
      <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$row1["fFilial"]?>')">  
       <td align=right bgcolor=Darkkhaki>&nbsp;</td>   
       <td align=left colspan=1 bgcolor=khaki><?=$c1;?> <a href=Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$row1["fFilial"]?>><?=$row1["NAME"]?></A></td>   
       <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
       <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
       <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>                                             
       <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row1["Summa"]?></b></td> 
      </tr>
<?    if ((isset($level2)) and ($level2==$row1["fFilial"])) {
       $query="select ARMs.fName as ARM, fARM, count(id) as Summa from deposition
               left join ARMs on ARMs.fId=deposition.fARM
               where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate>0) and (fStation=".$level1.") and (fFilial='".$level2."')) 
               group by fARM 
               order by ARMs.fName ASC";
       $result2 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
       $c2=0;
       while ($row2=mysql_fetch_array($result2)) 
       {$c2++;?>
        <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$row2["fARM"]?>')">  
         <td align=right bgcolor=Darkkhaki>&nbsp;</td>   
         <td align=right bgcolor=khaki>&nbsp;</td>   
         <td align=left colspan=1 bgcolor=Wheat><?=$c2;?> <a href='Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$row2["fARM"]?>'><?=$row2["ARM"]?></a></td>   
         <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
         <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>                                             
         <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row2["Summa"]?></b></td> 
        </tr>
<?      if ((isset($level3)) and ($level3==$row2["fARM"])) {
         $query="select sotrudniki.fFIO as FIO, fWFIO, count(id) as Summa from deposition
                 left join sotrudniki on sotrudniki.fId=deposition.fWFIO
                 where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate>0) and (fStation=".$level1.") and (fFilial='".$level2."') and (fARM='".$level3."')) 
                 group by fFIO 
                 order by sotrudniki.fFIO ASC";
         $result3 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
         $c3=0;
         while ($row3=mysql_fetch_array($result3)) 
         {$c3++;?>
          <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$level3?>&level4=<?=$row3["fWFIO"]?>')">  
           <td width=20% colspan=1 align=center bgcolor=DarkKhaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
           <td align=left colspan=1 bgcolor=Bisque><?=$c3;?> <a href='Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$level3?>&level4=<?=$row3["fWFIO"]?>'><?=$row3["FIO"]?></a></td>   
           <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>
           <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row3["Summa"]?></b></td> 
          </tr>
<?      if ((isset($level4)) and ($level4==$row3["fWFIO"])) {
         $query="select id from deposition
                 where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate>0) and (fStation=".$level1.") and (fFilial='".$level2."') and (fARM='".$level3."') and (fWFIO='".$level4."'))";
         $result4 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
         while ($row4=mysql_fetch_array($result4)) 
         {?>
          <tr bgcolor=Turquoise onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('info3.php?id=<?=$row4["id"]?>')">  
           <td width=20% colspan=1 align=center bgcolor=DarkKhaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
           <td align=left colspan=1 bgcolor=Bisque>&nbsp;</td>
           <td align=center bgcolor=Lemonchiffon><a href='info3.php?id=<?=$row4["id"]?>'><?=$row4["id"]?></a></td>   
           <td width=10% colspan=1 align=center bgcolor=Linen>1</td> 
          </tr>
<? }}}}}}}}}?>
</table>
<?}?>
</td></tr>
<tr  bgcolor=palegreen
 onMouseOver="this.style.backgroundColor='00FF7F'" 
 onMouseOut="this.style.backgroundColor=''">
 <td onClick="load('Tablica2.php?mode=5')">
  <font color="Crimson">
   <?if ($mode==5) {?><a href=Tablica2.php?mode=0 title='-'>&nbsp;-&nbsp;</a><b><?}
     else {?><a href=Tablica2.php?mode=5 title='+'>&nbsp;+&nbsp;</a><?}?>
      По дате</b><font></td>
</tr>
<?if ($mode==5) {?>
<tr>
 <td BGCOLOR=PALEGREEN>
  <table bgcolor=Beige border="1" align="center" cellspacing=0 width=90%>
   <tr>
    <td width=20% colspan=1 align=center bgcolor=Darkkhaki><b>Дата исполнения</b></td>                                             
    <td width=20% colspan=1 align=center bgcolor=Khaki><b>Исполнитель</b></td>                                             
    <td width=20% colspan=1 align=center bgcolor=Wheat><b>Предприятие</b></td>                                             
    <td width=15% colspan=1 align=center bgcolor=Bisque><b>Рабочее место</b></td>                                             
    <td width=10% colspan=1 align=center bgcolor=Lemonchiffon><b>№№ заявок</b></td>                                             
    <td width=10% align=center bgcolor=Linen><b>кол-во заявок</b></td>                                             
   </tr>
<? $query="select fWDate, count(id) as Summa from deposition
           where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate>0)) group by fWDate order by FWDate ASC";
   $result = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
   $c=0;                                    
   while ($row=mysql_fetch_array($result)) 
   {$c++;?>
    <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level1=<?=$row["fWDate"]?>')">  
     <td colspan=1 bgcolor=Darkkhaki><?=$c?> <b><a href=Tablica2.php?mode=<?=$mode?>&level1=<?=$row["fWDate"]?>><?=$row["fWDate"]?></a></b></td>   
     <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
     <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
     <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
     <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>                                             
     <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row["Summa"]?></b></td> 
    </tr>
<?  if ((isset($level1)) and ($level1==$row["fWDate"])) {
     $query="select sotrudniki.fFIO as FIO, fWFIO, count(id) as Summa from deposition
             left join sotrudniki on sotrudniki.fId=deposition.fWFIO
             where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate='".$level1."')) 
             group by fFIO 
             order by sotrudniki.fFIO ASC";
     $result1 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
     $c1=0;
     while ($row1=mysql_fetch_array($result1)) 
     {$c1++;?>
      <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$row1["fWFIO"]?>')">  
       <td align=right bgcolor=Darkkhaki>&nbsp;</td>   
       <td align=left colspan=1 bgcolor=khaki><?=$c1;?> <a href=Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$row1["fWFIO"]?>><?=$row1["FIO"]?></A></td>   
       <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
       <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
       <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>                                             
       <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row1["Summa"]?></b></td> 
      </tr>
<?    if ((isset($level2)) and ($level2==$row1["fWFIO"])) {
     $query="select Predpr1.fName as NAME, fFilial, count(id) as Summa from deposition
             left join Predpr1 on Predpr1.fId=deposition.fFilial
             where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate='".$level1."') and (fWFIO=".$level2.")) 
             group by fFilial 
             order by Summa DESC";
       $result2 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
       $c2=0;
       while ($row2=mysql_fetch_array($result2)) 
       {$c2++;?>
        <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$row2["fFilial"]?>')">  
         <td align=right bgcolor=Darkkhaki>&nbsp;</td>   
         <td align=right bgcolor=khaki>&nbsp;</td>   
         <td align=left colspan=1 bgcolor=Wheat><?=$c2;?> <a href='Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$row2["fFilial"]?>'><?=$row2["NAME"]?></a></td>   
         <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
         <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>                                             
         <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row2["Summa"]?></b></td> 
        </tr>
<?      if ((isset($level3)) and ($level3==$row2["fFilial"])) {
       $query="select ARMs.fName as ARM, fARM, count(id) as Summa from deposition
               left join ARMs on ARMs.fId=deposition.fARM
               where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate='".$level1."') and (fWFIO='".$level2."') and (fFilial='".$level3."')) 
               group by fARM 
               order by ARMs.fName ASC";
         $result3 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
         $c3=0;
         while ($row3=mysql_fetch_array($result3)) 
         {$c3++;?>
          <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$level3?>&level4=<?=$row3["fARM"]?>')">  
           <td width=20% colspan=1 align=center bgcolor=DarkKhaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
           <td align=left colspan=1 bgcolor=Bisque><?=$c3;?> <a href='Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$level3?>&level4=<?=$row3["fARM"]?>'><?=$row3["ARM"]?></a></td>   
           <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>
           <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row3["Summa"]?></b></td> 
          </tr>
<?      if ((isset($level4)) and ($level4==$row3["fARM"])) {
         $query="select id from deposition
                 where (((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year.")) and (fWDate='".$level1."') and (fWFIO='".$level2."') and (fFilial='".$level3."') and (fARM='".$level4."'))";
         $result4 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
         while ($row4=mysql_fetch_array($result4)) 
         {?>
          <tr bgcolor=Turquoise onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('info3.php?id=<?=$row4["id"]?>')">  
           <td width=20% colspan=1 align=center bgcolor=DarkKhaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
           <td align=left colspan=1 bgcolor=Bisque>&nbsp;</td>
           <td align=center bgcolor=Lemonchiffon><a href='info3.php?id=<?=$row4["id"]?>'><?=$row4["id"]?></a></td>   
           <td width=10% colspan=1 align=center bgcolor=Linen>1</td> 
          </tr>
<? }}}}}}}}}?>
</table>
<?}?>
</td></tr>
<tr  bgcolor=palegreen
 onMouseOver="this.style.backgroundColor='00FF7F'" 
 onMouseOut="this.style.backgroundColor=''">
 <td onClick="load('Tablica2.php?mode=6')">
  <font color="Crimson">
   <?if ($mode==6) {?><a href=Tablica2.php?mode=0 title='-'>&nbsp;-&nbsp;</a><b><?}
     else {?><a href=Tablica2.php?mode=6 title='+'>&nbsp;+&nbsp;</a><?}?>
      По задачам</b><font></td>
</tr>
<?if ($mode==6) {
 $qryDateSel="DateOtm=".$Otm;
   if ($period==0) $qryDateSel="((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year."))";
   if ($period==1) $qryDateSel="YearOtm=".$year;
   if ($period==2) $qryDateSel="YearOtm=".$year;
?>
<tr>
 <td BGCOLOR=PALEGREEN>
  <table bgcolor=Beige border="1" align="center" cellspacing=0 width=90%>
   <tr>
    <td width=20% colspan=1 align=center bgcolor=Darkkhaki><b>Задача</b></td>
    <td width=20% colspan=1 align=center bgcolor=Khaki><b>Дата</b></td>                                             
    <td width=20% colspan=1 align=center bgcolor=Khaki><b>Исполнитель</b></td>                                             
    <td width=20% colspan=1 align=center bgcolor=Wheat><b>Предприятие</b></td>                                             
    <td width=15% colspan=1 align=center bgcolor=Bisque><b>Рабочее место</b></td>                                             
    <td width=10% colspan=1 align=center bgcolor=Lemonchiffon><b>№№ заявок</b></td>                                             
    <td width=10% align=center bgcolor=Linen><b>кол-во заявок</b></td>                                             
   </tr>
<? $query="select Oborud.Nazvan as NAME, fDevice, count(id) as Summa from deposition
           left join Oborud on deposition.fDevice=Oborud.idO 
           where ((".$qryDateSel.") and (fWDate>0))
           group by fDevice order by NAME ASC";
   $result = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
   $c=0;                                    
   while ($row=mysql_fetch_array($result)) 
   {$c++;?>
    <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level0=<?=$row["fDevice"]?>')">  
     <td colspan=1 bgcolor=Darkkhaki><?=$c?> <b><a href=Tablica2.php?mode=<?=$mode?>&level0=<?=$row["fDevice"]?>><?=$row["NAME"]?></a></b></td>   
     <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
     <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
     <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
     <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
     <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>                                             
     <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row["Summa"]?></b></td> 
    </tr>
<?  if ((isset($level0)) and ($level0==$row["fDevice"])) {
     $query="select fWDate,count(id) as Summa from deposition
             where ((".$qryDateSel.") and (fWDate>0) and (fDevice=".$level0.")) 
             group by fWDate 
             order by fWDate ASC";
     $result0 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
     $c0=0;
     while ($row0=mysql_fetch_array($result0)) 
     {$c0++;?>
      <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level0=<?=$level0?>&level1=<?=$row0["fWDate"]?>')">  
       <td align=right bgcolor=Darkkhaki>&nbsp;</td>   
       <td align=left colspan=1 bgcolor=khaki><?=$c0;?> <a href=Tablica2.php?mode=<?=$mode?>&level0=<?=$level0?>&level1=<?=$row0["fWDate"]?>><?=$row0["fWDate"]?></A></td>   
     <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
       <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
       <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
       <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>                                             
       <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row0["Summa"]?></b></td> 
      </tr>
<?  if ((isset($level1)) and ($level1==$row0["fWDate"])) {
     $query="select sotrudniki.fFIO as FIO, fWFIO, count(id) as Summa from deposition
             left join sotrudniki on sotrudniki.fId=deposition.fWFIO
             where ((".$qryDateSel.") and (fDevice='".$level0."') and (fWDate='".$level1."')) 
             group by fFIO 
             order by sotrudniki.fFIO ASC";
     $result1 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
     $c1=0;
     while ($row1=mysql_fetch_array($result1)) 
     {$c1++;?>
      <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level1=<?=$level1?>&level2=<?=$row1["fWFIO"]?>')">  
       <td align=right bgcolor=Darkkhaki>&nbsp;</td>   
       <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
       <td align=left colspan=1 bgcolor=khaki><?=$c1;?> <a href=Tablica2.php?mode=<?=$mode?>&level0=<?=$level0?>&level1=<?=$level1?>&level2=<?=$row1["fWFIO"]?>><?=$row1["FIO"]?></A></td>   
       <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
       <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
       <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>                                             
       <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row1["Summa"]?></b></td> 
      </tr>
<?    if ((isset($level2)) and ($level2==$row1["fWFIO"])) {
     $query="select Predpr1.fName as NAME, fFilial, count(id) as Summa from deposition
             left join Predpr1 on Predpr1.fId=deposition.fFilial
             where ((".$qryDateSel.") and (fWDate='".$level1."') and (fDevice='".$level0."') and (fWFIO=".$level2.")) 
             group by fFilial 
             order by Summa DESC";
       $result2 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
       $c2=0;
       while ($row2=mysql_fetch_array($result2)) 
       {$c2++;?>
        <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level0=<?=$level0?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$row2["fFilial"]?>')">  
         <td align=right bgcolor=Darkkhaki>&nbsp;</td>   
         <td align=right bgcolor=khaki>&nbsp;</td>   
         <td align=right bgcolor=khaki>&nbsp;</td>   
         <td align=left colspan=1 bgcolor=Wheat><?=$c2;?> <a href='Tablica2.php?mode=<?=$mode?>&level0=<?=$level0?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$row2["fFilial"]?>'><?=$row2["NAME"]?></a></td>   
         <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
         <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>                                             
         <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row2["Summa"]?></b></td> 
        </tr>
<?      if ((isset($level3)) and ($level3==$row2["fFilial"])) {
       $query="select ARMs.fName as ARM, fARM, count(id) as Summa from deposition
               left join ARMs on ARMs.fId=deposition.fARM
               where ((".$qryDateSel.") and (fWDate='".$level1."') and (fDevice='".$level0."') and (fWFIO='".$level2."') and (fFilial='".$level3."')) 
               group by fARM 
               order by ARMs.fName ASC";
         $result3 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
         $c3=0;
         while ($row3=mysql_fetch_array($result3)) 
         {$c3++;?>
          <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level0=<?=$level0?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$level3?>&level4=<?=$row3["fARM"]?>')">  
           <td width=20% colspan=1 align=center bgcolor=DarkKhaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
           <td align=right bgcolor=khaki>&nbsp;</td>   
           <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
           <td align=left colspan=1 bgcolor=Bisque><?=$c3;?> <a href='Tablica2.php?mode=<?=$mode?>&level0=<?=$level0?>&level1=<?=$level1?>&level2=<?=$level2?>&level3=<?=$level3?>&level4=<?=$row3["fARM"]?>'><?=$row3["ARM"]?></a></td>   
           <td width=15% colspan=1 align=center bgcolor=Lemonchiffon>&nbsp;</td>
           <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row3["Summa"]?></b></td> 
          </tr>
<?      if ((isset($level4)) and ($level4==$row3["fARM"])) {
         $query="select id from deposition
                 where ((".$qryDateSel.") and (fWDate='".$level1."') and (fDevice='".$level0."') and (fWFIO='".$level2."') and (fFilial='".$level3."') and (fARM='".$level4."'))";
         $result4 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
         while ($row4=mysql_fetch_array($result4)) 
         {?>
          <tr bgcolor=Turquoise onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('info3.php?id=<?=$row4["id"]?>')">  
           <td width=20% colspan=1 align=center bgcolor=DarkKhaki>&nbsp;</td>                                             
           <td width=20% colspan=1 align=center bgcolor=Khaki>&nbsp;</td>                                             
           <td align=right bgcolor=khaki>&nbsp;</td>   
           <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
           <td align=left colspan=1 bgcolor=Bisque>&nbsp;</td>
           <td align=center bgcolor=Lemonchiffon><a href='info3.php?id=<?=$row4["id"]?>'><?=$row4["id"]?></a></td>   
           <td width=10% colspan=1 align=center bgcolor=Linen>1</td> 
          </tr>
<? }}}}}}}}}}}?>
</table>
<?}?>
</td></tr>
<tr  bgcolor=palegreen
 onMouseOver="this.style.backgroundColor='00FF7F'" 
 onMouseOut="this.style.backgroundColor=''">
 <td onClick="load('Tablica2.php?mode=7')">
  <font color="Crimson">
   <?if ($mode==7) {?><a href=Tablica2.php?mode=0 title='-'>&nbsp;-&nbsp;</a><b><?}
     else {?><a href=Tablica2.php?mode=7 title='+'>&nbsp;+&nbsp;</a><?}?>
      По оборудованию (инв номера)</b><font></td>
</tr>
<?if ($mode==7) {
 $qryDateSel="DateOtm=".$Otm;
   if ($period==0) $qryDateSel="((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year."))";
   if ($period==1) $qryDateSel="YearOtm=".$year;
   if ($period==2) $qryDateSel="YearOtm=".$year;
?>
<tr>
 <td BGCOLOR=PALEGREEN>
  <table bgcolor=Beige border="1" align="center" cellspacing=0 width=90%>
   <tr>
    <td width=20% colspan=1 align=center bgcolor=Wheat><b>Инвентарный номер</b></td>                                             
    <td width=15% colspan=1 align=center bgcolor=Bisque><b>Устройство</b></td>                                             
    <td width=20% colspan=1 align=center bgcolor=Khaki><b>Предприятие</b></td>                                             
    <td width=10% colspan=1 align=center bgcolor=Lemonchiffon><b>№№ заявок/актов</b></td>                                             
    <td width=10% align=center bgcolor=Linen><b>кол-во заявок</b></td>                                             
   </tr>
<? $query="select Predpr1.fName as Filial, fFilial,Oborud.Nazvan as NAME, fModel ,fInvN, count(id) as Summa from deposition
           left join Oborud on deposition.VidOborud=Oborud.idO 
           left join Predpr1 on Predpr1.fId=deposition.fFilial
           where ((".$qryDateSel.") and (fWDate>0) and (fInvN>0))
           group by fInvN order by NAME ASC";
   $result = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
   $c=0;                                    
   while ($row=mysql_fetch_array($result)) 
   {$c++;?>
    <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level0=<?=$row["fDevice"]?>')">  
     <td colspan=1 bgcolor=Darkkhaki><?=$c?> <b><a href=Tablica2.php?mode=<?=$mode?>&level4=<?=$row["fInvN"]?>><?=$row["fInvN"]?></a></b></td>   
     <td width=20% colspan=1 align=center bgcolor=Khaki><?=$row["NAME"]?>(<?=$row["fModel"]?>)</td>                                             
     <td width=20% colspan=1 align=center bgcolor=Wheat><?=$row["Filial"]?></td>                                             
     <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
     <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row["Summa"]?></b></td> 
    </tr>
<?      if ((isset($level4)) and ($level4==$row["fInvN"])) {
         $query="select id from deposition
                 where ((".$qryDateSel.") and (fFilial='".$row[fFilial]."') and (fInvN='".$level4."'))";
         $result4 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
         while ($row4=mysql_fetch_array($result4)) 
         {?>
          <tr bgcolor=Turquoise onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('info3.php?id=<?=$row4["id"]?>')">  
           <td width=20% colspan=1 align=center bgcolor=DarkKhaki>&nbsp;</td>                                             
           <td align=right bgcolor=khaki>&nbsp;</td>   
           <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
           <td align=center bgcolor=Lemonchiffon><a href='info3.php?id=<?=$row4["id"]?>'><?=$row4["id"]?></a></td>   
           <td width=10% colspan=1 align=center bgcolor=Linen>1</td> 
          </tr>
<? }}}?>
</table>
<?}?>
</td></tr>
<tr  bgcolor=palegreen
 onMouseOver="this.style.backgroundColor='00FF7F'" 
 onMouseOut="this.style.backgroundColor=''">
 <td onClick="load('Tablica2.php?mode=8')">
  <font color="Crimson">
   <?if ($mode==8) {?><a href=Tablica2.php?mode=0 title='-'>&nbsp;-&nbsp;</a><b><?}
     else {?><a href=Tablica2.php?mode=8 title='+'>&nbsp;+&nbsp;</a><?}?>
      По техобслуживанию (вид оборудования)</b><font></td>
</tr>
<?if ($mode==8) {
 $qryDateSel="DateOtm=".$Otm;
   if ($period==0) $qryDateSel="((DateOtm='".$Otm."') and (YEAR(fWDate)=".$year."))";
   if ($period==1) $qryDateSel="YearOtm=".$year;
   if ($period==2) $qryDateSel="YearOtm=".$year;
?>
<tr>
 <td BGCOLOR=PALEGREEN>
  <table bgcolor=Beige border="1" align="center" cellspacing=0 width=90%>
   <tr>
    <td width=20% colspan=1 align=center bgcolor=Wheat><b>Инвентарный номер</b></td>                                             
    <td width=15% colspan=1 align=center bgcolor=Bisque><b>Устройство</b></td>                                             
    <td width=20% colspan=1 align=center bgcolor=Khaki><b>Предприятие</b></td>                                             
    <td width=10% colspan=1 align=center bgcolor=Lemonchiffon><b>№№ заявок/актов</b></td>                                             
    <td width=10% align=center bgcolor=Linen><b>кол-во заявок</b></td>                                             
   </tr>
<? $query="select Oborud.Nazvan as NAME, fDevice, VidOborud, count(id) as Summa from deposition
           left join Oborud on deposition.VidOborud=Oborud.idO 
           where ((".$qryDateSel.") and (fWDate>0) and (fDevice=26))
           group by VidOborud order by NAME ASC";
   $result = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
   $c=0;                                    
   while ($row=mysql_fetch_array($result)) 
   {$c++;?>
    <tr onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('Tablica2.php?mode=<?=$mode?>&level0=<?=$row["fDevice"]?>')">  
     <td colspan=1 bgcolor=Darkkhaki><?=$c?> <b><a href=Tablica2.php?mode=<?=$mode?>&level4=<?=$row["fInvN"]?>><?=$row["fInvN"]?></a></b></td>   
     <td width=20% colspan=1 align=center bgcolor=Khaki><?=$row["NAME"]?>(<?=$row["fModel"]?>)</td>                                             
     <td width=20% colspan=1 align=center bgcolor=Wheat><?=$row["Filial"]?></td>                                             
     <td width=15% colspan=1 align=center bgcolor=Bisque>&nbsp;</td>                                             
     <td width=10% colspan=1 align=center bgcolor=Linen><b><?=$row["Summa"]?></b></td> 
    </tr>
<?      if ((isset($level4)) and ($level4==$row["fInvN"])) {
         $query="select id from deposition
                 where ((".$qryDateSel.") and (fFilial='".$row[fFilial]."') and (fInvN='".$level4."'))";
         $result4 = mysql_query ($query) or die ("Ошибка в запросе к таблице Oborud!<i><br>".$query);
         while ($row4=mysql_fetch_array($result4)) 
         {?>
          <tr bgcolor=Turquoise onMouseOver="this.style.backgroundColor='05FF7F'" onMouseOut="this.style.backgroundColor=''" onClick="load('info3.php?id=<?=$row4["id"]?>')">  
           <td width=20% colspan=1 align=center bgcolor=DarkKhaki>&nbsp;</td>                                             
           <td align=right bgcolor=khaki>&nbsp;</td>   
           <td width=20% colspan=1 align=center bgcolor=Wheat>&nbsp;</td>                                             
           <td align=center bgcolor=Lemonchiffon><a href='info3.php?id=<?=$row4["id"]?>'><?=$row4["id"]?></a></td>   
           <td width=10% colspan=1 align=center bgcolor=Linen>1</td> 
          </tr>
<? }}}?>
</table>
<?}?>
<?}?>

</body>