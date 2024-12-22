<?php
$title = "Planning | Read PDF";
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
            <a href="index.php?action=planning"> <span>Création</span></a>
            <a href="index.php?action=print"><span>Evenements</span></a>
            <a href="index.php?action=pdf_planning" class="active"><span>planning</span></a>
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
              <a href="index.php?action=pdf_planning">planning</a>
            </li>
            <li class="breadcrumb-item active">Affichage</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="index.php?action=save_planning" method="post" enctype="multipart/form-data" class="border-bottom">
              <div class="d-flex justify-content-evenly align-items-center mb-3">
                <label class="fw-bold">Télécharger le planning:</label>
                <input class="form-control" type="file" name="planning" style="max-width: 50% !important;" accept="application/pdf" required />
                <button type="submit" class="btn btn-primary"> Enregistrer</button>
              </div>
            </form>
            <div class="row">
              <center> <embed src="assets/planning_pdf/planning.pdf" type="application/pdf" width="100%" height="800px" /></center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center align-items-center mb-3">
    <button class="btn btn-primary" style="width: 70% !important;" onclick="printPDF()"><i class="fa fa-print"></i> Imprimer</button>
  </div>

  <footer>
    <p>COPYRIGHT © 2024 ECOLE NATIONALE DES SCIENCES APPLIQUÉES EL JADIDA</p>
  </footer>
</div>
<script>
  let url = 'assets/planning_pdf/planning.pdf';

  function printPDF() {
    const iframe = document.createElement('iframe');
    iframe.style.position = 'absolute';
    iframe.style.width = '0px';
    iframe.style.height = '0px';
    iframe.src = url;
    document.body.appendChild(iframe);
    iframe.contentWindow.focus();
    iframe.contentWindow.print();
  }
</script>
<?php
$content = ob_get_clean();
require("views/admin/components/layout.php");
?>