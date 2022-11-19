<html>
<head> <meta http-equiv="refresh" content="3"> </head>
<body>
<?php
	$con = mysqli_connect("localhost","u57227","14221042","db_57227");
	mysqli_set_charset($con,"utf8");
	$result = mysqli_query($con,"SELECT messages FROM `mess_db` ");
	   while($row = mysqli_fetch_array($result)){
			echo "<font color=white>" . $row["messages"] . "</font>";
			echo"<p>";
	    }	
	mysqli_close($con);	
?>		
</body>
</html>