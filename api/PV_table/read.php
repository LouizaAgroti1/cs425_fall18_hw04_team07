<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/PV_table.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate object
  $pv_table = new PV_table($db);

  // Blog post query
  $result = $pv_table->read();
  // Get row count
  $num = $result->rowCount();
  
  // Check if any posts
  if($num > 0) {
    // Post array
    $pv_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $pv_item = array(
        'ID' => $ID,
        'Name' => $Name,
        'Photo' => $Photo,
        'Address' => $Address,
        'Coordinate_X' => $Coordinate_X,
        'Coordinate_Y' => $Coordinate_Y,
        'Operator' => $Operator,
        'CommissionDate' => $CommissionDate,
        'Description' => $Description,
        'SystemPower' => $SystemPower,
        'AnnualProduction' => $AnnualProduction,
        'CO2Avoided' => $CO2Avoided,
        'Reimbursement' => $Reimbursement,
        'SolarPanelModules' => $SolarPanelModules,
        'AzimuthAngle' => $AzimuthAngle,
        'InclinationAngle' => $InclinationAngle,
        'Communication' => $Communication,
        'Inverter' => $Inverter,
        'Sensors' => $Sensors
      );

      // Push to array
      array_push($pv_arr, $pv_item);
    }

    // Turn to JSON & output
    echo json_encode($pv_arr);

  } else {
    // No PV Systems
    echo json_encode(
      array('message' => 'No PV Systems Found')
    );
  }
