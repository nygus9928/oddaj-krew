<?php

	session_start();
	
	if (isset($_POST['email']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
		//imie
			//Sprawdź poprawność imienia'a
		$imie = $_POST['imie'];
		
		//Sprawdzenie długości imienia
		if ((strlen($imie)<3) || (strlen($imie)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_imie']="Imię musi posiadać od 3 do 20 znaków!";
		}

		//nazwisko
		
			//Sprawdź poprawność nazwiska'a
		$nazwisko = $_POST['nazwisko'];
		
		//Sprawdzenie długości nazwiska
		if ((strlen($nazwisko)<3) || (strlen($nazwisko)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nazwisko']="Nazwisko musi posiadać od 3 do 20 znaków!";
		}
		
		//pesel
		
				//Sprawdź poprawność nickname'a
		$pesel = $_POST['pesel'];
		
		//Sprawdzenie długości nicka
		if ((strlen($pesel)<11) || (strlen($pesel)>11))
		{
			$wszystko_OK=false;
			$_SESSION['e_pesel']="Pesel musi posiadać 11 znaków!";
		}
		
		if (ctype_digit($pesel)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_pesel']="Pesel może składać się tylko z cyfr";
		}
		
		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		
		//Sprawdź poprawność hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}	

		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
		
		$gr_krwi = $_POST['gr_krwi'];
		
		if ($gr_krwi == 0)
		{
			$wszystko_OK=false;
			$_SESSION['e_gr_krwi']="Wybierz grupę krwi";
		}
		
		//Zapamiętaj wprowadzone dane

		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_haslo1'] = $haslo1;
		$_SESSION['fr_haslo2'] = $haslo2;
		$_SESSION['fr_imie'] = $imie;
		$_SESSION['fr_nazwisko'] = $nazwisko;
		$_SESSION['fr_pesel'] = $pesel;
		$_SESSION['fr_gr_krwi'] = $gr_krwi;
		
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
				//Czy email już istnieje?
				$rezultat = $polaczenie->query("SELECT u_id FROM uzytkownicy WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		

								
				if ($wszystko_OK==true)
				{
					
					$polaczenie -> query ('SET NAMES utf8');
					$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
					$dzisiaj = date("Y-n-j"); 
					if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$pesel', '$email', '$haslo_hash','$gr_krwi', '$imie', '$nazwisko', '$dzisiaj','NULL')"))
					{
						$_SESSION['podaj_imie']=$imie;
						$_SESSION['udanarejestracja']=true;
						header('Location: ../index.php?page=zarejestruj');
					}
					else
					{
						throw new Exception($polaczenie->error);
						
					}
					
				}
				if($wszystko_OK==false){
					header('Location: ../index.php?page=zarejestruj');
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}
	
	
?>