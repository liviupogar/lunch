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
		<form action="" method="post">

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

	<!-- Content goes here -->

	<? if ($rows == 0): ?>
		<div class = 'row'>
			<div class = 'small-12 medium-12 large-12 columns'>
				Nobody ordered anything yet today.
			</div>
		</div>
	<? else: ?>
		<div class="row">
		<table>
			<div class="columns small-12 medium-12 large-12">
			<tr>
				<th>De unde?</th>
				<th>Cine?</th>
				<th>Ce?</th>
				<th>Cat costa?</th>
			</tr>
			</div>
      		<? while ($row = $result->fetch_assoc()): ?>
      			<div class="columns small-12 medium-12 large-12">
      			<tr>
      				<td><?= $row["rest_name"] ?></td>
      				<td><?= $row["user_name"] ?></td>
      				<td><?= $row["menu_name"] ?></td>
      				<td><?= $row["menu_price"] ?></td>
      			</tr>
      			</div>
      		<? endwhile ?>
		</table>
		</div>
	<? endif ?>

	<div id="footer" class="row">
		<label class="columns small-12 medium-12 large-12 large-centered text-center">
			Copyright &copy 2015
		</label>
	</div>

</body>

</html> 