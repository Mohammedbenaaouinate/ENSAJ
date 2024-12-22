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
                <li>
                    <a href="index.php?action=absence_list"><i class="fas fa-book-reader"></i> <span>Liste D'absence</span></a>
                </li>
                <li class="active">
                    <a href="#"><i class="fas fa-list-ul"></i><span>Gestion D'absence</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=abs_statistique">Statistique</a></li>
                        <li><a href="index.php?action=generate_absence_list" class="active">Enregistrer l'absence</a></li>
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
                                <a href="index.php?action=generate_absence_list">Gestion d'absence</a>
                            </li>
                            <li class="breadcrumb-item active">liste d'absence</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="student-group-form">
            <form action="index.php?action=get_class_student_save_absence" method="post">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="form-group local-forms">
                            <select class="form-control select" name="field_id" id="select_sepecialization" required>
                                <option value="">Sélectionnez Filière</option>
                                <?php foreach ($specializations as $specialization) { ?>
                                    <option value="<?= $specialization['specialization_id']; ?>"><?= $specialization['short_name']; ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-6">
                        <div class="form-group local-forms">
                            <select class="form-control select" name="class_id" id="select_class" required>
                                <option value="">Sélectionnez la filière</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="search-student-btn">
                            <button type="submit" class="btn btn-primary btn-lg" name="search">Chercher</button>
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
                            <div class="d-flex justify-content-center align-items-center mt-2 mb-2">
                                <ul style="list-style-type: circle;font-family:'Times New Roman', Times, serif;font-weight:bold;">
                                    <li>Tout d'abord, sélectionnez la filière. Ensuite, l'ensemble des classes associées à cette filière s'affichera.</li>
                                    <li>Sélectionnez la classe concernée par l'absence, puis cliquez sur le bouton 'Chercher'.</li>
                                    <li>Ensuite, l'ensemble des étudiants de cette classe s'affichera.</li>
                                    <li>Complétez les informations supplémentaires en sélectionnant le semestre,le nom du module (dans le cas d'un module sans éléments),<span style="color:red;"><br><u><b>Ou</b></u></span> le nom du module qui contient les éléments (dans le cas d'un module avec éléments).</li>
                                    <li>Si l'étudiant(e) est absent(e) et que son absence est justifiée, cochez la case 'Absence justifiée'.</li>
                                    <li>Si l’étudiant(e) est absent(e) et que son absence n’est pas justifiée, cochez la case 'Absence injustifiée'.</li>
                                </ul>
                            </div>
                            <div class="table_container" style="overflow-x: auto;">
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

    <?php
    $content = ob_get_clean();
    require("views/scolarite/components/layout.php");
    ?>