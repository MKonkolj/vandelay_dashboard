<?php 
// redirect to login if not logged in
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["user_id"])) {
    header("location: ../login.php?error=notloggedin");
}

class TaskModel extends Connection {

    protected function getProjects() : array {
        $stmt = $this->connect()->prepare("SELECT project_id, project_name FROM projects");
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        return $result;
    }

    public function setProject(string $project_name) : void {
        $stmt = $this->connect()->prepare("INSERT INTO projects(project_name) VALUES (?) ");
        $stmt->execute([$project_name]);
    }

    public function getAllTasks() : array {
        $stmt = $this->connect()->prepare("SELECT task_name, project_name, firstname, lastname, deadline FROM tasks 
        LEFT JOIN projects ON tasks.project_id=projects.project_id 
        LEFT JOIN employees ON tasks.employee_id=employees.employee_id ");
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        return $result;
    }

    public function setTask(string $task_name, int $project_id, int $employee_id, string $deadline) {
        $stmt = $this->connect()->prepare("INSERT INTO tasks(task_name, project_id, employee_id, deadline) VALUES (?, ?, ?, ?)");
        $stmt->execute([$task_name, $project_id, $employee_id, $deadline]);
    }
}