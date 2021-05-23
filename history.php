<?php
    $errorMessage = null;
    $successMessage = null;
    if (sizeof($_POST) > 0) {
        // $updateId = isset($_GET['id']) ? $_GET['id'] : null;
        $trackingNumber = $_POST['tracking_number'];
        if (!$trackingNumber) $errorMessage = 'Tracking number is required';
        $description = $_POST['description'];
        if (!$description) $errorMessage = 'Description is required';
        $dateCreated = $_POST['date_created'];
        if (!$dateCreated) $errorMessage = 'Date is required';

        if ($errorMessage) {
            $shippingInfo = $_POST;
        } else {
            $data = array(
                'description' => $description,
                'date_created' => $dateCreated,
                'tracking_number' => $trackingNumber,
            );
            $result = createHistory($data);
            if ($result) {
                $successMessage = 'Shipment history created successfully';
                // if ($updateId) {
                //     header('Location: /shipments');
                // }
            } else {
                $errorMessage = 'An error occurred try again';
                $shippingInfo = $_POST;
            }
            
        }
    } else {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $shippingInfo = getShipment($_GET['id']);
        }

        // if (isset($_GET['success'])) {
        //     $successMessage = 'Shipment updated successfully';
        // }
    }
?>

<!doctype html>
<html lang="en">
<?php include 'head.php'; ?>

<body class="sidebar-menu-collapsed">
  <div class="se-pre-con"></div>
  <style>
            .error-message {
                font-size: 13px;
                color: red;
            }
            .success-message {
                display: none;
            }
        </style>
<section>
  <!-- sidebar menu start -->
   <?php include 'sidebar.php'; ?>
  <!-- //sidebar menu end -->

  <!-- header-starts -->
    <?php include 'header.php'; ?>
  <!-- //header-ends -->

  <!-- main content start -->
<div class="main-content">

  <!-- content -->
  <div class="container-fluid content-top-gap">
    <!-- statistics data -->
      <?php include 'stat.php'; ?>
    <!-- //statistics data -->

    <!-- profile details -->
    <div class="card card_border py-2 mb-4">
                <div class="cards__heading">
                    <h3>Add Shipment History<span></span></h3>
                </div>
            <form method="post">
                <div class="card-body">
                    <?php if ($successMessage): ?>
                        <div id="m-success" class="alert alert-success" role="alert"><?=$successMessage?></div>
                    <?php endif; ?>
                    <?php if ($errorMessage): ?>
                        <div id="m-success" class="alert alert-danger" role="alert"><?=$errorMessage?></div>
                    <?php endif; ?>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                                <label for="inputEmail4" class="input__label">Tracking Number</label>
                                <input name="tracking_number" type="text" class="form-control input-style" id="dfirstName" placeholder="Tracking Number" value="<?=$shippingInfo['tracking_number']?>">
                                <span class="error-message" id="dfirstname-error"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4" class="input__label">Date</label>
                                <input name="date_created" type="date" class="form-control input-style" id="dlastName" placeholder="Date" value="<?=$shippingInfo['date_created']?>">
                                <span class="error-message" id="dlastname-error"></span>
                            </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4" class="input__label">History Description</label>
                        <input name="description" type="text" class="form-control input-style" id="dfirstName" placeholder="Description" value="<?=$shippingInfo['description']?>">
                        <span class="error-message" id="dfirstname-error"></span>
                    </div>
                </div>
                <button id="update-details" type="submit" class="btn btn-primary btn-style mt-4"><?=$_GET['id'] && is_numeric($_GET['id']) ? 'Update' : 'Add'?></button>
                </div>
            </form>
            </div>
    <!-- // end of profile -->

  </div>
  <!-- //content -->
</div>
<!-- main content end-->
</section>
  <!--footer section start-->
  <?php include 'footer.php'; ?>
<!--footer section end-->
<!-- move top -->
<button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
  <span class="fa fa-angle-up"></span>
</button>
<?php include 'script.php'; ?>
<script src="<?=$subPath . '/assets/js/profile.js'?>"></script>
</body>

</html>