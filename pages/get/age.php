<?php
	// Start the session
	session_start();

	// Connect to the database
	include( "../../connection/park_connect.php" );

	$results_page = 0;

	if ( isset( $_REQUEST[ "add" ] ) )
		if ( $_REQUEST[ "add" ] == "Calculate"
			 && isset( $_REQUEST[ "park" ] )
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
		<link rel = "stylesheet" href = "style/style.css" >
	</head>
	<body>
	<div class = "informations_div" >
		<a>View Park Species</a>
		<form name = "informations_form" method = "post" action = "" >
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
					$park = mysqli_real_escape_string( $park_connection, $_REQUEST[ "park" ] );
					//$query = "SELECT * FROM animals_orders RIGHT JOIN animals_species ON animals_species.id = animals_orders.id RIGHT JOIN animals ON animals.species_id = animals_species.id WHERE animals.park_id = '" . $park . "'";
					$query = "SELECT DISTINCT animals_orders.name, animals_orders.id FROM animals INNER JOIN animals_species ON animals_species.id = animals.species_id INNER JOIN animals_orders ON animals_orders.id = animals_species.order_id WHERE animals.park_id = '" . $park . "'";
					echo $query;
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

						// Get the species
						$order_id = mysqli_real_escape_string( $park_connection, $_REQUEST[ "orders" ] );
						$park_id = mysqli_real_escape_string( $park_connection, $_REQUEST[ "park" ] );
						$query = "SELECT DISTINCT animals_species.id, animals_species.name FROM animals_species LEFT JOIN animals ON animals.species_id = animals_species.id WHERE animals_species.order_id = '" . $order_id . "' AND animals.park_id = '" . $park_id . "'";
						$result = mysqli_query( $park_connection, $query );

						print_r( $fetched_result);

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
			<input class = "add_button" type = "submit" name = "add" value = "Calculate" >
		</form>
	</div>
	<?php
	if ( $results_page == 1 )
	{
		$park_id = mysqli_real_escape_string( $park_connection, $_REQUEST[ "park" ] );
		$species_id = mysqli_real_escape_string( $park_connection, $_REQUEST[ "species" ] );

		$query = "SELECT animals.birthday FROM animals WHERE animals.species_id = '" . $species_id . "' AND animals.park_id = '" . $park_id . "'";

		$result = mysqli_query( $park_connection, $query );

		// Check if something was found
		if ( mysqli_num_rows( $result ) == 0 ) // Nothing
		{
			echo "No animals in this park";
		}
		else
		{
			$average = 0;
			$today = time();
			// Print the species found
			for ( $i = 0; $i < mysqli_num_rows( $result ); $i++ )
				$average += $today - strtotime( mysqli_fetch_array( $result )["birthday"] );
			
			$age = intval( $average / ( 60 * 60 * 24 ) ) / mysqli_num_rows( $result );
			$scale = "days";
			if ( $age >= 31 && $age < 365 )
			{
				$age = intval( $age / 31 );
				$scale = "months";
			}
			else if ( $age >= 365 )
			{
				$age = intval( $age / 365 );
				$scale = "years";
			}
			echo "<a>Found " . mysqli_num_rows( $result ) . " animals of the species with a average age of: <b>" . $age . "</b> " . $scale . "</a>";
		}

		// Clear the request
		$_REQUEST = array();
	}
	?>
	</body>
</html>