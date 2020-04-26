<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="/css/bootstrap4.min.css" >
  </head>
  <body>
    <div class="container pt-5 d-flex justify-content-center ">		
	<form method="POST" action="/auth">
	<?php
		
		  if(isset($_COOKIE['Message']) != null)
	        echo "<div class=\"alert alert-danger\" role=\"alert\">".
		  	       $_COOKIE['Message'].
		          "</div>";
			setcookie("Message", null);
		?>
	
      <div class="form-group ">
        <label for="username">Имя пользователя</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Имя пользователя" required>
      </div>
      <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Пароль" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Submit</button>
    
	</form>
	</div>
  </body>
</html>