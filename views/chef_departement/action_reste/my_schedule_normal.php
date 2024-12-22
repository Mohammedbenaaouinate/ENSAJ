<?php
$title = "Chef Département | votre emploi";
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

        button {
            width: 100%;
        }

        .filiere {
            font-size: 24px;
            color: rgb(0, 0, 0);
            margin-bottom: 1px;
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

                    <li class="submenu active">
                        <a href="#"><i class="fa fa-user"></i> <span>Vos emplois</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="index.php?action=user_emploi">Horraire Travail</a></li>
                            <li class="active"><a href="index.php?action=user_emploi_normal">Emploi de Session normale</a></li>
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
                    <li>
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
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Visualiser vos Emplois</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?action=user_emploi_normal">Vos emplois</a></li>
                            <li class="breadcrumb-item active">Liste des Emplois</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Vos emploi de temps de la session normale</h5>
                        </div>
                        <div class="card-body">
                            <table class=" border-0 table-hover mx-auto">
                                <tr>
                                    <thead>
                                        <th>Liste de vos emplois</th>
                                    </thead>
                                </tr>

                                <tbody>
                                    <?php foreach ($list_shown as $list) { ?>

                                        <tr>
                                            <td><a href="index.php?action=show_my_schedule_normal&classe=<?= $list["class_name"] ?>&semestre=<?= $list["semester_name"] ?>"><?= $list["class_name"] . " <b>|</b> " . $list["semester_name"] ?></a></td>

                                        </tr>
                                    <?php } ?>

                                </tbody>

                            </table>

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