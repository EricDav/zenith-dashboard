<?php 

    $trackingNumber = isset($_POST['tracking_number']) ? $_POST['tracking_number'] : null;

    if (!$trackingNumber) {
        Helper::jsonResponse(array(
            'success' => false,
            'data' => 'Server error',
        ));
    }

    getShipmentInfo($trackingNumber);

?>