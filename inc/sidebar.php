		<div class="col-lg-3" align="center">

			<?php
			if ($_GET['page']==odbierz_nagrode || $_GET['page']==nagrody) {

					if($_SESSION['zalogowany'] == true){

					require_once "cnt/connect.php";

					// Create connection
					$polaczenie = new mysqli($host1, $db_user, $db_password, $db_name);
					// Check connection
					if ($polaczenie->connect_error) {
							die("Connection failed: " . $polaczenie->connect_error);
					}
					$u_id = $_SESSION['u_id'];
					$sql = "SELECT pkt FROM uzytkownicy where u_id='$u_id'";
					$result = $polaczenie->query($sql);

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
					$polaczenie->close();
				}
				}
			?>

			<p><img src="img/img1.jpg"></a></p>
			<p><img src="img/img3.jpg"></p>
			<p><img src="img/img4.jpg"></p>

		</div>
