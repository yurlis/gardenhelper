<?php 

    $siteUrl = $_SERVER['DOCUMENT_ROOT'];
include $siteUrl . '/modules/config/db.php';
    $page = "products";

    include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../admin/index.php">Главная</a></li>
    <li class="breadcrumb-item active" aria-current="page">Список растений</li>
  </ol>
</nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <h4 class="card-title">
                        Список растений
                        
                        <a href="add.php" type="button" class="btn btn-success">Добавить растение</a>
 
                    </h4>
                    
                    <p class="card-category"></p>

                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Фото</th>
                            <th>Описание</th>
                            <th>Категория</th>
                            <th>Порода</th>
                            <th>Опции</th>
                        </thead>

                        <tbody>

                            <?php 

                                $sql = "SELECT * FROM plant";
                                $result = $conn->query($sql);
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $sql = "SELECT * FROM plant_category WHERE id=" . $row["category_id"];
                                     $cat = mysqli_query($conn, $sql);
                                     $cat = mysqli_fetch_assoc( $cat);  
                            ?>        
                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['name']?></td>
                                <td>
                                    
                                    <img src="<?php echo $row['picture_name'];?>" style="width: 100px; height: 100px; border-radius: 50%; border: 10px solid #629d21;">
                                    
                                </td>

                                <td><?php echo $row['description']?></td>
                                <td><?php echo $row['type_name']?></td>
                                <td><?php echo $cat['name']?></td>
                                <td style="padding-right: 0; display: table-cell;">
                                    
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                          <a href="edit.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">Изменить</a>
                                          <a href="modules/products/delete.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">Удалить</a>
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