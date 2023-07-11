<div class="content">
    <div class="transactions">
        <div class="wallet-card-container">
            <div class="card wallet-card">
                <div class="card-body">
                    <h5 class="card-title">Solde actuelle</h5>
                    <h1 class="card-text"><?= format_number($solde) ?></h1>
                    <a href="profil/ajoutsolde" class="btn btn-outline-primary">Ajouter</a>
                </div>
            </div>
        </div>
        <div class="transactions-container">
            <h4>10 Derniers transactions</h4>
            <table class="table">
                <thead class="bg-light">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Valeur</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="userinfo-container">
        <div class="label">

        </div>
    </div>
</div>