<?            
  $BDName="zayavka";
  $BDUser="user";
  $BDHost="localhost";
  $BDPwd="123456";
  $link = mysql_connect($BDHost, $BDUser, $BDPwd) or die ("Could not connect to remote host");
 mysql_select_db ($BDName) or die ("Couldn't connect to select base");  
$query="SET NAMES cp1251";
  $result=mysql_query($query);
  
?>
