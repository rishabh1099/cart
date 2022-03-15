<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #container{
            width: 100%;
            display: flex;
            height: 500px;
            flex-wrap: wrap;
        }
        .one{
            width: 20%;
            height: 100%;
            flex-direction: row;
            margin: auto;
        }
    </style>
</head>
<body>
    <?php
    include 'connection.php';
    $query = "select * from carttable";
    $query1 = mysqli_query($con, $query);
    ?>
<div id="container">
        <?php 
          while($fetch = mysqli_fetch_array($query1)){
              ?>
            <div class="one">
            <h4>Name :<?php echo $fetch['name']; ?></h4><br>
            <img src="<?php echo $fetch['image']; ?>" style="width: 100%; height : 200px;"><br>
            <h4>Price :<?php echo $fetch['price']; ?></h4>
            <button type="submit" name="submit">Update</button>
            </div>
            <?php 
          }
        ?>
        </div>
</body>
</html>