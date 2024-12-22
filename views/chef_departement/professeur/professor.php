<?php
$title = "Chef Département | Liste des professeurs";
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
                    <a href="index.php?action=dashboard_chef"><i class="feather-grid"></i> <span> Dashboard</span></a>
                </li>

                <li>
                    <a href="index.php?action=schedule"><i class="fa fa-calendar"></i> <span>Gestion des emplois</span></a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-list-alt"></i> <span>Planning exams</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=schedule_exam">Session normale</a></li>
                        <li><a href="index.php?action=schedule_ratt">Session Rattrapage</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-user"></i> <span>Vos emplois</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=user_emploi">Horraire Travail</a></li>
                        <li><a href="index.php?action=user_emploi_normal">Emploi de Session normale</a></li>
                        <li><a href="index.php?action=user_emploi_ratt">Emploi des rattrapage</a></li>

                    </ul>
                </li>

                <li>
                    <a href="index.php?action=student_list_head_departement"><i class="fas fa-user-graduate"></i> <span>Liste des étudiants</span></a>
                </li>

                <li>
                    <a href="index.php?action=upload_cour"><i class="fas fa-chalkboard"></i> <span>Cours</span></a>
                </li>
                <li>
                    <a href="index.php?action=available"><i class="fas fa-door-open"></i> <span>Salle Disponibles</span></a>
                </li>

                <li class="submenu active">
                    <a href="index.php?action=lists_professeur"><i class="fas fa-user"></i> <span>Liste des professeurs</span></a>
                </li>
                <li>
                    <a href="index.php?action=planning_chef"><i class="fas fa-calendar"></i> <span>Planning Annuel</span></a>
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
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Professeur</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php?action=lists_professeur">Professeur</a></li>
                        <li class="breadcrumb-item active">Liste Des professeurs</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Liste des Professeur</h3>
                                </div>

                            </div>
                        </div>
                        <div class="table-responsive">

                            <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>Nom complet</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Département</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lists_professor as $result) { ?>
                                        <tr>
                                            <td>
                                                <h2>
                                                    <a><?php echo $result["firstname"] . " " . $result["lastname"]; ?></a>
                                                </h2>
                                            </td>
                                            <td><a href="mailto:<?php echo $result["email"] ?>" style="color:#2e86de; font-weight:bold;"><?php echo $result["email"] ?></a></td>
                                            <td><?php echo $result["phone_number"] ?></td>
                                            <td style="text-transform: uppercase;"><?php echo $result["short_name"] ?></td>
                                            <?php if ($result["role_prof"] == 2) { ?>
                                                <td>Administrateur</td>
                                            <?php } elseif ($result["role_prof"] == 1 && $result["second_role"] == NULL) { ?>
                                                <td>Professeur</td>
                                            <?php } elseif ($result["role_prof"] == 1 && $result["second_role"] == "filiere") { ?>
                                                <td>Chef de filière</td>
                                            <?php } else { ?>
                                                <td>Chef de Département</td>
                                            <?php } ?>

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

</div>

<?php $content = ob_get_clean(); ?>
<?php require_once("views/admin/components/layout_chef.php") ?>