<?php 

class StatsController extends StatsModel {

    public $numOfEmployees;
    public $avgSalary;
    public $employeesPerPosition;

    public function __construct() {
        $this->numOfEmployees = $this->getNumberOfEmployees();
        $this->avgSalary = $this->getaverageSalary();
        $this->employeesPerPosition = $this->getemployeesPerPosition();
    }

}