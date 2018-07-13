<?php

require_once('../DB_Queries/EmployeeQuery.php');
require_once('../DB_Queries/EmpDatabaseConnect.php');

session_start();

$query = new EmployeeQuery(EmpDatabaseConnect::getInstance());
$allEmployees = $query->getAllEmployees();

require_once('all_employees.html');
