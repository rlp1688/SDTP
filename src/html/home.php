<?php
if (!isset($_SESSION)) {
    session_start();
    include('./dbcon.php');
}
//$edate=date("Y-m-d");
$edate = '2024-07-23';

$edate1 = date("Y-m-d H:i:s");
if (empty($_SESSION['vms_id'])) :
endif;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Traffic Tracker</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            height: 180px;
            object-fit: cover;
        }
        .hidden {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
    <div id="chart-container" style="display: flex; flex-wrap: wrap; gap: 20px;"></div>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <?php include('./menu.php'); ?>
        <!-- Main wrapper -->
        <div class="body-wrapper">
            <?php include('./header.php') ?>
            <div class="container-fluid">
                <!-- Cards -->
                <div class="container mt-4">
                    <div class="row row-cols-1 row-cols-md-3 g-4" id="card-container">
                        <?php
                        $query = mysqli_query($con, "SELECT * FROM accident") or die(mysqli_error($con));
                        $i = 1;
                        while ($row = mysqli_fetch_array($query)) {
                            $hiddenClass = $i > 9 ? 'hidden' : '';
                            echo '
                            <div class="col ' . $hiddenClass . '">
                                <div class="card h-100">
                                    <img src="./' . $row['image'] . '" class="card-img-top" alt="Card image ' . $i . '">
                                    <div class="card-body">
                                        <h5 class="card-title">Accident in ' . $row['location'] . '</h5>
                                        <p class="card-text">' . $row['description'] . '</p>
                                         <a href="details.php?id=' . $row['id'] . '" class="btn btn-primary">More Info</a>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted"> On ' . $row['accident_date'] . '</small>
                                    </div>
                                </div>
                            </div>';
                            $i++;
                        }
                        ?>
                    </div>
                    <button class="btn btn-primary mt-3" id="load-more-btn">Load More</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script>
        document.getElementById('load-more-btn').addEventListener('click', function() {
            const hiddenCards = document.querySelectorAll('#card-container .hidden');
            hiddenCards.forEach(card => card.classList.remove('hidden'));
            // Hide the button if all cards are shown
            if (document.querySelectorAll('#card-container .hidden').length === 0) {
                this.style.display = 'none';
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
</body>

</html>
