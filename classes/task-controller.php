<?php 
// redirect to login if not logged in
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["user_id"])) {
    header("location: ../login.php?error=notloggedin");
} 

class TaskController extends TaskModel {
    public $projects;
    public $errors;

    public function __construct() {
        $this->projects = $this->getProjects();
    }

    public function addInputError(string $input, string $message) : void {
        $this->errors[$input] = $message;
    }

    public function checkName(string $name) : void {
        $name = trim($name);
        if(empty($name)) {
            $this->addInputError("project_name", "Field can't be empty");
        } else if(!preg_match('/[a-zA-Z0-9]/', $name)) {
            $this->addInputError("project_name", "Can only contain letters and numbers");
        }
    }

    public function checkTask(string $task) : void {
        $task = trim($task);
        if(empty($task)) {
            $this->addInputError("task_name", "Field can't be empty");
        } else if(!preg_match('/[a-zA-Z0-9]/', $task)) {
            $this->addInputError("task_name", "Can only contain letters and numbers");
        }
    }

    public function checkDeadline(string $deadline) : void {
        $deadline = strtotime($deadline);
        $today = strtotime("today");
        if($deadline < $today) {
            $this->addInputError("deadline", "Deadline set in the past");
        }
    }
}