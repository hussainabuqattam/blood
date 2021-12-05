<?php
    $title = "Blood Requets";
    include "include/init.php"; 

    if(!isset($_SESSION['admin_ID'])){
        Redirect("adminlogin.php");
    }

    $action = (isset($_GET['action']) && !empty($_GET['action'])) ? $_GET['action'] : Redirect("admin_request.php");

    if($action == "approve") {
        if(empty($_GET['id']) || !isset($_GET['id']))
            Redirect("admin_request.php");

        $id = $_GET['id'];
        
        $stmt = $connect->prepare("SELECT * from patient_blood_request WHERE id = ?");
        $stmt->execute(array($id));
        $donation = $stmt->fetch();

        if($donation == false)
            Redirect("admin_request.php");

        $stmt = $connect->prepare("SELECT * from blood_stock WHERE bloodgroup = ?");
        $stmt->execute([$donation['bloodgroup']]);
        $blood_stock = $stmt->fetch();

        if($blood_stock['quantity'] < $donation['unit']){
            $_SESSION['message'] = "Stock Doest Not Enough Blood To Approve This Request, Only " . $blood_stock['quantity'] . " Unit Available";
            Redirect("admin_request.php");
        }

        $stmt = $connect->prepare("UPDATE blood_stock SET quantity = ? WHERE bloodgroup = ? LIMIT 1");
        $result = $stmt->execute([$blood_stock['quantity'] - $donation['unit'], $donation['bloodgroup']]);

        if($result == true) {
            $stmt = $connect->prepare("UPDATE patient_blood_request SET status = ? WHERE id = ? LIMIT 1");
            $result = $stmt->execute(["approved", $id]);
            if($result == true) {
                $_SESSION['message'] = "Blood Request Approved successfully";
                Redirect("admin_request_history.php");
            }
        }
    }elseif($action == "reject"){
        if(empty($_GET['id']) || !isset($_GET['id']))
            Redirect("admin_request.php");

        $id = $_GET['id'];
        
        $stmt = $connect->prepare("SELECT * from patient_blood_request WHERE id = ?");
        $stmt->execute(array($id));
        $getUsers = $stmt->fetch();

        if($getUsers == false)
            Redirect("admin_request.php");

        $stmt = $connect->prepare("UPDATE patient_blood_request SET status = ? WHERE id = ? LIMIT 1");
        $result = $stmt->execute(["reject", $id]);

        if($result == true) {
            $_SESSION['message'] = "Blood Request Reject successfully";
            Redirect("admin_request_history.php");
        }
    }else{
        Redirect("admin_request.php");
    }
    

?>