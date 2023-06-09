<?php
//accedo al file json
$todo_string = file_get_contents('./todo.json');

//trasformo in array php
$todos = json_decode($todo_string, true);

$new_todo = isset($_POST['todo']) ? $_POST['todo'] : null;
$to_del = isset($_POST['toDel']) ? $_POST['toDel'] : null;
$to_change_i = isset($_POST['toChangeIndex']) ? $_POST['toChangeIndex'] : null;
$to_change_s = isset($_POST['toChangeStatus']) ? $_POST['toChangeStatus'] : null;

$new_object = [
    "todo" => "$new_todo",
    "done" => "no",

];

if ($new_todo !== null && $new_todo !== "") {
    array_push($todos['data'], $new_object);
    file_put_contents('./todo.json',  json_encode($todos));
}

if ($to_del !== null) {
    array_splice($todos['data'], $to_del, 1);
    file_put_contents('./todo.json',  json_encode($todos));
}

if ($to_change_i !== null && $to_change_s !== null) {
    $todos['data'][$to_change_i]['done'] = $to_change_s;
    file_put_contents('./todo.json',  json_encode($todos));
}

//impostiamo l'header Content-Type
header('Content-Type: application/json');
// stampiamo la stringa json
echo json_encode($todos);

// if (isset($_POST['newTask'])) {
//     $task_input = $_POST['newTask'];
//     $task_object = [
//         "text" => "$task_input",
//         "done" => "false",
//     ];


//     array_push($todos['data'], $task_object);

//     $todos_to_string = json_encode($todos);
//     file_put_contents('./todo.json', $todos_to_string);
// }


// //riconverto in string json, per accesso da axios
// header('Content-Type: application/json');
// echo json_encode($todos);
