<?php
session_start();

// initializing variables
$category_name = "";
$product_name ="";
$available ="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'makemyas_shoppin', 'shopping', 'makemyas_shopping');

// CATEGORY REGISTER USER
if (isset($_POST['product_usr'])) {
  // receive all input values from the form
  $category_name = mysqli_real_escape_string($db, $_POST['category_name']);
  $product_name = mysqli_real_escape_string($db, $_POST['product_name']);
  $available = mysqli_real_escape_string($db, $_POST['available']);
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($category_name)) { array_push($errors, "Category name is required"); }
  if (empty($product_name)) { array_push($errors, "Product name is  required"); }
  if (empty($available)) { array_push($errors, "Amount is  required"); }
  
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM product WHERE category_name='$category_name' OR product_name='$product_name' OR available='$available' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  // if ($user) { // if user exists
  //   if ($user['category_name'] === $category_name) {
  //     array_push($errors, "Category Name already exists");
  //   }

  //   if ($user['no_of_products'] === $no_of_products) {
  //     array_push($errors, "Number of products already exists");
  //   }
  // }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  

  	$query = "INSERT INTO product (category_name,product_name,available) 
          VALUES('$category_name', '$product_name','$available')";
    // echo $query;
  	mysqli_query($db, $query);
  	$_SESSION['category_name'] = $category_name;
  	$_SESSION['success'] = "Details are now entered.";
  	header('location: index.php'); //redirect to home page
  }
}

  
  ?>



