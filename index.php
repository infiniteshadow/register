<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>

<?php
$db = mysqli_connect('localhost', 'makemyas_shoppin', 'shopping', 'makemyas_shopping');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <div class="header">
        <h2>AUTO STORE ONLINE</h2>
        <p>Inventory Details </p>
    </div>
    <div class="content">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success">
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                </h3>
            </div>
        <?php endif ?>


        <div class="text-center" style="color:blue">
            <a href="category_details.php"><button id="menubutton" class="btn btn-success" type="button">Add Category</button>
                <a href="product_details.php"><button id="menubutton" class="btn btn-success" type="button">Add Product</button>
        </div>

        <!-- logged in user information -->
        <?php if (isset($_SESSION['username'])) : ?>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>



            <div id="tables-container" style="margin:20px">

                <div id="category-table-container" style="margin:20px">

                    <table border='1' class="table table-striped table-bordered nowrap table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <?php
                                    // echo $db;
                                    $sql = "SHOW columns FROM categories";

                                    // echo $sql;
                                    $result = mysqli_query($db, $sql);
                                    $num_cols = 0;
                                    $col_name = array();
                                    while ($row = mysqli_fetch_array($result)) {
                                        // print_r($row);
                                        $num_cols += 1;
                                        array_push($col_name, $row['Field']);
                                        echo "<th>" . $row['Field'] . "</th>";
                                    }
                                    ?>


                            </tr>
                        </thead>


                        <tbody>

                            <?php
                                $sql = "SELECT * FROM categories";
                                // echo $sql;
                                $result = mysqli_query($db, $sql);
                                // print_r($result);
                                while ($row = mysqli_fetch_array($result)) {
                                    // print_r($row);
                                    echo "<tr>";
                                    for ($i = 0; $i < $num_cols; $i++) {
                                        $val = $row[$col_name[$i]];


                                        echo "<td>" . $val . "</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>



                        </tbody>
                    </table>


                </div>
                <div id="product-table-container" style="margin:20px">

                    <table border='1' class="table table-striped table-bordered nowrap table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <?php
                                    $sql = "SHOW columns FROM product";

                                    // echo $sql;
                                    $result = mysqli_query($db, $sql);
                                    $num_cols = 0;
                                    $col_name = array();
                                    while ($row = mysqli_fetch_array($result)) {
                                        // print_r($row);
                                        $num_cols += 1;
                                        array_push($col_name, $row['Field']);
                                        echo "<th>" . $row['Field'] . "</th>";
                                    }
                                    ?>


                            </tr>
                        </thead>


                        <tbody>

                            <?php
                                $sql = "SELECT * FROM product";
                                // echo $sql;
                                $result = mysqli_query($db, $sql);
                                // print_r($result);
                                while ($row = mysqli_fetch_array($result)) {
                                    // print_r($row);
                                    echo "<tr>";
                                    for ($i = 0; $i < $num_cols; $i++) {
                                        $val = $row[$col_name[$i]];


                                        echo "<td>" . $val . "</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>



                        </tbody>
                    </table>


                </div>
                

            </div>
        <?php endif ?>
    </div>

</body>

</html>