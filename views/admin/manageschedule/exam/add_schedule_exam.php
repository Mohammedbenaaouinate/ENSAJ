<?php
$title = "Admin | Emploi des ds";
ob_start();
?>

<head>
    <style>
       
        .form-row { margin-bottom: 10px; display: flex; }
        .form-group { margin-right: 10px; }
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

                <li>
                    <a href="index.php?action=schedule_admin_classes"><i class="fa fa-calendar"></i> <span>Gestion des emplois</span></a>
                </li>

                <li class="submenu active">
                    <a href="#"><i class="fa fa-list-alt"></i> <span>Planning exams</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=schedule_admin_classes_exam" class="active">Session normale</a></li>
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
                        <li class="breadcrumb-item"><a href="index.php?action=schedule_admin_classes_exam">Session normale</a></li>
                        <li class="breadcrumb-item active">Ajouter un créneau</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="index.php?action=add_schedule_exam_for_admin" method="post">
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

                               
                                <div id="rowsContainer">
                                    <div class="row form-row original-row" id="originalRow">
                                        
                                        <div class="col-12 col-sm-5">
                                            <div class="form-group local-forms">
                                                <label>Module/élement <span class="login-danger">*</span></label>
                                                <select class="form-control" name="module" >
                                                    <option>Sélectionner le module/élement</option>
                                                    <?php $count_module = 0; ?>
                                                            <?php foreach ($list_module as $module) { ?>
                                                                <?php foreach ($verify as $resu) { ?>
                                                                    <?php if ($day == $resu["day"] && $resu["time"] == $hour) { ?>
                                                                        <?php if ($resu["modul_code"] == $module["modul_name"]) { ?>
                                                                            <?php $count_module++; ?>
                                                                        <?php } ?>

                                                                    <?php } ?>
                                                                <?php } ?>
                                                                <?php if ($count_module == 0) { ?>
                                                                    <option value="<?php echo $module["modul_name"]; ?>"><?php echo $module["modul_name"]; ?></option>
                                                                <?php $count_module = 0;
                                                                } ?>
                                                                <?php $count_module = 0; ?>
                                                            <?php } ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-3">
                                            <div class="form-group local-forms">
                                                <label>Salle <span class="login-danger">*</span></label>
                                                <select class="form-control" name="salle">
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

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Professeur <span class="login-danger">*</span></label>
                                                <select class="form-control" name="professeur" required>
                                                    <option>Sélectionner le premier professeur</option>
                                                    <?php $count = 0; ?>
                                                            <?php foreach ($list_profs as $prof) { ?>
                                                                <?php foreach ($verify as $re) { ?>
                                                                    <?php if ($day == $re["day"] && $re["time"] == $hour) { ?>
                                                                        <?php if ($re["firstname"]." ".$re["lastname"] == $prof["firstname"]." ".$prof["lastname"] || $re["first_prof"] == $prof["firstname"]." ".$prof["lastname"] || $re["second_prof"]==$prof["firstname"]." ".$prof["lastname"]) { ?>
                                                                            <?php $count++; ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                                <?php if ($count == 0) { ?>
                                                                    <option value="<?php echo $prof["prof_id"]; ?>"><?php echo $prof["firstname"]." ".$prof["lastname"]; ?></option>
                                                                <?php $count = 0;
                                                                } ?>
                                                                <?php $count = 0; ?>
                                                            <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Professeur</label>
                                                <select class="form-control" name="professeur2">
                                                    <option>Sélectionner le deuxieme professeur</option>
                                                    <?php $count = 0; ?>
                                                            <?php foreach ($list_profs as $prof) { ?>
                                                                <?php foreach ($verify as $re) { ?>
                                                                    <?php if ($day == $re["day"] && $re["time"] == $hour) { ?>
                                                                        <?php if ($re["firstname"]." ".$re["lastname"] == $prof["firstname"]." ".$prof["lastname"] || $re["first_prof"] == $prof["firstname"]." ".$prof["lastname"] || $re["second_prof"]==$prof["firstname"]." ".$prof["lastname"]) { ?>
                                                                            <?php $count++; ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                                <?php if ($count == 0) { ?>
                                                                    <option value="<?php echo $prof["firstname"]." ".$prof["lastname"]; ?>"><?php echo $prof["firstname"]." ".$prof["lastname"]; ?></option>
                                                                <?php $count = 0;
                                                                } ?>
                                                                <?php $count = 0; ?>
                                                            <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Professeur</label>
                                                <select class="form-control" name="professeur3">
                                                    <option>Sélectionner le troixieme professeur</option>
                                                    <?php $count = 0; ?>
                                                            <?php foreach ($list_profs as $prof) { ?>
                                                                <?php foreach ($verify as $re) { ?>
                                                                    <?php if ($day == $re["day"] && $re["time"] == $hour) { ?>
                                                                        <?php if ($re["firstname"]." ".$re["lastname"] == $prof["firstname"]." ".$prof["lastname"] || $re["first_prof"] == $prof["firstname"]." ".$prof["lastname"] || $re["second_prof"]==$prof["firstname"]." ".$prof["lastname"]) { ?>
                                                                            <?php $count++; ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                                <?php if ($count == 0) { ?>
                                                                    <option value="<?php echo $prof["firstname"]." ".$prof["lastname"]; ?>"><?php echo $prof["firstname"]." ".$prof["lastname"]; ?></option>
                                                                <?php $count = 0;
                                                                } ?>
                                                                <?php $count = 0; ?>
                                                            <?php } ?>
                                                </select>
                                            </div>
                                        </div>
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


<?php $content = ob_get_clean(); ?>
<?php require_once("views/admin/components/layout.php")?>
