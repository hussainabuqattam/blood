<?php
  $title = "Dashboard";
  include "include/init.php";
  include("include/header.php");
  include("include/top-nav.php");
  if(!isset($_SESSION['patient_ID']))
    Redirect("patientlogin.php");

    $stmt = $connect->prepare("SELECT * FROM patient_blood_request WHERE status = ?");
    $stmt->execute(["pending"]);
    $pending = $stmt->rowCount();

    $stmt = $connect->prepare("SELECT * FROM patient_blood_request WHERE status = ?");
    $stmt->execute(["reject"]);
    $reject = $stmt->rowCount();

    $stmt = $connect->prepare("SELECT * FROM patient_blood_request WHERE status = ?");
    $stmt->execute(["approved"]);
    $approved = $stmt->rowCount();

    $stmt = $connect->prepare("SELECT * FROM patient_blood_request");
    $stmt->execute();
    $allRequest = $stmt->rowCount();

?>

<div class="wrapper ">
  <div class="main_content-card">
    <div class="row"style="margin-bottom: 282px;">
      <div class="col-sm-3">
        <div class="card card-bloods bg-light">
          <div class="card-body">
              <div class="blood">
                <i class="fas fa-sync-alt fa-blood-spinner"></i>
              </div><br>
              <div>
                Request Made <br>
                 <?= $allRequest ?>
              </div>                            
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card card-bloods bg-light">
            <div class="card-body">
                <div class="blood">
                  <i class="fas fa-sync fa-blood-users"></i>
                </div><br>
                <div>
                    Pending Request <br>
                     <?= $pending ?>
                </div>                            
            </div>
          </div>
      </div>

      <div class="col-sm-3">
          <div class="card card-bloods bg-light">
              <div class="card-body">
                  <div class="blood">
                    <i class="fas fa-check-circle check-circle"></i>
                  </div><br>
                  <div>
                       Approved Request<br>
                           <?= $approved ?>
                  </div>                            
              </div>
            </div>
      </div>
      <div class="col-sm-3">
          <div class="card card-bloods bg-light">
              <div class="card-body">
                  <div class="blood">
                    <i class="fas fa-times-circle total-card-fa"></i>
                  </div><br>
                  <div>
                       Rejected Request <br>
                          <?= $reject ?>
                  </div>                            
              </div>
            </div>
        </div>

    </div>


</div>
</div>

<?php include("include/footer.php") ?>
