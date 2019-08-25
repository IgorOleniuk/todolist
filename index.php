<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Список дел</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1>Список дел</h1>
      <form action="/add.php" method="post">
        <input class="form-control" type="text" name="task" id="task" placeholder="Нужно сделать...">
        <button type="submit" name="sendTask" class="btn btn-success">Отправить</button>
      </form>
      <?php
         require 'configDB.php';

         echo '<ul>';
         $query = $pdo->query('SELECT * FROM `tasks` ORDER BY `id` DESC');
         while ($row = $query->fetch(PDO::FETCH_OBJ)) {
           echo '<li><b>'.$row->task.'</b><a href="/delete.php?id='.$row->id.'"><button>Удалить</button></a></li>';
         }
         echo '</ul>';
      ?>
    </div>
  </body>
</html>
