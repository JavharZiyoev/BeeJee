<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="/css/bootstrap4.min.css" >
  </head>
  <body>
  <nav class="navbar navbar-light bg-light justify-content-between ">
  <a class="navbar-brand "><span class="text-center">Javas</span></a
  <form class="form-inline">
    <a href="/login" class="btn btn-outline-success my-2 my-sm-0" >Login</a>
  </form>
</nav>
    <div class="container pt-5  justify-content-center ">
	<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Task</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($tasks as $task) {
	echo "
    <tr>
      <th scope=\"row\">$task[0]</th>
      <td>$task[1]</td>
      <td>$task[2]</td>
      <td>$task[3]</td>
      <td>$task[4]</td>
    </tr>";
  }
	?>
  </tbody>
</table>
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
  </body>
</html>