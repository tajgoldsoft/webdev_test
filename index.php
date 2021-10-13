<!DOCTYPE html>
<html>
<head>
	<title>Test Web-dev</title>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<div class="header">
	<span class="logo">Test WEBDEV</span><span class="fio_user" id="fio_user">Гость</span><span class="av_reg" id="av_reg"><a href="#" id="s_i" onclick="login(this);">Вход</a></span>
</div>
<div class="body" id="body">
	<center>
	<form name="f1" id="f1" class="" method="post">
		<h1>Форма регистрации</h1>
		<label>Имя</label>
		<input type="text" name="name_user" id="nas">
		<label>Номер тел</label>
		<input type="tel" name="number_user" id="nus">
		<label>Логин</label>
		<input type="text" name="login_user" id="los">
		<label>Пароль</label>
		<input type="password" name="password_user" id="pas">
		<input type="submit" name="reg_user" id="reg_user" value="Зарегистрироваться">
	</form>
	<form name="f2" id="f2" class="hide" method="post">
		<h1>Форма авторизации</h1>
		<label>Логин</label>
		<input type="text" name="login_user" id="los">
		<label>Пароль</label>
		<input type="password" name="password_user" id="pas">
		<input type="submit" name="reg_user" id="reg_user" value="Авторизация">
	</form>
	
	</center>
	<div class="hide" id="body_div"></div>
</div> 
<div class="footer header"><p>Инофо о проекте!!!</p></div>
<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="ajax.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/core.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>

</body>
</html>