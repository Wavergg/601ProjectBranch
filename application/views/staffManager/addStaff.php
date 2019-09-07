
<div class="container mt-5" >
   
    <form action="<?php echo base_url() ?>index.php/Register/newStaff" method="post" @submit="checkDataForm($event,confirmPassword,password)">
    <div class="container justify-content-center">
    <div class="row">
       <div class="col-md-6">
            <div class="row mt-2">
                <label class="font-weight-bold" for="emailID"><small class="text-danger">*</small> Email: </label>
            </div>
            <div class="row">
            <input type="email" class="form-control col-md-11" id="emailID" name="email" required>
            </div>
            <div class="row mt-2">
                <label class="font-weight-bold" for="passwordID"><small class="text-danger">*</small> Password: </label>
            </div>
            <div class="row ">
            <input type="password" class="form-control col-md-11" v-model="password" id="passwordID" name="password" required>
            <small class="text-muted">The length of the password should atleast be 6 characters</small>
            </div>
            
            <div class="row mt-2">
                <label class="font-weight-bold" for="confirmPasswordID"><small class="text-danger">*</small> ConfirmPassword: </label>
            </div>
            <div class="row">
            <input type="password" class="form-control col-md-11" v-model="confirmPassword" id="confirmPasswordID" name="confirmPassword" required>
            </div>
        </div>
        <div class="col-md-6">
                <div class="row mt-2">
                    <label class="font-weight-bold" for="firstNameID">First Name: </label>
                </div>
                <div class="row">
                <input type="text" class="form-control " id="firstNameID" name="firstName" >
                </div>
                <div class="row mt-2">
                    <label class="font-weight-bold" for="lastNameID">Last Name: </label>
                </div>
                <div class="row ">
                    <input type="text" class="form-control" id="lastNameID" name="lastName">
                </div>
        </div>
    </div>
    <input type="hidden" name="submittedFormStaffing" value="TRUE" />
    <div v-if="passwordError.length" class="row">
    <span class="text-danger pl-0" v-text="passwordError"></span>
    </div>
    <div class="row mt-4">
    
    <input type="submit" class="btn btn-outline-dark" value="Register Staff"/>
    </div>
    </div>
    </form>
</div>


