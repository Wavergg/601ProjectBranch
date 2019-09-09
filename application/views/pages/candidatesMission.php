<div class="container mb-5" id="app">
    <div class="row">
        <div class="nav flex-column nav-pills mt-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="text-dark nav-link customPane border-top border-dark <?php echo $active1 ?>"
                style="border-radius:0px;" id="v-pills-cmission-tab" data-toggle="pill" href="#v-pills-cmission"
                role="tab" aria-controls="v-pills-cmission" aria-selected="">Our Mission</a>

            <a class="text-dark nav-link customPane border-top border-bottom border-dark <?php echo $active2 ?>"
                style="border-radius:0px;" id="v-pills-submitApplication-tab" data-toggle="pill"
                href="#v-pills-submitApplication" role="tab" aria-controls="v-pills-submitApplication"
                aria-selected="">Submit Application</a>
        </div>
        <div class="col tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show <?php echo $active1?>" id="v-pills-cmission" role="tabpanel"
                aria-labelledby="v-pills-cmission-tab">

                <div class="container m-md-5">
                    <span class="display-4">Job Seekers</span>
                    <hr>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-8">

                                <p>
                                    We will endeavour to find you the job you want, not push you towards the first
                                    available vacancy.</p>
                                <p>
                                    We will search for a role to suit your skills, experience, and ambition.

                                    Maximise your chance of success! We can help with interview tips, CV advise,
                                    presentation. We offer general help and suggestions on getting through the
                                    employment process. Talk to us about where the opportunities are, and where they are
                                    not!
                                </p>



                                <h3 class="text-warning font-weight-bold ">Tradespeople </h3>
                                <ul class="mt-2">
                                    <li> Looking for a change?</li>
                                    <li> Looking to relocate?</li>
                                    <li> Looking to change direction? Perhaps use your existing skills to cross over to
                                        another industry?</li>
                                </ul>
                            </div>
                            <div class="col-md-4 p-0">
                                <a href="https://www.facebook.com/LeeRecruitment" class="text-justify text-dark">
                                    <img src="<?php echo base_url()?>lib/images/facebook.jpg" alt="ourFacebookPage">
                                    Follow us on facebook and be reminded
                                    each time a new job is posted.</a>
                            </div>
                        </div>


                    </div>
                    <div class="mt-2">
                        <p>
                            At Lee Recruitment we specialise in working with tradespeople. Have a confidential
                            talk to us about who you are and where you want to go.
                            We will discuss with you the various options to suit your goals and ambitions. </p>

                        <p>
                            You are in control of the process and we will only
                            proceed with what you are comfortable doing.
                        </p>
                    </div>

                    <div class="text-center">
                        <a href="<?php base_url()?>CandidateMission/index/active/">
                            <input type="button" class="btn btn-warning" value="Submit your application" />
                        </a>
                    </div>
                </div>
                <!--end of container-->
            </div>
            <!--endOfPane-->
            <!-- startOfPane SubmitApp -->
            <div class="tab-pane fade show <?php echo $active2?>" id="v-pills-submitApplication" role="tabpanel"
                aria-labelledby="v-pills-submitApplication-tab">
                <div class="container m-md-0">
                    <br>
                    <span class="display-4 ">Registration Form</span>
                    <hr>
                    <!-- CheckSession User == "" -->
                    <?php 
                        if ($userType=='staff' || $userType == 'admin'){
                            redirect('CandidateMission/addingNewCandidateStaffOnly');
                        } else {
                            $this->load->view('pages/candidateApplicationForm');
                        }
                   ?>
                </div>
            </div>
            <!--endOfPane-->
        </div>
    </div>
    <!-- A Modal -->
    <div class="modal" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ messages }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <!-- A Modal End -->
</div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>

<script>
var app = new Vue({
    el: '#app',
    data: {
        messages: "",
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
        jobInterest : "",
        jobType : "",
        jobCV: "",
        jobCVError: "",
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
        emptyRequiredError: "",
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
        confirm: false,
        isButton: false,
        isGood: true,
    },
    methods: {
        submitJob: function(){
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
                    this.emailError = "Plase fill the Email"
                }
                this.emptyRequiredError = "Please Fill the required field"
            } else {
            // insert data to database
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

            var formData = new FormData()
            formData.append('firstName', this.firstName);
            formData.append('lastName', this.lastName);
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
                var result = res.body
                
                
            }, res => {
                // error callback
                this.messages="Submition was failed, please try it later.";
                $('#myModal').modal('show');
            })

            // upload the cv
            var candidateCV = document.getElementById("JobCVID");
            
            var formData = new FormData()
            formData.append('firstName', this.firstName);
            formData.append('lastName', this.lastName);
            formData.append('JobCV', candidateCV.files[0]);
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/CandidateMission/uploadCV/'
            this.$http.post(urllink, formData).then(res => {
                var result = res.body
                this.messages="Job was applied successfully.";
                $('#myModal').modal('show');
                
            }, res => {
                // error callback
                this.messages="CV upload was failed, please try it later.";
                $('#myModal').modal('show');
            })
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
        }, allGood: function(){
            if(!this.confirm || this.isButton){
                return true;
            } else {
                return false;
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
            checkCity: function(){
                if(this.city.length>0){
                    this.cityError = "";
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