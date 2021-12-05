<?php
    $title = "Add Event";
   include("include/header.php");
   include("include/nav.php");
?>
<div class="wrapper ">
  <div class="main_content">

           <form  method="POST"> 
                <h1 style="margin-bottom:60px">Add Event</h1>
                <div class="question">
                    <input type="text" name="first_name" required/>
                    <label>Event Name</label>
                </div>
                <div class="profile-picture-upload">
                    <img src="" alt="Profile picture preview" class="imagePreview">
                    <a class="action-button mode-upload">Event image</a>
                    <input type="file" class="hidden" name="fileInput" />
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"style="color:#ff0018;font-weight:600;margin-top:30px;">Event details:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" name="register">Add Event</button>
           </form>
    </div>
</div>
<?php include("include/footer.php") ?>
