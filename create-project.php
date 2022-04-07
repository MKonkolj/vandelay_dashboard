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
    $projectName = $_POST["project_name"];
    $tasks->checkName($projectName);

    if(empty($tasks->errors)) {
        $tasks->setProject($projectName);
        header("location: project-list.php?projectadded");
        die();
    }
}

?>
<main>
    <div class="main-page shadow form-container">
    <h2 class="form-title">Create project</h2>
    <form class="main-form" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">

        <input type="text" name="project_name" placeholder="Project name">
        <p class="error"><?php echo $tasks->errors["project_name"] ?? ""?></p>

        <button type="submit" name="submit">Create project</button>
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