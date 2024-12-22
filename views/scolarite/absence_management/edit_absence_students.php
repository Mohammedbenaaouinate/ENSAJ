<?php
$title = "Scolarité | Edit view";
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
                <li>
                    <a href="index.php?action=absence_list"><i class="fas fa-book-reader"></i> <span>Liste D'absence</span></a>
                </li>
                <li class="active">
                    <a href="#"><i class="fas fa-list-ul"></i><span>Gestion D'absence</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=abs_statistique">Statistique</a></li>
                        <li><a href="index.php?action=generate_absence_list">Enregistrer l'absence</a></li>
                        <li><a href="index.php?action=edit_student_absence" class="active">Modifier l'absence</a></li>
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
    if (isset($_POST['status'])) {
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
                        <h3 class="page-title">Absence</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php?action=edit_student_absence">Gestion d'absence</a>
                            </li>
                            <li class="breadcrumb-item active">Modifier l'absence</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="student-group-form">
            <form action="index.php?action=search_student_absence" method="post">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group local-forms">
                            <select class="form-control select" name="field_id" id="select_sepecialization" required>
                                <option value="">Sélectionnez Filière</option>
                                <?php foreach ($specializations as $specialization) { ?>
                                    <option value="<?= $specialization['specialization_id']; ?>"><?= $specialization['short_name']; ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="form-group local-forms">
                            <select class="form-control select" name="class_id" id="select_class" required>
                                <option value="">Sélectionnez la filière</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group local-forms">
                            <label>Semestre <span class="text-danger"> *</span></label>
                            <select class="form-control select" name="semester_id" required>
                                <option value="">Sélectionnez le semestre</option>
                                <?php
                                foreach ($semesters as $semester) {
                                    echo '<option value="' . $semester['semester_id'] . '">' . $semester['semester_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group local-forms">
                            <label>Date de la séance <span class="login-danger">*</span></label>
                            <input class="form-control" name="seance_date" type="date" placeholder="DD-MM-YYYY" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group local-forms">
                            <label>Heure de la séance <span class="login-danger">*</span></label>
                            <select class="form-control select" name="seance_time" required>
                                <option value="">Heure</option>
                                <option value="08h30 - 10h20">08h30 - 10h20</option>
                                <option value="10h30 - 12h20">10h30 - 12h20</option>
                                <option value="13h30 - 15h20">13h30 - 15h20</option>
                                <option value="15h30 - 17h20">15h30 - 17h20</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="search-student-btn">
                            <button type="submit" class="btn btn-primary btn-lg" name="search" style="width: 100% !important;">Chercher</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div id="absence_list" style="background-color: white;">
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
                            <div class="table_container mt-5" style="overflow-x: auto;">
                                <table>
                                    <tr id="table_header">
                                        <th style="width: 20%;text-align:center; padding: 5px;">Code Apogée </th>
                                        <th style="width: 40%;text-align:center; padding: 5px;">Nom et Prénom</th>
                                        <th style="width:20%; text-align:center; padding: 5px;">Absence justifiée</th>
                                        <th style="width:20%; text-align:center; padding: 5px;">Absence injustifiée</th>
                                    </tr>
                                    <?php
                                    for ($i = 0; $i < 45; $i++) {
                                        echo "<tr>";
                                        echo "<td style='padding: 8px;'></td>";
                                        echo "<td style='padding: 8px;'></td>";
                                        echo "<td style='padding: 8px;'>";
                                        echo '<div class="d-flex justify-content-center align-items-center">';
                                        echo '<input type="checkbox" value="' . $i . '" name="abs_justify[]"/>';
                                        echo '</div>';
                                        echo "</td>";
                                        echo "<td style='padding: 8px;'>";
                                        echo '<div class="d-flex justify-content-center align-items-center">';
                                        echo '<input type="checkbox" value="' . $i . '" name="abs_unjustified[]" />';
                                        echo '</div>';
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="mt-3">
            <p>ECOLE NATIONALE DES SCIENCES APPLIQUEES El JADIDA</p>
        </footer>
    </div>
</div>
<?php
$content = ob_get_clean();
require("views/scolarite/components/layout.php");
?>