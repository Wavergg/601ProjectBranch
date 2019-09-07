<div class="container my-5" id="app">

    <h2 class="text-warning ml-0 my-3">Applicant's Personal Information</h2>
    <hr />

    <div class="col-12">
        <h3 class="text-secondary mt-3"> Profession </h3>
        <hr />
        <div class="row">
                
            <div class="col-md-4">
                <label for="jobInterestID" class="font-weight-bold">Job interested in:</label>
                <input type="text" class="form-control" v-model="jobInterest" name="jobInterest" placeholder="interest" id="jobInterestID" />
            </div>
            <div class="col-md-4">
                <label for="jobTypeID" class="font-weight-bold">Job Type:</label>
                <select class="form-control p-2" type="text"  v-model="jobType" name="jobType" id="jobTypeID">
                    <option selected></option>
                    <option value="FullTime">Full Time</option>
                    <option value="PartTime">Part Time</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="font-weight-bold">Drop your CV here:</label>
                <input type="file" id="JobCVID" @change="checkJobCV" v-model="jobCV" name="jobCV">
                <div class="mt-3" v-if="jobCVError.length">
                    <p class="text-danger" v-text="jobCVError"></p>
                </div>
            </div>
        </div>
        <label for="candidateNotesID" class="mt-3 font-weight-bold">Notes for this candidate:</label>
        <textarea v-model="candidateNotes" class="form-control rounded" placeholder="Enter notes" rows="2" id="candidateNotesID"
            name="candidateNotes"></textarea>
        
        <h3 class="text-secondary mt-3"> Personal Details </h3>
        <hr />
        <div class="row justify-content-center">
            <div class="mt-4 col-md-4 ">
                    <div class="row justify-content-md-start justify-content-center">
   
                        <?php $setImgPreviewID = "imgPreview" ;?>
                        <img id="imgPreview" src="<?php echo base_url()?>lib/images/facebook.jpg" class="mx-md-2" style="width:275px;height:165px;">
                    
                    </div>
                    <div class="row justify-content-center ">
                    <input type="file" onchange="document.getElementById('<?php echo $setImgPreviewID ; ?>').src = window.URL.createObjectURL(this.files[0])" name="jobImage" class="offset-1 offset-md-0" required>
                    </div>
            </div>
        </div>
        <div class="row mt-3">

            <div class="col-lg-4 col-md-5 px-md-3 p-0">
                <label for="firstNameID" class="font-weight-bold"><span class="text-danger">* </span>First Name:</label>
                <input type="text" class="form-control" @change="checkFirstName" placeholder="Enter firstName" name="firstName" id="firstNameID"
                 v-model="firstName" />
                <div class="row mt-3 mx-3" v-if="firstNameError.length">
                    <p class="text-danger" v-text="firstNameError"></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 px-md-3 p-0">
                <label for="lastNameID" class="font-weight-bold"><span class="text-danger">* </span>Last Name:</label>
                <input type="text" placeholder="Enter lastName" @change="checkLastName" class="form-control" name="lastName" id="lastNameID"
                 v-model="lastName" />
                <div class="row mt-3 mx-3" v-if="lastNameError.length">
                    <p class="text-danger" v-text="lastNameError"></p>
                </div>
            </div>
        </div>
        <div class="row mt-md-3">
            <div class="col-lg-4 col-md-5 px-md-3 p-0 mt-2 mt-md-0">
                <label for="AddressID" class="font-weight-bold"><span class="text-danger">* </span>Address and street number:</label>
                <input type="text" placeholder="Enter Address" @change="checkAddress" class="form-control" name="Address" id="AddressID"
                 v-model="userAddress" />
                <div class="row mt-3 mx-3" v-if="addressError.length">
                    <p class="text-danger" v-text="addressError"></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 p-0 mt-2 mt-md-0 px-md-3">
                <label for="CityID" class="font-weight-bold"><span class="text-danger">* </span>City:</label>
                <select class="form-control" type="text" name="City" id="CityID" v-model="city" >
                    <option selected></option>
                    <?php foreach($cities as $city): ?>
                    <option value="<?php echo $city['CityName']; ?>"><?php echo $city['CityName']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="row mt-3 mx-3" v-if="cityError.length">
                    <p class="text-danger" v-text="cityError"></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-9 px-md-3 pl-0 pr-2 mt-lg-0 mt-md-2">
                <label for="SuburbID" class="font-weight-bold">Suburb:</label>
                <input type="text" placeholder="Enter Suburb" class="form-control" name="Suburb" id="SuburbID" v-model="suburb" />
            </div>
            <div class="col-lg-1 col-md-2 col-3 pr-md-3 p-0 mt-lg-0 mt-md-2 col-3">
                <label for="ZipCodeID" class="font-weight-bold">ZipCode</label>
                <input type="text" placeholder="ZIP" class="form-control" name="ZipCode" id="ZipCodeID" v-model="zipCode"/>
            </div>
            
        </div>
        <div class="row mt-md-3">
            <div class="col-lg-4 col-md-5 px-md-3 p-0 mt-2">
                <label for="PhoneNumberID" class="font-weight-bold">Phone Number:</label>
                <input type="text" placeholder="Enter PhoneNumber" @change="checkPhoneNumber" class="form-control" name="PhoneNumber"
                    id="PhoneNumberID" v-model="phoneNumber"/>
                <div class="row mt-3 mx-3" v-if="phoneNumberError.length">
                    <p class="text-danger" v-text="phoneNumberError"></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 mt-2 px-md-3 p-0">
                <label for="emailID" class="font-weight-bold"><span class="text-danger">* </span>Email:</label>
                <input type="email" class="form-control" placeholder="Enter email" @change="checkEmail" name="email" id="emailID" v-model="userEmail"/>
                <div class="row mt-3 mx-3" v-if="emailError.length">
                    <p class="text-danger" v-text="emailError"></p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-5 mt-2 px-md-3 p-0">
                    <label for="DOBID" class="font-weight-bold"><span class="text-danger"></span>Date of Birth:</label>
                    <input type="date" placeholder="YYYY-MM-DD" class="form-control" v-model="DOB" name="DOB" id="DOBID">
                    
                </div>
                <div class="col-md-4  p-0 mt-2 mt-md-3 px-md-3 px-3">
                <div class="row mx-md-1 mx-lg-0">
                    <label for="SexID" class="font-weight-bold">Sex:</label>
                </div>
                <div class="row">
                    <div class="col-4 col-md-6 col-lg-5">
                        <input type="radio" name="gender"
                            <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"
                            checked v-model="gender"> Female</div>
                    <div class="col">
                        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>
                            value="male" v-model="gender"> Male</div>
                </div>
            </div>
        </div>
            

    
    
    <h3 class="text-secondary mt-3"> Transportation </h3>
    <hr class="border border-muted"/>
    <div class="row">
        <div class="col-md-4">
            <label for="transportationID" class="font-weight-bold">Transportation to work:</label>
            <input type="text" class="form-control" v-model="transportation" name="transportation" placeholder="Transportation to work"
                id="transportationID">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="licenseNumberID" class="font-weight-bold mt-2">NZ License Number:</label>
            <input type="text" class="form-control" v-model="licenseNumber" name="LicenseNumber" placeholder="NZ License Number"
                id="licenseNumberID">
        </div>
        <div class="col-md-4">
            <label for="classLicenseID" class="font-weight-bold mt-2">Class of license:</label>
            <select class="form-control" id="classLicenseID" v-model="classLicense" name="classLicense" >
                <option value="" selected></option>
                <option value="Class1 Learner">Class 1 - Car license (Learner or Restricted) </option>
                <option value="Class1 Restricted">Class 1 - Car license (Restricted) </option>
                <option value="Class1 Full">Class 1 - Car license (Full) </option>
                <option value="Class2 MediumRigidVehicleLearner">Class 2 - Medium rigid vehicle (Learner or Restricted) </option>
                <option value="Class2 MediumRigidVehicleFull">Class 2 - Medium rigid vehicle (Full) </option>
                <option value="Class3 MediumCombination">Class 3 - Medium combination (Learner or Full) </option>
                <option value="Class4 HeavyRigid">Class 4 - Heavy rigid (Learner or Full) </option>
                <option value="Class5 HeavyCombination">Class 5 - Heavy combination (Learner or Full) </option>
                <option value="Class6 Motorcycle">Class 6 - Motorcycle license </option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="endorsementID" class="font-weight-bold mt-2">Endorsements:</label>
            <input type="text" class="form-control" v-model="endorsement" placeholder="Endorsement" name="endorsement" id="endorsementID">
        </div>
    </div>
    <h3 class="text-secondary mt-3">Citizenship</h3>
    <hr />
    <div class="row">

        <div class="col-md-3">
            <label for="citizenshipID" class="font-weight-bold"> Citizenship:</label>
            <select class="form-control" id="citizenshipID" v-model="citizenship" name="citizenship">
                <option value="" selected></option>
                <?php foreach($citizenships as $citizenship): ?>
                <option value="<?php echo $citizenship['Citizenship']; ?>"><?php echo $citizenship['Citizenship']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-3  mt-2  mt-md-0 ">
            <label for="nationalityID" class="font-weight-bold"> Nationality:</label>
            <input type="text" class="form-control" v-model="nationality" placeholder="Enter Nationality" name="nationality"
                id="nationalityID" />
        </div>
        <div class="col-md-3  mt-2  mt-md-0">
            <label for="passportCountryID" class="font-weight-bold">Passport issuing country:</label>
            <input type="text" class="form-control" v-model="passportCountry" placeholder="Passport Issuing Country" name="passportCountry"
                id="passportCountryID" />

        </div>
        <div class="col-md-3 mt-2  mt-md-0">
            <label for="passportNumberID" class="font-weight-bold">Passport Number:</label>
            <input type="text" class="form-control" v-model="passportNumber" placeholder="Passport Number" name="passportNumber"
                id="passportNumberID" />
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4">
            <label for="workPermitNumberID" class="font-weight-bold">Work permit number:</label>
            <input type="text" class="form-control" v-model="workPermitNumber" placeholder="Work Permit Number" name="workPermitNumber"
                id="workPermitNumberID" />
        </div>
        <div class="col-md-4 mt-2 mt-md-0">
            <label for="workPermitExpiryID" class="font-weight-bold">Work permit expiry date:</label>
            <input type="date" class="form-control" v-model="workPermitExpiry" placeholder="Work Permit Expiry Date" name="workPermitExpiry"
                id="workPermitExpiryID" />
        </div>
    </div>
    <h3 class="text-secondary mt-3">Health</h3>
    <hr />
    <small>Check the box if you have these conditions<br></small>
    <div class="container p-0 m-0">
        <div class="row">
            <div class="col-md-9">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <input type="checkbox" class="form-check-inline" v-model="asthma" name="asthma">Asthma
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" class="form-check-inline" v-model="blackOut" name="blackOut">BlackOut / Seizures
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" class="form-check-inline" v-model="diabetes" name="diabetes">Diabetes
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <input type="checkbox" class="form-check-inline" v-model="bronchitis" name="bronchitis">Bronchitis
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" class="form-check-inline" v-model="backInjury" name="backInjury">Back Injury / strain

                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" class="form-check-inline" v-model="deafness" name="deafness">Deafness
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <input type="checkbox" class="form-check-inline" v-model="dermatitis" name="dermatitis">Dermatitis/Eczema
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" class="form-check-inline" v-model="skinInfection" name="skinInfection">Skin infection
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" class="form-check-inline" v-model="allergies" name="allergies">Allergies
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <input type="checkbox" class="form-check-inline" v-model="hernia" name="hernia">Hernia
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" class="form-check-inline" v-model="highBloodPressure" name="highBloodPressure">High blood
                        pressure
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" class="form-check-inline" v-model="heartProblems" name="heartProblems">Heart Problems
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <input type="checkbox" class="form-check-inline" v-model="usingDrugs" name="usingDrugs">taking Drugs / Medicine

                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" class="form-check-inline" v-model="usingContactLenses" name="usingContactLenses">Wearing contact
                        lenses/ glasses

                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" class="form-check-inline" v-model="RSI" name="RSI">Occupational Overuse Syndrome /
                        R.S.I

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row mt-3 mt-md-0">
                    <label for="compensationInjuryID" class="font-weight-bold mx-3">Compensation of any injury by
                        ACC</label>
                    <select class="form-control p-2 mx-3 mx-md-0" type="text" v-model="compensationInjury" name="compensationInjury"
                        id="compensationInjuryID">
                        <option selected>-</option>
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                </div>
                <div class="row mt-2">
                    <label for="compensationDateFromID" class="font-weight-bold mx-3">Dates From</label>
                    <input type="date" v-model="compensationDateFrom" name="compensationDateFrom" id="compensationDateFromID" class="form-control mx-3 mx-md-0">


                    <label for="compensationDateToID" class="font-weight-bold mt-2 mx-3">Dates To</label>
                    <input type="date" v-model="compensationDateTo" name="compensationDateTo" id="compensationDateToID" class="form-control mx-3 mx-md-0">

                </div>
            </div>
        </div>
    </div>
    <h3 class="text-secondary mt-3">Other Details</h3>
    <hr />
    <div class="container">
        <input type="checkbox" class="form-check-inline" v-model="dependants" name="dependants"> Having dependants <br>

        <input type="checkbox" class="form-check-inline" v-model="smoke" name="smoke"> Do you smoke?<br>

        <input type="checkbox" class="form-check-inline" v-model="conviction" name="conviction"> Having conviction against the law?<br>
        <label for="convictionDetailsID" class="mt-3">Details if <b>"yes"</b> </label>
        <textarea class="form-control rounded-0" id="convictionDetailsID" rows="2"
        v-model="convictionDetails"  name="convictionDetails"></textarea>

    </div>
    <div class="mt-3 mx-3" v-if="emptyRequiredError.length">
            <p class="text-danger" v-text="emptyRequiredError"></p>
    </div>
    <div class="row justify-content-center mt-3">
        <button @click="newCandidate" class="btn btn-warning font-weight-bold col-md-4 col-lg-3 col-9" :disabled="isButton">Register New Candidate</button>
        
    </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ message }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal END -->

