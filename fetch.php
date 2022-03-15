<?php 
include 'connection.php';
$idd = $_POST['id'];
$query1  = "select * from carttable where id = '$idd'";
$query2 = mysqli_query($con, $query1);

if(mysqli_num_rows($query2)> 0){
    echo "items already added";
}else{
    $query = "INSERT INTO carttable SELECT * FROM items WHERE id = '$idd'";
     $insert = mysqli_query($con, $query);
    $query3  = "select * from carttable";
    $insert1 = mysqli_query($con, $query3);
    $count = mysqli_num_rows($insert1);
    echo $count;
}


?>