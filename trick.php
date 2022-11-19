<?php
			session_start();
	         if (isset($_POST["submit"])){
				$connection = mysqli_connect("localhost","u57227","14221042","db_57227");
				mysqli_set_charset($connection,"utf8");
				$text = mysqli_real_escape_string($connection,$_POST["chating"]);
				if($text != " "){
				    $text = "{" . date("h:i:sa") . "}" . "  " . "from:" . $_SESSION["email"] . ":" . "<br>" . " " . $text;
				    mysqli_query($connection,"INSERT INTO mess_db (messages)
				                VALUES('$text')");	
				}		 
				mysqli_close($connection);		
		      }
	       header('Location: http://dalab.ee.duth.gr/~57227/chat.php');
	       die();
?>	