<?php
    $title = "Blood Requets";
    include "include/init.php";
    include("include/header.php");
    include("include/nav.php");

    if(!isset($_SESSION['admin_ID']))
        Redirect("adminlogin.php");


    $stmt = $connect->prepare("SELECT * FROM patient_blood_request WHERE status = ?");
    $stmt->execute(["pending"]);
    $patient_blood_request = $stmt->fetchAll();
?>

<div class="wrapper ">
      <div class="main_content">
      <h1 style="margin-top:35px;text-align:center;font-family:auto;">Blood Request</h1>
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
                        <th scope="col">Action</th>
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
                        <td><?= $patient_blood['status'] ?></td>
                        <td>
                            <button class="btn btn-primary badge-pill" style="width: 100px;"><a  style="text-decoration: none;color: white;" href="action_blood_request.php?action=approve&id=<?= $patient_blood['id'] ?>">APPROVE</a> </button>
                            <button class="btn btn-danger badge-pill" style="width: 80px;"><a  style="text-decoration: none;color: white;" href="action_blood_request.php?action=reject&id=<?= $patient_blood['id'] ?>">REJECT</a> </button>
                        </td>
                    </tr>
              <?php endforeach; else: ?>
                  <tr>
                    <td colspan="8">
                      There's no Blood Request
                    </td>
                  </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
<?php include("include/footer.php") ?>

