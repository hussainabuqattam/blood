<?php 
    $title = "Patient";
    include "include/init.php"; 

    if(!isset($_SESSION['admin_ID'])){
        Redirect("adminlogin.php");
    }

    $action = (isset($_GET['action']) && !empty($_GET['action'])) ? $_GET['action'] : Redirect("admin_patient.php");

    if($action == "add") {

        if(isset($_POST['save'])) {
            $error = [];
            $username = $_POST['username'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $bloodgroup = $_POST['bloodgroup'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $age = $_POST['age'];
            $phone_number = $_POST['phone_number'];
            $doctor_name = $_POST['doctor_name'];
            $disease = $_POST['disease'];
            $image = "user.png";
    
    
            if(empty($username)) {
                $error['username'] = "Username can't be empty";
            }else if(strlen($username) < 4) {
                $error['username'] = "Username must contain at least 4 characters";
            }
    
            if(empty($age)){
                $error['age'] = "Age can't be empty";
            }elseif($age <= 0){
                $error['age'] = "Please, enter your age";
            }
    
            if(empty($disease)){
                $error['disease'] = "Disease can't be empty";
            }
    
            if(empty($doctor_name)) {
                $error['doctor_name'] = "Doctor Name can't be empty";
            }else if(strlen($doctor_name) < 3) {
                $error['doctor_name'] = "Doctor Name must contain at least 3 characters";
            }
        
            if(empty($first_name)) {
                $error['first_name'] = "First Name can't be empty";
            }else if(strlen($first_name) < 3) {
                $error['first_name'] = "First Name must contain at least 3 characters";
            }
    
            if(empty($bloodgroup) && $bloodgroup === 0) {
                $error['bloodgroup'] = "Please, select bloodgroup";
            }
        
            if(empty($last_name)) {
                $error['last_name'] = "Last Name can't be empty";
            }else if(strlen($last_name) < 3) {
                $error['last_name'] = "Last Name must contain at least 3 characters";
            }
        
            if(empty($password)){
                $error['password'] = "Password can't be empty";
            }
    
            if(empty($address)){
                $error['address'] = "Address can't be empty";
            }elseif(strlen($address) < 10){
                $error['address'] = "The address length Must Be At least 10 Letters";
            }
        
            if(empty($phone_number)){
                $error['phone_number'] = "Phone number can't be empty";
            }else if(!preg_match("/^07(7|8|9)[0-9]{7}$/", $phone_number)) {
                $error['phone_number'] = "The Phone Number is not valid It Must be Like this pattern : 07(7|8|9)1234567";
            }
    
    
            if(empty($error)){
                $stmt = $connect->prepare("INSERT INTO patient SET username = ?, password = ?, first_name = ?, last_name = ?, bloodgroup = ?, address = ?, phone_number = ?, doctor_name = ?, disease = ?, age = ?, image = ?");
                $result = $stmt ->execute([$username, $password, $first_name, $last_name, $bloodgroup, $address, $phone_number, $doctor_name, $disease, $age, $image]);
        
                if($result == true) {
                    $_SESSION['message_success'] = "Patient Added successfully";
                    Redirect("admin_patient.php");
                }
        
            }
        }
        include "include/header.php";
        include "include/nav.php";
        include "include/bloodgroup.php";
        ?>
        <div class="wrapper ">
            <div class="main_content">     
                <form method="POST">
                    <h1 style="margin-bottom:60px">Patient Signup</h1>
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
                        <input type="text" name="first_name" required/>
                        <label>First Name</label>
                        <?php if(isset($error['first_name'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['first_name'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="last_name" required/>
                        <label>Last Name</label>
                        <?php if(isset($error['last_name'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['last_name'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="username" required/>
                        <label>Username</label>
                        <?php if(isset($error['username'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['username'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="Password" name="password" required />
                        <label>Password</label>
                        <?php if(isset($error['password'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['password'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="age" required/>
                        <label>Age</label>
                        <?php if(isset($error['age'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['age'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="disease" required/>
                        <label>Disease</label>
                        <?php if(isset($error['disease'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['disease'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="doctor_name" required/>
                        <label>Doctor Name</label>
                        <?php if(isset($error['doctor_name'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['doctor_name'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="address" required/>
                        <label>Address</label>
                        <?php if(isset($error['address'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['address'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="phone_number" required/>
                        <label>Phone Number</label>
                        <?php if(isset($error['phone_number'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['phone_number'] ?></p>
                        <?php endif; ?>
                    </div>
                    <button type="submit" name="save">Save</button>
                </form>
            </div>
        </div>




        <?php
        include "include/footer.php";
    }elseif($action == "edit") {

        if(empty($_GET['id']) || !isset($_GET['id']))
            Redirect("admin_patient.php");

        $id = $_GET['id'];
        
        $stmt = $connect->prepare("SELECT * from patient WHERE id = ?");
        $stmt->execute(array($id));
        $patient = $stmt->fetch();

        if($patient == false)
            Redirect("admin_patient.php");


        if(isset($_POST['save'])) {
            $error = [];
            $username = $_POST['username'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $bloodgroup = $_POST['bloodgroup'];
            $password = empty($_POST['password']) ? $patient['password'] : $_POST['password'];
            $address = $_POST['address'];
            $age = $_POST['age'];
            $phone_number = $_POST['phone_number'];
            $doctor_name = $_POST['doctor_name'];
            $disease = $_POST['disease'];
            $image = "user.png";
    
    
            if(empty($username)) {
                $error['username'] = "Username can't be empty";
            }else if(strlen($username) < 4) {
                $error['username'] = "Username must contain at least 4 characters";
            }
    
            if(empty($age)){
                $error['age'] = "Age can't be empty";
            }elseif($age <= 0){
                $error['age'] = "Please, enter your age";
            }
    
            if(empty($disease)){
                $error['disease'] = "Disease can't be empty";
            }
    
            if(empty($doctor_name)) {
                $error['doctor_name'] = "Doctor Name can't be empty";
            }else if(strlen($doctor_name) < 3) {
                $error['doctor_name'] = "Doctor Name must contain at least 3 characters";
            }
        
            if(empty($first_name)) {
                $error['first_name'] = "First Name can't be empty";
            }else if(strlen($first_name) < 3) {
                $error['first_name'] = "First Name must contain at least 3 characters";
            }
    
            if(empty($bloodgroup) && $bloodgroup === 0) {
                $error['bloodgroup'] = "Please, select bloodgroup";
            }
        
            if(empty($last_name)) {
                $error['last_name'] = "Last Name can't be empty";
            }else if(strlen($last_name) < 3) {
                $error['last_name'] = "Last Name must contain at least 3 characters";
            }
        
            if(empty($password)){
                $error['password'] = "Password can't be empty";
            }
    
            if(empty($address)){
                $error['address'] = "Address can't be empty";
            }elseif(strlen($address) < 10){
                $error['address'] = "The address length Must Be At least 10 Letters";
            }
        
            if(empty($phone_number)){
                $error['phone_number'] = "Phone number can't be empty";
            }else if(!preg_match("/^07(7|8|9)[0-9]{7}$/", $phone_number)) {
                $error['phone_number'] = "The Phone Number is not valid It Must be Like this pattern : 07(7|8|9)1234567";
            }
    
    
            if(empty($error)){
                $stmt = $connect->prepare("UPDATE patient SET username = ?, password = ?, first_name = ?, last_name = ?, bloodgroup = ?, address = ?, phone_number = ?, doctor_name = ?, disease = ?, age = ?, image = ? WHERE id = ?");
                $result = $stmt ->execute([$username, $password, $first_name, $last_name, $bloodgroup, $address, $phone_number, $doctor_name, $disease, $age, $image, $id]);
        
                if($result == true) {
                    $_SESSION['message_success'] = "Patient Added successfully";
                    Redirect("admin_patient.php");
                }
        
            }
        }
        include "include/header.php";
        include "include/nav.php";
        include "include/bloodgroup.php";
        ?>
        <div class="wrapper ">
            <div class="main_content">     
                <form method="POST">
                    <h1 style="margin-bottom:60px">Patient Signup</h1>
                    <div class="question">
                        <select name="bloodgroup">
                            <option disabled="disabled" selected="selected">bloodgroup</option>
                            <?php foreach($bloodgroups as $bloodgroup): ?>
                                <option <?= $patient['bloodgroup'] == $bloodgroup ? "selected" : "" ?> value="<?= $bloodgroup ?>"><?= $bloodgroup ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if(isset($error['bloodgroup'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['bloodgroup'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="first_name" required value="<?= $patient['first_name'] ?>"/>
                        <label>First Name</label>
                        <?php if(isset($error['first_name'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['first_name'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="last_name" required value="<?= $patient['last_name'] ?>"/>
                        <label>Last Name</label>
                        <?php if(isset($error['last_name'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['last_name'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="username" required value="<?= $patient['username'] ?>"/>
                        <label>Username</label>
                        <?php if(isset($error['username'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['username'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="Password" name="password" />
                        <label>Password</label>
                        <?php if(isset($error['password'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['password'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="age" required value="<?= $patient['age'] ?>"/>
                        <label>Age</label>
                        <?php if(isset($error['age'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['age'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="disease" required value="<?= $patient['disease'] ?>"/>
                        <label>Disease</label>
                        <?php if(isset($error['disease'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['disease'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="doctor_name" required value="<?= $patient['doctor_name'] ?>"/>
                        <label>Doctor Name</label>
                        <?php if(isset($error['doctor_name'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['doctor_name'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="address" required value="<?= $patient['address'] ?>"/>
                        <label>Address</label>
                        <?php if(isset($error['address'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['address'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="phone_number" required value="<?= $patient['phone_number'] ?>"/>
                        <label>Phone Number</label>
                        <?php if(isset($error['phone_number'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['phone_number'] ?></p>
                        <?php endif; ?>
                    </div>
                    <button type="submit" name="save">Save</button>
                </form>
            </div>
        </div>



        <?php
        include "include/footer.php";
    }elseif($action == "delete"){
        if(empty($_GET['id']) || !isset($_GET['id']))
            Redirect("admin_patient.php");

        $id = $_GET['id'];
        
        $stmt = $connect->prepare("SELECT * from patient WHERE id = ?");
        $stmt->execute(array($id));
        $getPatient = $stmt->fetch();

        if($getPatient == false)
            Redirect("admin_patient.php");

        $stmt = $connect->prepare("DELETE FROM patient WHERE id = ? LIMIT 1");
        $result = $stmt->execute(array($id));

        if($result == true) {
            $_SESSION['message'] = "Patient deleted successfully";
            Redirect("admin_patient.php");
        }
    }else{
        Redirect("admin_patient.php");
    }
    

?>