<?php 
  class PV_Table {
    // DB stuff
    private $conn;
    private $table = 'PV_Table';

    // PV System's Properties
    public $ID;
    public $Name;
    public $Photo;
    public $Address;
    public $Coordinate_X;
    public $Coordinate_Y;
    public $Operator;
    public $CommissionDate;
    public $Description;
    public $SystemPower;
    public $AnnualProduction;
    public $CO2Avoided;
    public $Reimbursement;
    public $SolarPanelModules;
    public $AzimuthAngle;
    public $InclinationAngle;
    public $Communication;
    public $Inverter;
    public $Sensors;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get all PV Systems
    public function read() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table . '';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get single PV System
    public function read_single(){
      // Create query
      $query = 'SELECT * FROM ' . $this->table . ' WHERE ID = ? LIMIT 0,1' ;

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->ID);

       // Execute query
       $stmt->execute();

       $row = $stmt->fetch(PDO::FETCH_ASSOC);

       // Set properties
       $this->Name = $row['Name'];
       $this->Photo = $row['Photo'];
       $this->Address = $row['Address'];
       $this->Coordinate_X = $row['Coordinate_X'];
       $this->Coordinate_Y = $row['Coordinate_Y'];
       $this->Operator = $row['Operator'];
       $this->CommissionDate = $row['CommissionDate'];
       $this->Description = $row['Description'];
       $this->SystemPower = $row['SystemPower'];
       $this->AnnualProduction = $row['AnnualProduction'];
       $this->CO2Avoided = $row['CO2Avoided'];
       $this->Reimbursement = $row['Reimbursement'];
       $this->SolarPanelModules = $row['SolarPanelModules'];
       $this->AzimuthAngle = $row['AzimuthAngle'];
       $this->InclinationAngle = $row['InclinationAngle'];
       $this->Communication = $row['Communication'];
       $this->Inverter = $row['Inverter'];
       $this->Sensors = $row['Sensors'];  
    }
    
    // Create PV system
    public function create(){
      //create query
      $query='INSERT INTO ' . $this->table . ' 
        SET
          Name = :Name,
          Photo = :Photo,
          Address = :Address,
          Coordinate_X = :Coordinate_X,
          Coordinate_Y = :Coordinate_Y,
          Operator = :Operator,
          CommissionDate = :CommissionDate,
          Description = :Description,
          SystemPower = :SystemPower,
          AnnualProduction = :AnnualProduction,
          CO2Avoided = :CO2Avoided,
          Reimbursement = :Reimbursement,
          SolarPanelModules = :SolarPanelModules,
          AzimuthAngle = :AzimuthAngle,
          InclinationAngle = :InclinationAngle,
          Communication = :Communication,
          Inverter = :Inverter,
          Sensors = :Sensors';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean Data
      $this->Name = htmlspecialchars(strip_tags($this->Name));
      $this->Photo = htmlspecialchars(strip_tags($this->Photo));
      $this->Address = htmlspecialchars(strip_tags($this->Address));
      $this->Coordinate_X = htmlspecialchars(strip_tags($this->Coordinate_X));
      $this->Coordinate_Y = htmlspecialchars(strip_tags($this->Coordinate_Y));
      $this->Operator = htmlspecialchars(strip_tags($this->Operator));
      $this->CommissionDate = htmlspecialchars(strip_tags($this->CommissionDate));
      $this->Description = htmlspecialchars(strip_tags($this->Description));
      $this->SystemPower = htmlspecialchars(strip_tags($this->SystemPower));
      $this->AnnualProduction = htmlspecialchars(strip_tags($this->AnnualProduction));
      $this->CO2Avoided = htmlspecialchars(strip_tags($this->CO2Avoided));
      $this->Reimbursement = htmlspecialchars(strip_tags($this->Reimbursement));
      $this->SolarPanelModules = htmlspecialchars(strip_tags($this->SolarPanelModules));
      $this->AzimuthAngle = htmlspecialchars(strip_tags($this->AzimuthAngle));
      $this->InclinationAngle = htmlspecialchars(strip_tags($this->InclinationAngle));
      $this->Communication = htmlspecialchars(strip_tags($this->Communication));
      $this->Inverter = htmlspecialchars(strip_tags($this->Inverter));
      $this->Sensors = htmlspecialchars(strip_tags($this->Sensors));

      // Bind Data
      $stmt->bindParam(':Name', $this->Name);
      $stmt->bindParam(':Photo', $this->Photo);
      $stmt->bindParam(':Address', $this->Address);
      $stmt->bindParam(':Coordinate_X', $this->Coordinate_X);
      $stmt->bindParam(':Coordinate_Y', $this->Coordinate_Y);
      $stmt->bindParam(':Operator', $this->Operator);
      $stmt->bindParam(':CommissionDate', $this->CommissionDate);
      $stmt->bindParam(':Description', $this->Description);
      $stmt->bindParam(':SystemPower', $this->SystemPower);
      $stmt->bindParam(':AnnualProduction', $this->AnnualProduction);
      $stmt->bindParam(':CO2Avoided', $this->CO2Avoided);
      $stmt->bindParam(':Reimbursement', $this->Reimbursement);
      $stmt->bindParam(':SolarPanelModules', $this->SolarPanelModules);
      $stmt->bindParam(':AzimuthAngle', $this->AzimuthAngle);
      $stmt->bindParam(':InclinationAngle', $this->InclinationAngle);
      $stmt->bindParam(':Communication', $this->Communication);
      $stmt->bindParam(':Inverter', $this->Inverter);
      $stmt->bindParam(':Sensors', $this->Sensors);

      // Execute query
      if($stmt->execute()){
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s. \n", $stmt->error);

      return false;
    }
    
    // Update PV system
    public function update(){
      // Update query
      $query='UPDATE ' . $this->table . ' 
                SET
                  Name = :Name,
                  Photo = :Photo,
                  Address = :Address,
                  Coordinate_X = :Coordinate_X,
                  Coordinate_Y = :Coordinate_Y,
                  Operator = :Operator,
                  CommissionDate = :CommissionDate,
                  Description = :Description,
                  SystemPower = :SystemPower,
                  AnnualProduction = :AnnualProduction,
                  CO2Avoided = :CO2Avoided,
                  Reimbursement = :Reimbursement,
                  SolarPanelModules = :SolarPanelModules,
                  AzimuthAngle = :AzimuthAngle,
                  InclinationAngle = :InclinationAngle,
                  Communication = :Communication,
                  Inverter = :Inverter,
                  Sensors = :Sensors
                WHERE
                  ID = :ID';
        
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        
        // Clean Data
        $this->Name = htmlspecialchars(strip_tags($this->Name));
        $this->Photo = htmlspecialchars(strip_tags($this->Photo));
        $this->Address = htmlspecialchars(strip_tags($this->Address));
        $this->Coordinate_X = htmlspecialchars(strip_tags($this->Coordinate_X));
        $this->Coordinate_Y = htmlspecialchars(strip_tags($this->Coordinate_Y));
        $this->Operator = htmlspecialchars(strip_tags($this->Operator));
        $this->CommissionDate = htmlspecialchars(strip_tags($this->CommissionDate));
        $this->Description = htmlspecialchars(strip_tags($this->Description));
        $this->SystemPower = htmlspecialchars(strip_tags($this->SystemPower));
        $this->AnnualProduction = htmlspecialchars(strip_tags($this->AnnualProduction));
        $this->CO2Avoided = htmlspecialchars(strip_tags($this->CO2Avoided));
        $this->Reimbursement = htmlspecialchars(strip_tags($this->Reimbursement));
        $this->SolarPanelModules = htmlspecialchars(strip_tags($this->SolarPanelModules));
        $this->AzimuthAngle = htmlspecialchars(strip_tags($this->AzimuthAngle));
        $this->InclinationAngle = htmlspecialchars(strip_tags($this->InclinationAngle));
        $this->Communication = htmlspecialchars(strip_tags($this->Communication));
        $this->Inverter = htmlspecialchars(strip_tags($this->Inverter));
        $this->Sensors = htmlspecialchars(strip_tags($this->Sensors));
        $this->ID = htmlspecialchars(strip_tags($this->ID));
        
        // Bind Data
        $stmt->bindParam(':Name', $this->Name);
        $stmt->bindParam(':Photo', $this->Photo);
        $stmt->bindParam(':Address', $this->Address);
        $stmt->bindParam(':Coordinate_X', $this->Coordinate_X);
        $stmt->bindParam(':Coordinate_Y', $this->Coordinate_Y);
        $stmt->bindParam(':Operator', $this->Operator);
        $stmt->bindParam(':CommissionDate', $this->CommissionDate);
        $stmt->bindParam(':Description', $this->Description);
        $stmt->bindParam(':SystemPower', $this->SystemPower);
        $stmt->bindParam(':AnnualProduction', $this->AnnualProduction);
        $stmt->bindParam(':CO2Avoided', $this->CO2Avoided);
        $stmt->bindParam(':Reimbursement', $this->Reimbursement);
        $stmt->bindParam(':SolarPanelModules', $this->SolarPanelModules);
        $stmt->bindParam(':AzimuthAngle', $this->AzimuthAngle);
        $stmt->bindParam(':InclinationAngle', $this->InclinationAngle);
        $stmt->bindParam(':Communication', $this->Communication);
        $stmt->bindParam(':Inverter', $this->Inverter);
        $stmt->bindParam(':Sensors', $this->Sensors);
        $stmt->bindParam(':ID', $this->ID);
        
        // Execute query
        if($stmt->execute()){
          return true;
        }
        
        // Print error if something goes wrong
        printf("Error: %s. \n", $stmt->error);
        
        return false;
    }

    // Delete Post
    public function delete(){
      // Create query
      $query = 'DELETE FROM ' . $this->table . ' WHERE ID = :ID';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean Data
      $this->ID = htmlspecialchars(strip_tags($this->ID));

      // Bind Data
      $stmt->bindParam(':ID', $this->ID);

      // Execute query
      if($stmt->execute()){
        return true;
      }
      
      // Print error if something goes wrong
      printf("Error: %s. \n", $stmt->error);
      
      return false;
    }

  }    
?>