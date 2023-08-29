<?php require("dbcon.php"); ?>
<!DOCTYPE html>
<html lang="">
<!--- Author Sudarshani -->
<!-- Khata-Book Project -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="./CSS/main.css" rel="stylesheet">
    
</head>

<body id="body" class="">
    <!-- master -->
    <?php include 'side_menu.php';
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    $stat_id = "";
    $js = "home";
    if (!isset($queries['master'])) {
        include './Components/home.php';
        include 'emp_data.php'; 
    } else if ($queries['master'] == "usertype") {
        include './Components/usertype.php';
        include 'emp_data.php';
    } else if ($queries['master'] == "staff") {
        include './Components/staff.php';
    } else if ($queries['master'] == "state") {
        include './Components/state.php';
        include 'emp_data.php'; 
        $js = "state";
    } else if ($queries['master'] == "city") {
        include './Components/city.php';
        include 'emp_data.php';
        $js = "city";
    }else if ($queries['master'] == "area") {
        include './Components/area.php';
        include 'emp_data.php';
        $js = "area";
    }else if ($queries['master'] == "customer_type") {
        include './Components/customer_type.php';
    } else if ($queries['master'] == "customer") {
        include './Components/customer.php';
    } else if ($queries['master'] == "supplier") {
        include './Components/supplier.php';
    } else if ($queries['master'] == "sell") {
        include './Components/sell_entry.php';
    } else if ($queries['master'] == "reciept") {
        include './Components/reciept_entry.php';
    } else if ($queries['master'] == "allreport") {
        include './Components/all_cusreport.php';
    } else if ($queries['master'] == "singlereport") {
        include './Components/single_custreport.php';
    } else {
        include './Components/home.php';
        include 'emp_data.php';
    }
    
    ?>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="module" src="Javascript/<?php echo $js; ?>.js"></script>
    <!-- <script src="Javascript/main.js"></script> -->
    <!-- <script type="module"></script> -->
    <script> 
            var body = document.getElementById("body");
            body.onload = () => {
                // state code
            var pres = <?php echo (isset($_GET["pres"])) ? $_GET["pres"].";" : "\"hello\";"; ?>
            if(pres == 1) {
                alert("Record Already Present");
            }
            //state code end
            }
        </script>
</body>

</html>
