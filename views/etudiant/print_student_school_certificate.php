<?php
$title = "Student  | Print My School Certificate";
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
                        <li><a href="index.php?action=student_attestation_scolarite" class="active">Attestation Scolaire</a></li>
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
                <li>
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
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body d-flex justify-content-center p-2">
                        <div id="scholl_certificate">
                            <div class="row">
                                <div class="d-flex justify-content-between align-items-center flex-wrap header-certificat mb-2">
                                    <div class="mb-2">
                                        <!-- style="width: 190px; height: 83px;" -->
                                        <img src="assets/img/logo_ensaj_scolarite.png" style="width: 150px; height: 70px;">
                                    </div>
                                    <div id="header_paragraphe">
                                        <p>UNIVERSITE CHOUAIB DOUKKALI<br>ECOLE NATIONALE DES SCIENCES <br> APPLIQUEES D'EL JADIDA</p>
                                    </div>
                                    <div class="mb-2">
                                        <img style="width: 150px; height: 70px;" src="assets/img/logo_universite_scolarite.png">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h1 id="certificate_title">CERTIFICAT DE SCOLARITE</h1>
                                <p class="mt-5" id="start_para">
                                    <b>L</b>e Directeur de l'Ecole Nationale des Sciences Appliquées d'El Jadida
                                    (ENSAJ), soussigné, atteste que :
                                </p>
                                <div class="mt-4" id="student_information">
                                    <div class="row">
                                        <div class="col-lg-2 offset-lg-3 col-md-2 offset-md-3  offset-sm-2 col-sm-2">
                                            <p class="sm-text-center">L'élève</p>
                                        </div>
                                        <?php
                                        ?>
                                        <!-- $student_info -->
                                        <div class="col-lg-7 col-md-7 col-sm-8">
                                            <p><b style="text-transform: uppercase;">:&nbsp; <?= $student_info['firstname'] . "  " . $student_info['lastname']; ?></b></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 offset-lg-3 col-md-2 offset-md-3  offset-md-3 offset-sm-2 col-sm-2">
                                            <p class="sm-text-center">CNE</p>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-8">
                                            <p><b style="text-transform: uppercase;">:&nbsp;<?= $student_info['massar_student']; ?></b></p>
                                        </div>
                                    </div>
                                    <div class="row mt-4" style="text-align: justify;">
                                        <p style="line-height:40px;">Est inscrit(e) en
                                            <b>
                                                <?php
                                                $exp_student_class = explode(" ", $student_info['class_year']);
                                                $year = $exp_student_class[1];
                                                $number_to_text = ["1" => "Première", "2" => "Deuxième", "3" => "Troisième", "4" => "Quatrième", "5" => "Cinquième"];
                                                foreach ($number_to_text as $key => $value) {
                                                    if ($key == $year)
                                                        echo $number_to_text[$key];
                                                }
                                                ?>
                                            </b>année
                                            de la filière
                                            <b><?= $student_info['fullname']; ?></b>
                                            au titre de l'année universitaire
                                            <?php
                                            $mounth_number = date("n");
                                            if ($mounth_number >= 1 && $mounth_number < 9) {
                                                echo "<b>" . (date('Y') - 1) . "/" . date('Y') . "</b>,";
                                            } else {
                                                echo "<b>" . date('Y') . "/" . (date('Y') + 1) . "</b>,";
                                            }
                                            ?>
                                            et poursuit ses
                                            études à l'Ecole Nationale des Sciences Appliquées.
                                        </p>
                                        <p class="mt-4" style="text-align: end;">Fait à El Jadida, Le :
                                            <b>
                                                <?php
                                                echo $student_info['approved_date'];
                                                ?>
                                            </b>
                                        </p>
                                    </div>
                                    <div id="school_certificate_footer">
                                        <p class="mt-2 text-center">
                                            Avis Important : Il ne peut être délivré qu'un seul exemplaire du présent certificat de scolarité.
                                            Aucun duplicata ne sera fourni.
                                        </p>
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
</div>

<?php
$content = ob_get_clean();
require("views/etudiant/components/layout.php");
?>