<?php
require("dbcon.php");
include '_variables.php';
if($_POST['page'] == "usertype"){
    $sql = "insert into tblusertype values('$id','$type')";
}else if($_POST['page'] == "home"){
    $sql="insert into tblempdata values('$id','$name','$address','$state','$city','$area','$mobi','$bal','$type')";
}else if($_POST['page'] == "state"){
    $i=0;
    $NewId = 0;
    while($name[$i] != '.'){
        $NewId =  10 * $NewId + ($name[$i]-'0');
        $i++;
    }
    $newName = substr($name,$i+2,strlen($name));
    $sql="select * from state where `user id` = $NewId and state = '$state'";
    $res=mysqli_query($link,$sql); 
    if($res ->num_rows == 1){
        header('Location: http://localhost/my/khata-book/project_one/index.php?master=state&pres=1');
        exit();
    }else{
        $sql = "insert into state values('$NewId','$newName','$state')";
    }
}else if($_POST['page'] == "city"){
    $i=0;
    $NewId = 0;
    while($name[$i] != '.'){
        $NewId =  10 * $NewId + ($name[$i]-'0');
        $i++;
    }
    $newName = substr($name,$i+2,strlen($name));
    $sql="select * from city where `User Id` = '$NewId' and State ='$state' and City = '$city'";
    $res=mysqli_query($link,$sql); 
    if($res ->num_rows == 1){
        header('Location: http://localhost/my/khata-book/project_one/index.php?master=state&pres=1');
        exit();
    }else{
        $sql = "insert into city values('$NewId','$newName','$state','$city')";
    }
}else if($_POST['page'] == "area"){
    $i=0;
    $NewId = 0;
    while($name[$i] != '.'){
        $NewId =  10 * $NewId + ($name[$i]-'0');
        $i++;
    }
    $newName = substr($name,$i+2,strlen($name));
    $sql="select * from area where `User Id` = '$NewId' and State ='$state' and City = '$city' and Area = '$area'";
    $res=mysqli_query($link,$sql); 
    if($res ->num_rows == 1){
        header('Location: http://localhost/my/khata-book/project_one/index.php?master=area&pres=1');
        exit();
    }else{
        $sql = "insert into area values('$NewId','$newName','$state','$city','$area')";
    }
}else{
    $sql = "";
}

if(mysqli_query($link,$sql)){
    // echo "<script>alert('record inserted')</script>";
    $extra="index.php?master=" . $_POST['page'];
    $host=$_SERVER['HTTP_HOST'];
    $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    echo"<script>open('http://$host$uri/$extra','_self')</script>";
}else{
    $error=mysqli_error($link);
    echo $error;
}
mysqli_close($link);
?>
