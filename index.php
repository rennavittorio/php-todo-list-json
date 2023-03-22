<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/dafebc6938.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="./app.css">

    <title>Todolist</title>

</head>

<body class="dark-theme">
    <div id="app" class="todolist">
        <section class="py-5">
            <div class="container">
                <h1 class="text-center">
                    // myToDoList
                </h1>
            </div>

            <div class="container py-3">
                <form action="./server.php" method="POST" class="row mb-3 align-items-center">
                    <div class="col-auto">
                        <button @click="saveTask()" class="btn btn-warning">
                            Add task
                        </button>
                    </div>
                    <div class="col">
                        <input v-model="inputValue" type="text" class="form-control" id="taskAdd" name="newTask" placeholder="example: do shopping...">
                    </div>
                </form>
            </div>

            <div class="container">
                <h1 class="fs-5">
                    // toBeDone ( {{ countToBeDoneList }} )
                </h1>
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li v-for="(task, index) in tasks" :class="['list-group-item', 'd-flex','justify-content-between', 'align-items-center', task.done === 'true' ? 'done' : '']">
                            <div @click="tickTask(task, index)" class="task-text col">
                                {{ task.text }}
                            </div>
                            <!-- <div 
                            :class="['delete-btn', 'col-auto', task.done === true ? 'd-block' : 'd-none']">
                                <button @click="removeTask(index)" class="btn btn-danger btn-sm">X</button>
                            </div> -->
                        </li>
                    </ul>
                </div>
            </div>


            <!-- <div class="container py-3">
                <h1 class="fs-5">
                    // doneTasks ( {{ countDoneList }} )
                </h1>
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li v-for="(task, index) in doneTasks" :class="['list-group-item', 'd-flex','justify-content-between', 'align-items-center', task.done ? 'done' : '']">
                            <div @click="tickTask(task, index)" class="task-text col">
                                {{ task.taskText }}
                            </div>
                            <div :class="['delete-btn', 'col-auto', task.done === true ? 'd-block' : 'd-none']">
                                <button @click="removeTask(index)" class="btn btn-danger btn-sm">X</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> -->

        </section>
    </div>


    <script src="./app.js"></script>
</body>

</html>