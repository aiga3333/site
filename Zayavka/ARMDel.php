<?
  if (isset($fId)) {
   require("config.php");
   $query="Delete from ARMs where fId=".$fId;
   $result = mysql_query ($query) or die("Could not create table Hosts");}
  header("Location: ARMAdd.php");
?>
