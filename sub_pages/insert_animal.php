<?php
	// Start the session
	session_start();

	// Connect to the database
	include( "../connection/park_connect.php" );

	$results_page = 0;

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
			// Change what to display
			$results_page = 1;
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Park Menagement</title>
	</head>
	<body>
	<?php
	$query = "SELECT animals.species_id, animals_species.name FROM animals LEFT JOIN animals_species ON animals.species_id = animals_species.id";
	$result = mysqli_query( $park_connection, $query );
	for ( $i = 0; $i < mysqli_num_rows( $result ); $i++ )
		echo mysqli_fetch_array( $result )["name"];
	if ( $results_page != 1 )
	{
	?> 
		<div class = "new_animal_div" >
			<a>Insert new animal</a>
			<form name = "new_animal_form" method = "post" action = "" >
				<a>Select Park<a><br>
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
				<a>Select Order</a><br>
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
				<a>Select Species</a><br>
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
				<a>Animal Sex</a><br>
				<select name = "sex" >
					<option value = "0" >Male</option>
					<option value = "1" >Female</option>
				</select><br>
				<a>Animal BirthDay</a><br>
				<input type = "date" name = "birthday" ><br>
				<a>Animal Health</a><br>
				<input type = "text" name = "health" ><br>
				<input type = "submit" name = "add" value = "Add" onclick = "this.value = '1'">
			</form>
		</div>
	<?php
	}
	else
	{
		// Clear the values
		$health = mysqli_real_escape_string( $park_connection, $_REQUEST[ "health" ] );

		$query = "INSERT INTO animals ( `sex`, `birthday`, `species_id`, `park_id`, `health` ) VALUES ( " . $_REQUEST[ "sex" ] . ", '" . $_REQUEST[ "birthday" ] . "', " . $_REQUEST[ "species" ] . ", " . $_REQUEST[ "orders" ] . ", '" . $health . "' )";
		
		echo $query;

		mysqli_query( $park_connection, $query );

		// Clear the request
		$_REQUEST = array();
	}
	?>
	</body>
</html>