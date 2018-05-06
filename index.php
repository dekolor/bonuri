<?php session_start(); 
if(isset($_GET['pagina']) && !empty($_GET['pagina'])) {
	$pagina = $_GET['pagina'];
}
else {
	$pagina = 1;
}
?>
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
		<div class="container"><br>
			<div class="card">
			  <h5 class="card-header">Bonuri fiscale</h5>
			  <div class="card-body">
			  	<?php if(isset($_SESSION['mesaj'])) { ?>
			  		<div class="alert alert-success" role="alert">
			  		  <?php echo $_SESSION['mesaj']; ?>
			  		</div>
			  	<?php } ?>
			  	<?php if ($pagina>1) { ?>
			  	<center><h2>Pagina <?php echo $pagina; ?></h2></center>
			  	<?php } ?>
			  	<ul class="list-inline" style="float:right;">
			  	<li class="list-inline-item"><button style="float:right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#adaugabon">
			  	  Adauga bon
			  	</button></li>
			  	<li class="list-inline-item"><button style="float:right;" type="button" class="btn btn-success" data-toggle="modal" data-target="#cautabon">
			  	  Cauta bon
			  	</button></li>
			  </ul><br><br>
			    <table class="table">
			      <thead class="thead-dark">
			        <tr>
			          <th style="width:1%;" scope="col">#</th>
			          <th scope="col">Valoare</th>
			          <th scope="col">Zi</th>
			          <th scope="col">Luna</th>
			          <th scope="col">Descriere</th>
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

			      	$query = "SELECT count(id) FROM bonuri";
			      	$result2 = $conn->query($query);
			      	$row2 = $result2->fetch_assoc();
			      	$randuri = $row2['count(id)'];
			      	$max_pages = ceil($randuri/10);

			      	$offset = ($pagina-1)*10;

			      	$sql = "SELECT * FROM bonuri ORDER BY id DESC LIMIT 10 OFFSET $offset";
			      	$result = $conn->query($sql);

			      	if ($result->num_rows > 0) {
			      	    // output data of each row
			      	    while($row = $result->fetch_assoc()) {
			      	        ?><tr>
			      	        	<th scope="row"><?php echo $row['id']; ?></th>
			      	        	<td><?php echo $row['valoare']; ?></td>
			      	        	<td><?php echo $row['zi']; ?></td>
			      	        	<td><?php echo $row['luna']; ?></td>
			      	        	<td><?php echo $row['descriere']; ?></td>
			      	        	<td><div class="btn-group"><button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sterge</button><div class="dropdown-menu"><a class="dropdown-item" href="sterge.php?id=<?php echo $row['id']; ?>">Confirmare stergere</a></div></div></td>
			      	        	</tr>
			      	        	<?php }
			      	} else {
			      	    ?><div class="alert alert-danger" role="alert">Nu sunt bonuri in baza de date</div> <?php
			      	}
			      	$conn->close();
			      	?> 
			      </tbody>
			  </table>

			  <div class="modal fade" id="adaugabon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			    <div class="modal-dialog" role="document">
			      <div class="modal-content">
			        <div class="modal-header">
			          <h5 class="modal-title" id="exampleModalLabel">Adauga bon fiscal</h5>
			          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			            <span aria-hidden="true">&times;</span>
			          </button>
			        </div>
			        <div class="modal-body">
			          <form action="adauga.php" method="post">
			          	<input type="number" min="1" max="999" class="form-control" name="valoare" placeholder="Valoare bon" required><br>
			          	<div class="row">
			          		<div class="col">
			          			<input type="number" min="1" max="31" class="form-control" name="zi" placeholder="Zi" required>
			          		</div>
			          		<div class="col">
			          			<select class="form-control" name="luna">
			          				<option value="01">Ianuarie</option>
			          				<option value="02">Februarie</option>
			          				<option value="03">Martie</option>
			          				<option value="04">Aprilie</option>
			          				<option value="05">Mai</option>
			          				<option value="06">Iunie</option>
			          				<option value="07">Iulie</option>
			          				<option value="08">August</option>
			          				<option value="09">Septembrie</option>
			          				<option value="10">Octombrie</option>
			          				<option value="11">Noiembrie</option>
			          				<option value="12">Decembrie</option>
			          			</select>
			          		</div>
			          	</div>
			          	<br><input class="form-control" type="text" name="descriere" placeholder="Descriere (optional)">
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
			          <input type="submit" class="btn btn-primary" value="Adauga">
			        </div>
			    </form>
			      </div>
			    </div>
			  </div>

			  <div class="modal fade" id="cautabon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			    <div class="modal-dialog" role="document">
			      <div class="modal-content">
			        <div class="modal-header">
			          <h5 class="modal-title" id="exampleModalLabel">Cauta bon fiscal</h5>
			          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			            <span aria-hidden="true">&times;</span>
			          </button>
			        </div>
			        <div class="modal-body">
			          <form action="cauta.php" method="post">
			          	<input type="number" min="1" max="999" class="form-control" name="valoare" placeholder="Valoare bon" required><br>
			          	<div class="row">
			          		<div class="col">
			          			<input type="number" min="1" max="31" class="form-control" name="zi" placeholder="Zi" required>
			          		</div>
			          		<div class="col">
			          			<select class="form-control" name="luna">
			          				<option value="01">Ianuarie</option>
			          				<option value="02">Februarie</option>
			          				<option value="03">Martie</option>
			          				<option value="04">Aprilie</option>
			          				<option value="05">Mai</option>
			          				<option value="06">Iunie</option>
			          				<option value="07">Iulie</option>
			          				<option value="08">August</option>
			          				<option value="09">Septembrie</option>
			          				<option value="10">Octombrie</option>
			          				<option value="11">Noiembrie</option>
			          				<option value="12">Decembrie</option>
			          			</select>
			          		</div>
			          	</div>
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
			          <input type="submit" class="btn btn-primary" value="Cauta">
			        </div>
			    </form>
			      </div>
			    </div>
			  </div>

			  <nav aria-label="Page navigation example">
			    <ul class="pagination justify-content-center">
			      <li class="page-item <?php if($pagina==1) { echo 'disabled'; } ?>">
			        <a class="page-link" href="index.php?pagina=<?php echo $pagina-1; ?>" tabindex="-1">Previous</a>
			      </li>
			      <li class="page-item <?php if($pagina==$max_pages) { echo 'disabled'; } ?>">
			        <a class="page-link" href="index.php?pagina=<?php echo $pagina+1; ?>">Next</a>
			      </li>
			    </ul>
			  </nav>

			  <center>In baza de date avem <b><?php echo $randuri; ?></b> bonuri</center>
			  </div>
			</div>
			<br>
		</div>
	</body>
</html>
<?php session_unset(); 
?>
