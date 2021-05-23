<?php
    $errorMessage = null;
    $successMessage = null;
    if (sizeof($_POST) > 0) {
        $updateId = isset($_GET['id']) ? $_GET['id'] : null;
        $recieverName = $_POST['receiver_name'];
        if (!$recieverName) $errorMessage = 'Receiver name is required';
        $shipperName = $_POST['shipper_name'];
        if (!$shipperName) $errorMessage = 'Shipper name is required';
        $receiverAddress = $_POST['receiver_address'];
        if (!$receiverAddress) $errorMessage = 'Receiver address is required';
        $shipperAddress = $_POST['shipper_address'];
        if (!$shipperAddress) $errorMessage = 'Shipper address is required';
        $shipDate = $_POST['ship_date'];
        if (!$shipDate) $errorMessage = 'Shipping date is required';
        $deliveryDate = $_POST['delivery_date'];
        if (!$deliveryDate) $errorMessage = 'Delivery date is required';
        $status = $_POST['status'];
        if (!$status) $errorMessage = 'Status is required';
        $weight = $_POST['weight'];
        if (!$weight) $errorMessage = 'Weight is required';
        $type = $_POST['type'];
        if (!$type) $errorMessage = 'Type is required';

        $content = $_POST['content'];
        if (!$content) $errorMessage = 'Content is required';

        if ($errorMessage) {
            $shippingInfo = $_POST;
        } else {
            $data = array(
                'receiver_name' => $recieverName,
                'shipper_name' => $shipperName,
                'receiver_address' => $receiverAddress,
                'shipper_address' => $shipperAddress,
                'ship_date' => $shipDate,
                'delivery_date' => $deliveryDate,
                'status' => $status,
                'type' => $type,
                'weight' => $weight,
                'tracking_id' => Helper::generatePin(),
                'content' => $content
            );
            
            if ($updateId) {
                unset($data['tracking_id']);
            }
            
            $result = $updateId ? updateShipment($data, array('id' => $updateId)) : createShipment($data);
            if ($result) {
                $successMessage = $updateId ? 'Shipment updated successfully' : 'Shipment created successfully';
                if ($updateId) {
                    header('Location: /shipments');
                }
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
                    <h3>Shipment Details <span></span></h3>
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
                                <label for="inputEmail4" class="input__label">Shipper Name</label>
                                <input name="shipper_name" type="text" class="form-control input-style" id="dfirstName" placeholder="Shipper name" value="<?=$shippingInfo['shipper_name']?>">
                                <span class="error-message" id="dfirstname-error"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4" class="input__label">Receiver Name</label>
                                <input name="receiver_name" type="text" class="form-control input-style" id="dlastName" placeholder="Reciever name" value="<?=$shippingInfo['receiver_name']?>">
                                <span class="error-message" id="dlastname-error"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="input__label">Shipper Address</label>
                                <input name="shipper_address" type="text" class="form-control input-style" id="dfirstName" placeholder="Shipper Address" value="<?=$shippingInfo['shipper_address']?>">
                                <span class="error-message" id="dfirstname-error"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4" class="input__label">Receiver Address</label>
                                <input name="receiver_address" type="text" class="form-control input-style" id="dlastName" placeholder="Receiver Address" value="<?=$shippingInfo['receiver_address']?>">
                                <span class="error-message" id="dlastname-error"></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="input__label">Ship Date</label>
                                <input name="ship_date" type="date" class="form-control input-style" id="dfirstName" placeholder="Ship Date" value="<?=$shippingInfo['ship_date']?>">
                                <span class="error-message" id="dfirstname-error"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4" class="input__label">Delivery Date</label>
                                <input name="delivery_date" type="date" class="form-control input-style" id="dlastName" placeholder="Delivery Date" value="<?=$shippingInfo['delivery_date']?>">
                                <span class="error-message" id="dlastname-error"></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="input__label">Status</label>
                                <input name="status" type="text" class="form-control input-style" id="dfirstName" placeholder="Status" value="<?=$shippingInfo['status']?>">
                                <span class="error-message" id="dfirstname-error"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4" class="input__label">Weight</label>
                                <input name="weight" type="text" class="form-control input-style" id="dlastName" placeholder="Weight" value="<?=$shippingInfo['weight']?>">
                                <span class="error-message" id="dlastname-error"></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="input__label">Type</label>
                                <input name="type" type="text" class="form-control input-style" id="demail" placeholder="Type" value="<?=$shippingInfo['type']?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="input__label">Package Content</label>
                                <input name="content" type="text" class="form-control input-style" id="demail" placeholder="Type" value="<?=$shippingInfo['content']?>">
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
