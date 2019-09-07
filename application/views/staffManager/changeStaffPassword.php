<div class="container mt-5">
    <form action="<?php echo base_url()?>index.php/Personcenter/newStaffPassword" method="post" @submit="checkDataForm($event,confirmPassword,password)">
        <div class="container justify-content-center">
            <div class="row mt-2">
                <label class="font-weight-bold" for="staff">Staff ID: </label>
            </div>
            <div class="row">
            <input type="text" class="form-control col-md-5" id="staff" name="staffID" required>
            </div>
            <div class="row mt-2">
                <label class="font-weight-bold" for="newPasswordID">New Password: </label>
            </div>
            <div class="row">
            <input type="password" v-model="password" class="form-control col-md-5" id="newPasswordID" name="newPassword" required>
            
            </div>
            <div class="row">
                <small class="text-muted">The length of the password should atleast be 6 characters</small>
            </div>
            <div class="row mt-2">
                <label class="font-weight-bold" for="confirmNewPasswordID">ConfirmPassword: </label>
            </div>
            <div class="row">
            <input type="password" class="form-control col-md-5" v-model="confirmPassword" id="confirmNewPasswordID" name="confirmNewPassword" required>
            </div>
            <div v-if="passwordError.length" class="row">
                <span class="text-danger pl-0" v-text="passwordError"></span>
            </div>
            <div class="row mt-4">
            <input type="submit" class="btn btn-info" value="Update Staff's Password"/>
            </div>
        </div>
    </form>
</div>