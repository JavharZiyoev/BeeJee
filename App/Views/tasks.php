<!DOCTYPE html>
<html>
  <head>
    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap4.min.css" >
    <script src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
  </head>
      <body>
        <nav class="navbar navbar-light bg-light justify-content-between ">
          <a class="navbar-brand ">
            <span class="text-center">Список задач</span>
          </a
  
          <form class="form-inline">
		  <?php
            session_start();		  
		    if(isset($_SESSION["user"]))
				echo "<a href=\"/logout\" class=\"btn btn-outline-danger my-2 my-sm-0\" >Выйти</a>";
			else
				echo "<a href=\"/login\" class=\"btn btn-outline-success my-2 my-sm-0\" >Войти</a>";
		  ?>
          </form>
        </nav>
        <div class="container pt-5  justify-content-center">
		<?php
		
		  if(isset($_COOKIE['Message']) != null)
	        echo "<div class=\"alert alert-success\" role=\"alert\">".
		  	       $_COOKIE['Message'].
		          "</div>";
			setcookie("Message", null);
		?>
          <table class="table" style="">
            <thead class="thead-dark">
              <tr>
                <th style="width:20%;"scope="col"><a href="<?="/tasks?page=$page&sortField=id"?>" class="sort-by">Id</a></th>
                <th style="width:20%;"scope="col"><a href="<?="/tasks?page=$page&sortField=username"?>" class="sort-by">Имя пользователя</a></th>
			    <th style="width:25%;" scope="col"><a href="<?="/tasks?page=$page&sortField=email" ?>" class="sort-by">Email</a></th>
			    <th style="width:50%;" scope="col">Текст задачи</th>
			    <th style="width:5%;" scope="col"><a href="<?="/tasks?page=$page&sortField=status" ?>" class="sort-by">Статус</a></th>
              </tr>
            </thead>
            <tbody>
			<?php foreach($tasks as $task) {
				echo "<tr>
				<th scope=\"row\">$task[0]</th>
				<th scope=\"row\">$task[1]</th>
				<td>$task[2]</td>";
				if(isset($_SESSION["user"])) echo "<td><input value=\"$task[3]\"/></td>";
				else echo "<td>$task[3]</td>";
				if(isset($_SESSION["user"])) echo "<td><input type=\"checkbox\" value=\"$task[3]\"/></td>";
				else
					if($task[4]) echo "<td style='color:green'>Выполнено</td>";
					else echo "<td style='color:gray'>В процессе</td>";
				echo "</tr>";
				}?>
            </tbody>
          </table>
          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"> Добавить задачу</button>
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#">Previous</a>
              </li>
              
              <?php
	     	  for($i=1; $i<$rowsAmount + 1; $i++)
	     	  if($page == $i) echo "<li class=\"page-item active\"><a class=\"page-link\" href=\"/tasks?page=$i\">$i</a></li>";
	     	  else echo "<li class=\"page-item\"><a class=\"page-link\" href=\"/tasks?page=$i\">$i</a></li>";
	     	  ?>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
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
                  <div class="form-group">
                    <label for="username">Имя пользователя 
                      <i class="fa fa-fw fa-sort"></i>
                    </label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Имя пользователя" required>
                    </div>
                    <div class="form-group">
                      <label for="email">Email 
                        <i class="fa fa-fw fa-sort"></i>
                      </label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Ваша почта" required>
                      </div>
                      <div class="form-group">
                        <label for="text">Текст задачи 
                          <i class="fa fa-fw fa-sort"></i>
                        </label>
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