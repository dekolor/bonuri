<?php
if(isset($_POST['valoare']) && isset($_POST['zi']) && isset($_POST['luna'])) {
	require("db.php");
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$valoare = $_POST['valoare'];
	$zi = $_POST['zi'];
	$luna = $_POST['luna'];
	$descriere = $_POST['descriere'];

	if($valoare[0] == "0") {
		$valoare = substr($valoare, 1);
	}
	if($zi[0] == "0") {
		$zi = substr($zi, 1);
	}


	$sql = "INSERT INTO bonuri (valoare, zi, luna, descriere)
	VALUES ('$valoare', '$zi', '$luna', '$descriere')";

	if ($conn->query($sql) === TRUE) {
	    session_start();
	    $_SESSION['mesaj'] = "Bon adaugat in baza de date";
	    header("Location: index.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
} else {
	header("Location: index.php");
}
?>