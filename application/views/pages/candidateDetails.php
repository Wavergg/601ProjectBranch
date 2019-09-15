
<div id="app">
    <?php if(!empty($job)):?>
    <div class="form-control bg-success text-center text-white font-weight-bold rounded-0"
        style="position:fixed; top:0px; z-index:1;opacity:0.9">
        Assigning candidate to <?php echo $job['JobTitle'] . ' in ' . $job['City'];?>
    </div>

    <a href="<?php echo base_url();?>index.php/Jobs/assignCandidate/<?php echo $candidate['CandidateID'];?>/<?php echo $job['JobID'];?>">
        <button type="button" style="position:fixed;right: 20px; bottom:20px;z-index:1" class=" btn-lg border-white">
            <span>Assign this candidate</span>
            <i style="font-size:30px;" class="icon ion-md-contacts m-1 text-dark"></i>
        </button>
    </a>
    <?php endif;?>

    <?php if(empty($job)):?>
    <button type="button" @click="editButton()" style="position:fixed;right: 20px; bottom:154px;z-index:1"
        class=" btn-sm btn-info">
        <i style="font-size:30px;" class="icon ion-md-create m-1"></i>
    </button>
    <button type="button" id="changeSavedBtn" onclick="updateChange()"
        @click="submitButton(<?php echo $candidate['CandidateID'];?>,<?php echo $candidate['UserID'];?>)"
        style="position:fixed;right: 20px; bottom:90px;z-index:1" class=" btn-sm btn-success">
        <i style="font-size:30px;" class="icon ion-md-save m-1"></i>
    </button>
    <?php endif;?>
    <div id="savedMessage" hidden class="btn-sm btn-dark disabled">
        
    </div>
    <div class="container mt-5">
        <h1 class="text-dark mt-3 text-center"> Applicant's Personal Information </h1>
        <hr />
        <ul class="nav nav-tabs" id="myTab" role="tablist">

            <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="true">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="attachment-tab" data-toggle="tab" href="#attachment" role="tab"
                    aria-controls="attachment" aria-selected="false">Attachment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Youtube-tab" data-toggle="tab" href="#Youtube" role="tab"
                    aria-controls="Youtube" aria-selected="false">Youtube URL</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade  show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div onchange="trackChanges()"> <!--applicantPageStart-->
                <div class="d-flex">
                <h3 class="text-warning mt-3"> Interest</h3>
                <small class="ml-auto text-muted pt-1">Last Updated: <span v-text="updatedTime"></span></small>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label for="jobInterestID" class="font-weight-bold mt-2">Profession:</label>
                        <input type="text" v-model="jobInterest" class="form-control" readonly
                            v-bind:class="{ 'border-0': !toggleEdit}" id="jobInterestID">
                    </div>
                    <div class="col-md-4">
                        <label for="jobTypeID" class="font-weight-bold mt-2">Job Type:</label>
                        <input type="text" v-model="jobType" class="form-control" readonly
                            v-bind:class="{ 'border-0': !toggleEdit}" id="jobTypeID">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <label for="candidateNotesID" class="mt-3 font-weight-bold">Comments:</label>
                        <textarea readonly class="form-control rounded" v-model="notes" rows="2"
                            id="candidateNotesID" name="candidateNotes">
                        </textarea>
                    </div>  
                </div>
                <h3 class="text-warning mt-3"> Personal Details </h3>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="firstNameID" class="font-weight-bold mt-2">Applicant First Name:</label>
                                <input type="text" v-model="firstName" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="firstNameID">
                            </div>
                            <div class="col-md-6">
                                <label for="lastNameID" class="font-weight-bold mt-2">Applicant Last Name:</label>
                                <input type="text" v-model="lastName" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="lastNameID" >
                            </div>
                        
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
                                <input type="date" v-model="DOB" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="DOBID" >
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-4">
                        <div class="col-md-12">
                            <div class="row ml-3"><label for="candidateCVID" class="font-weight-bold mt-2">Candidate's CV:</label></div>
                            <div class="row ml-3"><a href="<?php echo base_url()?>index.php/CandidateMission/downloadCV/<?php if(!empty($candidate['JobCV'])){echo $candidate['JobCV'];} else { echo '0';}?>" id="candidateCVID" class="btn btn-primary">CandidateCV</a></div>   
                
                            <div class="row mt-5 mb-0 ml-4">
                    
                                <div class="row">
                                <?php $setImgPreviewID = "" ;?>
                                    <?php if(empty($candidate['UserPicture'])):?>
                                        <?php $setImgPreviewID = "imgPreview" ;?>
                                        <img id="imgPreview" src="<?php echo base_url()?>lib/images/user-512.png" style="width:150px;height:150px;">
                                    <?php else :?>
                                        <?php $setImgPreviewID = "imgPreview1" ;?>
                                        <img id="imgPreview1" src="<?php echo base_url() . 'candidateProfile/' . $candidate['UserPicture']?>" style="width:150px;height:150px;">
                                    <?php endif;?>
                                </div>
                                <div class="row justify-content-center">
                                    <input type="file" id="fileProfileBtn" hidden style="width:240px;" onchange="document.getElementById('<?php echo $setImgPreviewID ; ?>').src = window.URL.createObjectURL(this.files[0])" name="candidateImage" class="offset-md-0">
                                </div>
                            </div>
                        </div>
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
                        <input type="date" v-model="workPermitExpiry" class="form-control" readonly v-bind:class="{ 'border-0': !toggleEdit}" id="workPermitExpiryID" >
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
                                    <input type="checkbox" class="form-check-inline" v-model="asthma"
                                        :disabled="!toggleEdit">Asthma
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-inline" v-model="blackOut"
                                        :disabled="!toggleEdit">BlackOut / Seizures
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-inline" v-model="diabetes"
                                        :disabled="!toggleEdit">Diabetes
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-inline" v-model="bronchitis"
                                        :disabled="!toggleEdit">Bronchitis
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-inline" v-model="backInjury"
                                        :disabled="!toggleEdit">Back Injury / strain

                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-inline" v-model="deafness"
                                        :disabled="!toggleEdit">Deafness
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-inline" v-model="dermatitis"
                                        :disabled="!toggleEdit">Dermatitis/Eczema
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-inline" v-model="skinInfection"
                                        :disabled="!toggleEdit">Skin infection
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-inline" v-model="allergies"
                                        :disabled="!toggleEdit">Allergies
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-inline" v-model="hernia"
                                        :disabled="!toggleEdit">Hernia
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-inline" v-model="highBloodPressure"
                                        :disabled="!toggleEdit">High blood
                                    pressure
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-inline" v-model="heartProblems"
                                        :disabled="!toggleEdit">Heart Problems
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-inline" v-model="usingDrugs"
                                        :disabled="!toggleEdit">taking Drugs / Medicine

                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-inline" v-model="usingContactLenses"
                                        :disabled="!toggleEdit">Wearing contact
                                    lenses/ glasses

                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-inline" v-model="RSI"
                                        :disabled="!toggleEdit">Occupational Overuse Syndrome /
                                    R.S.I

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3 mt-md-0">
                            <div class="row mx-3">
                                <label for="compensationInjuryID" class="font-weight-bold">
                                    Compensation of any injury by ACC
                                </label>
                                <input type="text" class="form-control" v-model="compensationInjury" readonly
                                    v-bind:class="{ 'border-0': !toggleEdit}" id="compensationInjuryID">
                            </div>
                            <div class="row mx-3 mt-2">
                                <label for="compensationDateFromID" class="font-weight-bold">Dates From</label>
                                <input type="date" name="compensationDateFrom" readonly v-bind:class="{ 'border-0': !toggleEdit}" v-model="compensationDateFrom"
                                    id="compensationDateFromID" class="form-control">


                                <label for="compensationDateToID" class="font-weight-bold mt-2">Dates To</label>
                                <input type="date" name="compensationDateTo" readonly v-bind:class="{ 'border-0': !toggleEdit}" v-model="compensationDateTo"
                                    id="compensationDateToID" class="form-control">

                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="text-warning mt-3">Other Details</h3>
                <hr />
                <div class="container mb-5">
                    <input type="checkbox" class="form-check-inline" v-model="dependants" :disabled="!toggleEdit"
                        name="dependants"> Having dependants <br>

                    <input type="checkbox" class="form-check-inline" v-model="smoke" :disabled="!toggleEdit"
                        name="smoke"> Smoking<br>

                    <input type="checkbox" class="form-check-inline" v-model="conviction" :disabled="!toggleEdit"
                        name="conviction"> Having conviction against the law<br>
                    <label for="convictionDetailsID" class="mt-3">Details of convictions </label>
                    <textarea class="form-control rounded-0" v-model="convictionDetails" id="convictionDetailsID"
                        rows="2" readonly v-bind:class="{ 'border-0': !toggleEdit}" name="convictionDetails">
                    </textarea>

                </div>
            </div> <!--onchangeDiv end-->
            </div>
            <!--applicant profile end-->
            <!-- attachement tab -->
            <div class="tab-pane fade my-5" id="attachment" role="tabpanel" aria-labelledby="attachment-tab">
                
                <div class="custom-file mt-5">
                <div class="text-center mb-3 font-weight-bold">Upload Attachment Here:</div>
                <div class="row justify-content-center container pr-1">
                <div class="col-md-7" style="z-index:0">
                <input type="file" class="custom-file-input" @change="uploadFileName" v-model="chosenFile" multiple="multiple" id="userFiles">
                <label class="custom-file-label" for="userFiles" v-text="labelFile"></label>
                </div>
                </div>
                <div class="row justify-content-center ">
                    <div class="col-lg-2 col-md-3 col-6">
                    <button class="btn btn-light font-weight-bold border border-dark form-control mt-3" @click="uploadFiles">Upload Files</button>
                    </div>
                </div>
            </div>
                
                <!-- List of the files -->
                <div class="mt-5"><h2 class="text-dark">Files Attached:</h2></div>

                <div v-if="userFiles.length > 0" class="mt-3 mb-5">
                    <div v-for="userFile in userFiles">
                        <div class="btn btn-danger border-danger" v-on:click="removingFile(userFile)" style="border-radius: 5px 0px 0px 5px">X</div><a class="btn btn-outline-dark px-5 my-1" style="border-radius:0px 5px 5px 0px;" :href="'<?php echo base_Url(); ?>index.php/CandidateMission/downloadFile/' + candidateID + '/' + userFile">{{ userFile }}</a>
                    </div>
                </div>
                <!-- List of the files end -->
                
            </div>
            <!-- attachement tab end -->
            <!-- Youtube Start -->
            <div class="tab-pane fade mb-5" id="Youtube" role="tabpanel" aria-labelledby="Youtube-tab">
                
                <label for="youtubeLinksID" class="display-4 font-weight-bold mt-4">Youtube URL:</label>
                <input type="text" id="youtubeLinksID"  v-model="youtubeLink" @change="loadVideo" class="form-control" >
                
                <div class="container my-4 ">
                <!-- <div class="row justify-content-center"> -->
                    <div id="video justify-content-center row">
                        <div class="wrapper">
                            <iframe id="video-preview" style="display:none" src=""></iframe>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- Youtube End -->
        </div>
        <!-- tab content end -->
            
    </div>
    <!--container-->
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
</div>
<!--app end-->

