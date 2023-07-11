<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() . "assets/mdbootstrap/css/mdb.min.css" ?>">
    <link rel="stylesheet" href="<?= base_url() . "assets/css/inscription.css" ?>">
    <title>Inscription</title>
</head>

<body>
    <!-- <form action="<?= site_url() . '/user/insert' ?>" method="post">
    <p>Nom: <input type="text" name="nom"></p>
    <p>Email:<input type="text" name="email"> </p>
    <p>Password: <input type="password" name="mdp"></p>
    <p>Genre: 
        <select name="idgenre">
            <option value="1">Masculin</option>
            <option value="2">Féminin</option>
        </select>
    </p>
    <p>Poids: <input type="number" name="poids"> </p>
    <p>Taille: <input type="number" name="taille"></p>
    <p><button type="submit">Valider</button></p>
</form> -->



    <div class="form-container">
        <div class="form">
            <h4>Inscrpition</h4>
            <div class="errors">
                <?= validation_errors() ?>
            </div>
            <br><br>
            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="tab-content" id="ex2-content">
                <?= form_open('user/insert', ['method' => 'post']) ?>
                <div class="tab-pane fade show active" id="ex3-pills-1" role="tabpanel" aria-labelledby="ex3-tab-1">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" name="nom" />
                        <label class="form-label">Nom</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="form5Example2" class="form-control" name="email" />
                        <label class="form-label" for="form5Example2">Email</label>
                    </div>

                    <!-- pass -->
                    <div class="form-outline mb-4">
                        <input type="password" class="form-control" name="mdp" />
                        <label class="form-label">Mot de passe</label>
                    </div>

                    <!-- genre -->
                    <div class="form-outline mb-4">
                        <select name="idgenre" class="select-genre">
                            <option value="1">Masculin</option>
                            <option value="2">Féminin</option>
                        </select>
                    </div>

                    <!-- Submit button -->
                    <!-- <button type="submit" class="btn btn-primary btn-block mb-4">Subscribe</button> -->
                </div>
                <div class="tab-pane fade" id="ex3-pills-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" name="poids" />
                        <label class="form-label">Poids</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" name="taille" />
                        <label class="form-label">Taille en cm</label>
                    </div>
                </div>
                <?= anchor('user/login', "Deja membre ?") ?>
                <br><br>
                <button type="submit" class="btn btn-primary btn-block mb-4">S'inscrire</button>
                </form>
            </div>

            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="ex3-tab-1" data-mdb-toggle="pill" href="#ex3-pills-1" role="tab" aria-controls="ex3-pills-1" aria-selected="true">Information de base</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex3-tab-2" data-mdb-toggle="pill" href="#ex3-pills-2" role="tab" aria-controls="ex3-pills-2" aria-selected="false">Informations de santé</a>
                </li>
                <!-- <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex3-tab-3" data-mdb-toggle="pill" href="#ex3-pills-3" role="tab" aria-controls="ex3-pills-3" aria-selected="false">Another link</a>
                </li> -->
            </ul>

        </div>
    </div>
</body>
<script type="text/javascript" src="<?= base_url() . "assets/mdbootstrap/js/mdb.min.js" ?>"></script>

</html>