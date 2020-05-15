<?php 

$siteUrl = $_SERVER['DOCUMENT_ROOT'];
include $siteUrl . '/modules/config/db.php';
$page = "order";

include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';

$sql = "SELECT * FROM box WHERE id =". $_GET["id"];

$result = $conn->query($sql);

$row = mysqli_fetch_assoc($result);  

if(isset($_POST["status"]) && $_POST["status"] != "") {

      $sql = "UPDATE box SET status ='". $_POST["status"] ."' WHERE box.id =". $_GET["id"]; 
      mysqli_query($conn, $sql);

      header("Location: /admin/order.php");    

  }

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../admin/index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="../admin/order.php">Order</a></li>
    <li class="breadcrumb-item active" aria-current="page">Изменить статус</li>
  </ol>
</nav>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Change Status</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Change Status</label>
                                <select class="form-control" name="status">

                                    <option value="0">Ничего не выбрано</option>
                                    <option value="Новый заказ">Новый заказ</option>
                                    <option value="Отправлен клиенту">Отправлен клиенту</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <a href="order.php" type="button" class="btn btn-outline-dark">Cancel</a>
                    <button type="submit" class="btn btn-success btn-fill pull-right">Save</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

