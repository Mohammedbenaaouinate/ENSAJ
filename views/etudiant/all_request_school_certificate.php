<?php
$title = "Etudiant | Attestation de Scolarité";
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
                        <h3 class="page-title">Demandes</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Demande</a>
                            </li>
                            <li class="breadcrumb-item active">Attestation Scolaire</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- continue de Remplir les information -->
        <?php if (isset($_SESSION['continue']) && $_SESSION['continue'] === true) { ?>
            <div class="meessage_alert" style="background-color: rgba(0, 0, 0, .6);height: 100%; left: 0;position: fixed;  top: 100x;  width: 100%; z-index: 1000;">
                <div id="delete_invoices_details" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="form-header">
                                    <h3>Important!</h3>
                                    <p>Nous avons besoin de plus d'informations sur vous [Adresse, Nationalité, Téléphone]. Cliquez sur 'Continuer' pour les compléter</p>
                                </div>
                                <div class="modal-btn delete-action">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="w-50">
                                            <a href="index.php?action=view_student_profile" class="btn btn-primary paid-continue-btn">Continuer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            unset($_SESSION['continue']);
        } ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <form action="index.php?action=student_request_attestation_scolaire" method="post">
                                        <button type="submit" class="btn btn-primary" name="btn_att_scolaire" id="request_attestation_scolaire"><i class="fas fa-plus"></i> Attestation Scolaire</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>Date de la demande</th>
                                        <th>Status</th>
                                        <th>Raison du Rejet</th>
                                        <th>Imprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($requests as $request) {
                                        echo "<tr>";
                                        echo "<td>" . $request['service_date'] . "</td>";
                                        if ($request['service_status'] == 0) {
                                            echo "<td>" . "<span class='badge badge-primary'>En cours de Traitement</span>" . "</td>";
                                        } elseif ($request['service_status'] == 1) {
                                            echo "<td>" . "<span class='badge badge-success'>Demande Acceptée</span>" . "</td>";
                                        } elseif ($request['service_status'] == 2) {
                                            echo "<td>" . "<span class='badge badge-danger'>Demande Refusée</span>" . "</td>";
                                        }
                                        echo "<td>" . $request['rejection_reason'] . "</td>";
                                        if (!empty($request['approved_date'])) {

                                    ?>
                                            <td class="d-flex justify-content-center align-items-center">
                                                <form action="index.php?action=printed_school_certicate_by_student" method="post">
                                                    <input type="hidden" name="servcie_id" value="<?= $request['service_id']; ?>">
                                                    <button type="submit" class="btn btn-primary p-2"><i class="fas fa-download me-2"></i>Télécharger</button>
                                                </form>
                                            </td>
                                    <?php  } else {
                                            echo "<td></td>";
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
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
<script>
    var button = document.getElementById("request_attestation_scolaire");
    button.addEventListener("click", function(e) {
        if (!confirm("Vous souhaitez demander l'attestation scolaire ?")) {
            e.preventDefault();
        }
    });
</script>
<?php
$content = ob_get_clean();
require("views/etudiant/components/layout.php");
?>