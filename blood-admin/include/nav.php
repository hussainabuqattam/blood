
  <div class="bs-example">
    <nav style="background-color: #FF0018;" class="navbar navbar-expand-md navbar-dark fixed-top">
      <a href="/" class="navbar-brand"><i class="fas fa-heartbeat"></i>&nbsp; Blood Bank</a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">


        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
            <?php if(isset($footer)): ?>
                  <li class="nav-item">
                      <a class="nav-link" style="color: white;" href="/blood"><i class="fas fa-home"></i>&nbsp; Home</i></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" style="color: white;" href="/blood/patientlogin.php"><i class="fas fa-procedures"></i>&nbsp; Patient</i></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" style="color: white;" href="/blood/donorlogin.php"><i class="fas fa-user"></i>&nbsp; Donor</i></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" style="color: white;" href="/blood-admin/adminlogin.php"><i class="fas fa-user-shield"></i>&nbsp; Admin</i></a>
                  </li>
                <?php else: ?>
                  <li class="nav-item">
                      <a class="nav-link" style="color: white;" href="logout.php"> Logout &nbsp;<i class="fas fa-sign-out-alt"></i></a>
                  </li>
                <?php endif; ?>
            </ul>
        </div>
      </div>
    </nav>
  </div>

  
<div class="wrapper" style="<?= isset($login) && $login == true ? "display:none;" : "" ?>">
    <div class="sidebar">
        
        <ul>
            <li class="<?= $title == "Dashboard" ? "active" : "" ?>"><a style="text-decoration:none;" href="index.php"><i class="fas fa-home"></i>Home</a></li>
            <li class="<?= $title == "Donor" ? "active" : "" ?>"><a style="text-decoration:none;" href="admin_donor.php"><i class="fas fa-user"></i>Donor</a></li>
            <li class="<?= $title == "Patient" ? "active" : "" ?>"><a style="text-decoration:none;" href="admin_patient.php"><i class="fas fa-user-injured"></i>Patient</a></li>
            <li class="<?= $title == "Donations" ? "active" : "" ?>"><a style="text-decoration:none;" href="admin_donation.php"><i class="fas fa-hand-holding-medical"></i>Donations</a></li>
            <li class="<?= $title == "Blood Requets" ? "active" : "" ?>"><a style="text-decoration:none;" href="admin_request.php"><i class="fas fa-sync-alt"></i>Blood Requests</a></li>
            <li class="<?= $title == "Request History" ? "active" : "" ?>"><a style="text-decoration:none;" href="admin_request_history.php"><i class="fas fa-history"></i>Request History</a></li>
            <li class="<?= $title == "Blood Stock" ? "active" : "" ?>"><a style="text-decoration:none;" href="admin_blood.php"><i class="fas fa-hand-holding-water"></i>Blood Stock</a></li>
            <li><a style="text-decoration:none;margin-right:10px;" href="event.php"><i class="far fa-calendar-alt"style="margin-right:10px;"></i>Event</a></li>
        </ul> 

    </div>
    </div>
  
