<?php
$title = "Admin | Emploi";
ob_start();
?>

<head>
    <style>
        .hr_add_schedule {
            color: blue !important;
            margin-bottom: 25px !important;
            border: 3px solid red;
        }

        .form-row {
            margin-bottom: 10px;
            display: flex;
        }

        .form-group {
            margin-right: 10px;
        }
    </style>

</head>

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Menu Principal</span>
                </li>
                <li class="submenu">
                    <a href="index.php?action=dashboard"><i class="feather-grid"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="index.php?action=dashboard">Admin Dashboard</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-user"></i> <span> Utilisateurs</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="index.php?action=head_of_school">Directeur</a> </li>
                        <li><a href="index.php?action=admins">Administrateur</a></li>
                        <li><a href="index.php?action=students">Etudiants</a></li>
                        <li><a href="index.php?action=teachers">Professeur</a></li>
                        <li><a href="index.php?action=librarians">Bibliothécaire</a></li>
                        <li><a href="index.php?action=scolarite">Scolarité</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?action=departement"><i class="fas fa-building"></i> <span>Departement</span></a>
                </li>
                <li>
                    <a href="index.php?action=specializations"><i class="fas fa-clipboard"></i> <span> Filiere</span> </a>
                </li>
                <li >
                    <a href="index.php?action=class"><i class="fas fa-users"></i> <span>Classe</span></a>
                </li>

                <li>
                    <a href="index.php?action=module_management"><i class="fas fa-book-reader"></i> <span>Modules & Elements</span></a>
                </li>

                <li class="menu-title">
                    <span>Gestion</span>
                </li>


                <li class="submenu">
                    <a href="#"><i class="fas fa-calendar-day"></i>
                        <span> planning </span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <a href="index.php?action=planning"> <span>Création</span></a>
                        <a href="index.php?action=print"><span>Evenements</span></a>
                        <a href="index.php?action=pdf_planning"><span>planning</span></a>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fas fa-door-open"></i>
                        <span>Salle</span> <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <a href="index.php?action=salle"> <span>Gestion des salles</span></a>
                        <a href="index.php?action=available_salle_admin"><span>Salles Disponibles</span></a>
                    </ul>
                </li>

                <li class="submenu active">
                    <a href="index.php?action=schedule_admin_classes"><i class="fa fa-calendar"></i> <span>Gestion des emplois</span></a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-list-alt"></i> <span>Planning exams</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=schedule_admin_classes_exam">Session normale</a></li>
                        <li><a href="index.php?action=schedule_admin_classes_ratt">Session Rattrapage</a></li>
                    </ul>
                </li>


                <li>
                    <a href="#"><i class="fas fa-table"></i> <span>Emploi</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="index.php?action=list_schedule">Liste des Emplois</a></li>
                        <li><a href="index.php?action=schedule_normal_admin">Liste des emplois ds normal</a></li>
                        <li><a href="index.php?action=schedule_ratt_admin">Liste des emplois ds Rattrapage</a></li>

                    </ul>
                </li>
                <li>
                    <a href="index.php?action=cv_list"><i class="fas fa-file"></i><span>Liste des CV</span></a>
                </li>
                <li>
                    <a href="#"> <i class="fas fa-forward"></i><span>Fin d'année</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li>
                            <a href="index.php?action=student_status"><i class="fas fa-file-csv"></i><span>Statut des Étudiants</span></a>
                        </li>
                        <li><a href="index.php?action=second_year_student"><i class="fas fa-file-csv"></i><span>les étudiants CP2</span></a></li>
                        <li><a href="index.php?action=end_year_student"><i class="fas fa-user-graduate"></i><span>Les lauréats</span></a></li>
                        <li><a href="index.php?action=old_year_winner"><i class="fas fa-graduation-cap"></i> <span>Les anciens lauréats</span></a></li>
                    </ul>
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
                    <h3 class="page-title">Ajouter un créneau</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php?action=schedule_admin_classes">Emplois de temps</a></li>
                        <li class="breadcrumb-item active">Ajouter un créneau</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="index.php?action=insert_schedule_admin" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Mise à jour du créneau</span></h5>
                                </div>
                                <input type="hidden" name="classe" value="<?= $classe; ?>">
                                <input type="hidden" name="semestre" value="<?= $semstre; ?>">
                                <input type="hidden" name="day" value="<?= $day; ?>">
                                <input type="hidden" name="hour" value="<?= $hour; ?>">



                                <div class="col-12 col-sm-4">
                                    <h6 class="mb-4"><span>Classe :
                                            <?= $classe; ?>
                                        </span></h6>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <h6 class="mb-4"><span>Semestre :
                                            <?= $semstre; ?>
                                        </span></h6>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <h6 class="mb-4"><span>Créneau :
                                            <?= $day; ?> /
                                            <?= $hour; ?>
                                        </span></h6>
                                </div>

                                <div class="col-12 col-sm-12">
                                    <div class="form-group local-forms mb-4">
                                        <!-- <label>Nombre de lignes/colonne <span class="login-danger">*</span></label>
                                        <input class="form-control" type="number" name="" id="numRows" min="1" oninput="generateRows()"> -->
                                        <label>Nombre de lignes/colonne<span class="login-danger">*</span></label>
                                        <select class="form-control" id="numRows" oninput="generateRows()">
                                            <option>--Sélectionner le nombre de lignes</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>

                                        </select>


                                    </div>
                                </div>
                                <hr class="hr_add_schedule">



                                <div id="rowsContainer">
                                    <div class="row form-row original-row" id="originalRow" style="display: none;">
                                        <div class="col-12 col-sm-3">
                                            <div class="form-group local-forms">
                                                <label>Professeur <span class="login-danger">*</span></label>
                                                <select class="form-control select_professeur" name="professeur[]">
                                                    <option>Sélectionner le professeur</option>

                                                    <?php $count = 0; ?>
                                                    <?php foreach ($list_profs as $prof) { ?>
                                                        <?php foreach ($verify as $re) { ?>
                                                            <?php if ($day == $re["day"] && $re["time"] == $hour) { ?>
                                                                <?php if ($re["lastname"] == $prof["lastname"]) { ?>
                                                                    <?php $count++; ?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                        <?php if ($count == 0) { ?>
                                                            <option value="<?php echo $prof["prof_id"]; ?>"><?php echo $prof["firstname"] . " " . $prof["lastname"]; ?></option>
                                                        <?php $count = 0;
                                                        } ?>
                                                        <?php $count = 0; ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-5">
                                            <div class="form-group local-forms">
                                                <label>Module/élement <span class="login-danger">*</span></label>
                                                <select class="form-control select_module_element" name="module[]">
                                                    <option>Sélectionner le professeur</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-3">
                                            <div class="form-group local-forms">
                                                <label>Salle <span class="login-danger">*</span></label>
                                                <select class="form-control" name="salle[]">
                                                    <option>Sélectionner une salle</option>
                                                    <?php $count_salle = 0; ?>
                                                    <?php foreach ($list_rooms as $room) { ?>
                                                        <?php foreach ($verify as $res) { ?>
                                                            <?php if ($day == $res["day"] && $res["time"] == $hour) { ?>

                                                                <?php if ($res["classroom_name"] == $room["classroom_name"]) { ?>
                                                                    <?php $count_salle++; ?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>

                                                        <?php if ($count_salle == 0) { ?>
                                                            <option value="<?php echo $room["classroom_id"]; ?>"><?php echo $room["classroom_name"]; ?></option>
                                                        <?php $count_salle = 0;
                                                        } ?>
                                                        <?php $count_salle = 0; ?>

                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-1">
                                            <div class="form-group local-forms">
                                                <label>Type<span class="login-danger">*</span></label>
                                                <select class="form-control" name="type[]">
                                                    <option>TP</option>
                                                    <option>TD</option>
                                                    <option>Cour</option>

                                                </select>
                                            </div>
                                        </div>



                                        <label class="col-form-label fw-bold" style="margin-top:-25px;">Semaines:</label>

                                        <label class="col-form-label col-md-1">De</label>

                                        <div class="col-md-1" style="margin-right: 5px;">
                                            <input class="form-control" type="number" name="de[]">
                                        </div>
                                        <label class="col-form-label col-md-1">à</label>

                                        <div class="col-md-1">
                                            <input class="form-control" type="number" name="a[]" style="margin-bottom:20px">
                                        </div>
                                        <hr>


                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary" name="add">Ajouter</button>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function generateRows() {
        var numRows = document.getElementById('numRows').value;
        var rowsContainer = document.getElementById('rowsContainer');
        var originalRow = document.getElementById('originalRow');

        // Clear existing rows
        rowsContainer.innerHTML = '';

        // Add new rows
        for (var i = 0; i < numRows; i++) {
            var newRow = originalRow.cloneNode(true);
            newRow.style.display = 'flex';
            rowsContainer.appendChild(newRow);
        }
    }
</script>



<?php $content = ob_get_clean(); ?>
<?php require_once("views/admin/components/layout.php") ?>