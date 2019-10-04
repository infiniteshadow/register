<?php include('server-category.php') ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">

    </head>
    <body>
	<div class="header">
	<h2>AUTO STORE ONLINE</h2>
	<p>Inventory Details </p>
</div>
    		<form method="post" action="category_details.php">
  			<?php include('errors.php'); ?>
  			<div class="input-group">
  	  		<label>Category Name</label>
  	  		<input type="text" name="category_name" value="">
  			</div>
  			<div class="input-group">
  	  		<label>Number of Products</label>
  	  		<input type="number" name="no_of_products" value="">
  			</div>
  	
  			<div class="input-group">
  	  		<button type="submit" class="btn" name="category_usr">Submit</button>
  			</div>
			</form>
	

    </body>
</html>