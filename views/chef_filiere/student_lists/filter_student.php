<?php
$title = "Chef Filière | Filter";
ob_start();
?>

<head>
    <style>
        table {
            border-collapse: collapse;
            font-family: Arial;
            font-size: 12px;
        }

        table th,
        table td {
            padding: 6px !important;
        }

        table tr td,
        table tr th {
            border: 1px solid blue !important;
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
            color: #0fb9b1;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
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

        .student_name {
            cursor: pointer;
        }
    </style>
</head>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Menu principale</span>
                </li>
                <li>
                    <a href="index.php?action=dashboard_filiere"><i class="feather-grid"></i> <span> Dashboard</span></a>
                </li>
                <li>
                    <a href="index.php?action=schedule_chef_filiere"><i class="fa fa-calendar"></i> <span>Gestion des emplois</span></a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-list-alt"></i> <span>Planning exams</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=schedule_exam_filiere">Session normale</a></li>
                        <li><a href="index.php?action=schedule_ratt_filiere">Session Rattrapage</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-user"></i> <span>Vos emplois</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=user_emploi_filiere">Horraire Travail</a></li>
                        <li><a href="index.php?action=user_emploi_normal_filiere">Emploi de Session normale</a></li>
                        <li><a href="index.php?action=user_emploi_ratt_filiere">Emploi des rattrapage</a></li>

                    </ul>
                </li>

                <li class="active">
                    <a href="index.php?action=chef_emploi_filiere"><i class="fas fa-user-graduate"></i> <span>Liste des étudiants</span></a>
                </li>

                <li>
                    <a href="index.php?action=upload_cour_filiere"><i class="fas fa-chalkboard"></i> <span>Cours</span></a>
                </li>
                <li>
                    <a href="index.php?action=available_filiere"><i class="fas fa-door-open"></i> <span>Salle Disponibles</span></a>
                </li>
                <li>
                    <a href="index.php?action=lists_professeur_filiere"><i class="fas fa-user"></i> <span>Liste des professeurs</span></a>
                </li>
                <li>
                    <a href="index.php?action=planning_filiere"><i class="fas fa-calendar"></i> <span>Planning Annuel</span></a>
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
            <p><b><u>Filière: <?= $class_info['fullname']; ?></u></b></p>
        </div>
        <div class="student-group-form">
            <form action="index.php?action=chef_filiere_student_same_classe_filter" method="post">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <div class="form-group local-forms">
                            <select class="form-control select" name="class_id" id="select_class" required>
                                <option value="">Sélectionnez la classe</option>
                                <option value="all">Tous Les Classes</option>
                                <?php foreach ($classes as $classe) {
                                    if ($classe['class_id'] == $class_id) {
                                        echo "<option value='" . $classe['class_id'] . "' selected>" . $classe['class_name'] . "</option>";
                                    } else {
                                        echo "<option value='" . $classe['class_id'] . "' >" . $classe['class_name'] . "</option>";
                                    }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1">
                        <input type="hidden" name="specialization_id" value="<?= $specialization_id; ?>">
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="search-student-btn">
                            <button type="submit" class="btn btn-primary btn-lg" name="search">Actualiser la liste</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-2" style="overflow-x:auto;">
                <table class="table" id="student_list">
                    <thead>
                        <tr style="background-color: rgb(237, 208, 165);">
                            <th colspan="6" class="text-center">
                                <?php
                                $explode = explode("-", $class_info['class_name']);
                                $specialization_name = $explode[0];
                                $class_year = $explode[1];
                                echo $class_year;
                                if ($class_year == 1) {
                                    echo "ère Année - Filière ";
                                } else {
                                    echo "ème Année - Filière ";
                                }
                                echo $specialization_name;
                                ?>
                            </th>

                        </tr>
                        <tr style="background-color: #FFFF99;">
                            <th scope="col" style="text-align: center;">Prénom/Nom</th>
                            <th scope="col" style="text-align: center;">Code Massar</th>
                            <th scope="col" style="text-align: center;">Code Apogée</th>
                            <th scope="col" style="text-align: center;">Email</th>
                            <th scope="col" style="text-align: center;">Numéro de Téléphone</th>
                            <th scope="col" style="text-align: center;" class="hide_on_print">CV</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student) {
                            if (in_array($student['student_id'], $responsable_class)) {
                        ?>
                                <tr style="background-color: #95afc0;">
                                    <td>
                                        <span class="student_name">
                                            <b><?= $student['firstname'] . "&nbsp;&nbsp;" . $student['lastname'] ?></b>
                                        </span>
                                        <div class="hover_student_image">
                                            <img src="assets/students/<?= $student['image_path']; ?>" height="80px">
                                        </div>
                                    </td>
                                    <td><?= $student['massar_student']; ?></td>
                                    <td><?= $student['student_apoge']; ?></td>
                                    <td><a href="mailto:<?= $student['email']; ?>"><u><?= $student['email']; ?></u></a></td>
                                    <td><?= $student['phone_number']; ?></td>
                                    <td class="hide_on_print">
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
                            <?php } else { ?>
                                <tr>
                                    <td>
                                        <span class="student_name">
                                            <b><?= $student['firstname'] . "&nbsp;&nbsp;" . $student['lastname'] ?></b>
                                        </span>
                                        <div class="hover_student_image">
                                            <img src="assets/students/<?= $student['image_path']; ?>" height="80px">
                                        </div>
                                    </td>
                                    <td><?= $student['massar_student']; ?></td>
                                    <td><?= $student['student_apoge']; ?></td>
                                    <td><a href="mailto:<?= $student['email']; ?>"><u><?= $student['email']; ?></u></a></td>
                                    <td><?= $student['phone_number']; ?></td>
                                    <td class="hide_on_print">
                                        <?php if (!empty($student['cv_path'])) { ?>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <input type="submit" onclick="window.open('assets/CV/<?= $student['cv_path']; ?>')" value="Télécharger">
                                            </div>
                                        <?php } else { ?>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <input type="submit" onclick="event.preventDefault();" value="Indisponible">
                                            </div>
                                        <?php } ?>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center mb-3 mt-3">
            <button type="submit" class="btn btn-primary btn-lg" style="width: 50%;" id="print_button"> <span class="me-3"><i class="fa fa-print"></i></span>Imprimer</button>
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
<?php require_once("views/admin/components/layout_filiere.php") ?>