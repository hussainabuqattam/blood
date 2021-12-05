<?php
    $title = "Blood Stock";
    include "include/init.php";
    include("include/header.php");
    include("include/nav.php");
    include "include/bloodgroup.php";

    if(!isset($_SESSION['admin_ID']))
        Redirect("adminlogin.php");

    
    if(isset($_POST['update'])){
      $bloodgroup = $_POST['bloodgroup'];
      $newQuantity = $_POST['quantity'];

      $stmt = $connect->prepare("SELECT * FROM blood_stock WHERE bloodgroup = ?");
      $stmt->execute([$bloodgroup]);
      $blood_stock = $stmt->fetch();

      $stmt  =  $connect->prepare("UPDATE blood_stock SET quantity = ? WHERE bloodgroup = ?");
      $result = $stmt->execute([$blood_stock['quantity'] + $newQuantity, $bloodgroup]);

      if($result == true) {
        Refresh();
      }
    }
    
    $stmt = $connect->prepare("SELECT * FROM blood_stock WHERE bloodgroup = ?");
    $stmt->execute(["A-"]);
    $bloodAn = $stmt->fetch();

    $stmt = $connect->prepare("SELECT * FROM blood_stock WHERE bloodgroup = ?");
    $stmt->execute(["A+"]);
    $bloodAB = $stmt->fetch();

    $stmt = $connect->prepare("SELECT * FROM blood_stock WHERE bloodgroup = ?");
    $stmt->execute(["B-"]);
    $bloodBn = $stmt->fetch();

    $stmt = $connect->prepare("SELECT * FROM blood_stock WHERE bloodgroup = ?");
    $stmt->execute(["B+"]);
    $bloodBB = $stmt->fetch();

    $stmt = $connect->prepare("SELECT * FROM blood_stock WHERE bloodgroup = ?");
    $stmt->execute(["O-"]);
    $bloodOn = $stmt->fetch();

    $stmt = $connect->prepare("SELECT * FROM blood_stock WHERE bloodgroup = ?");
    $stmt->execute(["O+"]);
    $bloodOB = $stmt->fetch();

    $stmt = $connect->prepare("SELECT * FROM blood_stock WHERE bloodgroup = ?");
    $stmt->execute(["AB-"]);
    $bloodABn = $stmt->fetch();

    $stmt = $connect->prepare("SELECT * FROM blood_stock WHERE bloodgroup = ?");
    $stmt->execute(["AB+"]);
    $bloodABB = $stmt->fetch();

  ?>

<div class="wrapper ">
  <div class="main_content-card">
    <div class="row">
      <div class="col-sm-3">
        <div class="card card-bloods bg-light">
          <div class="card-body">
              <div class="blood">
                  <h2>A+ <i class="fas fa-tint"></i></h2>
              </div><br><br>
              <div>
                  <?= $bloodAB['quantity'] ?>
              </div>                            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
          <div class="card card-bloods bg-light">
              <div class="card-body">
                  <div class="blood">
                      <h2>B+ <i class="fas fa-tint"></i></h2>
                  </div><br><br>
                  <div>
                    <?= $bloodBB['quantity'] ?>
                  </div>                            
              </div>
            </div>
      </div>
      <div class="col-sm-3">
          <div class="card card-bloods bg-light">
              <div class="card-body">
                  <div class="blood">
                      <h2>O+ <i class="fas fa-tint"></i></h2>
                  </div><br><br>
                  <div>
                      <?= $bloodOB['quantity'] ?>
                  </div>                            
              </div>
            </div>
        </div>
        <div class="col-sm-3">
          <div class="card card-bloods bg-light">
              <div class="card-body">
                  <div class="blood">
                      <h2>AB+ <i class="fas fa-tint"></i></h2>
                  </div><br><br>
                  <div>
                    <?= $bloodABB['quantity'] ?>
                  </div>                            
              </div>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-sm-3">
        <div class="card card-bloods bg-light">
          <div class="card-body">
              <div class="blood">
                  <h2>A- <i class="fas fa-tint"></i></h2>
              </div><br><br>
              <div>
                <?= $bloodAn['quantity'] ?>
              </div>                            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
          <div class="card card-bloods bg-light">
              <div class="card-body">
                  <div class="blood">
                      <h2>B- <i class="fas fa-tint"></i></h2>
                  </div><br><br>
                  <div>
                    <?= $bloodBn['quantity'] ?>
                   </div>                            
              </div>
            </div>
      </div>
      <div class="col-sm-3">
          <div class="card card-bloods bg-light">
              <div class="card-body">
                  <div class="blood">
                      <h2>O- <i class="fas fa-tint"></i></h2>
                  </div><br><br>
                  <div>
                      <?= $bloodOn['quantity'] ?>
                  </div>                            
              </div>
            </div>
        </div>
        <div class="col-sm-3">
          <div class="card card-bloods bg-light">
              <div class="card-body">
                  <div class="blood">
                      <h2>AB- <i class="fas fa-tint"></i></h2>
                  </div><br><br>
                  <div>
                        <?= $bloodABn['quantity'] ?>
                  </div>                            
              </div>
            </div>
        </div>
    </div>
<hr>
<br>
<h3 class="text-center"style="color:#ff0018;">Update Blood Unit</h3><br>
    <form class="form-inline card-blood-form" method="POST">
        <div class="form-group mx-sm-3 mb-6"style="margin-left:60px!important;">

            <select name="bloodgroup" class="form-control">
                <option disabled="disabled" selected="selected">Choose Blood Group</option>
                <?php foreach($bloodgroups as $bloodgroup): ?>
                  <option value="<?= $bloodgroup ?>"><?= $bloodgroup ?></option>
                <?php endforeach; ?>
            </select>
          </div>
        <div class="form-group mx-sm-3 mb-6">

          <input type="number" class="form-control" name="quantity" placeholder="Unit">
        </div>
        <button type="submit" name="update" class="btn btn-outline-danger">update</button>
      </form>

</div>
</div>

<?php include("include/footer.php") ?>

