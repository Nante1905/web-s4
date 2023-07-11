<div class="navContainer">
    <nav class="d-lg-block sidebar collapse ">
        <a class="navbar-brand" href="#">
            <strong>Nom App</strong>
        </a>
        <div class=" navbar-content "  id="sidebarMenu">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 ">
                    <a class="list-group-item list-group-item-action py-2 ripple" href="<?= site_url('dashboard') ?>">
                        <i class="fas fa-chart-line fa-fw me-3"></i><span>Tableau de bord</span>
                    </a>
                </div>
                <div class="list-group list-group-flush mx-3 ">
                    <a class="list-group-item list-group-item-action py-2 ripple" href="<?= site_url('dashboard/validation') ?>">
                        <i class="fa-solid fa-clock"></i>
                        <span>Codes en attentes</span>
                    </a>
                </div>
                <div class="list-group list-group-flush mx-3 ">
                    <a class="list-group-item list-group-item-action py-2 ripple" href="<?= site_url('regime/nouveau') ?>">
                        <span>Régimes</span>
                    </a>
                </div>
                <div class="list-group list-group-flush mx-3">
                    <?= anchor("admin/deconnexion", "<i class='fas fa-sign-out fa-fw me-3'></i><span>Deconnexion</span>", ['class' => "list-group-item list-group-item-action py-2 ripple"]) ?>    
                </div>
            </div>
        </div>
    </nav>
</div>
<div class="container-fluid">
</div>