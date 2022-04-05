<?php 
// redirect to login if not logged in
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["user_id"])) {
    header("location: ../login.php?error=notloggedin");
}

class StatsController extends StatsModel {

    public string $numOfEmployees;
    public string $avgSalary;
    public array $employeesPerPosition;

    public function __construct() {
        $this->numOfEmployees = $this->getNumberOfEmployees();
        $this->avgSalary = $this->getaverageSalary();
        $this->employeesPerPosition = $this->getemployeesPerPosition();
    }
}