<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/PV_table.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate object
  $pv_table = new PV_table($db);

  // Get raw data
  $data = json_decode(file_get_contents("php://input"));

  $pv_table->Name = $data->Name;
  $pv_table->Photo = $data->Photo;
  $pv_table->Address = $data->Address;
  $pv_table->Coordinate_X = $data->Coordinate_X;
  $pv_table->Coordinate_Y = $data->Coordinate_Y;
  $pv_table->Operator = $data->Operator;
  $pv_table->CommissionDate = $data->CommissionDate;
  $pv_table->Description = $data->Description;
  $pv_table->SystemPower = $data->SystemPower;
  $pv_table->AnnualProduction = $data->AnnualProduction;
  $pv_table->CO2Avoided = $data->CO2Avoided;
  $pv_table->Reimbursement = $data->Reimbursement;
  $pv_table->SolarPanelModules = $data->SolarPanelModules;
  $pv_table->AzimuthAngle = $data->AzimuthAngle;
  $pv_table->InclinationAngle = $data->InclinationAngle;
  $pv_table->Communication = $data->Communication;
  $pv_table->Inverter = $data->Inverter;
  $pv_table->Sensors = $data->Sensors;

  if($pv_table->create()){
      echo json_encode(
          array('message' => 'Post Created')
      );
  }else{
    echo json_encode(
        array('message' => 'Post Not Created')
    );
  }

?>