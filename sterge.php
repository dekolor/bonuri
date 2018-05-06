<?php
if(isset($_GET['id'])) {
	require("db.php");
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$id = mysqli_escape_string($conn, $_GET['id']);

	// sql to delete a record
	$sql = "DELETE FROM bonuri WHERE id='$id'";

	if ($conn->query($sql) === TRUE) {
	    session_start();
	    $_SESSION['mesaj'] = "Bon sters din baza de date";
	    header("Location: index.php");
	} else {
	    echo "Error deleting record: " . $conn->error;
	}

	$conn->close();
}
else {
	header("Location: index.php");
}
?>