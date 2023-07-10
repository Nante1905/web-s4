<div class="main">
    <div class="title">
        <h1 class="title__h1">Tableau de bord</h1>
    </div>
    <div class="form">
        <form id="form-date" class="form_date">
            <div class="form-content col-md-8 ">
                <div class="select-content">
                    <label for="mois">Mois : </label>
                    <select name="mois"  class="mdb-select md-form select">
                        <?php for ($i=0; $i<count($mois); $i++) { ?>
                            <option value="<?= $i+1 ?>"><?= $mois[$i] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="select-content">
                    <select name="annee"  class="mdb-select md-form select">
                        <?php for ($i=$annee-5; $i<$annee; $i++) { ?>
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
                <h4>Nombre d'utilisateurs inscripts</h4>
            </div>
            <div class="graphe">
                <div class="graphe-container card">
                    <div class="card-body">
                        <canvas id="graphInscripts" ></canvas>
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
                        <canvas id="graphClassement" ></canvas>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>