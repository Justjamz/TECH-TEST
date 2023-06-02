<!DOCTYPE html>
<html>
     
<head>
    <title>
        New Directions Query Database list 
    </title>
</head>
 
<body style="text-align:center;">
     
    <h1 style="color:green;">
        New Directions
    </h1>
     
    <h4>
        Query Database API for New Directions Filters
    </h4>
     
    <?php

    //aquires database connection
    require_once __DIR__ . '/config.php';
        
        
    class API {
    
        function showPosition(){
    
            $db = new Connect;
            //creats array to store data
            $NewDirectionsTable = array();
            //selects data from PHPMYADMIN TABLE
            $data = $db->prepare('SELECT * FROM NewDirections');  
            $data->execute();
            
            //while loop 
            while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
    
                $NewDirectionsTable[$OutputData['Applied For']] = array(
                    'Name' => $OutputData['Name'],
                    //'Email' => $OutputData['Email'],
                    //'Phone' => $OutputData['Phone'],
                    //'Company' => $OutputData['Company'],
                    //'Address1' => $OutputData['Address1'],
                    //'County' => $Outputdata['County'],
                    //'Country' => $OutputData['Country'],
                    //'Post Code' => $OutputData['Post Code'],
                    //'Require DBS Check' => $OutputData['Require DBS Check'],
                    //'Applied For' => $OutputData['Applied For'],
                    //'CV' => $OutputData['CV']
    
                );
            }
            return json_encode($NewDirectionsTable);
        }
    
        function showDBS(){
    
            $db = new Connect;
            //creats array to store data
            $NewDirectionsTable = array();
            //selects data from PHPMYADMIN TABLE
            $data = $db->prepare('SELECT * FROM NewDirections order by Require_DBS_Check');  
            $data->execute();
            
            //while loop 
            while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
    
                $NewDirectionsTable[$OutputData['Require DBS Check']] = array(
                    'Name' => $OutputData['Name'],
                    //'Email' => $OutputData['Email'],
                    //'Phone' => $OutputData['Phone'],
                    //'Company' => $OutputData['Company'],
                    //'Address1' => $OutputData['Address1'],
                    //'County' => $Outputdata['County'],
                    //'Country' => $OutputData['Country'],
                    //'Post Code' => $OutputData['Post Code'],
                    //'Require DBS Check' => $OutputData['Require_DBS_Check<nl>'],
                    //'Applied For' => $OutputData['Applied For'],
                    //'CV' => $OutputData['CV']
    
                );
            }
            return json_encode($NewDirectionsTable);
        }
    
        function showCounty(){
    
            $db = new Connect;
            //creats array to store data
            $NewDirectionsTable = array();
            //selects data from PHPMYADMIN TABLE
            $data = $db->prepare('SELECT * FROM NewDirections order by county');  
            $data->execute();
            
            //while loop 
            while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
    
                $NewDirectionsTable[$OutputData['County']] = array(
                    'Name' => $OutputData['Name'],
                    //'Email' => $OutputData['Email'],
                    //'Phone' => $OutputData['Phone'],
                    //'Company' => $OutputData['Company'],
                    //'Address1' => $OutputData['Address1'],
                    //'County' => $Outputdata['County'],
                    //'Country' => $OutputData['Country'],
                    //'Post Code' => $OutputData['Post Code'],
                    //'Require DBS Check' => $OutputData['Require DBS Check'],
                    //'Applied For' => $OutputData['Applied For'],
                    //'CV' => $OutputData['CV']
    
                );
            }
            return json_encode($NewDirectionsTable);
        }
    }

        if(array_key_exists('showcountybutton', $_POST)) {
            showcountybutton();
        }
        else if(array_key_exists('showdbsbutton', $_POST)) {
            showdbsbutton();
        }
        else if(array_key_exists('showappliedbutton', $_POST)) {
            showappliedbutton();
        }
        function showcountybutton() {
            $County= new API;
            echo $County->showCounty();
        }
        function showdbsbutton() {
            $DBS = new API;
            echo $DBS->showDBS();
        }
        function showappliedbutton() {
            $Position = new API;
            echo $Position->showPosition();
        }
        
        
    ?>
 
    <form method="post">
        <input type="submit" name="showcountybutton"
                class="button" value="Show County" />
         
        <input type="submit" name="showdbsbutton"
                class="button" value="Show DBS Check" />

        <input type="submit" name="showappliedbutton"
                class="button" value="Show Applied For" />
    </form>
</body>
 
</html>
