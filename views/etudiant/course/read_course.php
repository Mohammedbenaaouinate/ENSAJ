<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lire le cours</title>
    <link rel="shortcut icon" href="assets/img/icon.png">
</head>

<body>
    <iframe src="assets/course/course/<?= $_POST['course_path']; ?>" width="100%" height="600px"></iframe>
</body>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</html>