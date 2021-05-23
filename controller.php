<?php 
    include 'helper.php';
    include 'model.php';
    include 'connection.php';


    function getUser($id) {
        $pdo = (object)['pdo' => DBConnection::getDB()];
        $user = Model::findOne($pdo, array('id' => $id), 'users');

        return $user;
    }

    function getShipment($id) {
        $pdo = (object)['pdo' => DBConnection::getDB()];
        $shipment = Model::findOne($pdo, array('id' => $id), 'tracking');

        return $shipment;
    }

    function createShipment($data) {
        $pdo = (object)['pdo' => DBConnection::getDB()];
        $shipmentId = Model::create($pdo, $data, 'tracking');
        return $shipmentId;
    }

    function createHistory($data) {
        // var_dump($data); exit;
        $pdo = (object)['pdo' => DBConnection::getDB()];
        $history = Model::create($pdo, $data, 'tracking_history');
        return $history;
    }

    function updateShipment($data, $whereClause) {
        $pdo = (object)['pdo' => DBConnection::getDB()];
        $shipment = Model::update($pdo, $data, $whereClause, 'tracking');

        return $shipment;
    }

    function getAllShipments() {
        $pdo = (object)['pdo' => DBConnection::getDB()];
        $shipments = Model::find($pdo, array(), 'tracking');

        return $shipments;
    }

    function getShipmentInfo($trackingNumber) {
        $pdo = (object)['pdo' => DBConnection::getDB()];
        $shipment = Model::findOne($pdo, array('tracking_id' => $trackingNumber), 'tracking');
        $shipmentHistory = Model::find($pdo, array('tracking_number' => $trackingNumber), 'tracking_history');

        if ($shipment) {
            Helper::jsonResponse(array(
                'success' => true,
                'data' => array(
                    'shipment' => $shipment,
                    'history' => $shipmentHistory
                )
            ));
        }

        Helper::jsonResponse(array(
            'success' => false,
            'data' => 'Server error',
        ));
    }

    function login($username, $passwordHash) {
        $pdo = (object)['pdo' => DBConnection::getDB()];
        $user = Model::findOne($pdo, array('email' => $username, 'password' => $passwordHash), 'users');

        return $user;
    }

    function signup($data) {
        $pdo = (object)['pdo' => DBConnection::getDB()];
        $user = Model::create($pdo, $data, 'users');
        return $user;
    }

?>