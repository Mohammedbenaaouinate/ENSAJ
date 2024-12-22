<?php
$title = "Admin | Salle Disponible";
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
            background-color: rgb(64, 222, 148);
        }

        td {
            height: 75px;
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
            font-size: 14px;
            color: black;
        }

        .departement {
            font-weight: bold;
            color: black;
            margin-top: 30px
        }

        .circle-dispo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: green;
        }
    </style>
</head>

<body>



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
                            <li><a href="index.php?action=head_of_school">Directeur</a> </li>
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

                    <li class="submenu active">
                        <a href="#"><i class="fas fa-door-open"></i>
                            <span>Salle</span> <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <a href="index.php?action=salle"> <span>Gestion des salles</span></a>
                            <a href="index.php?action=available_salle_admin" class="active"><span>Salles Disponibles</span></a>
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
                    <div class="col">
                        <h3 class="page-title">Listes des salles Disponibles</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?action=available_salle_admin">Listes des salles</a></li>
                            <li class="breadcrumb-item active">Salle Disponible</li>
                        </ul>
                    </div>
                </div>
            </div>


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
                                <h4 class="emploi">Listes des salles Disponibles</h4>
                            </div>
                            <div>
                                <p><img src="assets/img/circle_green.png" alt="">Disponible</p>
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
                                                    <?php
                                                    $name_room = '';
                                                    $count = 0; ?>
                                                    <?php foreach ($lists_available_classroom as $available) { ?>
                                                        <?php foreach ($lists_schedule_classroom as $schedule_available) { ?>
                                                            <?php if ($days[$i] == $schedule_available["day"] && $schedule_available["time"] == $hours[$j]) { ?>
                                                                <?php if ($available["classroom_id"] == $schedule_available["classroom_id"]) { ?>
                                                                <?php $name_room = $available["classroom_name"];
                                                                } ?>

                                                            <?php } ?>
                                                        <?php } ?>
                                                        <?php if ($name_room != $available["classroom_name"]) { ?>
                                                            <div style="color:green" class="module">[<?php echo $available["classroom_name"]; ?>]</div>
                                                        <?php $name_room = '';
                                                        } ?>

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
                        background-color: rgb(64, 222, 148); 
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
    <?php require_once "views/admin/components/layout.php"; ?>