</div> <!-- app -->


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>

<script>
var app = new Vue ({
    el: '#app',
    data: {
        message: "",
        // User
        firstName: "",
        firstNameError: "",
        lastName: "",
        lastNameError: "",
        userAddress: "",
        addressError: "",
        
        city: "",
        DOB: "",
        cityError: "",
        zipCode: "",
        suburb: "",
        phoneNumber: "",
        phoneNumberError: "",
        userEmail: "",
        emailError: "",
        gender: "",
        isButton: false,
        emptyRequiredError: "",

        // condidate
        jobInterest : "",
        jobType : "",
        jobCV: "",
        jobCVError: "",
        candidateNotes: "",
        transportation : "",
        licenseNumber : "",
        classLicense : "",
        endorsement : "",
        citizenship : "",
        nationality : "",
        passportCountry : "",
        passportNumber : "",
        workPermitNumber: "",
        workPermitExpiry: "",
        compensationInjury : "",
        compensationDateFrom : "",
        compensationDateTo : "",
        asthma : false,
        blackOut : false,
        diabetes : false,
        bronchitis : false,
        backInjury : false,
        deafness : false,
        dermatitis : false,
        skinInfection : false,
        allergies : false,
        hernia : false,
        highBloodPressure : false,
        heartProblems : false,
        usingDrugs : false,
        usingContactLenses : false,
        RSI : false,
        dependants : false,
        smoke : false,
        conviction : false,
        convictionDetails : "",
        
    },
    methods: {
        newCandidate: function(){
            if(this.firstName == "" || this.lastName == "" || this.userAddress == "" || this.city == "" || this.userEmail == "")
            {
                if(this.firstName.length === 0){
                    this.firstNameError = "Plase fill the First Name"
                }
                if(this.lastName.length === 0){
                    this.lastNameError = "Plase fill the Last Name"
                }
                if(this.userAddress.length === 0){
                    this.addressError = "Plase fill the Address"
                }
                if(this.city.length === 0){
                    this.cityError = "Plase fill the City"
                }
                if(this.userEmail.length === 0){
                    this.emailError = "Plase fill the user Email"
                }
                this.emptyRequiredError = "Please Fill the required field"
            } else {
            // Add a user
            this.emptyRequiredError = ""
            var formData = new FormData()
            formData.append('firstName', this.firstName);
            formData.append('lastName', this.lastName);
            formData.append('userAddress', this.userAddress);
            formData.append('city', this.city);
            formData.append('zipCode', this.zipCode);
            formData.append('suburb', this.suburb);
            formData.append('phoneNumber', this.phoneNumber);
            formData.append('userEmail', this.userEmail);
            formData.append('gender', this.gender);
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/CandidateMission/addUserByStaff/'
            this.$http.post(urllink, formData).then(res => {
                var result = res.body
                
            }, res => {
                // error callback
                this.message="Cannot add a user, please try it later.";
                $('#myModal').modal('show');
            });

            // Add a candidate
            var formData = new FormData()
            // firstName and lastName for getting the user ID
            formData.append('firstName', this.firstName);
            formData.append('lastName', this.lastName);
            // one more thing is candidateNotes
            formData.append('candidateNotes', this.candidateNotes);
            // Below are the same as apply job form
            formData.append('JobInterest', this.jobInterest);
            formData.append('JobType', this.jobType);
            formData.append('Transportation', this.transportation);
            formData.append('LicenseNumber', this.licenseNumber);
            formData.append('ClassLicense', this.classLicense);
            formData.append('Endorsement', this.endorsement);
            formData.append('Citizenship', this.citizenship);
            formData.append('Nationality', this.nationality);
            formData.append('PassportCountry', this.passportCountry);
            formData.append('PassportNumber', this.passportNumber);
            formData.append('WorkPermitExpiry', this.workPermitExpiry);
            formData.append('WorkPermitNumber', this.workPermitNumber);
            formData.append('CompensationInjury', this.compensationInjury);
            formData.append('CompensationDateFrom', this.compensationDateFrom);
            formData.append('CompensationDateTo', this.compensationDateTo);
            formData.append('Asthma', this.asthma);
            formData.append('BlackOut', this.blackOut);
            formData.append('Diabetes', this.diabetes);
            formData.append('Bronchitis', this.bronchitis);
            formData.append('BackInjury', this.backInjury);
            formData.append('Deafness', this.deafness);
            formData.append('Dermatitis', this.dermatitis);
            formData.append('SkinInfection', this.skinInfection);
            formData.append('Allergies', this.allergies);
            formData.append('Hernia', this.hernia);
            formData.append('HighBloodPressure', this.highBloodPressure);
            formData.append('HeartProblems', this.heartProblems);
            formData.append('UsingDrugs', this.usingDrugs);
            formData.append('UsingContactLenses', this.usingContactLenses);
            formData.append('RSI', this.RSI);
            formData.append('Dependants', this.dependants);
            formData.append('Smoke', this.smoke);
            formData.append('Conviction', this.conviction);
            formData.append('ConvictionDetails', this.convictionDetails);
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/CandidateMission/applyJob/'
            this.$http.post(urllink, formData).then(res => {
                var result = res.body;
            }, res => {
                // error callback
                this.message=this.message + " Submission is failed, please try again.";
                $('#myModal').modal('show');
            }
            );
            
            // upload CV
            var candidateCV = document.getElementById("JobCVID");
            if(candidateCV.files.length > 0){
                var candidateCV = document.getElementById("JobCVID");
                
                var formData = new FormData()
                // firstName and lastName for getting the user ID
                formData.append('firstName', this.firstName);
                formData.append('lastName', this.lastName);
                formData.append('JobCV', candidateCV.files[0]);
                var urllink = "<?php echo base_Url(); ?>" + 'index.php/CandidateMission/uploadCV/'
                this.$http.post(urllink, formData).then(res => {
                    var result = res.body
                    this.message=result;
                    $('#myModal').modal('show');
                    
                }, res => {
                    // error callback
                    this.message="CV upload was failed, please try again.";
                    $('#myModal').modal('show');
                })
            } else {
                this.message="Success, no job CV attached";
                $('#myModal').modal('show');
            }
        } 

        },checkJobCV: function(){
            if(this.jobCV.length>0){
                if(this.jobCV.indexOf(".")>-1){
                    var res = this.jobCV.split(".");
                    //pdf|png|doc|docx
                    if(res[res.length-1].toLowerCase()=="pdf" || res[res.length-1].toLowerCase()=="png" ||
                    res[res.length-1].toLowerCase()=="doc" || res[res.length-1].toLowerCase()=="docx" ){
                        this.isButton=false;
                        this.jobCVError="";
                    } else {this.isButton = true; this.jobCVError="Invalid file format, only accepts pdf,doc,png or docx"}
                } else {
                    this.isButton = true;
                    this.jobCVError = "Invalid File Format"
                }
            }
        },
        checkEmail: function(){
                
                    if(!this.validEmail(this.userEmail)){
                        this.emailError = "Invalid Email Address"
                        this.isButton = true
                    } else {
                    this.emailError = ""
                    this.isButton = false
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
            checkAddress: function(){
                if(this.userAddress.length>0){
                    var re = /^([a-zA-Z\.\,\'"&:/\- ]+[ ]?[#]?[0-9][a-zA-Z0-9 ]*|[#]?[ ]?[0-9]+[ ]?[a-zA-Z][ a-zA-Z0-9\.\,\'"&:/\-]*)$/;
                    if(re.test(this.userAddress)){
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
            checkPhoneNumber: function(){
              var re = /^[\+]?\(?[\+]?[0-9]{1,4}\)?[\- \.]?\(?[0-9]{2,4}[\-\. ]?[0-9]{2,4}[\-\. ]?[0-9]{0,6}?\)?$/
                if(re.test(this.phoneNumber)){
                    this.phoneNumberError = ""
                } else {
                    this.phoneNumberError = "Invalid Phone Number"
                }
            }
    }
});
</script>