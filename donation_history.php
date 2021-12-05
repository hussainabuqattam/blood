<?php
  $title = "Donation History";
  include "include/init.php";
  include("include/header.php");
  include("include/top-nav.php");
  
  if(!isset($_SESSION['donor_ID']))
    Redirect("donorlogin.php");

    $stmt = $connect->prepare("SELECT * FROM donate_blood WHERE donor_id = ?");
    $stmt->execute([$_SESSION['donor_ID']]);
    $donate_bloods = $stmt->fetchAll();


?>

    <div class="wrapper ">
      <div class="main_content">
      <h1 style="margin-top:50px;text-align:center;font-family:auto;">Donation history</h1>
        <div class="container-bold-tble">
          <table class="table table-bold table-bordered" style="text-align:center;">
            <thead>
                    <tr>
                        <th scope="col">Donor Age</th>
                        <th scope="col">Disease (if any)</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Date</th>
                        <th scope="col"colspan="3">Status</th>
                    </tr>
            </thead>
             <tbody>
                    <?php if(!empty($donate_bloods)): foreach($donate_bloods as $donate_blood): ?>
                    <tr>
                        <td><?= $donate_blood['age'] ?></td>
                        <td><?= $donate_blood['disease'] ?></td>
                        <td><?= $donate_blood['bloodgroup'] ?></td>
                        <td><?= $donate_blood['unit'] ?></td>
                        <td><?= date("F. d,Y", strtotime($donate_blood['date'])) ?></td>
                        <?php if($donate_blood['status'] == "pending"): ?>
                          <td><span style="color: #fff;background:#007bff; padding:5px"><?=$donate_blood['status']?></span></td>
                        <?php elseif($donate_blood['status'] == "approved"): ?>
                          <td><span style="color:#fff;background: #28a745;padding: 5px;"><?= $donate_blood['status'] ?></span></td>
                        <?php elseif($donate_blood['status'] == "reject"): ?>
                          <td><span style="color:#fff;background: #dc3545;padding: 5px;"><?= $donate_blood['status'] ?></span></td>
                        <?php endif; ?>
                   </tr>
                    <?php endforeach; else: ?>
                      <tr>
                        <td colspan="6">
                          No Donate Blood
                        </td>
                      </tr>
                    <?php endif; ?>
               </tbody>
          </table>
         </div>
       </div>
    </div>
    <?php include("include/footer.php") ?>
