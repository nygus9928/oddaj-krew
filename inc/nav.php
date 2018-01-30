      <div class="masthead">
        <h3 class="text-muted">Oddaje<font color="red">krew.com</font></h3>

<nav class="navbar navbar-expand-lg navbar-light bg-faded rounded mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
          <ul class="nav navbar-nav text-md-center justify-content-md-between">
            <li class="nav-item <?php if($_GET["page"] == home){echo 'active';}?>">
                <a class="nav-link" href="?page=home">Strona główna <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if($_GET["page"] == krwiodawstwo){echo 'active';}?>">
                <a class="nav-link" href="?page=krwiodawstwo">Krwiodawstwo</a>
            </li>
            <li class="nav-item <?php if($_GET["page"] == nagrody){echo 'active';}?>">
                <a class="nav-link" href="?page=nagrody">Nagrody</a>
            </li>
            <li class="nav-item <?php if($_GET["page"] == opinie){echo 'active';}?>">
                <a class="nav-link" href="?page=opinie">Opinie</a>
            </li>
<?php
		if($_SESSION['zalogowany'] == true){
           echo '<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Profil
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="?page=zmien_dane">Zmień dane</a>
				  <a class="dropdown-item" href="?page=odbierz_nagrode">Odbierz nagrodę</a>
				  <a class="dropdown-item" href="?page=dodaj_opinie">Dodaj opinię</a>
				</div>
			</li>
            <li class="nav-item">
                <a class="nav-link" href="page/logout.php">Wyloguj ';
				echo '<small>';
				echo $_SESSION['imie'];
				echo'</small></a>
            </li>';
		}else{
			
			 echo '<li class="nav-item '; if($_GET["page"] == zarejestruj){echo 'active';}echo '">
                <a class="nav-link" href="?page=zarejestruj">Stwórz konto</a>
            </li>
            <li class="nav-item  '; if($_GET["page"] == zaloguj){echo 'active';} echo '">
                <a class="nav-link" href="?page=zaloguj">Zaloguj</a>
            </li>';
		}
?>
          </ul>
        </div>
      </nav>
		
		
		
      </div>

 

<div class="container">
	<div class="row">