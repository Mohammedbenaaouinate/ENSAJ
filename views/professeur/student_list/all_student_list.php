<?php
$title = "Professeur | Classses";
ob_start();

?>


<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Menu principale</span>
                </li>
                <li>
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

                <li class="active">
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
                        <h3 class="page-title">Etudiants</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Etudiant</a>
                            </li>
                            <li class="breadcrumb-item active">Liste des étudiants</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Code Massar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($students as $student) { ?>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="#" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/students/<?= $student['image_path']; ?>" alt="User Image" /></a>
                                                    <a href="#"><?= $student['lastname']; ?></a>
                                                </h2>
                                            </td>
                                            <td><?= $student['firstname']; ?></td>
                                            <td><?= $student['massar_student']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>COPYRIGHT © 2024 ECOLE NATIONALE DES SCIENCES APPLIQUÉES EL JADIDA</p>
    </footer>
</div>

<?php
$content = ob_get_clean();
require_once("views/admin/components/layout_prof.php")
?>