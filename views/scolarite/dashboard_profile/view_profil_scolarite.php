<?php
$title = "Scolarité | Profile";
ob_start();

?>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li>
                    <a href="index.php?action=scolarite_dashboard"><i class="feather-grid"></i> <span> Dashboard</span></a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-hand-holding"></i> <span>Demande</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=all_school_certificate">Attestation Scolaire</a></li>
                        <li><a href="index.php?action=all_temporarily_withdrawn">Retiré Provisoirement</a></li>
                        <li><a href="index.php?action=all_internship_agreement">Convention de Stage </a></li>
                        <li><a href="index.php?action=all_marks_requests">Relvé de notes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?action=absence_list"><i class="fas fa-book-reader"></i> <span>Liste D'absence</span></a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-list-ul"></i><span>Gestion D'absence</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=abs_statistique">Statistique</a></li>
                        <li><a href="index.php?action=generate_absence_list">Enregistrer l'absence</a></li>
                        <li><a href="index.php?action=edit_student_absence">Modifier l'absence</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?action=scolarite_planning"><i class="fas fa-calendar"></i> <span>Planning</span></a>
                </li>

                <li>
                    <a href="index.php?action=logout_users"><i class="fas fa-sign-out-alt"></i> <span>Déconnexion</span></a>
                </li>

            </ul>
        </div>
    </div>
</div>






<div class="page-wrapper">
    <?php
    if (isset($_POST['status']) && $_POST['status'] != "null") {
        if ($_POST['status'] == 1) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Message: </strong> <?= $_POST['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } else { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Message :</strong> <?= $_POST['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php }
    } ?>
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Page Profile </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?action=scolarite_dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Page Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="student-profile-head">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="profile-user-box d-flex justufy-content-center align-items-center">
                                        <div class="profile-user-img" style="top: 1px;">
                                            <img src="assets/scolarites/<?= $result['image_path']; ?>" alt="Profile" style="width: 141px !important;height: 142px !important;">
                                        </div>
                                        <div class="names-profiles">
                                            <h4><?= $result['firstname'] . "  " . $result['lastname']; ?></h4>
                                            <h5>Scolarité</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                    <div class="follow-btn-group">
                                        <a class="btn btn-info follow-btns" href="index.php?action=scolarite_dashboard">Allez à Dashboard</a>
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
                                            <h5><?= $result['firstname'] . "  " . $result['lastname']; ?></h5>
                                        </div>
                                    </div>

                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-phone-call"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Télephone</h4>
                                            <h5><?= $result['phone_number']; ?></h5>
                                        </div>
                                    </div>
                                    <div class="personal-activity">
                                        <div class="personal-icons">
                                            <i class="feather-mail"></i>
                                        </div>
                                        <div class="views-personal">
                                            <h4>Email</h4>
                                            <h5 style="color:blue"><?= $result['email']; ?></h5>
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
                                    <form action="index.php?action=update_profile_action" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="scolarite_id" value="<?= $result['employee_id']; ?>" required>
                                        <input class="form-control" type="hidden" name="old_img_path" value="<?= $result['image_path']; ?>" required>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Nom</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="lastname" value="<?= $result['lastname']; ?>" required>
                                            </div>
                                            <label class="col-form-label col-md-2">Prénom</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="firstname" value="<?= $result['firstname']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Email</label>
                                            <div class="col-md-10">
                                                <input type="email" class="form-control" name="email" value="<?= $result['email']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Téléphone</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="phone_number" value="<?= $result['phone_number']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-2">Image</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" name="image_scolarite" accept="image/*">
                                            </div>
                                        </div>
                                        <button type="submit" name="edit" class="btn btn-primary mb-4">Modifier</button>

                                    </form>

                                    <div class="heading-detail">
                                        <h4 style="border-bottom: 2px solid rgb(27, 106, 244);padding-bottom: 5px;padding-top: 5px;">Partie Confidentielles</h4>
                                    </div>
                                    <form action="index.php?action=update_password_scolarite" method="post">
                                        <input type="hidden" name="scolarite_id" value="<?= $result['employee_id']; ?>" required>
                                        <div class="form-group">
                                            <label>Nouveau Mot de passe</label>
                                            <input type="password" class="form-control" name="new_password">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirmation de Mot de passe</label>
                                            <input type="password" class="form-control" name="confirm_password">
                                        </div>
                                        <button type="submit" name="edit_pass" class="btn btn-primary" id="check_password">Modifier</button>
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
<script>
    var submit_botton = document.getElementById("check_password");
    submit_botton.addEventListener("click", function(e) {
        var password = document.getElementsByName("new_password")[0].value;
        var confirm_password = document.getElementsByName("confirm_password")[0].value;
        if (password != confirm_password) {
            alert("Le mot de passe et la confirmation ne sont pas identiques");
            e.preventDefault();
        }
    });
</script>

<?php $content = ob_get_clean(); ?>
<?php require_once("views/scolarite/components/layout.php"); ?>