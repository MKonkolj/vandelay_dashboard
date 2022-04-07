<?php 

include "./includes/header.inc.php";
include "./classes/connection.php";
include "./classes/task-model.php";
include "./classes/task-controller.php";
include "./classes/user-model.php";

$tasks = new TaskController();
$projects = $tasks->projects;
$employeesObj = new UserModel();
$employees = $employeesObj->getAllEmployees();

if(isset($_POST["submit"])) {
    $task_name = trim($_POST["task_name"]);
    $project_id = trim($_POST["project_id"]);
    $employee_id = trim($_POST["employee_id"]);
    $deadline = trim($_POST["deadline"]);
    $tasks->checkName($task_name);
    $tasks->checkTask($task_name);
    $tasks->checkDeadline($deadline);

    if(empty($tasks->errors)) {
        $tasks->setTask($task_name, $project_id, $employee_id, $deadline);
        header("location: project-list.php?taskadded");
    }
}

?>
<main>
    <div class="main-page shadow form-container">
    <h2 class="form-title">Create Task</h2>
    <form class="main-form" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">

        <select name="project_id">
            <?php 
            foreach($projects as $project) {
                echo "<option value='". $project["project_id"] ."'>". $project["project_name"] ."</option>";
            }
            ?>
        </select>
        <textarea name="task_name" placeholder="Task..." cols="30" rows="5"></textarea>
        <p class="error"><?php echo $tasks->errors["task_name"] ?? ""?></p>

        <select name="employee_id">
            <?php 
            foreach($employees as $employee) {
                echo "<option value='". $employee["employee_id"] ."'>". $employee["firstname"] ." ". $employee["lastname"] ." - ". $employee["position_name"] . "</option>";
            }
            ?>
        </select>

        <input type="date" name="deadline" value="<?php echo date('Y-m-d'); ?>">
        <p class="error"><?php echo $tasks->errors["deadline"] ?? ""?></p>

        <button type="submit" name="submit">Create task</button>
        <?php 
        // if administrator selected - show password field
        // hash pass before posting
        ?>
    </form>

    </div>
</main>
<?php 
unset($_SESSION["create_form_errors"]);
unset($_SESSION["create_form_values"]);
include "./includes/footer.inc.php"
?>