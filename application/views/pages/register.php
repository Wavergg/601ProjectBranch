
<div id="app" class="m-md-5">
<div class="container">
    <span class="display-4">Register a new account</span>
    <hr>


    <?php if(sizeof($message)>0){
        echo '<ul>';
        foreach($message as $mess){
            echo '<p class="text-danger"> * ' . $mess . '</p>';
        }
        echo '</ul>';
    };?>
    <form action="<?php echo base_url()?>index.php/Register/newUser/" class="m-md-5" method="POST" @submit="checkForm">
        <h3 class="text-warning ml-0 my-3"> Log-in Information</h3>
        <div class="col-12 mb-5">
            <div class="row">
                <div class="col-md-4 p-0">
                    <label for="EmailID" class="font-weight-bold"><span class="text-danger">* </span>E-mail</label>
                    <input type="email" class="form-control" placeholder="Enter Email" name="Email" id="EmailID" @change="checkEmail" v-model="email"/>
                </div>
            </div>
            <div class="row mt-3" v-if="emailError.length">
                <p class="text-danger" v-text="emailError"></p>
            </div>
            <div class="row mt-3">
                <div class="col-md-4 px-1 p-0">
                    <label for="passwordID" class="font-weight-bold"><span class="text-danger">* </span>Password:</label>
                    <input type="password" placeholder="Enter Password" class="form-control" name="password"
                        id="passwordID" v-model="password">
                        <div class="">
                    <small class="text-muted">The length of the password should atleast be 6 characters</small>
                </div>
                </div>
                
            </div>
            <div class="row mt-3">
                <div class="col-md-4 px-1 p-0">
                    <label for="confirmPasswordID" class="font-weight-bold"><span class="text-danger">* </span>Confirm Password:</label>
                    <input type="password" placeholder="Re-Enter password" class="form-control" name="confirmPassword"
                        id="confirmpasswordID" v-model="confirmPasswd">
                </div>
            </div>
            <div class="row mt-3" v-if="passwdError.length">
                <p class="text-danger" v-text="passwdError"></p>
            </div>
            
        </div>
        <hr />
        <h3 class="text-warning ml-0 my-3"> Personal Information</h3>
        <div class="col-12">
            <div class="row">
                <div class="col-md-4 pr-md-3 p-0">
                    <label for="firstNameID" class="font-weight-bold"><span class="text-danger">* </span>First Name:</label>
                    <input type="text" class="form-control" placeholder="Enter firstName" @change="checkFirstName" v-model="firstName" name="firstName"
                        id="firstNameID" required />
                        <div class="mt-3" v-if="firstNameError.length">
                            <p class="text-danger" v-text="firstNameError"></p>
                        </div>
                </div>

                <div class="col-md-4 pl-md-3 pr-md-1 p-0">
                    <label for="lastNameID" class="font-weight-bold"><span class="text-danger">* </span>Last Name:</label>
                    <input type="text" placeholder="Enter lastName" class="form-control"  @change="checkLastName" v-model="lastName" name="lastName" id="lastNameID"
                        required>
                        <div class="mt-3" v-if="lastNameError.length">
                            <p class="text-danger" v-text="lastNameError"></p>
                        </div>
                </div>
                <div class="col-md-4 px-md-3 p-0">
                    <label for="DOBID" class="font-weight-bold"><span class="text-danger">* </span>Date of Birth:</label>
                    <input type="date" placeholder="YYYY-MM-DD" class="form-control" @change="checkDOB" v-model="DOB" name="DOB" id="DOBID" required>
                    <div class="mt-3" v-if="DOBError.length">
                            <p class="text-danger" v-text="DOBError"></p>
                    </div>
                </div>
            </div>
            <div class="row mt-md-3">
                <div class="col-md-4 pr-md-3 p-0 mt-2 mt-md-0">
                    <label for="AddressID" class="font-weight-bold"><span class="text-danger">* </span>Address and street number:</label>
                    <input type="text" placeholder="Enter Address" class="form-control" @change="checkAddress" v-model="address" name="Address" id="AddressID"
                        required />
                    <div class="mt-3" v-if="addressError.length">
                        <p class="text-danger" v-text="addressError"></p>
                    </div>
                </div>
                <div class="col-md-3 px-md-3 col-9 p-0 mt-2 mt-md-0 pr-2">
                    <label for="CityID" class="font-weight-bold"><span class="text-danger">* </span>City:</label>
                    <select class="form-control" type="text" name="City" id="CityID" required >
                    <option selected></option>
                    <?php foreach($cities as $city): ?>
                    <option value="<?php echo $city['CityName']; ?>"><?php echo $city['CityName']; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-1 pr-md-1 p-0 mt-2 mt-md-0 col-3">
                    <label for="ZipCodeID" class="font-weight-bold">ZipCode</label>
                    <input type="text" placeholder="ZIP" class="form-control" @change="checkZipcode" v-model="zipCode" name="ZipCode" id="ZipCodeID" />
                    <div class="mt-3" v-if="zipCodeError.length">
                        <p class="text-danger" v-text="zipCodeError"></p>
                    </div>
                </div>
                <div class="col-md-4 px-md-3 p-0 mt-2 mt-md-0">
                    <label for="SuburbID" class="font-weight-bold">Suburb:</label>
                    <input type="text" placeholder="Enter Suburb" @change="checkSuburb" class="form-control" v-model="suburb" name="Suburb" id="SuburbID" />
                    <div class="mt-3" v-if="suburbError.length">
                        <p class="text-danger" v-text="suburbError"></p>
                    </div>
                </div>
            </div>
            <div class="row mt-md-3">
                <div class="col-md-4 pr-md-3 p-0 mt-2 mt-md-0">
                    <label for="PhoneNumberID" class="font-weight-bold"><span class="text-danger">* </span>PhoneNumber:</label>
                    <input type="text" placeholder="Enter PhoneNumber" class="form-control" @change="checkPhoneNumber" v-model="phoneNumber" name="PhoneNumber"
                        id="PhoneNumberID" required />
                    <div class="mt-3" v-if="phoneNumberError.length">
                        <p class="text-danger" v-text="phoneNumberError"></p>
                    </div>
                </div>

                <div class="col-md-3 px-md-3 p-0 mt-2 mt-md-0 ">
                    <div class="row mx-1">

                        <label for="SexID" class="font-weight-bold">Sex:</label>

                    </div>
                    <div class="row">
                        <div class="col-4 col-md-6">
                            <input type="radio" name="gender"
                                <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"
                                checked>Female</div>
                        <div class="col">
                            <input type="radio" name="gender"
                                <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male</div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="submittedForm" value="TRUE" />
            <div class="row my-4 justify-content-md-start justify-content-center">
                <input type="submit" value="Register" class="btn btn-primary m-0 " :disabled="isButton">
            </div>

        </div>

    </form>
    
