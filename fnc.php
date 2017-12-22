<?php
    $tasks = [
        [
            'id' => '4',
            'name' => 'Task 4',
            'type' => 'frontend',
            'date' => '1512403290',
            'status' => '0',
        ],
        [
            'id' => '5',
            'name' => 'Task 5',
            'type' => 'frontend',
            'date' => '1512403320',
            'status' => '0',
        ],
        [
            'id' => '6',
            'name' => 'Task 6',
            'type' => 'backend',
            'date' => '1512403350',
            'status' => '1',
        ],
        [
            'id' => '2',
            'name' => 'Task 2',
            'type' => 'frontend',
            'date' => '1512403200',
            'status' => '0',
        ],
        [
            'id' => '3',
            'name' => 'Task 3',
            'type' => 'frontend',
            'date' => '1512403230',
            'status' => '0',
        ],
        [
            'id' => '1',
            'name' => 'Task 1',
            'type' => 'backend',
            'date' => '1512403260',
            'status' => '1',
        ],
    ];

    switch($_REQUEST['function'])
    {
        case 'loadTasks':
            $result = [];
            if($_REQUEST['type'] == '' || $_REQUEST['type'] == 'all'){
                echo json_encode($tasks);
                die();
            }
            foreach($tasks as $task){
                if($task['type'] == $_REQUEST['type']){
                    $result[] = $task;
                }
            }
            echo json_encode($result);
            break;
        case 'deleteTask':
            if(empty($_REQUEST['id'])){
                echo 0;
                die();
            }
            // code delete task
            echo 1;
            break;
        case 'editTask':
            if(empty($_REQUEST['id']) || empty($_REQUEST['type']) || empty($_REQUEST['name'])){
                echo 0;
                die();
            }
            // code edit task
            echo 1;
            break;
    }
?>