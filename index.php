<?php
  session_start();
  include 'controller.php';
  $subPath = $_SERVER['HTTP_HOST'] == 'localhost:8888' ? '/zenith-dashboard' : '';
  $currentPage = 'Dashboard';
  $header = 'Last ten Transaction';

  $url = explode('?', $_SERVER['REQUEST_URI'])[0];
  if ($url == '/tracking/add') {
    if (!isset($_SESSION['user'])) {
      header('Location /login');
    }

    // echo 'Fuck you'; exit;
    $currentPage = 'Tracking / Add';
    $header = 'Add Tracking';
    include 'addTracking.php';
    exit;
  } else if ($url == '/shipments') {
    if (!isset($_SESSION['user'])) {
      // echo 'Here'; exit;
      header('Location: /login');
    }

    $currentPage = 'Shipments';
    $header = 'All Shipments';
    $shipments = getAllShipments();
    // var_dump($shipments, '====>>>>'); exit;
    include 'shipments.php';
    exit;
   }  else if ($url == '/login') {
    if (isset($_SESSION['user'])) {
      header('Location: /shipments');
    }
    include 'login.php';
    exit;
  }  else if ($url == '/signup') {
    if (isset($_SESSION['user'])) {
      header('Location: /shipments');
    }
    include 'signup.php';
    exit;
  } else if ($url == '/get-shipmentInfo') {
    include 'getShipmentInfo.php';
    exit;
  } else if ($url == '/history') {
    include 'history.php';
    exit;
  }  else if ($url == '/logout') {
    include 'logout.php';
  }  else {
    header("Location: /shipments");
  }

  $totalAmountInvested = 0;
  for ($i = 0; $i < sizeof($details['investments']); $i++) {
      $totalAmountInvested+=$details['investments'][$i]['amount'];
  }

  $transactions = $details['transactions'];
?>

<!doctype html>
<html lang="en">
<?php include 'head.php'; ?>

<body class="sidebar-menu-collapsed">
  <div class="se-pre-con"></div>
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

    <!-- chatting -->

    <!-- //chatting -->

    <!-- accordions -->
    <!-- //accordions -->

    <!-- modals -->
      <?php include 'transaction.php'; ?>
    <!-- //modals -->

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
</body>

</html>
  