<?php 

include "./classes/connection.php";
include "./classes/employee-table-model.php";
include "./classes/employee-table-controller.php";

$employeeTable = new EmployeeTableController();
$positions = $employeeTable->getPositions();

?>

<form action="<?php $_SERVER["PHP_SELF"] ?>">
<select name="positionSelect" class="sort-select">
    <option value="all">All</option>
    <?php 
    foreach($positions as $position) {
        echo "<option value='". $position["id"] ."'>". $position["position_name"] ."</option>";
    }
    ?>
</select>
<button class="employees-button" type="submit">Refresh</button>
<button><a href="create.php">Add employee</a></button>
</form>

<div class="table-container"><?php $employeeTable->createTable() ?></div>