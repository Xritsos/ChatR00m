<?php session_start(); ?>
<!DOCTYPE html>
	<html>
		<head> 
			<title> Σύνδεση </title>
			<meta http-equiv="Content-Type" content="text/html ; charset=utf-8">
		    <link rel="shortcut icon" href="favicon.ico">
		</head>
			<body background="sign_back.jpg">	
			<LINK rel=stylesheet href="menu.css" type="text/css">
						<table border=0 align=left  width=250px   bgcolor="#4d4dff"> 
					<tr>
					<td align=center> 	
						<menu_font> Menu </menu_font> 
					</td>
					</tr>
						<tr>
						<td>
						<ul>	
					   <menu_selections_font> <li> <a href="http://dalab.ee.duth.gr/~57227/ChatR00m.html"> Αρχική σελίδα </a> </li> 
							                  <br> </br>
											  <br> </br>
											  <li> <a href="http://dalab.ee.duth.gr/~57227/chatval.php"> ChatR00m service </a> </li>
											  <br> </br>
											  <br> </br>
											  <li> <a href="http://dalab.ee.duth.gr/~57227/epikoinwnia.html"> Επικοινωνία </a> </li>
							</menu_selections_font>		
						</ul>
					</td>
				</tr>
			</table>
			     <h1> <font color="white"> Είσοδος στο !!!ChatR00m!!!  </h1>
			<form name="sign in" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				Όνομα:<input type="text" name="nome">
					<br> </br>
				email:<input type="email" name="mail">
					<br> </br>
				Κωδικός:<input type="password" name="password">
					<br> </br>
			</font>		
				<input type="submit" name="submit" value="Σύνδεση">
			</form>		
			
			<?php 
				if(isset($_POST["submit"])){
					$link_id = mysqli_connect("localhost","u57227","14221042","db_57227"); 
					mysqli_set_charset($link_id,"utf8");
					$email = mysqli_real_escape_string($link_id,$_POST["mail"]);
					$name = mysqli_real_escape_string($link_id,$_POST["nome"]);
					$pass = mysqli_real_escape_string($link_id,$_POST["password"]);
					
                   
					$result = mysqli_query($link_id,"SELECT * FROM `chat_tb` WHERE `name`='".$name."' AND `email`='".$email."' AND `password`='".$pass."' LIMIT 1");
					$rows = mysqli_num_rows($result);
					
					if($rows > 0){
						$_SESSION["email"] = $email ;
						$_SESSION["name"] = $name ;
						header("Location:http://dalab.ee.duth.gr/~57227/chat.php");
					}else{
						echo "<font color=white> Λάθος στοιχεία!!! </font>";
					}
					mysqli_close($link_id);
				}
            ?>	
		</body>
</html>		
				