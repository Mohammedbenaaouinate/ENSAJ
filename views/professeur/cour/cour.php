<?php
$title = "Professeur | Cour";
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

                <li class="submenu active">
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

        <div class="row">
            <div class="col-md-9">
            </div>

            <div class="col-md-3 text-md-end">
                <a href="index.php?action=show_add_prof_cour" class="btn btn-primary btn-blog mb-3"><i class="feather-plus-circle me-1"></i> Ajouter Cours</a>
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
            <?php foreach ($lists_courses as $course) { ?>
                <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                    <div class="blog grid-blog flex-fill">
                        <div class="blog-image">
                            <a href="./assets/course/images/<?= $course["file_image"] ?>"><img style="height:250px" class="img-fluid" src="./assets/course/images/<?= $course["file_image"] ?>" ; alt="Post Image"></a>

                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <span>
                                        <?php if ($course["modul_name"] != "") { ?>
                                            <span class="post-title">Module:<?= $course["modul_name"] ?></span>

                                        <?php } else { ?>
                                            <span class="post-title">Element:<?= $course["element_name"] ?></span>
                                        <?php } ?>

                                        <span class="post-date"><i class="far fa-clock"></i><?= $course["date_pub"] ?></span>
                                    </span>
                                </li>
                            </ul>
                            <a href="./assets/course/course/<?= $course["file_course"] ?>"><button class="btn btn-primary btn-sm mb-2">Voir le cour</button></a>

                            <h3 class="blog-title"><a href=""><?= $course["course_name"] ?></a></h3>
                            <p>La classe:<?= $course["class_name"] ?> | Semestre=<?= $course["semester_name"] ?></p>
                        </div>
                        <div class="row">
                            <div class="edit-options">
                                <div class="edit-delete-btn">
                                    <a href="index.php?action=show_edit_course_prof&course_id=<?= $course["id_cour"] ?>" class="text-success"><i class="feather-edit-3 me-1"></i>Editer</a>
                                    <a style="cursor:pointer" onclick="Delete_course(<?= $course['id_cour'] ?>)" class="text-danger"><i class="feather-trash-2 me-1"></i>
                                        Supprimer</a>
                                </div>
                                <?php if ($course["status_cour"] == 1) { ?><!--Activer -->
                                    <div class="text-end inactive-style">
                                        <a href="javascript:void(0);" class="text-success"><i class="feather-eye me-1"></i>
                                            Active</a>
                                    </div>
                                <?php } else { ?>
                                    <div class="text-end inactive-style">
                                        <a href="javascript:void(0);" class="text-danger"><i class="feather-eye-off me-1"></i>
                                            Désactive</a>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>

        <script>
            function Delete_course($id) {
                if (confirm("Etes vous sur de vouloir supprimer ce cour?")) {
                    window.location.href = "index.php?action=delete_course_prof&course_id=" + $id
                }
            }
        </script>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require_once("views/admin/components/layout_prof.php") ?>