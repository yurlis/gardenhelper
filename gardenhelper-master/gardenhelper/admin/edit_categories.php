<?php 

$siteUrl = $_SERVER['DOCUMENT_ROOT'];
include $siteUrl . '/modules/config/db.php';
$page = "categories";

include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';

if(isset($_FILES['image']) && isset($_POST["category"]) && $_POST["category"] != "" && $_FILES['image']['name'] != "") {

  move_uploaded_file($_FILES['image']['tmp_name'], "images/".$_FILES['image']['name']);

  $sql = "UPDATE plant_category SET name ='". $_POST["category"] ."', picture_name = 'images/".$_FILES['image']['name']."' WHERE id =". $_POST["id"]; 

  mysqli_query($conn, $sql);

  header("Location: /admin/category.php");    

}

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../admin/index.php">Главная</a></li>
    <li class="breadcrumb-item"><a href="../admin/category.php">Список сортов</a></li>
    <li class="breadcrumb-item active" aria-current="page">Изменить сорт</li>
  </ol>
</nav>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Изменить сорт</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">

                            <?php 

                                $sql = "SELECT * FROM plant_category WHERE id =". $_GET["id"];
                                $result = $conn->query($sql);
                                $row = mysqli_fetch_assoc($result);
                                                       
                            ?> 

                          <div class="form-group">
                              <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" value=<?php echo $_GET['id'];?>>
                           </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Category" name="category" value=<?php echo $row['name'];?>>
                            </div>
                        </div>
                        </div>

                        <label>Фотография</label>

                        <div class="fileform" style="background-color: #FFFFFF; border: 1px solid #CCCCCC; border-radius: 2px; cursor: pointer; height: 35px; overflow: hidden; padding: 2px; position: relative; text-align: left; vertical-align: middle; width: 250px;">

                                <div id="fileformlabel" style="background-color: #FFFFFF; float: left; height: 22px; line-height: 22px; overflow: hidden; padding: 2px; text-align: left; vertical-align: middle; width:160px; position: absolute;"></div>

                                <div class="selectbutton" style=" background-color: #A2A3A3;border: 1px solid #939494; border-radius: 2px; color: #FFFFFF; float: right; font-size: 16px; height: 100%; line-height: 25px; overflow: hidden; padding: 2px 6px; text-align: center; vertical-align: middle; width: 70px;">Обзор</div>
                                                     
                                <input id="upload" type="file" name="image" onchange="getName(this.value);" style="position:absolute; top:0; left:0; width:100%; -moz-opacity: 0; filter: alpha(opacity=0); opacity: 0; font-size: 150px; height: 30px; z-index:20;">
                            
                        </div><br>
                    
                    <a href="category.php" type="button" class="btn btn-outline-dark">Отмена</a>
                    <button type="submit" type="submit" class="btn btn-success btn-fill pull-right">Сохранить</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 

    include $_SERVER['DOCUMENT_ROOT'].'/admin/parts/footer.php';

?>