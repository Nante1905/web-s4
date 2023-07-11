<div class="content">
    <h2>Recharger votre compte</h2>
    <div class="form-code">
        <div class="form-container">
            <form action="" class="form-ajout">
                <div class="form-outline">
                    <input type="text" id="code-input" name="code" class="form-control" />
                    <label class="form-label" for="code-input">Code</label>
                </div>
                <div class="button-container">
                    <button type="submit" class="btn btn-primary ajout-solde-button">Recharger</button>
                </div>
            </form>
        </div>
    </div>
    <div class="codes-container">
        <div class="table">
            <h4>Codes disponibles</h4>
            <table class="table">
                <thead class="bg-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Valeur</th>
                        <th scope="col">Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($codes as $code) { ?>
                        <tr>
                            <th scope="row"><?= $code->id ?></th>
                            <td><?= $code->token ?></td>
                            <td><?= $code->valeur ?> MGA</td>
                            <td><?php if ($code->statut == 1) { ?>
                                    <span class="badge rounded-pill badge-success">Disponible</span>
                                <?php } else { ?>
                                    <span class="badge rounded-pill badge-danger">Utilisé</span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <!-- <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>