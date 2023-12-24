  <?php
   
    include_once("config.php");
       $id= $_GET['id'];
        $sql = "SELECT * FROM users WHERE id='$id'";
            $result = mysqli_query($conn,$sql);

            $data = mysqli_fetch_array($result);
          $deletetable = $data['image'];
           if(!empty($deletetable)){
               unlink("image/".$deletetable);
           }

         $delete ="DELETE FROM users WHERE id='$id'";
           if(mysqli_query($conn,$delete)){
               header("location:index.php");
              } 
        ?>
