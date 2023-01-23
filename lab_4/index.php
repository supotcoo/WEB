<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>web_lab4</title>
</head>
<body>
<?php
    if(isset($_GET['page'])){
        switch ($_GET['page']){
            case 'list':
                require_once 'list.php';
                break;
            case 'create':
                require_once 'create.php';
                break;
            case 'update':
                require_once 'update.php';
                break;
            case 'delete':
                require_once 'delete.php';
                break;
        }
    }else{
        require_once 'list.php';
    }
?>
</body>
</html>