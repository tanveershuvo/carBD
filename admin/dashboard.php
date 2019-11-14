<?php include_once('includes/header.php');?> 
	<?php include_once('includes/navbar.php');?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Car Name</th>
                    <th>Pick Date</th>
                    <th>Return Date</th>
                    <th>Total day</th>
                    <th>booking Date</th>
                    <th>total bill</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  include_once '../dbCon.php';
                  $conn= connect();
                  if($_SESSION['role']==1){
                    $id=$_SESSION['renter_id'];
                    $sql = "SELECT * FROM `booking_details` as b , car_details as c WHERE b.car_id=c.car_id AND renter_id='$id'";
					//echo $sql;exit;
                    $resultData=$conn->query($sql);
                  }else{
                    $sql = "SELECT * FROM `booking_details` as b , car_details as c WHERE b.car_id=c.car_id";
					
                    $resultData=$conn->query($sql);
                  }

                  	foreach($resultData as $view){
                  ?>
                  <tr>
                    <td><?=$view['car_name']?></td>
                    <td><?=$view['pick_date']?></td>
                    <td><?=$view['return_date']?></td>
                    <td><?=$view['total_day']?></td>
                    <td><?=$view['booking_date']?></td>
                    <td style="color:blue;"><b><?=$view['total_bill']?></b>/-</td>
                  </tr>
                <?php } ?>
				                <thead>
                  <tr>
                    <th>Car Name</th>
                    <th>Pick Date</th>
                    <th>Return Date</th>
                    <th>Total day</th>
                    <th>booking Date</th>
                    <th>total bill</th>
                  </tr>
                </thead>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <?php include_once('includes/footer.php');?> 