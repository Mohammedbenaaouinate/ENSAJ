<?php
$title = "Scolarité | Voir Les informations";
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
                <li class="submenu active">
                    <a href="#"><i class="fas fa-hand-holding"></i> <span>Demande</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=all_school_certificate" class="active">Attestation Scolaire</a></li>
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
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Demandes</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php?action=all_school_certificate">Demandes</a>
                            </li>
                            <li class="breadcrumb-item active">Tous les Demandes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Demandes</h3>
                                </div>
                            </div>
                        </div>

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
                                                $months = [
                                                    "1" => "Janvier", "2" => "Février", "3" => "Mars", "4" => "Avril", "5" => "Mai", "6" => "Juin",
                                                    "7" => "Juillet", "8" => "Août", "9" => "Septembre", "10" => "Octobre", "11" => "Novembre", "12" => "Décembre"
                                                ];
                                                $mounth_number = date("n");
                                                foreach ($months as $key => $value) {
                                                    if ($key == $mounth_number) {
                                                        $french_menth = $months[$key];
                                                    }
                                                }
                                                $french_day = date("d");
                                                $french_year = date("Y");
                                                $date = $french_day . " " . $french_menth . " " . $french_year;
                                                echo $date;
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
    <div style="padding: 17px 0;background: #fff;text-align: center;" class="mb-2">
        <form action="index.php?action=print_update_status" method="post">
            <input type="hidden" name="service_id" value="<?= $service_id; ?>">
            <input type="hidden" name="approved_date" value="<?= $date; ?>">
            <button type="submit" class="btn btn-primary btn-lg" style="width: 50%;" id="imprimer_certificat"> <span class="me-3"><i class="fa fa-print"></i></span>Imprimer</button>
        </form>
    </div>

    <footer>
        <p>ECOLE NATIONALE DES SCIENCES APPLIQUEES El JADIDA</p>
    </footer>
</div>

<?php
$content = ob_get_clean();
require("views/scolarite/components/layout.php");
?>