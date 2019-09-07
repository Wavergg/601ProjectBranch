<!-- this is a pane for admin so far the only working things is manageStaff-->
<div class="this col-12 row pr-0 justify-content-around">
   
    <div class="card border border-dark col-md-3 p-0 m-0"  style="border-radius:0px;">

        <a href="<?php echo base_url()?>index.php/personcenter/personalInfo" style="color: black; text-decoration:none"><div class="container p-0 m-2 text-center customHover">
        <div class="row justify-content-center card-body p-1">
            <img style="width:140px;height:140px;"  src="<?php echo base_url()?>lib/images/settings.png">
        </div>
        <div class="card-title font-weight-bold py-3">Settings</div>
            <!-- <p class="card-text text-center p-3 m-2">Manage Staffs, Changing password and more.</p> -->
        </div> 
        </a>
    </div>
    
    <div class="card border border-dark col-md-3 p-0 m-0"  style="border-radius:0px;">

    <a href="<?php echo base_url()?>index.php/Jobs/manageClient" style="color: black; text-decoration:none"><div class="container p-0 m-2 text-center">
    <div class="row justify-content-center card-body p-1">
    <img style="width:140px;height:140px;"  src="<?php echo base_url()?>lib/images/Client.png">
    </div>
    <div class="card-title font-weight-bold py-3">Manage Clients</div>
    <!-- <p class="card-text text-center p-3 m-2">Look through the clients applications, publish and assign candidates.</p> -->

    </div> </a>
    </div>
    <div class="card border border-dark col-md-3 p-0 m-0"  style="border-radius:0px;">

    <a href="<?php echo base_url()?>index.php/candidateMission/manageCandidate/" style="color: black; text-decoration:none"><div class="container p-0 m-2 text-center">
        <div class="row justify-content-center card-body p-1">
        <img style="width:140px;height:140px;"  src="<?php echo base_url()?>lib/images/Candidates.png">
        </div>
        <div class="card-title font-weight-bold py-3">Manage Applicants</div>
        <!-- <p class="card-text text-center p-3 m-2">Look through the candidates applications and their detailed informations.</p> -->

    </div> </a>
    </div>
    <div class="card border border-dark col-md-3 p-0 m-0"  style="border-radius:0px;">
        <a href="<?php echo base_url()?>index.php/Archive" style="color: black; text-decoration:none"><div class="container p-0 m-2 text-center">
            <div class="row justify-content-center card-body p-1">
            <img style="width:140px;height:140px;"  src="<?php echo base_url()?>lib/images/Archive.png">
            </div>
            <div class="card-title font-weight-bold py-3">Archives</div>
            <!-- <p class="card-text text-center p-3 m-2">Take a look at the pasts archive for Job order details and applicants</p> -->

            </div> 
        </a>
    </div>
</div>