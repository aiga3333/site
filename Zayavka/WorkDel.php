<?
  if (isset($idW)) {
   require("config.php");
   $query="Delete from TypeWork where idW=".$idW;
   $result = mysql_query ($query) or die("Could not create table Hosts");}
  header("Location: WorkAdd.php");
?>
