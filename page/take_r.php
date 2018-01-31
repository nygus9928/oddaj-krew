<div class="col-lg-9">
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
        echo "0 results";
    }
    $polaczenie->close();
  ?>
    </tbody>
  </table>

</div>
