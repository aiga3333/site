<?
require("config.php");
$query = "SELECT * FROM deposition WHERE UPPER(fBText) 
LIKE '%".strtoupper($_POST['search'])."%' 
or UPPER(fWText) LIKE '%".strtoupper($_POST['search'])."%'";
$result = mysql_query($query) or die("Запрос ошибочный");                                    

print "<body background=pics/index_05.jpg>\n";
print "<table border=0 align=center width=100%>\n";
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
print "\t<tr>\n";
for ($i=0;$i<=30;$i++) { 
print "\t\t<td>$row[$i]</td>\n"; }
print "\t</tr>\n";
}
print "</table>\n";                
print "</body>\n";                
 

?>
