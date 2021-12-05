<?php
    $title = "Make Request";
  include "include/init.php";
  include("include/header.php");
  include("include/top-nav.php");
  include "include/bloodgroup.php";
  if(!isset($_SESSION['patient_ID']))
    Redirect("patientlogin.php");

    if(isset($_POST['request'])) {
        $error = [];
        $bloodgroup = $_POST['bloodgroup'];
        $patient_name = $_POST['patient_name'];
        $patient_age = $_POST['patient_age'];
        $reason = $_POST['reason'];
        $unit = $_POST['unit'];
        $date = date("Y-m-d");

        if(empty($patient_name)) {
            $error['patient_name'] = "Patient name can't be empty";
        }else if(strlen($patient_name) < 4) {
            $error['patient_name'] = "Patient name must contain at least 4 characters";
        }

        if(empty($patient_age)){
            $error['patient_age'] = "Patient age can't be empty";
        }elseif($patient_age <= 0){
            $error['patient_age'] = "Please, enter patient age";
        }

        if(empty($reason)) {
            $error['reason'] = "Reason can't be empty";
        }

        if(empty($bloodgroup) && $bloodgroup === 0) {
            $error['bloodgroup'] = "Please, select bloodgroup";
        }

        if(empty($unit)){
            $error['unit'] = "Uint can't be empty";
        }elseif($unit <= 0){
            $error['unit'] = "Uint must not be less than 1";
        }

        if(empty($error)){
			$stmt = $connect->prepare("INSERT INTO patient_blood_request SET bloodgroup = ?, unit = ?, reason = ?, patient_name = ?, patient_age = ?, date = ?, patient_id  = ?");
			$result = $stmt ->execute([$bloodgroup, $unit, $reason, $patient_name, $patient_age, $date, $_SESSION['patient_ID']]);
	
			if($result == true) {
				$_SESSION['message'] = "Blood Request Added successfully";
				Redirect("my_request.php");
			}
	
		}

    }

?>


<div class="wrapper ">
        <div class="main_content">
         <form method="POST">
                <h1>MAKE BLOOD REQUEST</h1>
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
                    <input type="text" name="patient_name" required/>
                    <label>Patient Name</label>
                    <?php if(isset($error['patient_name'])): ?>
                        <p style="color: red;font-size:12px;"><?= $error['patient_name'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="question">
                    <input type="text" name="patient_age" required/>
                    <label>Patient Age</label>
                    <?php if(isset($error['patient_age'])): ?>
                        <p style="color: red;font-size:12px;"><?= $error['patient_age'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="question">
                    <input type="text" name="reason" required/>
                    <label>Reason</label>
                    <?php if(isset($error['reason'])): ?>
                        <p style="color: red;font-size:12px;"><?= $error['reason'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="question">
                    <input type="text" name="unit" required/>
                    <label>Unit (in ml)</label>
                    <?php if(isset($error['unit'])): ?>
                        <p style="color: red;font-size:12px;"><?= $error['unit'] ?></p>
                    <?php endif; ?>
                </div>
                <button type="submit" name="request">REQUEST</button>
        </form>
        </div>
    </div>
<?php include("include/footer.php") ?>

