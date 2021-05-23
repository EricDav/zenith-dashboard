<?php
// var_dump($_SESSION); exit;

$banks = array(
    array('id' => '1','name' => 'Access Bank','code'=>'044'),
    array('id' => '2','name' => 'Citibank','code'=>'023'),
    array('id' => '3','name' => 'Diamond Bank','code'=>'063'),
    array('id' => '4','name' => 'Dynamic Standard Bank','code'=>''),
    array('id' => '5','name' => 'Ecobank Nigeria','code'=>'050'),
    array('id' => '6','name' => 'Fidelity Bank Nigeria','code'=>'070'),
    array('id' => '7','name' => 'First Bank of Nigeria','code'=>'011'),
    array('id' => '8','name' => 'First City Monument Bank','code'=>'214'),
    array('id' => '9','name' => 'Guaranty Trust Bank','code'=>'058'),
    array('id' => '10','name' => 'Heritage Bank Plc','code'=>'030'),
    array('id' => '11','name' => 'Jaiz Bank','code'=>'301'),
    array('id' => '12','name' => 'Keystone Bank Limited','code'=>'082'),
    array('id' => '13','name' => 'Providus Bank Plc','code'=>'101'),
    array('id' => '14','name' => 'Polaris Bank','code'=>'076'),
    array('id' => '15','name' => 'Stanbic IBTC Bank Nigeria Limited','code'=>'221'),
    array('id' => '16','name' => 'Standard Chartered Bank','code'=>'068'),
    array('id' => '17','name' => 'Sterling Bank','code'=>'232'),
    array('id' => '18','name' => 'Suntrust Bank Nigeria Limited','code'=>'100'),
    array('id' => '19','name' => 'Union Bank of Nigeria','code'=>'032'),
    array('id' => '20','name' => 'United Bank for Africa','code'=>'033'),
    array('id' => '21','name' => 'Unity Bank Plc','code'=>'215'),
    array('id' => '22','name' => 'Wema Bank','code'=>'035'),
    array('id' => '23','name' => 'Zenith Bank','code'=>'057')
  );
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
                    <h3>My Details <span></span></h3>
                </div>
                <div class="card-body">
                <div id="m-success" class="alert alert-success success-message" role="alert">
                        Your details updated successfully
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="input__label">First Name</label>
                                <input type="text" class="form-control input-style" id="dfirstName" placeholder="First name" value="<?=$_SESSION['userInfo']['first_name']?>">
                                <span class="error-message" id="dfirstname-error"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4" class="input__label">Last Name</label>
                                <input type="text" class="form-control input-style" id="dlastName" placeholder="Last name" value="<?=$_SESSION['userInfo']['last_name']?>">
                                <span class="error-message" id="dlastname-error"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="input__label">Email</label>
                                <input type="email" class="form-control input-style" id="demail" placeholder="Email" value="<?=$_SESSION['userInfo']['email']?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4" class="input__label">Phone Number</label>
                                <input type="text" class="form-control input-style" id="dphoneNumber" placeholder="Phone number" value="<?=$_SESSION['userInfo']['phone_number']?>">
                                <span class="error-message" id="dphoneNumber-error"></span>
                            </div>
                        </div>
                        <button id="update-details" type="submit" class="btn btn-primary btn-style mt-4">Update</button>
                    
                </div>
            </div>

            <div class="card card_border py-2 mb-4">
                <div class="cards__heading">
                    <h3>Next Of Kin <span></span></h3>
                </div>

                <div class="card-body">
                <div id="n-success" class="alert alert-success success-message" role="alert">
                        Next of kin details updated successfully
                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                                <label for="inputEmail4" class="input__label">First Name</label>
                                <input type="text" class="form-control input-style" id="kfirstName" placeholder="First name" value="<?=$_SESSION['nextOfKin']['first_name']?>">
                                <span class="error-message" id="kfirstname-error"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4" class="input__label">Last Name</label>
                                <input type="text" class="form-control input-style" id="klastName" placeholder="Last name" value="<?=$_SESSION['nextOfKin']['last_name']?>">
                                <span class="error-message" id="klastname-error"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="input__label">Email</label>
                                <input type="email" class="form-control input-style" id="kemail" placeholder="Email" value="<?=$_SESSION['nextOfKin']['email']?>">
                                <span class="error-message" id="kemail-error"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4" class="input__label">Phone Number</label>
                                <input type="text" class="form-control input-style" id="kphoneNumber" placeholder="Phone number" value="<?=$_SESSION['nextOfKin']['phone_number']?>">
                                <span class="error-message" id="kphoneNumber-error"></span>
                            </div>
                        </div>
                        <button id="update-next-of-kin" type="submit" class="btn btn-primary btn-style mt-4">Update</button>
                    </div>
            </div>

            <div class="card card_border py-2 mb-4">
                <div class="cards__heading">
                    <h3>Account Details<span></span></h3>
                </div>
                <div class="card-body">
                <div id="a-success" class="alert alert-success success-message" role="alert">
                        Account details updated successfully
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="input__label">Account Number</label>
                                <input type="number" class="form-control input-style" id="accountNumber" placeholder="Account number" value="<?=$_SESSION['accountDetails']['account_number']?>">
                                <span class="error-message" id="account-number-error"></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState" class="input__label">Bank Name</label>
                                <select id="bankName" class="form-control input-style">
                                    <option selected>Select bank</option>
                                    <?php foreach($banks as $bank): ?>
                                        <?php if ($_SESSION['accountDetails']['bank_name'] == $bank): ?>
                                            <option id="<?=$bank['code']?>" selected><?=$bank['name']?></option>
                                        <?php endif; ?>
                                        <?php if ($_SESSION['accountDetails']['bank_name'] != $bank): ?>
                                            <option id="<?=$bank['code']?>"><?=$bank['name']?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <span class="error-message" id="bank-name-error"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4" class="input__label">Account Name</label>
                                <input type="text" class="form-control input-style" id="accountName" placeholder="Account name" value="<?=$_SESSION['accountDetails']['account_name']?>">
                                <span class="error-message" id="account-name-error"></span>
                            </div>
                        </div>
                        <button id="update-account" type="submit" class="btn btn-primary btn-style mt-4">Update</button>
                </div>
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
  