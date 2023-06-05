function dbConnect($dbHost, $dbUser, $dbPass, $dbName) {
    $DATABASE_HOST = $dbHost;
    $DATABASE_USER = $dbUser;
    $DATABASE_PASS = $dbPass;
    $DATABASE_NAME = $dbName;
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
