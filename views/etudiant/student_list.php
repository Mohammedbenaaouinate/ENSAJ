<?php
$title = "Etudiant | Liste Des étudiants";
ob_start();
?>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-hand-holding"></i> <span>Demande</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=student_attestation_scolarite">Attestation Scolaire</a></li>
                        <li><a href="index.php?action=student_retrait_provisoire">Retiré Provisoirement</a></li>
                        <li><a href="index.php?action=student_convention_stage">Convention de Stage </a></li>
                        <li><a href="index.php?action=student_relve_note">Relvé de notes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?action=courses"><i class="fas fa-book"></i> <span>Cours</span></a>
                </li>
                <li class="submenu active">
                    <a href="index.php?action=student_list"><i class="fas fa-list"></i> <span>Liste des étudiants</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-book"></i> <span>Bouquins</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=all_books">Tous les bouquins</a></li>
                        <li><a href="index.php?action=request_books">Mes Demandes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?action=show_schedule_student"><i class="fas fa-calendar-day"></i> <span>Emploi du Temps</span></a>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fas fa-calendar-week"></i> <span>Planning du DS</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=student_planning_ds_normale">SESSION NORMALE</a></li>
                        <li><a href="index.php?action=student_planning_ds_ratt">SESSION RATTRAPAGE</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?action=student_planning_annuelle"><i class="fas fa-calendar"></i> <span>Planning Annuel</span></a>
                </li>
                <li>
                    <a href="index.php?action=Myresume"><i class="fas fa-file"></i> <span>Mon CV</span></a>
                </li>
                <li>
                    <a href="index.php?action=viewMyLinkden"><i class="fab fa-linkedin"></i><span>Mon Linkedin</span></a>
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
            <div class="card-body">
                <p style="text-align: center;margin-bottom:20px;font-weight:bold;font-size:20px;"><u>La liste des étudiants</u></p>
                <table class="table" style="background-color: white;width:90%;margin:auto;text-align:center;">
                    <thead>
                        <tr>
                            <th scope="col">Nom </th>
                            <th scope="col">Prénom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($students as $student) {
                            echo "<tr>";
                            echo "<td>" . $student['lastname'] . "</td>";
                            echo "<td>" . $student['firstname'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <footer>
                <p>ECOLE NATIONALE DES SCIENCES APPLIQUEES El JADIDA</p>
            </footer>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require("views/etudiant/components/layout.php");
?>