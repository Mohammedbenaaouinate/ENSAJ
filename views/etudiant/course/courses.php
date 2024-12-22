<?php
$title = "Etudiant | Courses";
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
                <li class="submenu active">
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
    <div class="content container-fluid">
        <div class="row">
            <?php foreach ($modules as $module) {  ?>
                <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                    <div class="blog grid-blog flex-fill">
                        <div class="blog-image">
                            <a href="#"><img style="height: 200px;" class="img-fluid" src="assets/course/images/<?= $module['file_image']; ?>" alt="Post Image"></a>
                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="#">
                                            <img src="assets/teachers/<?= $module['image_path']; ?>" alt="Post Author">
                                            <span>
                                                <span class="post-title"><?= $module['firstname'] . "  " . $module['lastname']; ?></span>
                                                <span class="post-date"><i class="far fa-clock"></i> &nbsp;&nbsp;<?= $module['date_pub']; ?></span>
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <p class="blog-title">Module:<?= $module['modul_name']; ?></p>
                            <h3 class="blog-title"><?= $module['course_name']; ?></h3>
                        </div>
                        <div class="row mt-4">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="edit-delete-btn">
                                    <form action="index.php?action=read_course_pdf" method="post" target="_blank">
                                        <input type="hidden" name="course_path" value="<?= $module['file_course']; ?>">
                                        <button type="submit" class="btn btn-primary p-2"><i class="fas fa-eye"></i> Voir le cours</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php foreach ($elements as $element) {  ?>
                <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                    <div class="blog grid-blog flex-fill">
                        <div class="blog-image">
                            <a href="#"><img style="height: 200px;" class="img-fluid" src="assets/course/images/<?= $element['file_image']; ?>" alt="Post Image"></a>
                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="#">
                                            <img src="assets/teachers/<?= $element['image_path']; ?>" alt="Post Author">
                                            <span>
                                                <span class="post-title"><?= $element['firstname'] . "  " . $element['lastname']; ?></span>
                                                <span class="post-date"><i class="far fa-clock"></i> &nbsp;&nbsp;<?= $element['date_pub']; ?></span>
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <p class="blog-title">Elément:<?= $element['element_name']; ?></p>
                            <h3 class="blog-title"><?= $element['course_name']; ?></h3>
                        </div>
                        <div class="row mt-4">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="edit-delete-btn">
                                    <form action="index.php?action=read_course_pdf" method="post" target="_blank">
                                        <input type="hidden" name="course_path" value="<?= $element['file_course']; ?>">
                                        <button type="submit" class="btn btn-primary p-2"><i class="fas fa-eye"></i> Voir le cours</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <footer>
        <p>ECOLE NATIONALE DES SCIENCES APPLIQUEES El JADIDA</p>
    </footer>
</div>


<?php
$content = ob_get_clean();
require("views/etudiant/components/layout.php");
?>