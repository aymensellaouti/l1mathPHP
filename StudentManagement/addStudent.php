<?php
session_start();
include_once 'auth/isAdmin.php';
include_once 'connexionBD/getConnexion.php';
$req="SELECT * from section";
$reponse = $bdd->query($req);
$sections = $reponse->fetchAll(PDO::FETCH_OBJ);
include 'layout fragments/header.php';
?>
<div class="container">
<form action="handleAddStudent.php"
      method="post"
      enctype="multipart/form-data"
      _lpchecked="1">
    <fieldset>
        <legend>Ajouter un étudiant</legend>
        <div class="form-group">
            <label for="name" class="col-sm-2 col-form-label">name</label>
            <div>
                <input
                    required
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder="Veuillez saisir le nom de l'étudiant"
                    name="name"
                >
            </div>
            <label for="birthday" class="col-sm-2 col-form-label">
                Date de naissance
            </label>
            <div>
                <input
                    required
                    type="date"
                    class="form-control"
                    id="birthday"
                    name="birthday"
                >
            </div>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input
                    type="file"
                    class="form-control-file"
                    id="image"
                    name="image"
                    aria-describedby="fileHelp">
        </div>
        <div class="form-group">
            <label for="section">Section</label>
            <select
                required
                name="section" class="form-control select2" id="section">
                <?php foreach ($sections as $section) { ?>
                    <option value="<?=$section->id ?>">
                        <?=$section->designation ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
</form>
</div>
<?php
include 'layout fragments/footer.php';
?>