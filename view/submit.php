<?php

	echo "<pre>";
  	var_export($_POST);

  	// Create connection
  	$conn = new mysqli('localhost','root','','lunch');

  	// Check connection
  	if ($conn -> connect_error)
  	{
  		die("Connection failed: " . $conn -> connect_error);
  	}
  	echo "<br>" . "Connected successfully" . "<br><br>";


    // Insert some info in the DB
    $todaysDate = date("o-m-d");
    echo "<br>Today's date is: $todaysDate <br><br><br>";

     // $insert_restaurant = $conn->query('INSERT INTO restaurant (id, name, telefon, strada)
     //                                     VALUES("", '. $todaysDate .', "1234567890", "str. albacului")');
     
   // $sql_insert_main = "INSERT INTO main (id, rest_name, menu_price, menu_name, user_name, date_added)
   //                          VALUES('', '$_POST[restaurant_name]','$_POST[menu_price]','$_POST[menu_name]',
   //                            '$_POST[person_name]','$todaysDate')";

   // $insert_restaurant = $conn -> query($sql_insert_main);

    // Get the info from the DB
     $sql_get_menu_by_date = "SELECT * FROM main WHERE date_added = '$todaysDate'"; 
     $result = $conn -> query($sql_get_menu_by_date);
     if($result -> num_rows > 0)
     {
      echo "<table><tr><th>Cine?</th><th>Ce?</th><th>Cat costa?</th></tr>";
      // Output data for each row
      while ($row = $result -> fetch_assoc())
      {
        echo "<tr><td>".$row["user_name"]."</td><td>".$row["menu_name"]."</td><td>".$row["menu_price"]."</td></tr>";
      }
      echo "</table>";
     }
     else
     {
      echo "Nobody ordered anything yet today.";
     }

     $conn -> close();
?>

<?php

?>