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
                 
                 <h3>Admin Login</h3>
                </a>

                <p>Login to continue</p>
                
                <form action="adlogin.php" method="post">
                <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                   <input class="form-control form-control-lg" id="username" name="username" type="text" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                 <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
                </div>
                <div class="mt-3">
                   <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" name="login">Login</button>
                  

                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                   
                  </div>
                 
                </div>
               
              </form>

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