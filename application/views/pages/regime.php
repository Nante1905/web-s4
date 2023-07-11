<div class="main">
    <div class="title">
        <h1 class="title__h1">Nouveau régime</h1>
    </div>
    <div class="form">
        <div class="card">
            <div class="card-body">
                <?php echo form_open_multipart('regime/inserer'); ?>
                <div class="form-outline">
                    <input type="text"  name="nom" class="form-control" value="<?php echo set_value('nom'); ?>" />
                    <label class="form-label" for="nom">Nom du régime</label>
                </div>
                <div class="form-outline">
                    <input type="file"  name="photo" class="form-control" />
                </div>
                <div class="form-outline">
                    <label class="form-label" for="idobjectif">Type de régime</label>
                    <select name="idobjectif">
                        <?php foreach ($objectifs as $obj) { ?>
                            <option value="<?= $obj->id ?>" ><?= $obj->nom ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form">
                    <label class="form-label" for="apport">Apport</label>
                    <input type="text"  name="apport" class="form-control" min="0" value="<?php echo set_value('apport'); ?>" />
                </div>
                <div class="form">
                    <label class="form-label" for="code-input">Durée(jours)</label>
                    <input type="number"  name="duree" class="form-control" min="0" value="<?php echo set_value('duree'); ?>" />
                </div>
                <div class="form">
                    <label class="form-label" for="code-input">Prix du régime</label>
                    <input type="number"  name="prix" class="form-control" min="0" value="<?php echo set_value('prix'); ?>" />
                </div>
                
                <div class="button-container text-center">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
                <div class="text-center danger" >
                    <?php echo validation_errors(); ?>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>