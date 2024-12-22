<?php
$title = "Chef Département | Profile";
ob_start();

?>

<head>
    <style>

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
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Page Profile </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?action=dashboard_chef">Dashboard</a></li>
                            <li class="breadcrumb-item active">Page Profile</li>
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
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="about-info">
                            <h4>Profile <span><a href="javascript:;"></a></span></h4>
                        </div>
                        <div class="student-profile-head">
                            <div class="profile-bg-img">
                                <img src="assets/img/profile-bg.jpg" alt="Profile">
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="profile-user-box">
                                        <div class="profile-user-img">
                                            <img style="height: 160px;" src="assets/teachers/<?= $profil_chef["image_path"] ?>" alt="Profile">

                                        </div>
                                        <div class="names-profiles">
                                            <h4><?= $profil_chef["firstname"] . " " . $profil_chef["lastname"] ?></h4>
                                            <h5>Chef de Département</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                    <div class="follow-btn-group">
                                        <a class="btn btn-info follow-btns" href="index.php?action=dashboard_chef">Allez à Dashboard</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-lg-4">
                        <div class="student-personals-grp">
                            <div class="card">
                                <div class="card-body">
                                    <div class="heading-detail">
                                        <h4>Informations personnelles :</h4>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-user"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Nom complet</h4>
                                            <h5><?= $profil_chef["firstname"] . " " . $profil_chef["lastname"] ?></h5>
                                        </div>
                                    </div>

                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-phone-call"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Télephone</h4>
                                            <h5><?= $profil_chef["phone_number"] ?></h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-mail"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Email</h4>
                                            <h5 style="color:blue"><?= $profil_chef["email"] ?></h5>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="student-personals-grp">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="heading-detail">
                                        <h4 style="border-bottom: 2px solid rgb(27, 106, 244);padding-bottom: 5px;">Modifier profile</h4>
                                    </div>
                                    <form action="index.php?action=edit_profil_chef" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="prof_id" value="<?= $profil_chef["prof_id"] ?>">
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Prénom</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="firstname" value="<?= $profil_chef["firstname"] ?>">
                                            </div>
                                            <label class="col-form-label col-md-1">Nom</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="lastname" value="<?= $profil_chef["lastname"] ?>">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Email</label>
                                            <div class="col-md-10">
                                                <input type="email" class="form-control" name="email" value="<?= $profil_chef["email"] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Téléphone</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="phone" value="<?= $profil_chef["phone_number"] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Image</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" name="image_chef" accept="image/*">
                                            </div>
                                        </div>
                                        <button type="submit" name="edit" class="btn btn-primary mb-4">Modifier</button>

                                    </form>

                                    <div class="heading-detail">
                                        <h4 style="border-bottom: 2px solid rgb(27, 106, 244);padding-bottom: 5px;padding-top: 5px;">Partie Confidentielles</h4>
                                    </div>
                                    <form action="index.php?action=edit_pass_chef" method="post">
                                        <input type="hidden" name="prof_id" value="<?= $profil_chef["prof_id"] ?>">

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


                                        <button type="submit" name="edit_pass" class="btn btn-primary">Modifier</button>
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
<?php require_once("views/admin/components/layout_chef.php") ?>