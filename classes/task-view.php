<?php 

include "connection.php";
include "task-model.php";
include "task-controller.php";

class TaskView extends TaskController {
    private $tasks;

    public function __construct() {
        $this->tasks = $this->getAllTasks();
    }

    public function createTaskTable() {

        echo 
        "<table>
            <thead>
                <tr>
                    <th></th>
                    <th>Task</th>
                    <th>Project</th>
                    <th>Dedicated employee</th>
                    <th>Deadline</th>
                </tr>
            </thead>
            <tbody>";

        foreach($this->tasks as $task) {
            $today = strtotime("today");
            $day3 = strtotime("+3 days");
            $day5 = strtotime("+5 days");
            $day10 = strtotime("+10 days");
            $deadline = strtotime($task["deadline"]);
            $indicator = "";

            if($deadline < $today) {
                $indicator = "💥";
            } else if ($deadline < $day3) {
                $indicator = "🔴";
            } else if ($deadline < $day5) {
                $indicator = "🟠";
            } else {
                $indicator = "🟢";
            }

            echo 
            "<tr>
                <td style='text-align:right;'>" . $indicator . "</td>
                <td>" . $task['task_name'] . "</td>
                <td>" . $task['project_name'] . "</td>
                <td>" . $task['firstname'] . " " . $task['lastname'] . "</td>
                <td style='text-align:left;'>" . $task['deadline'] . "</td>
            </tr>";
        }

        echo
            "</tbody>
        </table>";
    }
}

