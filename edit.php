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
                            <!-- Database updeted-->
                             <?php
 
                            $id= $_GET['id'];
                            $select ="SELECT * FROM `users` WHERE  id='$id'";
                            $query =mysqli_query($conn,$select);
                            $data = mysqli_fetch_array($query);
                                    
                                     
                              if(isset($_POST['updated'])){
                                  
                           $name = $_POST['name']; 
                           $password = $_POST['password'];
                           $img =$_FILES['image'];
                           
                           $tmp_name  =$img['tmp_name'];
                           $file_name = $img['name'];
                              
                           if($img['size'] >1){
                               if(file_exists("image/".$data['image']) && !empty($data['image'])){
                                   unlink("image/".$data['image']);
                               }
                               move_uploaded_file($tmp_name,"image/".$file_name);
                               
                               $update_sql ="UPDATE users SET name='$name',password='$password',image='$file_name' WHERE id='$id'";
                           }else{
                               $update_sql ="UPDATE users SET name='$name',password='$password' WHERE id='$id'";
                           }
                                  $update_result =mysqli_query($conn,$update_sql);
                                  
                                  if($update_result){
                                      header('location:index.php');
                                  }
                               }
                          ?>
                          
                          
                          <form action="" method="POST" enctype="multipart/form-data">
                           
                             <div class="md-3">
                                 <label>Name</label>
                                 <input type="text" name="name" value="<?php echo $data['name'];?>" class="form-control">
                             </div>
                            
                             <div class="md-3">
                                 <label>Password</label>
                                 <input type="text" name="password"  value="<?php echo $data['password'];?>" class="form-control">
                             </div>
                               <div class="md-3">
                                 <label>Image</label>
                                 <input type="file" name="image" id="image"  class="form-control">
                             </div>  
                                <div class="md-3" style="padding-top:12px;">
                                 
                                 <img id="showimage" src="image/<?php echo $data['image'];?>" style="height:100px; width:100px; border:1px solid black">
                             </div><br>
                             <div class="md-3">
                                 <button type="submit" name="updated" class="btn btn-primary">
                                     Updated
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
                    
 

              
 





 

