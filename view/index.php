 <!DOCTYPE html>
<html>
<head>
	<title>Lunch Time</title>
	<!-- <link rel="stylesheet" href="/projects/lunch/css/styles.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/css/foundation.css"> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/js/foundation/foundation.js"></script>
</head>

<body>
	<div class="row">
		<div class="small-2 medium-1 large-1 columns">
			<a href="history.php" target="_blank">History</a>
		</div>
		<div class="small-10 medium-11 large-11 columns text-center"
			<div id="title">
			  <h1 id="spanDate"><?= date('l, F j, Y'); ?></h1>
			</div>
		</div>
	</div>

	<div id="content-wrapper" class="row">
		<form action="" method="post"> <!-- action = "<?php echo $_SERVER['PHP_SELF']; ?>" -->

			<label class="columns small-12 medium-6 large-3">
				Restaurant Name
				<input type="text" name="restaurant_name" />
			</label>
			<label class="columns small-12 medium-6 large-3">
				Menu Price
				<input type="text" name="menu_price" />
			</label>
			<label class="columns small-12 medium-6 large-3">
				Menu Name
				<input type="text" name="menu_name" />
			</label>
			<label class="columns small-12 medium-6 large-3">
				Your Name
				<input type="text" name="person_name" />
			</label>
			<label class="columns small-12 medium-6 large-12 left">
			<button>Submit</button>

		</form>
	</div>

<?php
// print_r($_POST); exit;
if (!empty($_POST))
{
	echo "<pre>";
  	var_export($_POST);

  	// Create connection
  	$conn = new mysqli('localhost','root','','lunch');

  	// Check connection
  	if ($conn -> connect_error)
  	{
  		die("Connection failed: " . $conn -> connect_error);
  	}
  	echo "<br>" . "Connected successfully" . "<br>";


    $todaysDate = date("o-m-d");
    echo "Today's date is: $todaysDate <br>";

    // Insert some info in the DB

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
      echo "<table><tr><th>Cine?</th><th>Ce?</th></tr>";
      // Output data for each row
      while ($row = $result -> fetch_assoc())
      {
        echo "<tr><td>".$row["user_name"]."</td><td>".$row["menu_name"]."</td></tr>";
      }
      echo "</table>";
     }
     else
     {
      echo "Nobody ordered anything yet today.";
     }

     $conn -> close();
} else
{
	echo "
	<div class = 'row'>
		<div class = 'small-12 medium-12 large-12 columns'>
			Nobody ordered anything yet today.
		</div>
	</div>";
}

$conn -> close();
?>

	<div id="footer" class="row">
		<label class="columns small-12 medium-12 large-12 large-centered text-center">
			Copyright &copy 2015
		</label>
	</div>

</body>

</html> 