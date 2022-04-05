<?php 
// redirect to login if not logged in
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["user_id"])) {
    header("location: ../login.php?error=notloggedin");
}

include "./classes/connection.php";
include "./classes/employee-table-model.php";
include "./classes/employee-table-controller.php";

$employeeTable = new EmployeeTableController();
$positions = $employeeTable->getPositions();

if(isset($_POST["positionSelect"])) {
    session_status();
    $_SESSION["employeeTableView"] = $_POST["positionSelect"];
}

?>
<form class="table-select-form" action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
<select name="positionSelect" class="sort-select">
    <option value="">All</option>
    <?php 
    foreach($positions as $position) {
        if(!empty($_SESSION["employeeTableView"]) && $_SESSION["employeeTableView"] == $position["id"]) {
            echo "<option value='". $position["id"] ."' selected='selected'>". $position["position_name"] ."</option>";
        } else {
            echo "<option value='". $position["id"] ."'>". $position["position_name"] ."</option>";
        }
    }
    ?>
</select>
<button class="employees-button" type="submit" name="submit">Refresh</button>
</form>
<button><a href="create.php">Add employee</a></button>

<div class="table-container"><?php 

if(!empty($_SESSION["employeeTableView"])) {
    $employeeTable->createSelectTable($_SESSION["employeeTableView"]);
} else {
    $employeeTable->createTable();
}


?></div>