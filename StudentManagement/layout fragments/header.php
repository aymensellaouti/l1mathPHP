<?php
    session_start();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">L1Math</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="studentList.php">Liste des étudiants</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sections.php">Liste des sections</a>
            </li>
            <?php if ($_SESSION['user']) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"> Logout</a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</nav>
