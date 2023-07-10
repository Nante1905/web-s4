<div class="container-fluid head h-100">
    <div class="content h-100">
        <div class="text-content">
            <h1>Titre ngeza</h1>
            <p>Ici, vous trouverez une multitude de recettes savoureuses et d'activités physiques pour vous accompagner dans votre parcours vers un régime alimentaire épanouissant et adapté à vos besoins. Explorez nos rubriques et laissez-nous vous guider vers une meilleure santé et un bien-être durable.</p>
        </div>
    </div>
</div>
<div class="container-fluid main">
    <section id="regimes">
        <div class="title">
            <h1 class="title__h1">Nos régimes</h1>
        </div>
        <div class="liste">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php foreach ($regimes as $regime ) { ?>
                    <div class="col">
                        <div class="card">
                            <img src="<?= base_url() . 'assets/img/plat.jpg' ?>" class="card-img-top" alt="Plat" />
                            <div class="card-body">
                                <h5 class="card-title strong "><?= $regime->nom ?></h5>
                                <div class="card-text">
                                    <p class="card-text__kilo">
                                        <?php if($regime->idobjectif == 1) { ?>
                                            <i class="fa-solid fa-caret-up success"></i>
                                        <?php } else if ($regime->idobjectif == 2) { ?>
                                            <i class="fa-solid fa-caret-down danger "></i>
                                        <?php } ?>
                                        <?= $regime->apport ?> kg en <strong><?= $regime->duree ?></strong> jours
                                    </p>
                                    <p class="card-text__prix">
                                        <i class="fa-solid fa-money-bill "></i>
                                        <?= format_number(($regime->prix)) ?> ar
                                    </p>
                                </div>
                                <div class="card-actions" id="<?= $regime->id ?>_card">
                                    <button class="btn secondary btn-details " type="button" data-mdb-toggle="collapse" data-mdb-target="#collapse_<?= $regime->id ?>" aria-controls="#collapse_<?= $regime->id ?>" aria-expanded="false" aria-label="Toggle navigation" data-id="<?= $regime->id ?>"  >
                                        Détails
                                    </button>
                                    <a href="#" class="btn primary">Soumettre</a>
                                </div>
                                <div id="collapse_<?= $regime->id ?>" class="collapse details ">
                                    <h5 class="subtitle">Plats</h5>
                                    <ul class="list-group" id="details_<?= $regime->id ?>">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <section id="regimes">
        <div class="title">
            <h1 class="title__h1">Nos activités sportives </h1>
        </div>
        <div class="liste">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php foreach($sports as $sport) { ?>
                    <div class="col">
                        <div class="card">
                            <img src="<?= base_url() . 'assets/img/sport.jpg' ?>" class="card-img-top" alt="Sport" />
                            <div class="card-body">
                                <h5 class="card-title strong "><?= $sport->nom ?> </h5>
                                <div class="card-text">
                                    <p class="card-text__kilo">
                                        <?php if($sport->idobjectif == 1) { ?>
                                            <i class="fa-solid fa-caret-up success"></i>
                                        <?php } else if ($sport->idobjectif == 2) { ?>
                                            <i class="fa-solid fa-caret-down danger "></i>
                                        <?php } ?>
                                        <?= $sport->apportjour ?> kg / jour
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</div>
