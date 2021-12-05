<?php
    $title = "Patient";
    include "include/init.php";
    include("include/header.php");
    include("include/nav.php");

    if(!isset($_SESSION['admin_ID']))
        Redirect("adminlogin.php");
    
    $stmt = $connect->prepare("SELECT * FROM patient");
    $stmt->execute();
    $patients = $stmt->fetchAll();
?>
<div class="wrapper ">
      <div class="main_content">
      <a href="#" class="button-event-form draw"><i class="fas fa-plus"></i>Add donor</a>
        <div class="container-bold-tble">
          <table class="table table-bold table-bordered" style="text-align:center;">
            <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Age</th>
                        <th scope="col">Disease</th>
                        <th scope="col">Mobile</th>
                        <th scope="col"colspan="2">Action</th>
                    </tr>
            </thead>
             <tbody>
             <?php if(!empty($patients)): foreach($patients as $patient): ?>
                    <tr>
                        <td><?= $patient['first_name'] . " " . $patient['last_name'] ?></td>
                        <td><img src="../img/<?= $patient['image'] ?>" width="80" height="80"></td>
                        <td><?= $patient['bloodgroup'] ?></td>
                        <td><?= $patient['age'] ?></td>                        
                        <td><?= $patient['disease'] ?></td>
                        <td><?= $patient['phone_number'] ?></td>
                        <td class="text-right">
                          <button class="btn btn-primary badge-pill" style="width: 100px;"><a style="text-decoration: none;color: white;" href="action_patient.php?action=edit&id=<?= $patient['id'] ?>">EDIT</a> </button>
                          <button class="btn btn-danger badge-pill" style="width: 80px;"><a style="text-decoration: none;color: white;" href="#">DELETE</a> </button>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                      <tr>
                        <td colspan="7">
                          There's no Patients  
                        </td>
                      </tr>
                    <?php endif; ?>
               </tbody>
          </table>
         </div>
       </div>
    </div>
<?php include("include/footer.php") ?>
