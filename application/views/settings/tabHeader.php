<div id="app">
<div style="height: 50px;"></div>



<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item this">
    <a class="text-dark nav-link <?php if($title!="Manage Staff"){echo "active";}?>" id="passwordSettings-tab" data-toggle="tab" href="#passwordSettings" role="tab" aria-controls="passwordSettings" aria-selected="<?php if($title!="Manage Staff"){echo "true";} else { echo "false";}?>">Update Password</a>
  </li>
  <?php if($_SESSION['userType']=='admin'):?>
  <li class="nav-item this">
    <a class="text-dark nav-link  <?php if($title=="Manage Staff"){echo "active";}?>" id="staffSettings-tab" data-toggle="tab" href="#staffSettings" role="tab" aria-controls="staffSettings" aria-selected="<?php if($title=="Manage Staff"){echo "true";} else { echo "false";}?>">Manage Staff</a>
  </li>
  <?php endif;?>
</ul>
<div class="tab-content" id="myTabContent">