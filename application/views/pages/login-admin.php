<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() . "assets/mdbootstrap/css/mdb.min.css" ?>">
    <link rel="stylesheet" href="<?= base_url() . "assets/css/login.css" ?>">

    <title>Login</title>
</head>

<body>
    <div class="form-container">
        <div class="form">
            <h3>Admin panel</h3>
            <br><br>
            <?= form_open("admin/seconnecter", ['method' => 'post']) ?>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" id="form1Example1" class="form-control" name="id"/>
                    <label class="form-label" for="form1Example1">Identifiant</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="form1Example2" class="form-control" name="mdp"/>
                    <label class="form-label" for="form1Example2">Mot de passe</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
            </form>
        </div>
    </div>
</body>
<script type="text/javascript" src="<?= base_url() . "assets/mdbootstrap/js/mdb.min.js" ?>"></script>

</html>