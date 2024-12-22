<?php
$title = "Admin | Emploi des DS";
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
        /* .header_table th{
            width: 10px !important;
        } */
        thead,
        tbody th {
            background-color: rgb(158, 234, 232);
        }

        td {
            height: 75px;
        }
        td:hover{
            background-color:rgb(19, 97, 214);
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
        .departement{
            font-weight: bold;
            color:black;
            margin-top:30px
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
                <li >
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

                <li class="submenu active">
                    <a href="#"><i class="fa fa-list-alt"></i> <span>Planning exams</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="index.php?action=schedule_admin_classes_exam" class="active">Session normale</a></li>
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
                        <h3 class="page-title">Gestion des Emplois</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?action=schedule_admin_classes_exam">Session normale</a></li>
                            <li class="breadcrumb-item active">Emploi des examens</li>
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
                                <h4 class="emploi">CALENDRIER DES DS SESSION NORMALE </h4>
                                <?php
                                if(!empty($name_class["class_year"])){
                                    $year = $name_class["class_year"];

                                $tab = explode(" ", $year);
                                if ($tab[1] == 1) {
                                ?>
                                    <p class="classe"><?php echo $tab[1]; ?> <sup>ère</sup>Année <?php echo $name_class["fullname"]; ?> (<?php echo $semester ?> /<?php echo date("Y") ?>)</p>
                                <?php } else { ?>
                                    <p class="classe"><?php echo $tab[1]; ?> <sup>ème</sup>Année <?php echo $name_class["fullname"]; ?> (<?php echo $semester ?> /<?php echo date("Y") ?>)</p>
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
                                    <?php
                                    $days = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
                                    $hours = ["08h30 - 10h20", "10h30 - 12h20", "13h30 - 15h20", "15h30 - 17h20"];
                                    
                                    for ($i = 0; $i < 6; $i++) { ?>
                                        <tr>
                                            <th><?php echo htmlspecialchars($days[$i]); ?></th>
                                            <?php
                                            for ($j = 0; $j < 4; $j++) { 
                                                $data_prof = '';
                                                $data_module = '';
                                                $data_classroom = '';
                                                $data_second_prof ='';
                                                $data_third_prof ='';

                                                foreach ($view_schedule as $view) {
                                                    if ($days[$i] == $view["day"] && $view["time"] == $hours[$j]) {
                                                        $data_prof = htmlspecialchars($view["firstname"]." ".$view["lastname"]);
                                                        $data_module = htmlspecialchars($view["modul_code"]);
                                                        $data_classroom = htmlspecialchars($view["classroom_name"]);
                                                        $data_second_prof = htmlspecialchars($view["first_prof"]);
                                                        $data_third_prof = htmlspecialchars($view["second_prof"]);
                                                    }
                                                }
                                            ?>
                                                <td style="width:250px" 
                                                    data-day="<?php echo htmlspecialchars($days[$i]); ?>" 
                                                    data-hour="<?php echo htmlspecialchars($hours[$j]); ?>" 
                                                    data-semestre="<?php echo htmlspecialchars($semester); ?>" 
                                                    data-classe="<?php echo htmlspecialchars($class_name); ?>"
                                                    data-prof="<?php echo $data_prof; ?>"
                                                    data-module="<?php echo $data_module; ?>"
                                                    data-classroom="<?php echo $data_classroom; ?>">
                                                    <?php if (!empty($data_prof) && empty($data_second_prof) && empty($data_third_prof)) { ?>
                                                        <div class="module"><?php echo $data_module; ?></div>
                                                        <div class="module"><?php echo $data_prof; ?></div>
                                                        <div>[<?php echo $data_classroom; ?>]</div>
                                                    <?php }elseif(!empty($data_prof) && !empty($data_second_prof) && empty($data_third_prof)){ ?>
                                                        <div class="module"><?php echo $data_module; ?></div>
                                                        <div class="module"><?php echo $data_prof."/".$data_second_prof; ?></div>
                                                        <div>[<?php echo $data_classroom; ?>]</div>

                                                    <?php }elseif(!empty($data_prof) && !empty($data_second_prof) && !empty($data_third_prof)){ ?>
                                                        <div class="module"><?php echo $data_module; ?></div>
                                                        <div class="module"><?php echo $data_prof."/".$data_second_prof."/".$data_third_prof; ?></div>
                                                        <div>[<?php echo $data_classroom; ?>]</div>
                                                    <?php } ?>

                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <button onclick="printDiv('printArea')" class="btn btn-primary mt-4 no-print"><i class="fas fa-print" style="margin-right:10px;"></i>Imprimer</button>
                            <a onclick="Delete_normal('<?= $class_name; ?>','<?= $semester; ?>')" style="width:100%" class="btn btn-danger mt-4 no-print"><i class="fas fa-trash" style="margin-right:10px;"></i>Vider Ce emploi</a>
                        </div>

                    </div>

                </div>
            </div>


    <script>
        function Delete_normal($name,$semester){

            if(confirm("Etes vous sur de vouloir vider ce emploi pour cette classe ?")){
                window.location.href='index.php?action=delete_schedule_normal_for_admin&classe='+$name+'&semestre='+$semester;
            }
        }
    </script>
        </div>

        <footer>
            <p>COPYRIGHT © 2024 ECOLE NATIONALE DES SCIENCES APPLIQUÉES EL JADIDA</p>
        </footer>

    </div>

    </div>
  
        <script>
    document.addEventListener('DOMContentLoaded', function() {
        const cells = document.querySelectorAll('td');
        cells.forEach(cell => {
            cell.addEventListener('click', function() {
                const day = this.getAttribute('data-day');
                const hour = this.getAttribute('data-hour');
                const semestre = this.getAttribute('data-semestre');
                const classe = this.getAttribute('data-classe');
                const professeur = (this.getAttribute('data-prof') || '').trim();
                const classroom = (this.getAttribute('data-classroom') || '').trim();
                const modul = (this.getAttribute('data-module') || '').trim();



                if (professeur) {
                    // window.location.href = `index.php?action=show_edit_schedule_exam&day=${day}&hour=${hour}&semestre=${semestre}&classe=${classe}&prof=${professeur}&room=${classroom}&module=${modul}`;
                    window.location.href = `index.php?action=show_add_schedule_exam_for_admin&classe=${classe}&semestre=${semestre}`;

                } else {
                    window.location.href = `index.php?action=show_add_schedule_exam_for_admin&day=${day}&hour=${hour}&semestre=${semestre}&classe=${classe}`;
                }
            });
        });
    });
</script>



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
    <?php require_once("views/admin/components/layout.php")?>
