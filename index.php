<?php 
  include('db.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dreamz</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content mt-3">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       <div class="row">
        <?php if (isset($_GET['edit'])) {
           $select_data = mysqli_fetch_assoc(mysqli_query($con, "SELECT * from `student` where `id`=" . $_GET['edit'] . ""));

         ?>
        <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-header bg-primary text-white">
                <h3 class="card-title">Edit Student</h3>
              </div>
              <!-- /.card-header -->
            <form id="formValidate" method="post" enctype="multipart/form-data">
             <div class="card-body">

                <div class="form-group">
                 <label for="exampleInputBorder">Student No.<span class="text-danger">*<span></label>
                 <input required="true" type="number" class="form-control form-control-border" name="u_student_no" id="u_student_no" value="<?php echo $select_data['student_no']; ?>" placeholder="Enter Student No.">
                </div> 

                <div class="form-group">
                  <label for="exampleInputBorder">Name<span class="text-danger">*<span></label>
                  <input type="text" required="true" class="form-control form-control-border" name="u_student_name" id="u_student_name" value="<?php echo $select_data['student_name']; ?>" placeholder="Enter Name">
                </div>  

                <div class="form-group">
                  <label for="exampleInputBorder">Date Of Birth<span class="text-danger">*<span></label>
                  <input type="date" class="form-control form-control-border" name="u_student_dob" id="u_student_dob" value="<?php echo $select_data['student_dob']; ?>"  placeholder="Enter Date Of Birth">
                </div>

                <div class="form-group">
                  <label for="exampleInputBorder">Student DOJ<span class="text-danger">*<span></label>
                  <input type="date" class="form-control form-control-border" name="u_student_doj" id="u_student_doj" value="<?php echo $select_data['student_doj']; ?>"placeholder="Enter Student DOJ">
                </div>          
              </div>
                <div class="card-footer">
                  <input type="submit" name="u_submit" id="u_submit" class="btn btn-primary" value="Save Changes">
                  <input type="button" name="goBack" class="btn btn-danger" onclick="window.history.go(-1); return false;" value="Cancel"/>
                </div>
                <?php
                 if (isset($_POST['u_submit'])) {
                  $u_student_no = $_POST['u_student_no'];
                  $u_student_name = $_POST['u_student_name'];
                  $u_student_dob = $_POST['u_student_dob'];
                  $u_student_doj = $_POST['u_student_doj'];

                  mysqli_query($con, "UPDATE `student` SET  `student_no` ='" . $u_student_no . "',`student_name` ='" . $u_student_name . "',`student_dob` ='" . $u_student_dob . "',`student_doj` ='" . $u_student_doj . "'WHERE `id`=" . $_GET['edit'] . "");
                                            ?>

              <script type="text/javascript">
                $(document).ready(function() {
                   // toastr.options.timeOut = 1000; // 1.5s

                     alert('Data Updated Successfully!!!');
                    setTimeout(function() {
                     window.location.href = "index.php";
                      }, 1500);
                     });
              </script>
              <?php
                 }
                ?>
          </form>
              <!-- /.card-body -->
      </div>
   </div>
 <?php } else { ?>
       <div class="col-md-4">
         <div class="card card-primary">
            <div class="card-header bg-primary text-white">
              <h3 class="card-title">Add Student</h3>
            </div>
              <!-- /.card-header -->
          <form id="formValidate" method="post" enctype="multipart/form-data">
            <div class="card-body">

              <div class="form-group">
                <label for="exampleInputBorder">Student No.<span class="text-danger">*<span></label>
                <input required="true" type="number" class="form-control form-control-border" name="student_no" id="student_no" placeholder="Enter Student No." autocomplete="off">
             </div> 

              <div class="form-group">
                <label for="exampleInputBorder">Name<span class="text-danger">*<span></label>
                <input type="text" required="true" class="form-control form-control-border" name="student_name" id="student_name" placeholder="Enter Name" autocomplete="off">
              </div>  

              <div class="form-group">
                <label for="exampleInputBorder">Date Of Birth<span class="text-danger">*<span></label>
                <input type="date" class="form-control form-control-border" name="student_dob" id="student_dob" placeholder="Enter Date Of Birth">
             </div>

              <div class="form-group">
                <label for="exampleInputBorder">Student DOJ<span class="text-danger">*<span></label>
                <input type="date" class="form-control form-control-border" name="student_doj" id="student_doj" placeholder="Enter Student DOJ">
              </div>          
          </div>
            <div class="card-footer">
                <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Add Student"/>
                     
            </div>
        </form>
              <!-- /.card-body -->
      </div>
    </div>
          <!-- ./col -->
       <?php } ?>

      <?php 
        if (isset($_POST['submit'])) {
          $student_no = $_POST['student_no'];
          $student_name = $_POST['student_name'];
          $student_dob = $_POST['student_dob'];
            $student_doj = $_POST['student_doj'];

          $sql = "INSERT INTO `student`( `student_no`, `student_name`, `student_dob`, `student_doj`) VALUES ('$student_no','$student_name.','$student_dob','$student_doj')";

           $result = mysqli_query($con, $sql); 
         }
       ?>
        
      <div class="col-md-8"> 
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h3 class="card-title">View Student</h3>
          </div>
              <!-- /.card-header -->
      <?php

       $stud="select * from student";
       $data=mysqli_query($con,$stud);
       $count=1;

     ?>

        <div class="card-body">
          <table id="view_notification" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Sr No</th>
                <th>Student No.</th>
                <th>Name</th>
                <th>DOB</th>
                <th>DOJ</th>
                <th>Action</th>
              </tr>
            </thead>
           <?php
            while($datalist=mysqli_fetch_assoc($data))
              {

           ?>
            <tbody>
              <tr>
                <td><?php echo $count++ ?></td>
                <td><?php echo $datalist['student_no']; ?></td>
                <td><?php echo $datalist['student_name']; ?></td>
                <td><?php echo $datalist['student_dob']; ?></td>
                <td><?php echo $datalist['student_doj']; ?></td>
                <td><?php echo "<a href='delete_data.php?id=".$datalist['id']."'onClick=\"javascript: return confirm('Please confirm deletion');\" data-tooltip='tooltip' title='Delete Data' class='btn btn-danger btn-xs'><i class='fa fa-trash'>  </i> </a>"; ?>
                   <?php echo "<a  data-tooltip='tooltip' href='index.php?edit=" . $datalist['id'] . "' title='Edit' class='btn btn-info btn-xs'><i class='fa fa-edit'>  </i> </a>" ?>   
                 </td>
       
              </tr>
              <?php
                  }
                    echo "<p style='text-align:center; font-size:18px; border-bottom: 1px solid #4285f4; width: 150px;'>Total Entries- ".$count;

              ?>
            </tbody>
          </table>
        </div>
              <!-- /.card-body -->
      </div>
    </div>
  </div>
        
</section>
    <!-- /.content -->
</div>
</body>
</html>