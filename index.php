<?php 
include 'connection.php';
$query4  = "select * from carttable";
$insert2 = mysqli_query($con, $query4);
$get = mysqli_num_rows($insert2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
    <style>
        #nav{
            width: 100%;
            height: 60px;
            display: flex;
        }
        #nav> h3{
                margin-left: auto;
        }
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
    $select = "select * from items";
    $selectquery = mysqli_query($con, $select);

    ?>
    <div id="nav">
        <a href="cart.php"><h3>Count :<span id="sp"><?php echo $get; ?></span></h3></a>
    </div>
    <div id="container">
        <?php 
          while($fetch = mysqli_fetch_array($selectquery)){
              ?>
            <div class="one">
            <h4>Name :<?php echo $fetch['name']; ?></h4><br>
            <img src="<?php echo $fetch['image']; ?>" style="width: 100%; height : 200px;"><br>
            <h4>Price :<?php echo $fetch['price']; ?></h4>
            <button type="submit" name="submit" onclick="myfun(<?php echo $fetch['id']; ?>)">Add to cart</button>
            </div>
            <?php 
          }
        ?>
        </div>

        <script>
            // var array = [];
            function myfun(n){
                    $.ajax({
                    url : 'fetch.php',
                   type : 'POST',
                   data : {
                       id : n
                   },

                 success: function(response) {
                     if(response == "items already added"){
                         alert('items already added');
                     }else{
                        $("#sp").html(response);
                     }
                    }
               });
              
               
             
                  
            }
        </script>
</body>
</html>
