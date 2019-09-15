<div class="tab-pane fade <?php if($title=="Manage Staff"){ echo "show active";}?>" id="staffSettings" role="tabpanel" aria-labelledby="staffSettings-tab">
<div class="container mb-5 p-md-5">
<?php if($userType == 'admin'):?>
    <div class="container">
    <h3 style="color: darkslategray">Manage My Staffs</h3>
        <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active text-dark font-weight-bold" id="addStaff-tab" @click="clearErrMess" data-toggle="tab" href="#addStaff" role="tab" aria-controls="addStaff" aria-selected="true"> Add Staff<i class="ml-1 icon ion-md-add-circle-outline text-success"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark font-weight-bold" id="changeStaffPassword-tab" @click="clearErrMess" data-toggle="tab" href="#changeStaffPassword" role="tab" aria-controls="changeStaffPassword" aria-selected="false">Change staff's password<i class="ml-1 icon ion-md-refresh text-info"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark font-weight-bold" id="removeStaff-tab" data-toggle="tab" href="#removeStaff" role="tab" aria-controls="removeStaff" aria-selected="false">Remove Staff<i class="ml-1 icon ion-md-remove-circle-outline text-danger"></i></a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="addStaff" role="tabpanel" aria-labelledby="addStaff-tab">
        <?php 
        $this->load->view('staffManager/addStaff',$staffs) ;?>
        
        </div>
        <div class="tab-pane fade" id="changeStaffPassword" role="tabpanel" aria-labelledby="changeStaffPassword-tab">
        <?php
        $this->load->view('staffManager/changeStaffPassword'); ?>
        </div>
        <div class="tab-pane fade" id="removeStaff" role="tabpanel" aria-labelledby="removeStaff-tab">
        <?php 
        $this->load->view('staffManager/removeStaff'); ?>
        
        </div>
        </div>
        

    </div>
    <div style="overflow:auto">
      <table class="table mt-5 table-hover" >
        <thead>
          <tr>
            <th scope="col">
            <a style="color:black" href="#" @click.stop.prevent="sortBy('id')">User ID<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>
            <th scope="col"><a style="color:black" href="#" @click.stop.prevent="sortBy('email')">Email<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>
            <th scope="col"><a style="color:black" href="#" @click.stop.prevent="sortBy('firstName')">FirstName<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>
            <th scope="col"><a style="color:black" href="#" @click.stop.prevent="sortBy('lastName')">LastName<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>
            <th scope="col"><a style="color:black" href="#" @click.stop.prevent="sortBy('city')">City<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>
            <th scope="col"><a style="color:black" href="#" @click.stop.prevent="sortBy('address')">Address<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>
            <th scope="col"><a style="color:black" href="#" @click.stop.prevent="sortBy('phoneNumber')">PhoneNumber<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>
          </tr>
        </thead>
        <tbody >  
          <tr v-for="staff in staffs" :key="staff.id">
            <th  v-text="staff.id"></th>
            <td v-text="staff.email"></td>
            <td v-text="staff.firstName"></td>
            <td v-text="staff.lastName"></td>
            <td v-text="staff.city"></td>
            <td v-text="staff.address"></td>
            <td v-text="staff.phoneNumber"></td>
          </tr>
        </tbody>
      </table>
    </div>
        
    <?php endif; ?>


</div>
</div>
</div>
    
