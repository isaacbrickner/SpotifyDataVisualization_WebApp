<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  $server = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'SpotifyData';

  $mysqli = new mysqli($server, $user, $password, $database);

  if ($mysqli->connect_error) {
  die('Connect Error (' .
  $mysqli->connect_errno . ') ' .
  $mysqli->connect_error);
  }

  // SQL query to select data from database
  // Perform a query, check for error
  try {
    $result = $mysqli->query($sql);

    $values = $result->fetch_all(MYSQLI_ASSOC);

    if ($result){
            echo '<h2 align="center">Query Results</h2>';
            echo '<table border="1px" width="100%">';
            $columns = array();

            if(!empty($values)){
                $columns = array_keys($values[0]);
            }

            echo '<tr>';
                foreach($columns as $attributeName){
                    echo '<th> '.ucwords($attributeName).'</th>';
                }
            echo '</tr>';

            $rows = array();

            for ($i = 0; $i < count($values); $i++){
                if(!empty($values)){
                    $rows = array_values($values[$i]);
                }

                echo '<tr>';
                    foreach($rows as $attributeName){
                        echo '<th> '.$attributeName.'</th>';
                    }
                echo '</tr>';
            }
            echo '</table>';
    }
  } catch (Exception $e){
    echo( $mysqli -> error);
  }

  $mysqli->close();
?>