<?php
	// Start the session
	session_start();

	// Connect to the database
	include( "../../connection/park_connect.php" );

	if ( isset( $_REQUEST[ "add" ] ) )
		if ( $_REQUEST[ "add" ] == "Add"
			 && isset( $_REQUEST[ "order_name" ] )
			 && trim( $_REQUEST[ "order_name" ] ) 
		   ) // Check all setted
		{
			// Clear the values
			$order_name = mysqli_real_escape_string( $park_connection, $_REQUEST[ "order_name" ] );

			$query = "INSERT INTO animals_orders ( name ) VALUES ( '" . $order_name . "' )";

			mysqli_query( $park_connection, $query );

			// Clear the request
			$_REQUEST = array();

			// Print a message of success
			echo "<script>alert( 'Order Added' );</script>";
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Insert Animal</title>
		<link rel = "stylesheet" href = "style/style.css" >
	</head>
	<body class = "new_order" >
	<div class = "animal_div" >
		<a class = "animal_div_title" >Insert Animal</a>
		<form name = "animal_form" method = "post" action = "" >
			<label>Order Name</label><br>
			<input class = "form_text_input" type = "text" name = "order_name" ><br>
			<input class = "add_button" type = "submit" name = "add" value = "Add" >
		</form>
	</div>
	</body>
</html>