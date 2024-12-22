<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="assets/img/part.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/excel_upload.css">
</head>

<body>

    <div class="main-wrapper">
        <?php include "views/admin/components/header_chef.php"; ?>
        <?php echo $content; ?>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>
    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/plugins/datatables/datatables.min.js"></script>
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/controle.js"></script>
    <!-- <script src="assets/js/script.js"></script> -->
    <script src="assets/js/jQuery.print.js"></script>
    <script src="assets/js/chef_departement.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        });
    </script>

</body>

</html>