<div class="content">
    <div class="form">
        <h3>Entrer vos objectifs</h3>
        <form id="form-objectif" class="form_objectif">
            <div class="form-content">
                <div class="select-content">
                    <label for="obj">Objectif : </label>
                    <select name="idobjectif" id="" class="mdb-select md-form select">
                        <?php foreach ($objectifs as $obj) { ?>
                            <option value="<?= $obj->id ?>"><?= $obj->nom ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-outline input-poids">
                    <input type="number" class="form-control" name="poids" />
                    <label class="form-label">Poids</label>
                </div>
                <div class="form-submit">
                    <button type="submit" class="btn btn-primary primary">Valider</button>
                </div>
            </div>
        </form>
        <br>
        <div class="current-objectif">
            <p>Objectif actuel : 30kg</p>
        </div>
    </div>
    <div class="title">
        <h1 class="title__h1">Régimes proposés</h1>
    </div>
</div>