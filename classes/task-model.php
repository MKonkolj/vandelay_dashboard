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

    protected function getTasksByProject(int $project_id) : array {
        $stmt = $this->connect()->prepare("SELECT * FROM tasks WHERE project_id = ?");
        $stmt->execute([$project_id]);
        $result = $stmt->fetchAll();
        
        return $result;
    }

    protected function setTask(string $task_name, int $project_id, int $employee_id, string $deadline) : void {
        $stmt = $this->connect()->prepare("INSERT INTO tasks VALUES ? ? ? ?");
        $stmt->execute([$task_name, $project_id, $employee_id, $deadline]);
    }
}