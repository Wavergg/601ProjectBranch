<div id="app">
<?php if(!empty($job)):?>
<div class="form-control bg-success text-center text-white font-weight-bold rounded-0" style="position:fixed; top:0px; z-index:1;opacity:0.9">
    Assigning candidate to <?php echo $job['JobTitle'] . ' in ' . $job['City'];?>
</div>

<a href="<?php echo base_url();?>index.php/Jobs/assignCandidate/<?php echo $candidate['CandidateID'];?>/<?php echo $job['JobID'];?>">
<button type="button" style="position:fixed;right: 20px; bottom:20px;z-index:1" class=" btn-lg border-white">
    <span>Assign this candidate</span>
    <i style="font-size:30px;" class="icon ion-md-contacts m-1 text-dark"></i>
</button></a>

<?php endif;?>


<button type="button" @click="editButton()" style="position:fixed;right: 20px; bottom:180px;z-index:1" class=" btn-lg btn-info">
    <i style="font-size:30px;" class="icon ion-md-create m-1"></i>
</button>
<button type="button" @click="submitButton(<?php echo $candidate['CandidateID'];?>,<?php echo $candidate['UserID'];?>)" style="position:fixed;right: 20px; bottom:100px;z-index:1" class=" btn-lg btn-success">
    <i style="font-size:30px;" class="icon ion-md-save m-1"></i>
</button>

<div id="app" class="container mt-5">
        <h1 class="text-dark mt-3 text-center"> Applicant's Personal Information </h3>
        <hr />
        <ul class="nav nav-tabs" id="myTab" role="tablist">

