<?php

$title = "Admin | Dashboard";

ob_start();
?>


<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Menu Principal</span>
                </li>
                <li class="submenu active">
                    <a href="index.php?action=dashboard"><i class="feather-grid"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="index.php?action=dashboard">Admin Dashboard</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-user"></i> <span> Utilisateurs</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="index.php?action=head_of_school">Directeur</a></li>
                        <li><a href="index.php?action=admins">Administrateur</a></li>
                        <li><a href="index.php?action=students">Etudiants</a></li>
                        <li><a href="index.php?action=teachers">Professeur</a></li>
                        <li><a href="index.php?action=librarians">Bibliothécaire</a></li>
                        <li><a href="index.php?action=scolarite">Scolarité</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?action=departement"><i class="fas fa-building"></i> <span>Departement</span></a>
                </li>
                <li>
                    <a href="index.php?action=specializations"><i class="fas fa-clipboard"></i> <span> Filiere</span> </a>
                </li>
                <li>
                    <a href="index.php?action=class"><i class="fas fa-users"></i> <span>Classe</span></a>
                </li>

                <li>
                    <a href="index.php?action=module_management"><i class="fas fa-book-reader"></i> <span>Modules & Elements</span></a>
                </li>

                <li class="menu-title">
                    <span>Gestion</span>
                </li>


                <li class="submenu">
                    <a href="#"><i class="fas fa-calendar-day"></i>
                        <span> planning </span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <a href="index.php?action=planning"> <span>Création</span></a>
                        <a href="index.php?action=print"><span>Evenements</span></a>
                        <a href="index.php?action=pdf_planning"><span>planning</span></a>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fas fa-door-open"></i>
                        <span>Salle</span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <a href="index.php?action=salle"> <span>Gestion des salles</span></a>
                        <a href="index.php?action=available_salle_admin"><span>Salles Disponibles</span></a>
                    </ul>
                </li>


                <li>
                    <a href="index.php?action=schedule_admin_classes"><i class="fa fa-calendar"></i> <span>Gestion des emplois</span></a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-list-alt"></i> <span>Planning exams</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=schedule_admin_classes_exam">Session normale</a></li>
                        <li><a href="index.php?action=schedule_admin_classes_ratt">Session Rattrapage</a></li>
                    </ul>
                </li>


                <li>
                    <a href="#"><i class="fas fa-table"></i> <span>Emploi</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="index.php?action=list_schedule">Liste des Emplois</a></li>
                        <li><a href="index.php?action=schedule_normal_admin">Liste des emplois ds normal</a></li>
                        <li><a href="index.php?action=schedule_ratt_admin">Liste des emplois ds Rattrapage</a></li>

                    </ul>
                </li>
                <li>
                    <a href="index.php?action=cv_list"><i class="fas fa-file"></i><span>Liste des CV</span></a>
                </li>
                <li>
                    <a href="#"> <i class="fas fa-forward"></i><span>Fin d'année</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li>
                            <a href="index.php?action=student_status"><i class="fas fa-file-csv"></i><span>Statut des Étudiants</span></a>
                        </li>
                        <li><a href="index.php?action=second_year_student"><i class="fas fa-file-csv"></i><span>les étudiants CP2</span></a></li>
                        <li><a href="index.php?action=end_year_student"><i class="fas fa-user-graduate"></i><span>Les lauréats</span></a></li>
                        <li><a href="index.php?action=old_year_winner"><i class="fas fa-graduation-cap"></i> <span>Les anciens lauréats</span></a></li>
                    </ul>
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
                        <h3 class="page-title">Bonjour Mr <?= $_SESSION["first"] . " " . $_SESSION["family_name"] ?> !</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?action=dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admin</li>
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
            <?php } else { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
                                <h6>Etudiant</h6>
                                <h3><?= $count_etud; ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/icons/dash-icon-01.svg" alt="Dashboard Icon">
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
                                <h6>Professeur</h6>
                                <h3><?= $count_prof; ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/icons/Teacher.png" alt="Dashboard Icon">
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
                                <h6>Administrateur</h6>
                                <h3><?= $count_admins; ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/icons/Administrator.png" alt="Dashboard Icon">
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
                                <h6>Departement</h6>
                                <h3><?= $count_department; ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/icons/dash-icon-03.svg" alt="Dashboard Icon">
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
                                <h6>Filiere</h6>
                                <h3><?= $count_specialization; ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/icons/filiere.png" alt="Dashboard Icon">
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
                                <h6>Classe</h6>
                                <h3><?= $count_classes; ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/icons/classe.png" alt="Dashboard Icon">
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
                                <h6>Modules</h6>
                                <h3><?= $count_modules; ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/icons/teacher-icon-02.svg" alt="Dashboard Icon">
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
                                <h6>Salles</h6>
                                <h3><?= $count_classroom; ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="assets/img/icons/salle.png" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-6 d-flex">
                <!-- 
                        <div class="card flex-fill student-space comman-shadow"> -->
                <div style="background-color: rgb(255, 255, 255); width: 100%; padding: 20px;height: 470px;border-radius: 15px;">
                    <h5 class="card-title mb-3">Uploader les fichiers Excel </h5>
                    <form action="index.php?action=add_excel_prof" method="post" enctype="multipart/form-data">
                        <div class="col-xl-3 col-sm-6 col-12 fs-15" style="width:600vh;">
                            <div class="card flex-fill fb sm-box file-upload">
                                <input type="file" class="image" name="excel_prof" accept=".csv">
                                <img src="assets/img/icons/csv.svg" class="img-excel">
                                <span class="fs-5 fw-2">Choisir un fichier...</span>
                                <span>Uploader les professeurs</span>

                            </div>
                        </div>
                        <button class="btn btn-primary mb-3" type="submit" name="btnprof"><i class="fas fa-upload" style="margin-right:5px"></i>Uploader les professeurs</button>
                    </form>

                    <form action="index.php?action=add_excel_etud" method="post" enctype="multipart/form-data">
                        <div class="col-xl-3 col-sm-6 col-12 fs-15" style="width:600vh;">
                            <div class="card flex-fill fb sm-box file-upload">
                                <input type="file" class="image" name="excel_etud" accept=".csv">
                                <img src="assets/img/icons/csv.svg" class="img-excel">
                                <span class="fs-5 fw-2" style="margin-bottom: 2px;">Choisir un fichier...</span>
                                <span>Uploader les étudiants</span>

                            </div>
                        </div>
                        <button class="btn btn-primary" name="btnetud" type="submit"><i class="fas fa-upload" style="margin-right:5px"></i>Uploader les étudiants</button>
                    </form>
                </div>

            </div>
            <div class="col-xl-6 d-flex">

                <div class="card flex-fill comman-shadow">
                    <div class="card card-chart">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="card-title">Nombre d'étudiant par filière</h5>
                                </div>
                            </div>
                        </div>

                        <center>
                            <div style="width: 400px;">
                                <canvas id="myChart"></canvas>
                            </div>
                        </center>
                    </div>
                </div>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const labels = <?php echo json_encode($field) ?>;
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Totale étudiant',
                    data: <?php echo json_encode($number) ?>,
                    backgroundColor: generateRandomColors(labels.length),
                    hoverOffset: 4
                }]
            };

            const config = {
                type: 'doughnut',
                data: data,
            };

            var myChart = new Chart(
                document.getElementById('myChart'),
                config
            );

            function generateRandomColors(numColors) {
                const colors = [];
                for (let i = 0; i < numColors; i++) {
                    colors.push(`hsl(${Math.random() * 360}, 100%, 75%)`);
                }
                return colors;
            }
        </script>

        <div class="row">

            <div class="col-xl-6 col-sm-6 col-12">
                <a href="https://www.facebook.com/p/ENSA-El-Jadida-100035365702253/?locale=fr_FR" target="_blank">
                    <div class="card flex-fill fb sm-box">
                        <div class="social-likes">
                            <p>Voir</p>
                            <h6>Page facebook</h6>
                        </div>
                        <div class="social-boxs">
                            <img src="assets/img/icons/social-icon-01.svg" alt="Social Icon">
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-xl-6 col-sm-6 col-12">
                <a href="https://www.ensaj.ucd.ac.ma/" target="_blank">
                    <div class="card flex-fill linkedin sm-box">
                        <div class="social-likes">
                            <p>Voir</p>
                            <h6>Site Web</h6>
                        </div>
                        <div class="social-boxs">
                            <img src="assets/img/icons/chercher.png" style="width: 35px;height: 35px;" alt="Social Icon">
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
    <footer>
        <p>COPYRIGHT © 2024 ECOLE NATIONALE DES SCIENCES APPLIQUÉES EL JADIDA</p>
    </footer>
</div>
<!-- </div> -->


<?php $content = ob_get_clean(); ?>
<?php require_once "views/admin/components/layout.php"; ?>