<div class="main">
    <div class="recharges-container">
        <div class="table">
            <h4>Recharge en attente de validation</h4>
            <table class="table">
                <thead class="bg-light">
                    <tr>
                        <th scope="col">Utilisateur</th>
                        <th scope="col">Date</th>
                        <th scope="col">Code</th>
                        <th scope="col">Valeur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recharges as $recharge) { ?>
                        <tr>
                            <th scope="row"><?= $recharge->nom ?></th>
                            <td><?= $recharge->daterecharge ?></td>
                            <td><?= $recharge->token ?></td>
                            <td><?= format_number($recharge->valeur) ?> MGA</td>
                            <td><a href="<?= base_url()."index.php/dashboard/validerrecharge/".$recharge->idcode ?>"><button class="btn btn-success">Valider</button></a></td>
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