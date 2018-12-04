<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once 'Database.php';
  include_once 'PV_table.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate object
  $pv_table = new PV_table($db);

  // Get ID
  $pv_table->ID = isset($_GET['ID']) ? $_GET['ID'] : die();

  // Get PV System
  $pv_table->read_single();

  // Create array
  $pv_table = array(
    'ID' => $pv_table->ID,
    'Name' => $pv_table->Name,
    'Photo' => $pv_table->Photo,
    'Address' => $pv_table->Address,
    'Coordinate_X' => $pv_table->Coordinate_X,
    'Coordinate_Y' => $pv_table->Coordinate_Y,
    'Operator' => $pv_table->Operator,
    'CommissionDate' => $pv_table->CommissionDate,
    'Description' => $pv_table->Description,
    'SystemPower' => $pv_table->SystemPower,
    'AnnualProduction' => $pv_table->AnnualProduction,
    'CO2Avoided' => $pv_table->CO2Avoided,
    'Reimbursement' => $pv_table->Reimbursement,
    'SolarPanelModules' => $pv_table->SolarPanelModules,
    'AzimuthAngle' => $pv_table->AzimuthAngle,
    'InclinationAngle' => $pv_table->InclinationAngle,
    'Communication' => $pv_table->Communication,
    'Inverter' => $pv_table->Inverter,
    'Sensors' => $pv_table->Sensors
  );

  // Make JSON
  echo json_encode($pv_table);
  ?>