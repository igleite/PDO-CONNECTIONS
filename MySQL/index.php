<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" rel="stylesheet">

</head>
<body>

<div class="container " style="margin-bottom: 20em">

    <h1 class="pt-3 pb-2">[ BANCO DE DADOS MySQL ]</h1>

    <?php

    require __DIR__ . "/source/autoload.php";

    use Source\Database\Connect;


    /* ************************************************** */
    /*                   SELECT                           */
    /* ************************************************** */

    echo "<p style='font-weight: bold'>--------------<br>[ select ]<br>--------------</p>";

    try {

        $query = Connect::getInstance()->query("SELECT * FROM Vendas;");

        echo "<pre>" . print_r($query->fetchAll(), true) . "</pre>";

    } catch (PDOException $exception) {
        var_dump($exception);
    }


    ?>

</div>

</body>
</html>
