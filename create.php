<?php 
include "./includes/header.inc.php";
include "./classes/connection.php";
include "./classes/employee-table-model.php";
include "./classes/employee-table-controller.php";

$employeeTable = new EmployeeTableController();
$positions = $employeeTable->getPositions();

?>
<main>
    <div class="main-page shadow form-container">
    <h2 class="form-title">Create employee</h2>
    <form class="main-form" action="./includes/create.inc.php" method="POST">
        <input type="text" name="firstname" placeholder="First name">
        <input type="text" name="lastname" placeholder="Last name">
        <select name="position">
            <?php 
            foreach($positions as $position) {
                echo "<option value='". $position["id"] ."'>". $position["position_name"] ."</option>";
            }
            ?>
        </select>
        <input type="number" name="salary" placeholder="Salary">
        <input type="text" name="email" placeholder="Email">
        <button type="submit" name="submit">Create</button>
        <?php 
        // if administrator selected - show password field
        // hash pass before posting
        ?>
    </form>

    </div>
</main>
<?php 
include "./includes/footer.inc.php"
?>