<!DOCTYPE html>
<html>
  <head>
	<script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap4.min.css" >
	<script src="/js/bootstrap.min.js"></script>
  </head>
  <body>
  <nav class="navbar navbar-light bg-light justify-content-between ">
  <a class="navbar-brand "><span class="text-center">Javas</span></a
  <form class="form-inline">
    <a href="/login" class="btn btn-outline-success my-2 my-sm-0" >Войти</a>
  </form>
</nav>
    <div class="container pt-5  justify-content-center ">
	<table class="table" style="height:200px">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Имя пользователя</th>
      <th scope="col">Email</th>
      <th scope="col">Текст задачи</th>
      <th scope="col">Статус</th>
    </tr><? var_dump($tasks); ?>
  </thead>
  <tbody>
  <?php foreach($tasks as $task) {
	echo "
    <tr>
      <th scope=\"row\">$task[0]</th>
      <td>$task[1]</td>
      <td>$task[2]</td>
      <td>$task[3]</td>
    </tr>";
  }
	?>
  </tbody>
</table>

	<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
	Добавить задачу
	</button>
	
	<nav aria-label="Page navigation example">
      <ul class="pagination">
	  
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
	  <?php
		for($i=1; $i<$rowsAmount + 1; $i++)
        echo "<li class=\"page-item\"><a class=\"page-link\" href=\"/tasks?page=$i\">$i</a></li>";
	     
		?>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
	</nav>
	</div>
	
	
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Свойства задачи</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
		  <form method="POST" action="/tasks/add">
		  
		    <div class="form-group ">
		    	<label for="username">Имя пользователя</label>
		    	<input type="text" class="form-control" name="username" id="username" placeholder="Имя пользователя" required>
		    </div>
		    <div class="form-group">
		    	<label for="email">Email</label>
		    	<input type="email" class="form-control" name="email" id="email" placeholder="Ваша почта" required>
		    </div>
		    <div class="form-group">
		    	<label for="text">Текст задачи</label>
		    	<input type="text" class="form-control" name="text" id="text" placeholder="Текст вашей задачи" required>
		    </div>
		  <button type="submit" class="btn btn-primary w-100">Сохранить</button>
    
		  </form>
		</div>
		</div>
	</div>
	</div>
	</div>
  </body>
</html>