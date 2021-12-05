<?php
$title = "profile";
include "include/init.php";
   include("include/header.php");
   include("include/top-nav.php");

   var_dump($_FILES,$_POST);
?>
<div class="wrapper ">
  <div class="main_content">

           <form  method="POST" enctype="multipart/form-data"> 
                <h1 style="margin-bottom:60px">Donor Edit-profile</h1>
                <div class="question">
                    <input type="text" name="first_name" required/>
                    <label>First Name</label>
                </div>
                <div class="question">
                    <input type="text" name="last_name" required/>
                    <label>Last Name</label>
                </div>
                <div class="question">
                    <input type="text" name="username" required/>
                    <label>Username</label>
                </div>
                <div class="question">
                    <input type="Password" name="password" required/>
                    <label> Old Password</label>
                </div>
                <div class="question">
                    <input type="Password" name="password" required/>
                    <label>New Password</label>
                </div>
                <div class="question">
                    <input type="text" name="address" required/>
                    <label>Address</label>
                </div>
                <div class="question">
                    <input type="text" name="phone_number" required/>
                    <label>Phone Number</label>
                </div>
                <div class="profile-picture-upload">
                    <img src="" alt="Profile picture preview" class="imagePreview">
                    <a class="action-button mode-upload">Upload image</a>
                    <input type="file" class="hidden" name="fileInput" />
                </div>
                <button type="submit" name="register">Edit-profile</button>
           </form>
    </div>
</div>
<?php include("include/footer.php") ?>
