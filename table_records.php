<?php 
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    $tblname = "";
    if (!isset($queries['master'])) {
        $tblname = "tblempdata";
    } else if ($queries['master'] == "usertype") {
        $tblname =  "tblusertype";
    }else if ($queries['master'] == "staff") {
        
    } else if ($queries['master'] == "state") {
        $tblname = "state";
    } else if ($queries['master'] == "city") {
        $tblname = "city";
    }else if ($queries['master'] == "area") {
        $tblname = "area";
    }else if ($queries['master'] == "customer_type") {
        
    } else if ($queries['master'] == "customer") {
        
    } else if ($queries['master'] == "supplier") {
        
    } else if ($queries['master'] == "sell") {
        
    } else if ($queries['master'] == "reciept") {
        
    } else if ($queries['master'] == "allreport") {
        
    } else if ($queries['master'] == "singlereport") {
        
    }else {
        $tblname = "tblempdata";
    }
?>