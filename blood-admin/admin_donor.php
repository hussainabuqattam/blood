<?php
    $title = "Donor";
    include "include/init.php";
    include("include/header.php");
    include("include/nav.php");

    if(!isset($_SESSION['admin_ID']))
        Redirect("adminlogin.php");
    
    $stmt = $connect->prepare("SELECT * FROM donor");
    $stmt->execute();
    $donors = $stmt->fetchAll();
?>

<div class="wrapper ">
      <div class="main_content">
      <a href="#" class="button-event-form draw"><i class="fas fa-plus"></i>Add patient</a>
        <div class="container-bold-tble">
          <table class="table table-bold table-bordered" style="text-align:center;">
            <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Address</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Action</th>
                    </tr>
            </thead>
            <tbody>
                  <?php if(!empty($donors)): foreach($donors as $donor): ?>
                    <tr>
                        <td><?= $donor['first_name'] . " " . $donor['last_name'] ?></td>
                        <td><img src="../img/<?= $donor['image'] ?>" width="80" height="80"></td>
                        <td><?= $donor['bloodgroup'] ?></td>
                        <td><?= $donor['address'] ?></td>                        
                        <td><?= $donor['phone_number'] ?></td>
                        <td class="text-right">
                          <button class="btn btn-primary badge-pill" style="width: 100px;"><a style="text-decoration: none;color: white;" href="action_donor.php?action=edit&id=<?= $donor['id'] ?>">EDIT</a> </button>
                          <button class="btn btn-danger badge-pill" style="width: 80px;"><a style="text-decoration: none;color: white;" href="action_donor.php?action=delete&id=<?= $donor['id'] ?>">DELETE</a> </button>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                      <tr>
                        <td colspan="6">
                          There's no Donors  
                        </td>
                      </tr>
                    <?php endif; ?>
              </tbody>
          </table>
         </div>
       </div>
    </div>
<?php include("include/footer.php") ?>
