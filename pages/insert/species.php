<?php
	// Start the session
	session_start();

	// Connect to the database
	include( "../../connection/park_connect.php" );

	if ( isset( $_REQUEST[ "add" ] ) )
		if ( $_REQUEST[ "add" ] == "Add"
			 && isset( $_REQUEST[ "orders" ] )
			 && isset( $_REQUEST[ "species_name" ] )
			 && trim( $_REQUEST[ "species_name" ] != "" ) 
		   ) // Check all setted
		{
			// Clear the values
			$species_name = mysqli_real_escape_string( $park_connection, $_REQUEST[ "species_name" ] );
			$order_id = mysqli_real_escape_string( $park_connection, $_REQUEST[ "orders" ] );

			$query = "INSERT INTO animals_species ( name, order_id ) VALUES ( '" . $species_name . "', '" . $order_id . "' )";

			mysqli_query( $park_connection, $query );

			// Clear the request
			$_REQUEST = array();

			// Print a message of success
			echo "<script>alert( 'Species Added' );</script>";
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Insert Animal</title>
		<link rel = "stylesheet" href = "style/style.css" >
	</head>
	<body class = "new_species" >
	<div class = "animal_div" >
		<a class = "animal_div_title" >Insert Animal</a>
		<form name = "animal_form" method = "post" action = "" >
			<label>Select Order</label>
			<select name = "orders" onchange = "this.form.submit()" >
				<option disabled selected value>Order</option>
				<?php
					// Get the orders
					$query = "SELECT * from animals_orders";
					$result = mysqli_query( $park_connection, $query );

					// Print all the orders
					for ( $i = 0; $i < mysqli_num_rows( $result ); $i++ )
					{
						// Fetch the result
						$fetched_result = mysqli_fetch_assoc( $result );

						// Add the option
						// Change the selected if anything was selected
						echo "<option ";
						if ( isset( $_REQUEST[ "orders" ] ) )
						{
							if ( $_REQUEST[ "orders" ] == $fetched_result["id"] )
								echo "selected";
						}
						echo " value = '" . $fetched_result["id"] . "'>" . $fetched_result["name"] . "</option>";
					}
				?>
			</select><br>
			<label>Species Name</label><br>
			<input class = "form_text_input" type = "text" name = "species_name" ><br>
			<input class = "add_button" type = "submit" name = "add" value = "Add" >
		</form>
	</div>
	</body>
</html>