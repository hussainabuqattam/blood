<?php
    $title = "Event";
    include "include/init.php";
    include("include/header.php");
    include("include/nav.php");
?>

<div class="wrapper ">
      <div class="main_content">
       <a href="form-event.php" class="button-event-form draw"><i class="fas fa-plus"></i>Add Event</a>
        <div class="container-bold-tble">
          <table class="table table-bold table-bordered" style="text-align:center;">
            <thead>
                    <tr>
                        <th scope="col">Name Event</th>
                        <th scope="col">Image Event</th>
                        <th scope="col">details Event</th>
                        <th scope="col">Action</th>
                    </tr>
            </thead>
            <tbody>
                    <tr>
                        <td style="padding-top:35px">blood event</td>
                        <td><img src="img/pexels-icsa-1708936.jpg" alt=""style="width:80px;height:80px;"></td>
                        <td style="width:40%;overflow-wrap:anywhere;">
                                 <!-- Button trigger modal -->
                                <button type="button" class="btn mode-event" data-toggle="modal" data-target="#exampleModalLong">
                                  details Event                               
                                </button>
                              <!-- Modal -->
                              <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">details Event</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      Blood is a constantly circulating fluid providing the body with nutrition, oxygen, 
                                      and waste removal. Blood is mostly liquid, with numerous cells and proteins suspended 
                                      in it, making blood "thicker" than pure water. ... Blood plasma also contains glucose 
                                      and other diss
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </td>
                        <td class="text-center">
                          <button class="btn btn-primary badge-pill" style="width: 100px;margin-top:15px;"><a style="text-decoration: none;color: white;">EDIT</a> </button>
                          <button class="btn btn-danger badge-pill" style="width: 80px;margin-top:15px;"><a style="text-decoration: none;color: white;">DELETE</a> </button>
                        </td>
                    </tr>
              </tbody>
          </table>
         </div>
       </div>
    </div>
<?php include("include/footer.php") ?>
