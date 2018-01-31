<?php
	session_start;
	require_once "connect.php";

	// Create connection
	$polaczenie = new mysqli($host1, $db_user, $db_password, $db_name);
	// Check connection
	if ($polaczenie->connect_error) {
			die("Connection failed: " . $polaczenie->connect_error);
	}
	$u_id = '10';
	$r_id = '5';
	$dzisiaj = date("Y-n-j");
	$polaczenie -> query ('SET NAMES utf8');
	$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
	$user = "SELECT pkt FROM uzytkownicy where u_id='$u_id'";
	$u_result = $polaczenie->query($user);

	if (!$u_result) throw new Exception($polaczenie->error);

	$reward = "SELECT pkt FROM rewards where r_id='$r_id'";
	$r_result = $polaczenie->query($reward);

	if (!$r_result) throw new Exception($polaczenie->error);

	if ($u_result->num_rows > 0) {
			// output data of each row
			while($row = $u_result->fetch_assoc()) {
						$u_pkt = $row['pkt'];
			}
	} else {
			echo "Brak użytkownika";
	}
	if ($r_result->num_rows > 0) {
			// output data of each row
			while($row = $r_result->fetch_assoc()) {
						$r_pkt = $row['pkt'];
			}
	} else {
			echo "0 results";
	}

	if(!$r_result && !$u_result){
		echo 'Coś poszło nie tak';
	}else {
			if($r_pkt<=$u_pkt){
					$pkt=$u_pkt-$r_pkt;
					$uzytkownik = $polaczenie -> query ("UPDATE uzytkownicy SET pkt='$pkt' WHERE u_id='$u_id'");
					if (!$uzytkownik) throw new Exception($polaczenie->error);

					$nagroda = $polaczenie -> query ("INSERT INTO taken VALUES (NULL, '$u_id', '$r_id', '$dzisiaj')");
					if (!$nagroda) throw new Exception($polaczenie->error);

					echo "Udało się!";
			}else {
					echo "Brak wystarczającej ilości punktów";
			}
	}

//	$pkt=$u_result-$r_result;
//	echo $pkt;
	//if ($u_result>=$r_result) {

		//	} else {
		//	echo "Brak wymaganej ilości punktów";
	//}
	$polaczenie->close();
?>
