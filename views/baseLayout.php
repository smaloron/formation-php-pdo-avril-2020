<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link   rel="stylesheet" 
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body class="container-fluid">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <?php require $content ?>
        </div>
    </div>
    
    
</body>
</html>