<?php
$title = "Professeur | Profile";
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

                <li>
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
                        <h3 class="page-title">Page Profile </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?action=dashboard_prof">Dashboard</a></li>
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
                                            <img style="height: 160px;" src="assets/teachers/<?= $profil_prof["image_path"] ?>" alt="Profile">

                                        </div>
                                        <div class="names-profiles">
                                            <h4><?= $profil_prof["firstname"] . " " . $profil_prof["lastname"] ?></h4>
                                            <h5>Professeur</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                    <div class="follow-btn-group">
                                        <a class="btn btn-info follow-btns" href="index.php?action=dashboard_prof">Allez à Dashboard</a>
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
                                            <h5><?= $profil_prof["firstname"] . " " . $profil_prof["lastname"] ?></h5>
                                        </div>
                                    </div>

                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-phone-call"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Télephone</h4>
                                            <h5><?= $profil_prof["phone_number"] ?></h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-mail"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Email</h4>
                                            <h5 style="color:blue"><?= $profil_prof["email"] ?></h5>
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
                                    <form action="index.php?action=edit_profil_prof" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="prof_id" value="<?= $profil_prof["prof_id"] ?>">
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Prénom</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="firstname" value="<?= $profil_prof["firstname"] ?>">
                                            </div>
                                            <label class="col-form-label col-md-1">Nom</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="lastname" value="<?= $profil_prof["lastname"] ?>">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Email</label>
                                            <div class="col-md-10">
                                                <input type="email" class="form-control" name="email" value="<?= $profil_prof["email"] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Téléphone</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="phone" value="<?= $profil_prof["phone_number"] ?>">
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
                                    <form action="index.php?action=edit_pass_prof" method="post">
                                        <input type="hidden" name="prof_id" value="<?= $profil_prof["prof_id"] ?>">

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
<?php require_once("views/admin/components/layout_prof.php") ?>