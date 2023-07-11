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
    </div>
    <div class="userinfo-container">
        <div class="label">

        </div>
    </div>

    <div class="detailProfil">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h3 class="card-title alignement_style"><img src="<?= base_url().'assets/img/user.svg' ?>" class="icon_user"><?= $user->nom ?></h3>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $user->email ?></h6>
                </div>
                <div style="
                    margin-left: 22px;
                    margin-top: 24px;">
                    <p class="card-text">Poids:  <?= $user->poids ?>kg </p>
                    <p class="card-text">Taille:  <?= $user->taille ?>cm</p>
                    <p class="card-text">IMC:  <?= $imc ?></p>
                </div>
                
            </div>
        </div>
    </div>
    
</div>