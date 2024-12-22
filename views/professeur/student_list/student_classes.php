<?php
$title = "Professeur | Classes";
ob_start();
?>

<head>
    <style>
        table {
            text-align: center;
            border: 2px solid black;
            width: 60%;
            margin-bottom: 20px;
        }

        td,
        th,
        thead {
            border: black solid 2px;
        }

        td {
            height: 50px;
            color: rgb(8, 129, 204);
            font-size: 20px;
        }

        thead,
        tbody th {
            background-color: rgb(26, 86, 237);
            color: white;
        }
    </style>
</head>

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

                <li class="submenu active">
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
                        <h3 class="page-title">Classes</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Classe</a>
                            </li>
                            <li class="breadcrumb-item active">Liste des Classes</li>
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
                            <table class="border-0 table-hover mx-auto">
                                <tr>
                                    <thead>
                                        <th>La liste des classes</th>
                                    </thead>
                                </tr>

                                <tbody>
                                    <?php
                                    foreach ($classes as $classe) { ?>
                                        <tr>
                                            <td>
                                                <form action="index.php?action=student_in_same_class" method="post">
                                                    <input type="hidden" name="class_id" value="<?= $classe['class_id']; ?>">
                                                    <button type="submit" style="width: 100%;border:none;background-color:#fff;color:blue;"><a><?= $classe['class_name']; ?></a></button>
                                                </form>
                                            </td>
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