<!-- Vue -->
<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
var unsaved = false;
function trackChanges(){
    this.unsaved = true
   // alert(this.unsaved)
}
function updateChange(){
    this.unsaved = false
  //  alert(this.unsaved)
}
window.addEventListener("beforeunload", function(event) {
    if(this.unsaved){
        //just return something so the popup window will show
    event.returnValue = "Write something clever here..";
    }
});
</script>
<script>
var app = new Vue({
    el: '#app',
    data: {
        message: "",
        toggleEdit: false,
        userFiles: <?php echo json_encode($userFiles)?>,
        chosenFile: "",
        labelFile: "",
        candidateID: <?php echo $candidate['CandidateID']; ?> ,
        firstName : "<?php echo $candidate['FirstName'];?>",
        lastName: "<?php echo $candidate['LastName'];?>",
        phoneNumber: "<?php echo $candidate['PhoneNumber'];?>",
        email: "<?php echo $candidate['Email'];?>",
        gender: "<?php echo $candidate['Gender'];?>",
        DOB: "<?php if($candidate['DOB'] !="0000-00-00"){echo $candidate['DOB'];}?>",
        citizenship: "<?php echo $candidate['Citizenship'];?>",
        nationality: "<?php echo $candidate['Nationality'];?>",
        passportCountry: "<?php echo $candidate['PassportCountry'];?>",
        passportNumber: "<?php echo $candidate['PassportNumber'];?>",
        workPermitNumber: "<?php echo $candidate['WorkPermitNumber'];?>",
        workPermitExpiry: '<?php if($candidate['WorkPermitExpiry'] !="0000-00-00"){echo $candidate['WorkPermitExpiry'];}?>',
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
        updatedTime: "<?php echo $candidate['ApplyDate'];?>",
        asthma: <?php
        if ($candidate['Asthma'] == "true") {
            echo "true";
        } else {
            echo "false";
        } ?> ,
        blackOut : <?php
        if ($candidate['BlackOut'] == "true") {
            echo "true";
        } else {
            echo "false";
        }; ?> ,
        diabetes : <?php
        if ($candidate['Diabetes'] == "true") {
            echo "true";
        } else {
            echo "false";
        }; ?> ,
        bronchitis : <?php
        if ($candidate['Bronchitis'] == "true") {
            echo "true";
        } else {
            echo "false";
        }; ?> ,
        backInjury : <?php
        if ($candidate['BackInjury'] == "true") {
            echo "true";
        } else {
            echo "false";
        }; ?> ,
        deafness : <?php
        if ($candidate['Deafness'] == "true") {
            echo "true";
        } else {
            echo "false";
        }; ?> ,
        dermatitis : <?php
        if ($candidate['Dermatitis'] == "true") {
            echo "true";
        } else {
            echo "false";
        }; ?> ,
        skinInfection : <?php
        if ($candidate['SkinInfection'] == "true") {
            echo "true";
        } else {
            echo "false";
        }; ?> ,
        allergies : <?php
        if ($candidate['Allergies'] == "true") {
            echo "true";
        } else {
            echo "false";
        }; ?> ,
        hernia : <?php
        if ($candidate['Hernia'] == "true") {
            echo "true";
        } else {
            echo "false";
        }; ?> ,
        highBloodPressure : <?php
        if ($candidate['HighBloodPressure'] == "true") {
            echo "true";
        } else {
            echo "false";
        }; ?> ,
        heartProblems : <?php
        if ($candidate['HeartProblems'] == "true") {
            echo "true";
        } else {
            echo "false";
        }; ?> ,
        usingDrugs : <?php
        if ($candidate['UsingDrugs'] == "true") {
            echo "true";
        } else {
            echo "false";
        }; ?> ,
        usingContactLenses : <?php
        if ($candidate['UsingContactLenses'] == "true") {
            echo "true";
        } else {
            echo "false";
        }; ?> ,
        RSI : <?php
        if ($candidate['RSI'] == "true") {
            echo "true";
        } else {
            echo "false";
        }; ?> ,
        compensationInjury : "<?php echo $candidate['CompensationInjury'];?>",
        compensationDateFrom: '<?php if($candidate['CompensationDateFrom'] !="0000-00-00") { echo $candidate['CompensationDateFrom'];}?>',
        compensationDateTo: '<?php if($candidate['CompensationDateTo'] !="0000-00-00") { echo $candidate['CompensationDateTo'];}?>',
        dependants: <?php
        if ($candidate['Dependants'] == "true") {
            echo "true";
        } else {
            echo "false";
        }; ?> ,
        smoke : <?php
        if ($candidate['Smoke'] == "true") {
            echo "true";
        } else {
            echo "false";
        }; ?> ,
        conviction : <?php
        if ($candidate['Conviction'] == "true") {
            echo "true";
        } else {
            echo "false";
        }; ?> ,
        convictionDetails : "<?php echo $candidate['ConvictionDetails'];?>",
        youtubeLink: "",
        // unsaved: false,
    },
    methods: {
        trackChanges: function(){
            alert('changes made')
            this.unsaved = true
        },
        uploadFiles: function() {
            console.log(this.candidateID);
            this.message = "";
            var userFiles = document.getElementById("userFiles");
            var len = userFiles.files.length;
            for (var i = 0; i < len; i++) {
                console.log(userFiles.files[i].name)
                var formData = new FormData();
                formData.append('candidateID', this.candidateID);
                formData.append('userFile', userFiles.files[i]);
                var urllink = "<?php echo base_Url(); ?>" + 'index.php/CandidateMission/uploadFiles/'
                this.$http.post(urllink, formData).then(res => {
                    var result = res.body
                    if(result.length>this.userFiles.length){
                    this.message = "Successful in uploading files"
                    this.userFiles = result
                    this.updatedTime = this.getCurrentDateTime()
                    } else {
                        this.message = "Failure in uploading files"
                    }
                }, res => {
                    this.message = "Failure in uploading files"
                })
            }
              $('#myModal').modal('show')
        },
        uploadFileName: function(){
            if(this.chosenFile.length>0){
            var chosenFileSplit = this.chosenFile.split('\\')
            this.labelFile = chosenFileSplit[chosenFileSplit.length-1];
            }
        },
        removingFile: function(userFileX){
                this.message = "";
              
                var formData = new FormData();
                formData.append('candidateID', this.candidateID);
                formData.append('userFile', userFileX);
                var urllink = "<?php echo base_Url(); ?>" + 'index.php/CandidateMission/removeFile/'
                this.$http.post(urllink, formData).then(res => {
                    var result = res.body
                    if(result.length<this.userFiles.length){
                        this.message = "Successful in removing files"
                        this.userFiles = res.body
                        this.updatedTime = this.getCurrentDateTime()
                    } else {
                        this.message = "Failure in removing files"
                    }
                }, res => {
                    this.message = "Failure in removing files, Server Error"
                })
            
            $('#myModal').modal('show')
        },
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
                document.getElementById("fileProfileBtn").removeAttribute("hidden");
            } else {
                for (i = 0; i < x; i++) {
                    document.getElementsByTagName("input")[i].setAttribute("readonly", "readonly"); 
                }
                for (i = 0; i < y; i++) {
                    document.getElementsByTagName("textarea")[i].setAttribute("readonly", "readonly");
                }
                document.getElementById("fileProfileBtn").setAttribute("hidden","true");
            }
        },
        submitButton: function(candidateID, userID) {
            this.unsaved = false;
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
            if(document.getElementById("fileProfileBtn").value.length>0){
                var userPic = document.getElementById("fileProfileBtn");
                formData.append('UserPicture',userPic.files[0]);
            }
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/CandidateMission/updateCandidateDetails/'+candidateID
            this.$http.post(urllink, formData).then(res => {
                this.updatedTime = this.getCurrentDateTime()
                
                document.getElementById("savedMessage").removeAttribute("hidden");
                document.getElementById("changeSavedBtn").classList
                document.getElementById("savedMessage").style.opacity = 0;
                document.getElementById('savedMessage').innerHTML = 'Changes Saved . . .'
                //transition animation from css file
                document.getElementById("savedMessage").classList.add("fadeOutIn");
                //remove it after using it
                setTimeout(function(){document.getElementById("savedMessage").classList.remove("fadeOutIn");}, 1100);
            }, res => {
                // error callback
            });
        },
        loadVideo: function(){
            this.updatedTime = this.getCurrentDateTime()
            var videoUrl = document.getElementById('youtubeLinksID').value
            if(videoUrl.length < 1){
          
                document.getElementById('video-preview').style.display = "none";
            } else {
                var urlID = this.youtubeLink.split("=")
                document.getElementById("video-preview").src = 'https://youtube.com/embed/'+urlID[1];
                document.getElementById('video-preview').style.display = "block";
            }
                var formData = new FormData();
                formData.append('candidateID', this.candidateID);
                formData.append('youtubeURL', this.youtubeLink);
                var urllink = "<?php echo base_Url(); ?>" + 'index.php/CandidateMission/updateYoutubeURL/'
                this.$http.post(urllink, formData).then(res => {
                    
                }, res => {

            })
        },
        getCurrentDateTime: function() {
        var now     = new Date(); 
        var year    = now.getFullYear();
        var month   = now.getMonth()+1; 
        var day     = now.getDate();
        var hour    = now.getHours();
        var minute  = now.getMinutes();
        var second  = now.getSeconds(); 
        if(month.toString().length == 1) {
             month = '0'+month;
        }
        if(day.toString().length == 1) {
             day = '0'+day;
        }   
        if(hour.toString().length == 1) {
             hour = '0'+hour;
        }
        if(minute.toString().length == 1) {
             minute = '0'+minute;
        }
        if(second.toString().length == 1) {
             second = '0'+second;
        }   
        var dateTime = year+'-'+month+'-'+day+' '+hour+':'+minute+':'+second;   
         return dateTime;
        },
    },
    mounted: function() {
        this.youtubeLink = '<?php if(!empty($candidate['YoutubeURL'])){echo $candidate['YoutubeURL'];}?>';
        if(this.youtubeLink.length>0){
            var urlID = this.youtubeLink.split("=")
            document.getElementById("video-preview").src = 'https://youtube.com/embed/'+urlID[1];
            document.getElementById('video-preview').style.display = "block";
            document.getElementById('video').style.display = "block";
        }
    },
})
</script>