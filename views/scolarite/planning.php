<?php
$title = "Scolarité | planning ";
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
                <li class="submenu">
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
                <li class="submenu active">
                    <a href="index.php?action=scolarite_planning" class="active"><i class="fas fa-calendar"></i> <span>Planning</span></a>
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
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title text-center mb-1"><span>Planning Annuel</span></h5>
                                <p class="text-center mt-0">
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
                            <center><embed src="assets/planning_pdf/planning.pdf" type="application/pdf" width="100%" height="800px" /></center>
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
require("views/scolarite/components/layout.php");

?>