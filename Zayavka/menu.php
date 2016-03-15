<?
  setcookie("sec",$sec,time()+36000);
  setcookie("who",$who,time()+36000);  
  setcookie("Nomer",$Nomer,time()+36000);  
  setcookie("Otm",$Otm,time()+36000);  
  setcookie("period",0,time()+36000);  
  setcookie("year",$year,time()+36000); 
  setcookie("otdel",$otdel,time()+36000);  
?>
<html>
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
<head>
 
<meta http-equiv="expires" content="0">

<script language="JavaScript">
<!--
function load(url,suburl,url1,url2) {
 parent.buttons.location.href= url;                
 parent.list.location.href= suburl; 

}
// -->
</script>
 
</head>
<br>
<BODY <?if (!isset($clear)) {?>OnLoad="load('menu.php?clear=0','about.php?key=<?=$key?>')"<?}?> background="x1_d.jpg" topmargin=0 leftmargin=0 marginwidth=0 marginheight=0>
<center>
<img  src=
<?if (!isset($level)) {?>"pics/images (1).jpg"<?}
if ($level==1) {?>"pics/images.jpg"<?}
if ($level==2) {?>"pics/images (9).jpg"<?}
if ($level==3) {?>"pics/images (3).jpg"<?}
if ($level==4) {?>"pics/images (6).jpg"<?}
if ($level==5) {?>"pics/images (5).jpg"<?}
if ($level==6) {?>"pics/images (4).jpg"<?}?>
 align="center" width=100>

<br>
<br> 
<table align="center" border="0" width="100%" cellspacing="0" cellpadding="0" background="pics/2m.gif">
      <tr>
          <td width="5%">
                    <img border="0" src="pics/1a.gif" width="22" height="25"></td>
          <td width="90%">
                      <p align="center"><b>
                      <font face="Verdana" size="2" color="#FFFFFF">Меню</font></b></td>
          <td width="5%">&nbsp;</td>
       </tr>
</table>

<table align="center" border="1" width="100%" cellspacing="0" cellpadding="0">
    
       <td width="100%" bgcolor="#FFFFFF" >

<table border="0" align="center" width="100%" cellpadding="2" cellspacing="3" style="border-collapse: collapse" bordercolor="#111111">
       
<?if ($sec>1) 
  {?>
     <tr aligne=left>
             <td width="1%">
                          <img border="0" src="pics/vist.gif" width="20" height="21"></td>
             <td width="99%" bgcolor='<? if ($level==1) {print("00FF7F");}?>'
   onMouseOver="this.style.backgroundColor='00FF7F'" 
   onMouseOut="this.style.backgroundColor='<? if ($level==1) {print("00FF7F");}?>'" onClick="load('menu.php?clear=0&level=1','http://10.37.1.5/~aigul/Zayavka/inbox1.php')">
<font face="Bookman Old Style" size=2><a>Входящие</a></font>
 </td>
     </tr>
<?}?>
     <tr>
             <td width="1%">
                          <img border="0" src="pics/vist.gif" width="20" height="21"></td>
      <td width="99%" bgcolor='<? if ($level==2) {print("00FF7F");}?>'
   onMouseOver="this.style.backgroundColor='00FF7F'" 
   onMouseOut="this.style.backgroundColor='<? if ($level==2) {print("00FF7F");}?>'" onClick="load('menu.php?clear=0&level=2','http://10.37.1.5/~aigul/Zayavka/outbox1.php')">
 <font face="Bookman Old Style" size=2><a>К исполнению</a></font>
 </td>

     </tr>

     <tr>
             <td width="1%">
                          <img border="0" src="pics/vist.gif" width="20" height="21"></td>
             <td width="99%" bgcolor='<? if ($level==3) {print("00FF7F");}?>'
   onMouseOver="this.style.backgroundColor='00FF7F'" 
   onMouseOut="this.style.backgroundColor='<? if ($level==3) {print("00FF7F");}?>'" onClick="load('menu.php?clear=0&level=3','http://10.37.1.5/~aigul/Zayavka/arhiv1.php')">
 <font face="Bookman Old Style" size=2><a>Журнал</a></font>
             </td>
    </tr>
 

     <tr>
             <td width="1%">
                          <img border="0" src="pics/vist.gif" width="20" height="21"></td>
             <td width="99%" bgcolor='<? if ($level==4) {print("00FF7F");}?>'
   onMouseOver="this.style.backgroundColor='00FF7F'" 
   onMouseOut="this.style.backgroundColor='<? if ($level==4) {print("00FF7F");}?>'" onClick="load('menu.php?clear=0&level=4','http://10.37.1.5/~aigul/Zayavka/Tablica.php')">
 <font face="Bookman Old Style" size=2><a>Анализ</a></font>
             </td>
    </tr>
<? if ($sec>0) {?>
     <tr>
             <td width="1%">
                          <img border="0" src="pics/vist.gif" width="20" height="21"></td>
             <td width="99%" bgcolor='<? if ($level==6) {print("00FF7F");}?>'
   onMouseOver="this.style.backgroundColor='00FF7F'" 
   onMouseOut="this.style.backgroundColor='<? if ($level==6) {print("00FF7F");}?>'" onClick="load('menu.php?clear=0&level=6','http://10.37.1.5/~aigul/Zayavka/akts.php')">
 <font face="Bookman Old Style" size=2><a>Ввод актов</a></font>
             </td>
    </tr>
<?}?>
<? if ($sec>2) {?>
     <tr>
             <td width="1%">
                          <img border="0" src="pics/vist.gif" width="20" height="21"></td>
             <td width="99%" bgcolor='<? if ($level==7) {print("00FF7F");}?>'
   onMouseOver="this.style.backgroundColor='00FF7F'" 
   onMouseOut="this.style.backgroundColor='<? if ($level==7) {print("00FF7F");}?>'" onClick="load('menu.php?clear=0&level=7','http://10.37.1.5/~aigul/Zayavka/aktt.php')">
 <font face="Bookman Old Style" size=2><a>Ввод ППР</a></font>
             </td>
    </tr>
<?}?>
<? if ($sec>2) {?>
     <tr>
             <td width="1%">
                          <img border="0" src="pics/vist.gif" width="20" height="21"></td>
             <td width="99%" bgcolor='<? if ($level==5) {print("00FF7F");}?>'
   onMouseOver="this.style.backgroundColor='00FF7F'" 
   onMouseOut="this.style.backgroundColor='<? if ($level==5) {print("00FF7F");}?>'" onClick="load('menu.php?clear=0&level=5','http://10.37.1.5/~aigul/Zayavka/Libs1.php')">
 <font face="Bookman Old Style" size=2><a>Справочники</a></font>
             </td>
    </tr>
<?}?>
   

 
</table> 
</td>
</tr>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<center>
<a href=logout.php target=_parent><img src="pics/3.GIF" height=24
title="Жми для выхода" border=0></a><br> 

</html>
