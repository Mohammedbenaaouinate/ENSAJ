<?php
$title = "Scolarité | Liste des étudiants";
ob_start();

?>
<head>
    <style>
        .ecriture{
            color: white !important;
        }
    </style>
</head>
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

        <div class="student-group-form">
            <form action="index.php?action=filter_attendance_scolarity" method="post">
                <input type="hidden" name="class_id" value="<?= $class; ?>" id="class_id_value">
                <div class="row">
                    <div class="col-lg-2 col-md-6">
                        <label for="">Date Début</label>
                        <div class="form-group local-forms">
                            <input type="date" class="form-control" name="start_date" value="<?= $start_date?>" disabled>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <label for="">Date Fin</label>
                        <div class="form-group local-forms">
                            <input type="date" class="form-control" name="end_date" value="<?= $end_date?>" disabled>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <label for="">Filtrer par semestre</label>
                        <div class="form-group local-forms">
                            <select class="form-control select" name="semester" id="select_semester" disabled>
                                <?php foreach ($semester as $semes) { ?>
                                    <?php if($semes["semester_id"]==$semestre){?>
                                        <option value="<?= $semes["semester_id"] ?>" selected><?= $semes["semester_name"] ?></option>
                                    <?php }else{ ?>
                                        <option value="<?= $semes["semester_id"] ?>"><?= $semes["semester_name"] ?></option>
                                    <?php } ?>

                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <label for="">Module sans éléments</label>
                        <div class="form-group local-forms">
                            <select class="form-control select" name="modul_without_element" id="select_module" disabled>
                                <?php foreach($semester_module as $s_m){?>
                                    <?php if($s_m["modul_id"]==$modul_without_element){?>
                                        <option value="<?= $s_m["modul_id"]?>" selected><?= $s_m["modul_name"]?></option>
                                    <?php }else{ ?>
                                        <option value="<?= $s_m["modul_id"]?>"><?= $s_m["modul_name"]?></option>
                                    <?php } ?>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label for="">Module avec éléments</label>
                        <div class="form-group local-forms">
                            <select class="form-control select" name="modul_with_element" id="select_module_with_element" disabled>
                                <?php foreach($semester_element as $s_e){?>
                                    <?php if($s_e["module_id"]==$modul_with_element){?>
                                        <option value="<?= $s_e["module_id"]?>" selected><?= $s_e["module_name"]?></option>
                                    <?php }else{ ?>
                                        <option value="<?= $s_e["module_id"]?>"><?= $s_e["module_name"]?></option>
                                    <?php } ?>

                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-6">
                        <div class="search-student-btn">
                            <a href="index.php?action=select_statistic_attendance_of_class&class_id=<?= $class?>" class="btn btn-success btn-lg mb-3" style="width: 100%;font-size:15px;font-weight:bold">Effectuer d'autres recherches</a>
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
                                    <h3 class="page-title">liste des étudiants absents(<?= $result["tag"]?>)</h3>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result["query"] as $student) { ?>
                                    <?php if($student["nombre_heure"] > 14){?>

                                        <tr style="background-color:red">
                                            <td class="ecriture"><?= $student["massar_student"] ?></td>
                                            <td>
                                                <h2>
                                                    <a class="ecriture"><?= $student["lastname"] ?></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <h2>
                                                    <a class="ecriture"><?= $student["firstname"] ?></a>
                                                </h2>
                                            </td>
                                            <td><a style="color: white;font-weight: bold;" href="mailto:<?= $student["email"] ?>"><?= $student["email"] ?></a></td>
                                            <td class="ecriture"><?= $student["phone_number"] ?></td>
                                            <td class="ecriture"><?= $student["nombre_heure"] ?></td>
                                        </tr>
                                    <?php }elseif($student["nombre_heure"] >= 7 && $student["nombre_heure"] <= 14){?>
                                        <tr style="background-color:rgb(235, 161, 12)">
                                            <td class="ecriture"><?= $student["massar_student"] ?></td>
                                            <td>
                                                <h2>
                                                    <a class="ecriture"><?= $student["lastname"] ?></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <h2>
                                                    <a class="ecriture"><?= $student["firstname"] ?></a>
                                                </h2>
                                            </td>
                                            <td class="ecriture"><a style="color: white;font-weight: bold;" href="mailto:<?= $student["email"] ?>"><?= $student["email"] ?></a></td>
                                            <td class="ecriture"><?= $student["phone_number"] ?></td>
                                            <td class="ecriture"><?= $student["nombre_heure"] ?></td>
                                        </tr>
                                    <?php }else{ ?>
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
                                        </tr>
                                    <?php } ?>
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