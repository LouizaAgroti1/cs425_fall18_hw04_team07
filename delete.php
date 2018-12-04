<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once 'Database.php';
  include_once 'PV_table.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate object
  $pv_table = new PV_table($db);

  // Get raw data
  $data = json_decode(file_get_contents("php://input"));

  $pv_table->ID = $data->ID;
 
  // Delete PV System
  if($pv_table->delete()){
      echo json_encode(
          array('message' => 'PV System Deleted')
      );
  }else{
    echo json_encode(
        array('message' => 'PV System Not Deleted')
    );
  }

?>