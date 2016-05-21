<!DOCTYPE html>
<?php
session_start()
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="./css/bootstrap.css" rel="stylesheet">
        <title></title>
    </head>
    <body>
        <fieldset>
        <h2>Dodaj kolejne zadanie</h2>
        <form action="index.php" method="POST" role="form">
            <div class="form-group">
            <label>
                Wprowadź nazwę zadania
                <br>
                <input type="text" name="name" class="form-control">
            </label>
            </div>
            <div class="form-group">
            <label>
                Wprowadź opis zadania
                <br>
                <textarea name="task" class="form-control"> </textarea>
            </label>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
        </fieldset>
    </body>
</html>
