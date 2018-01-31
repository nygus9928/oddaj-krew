<div class="col-lg-9">
  
    <?php
    require_once "cnt/connect.php";

    // Create connection
    $conn = new mysqli($host1, $db_user, $db_password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT imie, nazwisko, opinia, data FROM opinion JOIN uzytkownicy on opinion.u_id = uzytkownicy.u_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<div class="card">
                  <div class="card-body">
                  <h5 class="card-title">';
            echo $row["imie"];
            echo '</h5><h6 class="card-subtitle mb-2 text-muted">';
            echo $row["data"];
            echo '</h6><hr><p class="card-text">';
            echo $row["opinia"];
            echo '</p></div></div></p>';
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</div>
