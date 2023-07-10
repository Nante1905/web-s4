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
                <?php for($i=0; $i<10; $i++) { ?>
                    <div class="col">
                        <div class="card">
                            <img src="<?= base_url(). 'assets/img/plat.jpg' ?>" class="card-img-top" alt="Plat" />
                            <div class="card-body">
                                <h5 class="card-title strong ">Nom du plat</h5>
                                <div class="card-text">
                                    <p class="card-text__kilo">
                                        <i class="fa-solid fa-caret-up"></i>
                                        5 kg en <strong>2</strong> semaine
                                    </p>
                                    <p class="card-text__prix">
                                        <i class="fa-solid fa-money-bill " ></i>
                                        12000 ar 
                                    </p>
                                </div>
                                <div class="card-actions">
                                    <a  class="btn secondary"  data-toggle="collapse" data-target="#<?= $i ?>_collapse" aria-expanded="true" aria-controls="<?= $i ?>_collapse" >Détails</a>
                                    <a href="#" class="btn primary">Soumettre</a>
                                </div>
                                <div id="<?= $i ?>_collapse" class="collapse" >
                                    <p>haha</p>
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
                <?php for($i=0; $i<10; $i++) { ?>
                    <div class="col">
                        <div class="card">
                            <img src="<?= base_url(). 'assets/img/sport.jpg' ?>" class="card-img-top" alt="Sport" />
                            <div class="card-body">
                                <h5 class="card-title strong ">Nom du sport</h5>
                                <div class="card-text">
                                    <p class="card-text__kilo">
                                        <i class="fa-solid fa-caret-down"></i>
                                        5 kg en <strong>5</strong> jours
                                    </p>
                                </div>
                                <div class="card-actions">
                                    <a href="#" class="btn primary">Soumettre</a>
                                </div>
                                <div id="<?= $i ?>_collapse" class="collapse" >
                                    <p>haha</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</div>