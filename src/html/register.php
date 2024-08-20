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
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <?php include('./menu.php') ?>
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <?php include('./header.php') ?>
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Report Accident</h5>
                            <div class="card">
                                <div class="card-body">
                                    <?php include('./dbcon.php'); ?>
                                    <form action="accident.php" method="post">
                                        <div class="mb-3">

                                        <div class="mb-3">
                                            <h4>PERSONAL INFORMATION</h4> <br>
                                                <label for="exampleInputPassword1" class="form-label">DRIVER NAME</label>
                                                <input type="text" class="form-control" id="name" name="name">
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">DRIVER LICENSE NO</label>
                                                <input type="text" class="form-control" id="l_no" name="l_no">
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">MOBILE NO</label>
                                                <input type="number" class="form-control" id="mobile" name="mobile">
                                            </div><br>
                                            <h4>VEHICLE INFORMATION</h4> <br>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">VEHICLE NO</label>
                                                <input type="number" class="form-control" id="v_no" name="v_no">
                                            </div>

                                           
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">PHOTOGRAPHIC EVIDENCE</label>
                                                <input type="file" class="form-control" id="rep_no" name="rep_no">
                                            </div><br>
                                            <h4>ACCIDENT INFORMATION</h4> <br>

                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">DATE AND TIME</label>
                                                <input type="datetime-local" class="form-control" id="date" name="date">
                                            </div>


                                            <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">LOCATION</label>
                                            <input type="text" class="form-control" id="loc" name="loc"></div>

                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">DESCRIPTION OF THE ACCIDENT</label>
                                               <textarea name="des" id="des"  class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
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
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>