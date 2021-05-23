<div class="sidebar-menu sticky-sidebar-menu">

<!-- logo start -->
<div class="logo">
  <h3><a style="font-size: 20px;" href="index.html">RGLogistics</a></h3>
</div>

<!-- if logo is image enable this -->
<!-- image logo --
<div class="logo">
  <a href="index.html">
    <img src="image-path" alt="Your logo" title="Your logo" class="img-fluid" style="height:35px;" />
  </a>
</div>
 //image logo -->

<div class="logo-icon text-center">
  <a href="index.html" title="logo"><img src="<?=$subPath . '/assets/images/logo.png'?>" alt="logo-icon"> </a>
</div>
<!-- //logo end -->

<div class="sidebar-menu-inner">

  <!-- sidebar nav start -->
  <ul class="nav nav-pills nav-stacked custom-nav">
    <li><a href="/shipments"><i class="fa fa-table"></i> <span>Shipments</span></a></li>
    <li><a href="/tracking/add"><i class="fa fa-truck"></i> <span>Add Tracking</span></a></li>
    <li><a href="/history"><i class="fa fa-history"></i> <span>Add History</span></a></li>
    <!-- <li><a href="/profile"><i class="fa fa-user"></i> <span>My Profile</span></a></li> -->
  </ul>
  <!-- //sidebar nav end -->
  <!-- toggle button start -->
  <a class="toggle-btn">
    <i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>
    <i class="fa fa-angle-double-right menu-collapsed__right"></i>
  </a>
  <!-- //toggle button end -->
</div>
</div>