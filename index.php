<?php
	// Start the session
	session_start();

	// Connect to the database
	include( "./connection/park_connect.php" );
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Park Menagement</title>
	</head>
	<body>
		<form name = "orders_form" method = "post" action = "" >
			<select data-placeholder = "Order..." name = "orders" onchange = "this.form.submit()" >
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
						echo "<option value = '" . $fetched_result["id"] . "'>" . $fetched_result["name"] . "</option>";
					}
				?>
			</select>
		</form>
		<form name = "species_form" method = "post" action = "" >
			<select name = "spiecies" onchange = "this.form.submit()" >
				<?php
					if ( isset( $_REQUEST[ "orders" ] ) )
					{
						// Clear the input value
						$order = mysqli_real_escape_string( $park_connection, $_REQUEST[ "orders" ] );

						// Get the orders
						$query = "SELECT * from animals_species WHERE order_id='" . $order . "'";
						$result = mysqli_query( $park_connection, $query );

						// Print all the orders
						for ( $i = 0; $i < mysqli_num_rows( $result ); $i++ )
						{
							// Fetch the result
							$fetched_result = mysqli_fetch_assoc( $result );

							// Add the option
							echo "<option value = '" . $fetched_result["id"] . "'>" . $fetched_result["name"] . "</option>";
						}
					}
				?>
			</select>
		</form>
	</body>
</html>