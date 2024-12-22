<?php
$title = "Scolarité | Retiré Provisoire ";
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
                        <li><a href="index.php?action=all_school_certificate">Attestation Scolaire</a></li>
                        <li><a href="index.php?action=all_temporarily_withdrawn" class="active">Retiré Provisoirement</a></li>
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
                                <a href="index.php?action=all_temporarily_withdrawn">Demandes</a>
                            </li>
                            <li class="breadcrumb-item active">ENGAGEMENT </li>
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


                        <div id="temporarily_withdrawn">
                            <div class="row">
                                <div class="d-flex justify-content-between align-items-center flex-wrap header-certificat mb-2">
                                    <div class="mb-2">
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
                                <h4 id="certificate_title"><u>ENGAGEMENT PROVISOIRE</u></h4>
                                <p class="mt-2" id="start_para"><b>Je </b>soussigné,</p>
                                <div class="mt-2" id="student_information">
                                    <!-- $student_info -->
                                    <div class="row">
                                        <div class="col-lg-3 offset-lg-2 col-md-2 offset-md-3  offset-sm-1 col-sm-3">
                                            <p class="sm-text-center">Nom et Prénom</p>
                                        </div>

                                        <div class="col-lg-7 col-md-7 col-sm-8">
                                            <p><b style="text-transform: uppercase;"> :&nbsp;<?= $student_info['firstname'] . " " . $student_info['lastname']; ?></b></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 offset-lg-2 col-md-2 offset-md-3  offset-md-3 offset-sm-1 col-sm-3">
                                            <p class="sm-text-center">C.I.N</p>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-8">
                                            <p><b style="text-transform: uppercase;">:&nbsp; <?= $student_info['cin_student']; ?></b></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 offset-lg-2 col-md-2 offset-md-3  offset-md-3 offset-sm-1 col-sm-3">
                                            <p class="sm-text-center">C.N.E</p>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-8">
                                            <p><b style="text-transform: uppercase;">:&nbsp; <?= $student_info['massar_student']; ?></b></p>
                                        </div>
                                    </div>
                                    <div class="row mt-2" style="text-align: justify;">
                                        <p style="line-height:30px;">
                                            Déclare avoir retiré mon dossier de scolarité complet de l'Ecole
                                            Nationale des Sciences Appliquées d'El Jadida, y compris:
                                        </p>
                                        <div class="d-flex justify-content-start align-items-center flex-column">
                                            <ul style=" list-style-type: square;">
                                                <li>Originale du diplôme</li>
                                                <li>Cahier de sante</li>
                                                <li>Relevé de notes</li>
                                            </ul>
                                        </div>
                                        <p>
                                            <?php
                                            $months = [
                                                "1" => "Janvier", "2" => "Février", "3" => "Mars", "4" => "Avril", "5" => "Mai", "6" => "Juin",
                                                "7" => "Juillet", "8" => "Août", "9" => "Septembre", "10" => "Octobre", "11" => "Novembre", "12" => "Décembre"
                                            ];

                                            // Ajouter deux jours à la date courante
                                            $date = new DateTime();
                                            $date->modify('+2 days');

                                            // Récupérer les valeurs de jour, mois, année en français
                                            $french_day = $date->format("d");
                                            $mounth_number = $date->format("n");
                                            $french_year = $date->format("Y");

                                            $french_menth = $months[$mounth_number];
                                            ?>
                                            Ce retrait m'engage à retiré provisoirement mon diplôme de l'ENSAJ, et à le
                                            rendre avant:&nbsp;&nbsp;<b><?= $french_day . " " . $french_menth . " " . $french_year; ?></b>
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
                                                echo $french_day . " " . $french_menth . " " . $french_year;
                                                ?>
                                            </b>
                                        </p>
                                        <div>
                                            <div style="float: right;margin-right: 130px;text-align:center;">
                                                <p class="mb-0">Signé:</p>
                                                <p class="mb-0">Lu et Approuvé</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="temporarily_withdrawn_footer">
                                        <p>
                                            Route d'Azemmour, Nationale N°1, ELHAOUZIA
                                            BP : 5096 El Jadida
                                            24002 Maroc
                                        </p>
                                        <p>Tel: (+212) 5 23 34 48 22 &nbsp; / &nbsp;Fax: (+212) 5 23 39 49 15</p>
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
        <form action="index.php?action=change_status_temporarily_after_printing" method="post">
            <input type="hidden" name="service_id" value="<?= $service_id; ?>">
            <button type="submit" class="btn btn-primary btn-lg" style="width: 50%;" id="imprimer_temporarily"> <span class="me-3"><i class="fa fa-print"></i></span>Imprimer</button>
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