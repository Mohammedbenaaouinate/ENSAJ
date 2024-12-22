      <?php
      $title = "Users | filter Students";
      ob_start();
      ?>
      <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
          <div id="sidebar-menu" class="sidebar-menu">
            <ul>
              <li class="menu-title">
                <span>Menu Principal</span>
              </li>
              <li>
                <a href="index.php?action=dashboard"><i class="feather-grid"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                <ul>
                  <li><a href="index.php?action=dashboard">Admin Dashboard</a></li>
                </ul>
              </li>
              <li class="submenu active">
                <a href="#"><i class="fas fa-user"></i> <span> Utilisateurs</span> <span class="menu-arrow"></span></a>
                <ul>
                  <li><a href="index.php?action=head_of_school">Directeur</a></li>
                  <li><a href="index.php?action=admins">Administrateur</a></li>
                  <li><a href="index.php?action=students" class="active">Etudiants</a></li>
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

              <li>
                <a href="index.php?action=module_management"><i class="fas fa-book-reader"></i> <span>Modules & Elements</span></a>
              </li>

              <li class="menu-title">
                <span>Gestion</span>
              </li>


              <li>
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

        <div class="content container-fluid">
          <div class="page-header">
            <div class="row">
              <div class="col-sm-12">
                <div class="page-sub-header">
                  <h3 class="page-title">Etudiants</h3>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="index.php?action=students">Etudiant</a>
                    </li>
                    <li class="breadcrumb-item active">Tous Etudiants</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>


          <div class="student-group-form">
            <form action="index.php?action=filter_students" method="post">
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
                  <div class="page-header">
                    <div class="row align-items-center">
                      <div class="col">
                        <h3 class="page-title">Etudiants</h3>
                      </div>
                      <div class="col-auto text-end float-end ms-auto download-grp">
                        <button class="btn btn-outline-primary me-2" id="print_student_button"><i class="fas fa-print"></i> Imprimer</button>
                        <a href="index.php?action=add-student" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive" id="print_student_classe">
                    <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                      <p class="text-center fw-bold">La liste des étudiants de la classe <?= $class_name; ?></p>
                      <thead class="student-thread">
                        <tr>
                          <th>Massar</th>
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>CIN</th>
                          <th>Apogée</th>
                          <th>Email</th>
                          <th>Date Naissance</th>
                          <th>Nationnalité</th>
                          <th>Téléphone</th>
                          <th>Sexe</th>
                          <th>Adresse</th>
                          <th class="text-end">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($same_students as $student) { ?>
                          <tr <?php echo ($student['student_id'] == $student['responsable_id']) ? "style='background-color:#c7ecee'" : ""; ?>>
                            <td><?= $student['massar_student']; ?></td>
                            <td>
                              <h2 class="table-avatar">
                                <a href="#" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="<?= "assets/students/" . $student['image_path']; ?>" alt="User Image" /></a>
                                <a href="#"><?= $student['lastname']; ?></a>
                              </h2>
                            </td>
                            <td><?= $student['firstname']; ?></td>
                            <td><?= $student['cin_student']; ?></td>
                            <td><?= $student['student_apoge']; ?></td>
                            <td><a href="mailto:<?= $student['email']; ?>" style="color:blue;"><u><?= $student['email']; ?></u></a></td>
                            <td><?= $student['birth_date']; ?></td>
                            <td><?= $student['nationality']; ?></td>
                            <td><?= $student['phone_number']; ?></td>
                            <td><?= $student['sexe']; ?></td>
                            <td><?= $student['student_adress']; ?></td>
                            <td class="text-end">
                              <div class="actions">
                                <form action="index.php?action=delete-student-action" method="post">
                                  <input type="hidden" name="student_id" value="<?= $student['student_id']; ?>">
                                  <button type="submit" class="btn btn-sm bg-success-light me-2 delete_edit_hover delete_button" data-firstname="<?= $student['firstname']; ?>" data-lastname="<?= $student['lastname']; ?>"><i class="feather-trash"></i></button>
                                </form>
                                <form action="index.php?action=edit-student" method="post">
                                  <input type="hidden" name="student_id" value="<?= $student['student_id']; ?>">
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
          <p>Copyright © 2024 Ecole Nationale Des Sciences Appliquées El Jadida</p>
        </footer>
      </div>
      <?php
      $content = ob_get_clean();
      require_once("views/admin/components/layout.php");
      ?>