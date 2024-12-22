<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assurance D'étudiant</title>
    <link rel="shortcut icon" href="assets/img/icon.png">
    <style>
                div{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
    </style>

</head>

<body>
    <div>
        <?php
        $image_path = $_POST['assurance_path'];
        ?>
        <img src="assets/assurance_image/<?= $image_path; ?>" alt="image Introuvable" style="width: 600px;height: 900px;margin:auto;">
    </div>
</body>

</html>