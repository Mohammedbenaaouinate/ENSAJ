<?php
$title = "Admin | Classe";
ob_start();
?>

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
                <li class="submenu active">
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
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Classes</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php?action=class">Classe</a></li>
                        <li class="breadcrumb-item active">Liste des Classes</li>
                    </ul>
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
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Liste des Classes</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="index.php?action=show_add_class" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>Nom Classe</th>
                                        <th>Nombre Etudiant</th>
                                        <th>Responsable de la classe</th>
                                        <th>Responsable email</th>
                                        <th> Responsable Téléphone</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list as $result) { ?>
                                        <tr>
                                            <td>
                                                <h2>
                                                    <a><?php echo $result["class_name"]; ?></a>
                                                </h2>
                                            </td>
                                            <td><?php echo $result["number_student"]; ?></td>
                                            <td><?php echo $result["firstname"] . " " . $result["lastname"]; ?></td>
                                            <td>
                                                <a href="mailto:<?php echo $result["email"] ?>" style="color:#2e86de; font-weight:bold;"><?php echo $result["email"] ?>
                                                </a>
                                            </td>
                                            <td><?php echo $result["phone_number"]; ?></td>

                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="index.php?action=show_edit_class&id=<?php echo $result["class_id"]; ?>" class="btn btn-sm bg-success-light me-2">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <a onclick="confirmDelete(<?php echo $result['class_id']; ?>)" href="#" class="btn btn-sm bg-danger-light">
                                                        <i class="feather-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                            <script>
                                function confirmDelete(id) {
                                    if (confirm("Êtes-vous sûr de vouloir supprimer cette Classe ?")) {
                                        window.location.href = 'index.php?action=delete_class&id=' + id;
                                    }
                                }
                            </script>
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
<?php require_once "views/admin/components/layout.php"; ?>