<?php
    
    // Create connection
    //$con = mysqli_connect("127.0.0.1","hotspots","","Argus");
    
    // Check connection
    //if (mysqli_connect_errno()) {
    //    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //}

    echo "<html><body>\n";
    
    //echo "<script src=\"uphill.js\"></script>\n";
    
    //echo "<script type=\"text/javascript\"> startUp(); </script>";
    
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/uphill.css\">\n";
    
    echo "<div id=\"titleMenuDiv\">";
    
    echo "<div id=\"uphilllogo\">\n";
    
    //echo "<img src=\"/img/triangle.jpg\" alt=\"UpHillHelper\" title=\"UpHillHelper\"></img>\n";
    
    echo "<h1>UpHill Helper</h1>";
    
    echo "<br><br>";
    
    echo "</div>";


    echo "</div>";
    
    
    
    echo "<div id=\"mainframe\">\n";

    
    echo "This page emulates results of a different data states being fed into the same algorithm.<br><br>";
    
    echo "Newtons Second Law (F = ma) is the basis of calculation.<br><br>";
    
    echo "Car Used in Example is my own Saturn SW2, which I intend to use as an Analog to validate data";
    
    echo "<br><br> Data Source for Co-Efficients : <a target=\"_blank\" href=\"http://hpwizard.com/tire-friction-coefficient.html\">http://hpwizard.com/tire-friction-coefficient.html</a>";

    echo "<br>";
    
    //$scenarios = array();
    
    $scenarios = array(1, .7, .65, .55, .15, .08);
    
    //print_r($scenarios);
    
    for($it = 0; $it < 6; $it++) {
    
        // Co-Efficient of Friction
    
        //echo $it;
    
        $coefficient = $scenarios[$it];
    
        // g = 9.8 Meters per Second
    
        $Gravity = 9.8;
    
        // Mass of Car (Saturn SW2 @ 2,411 lbs or 1093 Grams
    
        $Mass = 1093;
    
        echo "<div class=\"inlinediv\">";
    
        echo "<h2>";
    
        $scenarioheader = "";
    
        switch($coefficient) {

            case '1':
                
                $scenarioheader = "Dry Asphalt";
                break;
                
                case '.7':
                
                $scenarioheader = "Wet Asphalt";
                break;
                
                case '.65':
                
                $scenarioheader = "Dry Earth";
                break;
                
                case '.55':
                
                $scenarioheader = "Wet Earth";
                break;
                
                case '.15':
                
                $scenarioheader = "Hard-Packed Snow";
                break;
                
                case '.08':
                
                $scenarioheader = "Ice";
                break;

        }
    
        echo "Situation = " . $scenarioheader;
    
        echo "</h2>";
    
        echo "<table>";
    
        echo "<th>Vehicle Angle (Degrees)</th>";
    
        echo "<th>Slippage (Yes / No) </th>";
    
        for($i = 0; $i < 47.5; $i += 2.5) {
        
            $A = $Mass * ($Gravity * sin(deg2rad($i)));
        
            $B = $Mass * ($Gravity * cos(deg2rad($i)));
            
            $friction = $coefficient * $B;
            
            $netforce = $A - $friction;
            
            echo "<tr>";
            
            echo "<td class=\"bordered\">";
            
            echo $i;
            
            echo "</td>";
            
            if($A > $friction) {
        
                //echo "<br><br>The object must move since the Net Force is stronger than the Friction Force";
                
                echo "<td class=\"red\">";
                
                echo " Slip";
            
            } else {
        
                //echo "<br><br>The object will not move due to Frictonal Forces";
                
                echo "<td class=\"green\">";
                
                echo " No Slip";
        
            }
            
            echo "</td>";
            echo "</tr>";

        }
    
        //echo "<br>";
    
        echo "</table>";

        echo "</div>";
    
    }
    

    echo "</body></html>\n";

    // Close connections
    //mysqli_close($con);
?>
