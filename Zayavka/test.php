<?
 require("config.php");
$query = "update deposition set YearOtm=YEAR(fWDate)";
$result = mysql_query ($query) or die ("������ � ������� � �������!<i><br>".$query);

?>
