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
            <h3>Se connecter</h3>
            <div class="error"><?= $error ?></div>
            <br><br>
            <?= form_open("user/seconnecter", ['method' => 'post']) ?>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="form1Example1" class="form-control" name="email" value="mirija@gmail.com"/>
                    <label class="form-label" for="form1Example1">Email</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="form1Example2" class="form-control" name="mdp" value="mirija"/>
                    <label class="form-label" for="form1Example2">Mot de passe</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col">
                        <!-- Simple link -->
                        <?= anchor('user/inscription', "Pas de compte ?") ?>
                        <!-- <a href=""></a> -->
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
            </form>
        </div>
    </div>
</body>
<script type="text/javascript" src="<?= base_url() . "assets/mdbootstrap/js/mdb.min.js" ?>"></script>

</html>