<?php
$title = "Admin | Rattrapage";
ob_start();
?>


<head>

    <style>
        table {
            text-align: center;
            border: 2px solid black;
            width:60%;
            margin-bottom: 20px;
        }

        td,
        th,
        thead {
            border: black solid 2px;
        }
        td{
            height: 50px;
            color:rgb(8, 129, 204);
            font-size:20px;
        }
        thead,
        tbody th {
            background-color: rgb(26, 86, 237);
            color: white;
        }

        button {
            width: 100%;
        }
        .filiere{
            font-size: 24px;
            color:rgb(0, 0, 0);
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
                    <span>Menu Principal</span>
                </li>
                <li class="submenu">
                    <a href="index.php?action=dashboard"><i class="feather-grid"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="index.php?action=dashboard">Admin Dashboard</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-user"></i> <span> Utilisateurs</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="index.php?action=head_of_school">Directeur</a> </li>
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
                <li >
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

                <li class="submenu active">
                    <a href="#"><i class="fa fa-list-alt"></i> <span>Planning exams</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=schedule_admin_classes_exam">Session normale</a></li>
                        <li><a href="index.php?action=schedule_admin_classes_ratt" class="active">Session Rattrapage</a></li>
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
                    <div class="col">
                        <h3 class="page-title">Gestion des Emplois</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?action=schedule_admin_classes_ratt">Session rattrapage</a></li>
                            <li class="breadcrumb-item active">Liste des Emplois</li>
                        </ul>
                    </div>
                </div>
            </div>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                             <p class="text-center fw-bold mb-3"> <i class="fa fa-exclamation-triangle me-2"></i>Avant de passer à l'autre semestre il faut vider les emplois de la premiere semestre  :</p>
                            
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Gestion des Emplois des examens(SESSION RATTRAPAGE)</h5>
                        </div>
                        <div class="card-body">
                       

                            <?php foreach($list_specialisation as $spec){?>
                            <div class="section-title text-center filiere">Filière <?php echo $spec["short_name"];?></div>
                                <table class=" border-0 table-hover mx-auto ">
                                        <tr>
                                            <thead>
                                                <th>1ère Semestre </th>
                                                <th>2ème Semestre</th>

                                            </thead>
                                        </tr>
                                        <tbody>
                                            <?php if($spec["short_name"]=="CP"){?>
                                                <tr>
                                                    <td><a href="index.php?action=show_view_schedule_for_admin_ratt&classe=CP-1&semestre=S1-CP">1ère année</a></td>
                                                    <td><a href="index.php?action=show_view_schedule_for_admin_ratt&classe=CP-1&semestre=S2-CP">1ère année</a></td>

                                                </tr>
                                                <tr>
                                                    <td><a href="index.php?action=show_view_schedule_for_admin_ratt&classe=CP-2&semestre=S3-CP">2ème année</a></td>
                                                    <td><a href="index.php?action=show_view_schedule_for_admin_ratt&classe=CP-2&semestre=S4-CP">2ème année</a></td>

                                                </tr>

                                            <?php }else{?>
                                                <tr>
                                                    <td><a href="index.php?action=show_view_schedule_for_admin_ratt&classe=<?php echo $spec["short_name"];?>-1&semestre=S1-CI">1ère année</a></td>
                                                    <td><a href="index.php?action=show_view_schedule_for_admin_ratt&classe=<?php echo $spec["short_name"];?>-1&semestre=S2-CI">1ère année</a></td>

                                                </tr>
                                                <tr>
                                                    <td><a href="index.php?action=show_view_schedule_for_admin_ratt&classe=<?php echo $spec["short_name"];?>-2&semestre=S3-CI">2ème année</a></td>
                                                    <td><a href="index.php?action=show_view_schedule_for_admin_ratt&classe=<?php echo $spec["short_name"];?>-2&semestre=S4-CI">2ème année</a></td>

                                                </tr>
                                                <tr>
                                                    <td><a href="index.php?action=show_view_schedule_for_admin_ratt&classe=<?php echo $spec["short_name"];?>-3&semestre=S5-CI">3ème année</a></td>
                                                    <td></td>

                                                </tr>
                                            <?php }?>


                                            
                                        </tbody>
                                </table> 
                                <?php }?>
       

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
    <?php require_once("views/admin/components/layout.php")?>
