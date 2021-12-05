<?php
    $title = "Login";
    $login = true;
    $footer = true;
    include "include/init.php";
    include("include/header.php");
    include("include/nav.php");

    if(isset($_SESSION['admin_ID']))
        Redirect("index.php");

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $connect->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
        $stmt->execute(array($username, $password));

        $getUser = $stmt->fetch();

        $count = $stmt->rowCount();

        if ($count > 0) {
            $_SESSION['admin_username'] = $username;
            $_SESSION['admin_ID'] = $getUser['id'];
            Redirect("index.php");
            exit();
        }else {
            $_SESSION['message'] = "Username or Password are incorrect";
        }
    }


?>

<form class="login-form" method="post">
                <h1 style="margin-bottom:60px">Admin Login</h1>
                <?php if(isset($_SESSION['message'])): ?>
                    <p style="text-align:center;font-size: 12px;"><?= $_SESSION['message'] ?></p>
                <?php unset($_SESSION['message']); endif; ?>
                <div class="question">
                    <input type="text" name="username" required/>
                    <label>Username</label>
                </div>
                <div class="question">
                    <input type="password" name="password" required/>
                    <label>Password</label>
                </div>
                <button type="submit" name="login">Login</button>

        </form>
<?php include("include/footer.php") ?>
