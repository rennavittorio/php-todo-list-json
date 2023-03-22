<?php
//accedo al file json
$todo_string = file_get_contents('./todo.json');

//trasformo in array php
$todos = json_decode($todo_string, true);

if (isset($_POST['newTask'])) {
    $task_input = $_POST['newTask'];
    $task_object = [
        "text" => "$task_input",
        "done" => "false",
    ];


    array_push($todos['data'], $task_object);

    $todos_to_string = json_encode($todos);
    file_put_contents('./todo.json', $todos_to_string);
}


//riconverto in string json, per accesso da axios
header('Content-Type: application/json');
echo json_encode($todos);
