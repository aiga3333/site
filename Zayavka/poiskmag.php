<?php
require("config.php");            
$query = "SELECT * FROM Tablica WHERE UPPER(Device) 
LIKE '%".strtoupper($_POST['nmag'])."%'";
$result = mysql_query($query) or die("������ ���������");
?>
<table border="0" align="center" width="100%"> 
<tr bgcolor=Gray>
<th width=3%>�</th>
<th width=7%>���</th>
<th width=15%>������������</th>
<th width=5%>��������� ��� ���������</th>
<th width=5%>���</th>
<th width=5%>���</th>
<th width=20%>�������� �����������</th>
<th width=20%>����������</th>
<th width=5%>���� ����������� ����</th>
<th width=15%>������.</th>
</tr>
                              
<? while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

echo'
<tr>
for ($i=0;$i<9;$i++) {                               
<td align=center>'.$row[$i].'</td> <br>";
    
 
</tr> 
';
}}
echo '</table>'
 
?>
