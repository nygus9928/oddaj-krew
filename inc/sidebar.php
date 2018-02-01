		<div class="col-lg-3" align="center">

			<?php
			if ($_GET['page']==odbierz_nagrode || $_GET['page']==nagrody) {

					if($_SESSION['zalogowany'] == true){

					require_once "cnt/connect.php";

					// Create connection
					$conn = new mysqli($host1, $db_user, $db_password, $db_name);
					// Check connection
					if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
					}
					$u_id = $_SESSION['u_id'];
					$sql = "SELECT pkt FROM uzytkownicy where u_id='$u_id'";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
									echo '<div class="card border-danger mb-3" style="max-width: 18rem;">
												<div class="card-body text-danger">
												<p class="card-text"><h6>Punkty: <span class="badge badge-danger">';
									echo $row["pkt"];
									echo '</span></h6></p>
												</div>
												</div>';
							}
					} else {
							echo "0 results";
					}
					$conn->close();
				}
				}
			?>

			<p><img src="img/img1.jpg"></a></p>
			<p><img src="img/img3.jpg"></p>
			<p><img src="img/img4.jpg"></p>

		</div>
