<?php include('server-product.php') ?>
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
    		<form method="post" action="product_details.php">
  			<?php include('errors.php'); ?>
  			<div class="input-group">
  	  		<label>Category</label>
  	  		<input type="text" name="category_name" value="">
  			</div>
  			<div class="input-group">
  	  		<label>Product Name</label>
  	  		<input type="text" name="product_name" value="">
  			</div>
              <div class="input-group">
  	  		<label>Available</label>
  	  		<input type="number" name="available" value="">
  			</div>
  	
  			<div class="input-group">
  	  		<button type="submit" class="btn" name="product_usr">Submit</button>
  			</div>
			</form>
	

    </body>
</html>