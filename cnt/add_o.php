<?php

	session_start();

	if (isset($_POST['opinia']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;

		//opinia
			//Sprawdź poprawności
		$opinia = $_POST['opinia'];

		//Sprawdzenie długości imienia
		if ((strlen($opinia)<5) || (strlen($opinia)>200))
		{
			$wszystko_OK=false;
			$_SESSION['e_opinia']="Opinia musi zawierać od 5 do 200 znaków!";
		}
		$u_id = $_SESSION['u_id'];
		//Zapamiętaj wprowadzone dane

		$_SESSION['fr_opinia'] = $opinia;

		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);

		try
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy opinia już istnieje?
				$rezultat = $polaczenie->query("SELECT o_id FROM opinion WHERE u_id='$u_id'");

				if (!$rezultat) throw new Exception($polaczenie->error);

				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['istnieje']=true;
				}


				if ($wszystko_OK==true)
				{

					$polaczenie -> query ('SET NAMES utf8');
					$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
					$dzisiaj = date("Y-n-j H:i:s");
					if ($polaczenie->query("INSERT INTO opinion VALUES (NULL, '$u_id', '$dzisiaj','$opinia')"))
					{

						$_SESSION['dodano_opinie']=true;
						header('Location: ../index.php?page=dodaj_opinie');
					}
					else
					{
						throw new Exception($polaczenie->error);

					}

				}
				if($wszystko_OK==false){
					header('Location: ../index.php?page=dodaj_opinie');
				}

				$polaczenie->close();
			}

		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności!</span>';
			echo '<br />Informacja developerska: '.$e;
		}

	}


?>
