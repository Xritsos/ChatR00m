<!DOCTYPE html>
<html>
	<head> 
		<title> Εγγραφή </title>
			<meta http-equiv="content-type" content="text/html ; charset=utf-8">
			<link rel="shortcut icon" href="favicon.ico">
			<script type="text/javascript">
				
				function validateForm(){
					var name = document.sub.name.value;
				    var email = document.sub.email.value;
				    var pass = document.sub.pass.value;
				    var passchk = document.sub.passck.value;
				    var flag = true;
				
					if(name == ""){
						alert("Το όνομα είναι υποχρεωτικό!");
						flag = "false";
						return false;
					}
					
					if(email == ""){
						alert("Το email είναι υποχρεωτικό!");
						flag = false;
						return false;
					}
	        
					var emailfilter = /(([a-zA-Z0-9\-?\.?]+)@(([a-zA-Z0-9\-_]+\.)+)([a-z]{2,3}))+$/;
					
					if(!(emailfilter.test(email))){
					    alert("Η διεύθυνση email δεν είναι έγκυρη!");
						flag = false;
						return false;
					}
					
					if(pass == ""){
						alert("Ο κωδικός είναι κενός!");
						flag = false;
						return false;
					}
					
					if(passchk == ""){
						alert("Η επαλήθευση κωδικού είναι απαραίτητη!");
						flag = false;
						return false;
					}
					
					if(pass != passchk){
						alert("Ο κωδικός επαλήθευσης δε ταιρίαζει με τον κωδικό!");
						flag = false;
						return false;
					}	
					
					
                }
				
				
				function resetForm(){
				  document.sub.name.value = "";
				  document.sub.email.value = "";
				  document.sub.pass.value = "";
			      document.sub.passck.value = "";
				}
			</script>
    </head>
		<body background="sub_back.jpg">
					<LINK rel=stylesheet href="menu.css" type="text/css">
					<table border=0 align=left  width=250px   bgcolor="#ccd8ff"> 
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
				
			<h1> Συμπληρώστε τα στοιχεία σας </h1>
			    <p> </p>
			<form  name="sub" method="post" onsubmit="return validateForm()" onreset="return resetForm()">
		       <b> Όνομα: </b> <input type="text" name="name">
					<br> </br>
				<b> e-mail:</b> <input type="email" name="email">
					<br> </br>
				<b> Κωδικός:</b> <input type="password" name="pass">
						<br> </br>
				<b> Επαλήθευση κωδικού:</b> <input type="password" name="passck">
						<br> </br>
				<input type="submit" name="submit" value="Υποβολή">
				<input type="reset" name="reset" value="Επαναφορά">
					<br> </br>
					<br> </br>
			<?php		
				if (isset($_POST["submit"])){
					$flag = "true";
					$link_id =  mysqli_connect("localhost","u57227","14221042","db_57227");
					mysqli_set_charset($link_id,"utf8");
					$name = mysqli_real_escape_string($link_id,$_POST["name"]);
					$mail = mysqli_real_escape_string($link_id,$_POST["email"]);
				    $pass = mysqli_real_escape_string($link_id,$_POST["pass"]);
					
					$result = mysqli_query($link_id,"SELECT * FROM `chat_tb` WHERE name='".$name."' AND email='".$mail."' LIMIT 1");
					$rows = mysqli_num_rows($result);
					
					if($rows > 0){
						echo "<b>Τα στοιχεία υπάρχουν ήδη</b>";
						$flag ="false";
					}else{
						echo "<b> Εγγραφή επιτυχής!!! </b>";
					}
					
					if($flag == "true"){
					   mysqli_query($link_id,"INSERT INTO `chat_tb`(ID,name,email,password)
				         VALUES('','$name','$mail','$pass')");
					}	
				    mysqli_close($link_id);
				}
			
			?>
			</form>
        </body>
</html>		
			