<?php 
// redirect to login if not logged in
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["user_id"])) {
    header("location: ../login.php?error=notloggedin");
}

class EmployeeTableController extends EmployeeTableModel {
    public $employeeArray;

    public function __construct() {
        $this->employeeArray = $this->getEmployeeArray();
    }

    public function createTable() : void {
        echo "<table><thead>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Position</th>";
        echo "<th>Salary</th>";
        echo "<th colspan='2'></th>";
        echo "</thead><tbody>";
        foreach($this->employeeArray as $row) {
            echo "<tr>";
            foreach($row as $key => $cell) {
                if($key == "employee_id"){
                    continue;
                }
                echo "<td>" . $cell . "</td>";
            }
            echo "<td><a href='./update.php?" . $row["employee_id"] . "'>Edit</td>";
            echo "<td><a href='./includes/delete.inc.php?" . $row["employee_id"] . "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    }

    public function createSelectTable(string $selected_id) : void {
        $selectedArray = $this->getSelectedEmployeeArray($selected_id);

        echo "<table><thead>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Position</th>";
        echo "<th>Salary</th>";
        echo "<th colspan='2'></th>";
        echo "</thead><tbody>";
        foreach($selectedArray as $row) {
            echo "<tr>";
            foreach($row as $key => $cell) {
                if($key == "employee_id"){
                    continue;
                }
                echo "<td>" . $cell . "</td>";
            }
            echo "<td><a href='./update.php?" . $row["employee_id"] . "'>Edit</td>";
            echo "<td><a href='./includes/delete.inc.php?" . $row["employee_id"] . "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    }
}