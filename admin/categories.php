


<?php
include "includes/admin_header.php";

?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
include "includes/admin_navigation.php";

?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin 
                            <small>Author</small>
                        </h1>



                        <div class="col-xs-6">
                    <?php
                       insert_category();

 
                      ?>
                   





                        <form action="" method="post">
                          <lebel for="cat-title" > Add Categories</lebel>
                            <div class="form-group">
                                <input type="text" class ="form-control" name="cat_title">

                            </div>

                            <div class="form-group">
                                <input  class="btn btn-primary" type="submit" name="submit" value="Add Categoty">

                            </div>
                           

  
                        </form>

                        <!-- edit porm  -->
                                <?php

                                if(isset($_GET['edit']))
                                {
                                    $cat_id=$_GET['edit'];
                                    include "includes/update_categories.php";

                                }

                                ?>

                        </div> 
<!-- add category form  -->
                        <div class="col-xs-6"> 

                        
                         <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                               <tbody>

                               <?php   // SHOW ALL CATEGORY 
                                findallcategory();
                                ?>     
    
                                <?php   //DELETE PART CATEGORY                          
                                    deletecategory();
                                ?>

                            </tbody>
                
                                
                            </table>


                            </div>

                      

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php
include "includes/admin_footer.php";

?>
