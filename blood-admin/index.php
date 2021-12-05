<?php
    $title = "Dashboard";
    include "include/init.php";
    include("include/header.php");
    include("include/nav.php");

    if(!isset($_SESSION['admin_ID']))
        Redirect("adminlogin.php");
    
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


    $stmt = $connect->prepare("SELECT * FROM donor");
    $stmt->execute();
    $donors = $stmt->rowCount();

    $stmt = $connect->prepare("SELECT * FROM patient_blood_request");
    $stmt->execute();
    $request = $stmt->rowCount();

    $stmt = $connect->prepare("SELECT * FROM patient_blood_request WHERE status = ?");
    $stmt->execute(["approved"]);
    $requestApproved = $stmt->rowCount();

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
<div class="total-card-blood">
    <div class="row">
      <div class="col-sm-3">
        <div class="card bg-light">
          <div class="card-body">
              <div class="blood">
                  <i class="fas fa-users"></i>
              </div><br>
              <div>
                  Total Donors <br>
                    <?= $donors ?>
              </div>                            
          </div>
        </div>
      </div>
      <div class="col-sm-3">
          <div class="card bg-light">
              <div class="card-body">
                  <div class="blood">
                      <i class="fas fa-spinner"></i>
                  </div><br>
                  <div>
                      Total Requests <br>
                        <?= $request ?>          
                </div>                            
              </div>
            </div>
      </div>
      <div class="col-sm-3">
          <div class="card bg-light">
              <div class="card-body">
                  <div class="blood">
                      <i class="far fa-check-circle"></i>
                  </div><br>
                  <div>
                      Approved Requests <br>
                        <?= $requestApproved ?>             
                </div>                            
              </div>
            </div>
        </div>
        <div class="col-sm-3">
          <div class="card bg-light">
              <div class="card-body">
                  <div class="blood">
                      <i class="fas fa-tint total-card-fa"></i>
                  </div><br>
                  <div>
                      Total Blood Unit (in ml) <br>
                        <?= $bloodAB['quantity'] + $bloodAn['quantity'] + $bloodBB['quantity'] + $bloodBn['quantity'] + $bloodABB['quantity'] + $bloodABn['quantity'] + $bloodOB['quantity'] + $bloodOn['quantity'] ?>
                 </div>                            
              </div>
            </div>
        </div>
    
     </div>
   </div>

  </div>
</div>



<?php include("include/footer.php") ?>
