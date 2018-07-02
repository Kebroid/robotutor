<?php 
	session_start();
	require('../assets/config/constants.php');
	$link = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    $result = $link->query("SELECT * FROM challenges") or die("could not");

	header("Content-type: text/txt");

	if (isset($_SESSION['auth']) && $_SESSION['auth']){
		$level = $_SESSION['level'];
		$quer = "SELECT input FROM challenges WHERE id = $level";
	    $quer_run = $link->query($quer);
	    while ($quer_row = $quer_run->fetch_assoc()){
	       $input = $quer_row['input'];
	    }
	    echo $input;
	} else {
		echo "Oldin kiring yoki ro'yhatdan o'ting!";
	}

?>
