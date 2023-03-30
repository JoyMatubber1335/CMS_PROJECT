<form action="" method="post">
                          <lebel for="cat-title" > Edit Categories</lebel>



                          <?php

                            if(isset($_GET['edit']))
                            {
                                $cat_id=$_GET['edit'];
                                
                                $query="Select * from categories where cat_id = $cat_id ";
                                $select_categories_id=mysqli_query($connection,$query);

                                    while($row=mysqli_fetch_assoc($select_categories_id))
                                    {
                                        $cat_id=$row["cat_id"];
                                        $cat_title=$row["cat_title"];
                                        
                                        
                                    
                                    ?>

                          <input value =<?php if(isset($cat_title)){ echo $cat_title;}  ?> type="text" class ="form-control" name="cat_title"> 

                          <?php  }}?>


                          <?php   // UPDATE QUERY 

                        if(isset($_POST['Update_Categoty']))
                        {
                        $the_cat_title=$_POST['cat_title'];
                        $query="update categories set cat_title='{$the_cat_title}' where cat_id= {$cat_id} ";
                        $update_query=mysqli_query($connection,$query);
                        
                        }        
                        ?>
                            <div class="form-group">
                                <input  class="btn btn-primary" type="submit" name="Update_Categoty" value="Update Categoty">
                            </div>                            
                        </form>
                       