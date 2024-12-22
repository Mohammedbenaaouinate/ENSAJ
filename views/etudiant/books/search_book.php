<?php
$title = "Etudiant | search_book";
ob_start();
?>

<head>
    <style>
        .image_book {
            height: 480px !important;
        }

        .rechercher {
            background-color: blue;
            padding: 11px;
            color: white;
            border-radius: 5px;
            border: none;
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
                <li>
                    <a href="index.php?action=student_list"><i class="fas fa-list"></i> <span>Liste des étudiants</span></a>
                </li>
                <li class="submenu active">
                    <a href="#"><i class="fas fa-book"></i> <span>Bouquins</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=all_books" class="active">Tous les bouquins</a></li>
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
        <form action="index.php?action=student_search_book" method="post">
            <div class="student-group-form">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group local-forms">
                            <select class="form-control select" name="category">
                                <option value="">Rechercher par la catégorie de bouquin</option>
                                <?php foreach ($categories as $result) {
                                    if ($result["category_id"] == $category) {
                                        echo '<option value="' . $result["category_id"] . '" selected>' . $result["name_category"] . '</option>';
                                    } else {
                                        echo '<option value="' . $result["category_id"] . '">' . $result["name_category"] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Rechercher par ISBN" name="isbn" value="<?php echo ($isbn != "nulle" ? $isbn : ""); ?>">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Rechercher par Nom" name="name" value="<?php echo ($name != "nulle" ? $name : ""); ?>">
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="search-student-btn">
                            <button type="submit" class="rechercher" name="search">Rechercher</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <?php foreach ($all_book as $book) { ?>
                <!-- Start Modal -->
                <div id="date-modal-<?= $book['book_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="index.php?action=student_request_book" method="post">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="standard-modalLabel">
                                        Sélectionner la date de retour
                                    </h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <label>Date de retour&nbsp;<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control expiration_date" name="expiration_date" placeholder="Choisir la date de retour" required>
                                    </div>
                                    <div>
                                        <input type="hidden" name="book_id" value="<?= $book['book_id']; ?>" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        Envoyer la demande
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Modal  -->
                <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                    <div class="blog grid-blog flex-fill">
                        <div class="blog-image">
                            <a href="#"><img class="img-fluid image_book" src="assets/bibliothecaires/book/<?= $book["book_image"]; ?>" alt="Post Image"></a>
                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">

                                        <span>
                                            <span class="post-title">ISBN:<?= $book["isbn"]; ?></span>
                                            <span class="post-date"><i class="far fa-clock"></i> <?= $book["date_pub"]; ?></span>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="blog-title"><a href="blog-details.html"><?= $book["book_title"]; ?></a></h3>
                            <p><?= $book["description"]; ?></p>
                        </div>
                        <div class="row">
                            <div class="edit-options d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#date-modal-<?= $book['book_id']; ?>">
                                    demander
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>

    </div>

    <footer>
        <p>ECOLE NATIONALE DES SCIENCES APPLIQUEES El JADIDA</p>
    </footer>
</div>
<script>
    let search_btn = document.getElementsByName("search")[0];
    search_btn.addEventListener("click", function(e) {
        let category = document.getElementsByName("category")[0].value;
        let isbn = document.getElementsByName("isbn")[0].value;
        let name = document.getElementsByName("name")[0].value;
        if (category == "" && isbn == "" && name == "") {
            e.preventDefault();
            alert("Vous devez remplir l'un des champs avant de cliquer sur 'Rechercher'.");
        }
    });
</script>
<script>
    // Fonction pour formater la date en format YYYY-MM-DD
    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;

        return [year, month, day].join('-');
    }

    // Quand le document est prêt
    document.addEventListener("DOMContentLoaded", function() {
        var today = new Date();
        var oneWeekLater = new Date();
        oneWeekLater.setDate(today.getDate() + 7); // Ajouter 7 jours à la date actuelle

        // Formater les dates en format YYYY-MM-DD
        var minDate = formatDate(today);
        var maxDate = formatDate(oneWeekLater);

        // Sélectionner tous les inputs de date avec la classe 'date-input'
        var expirationDateInputs = document.querySelectorAll(".expiration_date");

        // Appliquer les attributs min et max à chaque input
        expirationDateInputs.forEach(function(input) {
            input.setAttribute("min", minDate);
            input.setAttribute("max", maxDate);
        });
    });
</script>
<?php
$content = ob_get_clean();
require("views/etudiant/components/layout.php");
?>