<?php 

$siteUrl = $_SERVER['DOCUMENT_ROOT'];
include $siteUrl . '/modules/config/db.php';

include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';

$sql = "SELECT * FROM calendar WHERE id =". $_GET["id"];

$result = $conn->query($sql);

$row = mysqli_fetch_assoc($result);                                      

if(isset($_POST["plant_id"]) && isset($_POST["zone_id"]) && isset($_POST["care_id"]) && isset($_POST["tool_id"]) && isset($_POST["comment"]) && isset($_POST["date_from"]) && isset($_POST["date_to"])
&& $_POST["plant_id"] != "" && $_POST["zone_id"] != "" && $_POST["care_id"] != "" && $_POST["tool_id"] != "" && $_POST["comment"] != "" && $_POST["date_from"] != "" && $_POST["date_to"] != "") {

      $sql = "UPDATE calendar SET plant_id ='". $_POST["plant_id"] ."', zone_id ='". $_POST["zone_id"] ."', care_id = '". $_POST["care_id"] ."' , tool_id = '". $_POST["tool_id"] ."', comment = '". $_POST["comment"] ."', date_from = '". $_POST["date_from"] ."', date_to = '". $_POST["date_to"] ."' WHERE id =". $_POST["id"]; 
      mysqli_query($conn, $sql);

      header("Location: /admin/order.php");   

} 

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../admin/index.php">Главная</a></li>
    <li class="breadcrumb-item"><a href="../admin/products.php">Список растений</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $row['name']?></li>
  </ol>
</nav>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Редактировать календарь</h4>
            </div>
            <div class="card-body">
                <form method="POST">

                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                              <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" value=<?php echo $_GET['id'];?>>
                           </div>
                        </div>
                        <div class="col-md-12">
                              <div class="form-group">
                                <label>Комент</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="comment" value=<?php echo $row['comment'];?>>
                             </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Дата с</label>
                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="date_from" value=<?php echo $row['date_from'];?>>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Дата по</label>
                                 <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="date_to" value=<?php echo $row['date_to'];?>>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ростение</label>
                                <select class="form-control" name="plant_id">

                                    <option value="0">Ничего не выбрано</option>

                                    <?php 

                                        $sql = "SELECT * FROM plant";
                                        $result = $conn->query($sql);
                                        
                                        while ($row = mysqli_fetch_assoc($result)) {
                                       
                                    ?> 

                                    <option value=<?php echo $row['id'];?>><?php echo $row['name'];?></option>

                                    <?php 

                                        }

                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Зона</label>
                                <select class="form-control" name="zone_id">

                                    <option value="0">Ничего не выбрано</option>

                                    <?php 

                                        $sql = "SELECT * FROM zone";
                                        $result = $conn->query($sql);
                                        
                                        while ($row = mysqli_fetch_assoc($result)) {
                                       
                                    ?> 

                                    <option value=<?php echo $row['id'];?>><?php echo $row['name'];?></option>

                                    <?php 

                                        }

                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Действие</label>
                                <select class="form-control" name="care_id">

                                    <option value="0">Ничего не выбрано</option>

                                    <?php 

                                        $sql = "SELECT * FROM care";
                                        $result = $conn->query($sql);
                                        
                                        while ($row = mysqli_fetch_assoc($result)) {
                                       
                                    ?> 

                                    <option value=<?php echo $row['id'];?>><?php echo $row['name'];?></option>

                                    <?php 

                                        }

                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Средство</label>
                                <select class="form-control" name="tool_id">

                                    <option value="0">Ничего не выбрано</option>

                                    <?php 

                                        $sql = "SELECT * FROM tool";
                                        $result = $conn->query($sql);
                                        
                                        while ($row = mysqli_fetch_assoc($result)) {
                                       
                                    ?> 

                                    <option value=<?php echo $row['id'];?>><?php echo $row['full_name'];?></option>

                                    <?php 

                                        }

                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>

                    <a href="order.php" type="button" class="btn btn-outline-dark">Cancel</a>
                    <button type="submit" type="submit" class="btn btn-success btn-fill pull-right">Save</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

