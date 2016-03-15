<?
require("config.php");
$query="Select * from Tablica";
$result = mysql_query ($query) or die("Erorr in query: <br><i>".$query."</i>");
?>  
         
<body background="pics/index_05.jpg">
<table border="0" align="center" width="100%"> 
<tr bgcolor=Gray>
<th width=3%> №</th>
<th width=5%>номер акта</th>
<th width=20%>Настоящий акт составлен</th>
<th width=16%>Оборудование</th>
<th width=25%>Осмотром установлено</th>
<th width=25%>Заключение</th>
<th width=6%>Дата составления акта</th>
</tr>

<? while ($row=mysql_fetch_array($result))
{          

for ($i = 0; $i < 10; $i++)
{
if (strpos($row["$i"], $search_query))    
{    ?>

<tr bgcolor=Gainsboro
onMouseOver="this.style.backgroundColor='808080'" 
    onMouseOut="this.style.backgroundColor=''" 
    onClick="load('akt2.php?Id=<?=$row["Id"]?>')">
<td align=center><?=$row["0"]?></td>  
<td align=center><?=$row["1"]?></td>
<td align=center><?=$row["2"]?></td>
<td align=center><?=$row["3"]?></td>
<td align=center><?=$row["4"]?></td>
<td align=center><?=$row["5"]?></td>
<td align=center><?=$row["6"]?></td>  

</tr>
  </table>                                                               
                                                    
   <?}?>        
   <?}?><?}?>
 </body>   
