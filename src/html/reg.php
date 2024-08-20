<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Traffic Tracker</title>
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <h3>Traffic Tracker</h3>
                </a>
              

                <h2>Sign up here</h2>  <br>
                <?php include('./dbcon.php'); ?>
                <form action="add_new_vehicle.php" method="post">
                  <div class="mb-3">

                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">VEHICLE TYPE</label>
                      <select class="form-control select2" style="width: 80%;" name="type" id="type" required>
                        <?php
                          $queryemp = mysqli_query($con, "select * from veh_types") or die(mysqli_error());
                          while ($rowd = mysqli_fetch_array($queryemp)) {
                        ?>
                          <option value="<?php echo $rowd['veh_type']; ?>"><?php echo $rowd['veh_type']; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">VEHICLE REGISTRATION NO</label>
                      <input type="text" class="form-control" id="v_no" name="v_no">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">DRIVER LICENSE NO</label>
                      <input type="number" class="form-control" id="l_no" name="l_no">
                    </div>


                    
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">OWNERS NAME</label>
                      <input type="text" class="form-control" id="name" name="name">
                    </div>

                   
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">ADDRESS</label>
                      <input type="text" class="form-control" id="address" name="address">
                    </div>

                   

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">MOBILE NO</label>
                      <input type="number" class="form-control" id="mobile" name="mobile">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">USERNAME </label>
                      <input type="text" class="form-control" id="uname" name="uname">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">PASSWORD</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>

                    
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">CONFIRM PASSWORD</label>
                      <input type="password" class="form-control" id="passwordc" name="passwordc">
                    </div>

                   
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <div class="text-center mt-3">
                  <a href="./index.php">Already have an accont Login here !</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
