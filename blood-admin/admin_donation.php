<?php
    $title = "Donations";
    include "include/init.php";
    include("include/header.php");
    include("include/nav.php");

    if(!isset($_SESSION['admin_ID']))
        Redirect("adminlogin.php");
    
    $stmt = $connect->prepare("SELECT donate_blood.*, donor.username as nameDonor FROM donate_blood INNER JOIN donor ON donor.id = donate_blood.donor_id");
    $stmt->execute();
    $donate_bloods = $stmt->fetchAll();
?>
<div class="wrapper ">
    <div class="main_content">
    <h1 style="margin-top:35px;text-align:center;font-family:auto;">Donation</h1>
        <div class="container-bold-tble">
            <table class="table table-bold table-bordered">
                <thead >
                    <tr>
                        <th scope="col">Donor Name</th>
                        <th scope="col">Disease</th>
                        <th scope="col">Age</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">Status</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($donate_bloods)): foreach($donate_bloods as $donate_blood): ?>
                    <tr>
                        <td><?= $donate_blood['nameDonor'] ?></td>
                        <td><?= $donate_blood['disease'] ?></td>
                        <td><?= $donate_blood['age'] ?></td>
                        <td><?= $donate_blood['bloodgroup'] ?></td>
                        <td><?= $donate_blood['unit'] ?></td>
                        <td><?= date("F. d,Y", strtotime($donate_blood['date'])) ?></td>
                        <td><?= $donate_blood['status'] ?></td>
                        <?php if($donate_blood['status'] == "pending"): ?>
                            <td class="text-right">
                                <button class="btn btn-primary badge-pill" style="width: 100px;"><a  style="text-decoration: none;color: white;" href="action_donation.php?action=approve&id=<?= $donate_blood['id'] ?>">APPROVE</a> </button>
                                <button class="btn btn-danger badge-pill" style="width: 80px;"><a  style="text-decoration: none;color: white;" href="action_donation.php?action=reject&id=<?= $donate_blood['id'] ?>">REJECT</a> </button>
                            </td>
                        <?php elseif($donate_blood['status'] == "approved"): ?>
                            <td><span class="label warning"><?= $donate_blood['unit'] ?> Unit Added To Stock</span></td>
                        <?php elseif($donate_blood['status'] == "reject"): ?>
                            <td><span class="label danger">0 Unit Added To Stock</span></td> 
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; else: ?>
                        <tr>
                            <td colspan="8">
                                there's No Donate blood 
                            </td>
                        </tr>
                    <?php endif; ?>

                </tbody>
            
            </table>
        </div>
    </div>
</div>
<!--
developed By : sumit kumar
facebook : fb.com/sumit.luv
youtube : youtube.com/lazycoders
-->

<?php include("include/footer.php") ?>
