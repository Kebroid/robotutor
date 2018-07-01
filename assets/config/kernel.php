<?php 
	session_start();
	require("./functions.php");
	$login = ['Foydalanish uchun !', 'Kirmasangiz davom etaolmaymiz!', 
	'Uzur, tushunmadim <br>siz bu yerga birinchi marta kelishizmi?', "Iltimos, oldin ro'yhatdan o'ting yoki kiring"];

	

	$request = isset($_POST['request']) ? $_POST['request'] : false;


	if (isset($_SESSION['auth']) and $_SESSION['auth']) {
		if (isCommand($request)) {
		   	switch (strtolower($request)) {
		   		case '/logout':
		   			logOut();
		   			break;
		   		case '/friends':
		   			listFriends($_SESSION['level']);
		   			break;
		   		case '/top':
		   			getTop();
		   			break;
		   		case '/joke':
		   			joke();
		   			break;
		   		case '/lifehack':
		   			lifehack();
		   			break;
		   		case '/help':
		   			echo "<b>Yordamchi buyruqlar</b>:<br>/top<br>/joke<br>/friends<br>/lifehack<br>/logout";
		   			break;
		   		default:
		   			echo "Bunday buyruq mavjud emas.<br>/help deb yozing";
		   			break;
		   	}
		}
		else {
			checkAnswer($_SESSION['level'], $request);
		}
	} else {
		echo $login[mt_rand(0, count($login)-1)];
	}
?>