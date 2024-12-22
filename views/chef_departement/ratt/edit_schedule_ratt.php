<?php
$title = "Chef Département | Rattrapage";
ob_start();
?>

<head>
    <style>
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
                    <span>Menu principale</span>
                </li>
                <li>
                    <a href="index.php?action=dashboard_chef"><i class="feather-grid"></i> <span> Dashboard</span></a>
                </li>
                <li>
                    <a href="index.php?action=schedule"><i class="fa fa-calendar"></i> <span>Gestion des emplois</span></a>
                </li>

                <li class="submenu active">
                    <a href="#"><i class="fa fa-list-alt"></i> <span>Planning exams</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=schedule_exam">Session normale</a></li>
                        <li class="active"><a href="index.php?action=schedule_ratt">Session Rattrapage</a></li>
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

                <li>
                    <a href="index.php?action=student_list_head_departement"><i class="fas fa-user-graduate"></i> <span>Liste des étudiants</span></a>
                </li>

                <li>
                    <a href="index.php?action=upload_cour"><i class="fas fa-chalkboard"></i> <span>Cours</span></a>
                </li>
                <li>
                    <a href="index.php?action=available"><i class="fas fa-door-open"></i> <span>Salle Disponibles</span></a>
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
                    <h3 class="page-title">Modifier un créneau</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php?action=schedule_ratt">Session rattrapage</a></li>
                        <li class="breadcrumb-item active">Modifier un créneau</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="index.php?action=edit_schedule_ratt" method="post">
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
                                        <div class="col-12 col-sm-3">
                                            <div class="form-group local-forms">
                                                <label>Professeur <span class="login-danger">*</span></label>
                                                <select class="form-control select_professeur" name="professeur">
                                                    <option selected value="<?php echo $id_prof; ?>"><?= $prof; ?></option>

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
                                                <select class="form-control select_module_element" name="module">
                                                    <option selected><?= $module; ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-3">
                                            <div class="form-group local-forms">
                                                <label>Salle <span class="login-danger">*</span></label>
                                                <select class="form-control" name="salle">
                                                    <option selected><?= $room; ?></option>
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

                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>

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
<?php require_once("views/admin/components/layout_chef.php") ?>