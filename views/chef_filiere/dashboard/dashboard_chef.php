<?php
$title = "Chef Filière | Dashboard";
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
                        <a href="index.php?action=dashboard_filiere"><i class="feather-grid"></i> <span> Dashboard</span></a>
                    </li>
                    <li>
                        <a href="index.php?action=schedule_chef_filiere"><i class="fa fa-calendar"></i> <span>Gestion des emplois</span></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-list-alt"></i> <span>Planning exams</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="index.php?action=schedule_exam_filiere">Session normale</a></li>
                            <li><a href="index.php?action=schedule_ratt_filiere">Session Rattrapage</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-user"></i> <span>Vos emplois</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="index.php?action=user_emploi_filiere">Horraire Travail</a></li>
                            <li><a href="index.php?action=user_emploi_normal_filiere">Emploi de Session normale</a></li>
                            <li><a href="index.php?action=user_emploi_ratt_filiere">Emploi des rattrapage</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="index.php?action=chef_emploi_filiere"><i class="fas fa-user-graduate"></i> <span>Liste des étudiants</span></a>
                    </li>

                    <li>
                        <a href="index.php?action=upload_cour_filiere"><i class="fas fa-chalkboard"></i> <span>Cours</span></a>
                    </li>
                    <li>
                        <a href="index.php?action=available_filiere"><i class="fas fa-door-open"></i> <span>Salle Disponibles</span></a>
                    </li>
                    <li>
                        <a href="index.php?action=lists_professeur_filiere"><i class="fas fa-user"></i> <span>Liste des professeurs</span></a>
                    </li>
                    <li>
                        <a href="index.php?action=planning_filiere"><i class="fas fa-calendar"></i> <span>Planning Annuel</span></a>
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
                            <h3 class="page-title">Bonjour <?= $_SESSION["firstname_filiere"] . " " . $_SESSION["lastname_filiere"] ?> !</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?action=dashboard_filiere">Home</a></li>
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
                                    <h3><?= $lists_course ?></h3>
                                </div>
                                <div class="db-icon">
                                    <img style="width:40px;height:40px" src="assets/img/icons/teacher-icon-02.svg" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php foreach ($lists_number_student_chef as $classes) { ?>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Nombre étudiant(<?= $classes["class_name"] ?>)</h6>
                                        <h3><?= $classes["number_student"] ?></h3>
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
    <?php require_once("views/admin/components/layout_filiere.php") ?>