</div>
</div>


<!-- Vue -->
<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            emailError: "",
            firstName: "",
            firstNameError: "",
            lastName: "",
            lastNameError: "",
            DOB: "",
            DOBError: "",
            address: "",
            addressError: "",
            phoneNumber: "",
            phoneNumberError: "",
            suburb: "",
            suburbError: "",
            zipCode: "",
            zipCodeError: "",
            passwdError: "",
            confirmPasswd: "",
            password: "",
            email: "",
            emails: [
                <?php foreach($users as $user): ?>
                    "<?php echo $user['Email']; ?>",
                <?php endforeach; ?>
            ],
            isButton: true
        },
        methods: {
            checkForm: function(e){
                if(this.confirmPasswd == this.password){
                    if(this.password.length<6){
                        this.passwdError = "Password is too short"
                        e.preventDefault()
                    } else {
                        return true
                    }
                } else {
                    this.passwdError = "Password and their validation did not match"
                    e.preventDefault()
                }
            },
            checkEmail: function(){
                if(this.emails.includes(this.email)){
                    this.emailError = "this email already exists"
                    this.isButton = true
                } else {
                    if(!this.validEmail(this.email)){
                        this.emailError = "Invalid Email Address"
                        this.isButton = true
                    } else {
                    this.emailError = ""
                    this.isButton = false
                    }
                }
            },
            validEmail: function(email){
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email)
            },
            checkFirstName: function(){
                if(this.firstName.length>0){
                    var re = /^[a-zA-Z\.\'\-\"\, ]{2,}$/;
                    if(re.test(this.firstName)){
                        this.firstNameError = ""
                        this.isButton = false
                    } else {
                        this.firstNameError = "Invalid Name"
                        this.isButton = true
                    }
                } else { 
                    this.firstNameError = "Please fill the First Name input box"
                    this.isButton = true
                }
            },
            checkLastName: function(){
                if(this.lastName.length>0){
                    var re = /^[a-zA-Z\.\'\-\"\, ]{2,}$/;
                    if(re.test(this.lastName)){
                        this.lastNameError = ""
                        this.isButton = false
                    } else {
                        this.lastNameError = "Invalid Name"
                        this.isButton = true
                    }
                } else { 
                    this.lastNameError = "Please fill the Last Name input box"
                    this.isButton = true
                }
            },
            checkDOB: function(){
                if(this.DOB.length>0){
                    var re = /^[1|2]{1}(9[0-9][0-9]|0[0-9][0-9])-(0[0-9]|1[0|1|2])-(0[0-9]|1[0-9]|2[0-9]|3[0-1])$/;
                    var today = new Date();
                    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                    
                    if(re.test(this.DOB)){
                        if(new Date(this.DOB).getTime()< new Date(today).getTime()){
                            this.DOBError = ""
                            this.isButton = false
                        } else {
                            this.DOBError = "Invalid Date"
                            this.isButton = true
                        }
                    } else {
                        this.DOBError = "Invalid Date"
                        this.isButton = true
                    }
                } else { 
                    this.DOBError = "Invalid Date"
                    this.isButton = true
                }
            },
            checkAddress: function(){
                if(this.address.length>0){
                    var re = /^([a-zA-Z\.\,\'"&:/\- ]+[ ]?[#]?[0-9][a-zA-Z0-9 ]*|[#]?[ ]?[0-9]+[ ]?[a-zA-Z][ a-zA-Z0-9\.\,\'"&:/\-]*)$/;
                    if(re.test(this.address)){
                        this.addressError = ""
                        this.isButton = false
                    } else {
                        this.addressError = "Invalid address, contains unallowed special characters or it\'s incomplete"
                        this.isButton = true
                    }
                } else { 
                    this.addressError = "Please fill the Last address input box"
                    this.isButton = true
                }
            },
            checkZipcode: function(){
                var re = /^\d{4}$/;
                if(re.test(this.zipCode)){
                    this.zipCodeError = ""
                } else {
                    this.zipCodeError = "Invalid ZIP"
                }
            },
            checkSuburb: function(){
                var re = /^[a-zA-Z\s/\.\'\(\)&:\,\"\-]+$/
                if(re.test(this.suburb)){
                    this.suburbError = ""
                } else {
                    this.suburbError = "Invalid Suburb name"
                }
            },
            checkPhoneNumber: function(){
              var re = /^[\+]?\(?[\+]?[0-9]{1,4}\)?[\- \.]?\(?[0-9]{2,4}[\-\. ]?[0-9]{2,4}[\-\. ]?[0-9]{0,6}?\)?$/
                if(re.test(this.phoneNumber)){
                    this.phoneNumberError = ""
                } else {
                    this.phoneNumberError = "Invalid Phone Number"
                }
            }
        }
        
    })
</script>