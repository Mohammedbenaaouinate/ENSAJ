<?php
$title = "Scolarité | Page d'absence";
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
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Page D'absence</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?action=abs_statistique">Liste des classes</a></li>
                            <li class="breadcrumb-item active">Page D'absence</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="student-profile-head">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="profile-user-box d-flex justufy-content-center align-items-center">
                                        <div class="profile-user-img" style="top: 1px;">
                                            <img src="assets/students/<?= $student_info['image_path']; ?>" alt="Profile" style="width: 141px !important;height: 142px !important;">
                                        </div>
                                        <div class="names-profiles">
                                            <h4><?= $student_info['firstname'] . "  " . $student_info['lastname']; ?></h4>
                                            <h6 style="color:blue">Classe : <?= $student_info['class_name']?></h6>
                                            <h5>Élève ingénieur</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 d-flex align-items-center">
                                    <div class="follow-btn-group">
                                        <a class="btn btn-info follow-btns" href="index.php?action=select_statistic_attendance_of_class&class_id=<?= $student_info['class_id']?>">Revenir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="student-personals-grp">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="heading-detail">
                                        <h4 style="border-bottom: 2px solid rgb(27, 106, 244);padding-bottom: 5px;" class="text text-center">Détails des absences:</h4>
                                    </div>
                                    <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>

                                    <th>Date</th>
                                    <th>Séance</th>
                                    <th>Semestre</th>
                                    <th>Module</th>
                                    <th>Type d'absence</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($student_info_details as $student) { ?>
                                    <tr>
                                        <td><?= $student["record_date"]?></td>
                                        <td>
                                            <h2>
                                                <a><?= $student["seance_time"]?></a>
                                            </h2>
                                        </td>
                                        <td><?= $student["semester_name"]?></td>
                                        <td><?= $student["modul_name"]?></td>
                                        <?php if($student["justified"]==0){?>
                                                <td>Absence injustifiée</td>
                                        <?php }else{?>
                                            <td>Absence justifiée</td>
                                        <?php }?>
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
        </div>
    </div>
</div>

</div>


<?php $content = ob_get_clean(); ?>
<?php require_once("views/scolarite/components/layout.php"); ?>