<li class="nav-item">
    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="attachment-tab" data-toggle="tab" href="#attachment" role="tab" aria-controls="attachment" aria-selected="false">Attachment</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade  show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <h3 class="text-warning mt-3"> Interest </h3>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <label for="jobInterestID" class="font-weight-bold mt-2">Profession:</label>
                <input type="text" v-model="jobInterest" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="jobInterestID" >
            </div>
            <div class="col-md-4">
                <label for="jobTypeID" class="font-weight-bold mt-2">Job Type:</label>
                <input type="text" v-model="jobType" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="jobTypeID" >
            </div>
        </div>
        <div class="row">
        <div class="col-md-9">
        <label for="candidateNotesID" class="mt-3 font-weight-bold">Comments:</label>
        <textarea readonly class="form-control rounded" v-model="notes"  rows="2" id="candidateNotesID"
            name="candidateNotes">
        </textarea>
        </div>  
        </div>
        <h3 class="text-warning mt-3"> Personal Details </h3>
        <hr>
        <div class="row">
        <div class="col-8">
        <div class="row">
            <div class="col-md-6">
                <label for="firstNameID" class="font-weight-bold mt-2">Applicant First Name:</label>
                <input type="text" v-model="firstName" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="firstNameID">
            </div>
            <div class="col-md-6">
                <label for="lastNameID" class="font-weight-bold mt-2">Applicant Last Name:</label>
                <input type="text" v-model="lastName" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="lastNameID" >
            </div>
            <!-- <div class="col-md-4">
                <div class="row ml-1"><label for="candidateCVID" class="font-weight-bold mt-2">Candidate's CV:</label></div>
                <div class="row ml-1"><a href="<?php echo base_url()?>index.php/CandidateMission/downloadCV/<?php echo $candidate['JobCV'];?>" id="candidateCVID" class="btn btn-primary">CandidateCV</a> </div>   
            </div> -->
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label for="phoneNumberID" class="font-weight-bold mt-2">Phone Number:</label>
                <input type="text" v-model="phoneNumber" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="phoneNumberID">
            </div>
            <div class="col-md-6">
                <label for="EmailID" class="font-weight-bold mt-2">Email:</label>
                <input type="text" v-model="email" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="EmailID" >
            </div>
            
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="GenderID" class="font-weight-bold mt-2">Gender:</label>
                <input type="text" v-model="gender" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="GenderID" >
            </div>
            <div class="col-md-6">
                <label for="DOBID" class="font-weight-bold mt-2">Date Of Birth:</label>
                <input type="text" v-model="DOB" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="DOBID" >
            </div>
        </div>
        </div>
        <div class="row">
        </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-2">
                <label for="citizenshipID" class="font-weight-bold mt-2">Citizenship:</label>
                <input type="text" v-model="citizenship" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="citizenshipID" >
            </div>
            <div class="col-md-2">
                <label for="nationalityID" class="font-weight-bold mt-2">Nationality:</label>
                <input type="text" v-model="nationality" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="nationalityID" >
            </div>
            <div class="col-md-4">
                <label for="passportCountryID" class="font-weight-bold mt-2">Passport Issued Country:</label>
                <input type="text" v-model="passportCountry" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="passportCountryID" >
            </div>
            <div class="col-md-3">
                <label for="passportNumberID" class="font-weight-bold mt-2">Passport Number:</label>
                <input type="text" v-model="passportNumber" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="passportNumberID">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <label for="workPermitNumberID" class="font-weight-bold mt-2">Work Permit Number:</label>
                <input type="text" v-model="workPermitNumber" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="workPermitNumberID" >
            </div>
            <div class="col-md-3">
                <label for="workPermitExpiryID" class="font-weight-bold mt-2">Work Permit Expiry Date:</label>
                <input type="text" v-model="workPermitExpiry" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="workPermitExpiryID" >
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <label for="CityID" class="font-weight-bold mt-2">City:</label>
                <input type="text" v-model="city" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="CityID">
            </div>
            <div class="col-md-4">
                <label for="SuburbID" class="font-weight-bold mt-2">Suburb:</label>
                <input type="text" v-model="suburb" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="SuburbID" >
            </div>
            <div class="col-lg-1 col-md-3">
                <label for="ZipCodeID" class="font-weight-bold mt-2">ZipCode:</label>
                <input type="text" v-model="zipCode" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="ZipCodeID" >
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-8">
                <label for="AddressID" class="font-weight-bold mt-2">Address:</label>
                <input type="text" v-model="address" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="AddressID" >
            </div>
        </div>
        
       
        <h3 class="text-warning mt-3"> Transportation </h3>
        <hr />
        <div class="row">
            <div class="col-md-4">
                <label for="transportationID" class="font-weight-bold mt-2">Transportation:</label>
                <input type="text" class="form-control" v-model="transportation" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="transportationID" >
            </div>
        </div>
        <div class="row">
        <div class="col-md-4">
                <label for="LicenseNumberID" class="font-weight-bold mt-2">NZ License Number:</label>
                <input type="text" class="form-control" v-model="licenseNumber" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="LicenseNumberID">
            </div>
            <div class="col-md-4">
                <label for="classLicenseID" class="font-weight-bold mt-2">Class License:</label>
                <input type="text" class="form-control" v-model="classLicense" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="classLicenseID">
            </div>
            <div class="col-md-4">
                <label for="endorsementID" class="font-weight-bold mt-2">Endorsement:</label>
                <input type="text" class="form-control" v-model="endorsement" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="endorsementID" >
            </div>
        </div>
        
        <h3 class="text-warning mt-3">Health</h3>
        <hr />
        <div class="container p-0 m-0">
            <div class="row">
                <div class="col-md-9">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="asthma"  :disabled="!toggleEdit">Asthma
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="blackOut"  :disabled="!toggleEdit">BlackOut / Seizures
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="diabetes"  :disabled="!toggleEdit">Diabetes
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="bronchitis"  :disabled="!toggleEdit">Bronchitis
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="backInjury" :disabled="!toggleEdit">Back Injury / strain

                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="deafness"  :disabled="!toggleEdit">Deafness
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="dermatitis"  :disabled="!toggleEdit">Dermatitis/Eczema
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="skinInfection"  :disabled="!toggleEdit">Skin infection
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="allergies"  :disabled="!toggleEdit">Allergies
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="hernia"  :disabled="!toggleEdit">Hernia
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="highBloodPressure"  :disabled="!toggleEdit">High blood
                            pressure
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="heartProblems"  :disabled="!toggleEdit">Heart Problems
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="usingDrugs"  :disabled="!toggleEdit">taking Drugs / Medicine

                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="usingContactLenses"  :disabled="!toggleEdit">Wearing contact
                            lenses/ glasses

                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-inline" v-model="RSI"  :disabled="!toggleEdit">Occupational Overuse Syndrome /
                            R.S.I

                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <div class="row mx-3">
                        <label for="compensationInjuryID" class="font-weight-bold">
                            Compensation of any injury by ACC
                        </label>
                        <input type="text" class="form-control" v-model="compensationInjury" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="compensationInjuryID">
                    </div>
                    <div class="row mx-3 mt-2">
                        <label for="compensationDateFromID" class="font-weight-bold">Dates From</label>
                        <input type="date" name="compensationDateFrom" v-model="compensationDateFrom" id="compensationDateFromID" class="form-control">


                        <label for="compensationDateToID" class="font-weight-bold mt-2">Dates To</label>
                        <input type="date" name="compensationDateTo" v-model="compensationDateTo" id="compensationDateToID" class="form-control">

                    </div>
                </div>
            </div>
        </div>
        <h3 class="text-warning mt-3">Other Details</h3>
        <hr />
        <div class="container mb-5">
            <input type="checkbox" class="form-check-inline" v-model="dependants"  :disabled="!toggleEdit" name="dependants"> Having dependants <br>

            <input type="checkbox" class="form-check-inline" v-model="smoke"  :disabled="!toggleEdit" name="smoke"> Smoking<br>

            <input type="checkbox" class="form-check-inline" v-model="conviction"  :disabled="!toggleEdit" name="conviction"> Having conviction against the law<br>
            <label for="convictionDetailsID" class="mt-3">Details of convictions </label>
            <textarea class="form-control rounded-0" v-model="convictionDetails" id="convictionDetailsID" rows="2" readonly v-bind:class="{ 'border-0': !toggleEdit}" name="convictionDetails">
            
            </textarea>

        </div>
  </div><!--applicant profile end-->
  <div class="tab-pane fade" id="attachment" role="tabpanel" aria-labelledby="attachment-tab">
      Attachment
  </div><!--attachment end-->
