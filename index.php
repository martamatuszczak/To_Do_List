<!DOCTYPE html>
<?php
session_start();
require_once 'task.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="./css/bootstrap.css" rel="stylesheet">
        <title></title>
    </head>
    <body>
        
        <div class="container">
            <h2>Twoja lista zadań</h2>
            <table class="table table-striped">
            <?php
            if(!isset($_SESSION['tasks'])) {
                $_SESSION['tasks'] = [];
            }

            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                $name = (isset($_POST['name'])) ?trim($_POST['name']) :"";
                $task = (isset($_POST['task'])) ?trim($_POST['task']) :""; 

                if($name && strlen($name) > 0 && $task && strlen($task) > 0){ 
                    $_SESSION['tasks'][] = serialize(new Task($name, $task)); 
                }
            } 

            elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset ($_GET['doneTask'])) {

                if(isset($_SESSION['tasks'][$_GET['doneTask']])) {
                    $doneTasks = unserialize($_SESSION['tasks'][$_GET['doneTask']]);
                    $doneTasks->finishTask();
                    $_SESSION['tasks'][$_GET['doneTask']] = serialize($doneTasks);

                }
            }

            $tasks =[];
            foreach ($_SESSION['tasks'] as $task) {
                $tasks[] = unserialize($task);
            }   

            foreach ($tasks as $key=>$task) {
                echo"<tr> <td>";
                $task->displayTask(); 
                echo"</td>";
                echo '<td><a href="index.php?doneTask=' . $key . ' "><button class="btn btn-success">Zrobione</button></a></td>';
                echo"</tr>";
            }

            ?>
            </table>
            <br>
            <form action="create_task.php">
                <button>Nowe zadanie</button>
            </form>
        </div>
    </body>
</html>
