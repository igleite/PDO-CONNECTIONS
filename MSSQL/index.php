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

    <h1 class="pt-3 pb-2">[ BANCO DE DADOS MSSQL ]</h1>

    <?php

    require __DIR__ . "/source/autoload.php";

    use Source\Database\Connect;

    /* ************************************************** */
    /*                   INSERT                           */
    /* ************************************************** */
    echo "<p style='font-weight: bold'>--------------<br>[ insert ]<br>--------------</p>";

    $insert = "
        INSERT INTO Users (nome, sobrenome, email)
        VALUES ('Teste', '01', 'teste@gmail.com'),
               ('Teste', '02', 'teste@gmail.com'),
               ('Teste', 'Teste', 'teste@gmail.com');
    ";

    try {

        $query = Connect::getInstance()->query("$insert");

        echo "<p>Último registro inserido <b>[ " . Connect::getInstance()->lastInsertId() . " ]</b></p>";

        echo "<pre>" . print_r($query->errorInfo(), true) . "</pre>";

        if ($query->errorInfo()[1] == 00000) {
            echo "<p><b><u>Resultado desse array é registro inserido sem nenhum erro</u></b></p>";
        }

    } catch (PDOException $exception) {
        var_dump($exception);
    }

    /* ************************************************** */
    /*                   UPDATE                           */
    /* ************************************************** */
    echo "<p style='font-weight: bold'>--------------<br>[ update ]<br>--------------</p>";

    $update = "
        UPDATE Users
        SET nome      = 'Teste',
            sobrenome = '03'
        WHERE Id = 3
    ";

    try {

        $exec = Connect::getInstance()->exec($update);

        echo "<p>Quantidade de linhas afetadas <b>[ " . $exec . " ]</b></p>";

    } catch (PDOException $exception) {
        var_dump($exception);
    }

    /* ************************************************** */
    /*                   SELECT                           */
    /* ************************************************** */

    echo "<p style='font-weight: bold'>--------------<br>[ select ]<br>--------------</p>";

    try {

        $query = Connect::getInstance()->query("SELECT * FROM Users;");

        echo "<pre>" . print_r($query->fetchAll(), true) . "</pre>";

    } catch (PDOException $exception) {
        var_dump($exception);
    }

    /* ************************************************** */
    /*                   DELETE                           */
    /* ************************************************** */
    echo "<p style='font-weight: bold'>--------------<br>[ delete ]<br>--------------</p>";

    try {

        $del = Connect::getInstance()->exec("
                DELETE
                FROM Users
                WHERE Id > 1
                ");

        $reset = Connect::getInstance()->exec("DBCC CHECKIDENT (Users, RESEED,0);");

        echo "<p>Quantidade de registros excluídos <b>[ " . $del . " ]</b></p>";

    } catch (PDOException $exception) {
        var_dump($exception);
    }


    ?>

</div>

</body>
</html>