</div>
        
</div> <!--container-->
</div> <!--app end-->

<!-- Vue -->
<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            toggleEdit: false,
            firstName: "<?php echo $candidate['FirstName'];?>",
            lastName: "<?php echo $candidate['LastName'];?>",
            phoneNumber: "<?php echo $candidate['PhoneNumber'];?>",
            email: "<?php echo $candidate['Email'];?>",
            gender: "<?php echo $candidate['Gender'];?>",
            DOB: "<?php echo $candidate['DOB'];?>",
            citizenship: "<?php echo $candidate['Citizenship'];?>",
            nationality: "<?php echo $candidate['Nationality'];?>",
            passportCountry: "<?php echo $candidate['PassportCountry'];?>",
            passportNumber: "<?php echo $candidate['PassportNumber'];?>",
            workPermitNumber: "<?php echo $candidate['WorkPermitNumber'];?>",
            workPermitExpiry: "<?php echo $candidate['WorkPermitExpiry'];?>",
            city: "<?php echo $candidate['City'];?>",
            suburb: "<?php echo $candidate['Suburb'];?>",
            zipCode: "<?php echo $candidate['ZipCode'];?>",
            address: "<?php echo $candidate['Address'];?>",
            jobInterest: "<?php echo $candidate['JobInterest'];?>",
            jobType: "<?php echo $candidate['JobType'];?>",
            notes: "<?php echo $candidate['CandidateNotes'];?>",
            transportation: "<?php echo $candidate['Transportation'];?>",
            licenseNumber: "<?php echo $candidate['LicenseNumber'];?>",
            classLicense: "<?php echo $candidate['ClassLicense'];?>",
            endorsement: "<?php echo $candidate['Endorsement'];?>",
            asthma: <?php if($candidate['Asthma'] == "true") { echo "true";} else { echo "false";} ?>,
            blackOut: <?php if($candidate['BlackOut'] == "true") { echo "true";} else { echo "false";} ;?> ,
            diabetes: <?php if($candidate['Diabetes'] == "true") { echo "true";} else { echo "false";} ;?>,
            bronchitis: <?php if($candidate['Bronchitis'] == "true"){ echo "true";} else { echo "false";} ;?>,
            backInjury: <?php if($candidate['BackInjury'] == "true"){ echo "true";} else { echo "false";} ;?> ,
            deafness: <?php if($candidate['Deafness'] == "true"){ echo "true";} else { echo "false";} ;?>,
            dermatitis: <?php if($candidate['Dermatitis'] == "true"){ echo "true";} else { echo "false";} ;?>,
            skinInfection: <?php if($candidate['SkinInfection'] == "true"){ echo "true";} else { echo "false";} ;?>,
            allergies: <?php if($candidate['Allergies'] == "true"){ echo "true";} else { echo "false";} ;?>,
            hernia: <?php if($candidate['Hernia'] == "true"){ echo "true";} else { echo "false";} ;?>,
            highBloodPressure: <?php if($candidate['HighBloodPressure'] == "true"){ echo "true";} else { echo "false";} ;?>,
            heartProblems: <?php if($candidate['HeartProblems'] == "true"){ echo "true";} else { echo "false";} ;?>,
            usingDrugs: <?php if($candidate['UsingDrugs'] == "true"){ echo "true";} else { echo "false";} ;?>,
            usingContactLenses: <?php if($candidate['UsingContactLenses'] == "true"){ echo "true";} else { echo "false";} ;?>,
            RSI: <?php if($candidate['RSI'] == "true"){ echo "true";} else { echo "false";} ;?>,
            compensationInjury: "<?php echo $candidate['CompensationInjury'];?>",
            compensationDateFrom: "<?php echo $candidate['CompensationDateFrom'];?>",
            compensationDateTo: "<?php echo $candidate['CompensationDateTo'];?>",
            dependants: <?php if($candidate['Dependants'] == "true"){ echo "true";} else { echo "false";} ;?>,
            smoke: <?php if($candidate['Smoke'] == "true"){ echo "true";} else { echo "false";} ;?>,
            conviction: <?php if($candidate['Conviction'] == "true"){ echo "true";} else { echo "false";} ;?>,
            convictionDetails: "<?php echo $candidate['ConvictionDetails'];?>",
        },
        methods: {
            editButton: function(){
                this.toggleEdit = !this.toggleEdit
                var x =  document.getElementsByTagName("input").length;
                var y =  document.getElementsByTagName("textarea").length;
                if(this.toggleEdit){
                    for (i = 0; i < x; i++) {
                        document.getElementsByTagName("input")[i].removeAttribute("readonly");
                    }
                    for (i = 0; i < y; i++) {
                        document.getElementsByTagName("textarea")[i].removeAttribute("readonly");
                    }
                } else {
                    for (i = 0; i < x; i++) {
                        document.getElementsByTagName("input")[i].setAttribute("readonly", "readonly"); 
                    }
                    for (i = 0; i < y; i++) {
                        document.getElementsByTagName("textarea")[i].setAttribute("readonly", "readonly");
                    }
                }
            },
            submitButton: function(candidateID,userID){
            var formData = new FormData()
            formData.append('UserID',userID);
            formData.append('FirstName',this.firstName);
            formData.append('LastName',this.lastName);
            formData.append('PhoneNumber',this.phoneNumber);
            formData.append('Email',this.email);
            formData.append('Gender',this.gender);
            formData.append('DOB',this.DOB);
            formData.append('Citizenship',this.citizenship);
            formData.append('Nationality',this.nationality);
            formData.append('PassportCountry',this.passportCountry);
            formData.append('PassportNumber',this.passportNumber);
            formData.append('WorkPermitNumber',this.workPermitNumber);
            formData.append('WorkPermitExpiry',this.workPermitExpiry);
            formData.append('City',this.city);
            formData.append('Suburb',this.suburb);
            formData.append('ZipCode',this.zipCode);
            formData.append('Address',this.address);
            formData.append('JobInterest',this.jobInterest);
            formData.append('JobType',this.jobType);
            formData.append('CandidateNotes',this.notes);
            formData.append('Transportation',this.transportation);
            formData.append('LicenseNumber',this.licenseNumber);
            formData.append('ClassLicense',this.classLicense);
            formData.append('Endorsement',this.endorsement);
            formData.append('Asthma',this.asthma);
            formData.append('BlackOut',this.blackOut);
            formData.append('Diabetes',this.diabetes);
            formData.append('Bronchitis',this.bronchitis);
            formData.append('BackInjury',this.backInjury);
            formData.append('Deafness',this.deafness);
            formData.append('Dermatitis',this.dermatitis);
            formData.append('SkinInfection',this.skinInfection);
            formData.append('Allergies',this.allergies);
            formData.append('Hernia',this.hernia);
            formData.append('HighBloodPressure',this.highBloodPressure);
            formData.append('HeartProblems',this.heartProblems);
            formData.append('UsingDrugs',this.usingDrugs);
            formData.append('UsingContactLenses',this.usingContactLenses);
            formData.append('RSI',this.RSI);
            formData.append('CompensationInjury',this.compensationInjury);
            formData.append('CompensationDateFrom',this.compensationDateFrom);
            formData.append('CompensationDateTo',this.compensationDateTo);
            formData.append('Dependants',this.dependants);
            formData.append('Smoke',this.smoke);
            formData.append('Conviction',this.conviction);
            formData.append('ConvictionDetails',this.convictionDetails);
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/CandidateMission/updateCandidateDetails/'+candidateID
            this.$http.post(urllink, formData).then(res => {
                
            }, res => {
                // error callback
                
            })
            }
        }
        
    })
</script>