<?php
    $title = "Donor";
    include "include/init.php"; 

    if(!isset($_SESSION['admin_ID'])){
        Redirect("adminlogin.php");
    }

    $action = (isset($_GET['action']) && !empty($_GET['action'])) ? $_GET['action'] : Redirect("admin_donor.php");

    if($action == "add") {

        if(isset($_POST['save'])) {
            $error = [];
            $username = $_POST['username'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $bloodgroup = $_POST['bloodgroup'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $phone_number = $_POST['phone_number'];
            $image = "user.png";
    
    
            if(empty($username)) {
                $error['username'] = "Username can't be empty";
            }else if(strlen($username) < 4) {
                $error['username'] = "Username must contain at least 4 characters";
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
                $stmt = $connect->prepare("INSERT INTO donor SET username = ?, password = ?, first_name = ?, last_name = ?, bloodgroup = ?, address = ?, phone_number = ?, image = ?");
                $result = $stmt ->execute([$username, $password, $first_name, $last_name, $bloodgroup, $address, $phone_number, $image]);
        
                if($result == true) {
                    $_SESSION['message'] = "Donor Updated successfully";
                    Redirect("admin_donor.php");
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
                    <h1 style="margin-bottom:60px">Edit Donor</h1>
                    <div class="question">
                        <select name="bloodgroup">
                            <option disabled="disabled" selected="selected">bloodgroup</option>
                            <?php foreach($bloodgroups as $bloodgroup): ?>
                                <option <?= $donor['bloodgroup'] == $bloodgroup ? 'selected' : "" ?> value="<?= $bloodgroup ?>"><?= $bloodgroup ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="question">
                        <input type="text" name="first_name" required >
                        <label>First Name</label>
                        <?php if(isset($error['first_name'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['first_name'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="last_name" required />
                        <label>Last Name</label>
                        <?php if(isset($error['last_name'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['last_name'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="username" required />
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
                        <input type="text" name="address" required />
                        <label>Address</label>
                        <?php if(isset($error['address'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['address'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="phone_number" required />
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
            Redirect("admin_donor.php");

        $id = $_GET['id'];
        
        $stmt = $connect->prepare("SELECT * from donor WHERE id = ?");
        $stmt->execute(array($id));
        $donor = $stmt->fetch();

        if($donor == false)
            Redirect("admin_donor.php");


        if(isset($_POST['save'])) {
            $error = [];
            $username = $_POST['username'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $bloodgroup = $_POST['bloodgroup'];
            $password = empty($_POST['password']) ? $donor['password'] : "";
            $address = $_POST['address'];
            $phone_number = $_POST['phone_number'];
            $image = "user.png";
    
    
            if(empty($username)) {
                $error['username'] = "Username can't be empty";
            }else if(strlen($username) < 4) {
                $error['username'] = "Username must contain at least 4 characters";
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
                $stmt = $connect->prepare("UPDATE donor SET username = ?, password = ?, first_name = ?, last_name = ?, bloodgroup = ?, address = ?, phone_number = ?, image = ? WHERE id = ?");
                $result = $stmt ->execute([$username, $password, $first_name, $last_name, $bloodgroup, $address, $phone_number, $image, $id]);
        
                if($result == true) {
                    $_SESSION['message'] = "Donor Updated successfully";
                    Redirect("admin_donor.php");
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
                    <h1 style="margin-bottom:60px">Edit Donor</h1>
                    <div class="question">
                        <select name="bloodgroup">
                            <option disabled="disabled" selected="selected">bloodgroup</option>
                            <?php foreach($bloodgroups as $bloodgroup): ?>
                                <option <?= $donor['bloodgroup'] == $bloodgroup ? 'selected' : "" ?> value="<?= $bloodgroup ?>"><?= $bloodgroup ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if(isset($error['bloodgroup'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['bloodgroup'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="first_name" required value="<?= $donor['first_name'] ?>">
                        <label>First Name</label>
                        <?php if(isset($error['first_name'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['first_name'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="last_name" required value="<?= $donor['last_name'] ?>" />
                        <label>Last Name</label>
                        <?php if(isset($error['last_name'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['last_name'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="username" required value="<?= $donor['username'] ?>" />
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
                        <input type="text" name="address" required value="<?= $donor['address'] ?>" />
                        <label>Address</label>
                        <?php if(isset($error['address'])): ?>
                            <p style="color: red;font-size:12px;"><?= $error['address'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="question">
                        <input type="text" name="phone_number" required value="<?= $donor['phone_number'] ?>" />
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
            Redirect("admin_donor.php");

        $id = $_GET['id'];
        
        $stmt = $connect->prepare("SELECT * from donor WHERE id = ?");
        $stmt->execute(array($id));
        $getDonor = $stmt->fetch();

        if($getDonor == false)
            Redirect("admin_donor.php");

        $stmt = $connect->prepare("DELETE FROM donor WHERE id = ? LIMIT 1");
        $result = $stmt->execute(array($id));

        if($result == true) {
            $_SESSION['message'] = "Dononr deleted successfully";
            Redirect("admin_donor.php");
        }
    }else{
        Redirect("admin_donor.php");
    }
    

?>