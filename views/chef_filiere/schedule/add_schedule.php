<?php
$title = "Chef Filère | Emploi";
ob_start();
?>

<head>
    <style>
        .hr_add_schedule {
            color: blue !important;
            margin-bottom: 25px !important;
            border: 3px solid red;
        }
        .form-row { margin-bottom: 10px; display: flex; }
        .form-group { margin-right: 10px; }
    </style>
    
</head>

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Menu principale</span>
                </li>
                <li >
                    <a href="index.php?action=dashboard_filiere"><i class="feather-grid"></i> <span> Dashboard</span></a>
                </li>
                <li class="submenu active">
                    <a href="index.php?action=schedule_chef_filiere"><i class="fa fa-calendar"></i> <span>Gestion des emplois</span></a>
                </li>

                <li >
                    <a href="#"><i class="fa fa-list-alt"></i> <span>Planning exams</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li ><a href="index.php?action=schedule_exam_filiere">Session normale</a></li>
                        <li><a href="index.php?action=schedule_ratt_filiere">Session Rattrapage</a></li>
                    </ul>
                </li>

                <li >
                    <a href="#"><i class="fa fa-user"></i> <span>Vos emplois</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=user_emploi_filiere">Horraire Travail</a></li>
                        <li ><a href="index.php?action=user_emploi_normal_filiere">Emploi de Session normale</a></li>
                        <li ><a href="index.php?action=user_emploi_ratt_filiere">Emploi des rattrapage</a></li>

                    </ul>
                </li>

                <li>
                    <a href="index.php?action=chef_emploi_filiere"><i class="fas fa-user-graduate"></i> <span>Liste des étudiants</span></a>
                </li>

                <li>
                    <a href="index.php?action=upload_cour_filiere"><i class="fas fa-chalkboard"></i> <span>Cours</span></a>
                </li>
                <li >
                    <a href="index.php?action=available_filiere"><i class="fas fa-door-open"></i> <span>Salle Disponibles</span></a>
                </li>
                <li >
                    <a href="index.php?action=lists_professeur_filiere"><i class="fas fa-user"></i> <span>Liste des professeurs</span></a>
                </li>
                <li >
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

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Ajouter un créneau</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php?action=schedule_chef_filiere">Emplois de temps</a></li>
                        <li class="breadcrumb-item active">Ajouter un créneau</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="index.php?action=add_schedule_filiere" method="post">
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
                                                                    <option value="<?php echo $prof["prof_id"]; ?>"><?php echo $prof["firstname"]." ".$prof["lastname"]; ?></option>
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
                                                <select class="form-control select_module_element" name="module[]" >
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
                                                <input class="form-control" type="number" name="a[]"  style="margin-bottom:20px">
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
<?php require_once("views/admin/components/layout_filiere.php")?>
