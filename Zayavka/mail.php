<?
 require("config.php");  
 $query="Select sotrudniki.fEmail 
         from deposition 
         left join sotrudniki on deposition.Ispolnitel=sotrudniki.fId 
         where id='".$id."'";
 $result = mysql_query ($query) or die("Erorr in query: <br><i>".$query."</i>");
 while ($row=mysql_fetch_array($result)) {
    $subj="List of orders. LOIS4.";
    $str="
<META HTTP-EQUIV='Content-Type' CONTENT='text/html; CHARSET=Windows-1251'> 
 <body bgcolor=palegreen>
  <font size=6 color=blue><b>Сообщение от системы учета заявок ЛОИС4 <br></b></font>
  <b>Вам к исполнению поступила заявка.<br>
  Подробности <a href=http://10.37.1.5/~aigul/Zayavka/>в журнале заявок</a>.</b>
  <br><br>
  Письмо сформировано автоматически. Пожалуйста не отвечайте на него.<br>
  Конфликтные вопросы можно обсудить с руководителем отдела <a href=mailto:Sotnik_AN@Karagandy.railways.kz>Сотник А.Н.</a>
 </body>";
    $body=convert_cyr_string($str,"w","w");
    mail ($row["fEmail"],$subj,$body,
          "From: web@karagandy.railways.kz\r\nMIME-Version: 1.0\r\nContent-type: text/html; charset=windows-1251\r\n");
 }
 header("Location: outbox.php");
?>