<?php
$title = "Planning | Print";
ob_start();
?>


<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Menu Principal</span>
                </li>
                <li>
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


                <li class="submenu active">
                    <a href="#"><i class="fas fa-calendar-day"></i>
                        <span> planning </span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <a href="index.php?action=planning"> <span>Création</span></a>
                        <a href="index.php?action=print" class="active"><span>Evenements</span></a>
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
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">planning</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php?action=print">planning</a>
                        </li>
                        <li class="breadcrumb-item active">Imprimer</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row" id="print_planning">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row  align-items-center">
                            <div class="col-lg-3 col-md-12 col-sm-12">
                                <div class="d-flex justify-content-start align-items-center">
                                    <img src="assets/img/logo_planning.png" class="rounded float-start" style="height: 150px;">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12  col-sm-12">
                                <p class="text-center fw-bold mb-0">UNIVERSITÉ CHOUAÏB DOUKKALI, Ecole Nationale des Sciences Appliquées - El JADIDA</p>
                                <p class="text-center fw-bold mb-0">Planning des évenements de l'année universitaire
                                    <?php
                                    $mounth_number = date("n");
                                    if ($mounth_number >= 1 && $mounth_number < 8) {
                                        echo "<b>" . (date('Y') - 1) . "/" . date('Y') . "</b>";
                                    } else {
                                        echo "<b>" . date('Y') . "/" . (date('Y') + 1) . "</b>";
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12">
                                <div class="d-flex justify-content-end align-items-center">
                                    <img src="assets/img/logo_universite.png" class="rounded float-end" style="height: 150px;">
                                </div>
                            </div>
                        </div>

                        <div style="overflow-x: auto;margin: auto;">
                            <table class="table border">
                                <thead>
                                    <tr class="bg-secondary-subtle text-secondary-emphasis" style="background-color: #bdc3c7 !important;font-family: Arial, Helvetica, sans-serif;">
                                        <th scope="col" class="text-center" style="border: 1px solid black;padding: 20px;">Evénement</th>
                                        <th scope="col" class="text-center" style="border: 1px solid black;padding: 20px;">
                                            <div class="d-flex justify-content-center align-items-center">Description</div>
                                        </th>
                                        <th scope="col" class="text-center bg-white-50" style="border: 1px solid black;">Date de Début</th>
                                        <th scope="col" class="text-center" style="border: 1px solid black;">Date de Fin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($events as $event) {
                                        echo "<tr>";
                                        echo "<td style='border: 1px solid black;text-align:start;'>";
                                        echo $event['event_title'];
                                        echo "</td>";
                                        echo "<td style='border: 1px solid black;text-align:start;'>";
                                        echo $event['description'];
                                        echo "</td>";
                                        echo "<td style='border: 1px solid black;text-align:center;'>";
                                        $start = explode("-", $event['start_date']);
                                        echo $start[2] . "/" . $start[1] . "/" . $start[0];
                                        echo "</td>";
                                        echo "<td style='border: 1px solid black;text-align:center;'>";
                                        $end = explode("-", $event['end_date']);
                                        echo $end[2] . "/" . $end[1] . "/" . $end[0];
                                        echo "</td>";
                                        echo "</tr>";
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center mb-3">
        <button type="button" class="btn btn-primary w-50" id="print_button"><i class="fa fa-print me-3"></i> Imprimer</button>
    </div>
    <footer>
        <p>COPYRIGHT © 2024 ECOLE NATIONALE DES SCIENCES APPLIQUÉES EL JADIDA</p>
    </footer>
</div>
<?php
$content = ob_get_clean();
require("views/admin/components/layout.php");
?>