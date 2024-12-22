<?php
$title = "Scolarité | Liste des étudiants";
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
                        <li><a href="index.php?action=abs_statistique" class="active">Statistique</a></li>
                        <li><a href="index.php?action=generate_absence_list">Enregistrer l'absence</a></li>
                        <li><a href="index.php?action=edit_student_absence" >Modifier l'absence</a></li>
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
            <div class="row align-items-center">
                <div class="col">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php?action=abs_statistique">Liste des classes</a></li>
                        <li class="breadcrumb-item active">Nombre d'absences Annuel</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <p class="text-center fw-bold mb-3"> <i class="fa fa-exclamation-triangle me-2"></i>Pour l'envoi automatique des mails de notification d'absences aux étudiants ayant manqué 5 séances, vous devez filtrer par semestre.</p>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php if (isset($_SESSION['message'])) :
                if ($_SESSION['message_type'] == 'success') { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?php echo $_SESSION['message']; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } elseif ($_SESSION['message_type'] == 'error') { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?php echo $_SESSION['message']; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <?php unset($_SESSION['message']); ?>
                <?php unset($_SESSION['message_type']); ?>
            <?php endif; ?>

        <div class="student-group-form">
            <form action="index.php?action=filter_attendance_scolarity" method="post">
                <input type="hidden" name="class_id" value="<?= $class; ?>" id="class_id_value">
                <div class="row">
                    <div class="col-lg-2 col-md-6">
                        <label for="">Date Début</label>
                        <div class="form-group local-forms">
                            <input type="date" class="form-control" name="start_date">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <label for="">Date Fin</label>
                        <div class="form-group local-forms">
                            <input type="date" class="form-control" name="end_date">
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <label for="">Filtrer par semestre</label>
                        <div class="form-group local-forms">
                            <select class="form-control select" name="semester" id="select_semester">
                                <option value="">La semestre</option>
                                <?php foreach ($semester as $semestre) { ?>
                                    <option value="<?= $semestre["semester_id"]; ?>" ><?= $semestre["semester_name"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <label for="">Module sans éléments</label>
                        <div class="form-group local-forms">
                            <select class="form-control select" name="modul_without_element" id="select_module">
                                <option value="">Séléctionner la semester</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label for="">Module avec éléments</label>
                        <div class="form-group local-forms">
                            <select class="form-control select" name="modul_with_element" id="select_module_with_element">
                                <option value="">Séléctionner la semester</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-6">
                        <div class="search-student-btn">
                            <button type="submit" class="btn btn-primary btn-lg mb-3" style="width: 100%;" name="search"><i class="feather-search" style="margin-right:10px;font-weight:bold"></i>Filtrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">liste des étudiants absents (Annuel)</h3>
                                </div>
                            </div>
                        </div>

                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>

                                    <th>CNE</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Nombre d'absences injustifiées</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($students as $student) { ?>
                                    <tr>
                                        <td><?= $student["massar_student"] ?></td>
                                        <td>
                                            <h2>
                                                <a><?= $student["lastname"] ?></a>
                                            </h2>
                                        </td>
                                        <td>
                                            <h2>
                                                <a><?= $student["firstname"] ?></a>
                                            </h2>
                                        </td>
                                        <td><a style="color: rgb(49, 103, 219);font-weight: bold;" href="mailto:<?= $student["email"] ?>"><?= $student["email"] ?></a></td>
                                        <td><?= $student["phone_number"] ?></td>
                                        <td><?= $student["nombre_heure"] ?></td>

                                        <td class="text-end">
                                            <div class="actions">
                                                <a href="index.php?action=visualize_attendance_of_student&student_id=<?= $student["student_id"] ?>" class="btn btn-sm bg-success-light me-2">
                                                    <i class="feather-eye"></i>
                                                </a>
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

    <footer>
        <p>ECOLE NATIONALE DES SCIENCES APPLIQUEES El JADIDA</p>
    </footer>

</div>

<?php
$content = ob_get_clean();
require("views/scolarite/components/layout.php");

?>