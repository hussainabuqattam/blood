<?php
    $title = "Request History";
    include("include/init.php");
    include "include/header.php";
    include "include/nav.php"; 


    $stmt = $connect->prepare("SELECT * FROM patient_blood_request WHERE status = ? OR status = ?");
    $stmt->execute(["reject", "approved"]);
    $patient_blood_request = $stmt->fetchAll();
?>

<div class="wrapper ">
      <div class="main_content">
      <h1 style="margin-top:35px;text-align:center;font-family:auto;">Blood Request History</h1>
        <div class="container-bold-tble">
          <table class="table table-bold table-bordered" style="text-align:center;">
        <thead>
            <tr>
                <th scope="col">Patient Name</th>
                <th scope="col">Age</th>
                <th scope="col">Reason</th>
                <th scope="col">Blood Group</th>
                <th scope="col">Unit (in ml)</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Stock Status</th>
               
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($patient_blood_request)): foreach($patient_blood_request as $patient_blood): ?>
            <tr>
                <td><?= $patient_blood['patient_name'] ?></td>
                <td><?= $patient_blood['patient_age'] ?></td>
                <td><?= $patient_blood['reason'] ?></td>
                <td><?= $patient_blood['bloodgroup'] ?></td>
                <td><?= $patient_blood['unit'] ?></td>
                <td><?= date("F. d,Y", strtotime($patient_blood['date']))  ?></td>
                <?php if($patient_blood['status'] == "approved"): ?>
                    <td><span class="label warning"><?= $patient_blood['status'] ?></span></td>
                    <td><span class="label warning"><?= $patient_blood['unit'] ?> Unit Deducted From Stock</span></td>
                <?php else: ?>
                    <td><span class="label success">Rejected</span></td>
                    <td><span class="label success"> Unit Deducted From Stock</span></td>
                <?php endif; ?>
            </tr>
            <?php endforeach; else: ?>
                <tr>
                    <td colspan="8">
                        There's No Blood Request
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    
    </table>
</div>

<!--
developed By : sumit kumar
facebook : fb.com/sumit.luv
youtube : youtube.com/lazycoders
-->
<?php include("../include/footer.php") ?>
