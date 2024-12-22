<?php
$title = "Admin | Profile";
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


                <li>
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
                    <h3 class="page-title">Page Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php?action=dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
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
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="User Image" src="assets/admins/<?= $profil_admin["image_path"] ?>">
                            </a>
                        </div>
                        <div class="col ms-md-n2 profile-user-info">
                            <h4 class="user-name mb-1"><?= $profil_admin["firstname"] . " " . $profil_admin["lastname"]; ?></h4>
                            <h6 class="text-muted">Administrateur</h6>
                            <div class="user-Location"><i class="fas fa-map-marker-alt" style="margin-right:5px"></i>Localisation de ENSAJ : Route d'Azemmour, Nationale N°1, ELHAOUZIA
                                BP : 5096 El Jadida</div>
                        </div>

                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">À propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Password</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <div class="tab-pane fade show active" id="per_details_tab">

                        <div class="row">
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between mb-3">
                                            <span>Modifier Profile</span>
                                            <!-- <a class="edit-link" data-bs-toggle="modal" href="#edit_personal_details"><i class="far fa-edit me-1"></i>Edit</a> -->
                                        </h5>
                                        <form action="index.php?action=edit_profil" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="admin_id" value="<?= $profil_admin["prof_id"]; ?>">
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">Prénom</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="firstname" value="<?= $profil_admin["firstname"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">Nom</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="lastname" value="<?= $profil_admin["lastname"]; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">Email</label>
                                                <div class="col-md-10">
                                                    <input type="email" class="form-control" name="email" value="<?= $profil_admin["email"]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">Téléphone</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="phone" value="<?= $profil_admin["phone_number"]; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">Image</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="file" name="image_admin" accept="image/*">
                                                </div>
                                            </div>
                                            <button type="submit" name="edit" class="btn btn-primary">Modifier</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-5">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between mb-3">
                                            <span>Votre informations</span>
                                            <a class="edit-link" href="#"><i class="far fa-user me-1"></i></a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Nom</p>
                                            <p class="col-sm-9"><?= $profil_admin["firstname"] . " " . $profil_admin["lastname"]; ?></p>
                                        </div>

                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Email</p>
                                            <p class="col-sm-9"><a href="#"><?= $profil_admin["email"] ?></a></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Télé</p>
                                            <p class="col-sm-9"><?= $profil_admin["phone_number"]; ?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>


                    <div id="password_tab" class="tab-pane fade">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Partie Confidentielle</h5>
                                <div class="row">
                                    <div class="col-md-10 col-lg-6">
                                        <form action="index.php?action=part_pass" method="post">
                                            <input type="hidden" name="admin_id" value="<?= $profil_admin["prof_id"]; ?>">
                                            <div class="form-group">
                                                <label>Ancien Mot de passe</label>
                                                <input type="password" class="form-control" name="old_password">
                                            </div>
                                            <div class="form-group">
                                                <label>Nouveau Mot de passe</label>
                                                <input type="password" class="form-control" name="new_password">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirmation de Mot de passe</label>
                                                <input type="password" class="form-control" name="confirm_password">
                                            </div>
                                            <button class="btn btn-primary" name="modifier" type="submit">Modifier</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require_once "views/admin/components/layout.php"; ?>