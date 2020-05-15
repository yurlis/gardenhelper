<?php 

   $siteUrl = $_SERVER['DOCUMENT_ROOT'];
include $siteUrl . '/modules/config/db.php';

    $page = "order";

    include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../admin/index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">calendar</li>
  </ol>
</nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <h4 class="card-title">
                        Календарь
                        
                        <a href="add_c.php" type="button" class="btn btn-success">Добавить в календарь</a>
 
                    </h4>
                    
                    <p class="card-category"></p>

                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Plant</th>
                            <th>Zone</th>
                            <th>Care</th>
                            <th>Tool</th>
                            <th>Comment</th>
                            <th>Date from</th>
                            <th>Date to</th>

                            <th>Option</th>
                        </thead>

                        <tbody>

                            <?php 

                                $sql = "SELECT * FROM calendar";
                                $result = $conn->query($sql);
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                   
                            ?>        
                            <tr>
                                <td><?php echo $row['id']?></td>

                                <?php

                                $sql = "SELECT * FROM plant WHERE id=" . $row['plant_id'];
                        
                                 $plant = mysqli_query($conn, $sql);
                      
                                 $plant = mysqli_fetch_assoc($plant);


                                ?>

                                <td><?php echo $plant['name']?></td>

                                 <?php

                                $sql = "SELECT * FROM zone WHERE id=" . $row['zone_id'];
                        
                                 $zone = mysqli_query($conn, $sql);
                      
                                 $zone = mysqli_fetch_assoc($zone);


                                ?>

                                <td><?php echo $zone['name']?></td>

                                 <?php

                                $sql = "SELECT * FROM care WHERE id=" . $row['care_id'];
                        
                                 $care = mysqli_query($conn, $sql);
                      
                                 $care = mysqli_fetch_assoc($care);


                                ?>
                                <td><?php echo $care['name']?></td>

                                 <?php

                                $sql = "SELECT * FROM tool WHERE id=" . $row['tool_id'];
                        
                                 $tool = mysqli_query($conn, $sql);
                      
                                 $tool = mysqli_fetch_assoc($tool);


                                ?>

                                <td><?php echo $tool['full_name']?></td>

                                <td><?php echo $row['comment']?></td>
                                <td><?php echo $row['date_from']?></td>
                                <td><?php echo $row['date_to']?></td>
                                <td>
                                    
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                          <a href="edit_c.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">Edit</a>
                                          <a href="delete_c.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">Delete</a>
                                        </div>


                                </td>
                            </tr>
       
                            <?php 

                                }

                            ?>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  
<?php 

    include $_SERVER['DOCUMENT_ROOT'].'/admin/parts/footer.php';

?> 