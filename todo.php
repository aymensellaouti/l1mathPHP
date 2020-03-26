<?php
session_start();
if (!isset($_SESSION['todos'])) {
    $_SESSION['todos'] = [
        [
            'name' => 'todo1',
            'description'=>'Cecci est le premier todo',
            'etat'=>0
        ],
        ['name' => 'todo2', 'description'=>'Cecci est le second todo', 'etat'=>1]
    ];
}
$todos = $_SESSION['todos'];
// Une seule page elle va afficher la liste des todos
// Delete Todo
// Formulaire pour ajouter Un todo
// Bouton pour dire si un todo a été checké ou pas
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Todos</title>
</head>
<body class="container">
<div class="alert alert-primary">
<h1>Liste des Todos</h1>
</div>
<?php
 if (isset($_GET['successMessage'])) {
    echo "<div class='alert alert-success'> ${_GET['successMessage']}'</div>";
} else if (isset($_GET['errorMessage'])) {
     echo "<div class='alert alert-danger'> ${_GET['errorMessage']}'</div>";
 }
?>
<div>
    <form method="post" action="addTodo.php" >
        name : <input
            name="name"
            type="text" class="form-control">
        Description : <input
            name="description"
            type="text" class="form-control">
            <input type="submit" class="btn btn-primary">
    </form>
</div>
<div class="row">
    <?php
    foreach ($todos as $todo) {
    ?>
        <div class="col-4">
        <div class="card gold
                <?php
                    if($todo['etat']==1) {
                        echo 'bg-dark';
                    } else {
                        echo 'bg-light';
                    }
                ?>
                " style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?=$todo['name']?></h5>
                <p class="card-text">
                    <?=$todo['description']?>
                </p>
                <a href="checkTodo.php?name=<?=$todo['name']?>" class="card-link">
                    <?php
                     if($todo['etat']==1) {
                         echo 'uncheck';
                     } else {
                         echo 'check';
                     }
                    ?>
                </a>
                <a href="deleteTodo.php?name=<?=$todo['name']?>" class="card-link">
                    <i class="fa fa-trash" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>

</body>
</html>
