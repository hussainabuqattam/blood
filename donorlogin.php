<?php
    $title = "Login Donor";
    $login = true;
    $footer = true;
    include "include/init.php";
    include("include/header.php");
    include("include/top-nav.php");

    if(isset($_SESSION['donor_ID']))
        Redirect("donor_dashboard.php");

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $connect->prepare("SELECT * FROM donor WHERE username = ? AND password = ?");
        $stmt->execute(array($username, $password));

        $getUser = $stmt->fetch();

        $count = $stmt->rowCount();

        if ($count > 0) {
            $_SESSION['donor_username'] = $username;
            $_SESSION['donor_ID'] = $getUser['id'];
            Redirect("donor_dashboard.php");
            exit();
        }else {
            $_SESSION['message'] = "Username or Password are incorrect";
        }
    }


?>


<form class="login-form" method="POST">
                <h1 style="margin-bottom:60px">Donor Login</h1>
                <?php if(isset($_SESSION['message'])): ?>
                    <p style="text-align:center;font-size: 12px;"><?= $_SESSION['message'] ?></p>
                <?php unset($_SESSION['message']); endif; ?>
                <div class="question">
                    <input type="text" name="username" required/>
                    <label>Username</label>
                </div>
                <div class="question">
                    <input type="password" name="password" required/>
                    <label >Password</label>
                </div>
                <button type="submit" name="login">Login</button>
                <p style="text-align: center;margin-top:50px;">Does not have an account ? <a style="text-decoration: none;" href="donorsignup.php">Click here to register</a></p>

        </form>
<?php include("include/footer.php") ?>
