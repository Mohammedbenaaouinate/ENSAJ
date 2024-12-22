<?php
$title = "Planning |Upload CV";
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
                <li class="active">
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
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">CV</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php?action=pdf_planning">CV</a>
                        </li>
                        <li class="breadcrumb-item active">Mettre Mon CV</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Start Consigne -->
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <p class="text-center fw-bold mb-3" style="margin-top: 1rem;"> <i class="fa fa-exclamation-triangle me-2"></i>Comment importer mon CV:</p>
                            <ul style="list-style-type: circle;font-weight:bold;">
                                <li>Accéder à Google Drive : Connectez-vous à Google Drive. </li>
                                <li>Télécharger le CV : Cliquez sur "Nouveau" > "Importer un fichier" et sélectionnez votre CV.</li>
                                <li>Ouvrir les options de partage : Faites un clic droit sur le CV > "Partager".</li>
                                <li>Modifier l'accès : Changez "Restreint" en "Tout le monde disposant du lien".</li>
                                <li>Copier le lien : Cliquez sur "Copier le lien".</li>
                                <li>Coller le lien : Collez le lien dans l'input ci-dessous.</li>
                                <li>Si vous téléchargez un nouveau CV, l'ancien sera remplacé par le nouveau.</li>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- End Consigne -->
                        <form action="index.php?action=uploadMyresume" method="post" enctype="multipart/form-data" class="border-bottom">
                            <div class="d-flex justify-content-evenly align-items-center mb-3">
                                <label class="fw-bold">Copier le lien Votre CV :&nbsp;&nbsp;</label>
                                <input class="form-control" type="text" name="myresume" style="max-width: 50% !important;" required />
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                        </form>
                        <div class="row">
                            <center> <iframe src="<?= $_SESSION['student']['cv_path']; ?>" width="100%" height="800px" allow="autoplay"></iframe></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>COPYRIGHT © 2024 ECOLE NATIONALE DES SCIENCES APPLIQUÉES EL JADIDA</p>
    </footer>
</div>

<?php
$content = ob_get_clean();
require("views/etudiant/components/layout.php");
?>