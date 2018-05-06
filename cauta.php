<?php
if(isset($_POST['valoare']) && isset($_POST['zi']) && isset($_POST['luna'])) { ?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Bonuri fiscale</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	</head>

	<body>
		<div class="container">
			<div class="card">
			  <h5 class="card-header">Bonuri fiscale</h5>
			  <div class="card-body">
			    <table class="table">
			      <thead class="thead-dark">
			        <tr>
			          <th style="width:1%;" scope="col">#</th>
			          <th scope="col">Valoare</th>
			          <th scope="col">Zi</th>
			          <th scope="col">Luna</th>
			          <th scope="col">Sterge</th>
			        </tr>
			      </thead>
			      <tbody>
			      	 <?php
			      	require("db.php");

			      	// Create connection
			      	$conn = new mysqli($servername, $username, $password, $dbname);
			      	// Check connection
			      	if ($conn->connect_error) {
			      	    die("Connection failed: " . $conn->connect_error);
			      	}

			      	$valoare = $_POST['valoare'];
			      	$zi = $_POST['zi'];
			      	$luna = $_POST['luna'];

			      	$sql = "SELECT * FROM bonuri WHERE valoare='$valoare' AND zi='$zi' AND luna='$luna'";
			      	$result = $conn->query($sql);

			      	if ($result->num_rows > 0) {
			      	    // output data of each row
			      	    while($row = $result->fetch_assoc()) {
			      	        ?><tr>
			      	        	<th scope="row"><?php echo $row['id']; ?></th>
			      	        	<td><?php echo $row['valoare']; ?></td>
			      	        	<td><?php echo $row['zi']; ?></td>
			      	        	<td><?php echo $row['luna']; ?></td>
			      	        	<td><a href="sterge.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Sterge</a></td>
			      	        	</tr>
			      	        	<?php }
			      	} else {
			      	    ?><div class="alert alert-danger" role="alert">Nu s-au gasit bonuri dupa criteriile de cautare</div> <?php
			      	}
			      	$conn->close();
			      	?> 
			      </tbody>
			  </table>
			  </div>
			</div>
			<br>
			<center><a href="index.php" class="btn btn-primary">Inapoi</a></center>
		</div>
	</body>
</html>
<?php } else {
	header("Location: index.php");
}
?>