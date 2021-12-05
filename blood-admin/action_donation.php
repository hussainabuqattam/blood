<?php
    $title = "Donations";
    include "include/init.php"; 

    if(!isset($_SESSION['admin_ID'])){
        Redirect("adminlogin.php");
    }

    $action = (isset($_GET['action']) && !empty($_GET['action'])) ? $_GET['action'] : Redirect("admin_donation.php");

    if($action == "approve") {
        if(empty($_GET['id']) || !isset($_GET['id']))
            Redirect("admin_donation.php");

        $id = $_GET['id'];
        
        $stmt = $connect->prepare("SELECT * from donate_blood WHERE id = ?");
        $stmt->execute(array($id));
        $donation = $stmt->fetch();

        if($donation == false)
            Redirect("admin_donation.php");

        $stmt = $connect->prepare("SELECT * from blood_stock WHERE bloodgroup = ?");
        $stmt->execute([$donation['bloodgroup']]);
        $blood_stock = $stmt->fetch();

        $stmt = $connect->prepare("UPDATE blood_stock SET quantity = ? WHERE bloodgroup = ? LIMIT 1");
        $result = $stmt->execute([$donation['unit'] + $blood_stock['quantity'], $donation['bloodgroup']]);

        if($result == true) {
            $stmt = $connect->prepare("UPDATE donate_blood SET status = ? WHERE id = ? LIMIT 1");
            $result = $stmt->execute(["approved", $id]);
            if($result == true) {
                $_SESSION['message'] = "Donate blood udated successfully";
                Redirect("admin_donation.php");
            }
        }
    }elseif($action == "reject"){
        if(empty($_GET['id']) || !isset($_GET['id']))
            Redirect("admin_donation.php");

        $id = $_GET['id'];
        
        $stmt = $connect->prepare("SELECT * from donate_blood WHERE id = ?");
        $stmt->execute(array($id));
        $getUsers = $stmt->fetch();

        if($getUsers == false)
            Redirect("admin_donation.php");

        $stmt = $connect->prepare("UPDATE donate_blood SET status = ? WHERE id = ? LIMIT 1");
        $result = $stmt->execute(["reject", $id]);

        if($result == true) {
            $_SESSION['message'] = "Dononr deleted successfully";
            Redirect("admin_donation.php");
        }
    }else{
        Redirect("admin_donation.php");
    }
    

?>