<?php
session_start();

// initializing variables
$category_name = "";
$no_of_products ="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'makemyas_shoppin', 'shopping', 'makemyas_shopping');

// CATEGORY REGISTER USER
if (isset($_POST['category_usr'])) {
  // receive all input values from the form
  $category_name = mysqli_real_escape_string($db, $_POST['category_name']);
  $no_of_products = mysqli_real_escape_string($db, $_POST['no_of_products']);
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($category_name)) { array_push($errors, "Category name is required"); }
  if (empty($no_of_products)) { array_push($errors, "Number of Products are required"); }
  
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM categories WHERE category_name='$category_name' OR no_of_products='$no_of_products' LIMIT 1";
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
  

  	$query = "INSERT INTO categories (category_name,no_of_products) 
          VALUES('$category_name', '$no_of_products')";
    // echo $query;
  	mysqli_query($db, $query);
  	$_SESSION['category_name'] = $category_name;
  	$_SESSION['success'] = "Details are now entered.";
  	header('location: index.php'); //redirect to home page
  }
}

  
  ?>



