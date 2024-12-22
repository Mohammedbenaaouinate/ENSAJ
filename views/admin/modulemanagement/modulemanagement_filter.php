 <?php
    $title = "Modules| Filtrer des Modules";
    ob_start();
    ?>


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
                         <li><a href="index.php?action=head_of_school">Directeur</a></li>
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
                 <li>
                     <a href="index.php?action=class"><i class="fas fa-users"></i> <span>Classe</span></a>
                 </li>

                 <li class="submenu active">
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
     <?php
        if (isset($_POST['status'])) {
            if ($_POST['status'] == 1) { ?>
             <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Message: </strong> <?= $_POST['message']; ?>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
         <?php } else { ?>
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <strong>Message :</strong> <?= $_POST['message']; ?>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
     <?php }
        } ?>
     <div class="content container-fluid">
         <div class="page-header">
             <div class="row">
                 <div class="col-sm-12">
                     <div class="page-sub-header">
                         <h3 class="page-title">Modules</h3>
                         <ul class="breadcrumb">
                             <li class="breadcrumb-item">
                                 <a href="index.php?action=module_management">Modules</a>
                             </li>
                             <li class="breadcrumb-item active">Gestion des Modules</li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>

         <div class="student-group-form">
             <form action="index.php?action=filter_module" method="post">
                 <div class="row">
                     <div class="col-lg-5 col-md-6">
                         <div class="form-group local-forms">
                             <select class="form-control select" name="field_id" id="select_sepecialization" required>
                                 <option value="">Sélectionnez Filière</option>
                                 <?php foreach ($specializations as $specialization) {
                                        echo '<option value="' . $specialization['specialization_id'] . '"' . ($specialization['specialization_id'] == $specialization_id ? " selected" : " ") . ">" . $specialization['short_name'] . "</option>";
                                    } ?>
                             </select>
                         </div>
                     </div>

                     <div class="col-lg-5 col-md-6">
                         <div class="form-group local-forms">
                             <select class="form-control select" name="class_id" id="select_class" required>
                                 <option value="">Sélectionnez la Classe</option>
                                 <?php
                                    foreach ($classes as $classe) {
                                        if ($classe['class_id'] == $class_id) {
                                            echo '<option value="' . $classe['class_id'] . '"' . " selected >" . $classe['class_name'] . "</option>";
                                            $class_name = $classe['class_name'];
                                        } else {
                                            echo '<option value="' . $classe['class_id'] . '" >' . $classe['class_name'] . "</option>";
                                        }
                                    }
                                    ?>
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
             <div class="col-sm-12">
                 <div class="card card-table comman-shadow">
                     <div class="card-body">
                         <!-- Start Consigne -->
                         <div class="alert alert-primary alert-dismissible fade show" role="alert">
                             <p class="text-center fw-bold mb-3"> <i class="fa fa-exclamation-triangle me-2"></i>Avant d'ajouter un module ou un élément, il faut suivre les consignes suivantes :</p>
                             <ul style="list-style-type:circle;">
                                 <li>Si vous voulez ajouter un module sans élément, cliquez sur : Ajouter Module</li>
                                 <li>Si un module contient des éléments, il faut ajouter le module avant d'ajouter les éléments qu'il contient.</li>
                                 <li>Pour ajouter un module qui va contenir les éléments,cliquer sur : Ajouter Module_Element </li>
                                 <li>
                                     Pour ajouter un élément : après l'ajout du module qui va contenir les éléments, un bouton apparaîtra intitulé 'Ajouter un élément'.
                                     Cliquez sur ce bouton pour ajouter un élément appartenant au module
                                 </li>
                             </ul>
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                         <!-- End Consigne -->
                         <div class="page-header">
                             <div class="row align-items-center">
                                 <div class="col">
                                     <h3 class="page-title">Gestion des modules </h3>
                                 </div>
                                 <div class="col-auto text-end float-end ms-auto download-grp">
                                     <a href="index.php?action=add-subject" class="btn btn-primary"><i class="fas fa-plus me-2"></i> Ajouter Module</a>
                                     <a href="index.php?action=ajouter-module" class="btn btn-primary"><i class="fas fa-plus me-2"></i> Ajouter Module_Element </a>
                                 </div>
                             </div>
                         </div>

                         <div class="table-responsive">
                             <!-- datatable -->
                             <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped mytable">
                                 <thead class="student-thread">
                                     <tr>
                                         <th>Code du Module</th>
                                         <th>Nom du Module</th>
                                         <th>Intervenant</th>
                                         <th>Email Intervenant</th>
                                         <th>Responsable </th>
                                         <th>classe</th>
                                         <th>Semester</th>
                                         <th>Elements</th>
                                         <th class="text-end">Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <!-- Display Modules sans élément -->
                                     <?php foreach ($subjects as $subject) { ?>
                                         <tr>
                                             <td><?= $subject['modul_code']; ?></td>
                                             <td><?= $subject['modul_name']; ?></td>
                                             <td><?= $subject['intervenant']; ?></td>
                                             <td><a href="mailto:<?= $subject['intervenant_email']; ?>" style="color: #0984e3;text-decoration: underline;"><?= $subject['intervenant_email']; ?></a></td>
                                             <td><?= $subject['firstname'] . "  " . $subject['lastname'] ?></td>
                                             <td><?= $subject['class_name']; ?></td>
                                             <td><?= $subject['semester_name']; ?></td>
                                             <!-- style="background-color:#7ed6df;" -->
                                             <td></td>
                                             <td class="text-end">
                                                 <div class="actions">
                                                     <form action="index.php?action=delete_subject_action" method="post">
                                                         <input type="hidden" name="modul_id" value="<?= $subject['modul_id']; ?>">
                                                         <button type="submit" class="btn btn-sm bg-success-light me-2 delete_edit_hover delete_button_subject" data-subjectname="<?= $subject['modul_name']; ?>"><i class="feather-trash"></i></button>
                                                     </form>
                                                     <form action="index.php?action=edit-subject" method="post">
                                                         <input type="hidden" name="modul_id" value="<?= $subject['modul_id']; ?>">
                                                         <button type="submit" class="btn btn-sm bg-danger-light delete_edit_hover"><i class="feather-edit"></i></button>
                                                     </form>
                                                 </div>
                                             </td>
                                         </tr>
                                     <?php } ?>
                                     <!-- Display Module With Element  -->


                                     <?php
                                        foreach ($modules as $module) {

                                        ?>
                                         <tr>
                                             <!-- style="background-color:#ea8685;" -->
                                             <td><?= $module['module_code']; ?></td>
                                             <td><?= $module['module_name']; ?></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td><?= $module['class_name']; ?></td>
                                             <td><?= $module['semester_name']; ?></td>
                                             <td style="min-width: 1000px;">
                                                 <div class="row ligne p-3">
                                                     <div class="col-lg-2 col-sm-12">
                                                         <p style="color: black;">Nom de l'élement</p>
                                                     </div>
                                                     <div class="col-lg-2 col-sm-12">
                                                         <p style="color: black;">Code de l'élement</p>
                                                     </div>
                                                     <div class="col-lg-2 col-sm-12">
                                                         <p style="color: black;">Intervenant</p>
                                                     </div>
                                                     <div class="col-lg-3 col-sm-12">
                                                         <p style="color: black;">Intervenant Email</p>
                                                     </div>
                                                     <div class="col-lg-2 col-sm-12">
                                                         <p style="color: black;">Responsable</p>
                                                     </div>
                                                     <div class="col-lg-1 col-sm-12">
                                                         <p style="color: black;">Action</p>
                                                     </div>
                                                 </div>
                                                 <?php foreach ($elements as $element) {
                                                        if ($element['module_id'] == $module['module_id']) { ?>
                                                         <div class="row ligne p-3">
                                                             <div class="col-lg-2 col-sm-12">
                                                                 <p><?= $element['element_name']; ?></p>
                                                             </div>
                                                             <div class="col-lg-2 col-sm-12">
                                                                 <p><?= $element['element_code']; ?></p>
                                                             </div>
                                                             <div class="col-lg-2 col-sm-12">
                                                                 <p><?= $element['intervenant_name']; ?></p>
                                                             </div>
                                                             <div class="col-lg-3 col-sm-12">
                                                                 <p><a href="mailto:<?= $element['intervenant_email']; ?>" style="color: #0984e3;text-decoration: underline;"><?= $element['intervenant_email']; ?></a></p>
                                                             </div>
                                                             <div class="col-lg-2 col-sm-12">
                                                                 <p><?= $element['firstname'] . " " . $element['lastname']; ?></p>
                                                             </div>
                                                             <div class="col-lg-1 col-sm-12">
                                                                 <form action="index.php?action=supprimer-element-action" method="post">
                                                                     <input type="hidden" name="element_id" value="<?= $element['element_id']; ?>">
                                                                     <button type="submit" class="btn btn-danger btn-sm delete_edit_hover delete_element_button" data-elementname="<?= $element['element_name']; ?>">Delete</button>
                                                                 </form>
                                                             </div>
                                                         </div>


                                                 <?php }
                                                    } ?>
                                                 <div class="d-flex justify-content-center align-items-center mt-3">
                                                     <form action="index.php?action=ajouter-element" method="post">
                                                         <input type="hidden" name="module_id" value="<?= $module['module_id']; ?>">
                                                         <button type="submit" class="btn btn-sm bg-danger-light delete_edit_hover fw-bold p-2"><i class="fa fa-plus me-3"></i>Ajouter un élément</button>
                                                     </form>
                                                 </div>
                                             </td>
                                             <td class="text-end">
                                                 <div class="actions">
                                                     <form action="index.php?action=supprimer_module_action" method="post">
                                                         <input type="hidden" name="module_id" value="<?= $module['module_id']; ?>">
                                                         <button type="submit" class="btn btn-sm bg-success-light me-2 delete_edit_hover delete_module_avec_element" data-modulename="<?= $module['module_name']; ?>"><i class="feather-trash"></i></button>
                                                     </form>
                                                     <form action="index.php?action=modifier_module_page" method="post">
                                                         <input type="hidden" name="module_id" value="<?= $module['module_id']; ?>">
                                                         <button type="submit" class="btn btn-sm bg-danger-light delete_edit_hover"><i class="feather-edit"></i></button>
                                                     </form>
                                                 </div>
                                             </td>
                                         </tr>
                                     <?php } ?>

                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <footer>
         <p>COPYRIGHT © 2024 ECOLE NATIONALE DES SCIENCES APPLIQUÉES EL JADIDA</p>
     </footer>
 </div>
 <?php
    $content = ob_get_clean();
    require("views/admin/components/layout.php");
    ?>