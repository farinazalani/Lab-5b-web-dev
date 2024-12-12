<?php
include("database.php");
session_start();
$matric = mysqli_real_escape_string($con, $_POST['matric']);
$password = mysqli_real_escape_string($con, $_POST['password']);
//Query to populate data from table users
//check if username is exist
//populate username using associate array
//hold password value
$query = mysqli_query($con, "select * from users where matric = '$matric' and password = '$password'");
$exist = mysqli_num_rows($query);
$table_users = ""; //check username if exist (compare $exist: $query)
$table_pass = "";
//conditional statement
if($exist > 0){ //if return true
    while($num_row = mysqli_fetch_assoc($query)){
        $table_users = $num_row['matric'];
        $table_pass = $num_row['password'];
    }
    if(($matric == $table_users) && ($password == $table_pass))//check if username & password matc database and both must return true
    {
        //if return true
        if($password == $table_pass){
            //if return true
            $_SESSION['matric'] = $matric;
            
            header("location: users_table.php");
        }
    }
    //if return false
    else{

        Print '<script>alert("Incorrect Password!");</script>';
        Print '<script>window.location.assign("login.php");</script>';
    }

}

//if return false
else{

    Print '<script>alert("Incorrect Matric!");</script>';
    Print '<script>window.location.assign("login.php");</script>';

}

?>