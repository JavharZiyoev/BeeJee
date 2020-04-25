<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="/css/bootstrap4.min.css" >
  </head>
  <body>
    <div class="container pt-5 d-flex justify-content-center ">
	<form method="POST" action="/auth">
	
      <div class="form-group ">
        <label for="username">Имя пользователя</label>
        <input type="text" class="form-control" id="username" name="username"placeholder="Имя пользователя">
      </div>
      <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
      </div>
      <button type="submit" class="btn btn-primary w-100">Submit</button>
    
	</form>
	</div>
  </body>
</html>