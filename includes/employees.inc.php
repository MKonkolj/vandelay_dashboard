<?php 

include "./classes/connection.php";
include "./classes/employee-table-model.php";
include "./classes/employee-table-controller.php";

$employeeTable = new EmployeeTableController();
$positions = $employeeTable->getPositions();

?>

<form action="<?php $_SERVER["PHP_SELF"] ?>">
<select name="positionSelect">
    <option value="all">All</option>
    <?php 
    foreach($positions as $position) {
        echo "<option value='". $position["id"] ."'>". $position["position_name"] ."</option>";
    }
    ?>
</select>
<button type="submit">Refresh</button>
</form>
<button><a href="create.php">Add employee</a></button>

<?php $employeeTable->createTable() ?>