<?php
$title = "Bibliothécaire | Demandes";
ob_start();

?>

<head>
    <style>
        .book_image {
            width: 60px !important;
            height: 80px !important;
        }
    </style>
</head>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li>
                    <a href="index.php?action=dashboard_bibliothecaire"><i class="feather-grid"></i> <span> Dashboard</span></a>
                </li>
                <li>
                    <a href="index.php?action=category_list"><i class="fa fa-list-alt"></i> <span>Catégorie</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-book"></i> <span>Bouquin</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=show_all_book">Tous les Bouquins</a></li>
                        <li><a href="index.php?action=book_available">Bouquin Disponible</a></li>
                    </ul>
                </li>

                <li class="submenu active">
                    <a href="index.php?action=list_request"><i class="fas fa-hand-holding"></i> <span> Demandes</span></a>

                </li>

                <li>
                    <a href="index.php?action=taken_book"><i class="fas fa-book-reader"></i> <span>Bouquin empruntés</span></a>
                </li>

                <li>
                    <a href="index.php?action=list_rejet"><i class="fas fa-times-circle"></i> <span>Demandes rejetès</span></a>
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
                    <h3 class="page-title">Listes des demandes</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php?action=list_request">Les demandes</a></li>
                        <li class="breadcrumb-item active">Listes des demandes</li>
                    </ul>
                </div>
            </div>
        </div>


        <?php if (isset($_SESSION['message'])) :
            if ($_SESSION['message_type'] == 'success') { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo $_SESSION['message']; ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } elseif ($_SESSION['message_type'] == 'error') { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?php echo $_SESSION['message']; ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <?php unset($_SESSION['message']); ?>
            <?php unset($_SESSION['message_type']); ?>
        <?php endif; ?>
        <?php foreach($message_for_inform_biblio as $msg){?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>il reste une seule copie pour le bouquin :<?= $msg["book_title"];?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php }?>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Demandes des étudiants </h3>
                                </div>

                            </div>
                        </div>

                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>CNE</th>
                                        <th>Etudiant</th>
                                        <th>Classe</th>
                                        <th>Nom de Bouquin</th>
                                        <th>Date de Demande</th>
                                        <th>Date de retour</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($request as $result) { ?>
                                        <tr>
                                            <td>
                                                <h2>
                                                    <a><?= $result["massar_student"]; ?></a>
                                                </h2>
                                            </td>
                                            <td><?= $result["firstname"] . " " . $result["lastname"]; ?></td>
                                            <td><?= $result["class_name"]; ?></td>
                                            <td><img class="book_image" src="assets/bibliothecaires/book/<?= $result["book_image"]; ?>"><?= $result["book_title"]; ?></td>
                                            <td><?= $result["request_date"]; ?></td>
                                            <td><?= $result["expiration_date"]; ?></td>
                                           
                                                <div id="top-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                <form action="index.php?action=refuse_request" method="post">
                                                <input type="hidden" name="student" value="<?= $result["student_id"]; ?>">
                                                <input type="hidden" name="book" value="<?= $result["book_id"]; ?>">
                                                <input type="hidden" name="date_retour" value="<?= $result["expiration_date"]; ?>">

                                                    <div class="modal-dialog modal-top">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="topModalLabel">Motif de rejet</h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h6>Saisir la cause de rejet :</h6>
                                                                    <textarea name="message" id="" class="form-control" placeholder="Saisir le motif"></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">Annuler</button>
                                                                <button type="submit" class="btn btn-primary">Envoyer</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>

                                                </div>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="index.php?action=accept_request&etudiant_id=<?= $result["student_id"]; ?>&book_id=<?= $result["book_id"]; ?>&date_retour=<?= $result["expiration_date"]; ?>" class="btn btn-sm bg-success me-2" style="color: white;">
                                                        <i class="feather-check"></i>
                                                    </a>

                                                    <a data-bs-toggle="modal" data-bs-target="#top-modal"  class="btn btn-sm bg-danger" style="color: white;">
                                                        <i class="feather-trash"></i>
                                                    </a>
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

    <script>
        function reject_Request(student, book, date) {
            if (confirm("Etes vous sur de vouloir rejeter cette demande")) {
                window.location.href = "index.php?action=refuse_request&etudiant_id=" + student + "&book_id=" + book + "&date_retour=" + date;
            }
        }
    </script>

    <footer>
        <p>COPYRIGHT © 2024 ECOLE NATIONALE DES SCIENCES APPLIQUÉES EL JADIDA</p>
    </footer>

</div>

<?php $content = ob_get_clean(); ?>
<?php require_once("views/admin/components/layout_biblio.php") ?>