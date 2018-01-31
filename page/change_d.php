<div class="col-lg-9">

  <?php

  if($_SESSION['udanarejestracja'] == true){

      echo '<div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Udało się!</h4>';
      echo '<p>Witaj ';
      echo $_SESSION['podaj_imie'];
      echo',Prośba o zmianę danych została wysłana. Zmiany powinny nastąpić w ciągu 24h.</p>
      <hr>
      <p class="mb-0">Gdybyś miał pytania lub sugestie to skontaktuj się z nami!</p>
      </div>';
      $_SESSION['udanarejestracja'] = false;
  } else{
      echo '<div class="jumbotron">
      <h1>Źmień swoje dane!</h1>
      <p class="lead">Wystąpił jakiś błąd i chciałbyś to poprawić? Ponieżej zamieściliśmy formularz, aby ułatwić Ci to zadanie.</p>';
      echo '</div>';

  }

  ?>

  <form method="post" action="cnt/change_d.php" class="needs-validation" novalidate>
  <div class="form-group row has-success">
    <label for="inputHorizontalSuccess" class="col-sm-3 col-form-label">Imię</label>
    <div class="col-sm-8">
    <input type="text" class="form-control <?php if(isset($_SESSION['e_imie'])){echo 'is-invalid';} ?>" name="imie" id="inputHorizontalSuccess" placeholder="Jan"  value="<?php
  if (isset($_SESSION['fr_imie']))
  {
    echo $_SESSION['fr_imie'];
    unset($_SESSION['fr_imie']);
  }
?>">
  <?php
  if (isset($_SESSION['e_imie']))
  {
    echo '<div class="invalid-feedback">'.$_SESSION['e_imie'].'</div>';
    unset($_SESSION['e_imie']);
  }
?>

    </div>
  </div>
  <div class="form-group row has-warning">
    <label for="inputHorizontalWarning" class="col-sm-3 col-form-label">Nazwisko</label>
    <div class="col-sm-8">
    <input type="text" class="form-control <?php if(isset($_SESSION['e_nazwisko'])){echo 'is-invalid';} ?>" name="nazwisko" id="inputHorizontalWarning" placeholder="Kowalski" value="<?php
  if (isset($_SESSION['fr_nazwisko']))
  {
    echo $_SESSION['fr_nazwisko'];
    unset($_SESSION['fr_nazwisko']);
  }
?>">
    <?php
  if (isset($_SESSION['e_nazwisko']))
  {
    echo '<div class="invalid-feedback">'.$_SESSION['e_nazwisko'].'</div>';
    unset($_SESSION['e_nazwisko']);
  }
?>
    </div>
  </div>
  <div class="form-group row has-warning">
    <label for="inputHorizontalWarning" class="col-sm-3 col-form-label">PESEL</label>
    <div class="col-sm-8">
    <input type="text" class="form-control <?php if(isset($_SESSION['e_pesel'])){echo 'is-invalid';} ?>" name="pesel" id="inputHorizontalWarning" placeholder="69255264978" value="<?php
  if (isset($_SESSION['fr_pesel']))
  {
    echo $_SESSION['fr_pesel'];
    unset($_SESSION['fr_pesel']);
  }
?>">
<?php
  if (isset($_SESSION['e_pesel']))
  {
    echo '<div class="invalid-feedback">'.$_SESSION['e_pesel'].'</div>';
    unset($_SESSION['e_pesel']);
  }
?>
</div>
  </div>

  <div class="form-group row has-danger">
    <label for="inputHorizontalDnger" class="col-sm-3 col-form-label">Hasło</label>
    <div class="col-sm-8">
    <input type="password" class="form-control <?php if(isset($_SESSION['e_haslo'])){echo 'is-invalid';} ?>" name="haslo1" id="inputHorizontalDnger" placeholder="Hasło">
    </div>
  </div>
  <div class="form-group row has-danger">
    <label for="inputHorizontalDnger" class="col-sm-3 col-form-label">Powtórz hasło</label>
    <div class="col-sm-8">
    <input type="password" class="form-control <?php if(isset($_SESSION['e_haslo'])){echo 'is-invalid';} ?>" name="haslo2" id="inputHorizontalDnger" placeholder="Hasło">
        <?php
  if (isset($_SESSION['e_haslo']))
  {
    echo '<div class="invalid-feedback">'.$_SESSION['e_haslo'].'</div>';
    unset($_SESSION['e_haslo']);
  }
?>
    </div>
  </div>
  <div class="form-group row has-danger">
    <label for="inputHorizontalDnger" class="col-sm-3 col-form-label">Grupa krwi</label>
    <div class="col-sm-8">
    <select class="custom-select mb-2 mr-sm-2 mb-sm-0 <?php if(isset($_SESSION['e_gr_krwi'])){echo 'is-invalid';} ?>" name="gr_krwi" id="inlineFormCustomSelect">
      <option selected value="0">Wybierz...</option>
      <option value="1">0 RhD+</option>
      <option value="2">0 RhD-</option>
      <option value="3">A RhD+</option>
      <option value="4">A RhD-</option>
      <option value="5">B RhD+</option>
      <option value="6">B RhD-</option>
      <option value="7">AB RhD+</option>
      <option value="8">AB RhD-</option>
    </select>

<?php
  if (isset($_SESSION['e_gr_krwi']))
  {
    echo '<div class="invalid-feedback">'.$_SESSION['e_gr_krwi'].'</div>';
    unset($_SESSION['e_gr_krwi']);
  }
?>
   </div>
  </div>
  <div class="form-group row has-danger">
    <div class="col-sm-3"></div>
    <div class="col-sm-8">
      <button type="submit" class="btn btn-outline-danger  btn-block">Wyślij dane</button>
    </div>
  </div>
  </form>
</div>
