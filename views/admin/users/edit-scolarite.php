<?php
$title = "scolarité | edit-scolarité";
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
            <li><a href="index.php?action=students">Etudiants</a></li>
            <li><a href="index.php?action=teachers">Professeur</a></li>
            <li><a href="index.php?action=librarians">Bibliothécaire</a></li>
            <li><a href="index.php?action=scolarite" class="active">Scolarité</a></li>
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
      <div class="row d-flex align-items-center justify-content-center ">
        <div class="d-flex justify-content-center align-items-center">
          <h5 class="page-title">Modification d'un membre de scolarité</h5>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <form action="index.php?action=update-scolarite-action" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>Prenom <span class="login-danger">*</span></label>
                    <input class="form-control" type="text" placeholder="Saisir Le Prenom" name="firstname" value="<?= $scolarite['firstname']; ?>" required />
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>Nom <span class="login-danger">*</span></label>
                    <input class="form-control" type="text" placeholder="Saisir le Nom" name="lastname" value="<?= $scolarite['lastname']; ?>" required />
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>Numéro de Téléphone <span class="login-danger">*</span></label>
                    <input class="form-control" type="tel" placeholder="0612131415" name="phone_number" value="<?= $scolarite['phone_number']; ?>" pattern="[0-9]{10}" required />
                  </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                  <div class="form-group local-forms">
                    <label>Email <span class="login-danger">*</span></label>
                    <div class="col-lg-12">
                      <div class="input-group">
                        <?php
                        $email = explode("@", $scolarite['email']);
                        ?>
                        <input type="text" class="form-control" placeholder="Saisir mail Académique" name="email" value="<?= $email[0]; ?>" required />
                        <span class="input-group-text">@ensaj.ma</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="form-group local-forms">
                    <label>mot de passe <span class="login-danger">*</span></label>
                    <input type="text" class="form-control" name="password" placeholder="Saisir le mot de passe" />
                  </div>
                </div>
                <div class="col-lg-6 col-sm-6 mb-4">
                  <div class="form-group students-up-files">
                    <label>Télécharger L'image (150px X 150px)</label>
                    <div class="uplod">
                      <label class="file-upload image-upbtn mb-0">
                        choisir l'image<input type="file" name="image_path" />
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <input type="hidden" class="form-control" name="employee_id" value="<?= $scolarite['employee_id']; ?>" required />
                </div>
                <div class="col-12 col-sm-4">
                  <input type="hidden" class="form-control" name="old_image_path" value="<?= $scolarite['image_path']; ?>" required />
                </div>
                <div class="col-12">
                  <div class="student-submit">
                    <button type="submit" class="btn btn-primary">
                      modifier
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$content = ob_get_clean();
include("views/admin/components/layout.php");
?>