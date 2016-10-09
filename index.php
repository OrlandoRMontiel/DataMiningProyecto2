<?php 
    include("config/config.php");

?>
<!DOCTYPE html>
<html>

<head>
    <!--Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
    <!--Optimización a dispositivos móviles-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--UTF-8-->
    <meta charset="UTF-8">
    <title>Registrarse | FarmaPro</title>
    <!--Personalizado login.css-->
    <link type="text/css" rel="stylesheet" href="css/register.css" />
</head>

<body>

<div id="accordion" role="tablist" aria-multiselectable="true">
	
	<?php
		$DBList = array();

		$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

		$query = "SHOW DATABASES";
		$result = mysqli_query($db, $query);
		while ($record = mysqli_fetch_array($result, MYSQLI_NUM)) {        
			array_push($DBList, $record[0]);
		}
	
	foreach ($DBList as &$database) {
		echo "
		<div class='panel panel-default'>
		<div class='panel-heading' role='tab' id='headingOne'>
      <h4 class='panel-title'>
        <a data-toggle='collapse' data-parent='#accordion' href='#collapse$database' aria-expanded='true' aria-controls='collapseOne'>
          $database
        </a>
      </h4>
    </div> 
	<div id='collapse$database' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingOne'> ";

	$query = "use ".$database;
	$result = mysqli_query($db, $query);
	
	$query = "SHOW TABLES";
	$result = mysqli_query($db, $query); 
      
	  while ($record = mysqli_fetch_array($result, MYSQLI_NUM)) {        
        	echo "|-";
        	echo $record[0];

        	$query2 = "DESCRIBE ".$record[0];
    		$result2 = mysqli_query($db, $query2);
    		while ($record2 = mysqli_fetch_array($result2, MYSQLI_NUM)) {        
        		echo "<br>";
        		echo "&nbsp;&nbsp;&nbsp;|-";
        		echo $record2[0];
				echo " ---- ";
				echo $record2[1];
    		}

        	echo "<br>";        	
    	}
    	echo "<br>";
		echo "</div>";
	}
  echo "</div>";
?>
</div>

    <!--jquery-2.1.1.min.js y materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
<body>

</html>	