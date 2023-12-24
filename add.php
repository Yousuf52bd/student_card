 <?php
    include_once("config.php");

?>
 <!doctype html>
 <html lang="en">

 <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ajax libs jquery-->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <title>Student CRUD</title>
 </head>

 <body>

     <div class="container mt-4">
         <div class="row">
             <div class="col-md-12">
               
                     <div class="card-header">
                         <h4> Details
                             <a href="index.php" class="btn btn-primary float-end">Add Lish</a>
                         </h4>
                     </div>
                    
                       <?php
                         // Insert database
                       if(isset($_POST['submit_btn'])){
                          $name = $_POST["name"]; 
                          $password = $_POST["password"];
       
                              $image =$_FILES["image"];
                              $folder_name  =$image["tmp_name"];
                              $image_tmp = $image["name"];
 

                               if(move_uploaded_file($folder_name,"image/" .$image_tmp)){
        
                                   $sql = "INSERT INTO users(name, password,image) VALUES ('$name','$password','$image_tmp')";
       
                                   if($result = mysqli_query($conn,$sql)){
                                      header("location:index.php");
     
                                    }
                                  }
                                 }                           
                            ?>
                        
                        
                        
                         <form action="" method="POST" enctype="multipart/form-data">
                           
                             <div class="md-3">
                                 <label>Name</label>
                                 <input type="text" name="name" placeholder="Username"  class="form-control">
                             </div>
                            
                             <div class="md-3">
                                 <label>Password</label>
                                 <input type="text" name="password" placeholder="Enter Password"  class="form-control">
                             </div>
                               <div class="md-3">
                                 <label>Image</label>
                                 <input type="file" name="image" id="image" class="form-control">
                             </div>  
                                <div class="md-3" style="padding-top:12px;">
                                 
                                 <img id="showimage" src="image/<?php echo $data['image'];?>" style="height:100px; width:100px; border:1px solid black">
                             </div><br>
                             <div class="md-3">
                                 <button type="submit" name="submit_btn" class="btn btn-primary">
                                    Submit
                                 </button>
                             </div>
                         </form>
 
                 </div>
             </div>
         </div>
   
           <script type="text/javascript">
            $(document).ready(function(){
               $('#image').change(function(e){
               var reader = new FileReader();
                reader.onload = function(e){
                $('#showimage').attr('src',e.target.result);
                 }
                reader.readAsDataURL(e.target.files['0']);
         });
     });
</script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

 </body>

 </html>
