
<div class="tab-pane fade <?php if($title!="Manage Staff"){ echo "show active";}?>" id="passwordSettings" role="tabpanel" aria-labelledby="passwordSettings-tab">

<?php if(!empty($errMess)){
        echo '<ul>';
        foreach($errMess as $mess){
            echo '<p class="text-danger"> * ' . $mess . '</p>';
        }
        echo '</ul>';
    };?>
    <div class="container justify-content-center rounded my-5">
        <form action="<?php echo base_url()?>index.php/Personcenter/updatePassword" class="m-md-5" method="POST" @submit="checkForm">
           <h3 style="color: darkslategray">Change My Password</h3>
           <div class="row justify-content-center mt-5">
               <div class="col-md-10">
                <div class="form-group row">
                    
                    <label for="staticEmail" class="col-md-3 col col-form-label"><b>Email</b></label>
                    <div class="col-md-9 col">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $userEmail ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="oldPassword" class="col-md-3 col-form-label"><b>Current Password</b></label>
                    <div class="col-md-9 p-md-0 ">
                    <input type="password" class="form-control"  id="oldPassword" placeholder="Enter Current Password" name="oldPassword" required/>
                   
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label for="newPassword" class="col-md-3 col-form-label"><b>New Password</b></label>
                    <div class="col-md-9 p-md-0 ">
                    <input type="password" class="form-control" v-model="newPassword" id="newPassword" placeholder="Enter New Password" name="newPassword" required/>
                    <small class="text-muted">The password should atleast be 6 characters in length</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="confirmNewPassword" class="col-md-3 col-form-label"><b>Re-Enter New Password</b></label>
                    <div class="col-md-9 p-md-0 ">
                    <input type="password" class="form-control" v-model="confirmNewPassword" id="confirmNewPassword" placeholder="Re-Type New Password" name="confirmPassword" required/>
                    </div>
                </div>
                <div class="offset-md-3" v-if="notMatchPasswordError.length">
                    <p class="text-danger" v-text="notMatchPasswordError"></p>
                </div>
                <div class="row">
                    <div class="col">
                    
                    </div>
                    <div class="justify-content-md-end">
                    <div class="mx-3 mb-3 m-md-0">
                        <input type="submit" value="Update Password" class="btn btn-dark"/>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </form>

        
    </div> <!--Container-->
</div>
