<?php
require_once('EmployeeQuery.php');
require_once('EmpDatabaseConnect.php');

if($_SERVER["REQUEST_METHOD"] != "POST") {
    exit;
}

$query = new EmployeeQuery(EmpDatabaseConnect::getInstance());

//post request from adding an employee through the form
if(!$_POST['id'] && $_POST['name']) {
    $name = $_POST['name'];
    $query->addEmployee($name);
    header('Location: /Employee/display/display_query.php');
}

//For AJAX post requests
$data = $_POST['data'];
$type = $data['type'];

switch($type) {
    case 'delete':
        $id = $data['id'];
        $query->deleteEmployee($id);
        break;
    case 'update':
        $name = $data['name'];
        $id = $data['id'];
        $query->updateEmployee($id, $name);
        break;
}


