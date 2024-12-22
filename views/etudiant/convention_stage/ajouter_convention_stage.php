<?php
$title = "Etudiant | Convention de Stage";
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
                        <li><a href="index.php?action=student_convention_stage" class="active">Convention de Stage </a></li>
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
                        <!-- Start Scrllaobale-Model  -->
                        <div class="modal fade" id="consigne-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 style="color: red;">Consignes importantes</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p style="text-indent: 100px;font-size:15px;font-weight:bold;"><span style="color: green;font-size:20px;">1.</span>remplir soigneusement les champs du formulaire de demande de convention de stage avant de le soumettre, car ils ne pourront plus être modifiés une fois soumis.</p>
                                        <hr>
                                        <p style="text-indent: 100px;font-size:15px;font-weight:bold;"><span style="color: green;font-size:20px;">2.</span> Même si vous remplissez plusieurs demandes de convention dans cette application, une seule sera délivrée par l'administration. Vous aurez le droit d'en obtenir une autre seulement après l'examen du justificatif d'arrêt du stage précédent.</p>
                                        <hr>
                                        <p style="text-indent: 100px;font-size:15px;font-weight:bold;"><span style="color: green;font-size:20px;">3.</span> Si vous soumettez une nouvelle demande de convention, veuillez apporter la convention précédemment délivrée (papier original) ainsi qu'un justificatif de l'arrêt du stage précédent lors de la récupération de la nouvelle convention.</p>
                                        <hr>
                                        <p style="text-indent: 100px;font-size:15px;font-weight:bold;"><span style="color: green;font-size:20px;">4.</span> Après avoir soumis votre demande, veuillez contacter le service des affaires étudiantes deux jours plus tard pour récupérer votre convention de stage.</p>
                                        <hr>
                                        <p style="text-indent: 100px;font-size:15px;font-weight:bold;"><span style="color: green;font-size:20px;">5.</span> Les stagiaires PFE doivent remplir tous les champs. Pour les autres stagiaires, il est préférable de les remplir si possible, sinon ils peuvent les laisser vides.</p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Scrollbal Model  -->

                        <form action="index.php?action=ajouter_convention_stage_action" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <h5 class="form-title">
                                        <h4 style="text-align:center;color:firebrick;font-family: inherit;">Demande de convention de Stage</h4>
                                        <p class="consigne"><span style="color:brown;">NB:</span>
                                            Avant de soumettre votre demande de convention de stage,
                                            veuillez lire attentivement les consignes.
                                            Cliquez sur le bouton ci-dessous pour les consulter.
                                        </p>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn btn-info mt-1 mb-2" style="width: 200px;color:white;font-weight:bold;" data-bs-toggle="modal" data-bs-target="#consigne-modal">
                                                Consigne
                                            </button>
                                        </div>
                                        <hr>
                                    </h5>
                                </div>
                                <div class="col-lg-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="col-lg-12 convention-label">Société:
                                            <?php
                                            if ($required) {
                                                echo '<span style="color:brown;">(*)</span>';
                                            }
                                            ?>
                                        </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="company_name" <?= ($required === true) ? " required " : ""; ?> />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="col-lg-12 convention-label">Service:
                                            <?php
                                            if ($required) {
                                                echo '<span style="color:brown;">(*)</span>';
                                            }
                                            ?>
                                        </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="company_service" <?= ($required === true) ? " required " : ""; ?> />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="col-lg-12 convention-label">Adresse de la société:
                                            <?php
                                            if ($required) {
                                                echo '<span style="color:brown;">(*)</span>';
                                            }
                                            ?>
                                        </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="company_address" maxlength="90" <?= ($required === true) ? " required " : ""; ?> />
                                        </div>
                                        <span class="form-text text-muted" style="font-weight: bold; font-size:13px;"> (La longueur de l'adresse ne doit pas dépasser 90 caractères.)</span>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="col-lg-12 convention-label">Téléphone de la Société:
                                            <?php
                                            if ($required) {
                                                echo '<span style="color:brown;">(*)</span>';
                                            }
                                            ?>
                                        </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="company_phone" <?= ($required === true) ? " required " : ""; ?> />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="col-lg-12 convention-label">Fax de la société:
                                            <?php
                                            if ($required) {
                                                echo '<span style="color:brown;">(*)</span>';
                                            }
                                            ?>
                                        </label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="company_fax" <?= ($required === true) ? " required " : ""; ?> />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="col-lg-12 convention-label">Fichier "Assurance":<span style="color:brown;">(*)</span></label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="file" name="assurance_image" accept="image/png,image/jpg,image/jpeg" required />
                                        </div>
                                        <span class="form-text text-muted" style="font-weight: bold; font-size:13px;">(extension possible:png,jpg,jpeg/taille maximale=400Ko)</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">
                                        Envoyer la demande
                                    </button>
                                </div>
                            </div>
                        </form>
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