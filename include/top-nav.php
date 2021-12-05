
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
                      <a class="nav-link" style="color: white;" href="/"><i class="fas fa-home"></i>&nbsp; Home</i></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" style="color: white;" href="patientlogin.php"><i class="fas fa-procedures"></i>&nbsp; Patient</i></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" style="color: white;" href="donorlogin.php"><i class="fas fa-user"></i>&nbsp; Donor</i></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" style="color: white;" href="/blood/blood-admin/adminlogin.php"><i class="fas fa-user-shield"></i>&nbsp; Admin</i></a>
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


<div class="wrapper" style="<?= isset($footer) && $footer == true ? "display:none;" : "" ?>">
  <div class="sidebar">
      <ul>
          <?php if(isset($_SESSION['donor_ID'])): ?>
            <li class="<?= $title == "Dashboard" ? "active" : "" ?>"><a style="text-decoration:none;" href="donor_dashboard.php"><i class="fas fa-home"></i>Home</a></li>
            <li class="<?= $title == "Donate Blood" ? "active" : "" ?>"><a style="text-decoration:none;" href="donate_blood.php"><i class="fas fa-hand-holding-medical"></i>Donate Blood</a></li>
            <li class="<?= $title == "Donation History" ? "active" : "" ?>"><a style="text-decoration:none;" href="donation_history.php"><i class="fas fa-history"></i>Donation History</a></li>
            <li><a style="text-decoration:none;" href="donor-editprofile.php"><i class="fas fa-user-edit"></i>Edit profile</a></li>
          <?php endif; ?>
          <?php if(isset($_SESSION['patient_ID'])): ?>
            <li class="<?= $title == "Dashboard" ? "active" : "" ?>"><a style="text-decoration:none;" href="patient_dashboard.php"><i class="fas fa-home"></i>Home</a></li>
            <li class="<?= $title == "Make Request" ? "active" : "" ?>"><a style="text-decoration:none;" href="makerequest.php"><i class="fas fa-sync-alt"></i>Make Request</a></li>
            <li class="<?= $title == "Request History" ? "active" : "" ?>"><a style="text-decoration:none;" href="my_request.php"><i class="fas fa-history"></i>Request History</a></li>
            <li><a style="text-decoration:none;" href="patient-editprofile.php"><i class="fas fa-user-edit"></i>Edit profile</a></li>
          <?php endif; ?>
      </ul> 
  </div>
</div>


