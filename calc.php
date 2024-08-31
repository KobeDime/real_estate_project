    <?php
    ini_set('session.cache_limiter', 'public');
    session_cache_limiter(false);
    session_start();

    include("config.php");

    // Initialize variables
    $amount = $mon = $int = $interest = $pay = $month = 0;

    if (isset($_REQUEST['calc'])) {
        // Cast the request values to float to ensure they are treated as numbers
        $amount = (float)$_REQUEST['amount'];
        $mon = (float)$_REQUEST['month'];
        $int = (float)$_REQUEST['interest'];

        // Calculate interest
        $interest = $amount * $int / 100;
        $pay = $amount + $interest;

        // Check if $mon is not zero to avoid division by zero
        if ($mon > 0) {
            $month = $pay / $mon;
        } else {
            $error = "Number of months cannot be zero.";
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/png" href="new_images/favicon.png">
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="css/layerslider.css">
        <link rel="stylesheet" type="text/css" href="css/color.css">
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
        <link rel="stylesheet" type="text/css" href="new_css/style.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <title>KobeEstate - EMI Calculator</title>
    </head>
    <body>
        <div id="page-wrapper">
            <div class="row">
                <?php include("include/header.php"); ?>
                <div class="full-row bg-gray">
                    <div class="container">
                        <div class="row mb-5">
                            <div class="col-lg-12">
                                <h2 class="text-secondary double-down-line text-center">EMI Calculator</h2>
                            </div>
                        </div>
                        <center>
                            <table class="items-list col-lg-6 table-hover" style="border-collapse:inherit;">
                                <thead>
                                    <tr class="bg-secondary">
                                        <th class="text-white font-weight-bolder text-center">Term</th>
                                        <th class="text-white font-weight-bolder text-center">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center font-18">
                                        <td><b>Amount</b></td>
                                        <td><b><?php echo '₱' . number_format($amount, 2); ?></b></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td><b>Total Duration</b></td>
                                        <td><b><?php echo $mon . ' Years'; ?></b></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td><b>Interest Rate</b></td>
                                        <td><b><?php echo $int . '%'; ?></b></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td><b>Total Interest</b></td>
                                        <td><b><?php echo '₱' . number_format($interest, 2); ?></b></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td><b>Total Amount</b></td>
                                        <td><b><?php echo '₱' . number_format($pay, 2); ?></b></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td><b>Pay Per Year (EMI)</b></td>
                                        <td><b><?php echo isset($error) ? $error : '₱' . number_format($month, 2); ?></b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </center>
                    </div>
                </div>
                <?php include("include/footer.php"); ?>
                <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/greensock.js"></script>
        <script src="js/layerslider.transitions.js"></script>
        <script src="js/layerslider.kreaturamedia.jquery.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/tmpl.js"></script>
        <script src="js/jquery.dependClass-0.1.js"></script>
        <script src="js/draggable-0.1.js"></script>
        <script src="js/jquery.slider.js"></script>
        <script src="js/wow.js"></script>
        <script src="js/custom.js"></script>
    </body>
    </html>
