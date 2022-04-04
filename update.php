<?php 
include "./includes/header.inc.php";
include "./classes/connection.php";
include "./classes/employee-table-model.php";
include "./classes/employee-table-controller.php";

$id = $_SERVER["QUERY_STRING"];
$employeeTable = new EmployeeTableController();
$positions = $employeeTable->getPositions();
$employee = array_filter($employeeTable->employeeArray, function($value) {
    return $value["employee_id"] == $_SERVER["QUERY_STRING"];
});
$employee = array_values($employee);

?>
<main>
    <div class="main-page shadow form-container">
    <h2 class="form-title">Update employee</h2>
    <form class="main-form" action="./includes/update.inc.php?<?php echo $id ?>" method="POST">
        <input type="text" name="firstname" placeholder="First name" value="<?php echo $employee[0]["firstname"] ?>">
        <p class="error"><?php echo $_SESSION["update_form_errors"]["firstname"] ?? ""?></p>
        <input type="text" name="lastname" placeholder="Last name" value="<?php echo $employee[0]["lastname"] ?>">
        <p class="error"><?php echo $_SESSION["update_form_errors"]["lastname"] ?? ""?></p>
        <select name="position">
            <?php 
            foreach($positions as $position) {
                if($position["position_name"] == $employee[0]["position_name"]) {
                    echo "<option value='". $position["id"] ."' selected='selected'>". $position["position_name"] ."</option>";
                } else {
                    echo "<option value='". $position["id"] ."'>". $position["position_name"] ."</option>";
                }
            }
            ?>
        </select>
        <input type="number" name="salary" placeholder="Salary" value="<?php echo $employee[0]["salary"] ?>">
        <p class="error"><?php echo $_SESSION["update_form_errors"]["salary"] ?? ""?></p>
        <button type="submit" name="submit">Create</button>
        <?php 
        // if administrator selected - show password field
        // hash pass before posting
        ?>
    </form>

    </div>
</main>
<?php 
unset($_SESSION["update_form_errors"]);
unset($_SESSION["update_form_values"]);
include "./includes/footer.inc.php"
?>