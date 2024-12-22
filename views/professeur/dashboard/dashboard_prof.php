<?php
$title = "Professeur | Dashboard";
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

<body>


    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Menu principale</span>
                    </li>
                    <li class="submenu active">
                        <a href="index.php?action=dashboard_prof"><i class="feather-grid"></i> <span> Dashboard</span></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-user"></i> <span>Vos emplois</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="index.php?action=prof_emploi">Horraire Travail</a></li>
                            <li><a href="index.php?action=prof_emploi_normal">Emploi de Session normale</a></li>
                            <li><a href="index.php?action=prof_emploi_ratt">Emploi des rattrapage</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="index.php?action=student_classes"><i class="fas fa-user-graduate"></i> <span>Liste des étudiants</span></a>
                    </li>

                    <li>
                        <a href="index.php?action=upload_cour_prof"><i class="fas fa-chalkboard"></i> <span>Cours</span></a>
                    </li>
                    <li>
                        <a href="index.php?action=lists_professeur_of_prof"><i class="fas fa-users"></i> <span>Listes des membres</span></a>
                    </li>
                    <li>
                        <a href="index.php?action=planning_prof"><i class="fas fa-calendar"></i> <span>Planning Annuel</span></a>
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
                            <h3 class="page-title">Bonjour <?= $_SESSION["firstname_prof"] . " " . $_SESSION["fname_prof"] ?> !</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?action=dashboard_prof">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (isset($_SESSION['message'])) :
                if ($_SESSION['message_type'] == 'success') { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?php echo $_SESSION['message']; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } elseif ($_SESSION['message_type'] == 'error') { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?php echo $_SESSION['message']; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <?php unset($_SESSION['message']); ?>
                <?php unset($_SESSION['message_type']); ?>
            <?php endif; ?>


            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Nombre de cours</h6>
                                    <h3><?= $lists_course; ?></h3>
                                </div>
                                <div class="db-icon">
                                    <img style="width:40px;height:40px" src="assets/img/icons/teacher-icon-02.svg" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php foreach ($list_number as $number) { ?>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Nombre étudiant(<?= $number["class_name"] ?>)</h6>
                                        <h3><?= $number["number_student"] ?></h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assets/img/icons/classe.png" alt="Dashboard Icon" class="img_book_dashboard">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>

            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid image_transition" src="assets/chef/prof.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid image_transition" src="assets/chef/image.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid image_transition" src="assets/chef/image2.jpg" alt="Third slide">
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

        <footer>
            <p>COPYRIGHT © 2024 ECOLE NATIONALE DES SCIENCES APPLIQUÉES EL JADIDA</p>
        </footer>

    </div>

    <?php $content = ob_get_clean(); ?>
    <?php require_once("views/admin/components/layout_prof.php") ?>