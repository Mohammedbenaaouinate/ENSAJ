<?php
$title = "Planning | Gestion";
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

        <li>
          <a href="index.php?action=module_management"><i class="fas fa-book-reader"></i> <span>Modules & Elements</span></a>
        </li>

        <li class="menu-title">
          <span>Gestion</span>
        </li>


        <li class="submenu active">
          <a href="#"><i class="fas fa-calendar-day"></i>
            <span> planning </span> <span class="menu-arrow"></span>
          </a>
          <ul>
            <a href="index.php?action=planning" class="active"> <span>Création</span></a>
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
      <div class="row align-items-center">
        <div class="col">
          <h3 class="page-title">planning</h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php?action=planning">planning</a>
            </li>
            <li class="breadcrumb-item active">Création</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col"></div>
        <div class="col-auto text-end float-end ms-auto">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodel">
            <i class="fas fa-plus"></i>
          </button>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-body">
            <div id="Admin_calender"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Start  Modal Pour Ajouter Un événement -->
  <div class="modal fade" id="addmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="index.php?action=add_event" method="post">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un évenement</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-2">
              <label class="form-label">Titre de l' événement <span style="color: red;">*</span></label>
              <input type="text" class="form-control" name="event_title" style="height: 34px !important;" required>
            </div>
            <div class="mb-2">
              <label class="form-label">Description de l'événement</label>
              <div>
                <textarea class="w-100" name="description" rows="2" style="padding: 5px; border: 1px solid #ddd; color: #333;font-size: 15px"></textarea>
              </div>
            </div>
            <div class="mb-2">
              <label class="form-label">Saisir la date de début l'évenement <span style="color: red;">*</span></label>
              <input type="date" class="form-control" name="start_date" required>
            </div>
            <div class="mb-2">
              <label class="form-label">Saisir la date de fin l'évenement <span style="color: red;">*</span></label>
              <input type="date" class="form-control" placeholder="Saisir la date de fin l'évenement" name="end_date" required>
            </div>
            <div class="mb-2">
              <label class="form-label">Choisissez une couleur</label>
              <input type="color" class="form-control" name="color" value="#1abc9c" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End  Modal Pour Ajouter Un événement -->

  <!-- Start Modal Pour Modifier Un événement -->
  <div class="modal fade" id="editEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <form action="index.php?action=update_event" method="post">
            <div class="modal-header">
              <h1 class="modal-title fs-5">Modifier ou Supprimer un évenement</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-2">
                <label class="form-label">Titre de l' événement</label>
                <input type="text" class="form-control" placeholder="Saisir le Titre de Votre evénemet" name="event_title" id="event_title" required>
              </div>
              <div class="mb-2">
                <label class="form-label">Description de l'événement</label>
                <div>
                  <textarea class="w-100" name="description" rows="2" id="description" style="padding: 5px; border: 1px solid #ddd; color: #333;font-size: 15px"></textarea>
                </div>
              </div>
              <div class="mb-2">
                <label class="form-label">Saisir la date de début l'évenement</label>
                <input type="date" class="form-control" placeholder="Saisir la date de début l'évenement" name="start_date" id="start_date" required>
              </div>
              <div class="mb-2">
                <label class="form-label">Saisir la date de fin l'évenement</label>
                <input type="date" class="form-control" placeholder="Saisir la date de fin l'évenement" name="end_date" id="end_date" required>
              </div>
              <div class="mb-2">
                <label class="form-label">Choisissez une couleur: </label>
                <input type="color" class="form-control" id="color" name="color" required>
              </div>
              <div class="mb-2">
                <input type="hidden" class="form-control" id="event_id" name="event_id">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="edit_event_button">Modifier</button>
              <button type="button" class="btn btn-danger" id="delete_event_button">Supprimer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal Pour Modifier un événement -->
  <footer>
    <p>COPYRIGHT © 2024 ECOLE NATIONALE DES SCIENCES APPLIQUÉES EL JADIDA</p>
  </footer>
</div>
<?php
$content = ob_get_clean();
require("views/admin/components/layout.php");
?>