<?php
	// Start the session
	session_start();

	// Connect to the database
	include( "../../connection/park_connect.php" );

	if ( isset( $_REQUEST[ "add" ] ) )
		if ( $_REQUEST[ "add" ] == 1
			 && isset( $_REQUEST[ "park" ] )
			 && isset( $_REQUEST[ "orders" ] )
			 && isset( $_REQUEST[ "species" ] )
			 && isset( $_REQUEST[ "sex" ] )
			 && isset( $_REQUEST[ "birthday" ] )
			 && isset( $_REQUEST[ "health" ] ) 
		   ) // Check all setted
		{
			// Clear the values
			$health = mysqli_real_escape_string( $park_connection, $_REQUEST[ "health" ] );

			$query = "INSERT INTO animals ( `sex`, `birthday`, `species_id`, `park_id`, `health` ) VALUES ( " . $_REQUEST[ "sex" ] . ", '" . $_REQUEST[ "birthday" ] . "', " . $_REQUEST[ "species" ] . ", " . $_REQUEST[ "orders" ] . ", '" . $health . "' )";

			mysqli_query( $park_connection, $query );

			// Clear the request
			$_REQUEST = array();

			// Print a message of success
			echo "<script>alert( 'Animal Added' );</script>";
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Insert Animal</title>
		<link rel = "stylesheet" href = "style/style.css" >
	</head>
	<body>
	<div class = "animal_div" >
		<a class = "animal_div_title" >Insert Animal</a>
		<form name = "animal_form" method = "post" action = "" >
			<label>Select Park</label><br>
			<select name = "park" onchange = "this.form.submit()" >
				<option disabled selected value>Park</option>
				<?php
					// Get the parks
					$query = "SELECT * from parks";
					$result = mysqli_query( $park_connection, $query );

					// Print all the parks
					for ( $i = 0; $i < mysqli_num_rows( $result ); $i++ )
					{
						// Fetch the result
						$fetched_result = mysqli_fetch_assoc( $result );

						// Add the option
						// Change the selected if anything was selected
						echo "<option ";
						if ( isset( $_REQUEST[ "park" ] ) )
						{
							if ( $_REQUEST[ "park" ] == $fetched_result["id"] )
								echo "selected";
						}
						echo " value = '" . $fetched_result["id"] . "'>" . $fetched_result["name"] . "</option>";
					}
				?>
			</select><br>
			<label>Select Order</label><br>
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
			<label>Select Species</label><br>
			<select name = "species" onchange = "this.form.submit()" >
				<option disabled selected value>Species</option>
				<?php
					if ( isset( $_REQUEST[ "orders" ] ) )
					{
						// Clear the input value
						$order = mysqli_real_escape_string( $park_connection, $_REQUEST[ "orders" ] );

						// Unset the request
						// unset( $_REQUEST[ "orders" ] );

						// Get the species
						$query = "SELECT * from animals_species WHERE order_id='" . $order . "'";
						$result = mysqli_query( $park_connection, $query );

						// Print all the species
						for ( $i = 0; $i < mysqli_num_rows( $result ); $i++ )
						{
							// Fetch the result
							$fetched_result = mysqli_fetch_assoc( $result );

							// Add the option
							// Change the selected if anything was selected
							echo "<option ";
							if ( isset( $_REQUEST[ "species" ] ) )
							{
								if ( $_REQUEST[ "species" ] == $fetched_result["id"] )
									echo "selected";
							}
							echo " value = '" . $fetched_result["id"] . "'>" . $fetched_result["name"] . "</option>";
						}
					}
				?>
			</select><br>
			<label>Animal Sex</label><br>
			<select name = "sex" >
				<option value = "0" >Male</option>
				<option value = "1" >Female</option>
			</select><br>
			<label>Animal BirthDay</label><br>
			<input class = "form_date_input" type = "date" name = "birthday" ><br>
			<label>Animal Health</label><br>
			<input class = "form_text_input" type = "text" name = "health" ><br>
			<input class = "add_button" type = "submit" name = "add" value = "Add" onclick = "this.value = '1'">
		</form>
	</div>
	</body>
</html>