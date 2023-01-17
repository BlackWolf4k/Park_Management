<?php
	// Start the session
	session_start();

	// Connect to the database
	include( "./connection/park_connect.php" );

	if ( isset( $_REQUEST[ "add" ] ) )
		if ( $_REQUEST[ "add" ] == 1 )
		{
			// Add the animal
			// Clear the request
			$_REQUEST = array();
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Park Menagement</title>
	</head>
	<body>
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
			<input type = "submit" name = "add" value = "0" onclick = "this.value = '1'">
		</form>
	</body>
</html>