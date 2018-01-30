<div class="col-lg-9">

		  <form action="cnt/zaloguj.php" method="post">
			<div class="form-group row has-success">
			  <label for="inputHorizontalSuccess" class="col-sm-3 col-form-label">Adres email</label>
			  <div class="col-sm-8">
				<input type="email" class="form-control form-control-success" id="inputHorizontalSuccess" name="login" placeholder="email@gmail.com">
			  </div>
			</div>
			<div class="form-group row has-warning">
			  <label for="inputHorizontalWarning" class="col-sm-3 col-form-label">Hasło</label>
			  <div class="col-sm-8">
				<input type="password" class="form-control form-control-warning" id="inputHorizontalWarning" name="haslo" placeholder="qwerty">
			  </div>
			</div>
			
			<div class="form-group row has-danger">	
				<div class="col-sm-3"></div>
				<div class="col-sm-8">
					<button type="submit" class="btn btn-outline-primary  btn-block">Zaloguj się</button>
					</p>
					
					
	<?php
				
		if(isset($_SESSION['blad'])){	
			echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
			echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>';
			echo $_SESSION['blad'];
			echo '</div>';
			unset($_SESSION['blad']);
		}
		
	?> 
				</div>
			</div>
		  </form>
</div>