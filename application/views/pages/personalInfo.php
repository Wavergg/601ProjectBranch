<div id="app">
<div style="height: 50px;"></div>




<h2 class="text-center"><?php echo $title; ?></h2>
<hr />
    <?php if(!empty($errMess)){
        echo '<ul>';
        foreach($errMess as $mess){
            echo '<p class="text-danger"> * ' . $mess . '</p>';
        }
        echo '</ul>';
    };?>
    <div class="container justify-content-center rounded mt-5 mb-5">
        <form action="<?php echo base_url()?>index.php/PersonCenter/updatePassword" class="m-md-5" method="POST" @submit="checkForm">
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

        <form action="<?php echo base_url()?>index.php/PersonCenter/updateDetails" class="m-md-5" method="POST">
           <h3 style="color: darkslategray">Update Personal Details</h3>
           <div class="row justify-content-center mt-md-5">
               <div class="col-md-10">
               <div class="row">
                <div class="col-md-4 pr-md-3 p-md-0">
                    <label for="firstNameID" class="font-weight-bold">First Name:</label>
                    <input type="text" class="form-control" value="<?php echo $firstName?>" name="firstName"
                        id="firstNameID" required />
                </div>

                <div class="col-md-4 p-md-0">
                    <label for="lastNameID" class="font-weight-bold">Last Name:</label>
                    <input type="text" value="<?php echo $lastName ?>" class="form-control" name="lastName" id="lastNameID"
                        required>
                </div>
                <div class="col-md-4 px-md-3 p-md-0">
                    <label for="DOBID" class="font-weight-bold">Date of Birth:</label>
                    <input type="date" value="<?php echo $DOB ?>" class="form-control" name="DOB" id="DOBID" required>
                </div>
            </div>
            <div class="row mt-md-3">
                <div class="col-md-4 pr-md-3 p-md-0 mt-2 mt-md-0">
                    <label for="AddressID" class="font-weight-bold">Address and street number:</label>
                    <input type="text" value="<?php echo $address ?>" class="form-control" name="address" id="AddressID"
                        required />
                </div>
                <div class="col-md-3 pr-md-3 col-8 p-md-0 mt-2 mt-md-0 pr-2">
                    <label for="CityID" class="font-weight-bold">City:</label>
                    <select class="form-control" type="text" name="city" id="CityID" required >
                    <option selected><?php echo $city?></option>
                    <?php foreach($cities as $city): ?>
                        <option value="<?php echo $city['CityName']; ?>"><?php echo $city['CityName']; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-1  p-md-0 mt-2 mt-md-0 col-4">
                    <label for="ZipCodeID" class="font-weight-bold">ZipCode</label>
                    <input type="text" value="<?php echo $zipcode ?>" class="form-control" name="zip" id="ZipCodeID" />
                </div>
                <div class="col-md-4 px-md-3 p-md-0 mt-2 mt-md-0">
                    <label for="SuburbID" class="font-weight-bold">Suburb:</label>
                    <input type="text" value="<?php echo $suburb ?>" class="form-control" name="suburb" id="SuburbID" />
                </div>
            </div>
            <div class="row mt-md-3">
                <div class="col-md-4 pr-md-3 p-md-0 mt-2 mt-md-0">
                    <label for="PhoneNumberID" class="font-weight-bold">PhoneNumber:</label>
                    <input type="text" value="<?php echo $phoneNumber ?>" class="form-control" name="phoneNumber"
                        id="PhoneNumberID" required />
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                    <input type="submit" value="Update Details" class="btn btn-dark"/>
            </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php if(strlen($message)>0):?>
    <div class="mt-3 row offset-md-3" >
        <p class="text-danger"><?php echo "<script type='text/javascript'>alert('$message');</script>"; ?></p>
    </div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            notMatchPasswordError: "",
            confirmNewPassword: "",
            newPassword: ""
        },
        methods: {
            
            checkForm: function(e){
                if(this.confirmNewPassword == this.newPassword){
                    if(this.newPassword.length<6){
                        this.notMatchPasswordError = "The password is too short"
                        e.preventDefault()
                    } else {
                        this.notMatchPasswordError = ""
                    }
                   
                } else {
                    this.notMatchPasswordError = "New Password did not match"
                    e.preventDefault()
                }
                
            }
        }
        
    })
</script>

