<!-- <div>
    <form action="<?= site_url().'/regime/inserer' ?>" method="post" enctype="multipart/form-data">
        <p><input type="text" name="nom"></p>
        <p><input type="text" name="prix"></p>
        <p><input type="text" name="apport"></p>
        <p><input type="text" name="duree"></p>
        <p><input type="file" name="photo" size="20"></p>
        <p>
            <select name="idbojectif">
                <option value="1">Augmentation du poids</option>
                <option value="2">Diminution du poids</option>
            </select>
        </p>
        <p><button type="submit">Valider</button></p>
        
        
    </form>
</div> -->
<div style="padding-top:100px;">
<?php echo form_open_multipart('regime/inserer');?>
        <p>Nom du régime:<input type="text" name="nom"></p>
        <p><input type="file" name="photo" size="20"></p>
        <p>Apport: <input type="number" name="apport"></p>
        <p>Durée du Regime<input type="number" name="duree"></p>
        <p>Prix du régime: <input type="number" name="prix"></p>
        <p>Objectif
            <select name="idobjectif">
                <option value="1">Augmentation du poids</option>
                <option value="2">Diminution du poids</option>
                <option value="3">Atteindre IMC idéal</option>
            </select>
        </p>
        <p><button type="submit">Valider</button></p>
</form>
</p>