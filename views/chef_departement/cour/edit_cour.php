<?php
$title = "Cour | Editer Cour";
ob_start();
?>

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

                <li class="submenu active">
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
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Modifier Cours</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php?action=upload_cour">Cours</a></li>
                        <li class="breadcrumb-item active">Modifier Cours</li>
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
                <div class="card">
                    <div class="card-body">
                        <form action="index.php?action=edit_cour" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Modifier un cour</span></h5>
                                </div>
                                <input type="hidden" name="course_id" value="<?= $one_course["id_cour"] ?>">
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nom de cour<span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" name="name_cour" value="<?= $one_course["course_name"] ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Classe <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="classe">
                                            <?php foreach ($lists_classes as $class) { ?>
                                                <?php if ($one_course["class_name"] == $class["class_name"]) { ?>
                                                    <option selected value="<?php echo $class["classe"] ?>"><?php echo $class["class_name"] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $class["classe"] ?>"><?php echo $class["class_name"] ?></option>
                                                <?php } ?>

                                            <?php } ?>


                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Semestre <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="semestre">
                                            <?php foreach ($lists_semester as $semestre) { ?>
                                                <?php if ($one_course["semester_name"] == $semestre["semester_name"]) { ?>
                                                    <option selected value="<?php echo $semestre["semester_id"] ?>"><?php echo $semestre["semester_name"] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $semestre["semester_id"] ?>"><?php echo $semestre["semester_name"] ?></option>
                                                <?php } ?>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Module/élément <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="module">
                                            <?php foreach ($list_modul_element as $modul_element) { ?>
                                                <?php if ($one_course["modul_name"] != "") { ?>
                                                    <?php if ($one_course["modul_name"] == $modul_element["modul_name"]) { ?>
                                                        <option selected value="<?= $modul_element["modul_code"]; ?>"><?= $modul_element["modul_name"]; ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $modul_element["modul_code"]; ?>"><?= $modul_element["modul_name"]; ?></option>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <?php if ($one_course["element_name"] == $modul_element["modul_name"]) { ?>
                                                        <option selected value="<?= $modul_element["modul_code"]; ?>"><?= $modul_element["modul_name"]; ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $modul_element["modul_code"]; ?>"><?= $modul_element["modul_name"]; ?></option>
                                                    <?php } ?>
                                                <?php } ?>



                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label for="cour">Cour <span class="login-danger">*</span></label>
                                        <input type="file" class="form-control" name="file_cour" id="cour" style="padding-top: 15px;">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label for="image_livre">Image pour le cour</label>
                                        <input type="file" class="form-control" name="image_cour" id="image_livre" style="padding-top: 15px;" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-3">
                                    <div class="form-group local-forms">
                                        <label>Status <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="status">
                                            <?php if ($one_course["status_cour"] == 1) { ?>
                                                <option value="1" selected>Activer</option>
                                                <option value="0">Désactiver</option>
                                            <?php } else { ?>
                                                <option value="1">Activer</option>
                                                <option value="0" selected>Désactiver</option>
                                            <?php } ?>



                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" name="btnedit_cour" class="btn btn-primary">Modifier</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require_once("views/admin/components/layout_chef.php") ?>