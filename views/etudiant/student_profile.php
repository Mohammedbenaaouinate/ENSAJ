<?php
$title = "Etudiant | Profile";
ob_start();
?>

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-hand-holding"></i> <span>Demande</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=student_attestation_scolarite">Attestation Scolaire</a></li>
                        <li><a href="index.php?action=student_retrait_provisoire">Retiré Provisoirement</a></li>
                        <li><a href="index.php?action=student_convention_stage">Convention de Stage </a></li>
                        <li><a href="index.php?action=student_relve_note">Relvé de notes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?action=courses"><i class="fas fa-book"></i> <span>Cours</span></a>
                </li>
                <li>
                    <a href="index.php?action=student_list"><i class="fas fa-list"></i> <span>Liste des étudiants</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-book"></i> <span>Bouquins</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=all_books">Tous les bouquins</a></li>
                        <li><a href="index.php?action=request_books">Mes Demandes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?action=show_schedule_student"><i class="fas fa-calendar-day"></i> <span>Emploi du Temps</span></a>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fas fa-calendar-week"></i> <span>Planning du DS</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=student_planning_ds_normale">SESSION NORMALE</a></li>
                        <li><a href="index.php?action=student_planning_ds_ratt">SESSION RATTRAPAGE</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?action=student_planning_annuelle"><i class="fas fa-calendar"></i> <span>Planning Annuel</span></a>
                </li>
                <li>
                    <a href="index.php?action=Myresume"><i class="fas fa-file"></i> <span>Mon CV</span></a>
                </li>
                <li>
                    <a href="index.php?action=viewMyLinkden"><i class="fab fa-linkedin"></i><span>Mon Linkedin</span></a>
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
                <div class="col">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Profile</a></li>
                        <li class="breadcrumb-item active">Modifier Profile</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="User Image" src="assets/students/<?= $student['image_path']; ?>">
                            </a>
                        </div>
                        <div class="col ms-md-n2 profile-user-info">
                            <h4 class="user-name mb-0"><?= $student['firstname'] . "  " . $student['lastname']; ?></h4>
                            <div class="user-Location"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;<?= $student['student_adress']; ?></div>
                        </div>
                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Mot de passe </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#edit_tab">Modifier</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <div class="tab-pane fade show active" id="per_details_tab">

                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Information Personnelle</span>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Nom:</p>
                                            <p class="col-sm-9"><?= $student['lastname']; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Prenom:</p>
                                            <p class="col-sm-9"><?= $student['firstname']; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Code Massar:</p>
                                            <p class="col-sm-9"><?= $student['massar_student']; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Code Apogée:</p>
                                            <p class="col-sm-9"><?= $student['student_apoge']; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Email:</p>
                                            <p class="col-sm-9"><?= $student['email']; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">CIN:</p>
                                            <p class="col-sm-9"><?= $student['cin_student']; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Classe:</p>
                                            <?php
                                            $class_year = explode(" ", $student['class_year']);
                                            ?>
                                            <p class="col-sm-9"><?= $class_year[1]; ?>ème Année <?= $student['fullname']; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Date de Naissance:</p>
                                            <p class="col-sm-9"><?= $student['birth_date']; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Nationalité:</p>
                                            <p class="col-sm-9"><?= $student['nationality']; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Téléphone:</p>
                                            <p class="col-sm-9"><?= $student['phone_number']; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Sexe:</p>
                                            <p class="col-sm-9"><?= $student['sexe']; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Adresse:</p>
                                            <p class="col-sm-9 mb-0"><?= $student['student_adress']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div id="password_tab" class="tab-pane fade">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Modifier le mot de passe</h5>
                                <div class="row">
                                    <div class="col-md-10 col-lg-6">
                                        <form action="index.php?action=update_password_student_action" method="post">
                                            <div class="form-group">
                                                <label>Mot de passe</label>
                                                <input type="password" class="form-control" name="password" id="password">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirmer le mot de passe</label>
                                                <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                                            </div>
                                            <button class="btn btn-primary" type="submit" id="change_password">Modifier </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div id="edit_tab" class="tab-pane fade">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Information Personnelle</h5>
                                <div class="row">
                                    <div class="col-md-10 col-lg-6">
                                        <form action="index.php?action=update_student_personal_information_action" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label style="display: inline-block;">Date de Naissance <span class="login-danger">*</span></label>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <input class="form-control" name="birth_date" type="date" placeholder="DD-MM-YYYY" value="<?= $student['birth_date']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Sexe&nbsp;<span class="login-danger">*</span></label>
                                                <div class="col-lg-12">
                                                    <select class="form-control form-select" name="sexe" required>
                                                        <option value="">Sexe</option>
                                                        <?php
                                                        $sexes = ["Homme", "Femme"];
                                                        foreach ($sexes as $sexe) {
                                                            if ($sexe == $student['sexe']) {
                                                                echo '<option value="' . $sexe . '" selected>' . $sexe . "</option>";
                                                            } else {
                                                                echo '<option value="' . $sexe . '">' . $sexe . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Nationalité&nbsp;<span class="login-danger">*</span></label>
                                                <input type="text" name="nationality" class="form-control" value="<?= $student['nationality']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Numéro de Téléphone &nbsp;<span class="login-danger">*</span></label>
                                                <input type="text" name="phone_number" class="form-control" value="<?= $student['phone_number']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Adresse&nbsp;<span class="login-danger">*</span></label>
                                                <input type="text" name="student_adress" class="form-control" value="<?= $student['student_adress']; ?>" required>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div class="form-group students-up-files">
                                                    <label>Choisir une image</label>
                                                    <div class="uplod">
                                                        <label class="file-upload image-upbtn mb-0">
                                                            Choose File <input type="file" name="student_img" />
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="old_path" class="form-control" value="<?= $student['image_path']; ?>" required>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Modifier</button>
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
<footer>
    <p>ECOLE NATIONALE DES SCIENCES APPLIQUEES El JADIDA</p>
</footer>
<script>
    let btn_submit = document.getElementById("change_password");
    btn_submit.addEventListener("click", function(e) {

        let password = document.getElementById("password").value;
        let password_confirm = document.getElementById("confirm_password").value;
        if (password != password_confirm) {
            e.preventDefault();
            alert("Le mot de passe et sa confirmation ne sont pas identiques.");
        }
    });
</script>


<?php
$content = ob_get_clean();
require("views/etudiant/components/layout.php");
?>