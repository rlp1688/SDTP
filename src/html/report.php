<?php
if (!isset($_SESSION)) {
  session_start();
  include('./dbcon.php');
}
$edate = date("Y-m-d");
if (empty($_SESSION['vms_id'])) :
endif;
?>


<?php
// Check if the search form is submitted
$search = '';
if (isset($_GET['search'])) {
  $search = mysqli_real_escape_string($con, $_GET['search']);
}

// Query to fetch employee details with optional search filter
$query = "SELECT * FROM accident";

if (!empty($search)) {
  $query .= " WHERE emp_name LIKE '%$search%' 
                OR emp_no LIKE '%$search%'
                OR loc_name LIKE '%$search%'";
}

$query .= ";";

$result = mysqli_query($con, $query) or die(mysqli_error($con));


$rcount = 0;

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Traffic Tracker</title>
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <style>
    /* Styles for the pop-up overlay */
    
    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
    }

    /* Styles for the pop-up form */
    .popup {
      position: fixed;
      background-color: white;
      width: 300px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1001;
    }

    /* Close button style */
    .close-btn {
      float: right;
      cursor: pointer;
    }
    .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #5d87ff;
}

input:focus + .slider {
  box-shadow: 0 0 1px #5d87ff;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
  </style>
</head>

<body>

  <div id="chart-container" style="display: flex; flex-wrap: wrap; gap: 20px;"></div>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <?php include('./menue1.php'); ?>
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <?php include('./header.php') ?>
      <div class="container-fluid">
        <!--  Chart Container -->
        <div class="row mb-4">
          <div class="row">
            <div class="col-lg-8 d-flex align-items-stretch">
              <div>
                <div class="card-body p-4">
                  <div class="row mb-3">
                    <div class="col-lg-6">
                   
                      <input type="text" class="form-control" id="searchInput" placeholder=" Search by Name or Location">
                    </div>
                  </div>

                  <h5 class="card-title fw-semibold mb-4">Accident Details</h5>
                  <div class="table-responsive">


                    <table class="table text-nowrap mb-0 align-middle">
                      <thead class="text-dark fs-4">
                        <tr>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">#</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Driver Name</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Driver License No</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Mobile No</h6>
                          </th>

                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Vehicle No</h6>
                          </th>

                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Location</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Date</h6>
                          </th>
                         
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Description</h6>
                          </th>
                         
                        </tr>
                      </thead>
                      <tbody id="employeeTable">

                        <?php $query = mysqli_query($con, "SELECT * FROM accident") or die(mysqli_error($con));
                        $locations = array();
                        // Fetch the result
                       
                        ?>

                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                          <tr>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0"><?php echo $row['id']; ?></h6>
                            </td>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0 fs-4"><?php echo $row['name']; ?></h6>
                            
                            </td>
                          
                            <td class="border-bottom-0">
                              <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary rounded-3 fw-semibold"><?php echo $row['license_number']; ?></span>
                              </div>
                            </td>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1"><?php echo $row['mobile']; ?></h6>
                            </td>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1"><?php echo $row['vehicle_number']; ?></h6>
                            </td>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1"><?php echo $row['location']; ?></h6>
                            </td>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1"><?php echo $row['accident_date']; ?></h6>
                            </td>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1"><?php echo $row['description']; ?></h6>
                            </td>
                           
   


                            
                          </tr>

                     

                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                      </tbody>
                    </table>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Get all elements with class open-popup-btn
      const openPopupBtns = document.querySelectorAll('.open-popup-btn');
      const overlays = document.querySelectorAll('.overlay');

      // Function to open the popup
      function openPopup() {
        // Extract emp_id from the button's data attribute
        const empId = this.getAttribute('data-emp-id');
        const overlay = document.getElementById(`overlay-${empId}`);
        overlay.style.display = 'block';
      }

      // Function to close the popup
      function closePopup() {
        overlays.forEach(overlay => {
          overlay.style.display = 'none';
        });
      }

      // Add click event listeners to all open-popup-btn elements
      openPopupBtns.forEach(btn => {
        btn.addEventListener('click', openPopup);
      });

      // Add click event listener to close buttons in pop-ups
      document.querySelectorAll('.close-btn').forEach(btn => {
        btn.addEventListener('click', closePopup);
      });

      // Function to handle search input change
      document.getElementById('searchInput').addEventListener('keyup', function() {
        var searchValue = this.value.toLowerCase().trim();
        var rows = document.querySelectorAll('#employeeTable tr');

        rows.forEach(function(row) {
          var name = row.querySelector('td:nth-child(2)').textContent.toLowerCase().trim();
          var empNo = row.querySelector('td:nth-child(3)').textContent.toLowerCase().trim();
          var locName = row.querySelector('td:nth-child(5)').textContent.toLowerCase().trim();

          if (name.includes(searchValue) || empNo.includes(searchValue) || locName.includes(searchValue)) {
            row.style.display = '';
          } else {
            row.style.display = 'none';
          }
        });
      });


      document.getElementById("searchInput").addEventListener("keyup", filterTable);

      document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const empId = this.dataset.empid;
            const isChecked = this.checked ? 1 : 0; // Convert true/false to 1/0

            // Send AJAX request to update emp_Active in database
            updateEmployeeActive(empId, isChecked);
        });
    });

    function updateEmployeeActive(empId, isActive) {
        // AJAX request to update database
        fetch('update_employee_active.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                empId: empId,
                isActive: isActive
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Update successful');
            // Optionally update UI if needed
        })
        .catch(error => {
            console.error('Error updating emp_Active:', error);
            // Handle error
        });
    }
});
    </script>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/datatables.js"></script>
</body>

</html>