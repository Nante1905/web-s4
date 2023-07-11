<div class="content">
    <div class="form">
        <!-- <div class="current-objectif">
            <h3>Objectif actuel : <?php if ($objectif_actuel->idobjectif == 1) { ?>
                    <i class="fa-solid fa-caret-up success"></i>
                <?php } else if ($objectif_actuel->idobjectif == 2) { ?>
                    <i class="fa-solid fa-caret-down danger "></i>
                    <?php } ?><?= $objectif_actuel->poids ?>kg
            </h3>
        </div> -->

        <br>
        <h3>Nouvel Objectif : </h3>
        <form id="form-objectif" class="form_objectif">
            <div class="form-content">
                <div class="select-content">
                    <label for="obj">Objectif : </label>
                    <select name="idobjectif" id="" class="mdb-select md-form select">
                        <?php foreach ($objectifs as $obj) { ?>
                            <option value="<?= $obj->id ?>" class="<?php if($obj->id == 3) { echo 'imc'; } ?>" ><?= $obj->nom ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-outline input-poids">
                    <input type="number" class="form-control" name="poids" id="input-poids" />
                    <label class="form-label">Poids</label>
                </div>
                <div class="form-submit">
                    <button type="submit" class="btn btn-primary primary">Valider</button>
                </div>
            </div>
        </form>
        <br>
        <?php if($objectif_actuel != null) { ?>
            <div class="current-objectif">
                <h3>Objectif actuel : <?php if ($objectif_actuel->idobjectif == 1 || ( $objectif_actuel->idobjectif == 3 && $objectif_actuel->poids > 0) ) { ?>
                        <i class="fa-solid fa-caret-up success"></i>
                    <?php } else if ($objectif_actuel->idobjectif == 2 || ( $objectif_actuel->idobjectif == 3 && $objectif_actuel->poids < 0) ) { ?>
                        <i class="fa-solid fa-caret-down danger "></i>
                        <?php } ?><?= $objectif_actuel->poids ?>kg ( <?= $objectif_actuel->nom ?> )
                </h3>
                <div class="d-flex align-item-center info-imc">
                    <h5>Votre IMC: <?= format_number($IMC) ?></h5>
                    <h5>Votre IMC idéal: <?= format_number($IMC_ideal) ?></h5>
                </div>
            </div>
        <?php } else { ?>
            <h3 class="message">Pas encore d'objectifs</h3>
        <?php } ?>
    </div>
    <?php if($objectif_actuel != null) { ?>
        <div class="title">
            <h1 class="title__h1">Régimes proposés</h1>
        </div>
        <p class="message text-center danger"></p>
        <div class="liste">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php foreach ($regimes as $regime) { ?>
                    <div class="col">
                        <div class="card">
                            <img src="<?= base_url() . 'assets/img/'. $regime['regime']->photo ?>" class="card-img-top" alt="Plat" />
                            <div class="card-body">
                                <h5 class="card-title strong "><?= $regime["regime"]->nom ?></h5>
                                <div class="card-text">
                                    <p class="card-text__kilo">
                                        <?php if ($regime["regime"]->idobjectif == 1) { ?>
                                            <i class="fa-solid fa-caret-up success"></i>
                                        <?php } else if ($regime["regime"]->idobjectif == 2) { ?>
                                            <i class="fa-solid fa-caret-down danger "></i>
                                        <?php } ?>
                                        <?= $regime["regime"]->apport ?> kg en <strong><?= format_semaine($regime["regime"]->duree) ?></strong>
                                    </p>
                                    <p class="card-text__prix">
                                        <i class="fa-solid fa-money-bill "></i>
                                        PU :
                                        <?= format_number(($regime["regime"]->prix)) ?> ar
                                    </p>
                                    <p class="card-text__prix">
                                        <i class="fa-solid fa-money-bill "></i>
                                        Montant :
                                        <?= format_number(($regime["prixtotal"])) ?> ar
                                    </p>
                                    <p class="card-text__prix">
                                        <span class="badge rounded-pill gold-badge">Gold</span>
                                        <?= format_number(($regime["prixremise"])) ?> ar
                                    </p>
                                    <p class="card-text__prix">
                                        <i class="fa-solid fa-clock"></i>
                                        <?= format_semaine(intval($regime["dureetotal"])) ?>
                                    </p>
                                    <p class="card-text__msg__<?= $regime["regime"]->id ?>"></p>
                                </div>
                                <div class="card-actions" id="<?= $regime["regime"]->id ?>_card">
                                    <button class="btn secondary btn-details " type="button" data-mdb-toggle="collapse" data-mdb-target="#collapse_<?= $regime["regime"]->id ?>" aria-controls="#collapse_<?= $regime["regime"]->id ?>" aria-expanded="false" aria-label="Toggle navigation" data-id="<?= $regime["regime"]->id ?>">
                                        Détails
                                    </button>
                                    <button type="button" class="btn primary btn-accept" data-id="<?= $regime["regime"]->id ?>" >Soumettre</button>
                                </div>
                                <div id="collapse_<?= $regime["regime"]->id ?>" class="collapse details ">
                                    <h5 class="subtitle">Plats</h5>
                                    <ul class="list-group" id="details_<?= $regime["regime"]->id ?>">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="title">
            <h1 class="title__h1">Sports proposés</h1>
        </div>
        <div class="liste">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php foreach ($sports as $sport) { ?>
                    <div class="col">
                        <div class="card">
                            <img src="<?= base_url() . 'assets/img/sport.jpg' ?>" class="card-img-top" alt="Sport" />
                            <div class="card-body">
                                <h5 class="card-title strong "><?= $sport['sport']->nom ?> </h5>
                                <div class="card-text">
                                    <p class="card-text__kilo">
                                        <?php if ($sport['sport']->idobjectif == 1) { ?>
                                            <i class="fa-solid fa-caret-up success"></i>
                                        <?php } else if ($sport['sport']->idobjectif == 2) { ?>
                                            <i class="fa-solid fa-caret-down danger "></i>
                                        <?php } ?>
                                        <?= $sport['sport']->apportjour ?> kg / jour
                                    </p>
                                    <p class="card-text__duree">
                                        <i class="fa-solid fa-clock"></i>
                                        <?= format_semaine(ceil(format_number($sport["dureetotal"]))) ?>    
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>