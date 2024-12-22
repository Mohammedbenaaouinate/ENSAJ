<?php
$title = "Admin | Emploi";
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
                            <li><a href="index.php?action=head_of_school">Directeur</a></li>
                            <li><a href="index.php?action=admins">Administrateur</a></li>
                            <li><a href="index.php?action=students">Etudiants</a></li>
                            <li><a href="index.php?action=teachers">Professeur</a></li>
                            <li><a href="index.php?action=librarians">Bibliothécaire</a></li>
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

                    <li class="submenu">
                        <a href="#"><i class="fas fa-book-reader"></i> <span> Modules & Elements</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="index.php?action=subjects">Gestion des Modules</a></li>
                            <li><a href="index.php?action=subsubjects">Gestion des Elements</a></li>
                        </ul>
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
                            <a href="index.php?action=print"><span>Impression</span></a>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?action=salle"><i class="fas fa-door-open"></i> <span>Salle</span></a>
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

                    <li class="submenu active">
                        <a href="#"><i class="fas fa-table"></i> <span>Emploi</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="index.php?action=list_schedule" class="active">Liste des Emplois</a></li>
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
                        <h3 class="page-title">Gestion des Emplois</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?action=list_schedule">Liste des emplois</a></li>
                            <li class="breadcrumb-item active">Emploi</li>
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
                                <h4 class="emploi">EMPLOI DE TEMPS </h4>
                                <?php
                                $year = $name_class["class_year"];
                                $tab = explode(" ", $year);
                                if ($tab[1] == 1) {
                                ?>
                                    <p class="classe"><?php echo $tab[1]; ?> <sup>ère</sup> <?php echo $name_class["fullname"]; ?> (<?php echo $_GET["sem"]; ?> /<?php echo date("Y") ?>)</p>
                                <?php } else { ?>
                                    <p class="classe"><?php echo $tab[1]; ?> <sup>ème</sup> <?php echo $name_class["fullname"]; ?> (<?php echo $_GET["sem"]; ?> /<?php echo date("Y") ?>)</p>
                                <?php } ?>
                            </div>

                            <table class=" border-0 table-hover table-center mb-0 " style="border: 2px solid black;">
                                <thead>
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
                                            <th><?php echo $days[$i]; ?>
                                            </th>
                                            <?php for ($j = 0; $j < 4; $j++) { ?>
                                                <td style="width:250px">
                                                    <?php
                                                    foreach ($view_schedule as $view) { ?>
                                                        <?php if ($days[$i] == $view["day"] && $view["time"] == $hours[$j]) { ?>
                                                            <div class="module"><?php echo $view["modul_code"]; ?></div>
                                                            <div class="module"><?php echo $view["firstname"] . " " . $view["lastname"]; ?></div>
                                                            <div><?php echo "<b>" . $view["type"] . "</b>" . " " ?>| S<?php echo $view["de"] ?>-S<?php echo $view["a"] . " " ?>[<?php echo $view["classroom_name"]; ?>]</div>
                                                    <?php }
                                                    } ?>


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
            <p>Copyright © ENSAJ.</p>
        </footer>

    </div>

    </div>
    <!-- <script>
                                function printDiv(divId) {
                                    var printContents = document.getElementById(divId).innerHTML;
                                    var originalContents = document.body.innerHTML;
                                    var popupWin = window.open('', '_blank', 'width=600,height=600');
                                    popupWin.document.open();
                                    popupWin.document.write('<html><head><title>Copyright © ENSAJ</title><style>' +
                                        'table { width: 100%; text-align: center; border-collapse: collapse; }' +
                                        'td, th, thead { border: black solid 2px; }' +
                                        'thead, tbody th { background-color: rgb(158, 234, 232); }' +
                                        'td { height: 75px; }' +
                                        '.emploi, .classe { text-align: center; }' +
                                        '.classe { font-size: 18px; }' +
                                        '.img_header { width: 180px; height: 90px; }' +
                                        '.no-print { display:none}' +
                                        '.header_line { background-color: blue; height: 5px !important; border-radius: 5px; }' +
                                        '</style></head><body onload="window.print()">' + printContents + '</body></html>');
                                    popupWin.document.close();
                                    setTimeout(function () {
                                        popupWin.close();
                                    }, 10);
                                }
                            </script> -->
    <!-- <script>
            function printDiv(divId) {
                var printContents = document.getElementById(divId).innerHTML;
                var originalContents = document.body.innerHTML;
                var popupWin = window.open('', '_blank', 'width=600,height=600');
               
                popupWin.document.open();
                popupWin.document.write(`
                    <html>
                    <head>
                        <title>Impression Emploi de Temps</title>
                        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                        <style>
                            table { width: 100%; text-align: center; border-collapse: collapse; }
                            td, th, thead { border: black solid 2px; }
                            thead, tbody th { background-color: rgb(158, 234, 232); }
                            td { height: 75px; }
                            .emploi, .classe { text-align: center; }
                            .classe { font-size: 18px; }
                            .img_header { width: 180px; height: 90px; }
                            .no-print { display: none; }
                            .header_line { background-color: blue; height: 5px !important; border-radius: 5px; }
                        </style>
                    </head>
                    <body onload="window.print()">
                        ${printContents}
                    </body>
                    </html>
                `);
                popupWin.document.close();
            }
</script> -->
    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;
            var popupWin = window.open('', '_blank', 'width=800,height=600'); // Ajustez la taille selon vos besoins pour le format paysage

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