<?php
$title = "Scolarité | Convention de Stage";
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
                        <li><a href="index.php?action=all_temporarily_withdrawn">Retiré Provisoirement</a></li>
                        <li><a href="index.php?action=all_internship_agreement" class="active">Convention de Stage </a></li>
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
                                <a href="index.php?action=all_internship_agreement">Demande</a>
                            </li>
                            <li class="breadcrumb-item active">Convention de Stage</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div id="internship-agreement" style="background-color: white; border:none;">
                            <div id="first-page">
                                <div class="row">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap header-convention mb-2">
                                        <div class="mb-1">
                                            <img src="assets/img/logo_ensaj_scolarite.png" style="width:100px; height: 40px;">
                                        </div>
                                        <div id="header_paragraphe" class="mb-1">
                                            <p>UNIVERSITE CHOUAIB DOUKKALI</p>
                                            <p> ECOLE NATIONALE DES SCIENCES </p>
                                            <p> APPLIQUEES D'EL JADIDA</p>
                                        </div>
                                        <div class="mb-1">
                                            <img style="width: 100px; height: 40px;" src="assets/img/logo_universite_scolarite.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="row page-content">
                                    <p id="title">Convention de Stage</p>
                                    <p id="starting-text">
                                        La présente convention a pour objectif de définir les conditions dans lesquelles le stagiaire
                                        nommé ci-après sera accueilli dans l’organisme d’accueil.
                                        Elle doit être établie en quatre exemplaires.
                                    </p>
                                    <p class="text-gras">
                                        Renseignements concernant l’organisme d’accueil
                                    </p>

                                    <div class="text-container" style="text-overflow:ellipsis;">
                                        <p>Nom:&nbsp;<?= $convention['company_name']; ?></p>
                                        <p>Représenté par :.............................................................................................................................................................................</p>
                                        <p>En qualité de :.................................................................................................................................................................................</p>
                                        <p>Adresse :&nbsp;<?= $convention['company_address']; ?></p>
                                        <div class="row">
                                            <p class="col-lg-6 col-md-6 col-sm-6">
                                                Téléphone : &nbsp;<?= $convention['company_phone']; ?>
                                            </p>
                                            <p class="col-lg-6 col-md-6 col-sm-6">
                                                Télécopie : &nbsp;<?= $convention['company_fax']; ?>
                                            </p>
                                        </div>
                                        <p>Nature de l’activité de l’organisme d’accueil:&nbsp;<?= $convention['company_service']; ?></p>
                                    </div>
                                    <p class="text-gras mt-2">
                                        Renseignements concernant le stagiaire
                                    </p>
                                    <!-- $convention
                                    $student -->
                                    <div class="text-container">
                                        <p>Code Nationale de l’élève ingénieur :&nbsp;<?= $student['massar_student']; ?></p>
                                        <p>Nom et Prénom :&nbsp;<?= $student['firstname'] . "  " . $student['lastname']; ?></p>
                                        <p>Date et lieu de naissance :&nbsp;<?= $student['birth_date']; ?></p>
                                        <p>Nationalité :&nbsp;<?= $student['nationality']; ?></p>
                                        <p>Adresse :&nbsp;<?= $student['student_adress']; ?></p>
                                        <p>Filière et année : &nbsp;
                                            <!-- class_year -->
                                            <?php
                                            $exploded_array = explode(" ", $student['class_year']);
                                            $year_on_number = $exploded_array[1];
                                            $numbers_to_word = ["1" => "Première", "2" => "Deuxième", "3" => "Troisième", "4" => "Quatrième", "5" => "Cinquième"];
                                            foreach ($numbers_to_word as $key => $value) {
                                                if ($key == $year_on_number) {
                                                    $year_on_word = $numbers_to_word[$key];
                                                    break;
                                                }
                                            }
                                            echo $year_on_word . "  " . "Année" . " " . $student['fullname']
                                            ?>
                                        </p>
                                        <p>Tél :&nbsp;<?= $student['phone_number']; ?></p>
                                    </div>
                                    <p class="text-gras mt-2">
                                        Renseignements concernant l’établissement d’enseignement ou organisme de formation
                                    </p>
                                    <div class="text-container">
                                        <div class="row">
                                            <p class="col-lg-3 col-sm-2">Nom</p>
                                            <p class="col-lg-9 col-sm-10">:Ecole Nationale des Sciences Appliquées d’ El Jadida (ENSAJ)</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-lg-3 col-sm-2">Représenté par</p>
                                            <p class="col-lg-9 col-sm-10">:Monsieur <?= $directeur['firstname'] . "  " . $directeur['lastname']; ?></p>
                                        </div>
                                        <div class="row">
                                            <p class="col-lg-3 col-sm-2">En qualité de</p>
                                            <p class="col-lg-9 col-sm-10">:Directeur</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-lg-3 col-sm-2">Adresse</p>
                                            <p class="col-lg-9 col-sm-10" style="font-weight: bold;">:Route Nationale N°1 (Route AZEMMOUR), Km6, ELHAOUZIA BP : 1166 El Jadida Plateau 24002</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-lg-3 col-sm-2">Téléphone</p>
                                            <p class="col-lg-9 col-sm-10">:(+212) 05 23 39 56 79 /05 23 34 48 22 <span style="margin-left: 120px;">Télécopie :(+212) 05 23 39 49 15</span> </p>
                                        </div>
                                    </div>
                                    <p class="text-gras mt-2">
                                        Encadrement du stagiaire :
                                    </p>
                                    <div class="text-container" style="padding-top: 0px;">
                                        <table style="width: 100%;" id="first-table">
                                            <tr class="row">
                                                <td class="col-lg-6 col-md-6 col-sm-6 pt-2">
                                                    <p style="font-weight: bold;"><u>Tuteur professionnel :</u></p>
                                                    <p>Nom et Prénom :...................................................................</p>
                                                    <p>En qualité de :........................................................................</p>
                                                    <p>Tél :.........................................................................................</p>
                                                    <p>Fax :........................................................................................</p>
                                                    <p>Email :.....................................................................................</p>
                                                </td>
                                                <td class="col-lg-6 col-md-6 col-sm-6 pt-2">
                                                    <p style="font-weight: bold;"><u>Enseignant responsable à l’ENSAJ :</u></p>
                                                    <p>Nom et Prénom :....................................................................</p>
                                                    <p>En qualité de :.........................................................................</p>
                                                    <p>Tél :.........................................................................................</p>
                                                    <p>Fax :........................................................................................</p>
                                                    <p>Email :.....................................................................................</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="footer" style="text-align: center;font-family: 'Times New Roman', Times, sans-serif;font-size: 8px; font-style:italic;">
                                        <p class="pt-1" style="margin-bottom: 0px;">Route Nationale N°1 (Route AZEMMOUR), Km6, ELHAOUZIA</p>
                                        <p style="margin-bottom: 0px;">BP : 1166 El Jadida Plateau 24002</p>
                                        <p style="margin-bottom:0px;">Téléphone : 05 23 39 56 79-05 23 34 48 22 / Fax : 05 23 39 49 15</p>
                                    </div>
                                </div>
                            </div>
                            <div id="second-page">
                                <div class="row mt-4">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap header-convention mb-2">
                                        <div class="mb-1">
                                            <img src="assets/img/logo_ensaj_scolarite.png" style="width:100px; height: 40px;">
                                        </div>
                                        <div id="header_paragraphe" class="mb-1">
                                            <p>UNIVERSITE CHOUAIB DOUKKALI</p>
                                            <p> ECOLE NATIONALE DES SCIENCES </p>
                                            <p> APPLIQUEES D'EL JADIDA</p>
                                        </div>
                                        <div class="mb-1">
                                            <img style="width: 100px; height: 40px;" src="assets/img/logo_universite_scolarite.png">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="page-content mt-5">
                                            <p>Il est convenu ce qui suit :</p>
                                            <p> <span><u>Article 1</u></span>: Pendant la durée de son stage, l’élève ingénieur stagiaire demeure étudiant de l’Ecole Nationale des Sciences Appliquées d’El Jadida.
                                                Ses activités seront suivies et évaluées par les opérateurs de l’organisme d’accueil et les enseignants chercheurs de l’ENSAJ,
                                                dans des conditions qui seront déterminées après accord préalable de ces intervenants.
                                            </p>
                                            <p>
                                                <span><u>Article 2</u></span> : Durant son stage, l’élève ingénieur(e) stagiaire est soumis au règlement général de l’organisme d’accueil,
                                                notamment en matière de discipline et d’horaires. En cas de faute grave,
                                                l’organisme d’accueil se réserve le droit de mettre fin au stage de l’élève ingénieur(e) stagiaire et avisera immédiatement
                                                le Directeur de l’Ecole Nationale des Sciences Appliquées d’El Jadida.
                                            </p>
                                            <p>
                                                <span> <u>Article 3</u></span> : Les frais de nourriture et d’hébergement demeurent à la charge de l’élève ingénieur(e) stagiaire.
                                            </p>
                                            <p>
                                                <span><u>Article 4</u></span> : Au cours de son stage, l’élève ingénieur(e) doit souscrire une assurance personnelle auprès d’un organisme d’assurance.
                                            </p>
                                            <p>
                                                <span><u>Article 5</u> </span>: Au terme de son stage, le service administratif et la filière concernée de l’ENSAJ peuvent demander aux intervenants qui
                                                encadrent l’élève ingénieur une appréciation sur le déroulement du stage et sur certains points particuliers se rattachant au travail
                                                effectué. L’élève ingénieur stagiaire doit rédiger un rapport au cours de son stage à l’organisme d’accueil. Une copie du rapport est
                                                remise aux encadrants pour annotation éventuelle, au service administratif de l’ENSAJ et au service administratif de l’organisme d’accueil.
                                            </p>
                                            <p>
                                                <span><u>Article 6</u></span> : L’élève ingénieur (e) stagiaire s’engage à garder confidentielles toutes les informations recueillies pendant son stage et à ne
                                                pas les utiliser dans sa production scientifique (publications, communications, conférences..) sans l’accord préalable de l’organisme
                                                d’accueil et de l’ENSAJ.
                                            </p>
                                            <p>
                                                <span><u>Article 7</u></span> : A l’issue du stage, l’organisme d’accueil remettra à l’élève ingénieur(e) stagiaire une attestation indiquant la nature
                                                et la durée du stage et fournira à l’ENSAJ, une évaluation officielle sur le travail effectué par l’élève ingénieur(e) stagiaire.
                                            </p>
                                        </div>
                                    </div>
                                    <p class="signature">SIGNATURES </p>
                                    <table>
                                        <tr class="row signature-container">
                                            <td class="col-lg-4 col-sm-4" style="border-right: 1px solid black;">
                                                <div class="d-flex justify-content-between flex-column" style="height: 100%;">
                                                    <p class="signature-para">Organisme d’accueil</p>
                                                    <p class="signature-para"><u>Date</u></p>
                                                </div>
                                            </td>
                                            <td class="col-lg-4 col-sm-4" style="border-right: 1px solid black;">
                                                <div class="d-flex justify-content-between flex-column" style="height: 100%;">
                                                    <p class="signature-para">Stagiaire</p>
                                                    <p class="signature-para"><u>Date</u></p>
                                                </div>
                                            </td>
                                            <td class="col-lg-4 col-sm-4">
                                                <div class="d-flex justify-content-between flex-column" style="height: 100%;">
                                                    <p class="signature-para">Directeur de l’ENSAJ</p>
                                                    <p class="signature-para"><u>Date</u></p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="footer" style="text-align: center;font-family: 'Times New Roman', Times, sans-serif;font-size: 8px; font-style:italic;">
                                        <p class="pt-1" style="margin-bottom: 0px;">Route Nationale N°1 (Route AZEMMOUR), Km6, ELHAOUZIA</p>
                                        <p style="margin-bottom: 0px;">BP : 1166 El Jadida Plateau 24002</p>
                                        <p style="margin-bottom:0px;">Téléphone : 05 23 39 56 79-05 23 34 48 22 / Fax : 05 23 39 49 15</p>
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
        <form action="index.php?action=update_status_agreement" method="post">
            <input type="hidden" name="agreement_id" value="<?= $agreement_id; ?>">
            <button type="submit" class="btn btn-primary btn-lg" style="width: 50%;" id="imprimer_convention"> <span class="me-3"><i class="fa fa-print"></i></span>Imprimer</button>
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