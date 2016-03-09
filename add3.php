<html>
<script language="JavaScript">
<!--
function load(url) {parent.list.location.href= url;}
// -->
</script>
 
<caption><font size="6" color= ><b><center>Добавить пользователя</center></font></caption>
 
<form name=upd action=proverka.php method=post>
<center><table border=0 width=50% align=center>
 
<tr BGCOLOR=white>
<th align=right width=20%>Эл.адрес</th>
<td align=left>
<input size=80 type=text  name=fmail value='@karagandy.railways.kz'>
<input size=50 type=hidden  name=DL value='<?=$DL?>'">
<input size=50 type=hidden  name=flevel value='<?=$NZ?>'">
            
</td>
</tr>
</table>

<center><br><input type=submit value=Добавить>
</form>
</body> 
</html>
