<div class="col-lg-9">
  <?php

  if($_SESSION['taken'] == 1){

      echo '<div class="alert alert-success" role="alert">';
      echo 'Właśnie wyminiłeś punkty na nagrodę';
      echo'<hr><p class="mb-0">Odbierz ją przy następnej wizycie!</p></div>';
      unset($_SESSION['taken']);
  }
  if($_SESSION['taken'] == 2){

      echo '<div class="alert alert-danger" role="alert">';
      echo 'Masz niewystarczającą ilość punktów dla tej nagrody!';
      echo'<hr><p class="mb-0">Wybierz inną nagrodę lub zdobywaj dodatkowe punkty!</p></div>';
      unset($_SESSION['taken']);
    }
  ?>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Nazwa</th>
        <th>Opis</th>
        <th>Ilość pkt</th>
        <th>Akcja</th>
      </tr>
    </thead>
    <tbody>

  <?php
    require_once "cnt/connect.php";

    // Create connection
    $polaczenie = new mysqli($host1, $db_user, $db_password, $db_name);
    // Check connection
    if ($polaczenie->connect_error) {
        die("Connection failed: " . $polaczenie->connect_error);
    }
    $polaczenie -> query ('SET NAMES utf8');
    $polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
    $sql = "SELECT * FROM rewards";
    $result = $polaczenie->query($sql);
    $i=1;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

              echo '<tr>
              <th scope="row">'.$i++.'</th>
              <td>';
              echo $row['nazwa'];
              echo '</td>
              <td>';
              echo $row['opis'];
              echo '</td><td>';
              echo $row['pkt'];
              echo '</td>
              <td><a href="cnt/take_r.php?r_id='.$row[r_id].'">Odbierz</a></td>
            </tr>';
        }
    } else {
        echo "Brak nagród";
    }


    $polaczenie->close();
  ?>
</tbody>
</table>
  <hr>
<h6 class="display-4">Historia</h6>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Nazwa</th>


        <th>Data</th>
      </tr>
    </thead>
    <tbody>

<?php
  require_once "cnt/connect.php";

  // Create connection
  $polaczenie = new mysqli($host1, $db_user, $db_password, $db_name);
  // Check connection
  if ($polaczenie->connect_error) {
      die("Connection failed: " . $polaczenie->connect_error);
  }
  $polaczenie -> query ('SET NAMES utf8');
  $polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
  $u_id= $_SESSION['u_id'];
  $sql2 = "SELECT data,nazwa FROM taken JOIN rewards on taken.r_id = rewards.r_id where u_id='$u_id'";
  $result2 = $polaczenie->query($sql2);
  $i2=1;
  if ($result2->num_rows > 0) {
      // output data of each row
      while($row = $result2->fetch_assoc()) {


            echo '<tr>
            <th scope="row">'.$i2++.'</th><td>';
            echo $row['nazwa'];
            echo '</td><td>';
            echo $row['data'];
            echo '</td>';

      }
  } else {
      echo "Brak historii";
  }

  $polaczenie->close();

 ?>
</tbody>
</table>

</div>
