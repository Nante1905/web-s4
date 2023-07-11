<div class="main">
    <div class="title">
        <h1 class="title__h1">Tableau de bord</h1>
    </div>
    <div class="form">
        <form id="form-date" class="form_date">
            <div class="form-content col-md-8 ">
                <div class="select-content">
                    <label for="mois">Mois : </label>
                    <select name="mois" class="mdb-select md-form select">
                        <?php for ($i = 0; $i < count($mois); $i++) { ?>
                            <option value="<?= $i + 1 ?>"  <?php  if($i+1 == $moisCourant) { echo 'selected'; } ?> ><?= $mois[$i] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="select-content">
                    <select name="annee" class="mdb-select md-form select">
                        <?php for ($i = $annee - 5; $i < $annee; $i++) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                        <option value="<?= $annee ?>" selected><?= $annee ?></option>
                    </select>
                </div>
                <div class="form-submit">
                    <button type="submit" class="btn btn-primary btn-submit">Valider</button>
                </div>
            </div>
            <p class="text-center danger message"></p>
        </form>
    </div>
    <div class="statistics">
        <section class="inscription">
            <div class="subtitle">
                <h4>Nombre d'utilisateurs inscrits</h4>
            </div>
            <div class="graphe">
                <div class="graphe-container card">
                    <div class="card-body">
                        <canvas id="graphInscripts"></canvas>
                    </div>
                </div>
                <div class="info-container card" >
                    <div class="card-body">
                        <h3 class="card-title">Total</h3>
                        <p class="card-text text-center fs-2" id="utilisateur" ></p>
                        <div class="d-flex justify-content-center">
                            <div class="spinner-grow text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="recharge">
            <div class="subtitle">
                <h4>Revenu par recharge code</h4>
            </div>
            <div class="graphe">
                <div class="graphe-container card">
                    <div class="card-body">
                        <canvas id="graphRecharge"></canvas>
                    </div>
                </div>
                <div class="info-container card" >
                    <div class="card-body">
                        <h3 class="card-title">Total</h3>
                        <p class="card-text text-center fs-2" id="recharge" ></p>
                        <div class="d-flex justify-content-center">
                            <div class="spinner-grow text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="vente">
            <div class="subtitle">
                <h4>Revenu par vente de régime</h4>
            </div>
            <div class="graphe">
                <div class="graphe-container card">
                    <div class="card-body">
                        <canvas id="graphVente"></canvas>
                    </div>
                </div>
                <div class="info-container card" >
                    <div class="card-body">
                        <h3 class="card-title">Total</h3>
                        <p class="card-text text-center fs-2" id="vente" >
                            <div class="d-flex justify-content-center">
                                <div class="spinner-grow text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="classement">
            <div class="subtitle">
                <h4>Classement des régimes par nombre de ventes</h4>
            </div>
            <div class="graphe">
                <div class="graphe-container card">
                    <div class="card-body">
                        <canvas id="graphClassement"></canvas>
                    </div>
                </div>
                <div class="info-container card" >
                    <div class="card-body">
                        <h3 class="card-title">Total</h3>
                        <p class="card-text text-center fs-2" id="classement" >
                            <div class="d-flex justify-content-center">
                                <div class="spinner-grow text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>