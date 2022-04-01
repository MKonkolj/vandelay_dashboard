<?php 

class EmployeeTableController extends EmployeeTableModel {
    public $employeeArray;

    public function __construct() {
        $this->employeeArray = $this->getEmployeeArray();
    }

    public function createTable() {
        echo "<table><thead>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Position</th>";
        echo "<th>Salary</th>";
        echo "</thead><tbody>";
        foreach($this->employeeArray as $row) {
            echo "<tr>";
            foreach($row as $key => $cell) {
                if($key == "employee_id"){
                    continue;
                }
                echo "<td>" . $cell . "</td>";
            }
            echo "<td><a href='update.inc.php?id=" . $row["employee_id"] . "'>Edit</td>";
            echo "<td><a href='delete.inc.php?id=" . $row["employee_id"] . "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    }
}