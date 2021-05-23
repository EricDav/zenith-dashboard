<?php


?>

<nav aria-label="breadcrumb">
      <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?=$currentPage?></li>
      </ol>
    </nav>
    <div class="welcome-msg pt-3 pb-4">
      <h1>Hi <span class="text-primary"><?=$_SESSION['user']['name']?></span>, Welcome back</h1>
      <p>View your transaction details.</p>
    </div>
    
    