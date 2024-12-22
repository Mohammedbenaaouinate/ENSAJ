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
                                <a href="#">Demandes</a>
                            </li>
                            <li class="breadcrumb-item active">Convention de stage </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>CNE</th>
                                        <th>CIN</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Classe</th>
                                        <th>Téléphone</th>
                                        <th>Email </th>
                                        <th>Date de La Demande</th>
                                        <th>Status </th>
                                        <th>Assurance</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($requests as $request) { ?>
                                        <!-- Start Model Design -->
                                        <div id="modal-agreement-<?= $request['agreement_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="index.php?action=refuse-agreement-request" method="post">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="standard-modalLabel">
                                                                Motif de rejet
                                                            </h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="agreement_id" value="<?= $request['agreement_id']; ?>">
                                                            <div class="mb-3">
                                                                <label class="form-label">Saisir le motif du rejet: </label>
                                                                <textarea class="form-control" name="rejection_reason" rows="3" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                                Fermer
                                                            </button>
                                                            <button type="submit" class="btn btn-success">
                                                                Enregistrer
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- end Model Design -->
                                        <tr>
                                            <td><?= $request['massar_student']; ?></td>
                                            <td><?= $request['cin_student']; ?></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="#" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="assets/students/<?= $request['image_path']; ?>" alt="User Image" /></a>
                                                    <a href="#"><?= $request['lastname']; ?></a>
                                                </h2>
                                            </td>
                                            <td><?= $request['firstname']; ?></td>
                                            <td><?= $request['class_name']; ?></td>
                                            <td><?= $request['phone_number']; ?></td>
                                            <td><a href="mailto:<?= $request['email']; ?>" style="color:#70a1ff"><u><?= $request['email']; ?></u></a></td>
                                            <td><?= $request['request_date']; ?></td>
                                            <?php
                                            $served = 0;
                                            foreach ($agreement_aleardy_served as $aleardy) {
                                                if ($aleardy['student_id'] == $request['student_id']) {
                                                    $served = 1;
                                                    break;
                                                }
                                            }

                                            if ($served == 0) {
                                                echo "<td>" . '<span class="badge badge-success">' . "Jamais Servi" . "</span></td>";
                                            } else {
                                                echo "<td>" . '<span class="badge badge-danger">' . "Déja Servi" . "</span></td>";
                                            }
                                            ?>
                                            <td>
                                                <form action="index.php?action=view_assurance_image" method="post">
                                                    <input type="hidden" name="assurance_path" value="<?= $request['insurance_path']; ?>">
                                                    <button type="submit" style="border: none;background-color:white;color:#1e90ff;"><u>Assurance</u></button>
                                                </form>
                                            </td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <form action="index.php?action=view_internship_agreement" method="post">
                                                        <input type="hidden" name="student_id" value="<?= $request['student_id']; ?>">
                                                        <input type="hidden" name="agreement_id" value="<?= $request['agreement_id']; ?>">
                                                        <button type="submit" class="btn btn-sm bg-success-light me-2 delete_edit_hover"><i class="feather-check"></i></button>
                                                    </form>
                                                    <button type="button" class="btn btn-sm bg-danger-light delete_edit_hover" data-bs-toggle="modal" data-bs-target="#modal-agreement-<?= $request['agreement_id']; ?>"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
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

<?php
$content = ob_get_clean();
require("views/scolarite/components/layout.php");

?>