<?
  if (isset($fCod)) {
   require("config.php");  
  if (isset($VRabotu)) {
   $query="Update deposition set fPrinted=".$VRabotu." where id=".$fCod;
  }
  else {
   $query="Delete from deposition where id=".$fCod;
  }
   $result = mysql_query ($query) or die("Could not create table Hosts");}
  header("Location: inbox.php");
?>
