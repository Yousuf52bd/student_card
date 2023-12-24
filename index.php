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

     <title>Student CRUD</title>
 </head>

 <body>

     <div class="container mt-4">
         <div class="row mt-5">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         <h4> Details
                             <a href="add.php" class="btn btn-primary float-end">Add Students</a>
                         </h4>
                     </div>
                     <div class="card-body">
                             <table class="table table-bordered table-striped">
                             <thead>
                                 <tr>
                                      <th>Id</th>
                                     <th>User Name</th>
                                     <th>Password</th> 
                                     <th>Image</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <?php
                                 //database Select

                                 $select = "SELECT * FROM users";
                                 $result =mysqli_query($conn,$select);
                                 while($data = mysqli_fetch_array($result)){?>
                                  <tbody>
                                 <tr>
                                    <td><?php echo $data['id'];?></td>
                                     <td><?php echo $data['name'];?></td> 
                                      <td><?php echo $data['password'];?></td> 
                                 
                                     <td><img src="image/<?php echo $data['image']?>" width="120px" height="130px"></td>

                                     <td>
                                         <a href="edit.php?id=<?php echo $data['id'];?>" class="btn btn-info mt-2">EDIT</a>
                                         
                                         <a onclick="return confirm('Are Your Sure Want to deleter now?')" class="btn btn-danger" href="delele.php?id=<?php echo $data['id'];?>">Delete</a>
                                     </td>
                                 </tr>
                             </tbody>
                                <?php 
                                }
                                 ?>
                          
                         </table>

                     </div>
                 </div>
             </div>
         </div>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

 </body>

 </html>
       