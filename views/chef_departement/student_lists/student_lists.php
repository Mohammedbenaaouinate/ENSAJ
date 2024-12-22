<?php
$title = "Chef Département | Liste des étudiants";
ob_start();
?>
<style>
    table {
        border-collapse: collapse;
        font-family: Arial;
        font-size: 12px;
        border: 1px solid black;
    }

    table th,
    table td {
        padding: 2px !important;
    }

    table tr td,
    table tr th {
        border: 1px solid blue !important;
    }

    .header_of_content {
        background-color: #FFFF99;
        padding: 0px;
        margin-bottom: 10px;
    }

    .hover_student_image {
        background-color: #fed330;
        padding: 2px;
        width: fit-content;
        height: fit-content;
        border: 1px solid gray;
        position: absolute;
        z-index: 1000;
        display: none;
    }

    .header_of_content p {
        margin-bottom: 0px;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
    }

    .content {
        border: 4px solid #F79F1F;
        border-top: 20px solid #FFC312;
    }

    .departement_title {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .departement_title p {
        margin-bottom: 0px;
        color: blue;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
</style>

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Menu principale</span>
                </li>
                <li>
                    <a href="index.php?action=dashboard_chef"><i class="feather-grid"></i> <span> Dashboard</span></a>
                </li>
                <li>
                    <a href="index.php?action=schedule"><i class="fa fa-calendar"></i> <span>Gestion des emplois</span></a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-list-alt"></i> <span>Planning exams</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=schedule_exam">Session normale</a></li>
                        <li><a href="index.php?action=schedule_ratt">Session Rattrapage</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-user"></i> <span>Vos emplois</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=user_emploi">Horraire Travail</a></li>
                        <li><a href="index.php?action=user_emploi_normal">Emploi de Session normale</a></li>
                        <li><a href="index.php?action=user_emploi_ratt">Emploi des rattrapage</a></li>

                    </ul>
                </li>

                <li class="active">
                    <a href="index.php?action=student_list_head_departement"><i class="fas fa-user-graduate"></i> <span>Liste des étudiants</span></a>
                </li>

                <li>
                    <a href="index.php?action=upload_cour"><i class="fas fa-chalkboard"></i> <span>Cours</span></a>
                </li>
                <li>
                    <a href="index.php?action=available"><i class="fas fa-door-open"></i> <span>Salle Disponibles</span></a>
                </li>
                <li>
                    <a href="index.php?action=lists_professeur"><i class="fas fa-user"></i> <span>Liste des professeurs</span></a>
                </li>

                <li>
                    <a href="index.php?action=planning_chef"><i class="fas fa-calendar"></i> <span>Planning Annuel</span></a>
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
        <div class="departement_title">
            <p><u><b>Département:&nbsp;&nbsp; <?= $departement['short_name'] . '--' . $departement['departement_name']; ?></b></u></p>
        </div>
        <div class="student-group-form">
            <form action="index.php?action=head_of_departement_filter_student" method="post">
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
                            <button type="submit" class="btn btn-primary btn-lg" name="search">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>




        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-2" style="overflow-x:auto;">
                <table class="table">
                    <thead>
                        <tr style="background-color: rgb(237, 208, 165);">
                            <th colspan="7" class="text-center">Département: <?= $departement['departement_name'];; ?></th>
                        </tr>
                        <tr style="background-color: #FFFF99;">
                            <th scope="col" style="text-align: center;">Classe</th>
                            <th scope="col" style="text-align: center;">Prénom/Nom/Photo</th>
                            <th scope="col" style="text-align: center;">Code Massar</th>
                            <th scope="col" style="text-align: center;">Code Apogée</th>
                            <th scope="col" style="text-align: center;">Email</th>
                            <th scope="col" style="text-align: center;">Numéro de Téléphone</th>
                            <th scope="col" style="text-align: center;">CV</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student) { ?>
                            <tr <?php echo ($student['student_id'] == $student['responsable_id'] ? "style='background-color:#e056fd;'" : "") ?>>
                                <td><?= $student['class_name']; ?></td>
                                <td>
                                    <span class="student_name">
                                        <b><?= $student['firstname'] . "&nbsp;&nbsp;" . $student['lastname']; ?></b>
                                    </span>
                                    <div class="hover_student_image" style="display: none;">
                                        <img src="assets/students/<?= $student['image_path']; ?>" onerror="this.src='assets/students/default_image.jpg'" height="80px">
                                    </div>
                                </td>
                                <td><?= $student['massar_student']; ?></td>
                                <td><?= $student['student_apoge']; ?></td>
                                <td><a href="mailto:<?= $student['email']; ?>"><u><?= $student['email']; ?></u></a></td>
                                <td><?= $student['phone_number']; ?></td>
                                <td>
                                    <?php if (!empty($student['cv_path'])) { ?>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input type="submit" onclick="window.open('<?= $student['cv_path']; ?>')" value="Télécharger">
                                        </div>
                                    <?php } else { ?>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <input type="submit" onclick="event.preventDefault();" value="Indisponible">
                                        </div>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer class="mt-3">
        <p>ECOLE NATIONALE DES SCIENCES APPLIQUEES El JADIDA</p>
    </footer>
</div>
<script>
    let students = document.querySelectorAll(".student_name");
    let images = document.querySelectorAll(".hover_student_image");
    let array_students = Array.from(students);
    let array_images = Array.from(images);
    array_students.forEach(function(student, index) {
        student.addEventListener("mouseover", function() {
            array_images[index].style.display = "block";
        });
        student.addEventListener("mouseout", function() {
            array_images[index].style.display = "none";
        });
    });
</script>
<?php $content = ob_get_clean(); ?>
<?php require_once("views/admin/components/layout_chef.php") ?>