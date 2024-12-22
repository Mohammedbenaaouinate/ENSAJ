<?php
$title = "Scolarité | Dashboard";
ob_start();

?>

<head>
    <style>
        .img_book_dashboard {
            height: 40px !important;
            width: 40px !important;
        }

        .image_transition {
            width: 100% !important;
            height: 400px !important;
        }
    </style>
</head>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="submenu active">
                    <a href="index.php?action=scolarite_dashboard"><i class="feather-grid"></i> <span> Dashboard</span></a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-hand-holding"></i> <span>Demande</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=all_school_certificate">Attestation Scolaire</a></li>
                        <li><a href="index.php?action=all_temporarily_withdrawn">Retiré Provisoirement</a></li>
                        <li><a href="index.php?action=all_internship_agreement">Convention de Stage </a></li>
                        <li><a href="index.php?action=all_marks_requests">Relvé de notes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?action=absence_list"><i class="fas fa-book-reader"></i> <span>Liste D'absence</span></a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-list-ul"></i><span>Gestion D'absence</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=abs_statistique">Statistique</a></li>
                        <li><a href="index.php?action=generate_absence_list">Enregistrer l'absence</a></li>
                        <li><a href="index.php?action=edit_student_absence">Modifier l'absence</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?action=scolarite_planning"><i class="fas fa-calendar"></i> <span>Planning</span></a>
                </li>

                <li>
                    <a href="index.php?action=logout_users"><i class="fas fa-sign-out-alt"></i> <span>Déconnexion</span></a>
                </li>

            </ul>
        </div>
    </div>
</div>





<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Bonjour ! <?= $_SESSION['prenom'] . " " . $_SESSION['nom']; ?></h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Scolarité</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>




        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Attestation Scolaire</h6>
                                <h3><?= $nbr_attestation_scolaire; ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/scolarites/img/attestation_scolarite.png" alt="Dashboard Icon" class="img_book_dashboard">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Retrait Provisoire</h6>
                                <h3><?= $nbr_retrait_provisoire; ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/scolarites/img/retrait_temporaires.png" alt="Dashboard Icon" class="img_book_dashboard">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Convention de Stage</h6>
                                <h3><?= $nbr_convention_stage; ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/scolarites/img/convention_stage.png" alt="Dashboard Icon" class="img_book_dashboard">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Relvé de notes</h6>
                                <h3><?= $nbr_relve_note; ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/scolarites/img/relve_note.png" alt="Dashboard Icon" class="img_book_dashboard">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid image_transition" src="assets/scolarites/img/coursel_1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid image_transition" src="assets/scolarites/img/coursel_2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid image_transition" src="assets/scolarites/img/coursel_3.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>

    </div>

    <footer class="mt-4">
        <p>COPYRIGHT © 2024 ECOLE NATIONALE DES SCIENCES APPLIQUÉES EL JADIDA</p>
    </footer>

</div>
<?php
$content = ob_get_clean();
require("views/scolarite/components/layout.php");

?>