<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Weather Stuff</title>
        
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <?php
            require_once 'settings.php';
            $src = file_get_contents($url);
            //$src = file_get_contents("test.json");
            $obj = json_decode($src, true);
            
            //Reads weather for the next 5 days
            //There are 8 reads per day (3 hours each)
            //There are 40 reads total
            $rainPerDay = array();
            $lowestTemp = array();
            $highestTemp = array();
            for($i = 0; $i < sizeof($obj['list']); $i++){
                $weatherDateArr = explode(' ', $obj['list'][$i]['dt_txt']);
                $weatherDate = $weatherDateArr[0];
                
                //If there are no values for the date, "create" it
                if(!isset($rainPerDay[$weatherDate])){ $rainPerDay[$weatherDate] = 0; }
                if(!isset($lowestTemp[$weatherDate])){ $lowestTemp[$weatherDate] = 999; }
                if(!isset($highestTemp[$weatherDate])){ $highestTemp[$weatherDate] = -999; }
                
                
                //Add the 3-hour interval rain-value to the date
                if(isset($obj['list'][$i]['rain']['3h'])){
                    $rainPerDay[$weatherDate] += $obj['list'][$i]['rain']['3h'];  
                }
                
                //Check, if the 3-hour interval temperature is the lowest
                if(isset($obj['list'][$i]['main']['temp_min'])){
                    $lowTempNew = $obj['list'][$i]['main']['temp_min'];
                    if($lowestTemp[$weatherDate] > $lowTempNew){
                        $lowestTemp[$weatherDate] = $lowTempNew;  
                    }   
                }
                
                //Check, if the 3-hour interval temperature is the highest
                if(isset($obj['list'][$i]['main']['temp_max'])){
                    $highTempNew = $obj['list'][$i]['main']['temp_max'];
                    if($highestTemp[$weatherDate] < $highTempNew){
                        $highestTemp[$weatherDate] = $highTempNew;  
                    }   
                }
            }
            
            require_once 'chartMaker.php';
        ?>
        
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>    
        
    </body>
</html>
