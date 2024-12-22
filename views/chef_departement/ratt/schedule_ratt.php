<?php
$title = "Chef Département | Rattrapage";
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

                    <li class="submenu active">
                        <a href="#"><i class="fa fa-list-alt"></i> <span>Planning exams</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="index.php?action=schedule_exam">Session normale</a></li>
                            <li class="active"><a href="index.php?action=schedule_ratt">Session Rattrapage</a></li>
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
                        <h3 class="page-title">Gestion des Emplois</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?action=schedule_ratt">Session rattrapage</a></li>
                            <li class="breadcrumb-item active">Liste des Emplois</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <p class="text-center fw-bold mb-3"> <i class="fa fa-exclamation-triangle me-2"></i>Avant de passer à l'autre semestre il faut vider les emplois de la premiere semestre :</p>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Gestion des Emplois des examens(SESSION RATTRAPAGE)</h5>
                        </div>
                        <div class="card-body">
                            <?php if ($name_department["short_name"] == "STIN") { ?>

                                <div class="section-title text-center filiere">CIP</div>
                                <table class=" border-0 table-hover mx-auto">
                                    <tr>
                                        <thead>
                                            <th>1ère Semestre </th>
                                            <th>2ème Semestre</th>

                                        </thead>
                                    </tr>
                                    <tbody>
                                        <tr>
                                            <td><a href="index.php?action=schedule_table_normal&classe=CIP-1&semestre=S1-CP">1ère année</a></td>
                                            <td><a href="index.php?action=schedule_table_normal&classe=CIP-1&semestre=S2-CP">1ère année</a></td>

                                        </tr>
                                        <tr>
                                            <td><a href="index.php?action=schedule_table_normal&classe=CIP-2&semestre=S3-CP">2ème année</a></td>
                                            <td><a href="index.php?action=schedule_table_normal&classe=CIP-2&semestre=S4-CP">2ème année</a></td>

                                        </tr>

                                    </tbody>
                                </table>
                            <?php } ?>

                            <?php foreach ($list_specialisation as $spec) { ?>
                                <div class="section-title text-center filiere">Filière <?php echo $spec["short_name"]; ?></div>
                                <table class=" border-0 table-hover mx-auto ">
                                    <tr>
                                        <thead>
                                            <th>1ère Semestre </th>
                                            <th>2ème Semestre</th>

                                        </thead>
                                    </tr>
                                    <tbody>
                                        <tr>
                                            <td><a href="index.php?action=schedule_table_ratt&classe=<?php echo $spec["short_name"]; ?>-1&semestre=S1-CI">1ère année</a></td>
                                            <td><a href="index.php?action=schedule_table_ratt&classe=<?php echo $spec["short_name"]; ?>-1&semestre=S2-CI">1ère année</a></td>

                                        </tr>
                                        <tr>
                                            <td><a href="index.php?action=schedule_table_ratt&classe=<?php echo $spec["short_name"]; ?>-2&semestre=S3-CI">2ème année</a></td>
                                            <td><a href="index.php?action=schedule_table_ratt&classe=<?php echo $spec["short_name"]; ?>-2&semestre=S4-CI">2ème année</a></td>

                                        </tr>
                                        <tr>
                                            <td><a href="index.php?action=schedule_table_ratt&classe=<?php echo $spec["short_name"]; ?>-3&semestre=S5-CI">3ème année</a></td>
                                            <td></td>

                                        </tr>
                                    </tbody>
                                </table>
                            <?php } ?>


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