<?php
$title = "Etudiant | Emploi";
ob_start();
?>


<head>

    <style>
        table {
            width: 100%;
            text-align: center;
        }

        td,
        th,
        thead {
            border: black solid 2px;
        }

        thead,
        tbody th {
            background-color: rgb(158, 234, 232);
        }

        td {
            height: 75px;
        }

        td:hover {
            background-color: rgb(19, 97, 214);
        }

        button {
            width: 100%;
        }

        .emploi,
        .classe {
            text-align: center;
        }

        .classe {
            font-size: 18px;
        }

        .img_header {
            width: 180px;
            height: 90px;
        }

        .header_line {
            background-color: blue;
            height: 5px !important;
            border-radius: 5px;
        }

        .module {
            font-weight: bold;
            color: black;
        }

        .departement {
            font-weight: bold;
            color: black;
            margin-top: 30px
        }
    </style>
</head>

<body>


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
                    <li class="submenu">
                        <a href="#"><i class="fas fa-book"></i> <span>Bouquins</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li><a href="index.php?action=all_books">Tous les bouquins</a></li>
                            <li><a href="index.php?action=request_books">Mes Demandes</a></li>
                        </ul>
                    </li>
                    <li class="submenu active">
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
                        <a href="index.php?action=logout_users"><i class="fas fa-sign-out-alt"></i> <span>Déconnexion</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </div>




    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Emploi</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?action=show_schedule_student">Emploi du temps</a></li>
                            <li class="breadcrumb-item active">voir Emploi</li>
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
                <?php }  ?>
                <?php unset($_SESSION['message']); ?>
                <?php unset($_SESSION['message_type']); ?>
            <?php endif; ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body" id="printArea">


                            <div class="form-group row">

                                <div class="col-md-10">
                                    <img class="img_header" src="views/admin/schedule/UCD.png" alt="">
                                </div>

                                <div class="col-md-2">
                                    <img class="img_header" src="views/admin/schedule/lensaj.png" alt="">
                                </div>

                            </div>
                            <hr class="header_line">
                            <div class="form-group row">
                                <h4 class="emploi">EMPLOI DE TEMPS </h4>
                                <?php
                                if (!empty($name_class["class_year"] && !empty($semester['semester_name']))) {
                                    $year = $name_class["class_year"];

                                    $tab = explode(" ", $year);
                                    if ($tab[1] == 1) {
                                ?>
                                        <p class="classe"><?php echo $tab[1]; ?> <sup>ère</sup> Année <?php echo $name_class["fullname"]; ?> (<?php echo $semester['semester_name'] ?> /<?php echo date("Y") ?>)</p>
                                    <?php } else { ?>
                                        <p class="classe"><?php echo $tab[1]; ?> <sup>ème</sup> Année <?php echo $name_class["fullname"]; ?> (<?php echo $semester['semester_name'] ?> /<?php echo date("Y") ?>)</p>
                                    <?php } ?>
                                <?php } ?>
                            </div>

                            <table class=" border-0 table-center mb-0 " style="border: 2px solid black;">
                                <thead class="header_table">
                                    <tr>
                                        <th></th>
                                        <th>08h30 - 10h20</th>
                                        <th>10h30 - 12h20</th>
                                        <th>13h30 - 15h20</th>
                                        <th>15h30 - 17h20</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $days = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
                                    $hours = ["08h30 - 10h20", "10h30 - 12h20", "13h30 - 15h20", "15h30 - 17h20"];
                                    for ($i = 0; $i < 6; $i++) { ?>
                                        <tr>
                                            <th><?php echo $days[$i]; ?></th>
                                            <?php for ($j = 0; $j < 4; $j++) { ?>

                                                <td style="width:250px">
                                                    <?php foreach ($view_schedule as $view) { ?>
                                                        <?php if ($days[$i] == $view["day"] && $view["time"] == $hours[$j]) { ?>
                                                            <div class="module"><?php echo $view["modul_code"]; ?></div>
                                                            <div class="module"><?php echo $view["firstname"] . " " . $view["lastname"]; ?></div>
                                                            <div><?php echo "<b>" . $view["type"] . "</b>" . " " ?>| S<?php echo $view["de"] ?>-S<?php echo $view["a"] . " " ?>[<?php echo $view["classroom_name"]; ?>]</div>

                                                        <?php } ?>
                                                    <?php } ?>

                                                </td>

                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <button onclick="printDiv('printArea')" class="btn btn-primary mt-4 no-print"><i class="fas fa-print" style="margin-right:10px;"></i>Imprimer</button>

                        </div>

                    </div>

                </div>
            </div>


        </div>

        <footer>
            <p>COPYRIGHT © 2024 ECOLE NATIONALE DES SCIENCES APPLIQUÉES EL JADIDA</p>
        </footer>

    </div>

    </div>

    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;
            var popupWin = window.open('', '_blank', 'width=2000,height=600'); // Ajustez la taille selon vos besoins pour le format paysage

            popupWin.document.open();
            popupWin.document.write(`
            <html>
            <head>
                <title>Impression Emploi de Temps</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

                <style>
                    @page {
                        size: landscape; /* Définit la taille de la page en mode paysage */
                        margin: 0; /* Ajuste les marges de la page à 0 */
                    }
                    body {
                        margin: 1cm; /* Ajoute une marge de 1cm autour du contenu */
                    }
                    table { 
                        width: 100%; 
                        text-align: center; 
                        border-collapse: collapse; 
                    }
                    td, th, thead { 
                        border: black solid 2px; 
                    }
                    thead, tbody th { 
                        background-color: rgb(158, 234, 232); 
                    }
                    td { 
                        height: 75px; 
                    }
                    th{
                        width:35px;
                    }
                    .emploi, .classe { 
                        text-align: center; 
                    }
                    .classe { 
                        font-size: 18px; 
                    }
                    .img_header { 
                        width: 180px; 
                        height: 90px; 
                    }
                    .no-print { 
                        display: none; 
                    }
                    .header_line { 
                        background-color: blue; 
                        height: 5px !important; 
                        border-radius: 5px; 
                    }
                    .module{
                        font-weight: bold;
                        color:black;
                    }
                    .departement{
                        font-weight: bold;
                        color:black;
                        margin-top:30px
                    }
                </style>
            </head>
            <body onload="window.print()">
                ${printContents}
            </body>
            </html>
        `);
            popupWin.document.close();
        }
    </script>



    <?php $content = ob_get_clean(); ?>
    <?php require("views/etudiant/components/layout.php"); ?>