                 
       <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Author</th>
                                        <th>Comment</th>
                                        <th>Email </th>
                                        <th>Status</th>
                                        <th>In Response To</th>
                                        <th>Date</th>
                                        <th>Approved</th>
                                        <th>Unapproved</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                </thead>
                               <tbody>

                             
                            <?php

                            $query="Select * from comments ";
                            $select_comments=mysqli_query($connection,$query);

                                while($row=mysqli_fetch_assoc($select_comments))
                                {
                                    $comment_id=$row['comment_id'];
                                    $comment_post_id=$row['comment_post_id'];
                                    $comment_author=$row['comment_author'];
                                    $comment_content=$row['comment_content'];
                                    $comment_email=$row['comment_email']; 
                                    $comment_status=$row['comment_status'];
                                    $comment_date=$row['comment_date'];
                                    
                                    echo "<tr>";
                                    echo "<td> {$comment_id}</td>";
                                    echo "<td>{$comment_author} </td>";
                                    echo "<td>{$comment_content} </td>";  

                                    // $query="Select * from categories where cat_id = {$post_category_id}";
                                    // $select_categories_id=mysqli_query($connection,$query);
    
                                    //     while($row=mysqli_fetch_assoc($select_categories_id))
                                    //     {
                                    //         $cat_id=$row["cat_id"];
                                    //         $cat_title=$row["cat_title"];
                                            
                                            


                                        
                                    // echo "<td>{$cat_title} </td>";
                                    //     }


                                    echo "<td>{$comment_email} </td>"; 
                                    echo "<td>{$comment_status} </td>";    


                                    $query = "SELECT * from  posts where post_id =$comment_post_id ";
                                    $select_post_id_query = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($select_post_id_query))
                                    {
                                        $post_id=$row['post_id'];
                                        $post_title=$row['post_title'];
                                        echo "<td><a href ='../post.php?p_id=$post_id'>$post_title </td>";  
                                    }
                                                              
                                    echo "<td> {$comment_date}</td>";                                  
                                    echo "<td ><a href ='comments.php?approve=$comment_id'>Aprove</a></td>";
                                    echo "<td ><a href ='comments.php?unapprove=$comment_id '>Unapprove</a></td>";
                                    echo "<td ><a href ='posts.php?source=edit_post&p_id='>Edit</a></td>";
                                    echo "<td ><a href ='comments.php?delete= $comment_id'>Delete</a></td>";
                                    echo "</tr>";
                                    
  
                                }

                             ?>


                               
                            </tbody>
                
                                
                            </table>


                            <?php

// approve 

                             if(isset($_GET['approve']))  
                                {
                                    $the_comment_id=$_GET['approve'];
                                    $query=" UPDATE comments set comment_status = 'Approved' where comment_id=$the_comment_id ";
                                    $approave_comment_query=mysqli_query($connection,$query);
                                    header("Location: ./comments.php");

                                }

                                // unapproave 
                            if(isset($_GET['unapprove']))  
                            {
                                $the_comment_id=$_GET['unapprove'];
                                $query=" UPDATE comments set comment_status = 'Unapproved' where comment_id=$the_comment_id ";
                                $unapproave_comment_query=mysqli_query($connection,$query);
                                header("Location: ./comments.php");

                            }
                            if(isset($_GET['delete']))
                            {
                                $the_comment_id=$_GET['delete'];
                                $query="DELETE from comments where comment_id={$the_comment_id} ";
                                $delete_query=mysqli_query($connection,$query);
                                header("Location: ./comments.php");
                            }


                            ?>
