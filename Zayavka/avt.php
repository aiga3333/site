<? 
require("config.php");

$query = "SELECT *,sotrudniki.fId as Id, Otdel.fName as Otd FROM sotrudniki left join Otdel on sotrudniki.fOtdel=Otdel.fId"; 
$result = mysql_query ($query) or die ("Ошибка в запросе!<i><br>".$query);
while ($row=mysql_fetch_array($result))  {
 if (($row["login"]==$login) and ($row["password"]==$password)) 
 {
  $who=$row["fFIO"];
  $sec=$row["sec"];
  $Nomer=$row["Id"];   
  $otdel=$row["Otd"];   
  $date=date("Y-m-j H:i:s");
  $ip=$REMOTE_ADDR;
   
  setcookie("sec",$sec,time()+36000);
  setcookie("who",$who,time()+36000);  
  setcookie("Nomer",$Nomer,time()+36000);  
  setcookie("Otm",date("n"),time()+36000);  
  setcookie("period",0,time()+36000);  
  setcookie("year",date("Y"),time()+36000); 
  setcookie("otdel",$otdel,time()+36000);  

  $query = "INSERT INTO logins (fUser,fDateTime,fIp,fWork) values ('".$who."','".$date."','".$ip."','zajavka')"; 
  $result1 = mysql_query ($query) or die ("Ошибка в запросе!<i><br>".$query);
  header("Location: index1.php");  
 }
}
?> 
<html>
<head>
<meta http-equiv="expires" content="0">
</head>
</html>
