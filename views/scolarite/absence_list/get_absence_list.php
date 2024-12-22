<?php
$title = "Scolarité | Liste d'absence";
ob_start();

?>
<style>

</style>
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
                <li class="active">
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
                        <h3 class="page-title">Liste</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php?action=absence_list">Générer</a>
                            </li>
                            <li class="breadcrumb-item active">liste d'absence</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="student-group-form">
            <form action="index.php?action=get_specific_student_absence_list" method="post">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group local-forms">
                            <select class="form-control select" name="field_id" id="select_sepecialization" required>
                                <option value="">Sélectionnez Filière</option>
                                <?php
                                foreach ($specializations as $specialization) {
                                    echo '<option value="' . $specialization['specialization_id'] . '"' . ($specialization['specialization_id'] == $field_id ? " selected " : "") . ">" . $specialization['short_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="form-group local-forms">
                            <select class="form-control select" name="class_id" id="select_class" required>
                                <option value="">Sélectionnez la filière</option>
                                <?php
                                foreach ($classes as $classe) {
                                    echo '<option value="' . $classe['class_id'] . '"' . ($classe['class_id'] == $class_id ? " selected " : "") . ">" . $classe['class_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="form-group local-forms">
                            <select class="form-control select" name="day" required>
                                <option value="">Jour</option>
                                <?php
                                $array_days = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
                                foreach ($array_days as $current_day) {
                                    if ($current_day == $day) {
                                        echo '<option value="' . $current_day . '" selected>' . $current_day . "</option>";
                                    } else {
                                        echo '<option value="' . $current_day . '">' . $current_day . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="form-group local-forms">
                            <select class="form-control select" name="period_time" required>
                                <option value="">Temps</option>
                                <?php
                                $array_time = ["08h30 - 10h20", "10h30 - 12h20", "13h30 - 15h20", "15h30 - 17h20"];
                                foreach ($array_time as $time) {
                                    if ($time == $period_time) {
                                        echo '<option value="' . $time . '" selected>' . $time . "</option>";
                                    } else {
                                        echo '<option value="' . $time . '">' . $time . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="search-student-btn">
                            <button type="submit" class="btn btn-primary btn-lg" name="search">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div id="absence_list">
                            <div class="row">
                                <div class="d-flex justify-content-between align-items-center flex-wrap header-absencelist mb-2">
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
                            <!-- $seance_info -->
                            <div id="classe_information">
                                <p><u><b>Fiche d'absence</b></u></p>
                                <?php
                                $explode_class = explode("-", $seance_info['class_name']);
                                $explode_semester = explode("-", $seance_info['semester_name'])
                                ?>
                                <p>
                                    <?= $explode_class[1]; ?>
                                    <sup><?php echo ($explode_class[1] == 1) ? "ère" : "ème"; ?></sup>
                                    année cycle <?php echo ($explode_semester[1] == "CI" ? "Ingénieur" : "Préparatoire"); ?>-<?= $explode_semester[0]; ?>
                                </p>
                                <p>Filière:"<?= $explode_class[1] . "-" . $explode_class[0]; ?>" Salle:&nbsp; <?= $seance_info['classroom_name']; ?></p>
                                <p> Année
                                    <?php
                                    $mounth_number = date("n");
                                    if ($mounth_number >= 1 && $mounth_number < 9) {
                                        echo "<b>" . (date('Y') - 1) . "/" . date('Y') . "</b>";
                                    } else {
                                        echo "<b>" . date('Y') . "/" . (date('Y') + 1) . "</b>";
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="d-flex justify-content-between" id="dateandModule">
                                <p style="text-overflow: ellipsis;"><u><b>Date:</b></u>&nbsp;
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
                                </p>
                                <p style="text-overflow: ellipsis;"><u><b><?= $module; ?>:</b></u>&nbsp;<?= $seance_info['modul_code']; ?></p>
                            </div>
                            <div class="table_container">
                                <table>
                                    <tr id="table_header">
                                        <th style="width: 25%;text-align:center;">Code Apogée</th>
                                        <th style="width: 50%;text-align:center;">Nom et Prénom</th>
                                        <th style="width:25%; text-align:center;">
                                            <p style="margin-bottom: 0px;">Signature</p>
                                            <p style="margin-bottom: 0px;"><?= $period_time; ?></p>
                                        </th>
                                    </tr>
                                    <?php
                                    foreach ($students as $student) {
                                        echo "<tr>";
                                        echo "<td>" . $student['student_apoge'] . "</td>";
                                        echo "<td>" . $student['lastname'] . "  " . $student['firstname'] . "</td>";
                                        echo "<td></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="2">Nom du professeur intervenant</td>
                                        <td><?= $intervenant; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Signature</td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-primary btn-lg justify-content-center" style="width: 50%;" id="print_absence_list"> <span class="me-3"><i class="fa fa-print"></i></span>Imprimer</button>
        </div>
        <footer class="mt-4">
            <p>ECOLE NATIONALE DES SCIENCES APPLIQUEES El JADIDA</p>
        </footer>
    </div>

    <?php
    $content = ob_get_clean();
    require("views/scolarite/components/layout.php");

    ?>