<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{

		header('Location: ../index.php?page=zaloguj');
		exit();
		
	}

	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	$polaczenie -> query ('SET NAMES utf8');
	$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		
	
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM uzytkownicy WHERE email='%s'",
		mysqli_real_escape_string($polaczenie,$login))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				
				$wiersz = $rezultat->fetch_assoc();
				
				if (password_verify($haslo, $wiersz['haslo']))
				{
					$_SESSION['zalogowany'] = true;
					$_SESSION['u_id'] = $wiersz['u_id'];
					$_SESSION['imie'] = $wiersz['imie'];
					$_SESSION['nazwisko'] = $wiersz['nazwisko'];
					$_SESSION['email'] = $wiersz['email'];
					$_SESSION['data_rej'] = $wiersz['data_rej'];
					$_SESSION['pesel'] = $wiersz['u_pesel'];
					$_SESSION['gr_krwi'] = $wiersz['gr_krwi'];
					$_SESSION['punkty'] = $wiersz['pkt'];

					unset($_SESSION['blad']);
					$rezultat->free_result();
					header('Location: ../index.php?page=home');
				}
				else 
				{
					$_SESSION['blad'] = 'Nieprawidłowy login lub hasło!';
					header('Location: ../index.php?page=zaloguj');
				}
				
			} else {
				
				$_SESSION['blad'] = 'Nieprawidłowy login lub hasło!';
				header('Location: ../index.php?page=zaloguj');
				
			}
			
		}
		
		$polaczenie->close();
	}
	
?>