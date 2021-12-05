<?php
    $title = "Donate Blood";
  include "include/init.php";
  include("include/header.php");
  include("include/top-nav.php");
  include "include/bloodgroup.php";
  if(!isset($_SESSION['donor_ID']))
    Redirect("donorlogin.php");


    if(isset($_POST['donate'])) {
        $error = [];
        $bloodgroup = $_POST['bloodgroup'];
        $age = $_POST['age'];
        $unit = $_POST['unit'];
        $disease = $_POST['disease'];
        $date = date("Y-m-d");

        if(empty($age)){
            $error['age'] = "Age can't be empty";
        }elseif($age < 18){
            $error['age'] = "Age must not be less than 18 years";
        }

        if(empty($unit)){
            $error['unit'] = "Uint can't be empty";
        }elseif($unit <= 0){
            $error['unit'] = "Uint must not be less than 1";
        }

        if(empty($disease)){
            $error['disease'] = "Disease can't be empty";
        }

        if(empty($bloodgroup) && $bloodgroup === 0) {
            $error['bloodgroup'] = "Please, select bloodgroup";
        }

        if(empty($error)){
			$stmt = $connect->prepare("INSERT INTO donate_blood SET bloodgroup = ?, unit = ?, disease = ?, age = ?, date = ?, donor_id = ?");
			$result = $stmt ->execute([$bloodgroup, $unit, $disease, $age, $date, $_SESSION['donor_ID']]);
	
			if($result == true) {
				$_SESSION['message'] = "Donate blood Added successfully";
				Redirect("donation_history.php");
			}
	
		}
    }


?>


    <div class="wrapper ">
        <div class="main_content">     
         <form method="POST">
                <h1>DONATE BLOOD</h1>
                <div class="question">
                    <select name="bloodgroup">
                        <option disabled="disabled" selected="selected">bloodgroup</option>
                        <?php foreach($bloodgroups as $bloodgroup): ?>
                            <option value="<?= $bloodgroup ?>"><?= $bloodgroup ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if(isset($error['bloodgroup'])): ?>
                        <p style="color: red;font-size:12px;"><?= $error['bloodgroup'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="question">
                    <input type="text" name="unit" required/>
                    <label>Unit (in ml)</label>
                    <?php if(isset($error['unit'])): ?>
                        <p style="color: red;font-size:12px;"><?= $error['unit'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="question">
                    <input type="text" name="disease" required/>
                    <label>Disease (if any)</label>
                    <?php if(isset($error['disease'])): ?>
                        <p style="color: red;font-size:12px;"><?= $error['disease'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="question">
                    <input type="text" name="age" required/>
                    <label>Age</label>
                    <?php if(isset($error['age'])): ?>
                        <p style="color: red;font-size:12px;"><?= $error['age'] ?></p>
                    <?php endif; ?>
                </div>
                <button type="submit" name="donate">DONATE</button>
        </form>
        </div>
    </div>
<?php include("include/footer.php") ?>
