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

  } else {
    // No PV Systems
    echo json_encode(
      array('message' => 'No PV Systems Found')
    );
  }

$jsonData =json_encode($pv_arr);
$original_data = json_decode($jsonData, true);
$features = array();
foreach($original_data as $key => $value) {
    $features[] = array(
        'type' => 'Feature',
        'properties' => array('ID' => $value['ID'],
                              'Name' => $value['Name'],
                              'Photo' => $value['Photo'],
                              'Address' => $value['Address'],
                              'Operator' => $value['Operator'],
                              'CommissionDate' => $value['CommissionDate'],
                              'Description' => $value['Description'],
                              'SystemPower' => $value['SystemPower'],
                              'AnnualProduction' => $value['AnnualProduction'],
                              'CO2Avoided' => $value['CO2Avoided'],
                              'Reimbursement' => $value['Reimbursement'],
                              'SolarPanelModules' => $value['SolarPanelModules'],
                              'AzimuthAngle' => $value['AzimuthAngle'],
                              'InclinationAngle' => $value['InclinationAngle'],
                              'Communication' => $value['Communication'],
                              'Inverter' => $value['Inverter'],
                              'Sensors' => $value['Sensors']
                            ),
        'geometry' => array(
             'type' => 'Point', 
             'coordinates' => array($value['Coordinate_X'],
                                    $value['Coordinate_Y'],  
                                  ),
         ),
    );
}

$final_data = json_encode($features);
echo $final_data;
?>
