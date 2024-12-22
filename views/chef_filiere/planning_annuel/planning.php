<?php 
$title="Chef filière | Planning";
ob_start();
?>

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
                <li >
                    <a href="index.php?action=schedule_chef_filiere"><i class="fa fa-calendar"></i> <span>Gestion des emplois</span></a>
                </li>

                <li >
                    <a href="#"><i class="fa fa-list-alt"></i> <span>Planning exams</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li ><a href="index.php?action=schedule_exam_filiere">Session normale</a></li>
                        <li ><a href="index.php?action=schedule_ratt_filiere">Session Rattrapage</a></li>
                    </ul>
                </li>

                <li >
                    <a href="#"><i class="fa fa-user"></i> <span>Vos emplois</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li ><a href="index.php?action=user_emploi_filiere">Horraire Travail</a></li>
                        <li ><a href="index.php?action=user_emploi_normal_filiere">Emploi de Session normale</a></li>
                        <li ><a href="index.php?action=user_emploi_ratt_filiere">Emploi des rattrapage</a></li>

                    </ul>
                </li>

                <li>
                    <a href="index.php?action=chef_emploi_filiere"><i class="fas fa-user-graduate"></i> <span>Liste des étudiants</span></a>
                </li>

                <li >
                    <a href="index.php?action=upload_cour_filiere"><i class="fas fa-chalkboard"></i> <span>Cours</span></a>
                </li>
                <li >
                    <a href="index.php?action=available_filiere"><i class="fas fa-door-open"></i> <span>Salle Disponibles</span></a>
                </li>
                <li >
                    <a href="index.php?action=lists_professeur_filiere"><i class="fas fa-user"></i> <span>Liste des professeurs</span></a>
                </li>
                <li class="submenu active">
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

            
        
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title text-center mb-1"><span>Planning Annuel</span></h5>
                                            <p class="text-center mt-0">
                                            <?php 
                                            $mounth_number = date("n");
                                            if ($mounth_number >= 1 && $mounth_number < 9) {
                                                echo "<b>" . (date('Y') - 1) . "/" . date('Y') . "</b>";
                                            } else {
                                                echo "<b>" . date('Y') . "/" . (date('Y') + 1) . "</b>";
                                            }
                                            ?>
                                            </p>
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
        <?php require_once("views/admin/components/layout_filiere.php")?>
