<?php
$title = "Professeur | Ajouter Cour";
ob_start();
?>

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Menu principale</span>
                </li>
                <li>
                    <a href="index.php?action=dashboard_prof"><i class="feather-grid"></i> <span> Dashboard</span></a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-user"></i> <span>Vos emplois</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=prof_emploi">Horraire Travail</a></li>
                        <li><a href="index.php?action=prof_emploi_normal">Emploi de Session normale</a></li>
                        <li><a href="index.php?action=prof_emploi_ratt">Emploi des rattrapage</a></li>

                    </ul>
                </li>

                <li>
                    <a href="index.php?action=student_classes"><i class="fas fa-user-graduate"></i> <span>Liste des étudiants</span></a>
                </li>

                <li>
                    <a href="index.php?action=upload_cour_prof"><i class="fas fa-chalkboard"></i> <span>Cours</span></a>
                </li>
                <li>
                    <a href="index.php?action=lists_professeur_of_prof"><i class="fas fa-users"></i> <span>Listes des membres</span></a>
                </li>
                <li class="submenu active">
                    <a href="index.php?action=planning_prof"><i class="fas fa-calendar"></i> <span>Planning Annuel</span></a>
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




        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title text-center mb-1"><span>Planning Annuel</span></h5>
                                <p class="text-center mt-0"><?php echo date("Y") ?>/<?php echo date("Y") + 1 ?></p>
                            </div>
                            <center><embed src="assets/planning_pdf/planning.pdf" type="application/pdf" width="100%" height="800px" /></center>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require_once("views/admin/components/layout_prof.php") ?>