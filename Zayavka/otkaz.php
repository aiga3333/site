<?
require("config.php");
if (isset($Ispolnitel2)) {
 $query = "update deposition set
 Ispolnitel =''
where id='".$id."'";
 $result = mysql_query ($query) or die ("������ � ������� � �������!<i><br>".$query);
}
 header("Location: outbox.php");
?>