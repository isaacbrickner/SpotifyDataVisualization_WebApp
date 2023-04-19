<?php include "header.php"; ?>

  <p>This webpage provides an interface to query User data pulled from Spotify.</p>
  <p>Data from the users below has been collected using a Spotify API:</p>
  <br>
  <?php include "showUsers.php"; ?>
  <br>
  <p>Use the suggest queries buttons below or input your own SQL to query the database!</p>
  <br>

  <p style="font-size: 16px; margin-bottom: 5px;">Suggested Queries...</p>
  <form method="post">
      <input type="submit" name="button1"
                class="button" value="Show Users Table Top Five" />
         
      <input type="submit" name="button2"
              class="button" value="Show Top Tracks Table Top Five" />

      <input type="submit" name="button3"
              class="button" value="Show Song_Features Table Top Five" />
  </form>

  <br>

  <form method="post">
    <label for="query" style="font-size: 16px;">Please enter SQL query in textbox below:</label><br>
    <input type="text" id="query" name="query" size ="50" required><br>
    <input type="submit" name="submitbutton" class="button" value="Submit Query">
  </form> 

  <br>

  <?php
      if(array_key_exists('submitbutton', $_POST)) {
        showQuery($_POST['query']);
        displayTable($_POST['query']);
      }

      else if(array_key_exists('button1', $_POST)) {
        showQuery("SELECT * FROM User LIMIT 5;");
        displayTable("SELECT * FROM User LIMIT 5;");
      }

      else if(array_key_exists('button2', $_POST)) {
        showQuery("SELECT * FROM Top_Tracks LIMIT 5;");
        displayTable("SELECT * FROM Top_Tracks LIMIT 5;");
      }

      else if(array_key_exists('button3', $_POST)) {
        showQuery("SELECT * FROM Song_Features LIMIT 5;");
        displayTable("SELECT * FROM Song_features LIMIT 5;");
      }
      
      function showQuery($input) {
        $sql = $input;  
        echo "<p> You input the query: ".$sql."</p>";
        echo '<br>';
      }

      function displayTable($input) { 
        $sql = $input;
        require "showTable.php";
      }
  ?>

<?php include "footer.php"; ?>