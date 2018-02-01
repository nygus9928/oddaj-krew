  <div class="col-lg-9"></p>
    <h4 class="muted">Wyraź swoją opinie na temat wizyty. Będzie nam niezmiernie miło :)</h4></p>
    <form action="cnt/add_o.php" method="post">
        <div class="form-group row has-success">
			  <label for="inputHorizontalSuccess" class="col-sm-3 col-form-label">Opinia</label>
			  <div class="col-sm-8">
			    <textarea class="form-control <?php if(isset($_SESSION['e_opinia'])){echo 'is-invalid';} ?>" id="exampleTextarea" rows="4" placeholder="Wprowadź swoją opinię" name="opinia"><?php
        			if (isset($_SESSION['fr_opinia']))
        			{
        				echo $_SESSION['fr_opinia'];
        				unset($_SESSION['fr_opinia']);
        			}
        		?></textarea>

      <?php
			if (isset($_SESSION['e_opinia']))
			{
				echo '<div class="invalid-feedback">'.$_SESSION['e_opinia'].'</div>';
				unset($_SESSION['e_opinia']);
			}else{
          echo '<small id="emailHelp" class="form-text text-muted">Opinia musi zawierać od 5 do 200 znaków!</small>';
      }
		?>
				</div>
			</div>
				<div class="form-group row has-danger">
				<div class="col-sm-3"></div>
				<div class="col-sm-8">
						<button type="submit" class="btn btn-outline-danger  btn-block">Dodaj opinię</button>
          </p>
          <?php
            if($_SESSION['dodano_opinie'] == true){
                echo '<div class="alert alert-success" role="alert">';
                echo 'Twoja opinia została dodana. Możesz ją sprawdzić w zakładce <a href="?page=opinie">Opinie</a>';
                echo '</div>';

                unset($_SESSION['dodano_opinie']);
            }
            if($_SESSION['istnieje'] == true){

                echo '<div class="alert alert-danger" role="alert">';
                echo 'Dodałeś już opinię. Możesz ją sprawdzić w zakładce <a href="?page=opinie">Opinie</a>';
                echo '</div>';
                unset($_SESSION['istnieje']);
              }
          ?>


				</div>
				</div>
      </form>
    </div>
