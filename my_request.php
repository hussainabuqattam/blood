<?php
  $title = "Request History";
  include "include/init.php";
  include("include/header.php");
  include("include/top-nav.php");
  if(!isset($_SESSION['patient_ID']))
    Redirect("patientlogin.php");

  $stmt = $connect->prepare("SELECT * FROM patient_blood_request WHERE patient_id = ?");
  $stmt->execute([$_SESSION['patient_ID']]);
  $patient_bloods = $stmt->fetchAll();
?>


    <div class="wrapper ">
      <div class="main_content">
      <h1 style="margin-top:50px;text-align:center;font-family:auto;">Request history</h1>
        <div class="container-bold-tble">
          <table class="table table-bold table-bordered" style="text-align:center;">
            <thead>
                    <tr>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Patient Age</th>
                        <th scope="col">Reason</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Date</th>
                        <th scope="col"colspan="3">Status</th>
                    </tr>
            </thead>
             <tbody>
                    <?php if(!empty($patient_bloods)): foreach($patient_bloods as $patient_blood): ?>
                      <tr>
                          <td><?= $patient_blood['patient_name'] ?></td>
                          <td><?= $patient_blood['patient_age'] ?></td>
                          <td><?= $patient_blood['reason'] ?></td>
                          <td><?= $patient_blood['bloodgroup'] ?></td>
                          <td><?= $patient_blood['unit'] ?></td>
                          <td><?= date("F. d,Y", strtotime($patient_blood['date'])) ?> </td>
                          <?php if($patient_blood['status'] == "pending"): ?>
                            <td><span style="color: #fff;background:#007bff; padding:5px"><?=$patient_blood['status']?></span></td>
                          <?php elseif($patient_blood['status'] == "approved"): ?>
                            <td><span style="color:#fff;background: #28a745;padding: 5px;"><?= $patient_blood['status'] ?></span></td>
                          <?php elseif($patient_blood['status'] == "reject"): ?>
                            <td><span style="color:#fff;background: #dc3545;padding: 5px;"><?= $patient_blood['status'] ?></span></td>
                          <?php endif; ?>
                      </tr>
                    <?php endforeach; else: ?>
                      <tr>
                        <td colspan="7">
                          No Blood requests
                        </td>
                      </tr>
                    <?php endif; ?>
               </tbody>
          </table>
         </div>
       </div>
    </div>
    <?php include("include/footer.php") ?>
