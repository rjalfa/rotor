<?php //show_title('Функция addmail'); ?>

Функция для отправки писем на email, отсылает письма через стандартную функцию <a href="http://ru.php.net/manual/ru/function.mail.php">mail()</a>, данные отправляются в кодировке UTF-8<br><br>

<pre class="d">
<b>addmail</b>(
	string mail,
	string subject,
	string messages,
	string sendermail = "",
	string sendername = ""
);
</pre><br>

<b>Параметры функции</b><br>

<b>mail</b> - email на который отсылаем сообщение<br>
<b>subject</b> - Тема сообщения<br>
<b>messages</b> - Текст сообщения<br>
<b>sendermail</b> - email отправителя, если оставить пустым, то письмо будет отправлено c электронной почты администратора<br>
<b>sendername</b> - Имя отправителя, если оставить пустым, то письмо будет отправлено от имени администратора сайта<br><br>

<b>Примеры использования</b><br>
<?php
echo bbCode(check('[code]<?php
echo addmail(\'nobody@example.com\', \'Это тема\', \'Это текст сообщения\'); /* Отправит письмо от администратора сайта */
echo addmail(\'nobody@example.com\', \'Это тема\', \'Это текст сообщения\', \'webmaster@example.com\', \'webmaster\'); /* Отправит письмо от пользователя webmaster */
?>[/code]'));
?>

<br>
<i class="fa fa-arrow-circle-left"></i> <a href="/files/docs">Вернуться</a><br>
