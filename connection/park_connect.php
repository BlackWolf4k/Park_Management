<?php
	// Connects to the database
	$user_name = "park";
	$server_name = "localhost";
	$password = "park";
	$database_name = "park";

	// Connect to the database
	$park_connection = new mysqli( $server_name, $user_name, $password, $database_name );

	// Check that the connection was sucessfull
	if ( $park_connection -> connect_error )
	{
		die( "Connection Failed: " . $park_connection -> connect_error );
	}
?>