<div class="navContainer">
    <nav class="d-lg-block sidebar collapse ">
        <a class="navbar-brand" href="#">
            <strong>Nom App</strong>
        </a>
        <!-- <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button> -->
        <div class=" navbar-content "  id="sidebarMenu">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 ">
                    <a class="list-group-item list-group-item-action py-2 ripple" href="#">
                        <i class="fas fa-chart-line fa-fw me-3"></i><span>Tableau de bord</span>
                    </a>
                </div>
                <div class="list-group list-group-flush mx-3">
                    <a class="list-group-item list-group-item-action py-2 ripple" aria-current="true" data-mdb-toggle="collapse" href="#collapseExample1" aria-expanded="true" aria-controls="collapseExample1">
                        <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Expanded menu</span>
                    </a>
                    <ul id="collapseExample1" class="collapse show list-group list-group-flush">
                        <li class="list-group-item py-1">
                            <a href="" class="text-reset">Link</a>
                        </li>
                        <li class="list-group-item py-1">
                            <a href="" class="text-reset">Link</a>
                        </li>
                        <li class="list-group-item py-1">
                            <a href="" class="text-reset">Link</a>
                        </li>
                        <li class="list-group-item py-1">
                            <a href="" class="text-reset">Link</a>
                        </li>
                    </ul>
                </div>
                <div class="list-group list-group-flush mx-3">
                    <a class="list-group-item list-group-item-action py-2 ripple" aria-current="true" data-mdb-toggle="collapse" href="#collapseExample2" aria-expanded="true" aria-controls="collapseExample2">
                        <i class="fas fa-chart-area fa-fw me-3"></i><span>Collapsed menu</span>
                    </a>
                    <ul id="collapseExample2" class="collapse list-group list-group-flush">
                        <li class="list-group-item py-1">
                            <a href="" class="text-reset">Link</a>
                        </li>
                        <li class="list-group-item py-1">
                            <a href="" class="text-reset">Link</a>
                        </li>
                        <li class="list-group-item py-1">
                            <a href="" class="text-reset">Link</a>
                        </li>
                        <li class="list-group-item py-1">
                            <a href="" class="text-reset">Link</a>
                        </li>
                    </ul>
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