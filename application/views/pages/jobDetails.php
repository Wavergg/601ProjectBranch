
<div id="app">
    
    <a href="<?php echo base_url()?>index.php/Jobs/manageClient/<?php if(!empty($candidateIDFromPage)){ echo 'candidatePage/' . $candidateIDFromPage;}?>" style="position:fixed;right: 15px; bottom:20px;z-index:1"
        class=" btn-sm btn-dark border border-secondary">
        <i style="font-size:30px;" class="icon ion-md-redo m-1"></i>
    </a>
    <div style="height: 50px;"></div>
    
    <div class="mb-2 p-md-3">
        <div class="container">
        <h2 class="text-center"><?php echo $title; ?></h2>
        <hr />
        <div class="d-flex">
            <small class="ml-auto text-muted pt-1">Last Updated: <span v-text="updatedTime"></span></small>
        </div>
        <div id="savedMessage" hidden class="btn-sm btn-dark disabled"></div>
        <ul class="nav nav-tabs mt-4 " id="myTab" role="tablist">

            <li class="nav-item">
                <a class="nav-link active" id="orderBrief-tab" data-toggle="tab" href="#orderBrief" role="tab"
                    aria-controls="orderBrief" aria-selected="true">Order Brief</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="attachment-tab" data-toggle="tab" href="#attachment" role="tab"
                    aria-controls="attachment" aria-selected="false">Attachment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="publish-tab" data-toggle="tab" href="#publish" role="tab"
                    aria-controls="publish" aria-selected="false">Publish Area</a>
            </li>
        </ul>
        </div>
        <!-- Tab content -->
        <div class="tab-content mt-4" id="myTabContent">
            <!-- Order Brief Tab -->
            <div class="tab-pane fade  show active" id="orderBrief" role="tabpanel" aria-labelledby="orderBrief-tab">
            <div class="container">
                <!-- Client Breief and Job Description -->
                <div class="row justify-content-center">
                    <!-- Client Brief -->
                    <div class="col-md-6">
                        <div class="d-flex">
                        <h2 class="text-lg-left mr-md-none mr-auto align-self-center text-center">Client's Brief: <b><?php if(empty($job['JobStatus'])){ echo "NULL";} else { echo strtoupper($job['JobStatus']);}?></b>
                        
                        </h2>
                        <button type="button" @click="editButton()" style="right: 20px; bottom:146px;" class="ml-md-none ml-auto mb-3 mb-md-1 align-self-center btn-sm btn-info">
                            <i style="font-size:30px;" class="icon ion-md-create m-1"></i>
                        </button>
                        </div>
                        
                        <table class="table table-sm table-hover" onclick="trackChanges()">
                            <tbody>
                            <tr><th class="font-weight-bold">Client Title</th><td><input type="text" v-model="clientTitle" readonly v-bind:class="{ 'border-0 bg-transparent': !toggleEdit}" class="form-control" ></td></tr>
                            <tr><th class="font-weight-bold">Client Name</th><td><input type="text" v-model="clientName" readonly v-bind:class="{ 'border-0 bg-transparent': !toggleEdit}" class="form-control" ></td></tr>
                            <tr><th class="font-weight-bold">Company</th><td><input type="text" v-model="company" readonly v-bind:class="{ 'border-0 bg-transparent': !toggleEdit}" class="form-control" ></td></tr>
                            <tr><th class="font-weight-bold">Email</th><td><input type="text" v-model="email" readonly v-bind:class="{ 'border-0 bg-transparent': !toggleEdit}" class="form-control" ></td></tr>
                            <tr><th class="font-weight-bold">Contact Number</th><td><input type="text" v-model="contactNumber" readonly v-bind:class="{ 'border-0 bg-transparent': !toggleEdit}" class="form-control"></td></tr>
                            <tr><th class="font-weight-bold">Job Title</th><td><input type="text" v-model="jobTitle" readonly v-bind:class="{ 'border-0 bg-transparent': !toggleEdit}" class="form-control" ></td></tr>
                            <tr><th class="font-weight-bold">Job Type</th><td><input type="text" v-model="jobType" readonly v-bind:class="{ 'border-0 bg-transparent': !toggleEdit}" class="form-control" ></td></tr>
                            <tr><th class="font-weight-bold">Address</th><td><input type="text" v-model="address" readonly v-bind:class="{ 'border-0 bg-transparent': !toggleEdit}" class="form-control"></td></tr>
                            <tr><th class="font-weight-bold">City</th><td><input type="text" v-model="city" readonly v-bind:class="{ 'border-0 bg-transparent': !toggleEdit}" class="form-control" ></td></tr>
                            <tr><th class="font-weight-bold">Suburb</th><td><input type="text" v-model="suburb" readonly v-bind:class="{ 'border-0 bg-transparent': !toggleEdit}" class="form-control" ></td></tr>
                            <tr><th class="font-weight-bold">Job Submitted Date</th><td><?php $newVal = explode(' ',$job['JobSubmittedDate']); echo $newVal[0];?></td></tr>
                            </tbody>
                        </table>
                        
                    </div>
                    <!-- Client Brief End -->
                    <!-- Job Description -->
                    <div class="col-md-6 mt-4 mt-md-0">
                        <div class="container">
                            <h2 class="text-center font-weight-bold pb-2">Job Description</h2>
                            <hr/>
                            <textarea readonly id="descriptionID" v-bind:class="{ 'border-0 bg-transparent': !toggleEdit}" class="form-control ml-3" id="exampleFormControlTextarea1" rows="4"><?php echo $job['Description'] ;?></textarea>
                        </div>
                    </div>
                    <!-- Job Description End -->
                    <div class="row justify-content-md-end justify-content-center mr-2 my-3">
                        <button type="button" class="my-3 mx-3" id="changeSavedBtn" onclick="updateChange()"
                            @click="submitButton" style="right: 20px; bottom:82px;">
                            <i style="font-size:30px;" class="icon ion-md-save m-1"></i>
                        </button>
                    </div>
                </div>
                <!-- Client Breief and Job Description End -->
                <hr />
                <!-- Archive Button -->
                <div class="row justify-content-center mt-4">
                    <?php if( sizeof($candidatesData)>0 && $job['JobStatus'] != "completed") :?>
                        <a class="btn btn-outline-danger col-md-3 col-9 m-2" href="<?php echo base_url()?>index.php/Jobs/updateJobToArchive/<?php echo $job['JobID'];?>">Send order to Archive</a>
                    <?php elseif( $job['JobStatus'] == 'completed'):?>
                    <a class="btn btn-outline-dark col-md-3 col-9 m-2" href="<?php echo base_url()?>index.php/Jobs/retrieveJob/<?php echo $job['JobID'];?>">Retrieve order from Archive</a>
                    <?php elseif( $job['JobStatus'] == 'published') :?>
                        <a class="btn btn-outline-dark col-md-3 col-9 m-2" href="<?php echo base_url()?>index.php/Jobs/jobUnpublish/<?php echo $job['JobID'];?>">Unpublish</a>
                    <?php endif;?>
                </div>
                <!-- Archive Button End -->


                
            </div>
                <!-- EndHere -->
                <hr class="border border-dark"/>
                <div class="dragscroll" style="overflow: scroll; cursor: grab; cursor : -o-grab; cursor : -moz-grab; cursor : -webkit-grab;">
                    <div  id="ajax-content">
                        <table class="table border-bottom border-dark">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <!-- <th scope="col">UndoSession</th> -->
                                    <th scope="col">Applicant_Name</th>
                                    <th scope="col">Contact_Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Applicant_Address</th>
                                    
                                    <th scope="col">Hours_worked</th>
                                    <th scope="col">Job_Rates</th>
                                    <th scope="col">Total_Earned</th>
                                    <th scope="col">Notes</th>
                                </tr>
                            </thead>
                            <tbody class="align-items-center">
                               
                                <tr v-for="candidate in candidates" :key="candidate.CandidateID">
                                <th scope="row"><div class="textInfoPos"><span class="textInfo">Remove Candidate</span><i v-on:click="removeAssignedCandidate(candidate.CandidateID)" style="font-size:25px" class="text-danger button icon ion-md-close-circle"></i></div></th>
                                <td><div class="textInfoPos"><span class="textInfo font-weight-bold" style="left:-50px;">Reset Data to 0</span><i v-on:click="resetCandidateData(candidate.CandidateID)" style="font-size:25px" class="text-secondary button icon ion-md-trash"></i></a></div></td>
                                <td><div class="textInfoPos"><span class="textInfo font-weight-bold" style="left:-50px;">Undo data</span><i v-on:click="undoData(candidate.CandidateID)" style="font-size:25px" class="text-info button icon ion-md-undo"></i></a></div></td>
                                <td v-text="candidate.FirstName +' '+ candidate.LastName"></td>
                                <td v-text="candidate.PhoneNumber"></td>
                                <td v-text="candidate.Email"></td>
                                <td v-text="candidate.Address"></td>
                                <td><input v-on:click="targetThisBox('hoursWorked'+candidate.CandidateID)" style="width:100px;" type="text" v-on:change="updateHoursWorked(candidate.CandidateID)" :id="'hoursWorked'+candidate.CandidateID" :placeholder="candidate.CandidateHoursWorked"></td>
                                <td><input v-on:click="targetThisBox('jobRate'+candidate.CandidateID)" type="text" style="width:100px;" v-on:change="updateJobRate(candidate.CandidateID)" :id="'jobRate'+candidate.CandidateID" :placeholder="candidate.JobRate"></td>
                                <td><input type="text" class="border-0" :id="'candidateEarnings'+candidate.CandidateID" style="width:100px;" :value="Number(candidate.CandidateEarnings).toFixed(2)"> </td>
                                <td><input v-on:click="targetThisBox('candidateNotes'+candidate.CandidateID)" type="text" v-on:change="updateCandidateNotes(candidate.CandidateID)" :id="'candidateNotes'+candidate.CandidateID" :placeholder="candidate.CandidateNotes"></td>
                                
                                </tr>
                            </tbody>
                        </table>
                    </div> <!--ajaxContentEnd-->
                </div> <!-- dragscroll -->

                <div class="text-center">
                    <a href="<?php echo base_url()?>index.php/CandidateMission/manageCandidate/jobDetails/<?php echo $job['JobID'];?>" class="col-md-3 col-6 btn btn-info my-5">Assign Candidate </a>
                </div>
            </div>
            <!-- Order Brief Tab End -->
            <!-- Attachment Tab -->
            <div class="tab-pane fade pb-5" id="attachment" role="tabpanel" aria-labelledby="attachment-tab">
            <div class="container">
            <div class="custom-file mt-5">
                <div class="text-center mb-3 font-weight-bold">Upload Attachment Here:</div>
                <div class="row justify-content-center container pr-1">
                <div class="col-md-7">
                <input type="file" class="custom-file-input" @change="uploadFileName" v-model="chosenFile" multiple="multiple" id="userFiles">
                <label class="custom-file-label" for="userFiles" v-text="labelFile"></label>
                </div>
                </div>
                <div class="row justify-content-center ">
                    <div class="col-md-2 col-6">
                    <button class="btn btn-light font-weight-bold border border-dark form-control mt-3" @click="uploadFiles">Upload Files</button>
                    </div>
                </div>
            </div>
                
                <!-- List of the files -->
                <div class="mt-5"><h2 class="text-dark">Files Attached:</h2> </div>
                <div class="d-flex mt-4">
                    
                    <span style="position:relative;top:3px;">TOB:</span>
                    <div class="col-md-3">
                    <select class="custom-select custom-select-sm" @change="updateTOB" v-model="TOBselected" id="TOBselectedID">
                        <option v-text="TOBselected" selected></option>
                        <option v-for="userFile in userFiles" :value="userFile" v-text="userFile"></option>
                    </select>
                    </div>
                </div>
                <div v-if="userFiles.length > 0" class="mt-3">
                    <div v-for="userFile in userFiles" class="">
                        
                        <div class="btn btn-danger border-danger" v-on:click="removingFile(userFile)" style="border-radius: 5px 0px 0px 5px">X</div><a class="btn btn-outline-dark px-5 my-1" style="border-radius:0px 5px 5px 0px;" :href="'<?php echo base_Url(); ?>index.php/Jobs/downloadFile/' + jobID + '/' + userFile">{{ userFile }}</a>
                        
                    </div>
                </div>
                <!-- List of the files end -->
            </div> <!--Container end -->
            <!-- Attachment Tab -->
            </div>
            <!-- Publish tab start -->
            <div class="tab-pane fade pb-5" id="publish" role="tabpanel" aria-labelledby="publish-tab">
                <!-- Editable Page For Job -->
               
                <div class="container mb-5">
                    <form action="<?php echo base_url()?>index.php/Jobs/jobPublish/<?php echo $job['JobID'];?>" method="post" enctype="multipart/form-data">
                        <div class="row justify-content-start">
                            <div class="col-12 mt-4">
                                <input type="text" class="form-control border border-0" value="<?php echo $job['PublishTitle'] ;?>" style="height:80px;font-size:48px;" placeholder="Enter Title" name="publishTitle"/>
                            </div>
                        </div>
                        <hr/>
                        <div class="row mt-4">
                            <div class="col-md-8">
                            <table class="table table-sm table-hover">
                                <tbody>
                                <legend class="text-md-left text-center">Job's classifications:</legend>
                                    <?php foreach($job as $key => $value):?>
                                        <?php if($value != NULL && ($key == 'JobTitle' || $key == 'JobType' || $key == 'City' || $key == 'Suburb' || $key == 'PublishDate') ):?>
                                        <tr>
                                        <th><?php if($key == 'JobTitle') { echo 'Job Title:'; } elseif( $key == 'JobType'){echo 'Job Type:';} elseif($key== 'PublishDate'){echo 'Publish Date:';} else { echo $key . ':';}?></th>
                                        <td><?php echo $value?></th>
                                        </tr>
                                        <?php endif?>
                                    <?php endforeach;?>
                                </tbody>
                            
                            </table>
                            </div>
                            <div class="mt-4 col-md-4 ">
                                    <div class="row justify-content-md-start justify-content-center">
                                    <?php $setImgPreviewID = "" ;?>
                                    <?php if(empty($job['JobImage'])):?>
                                        <?php $setImgPreviewID = "imgPreview" ;?>
                                        <img id="imgPreview" src="<?php echo base_url()?>lib/images/facebook.jpg" class="mx-md-2" style="width:275px;height:165px;">
                                    <?php else :?>
                                        <?php $setImgPreviewID = "imgPreview1" ;?>
                                        <img id="imgPreview1" src="<?php echo base_url() . 'lib/jobImages/' . $job['JobImage']?>"  class="mx-md-2" style="width:275px;height:165px;">
                                    <?php endif;?>
                                    </div>
                                    <div class="row justify-content-center">
                                    <input type="file" onchange="document.getElementById('<?php echo $setImgPreviewID ; ?>').src = window.URL.createObjectURL(this.files[0])" name="jobImage" class="offset-1 offset-md-0" required>
                                    </div>
                            </div>
                        </div>
                        <label for="thumbnailTextID" class="text-muted  mt-4">Briefs text for thumbnail: </label>
                        <textarea name="thumbnailText" id="thumbnailTextID" class="form-control" row="3"><?php if($job['ThumbnailText']== NULL){ echo 'Enter text for thumbnail';} else {echo $job['ThumbnailText'];};?></textarea>
                        <div class="mt-5">
                            <textarea name="editor1"><?php if($job['Editor1']==NULL){ echo 'Enter the text for job'; } else { echo $job['Editor1'] ;}?></textarea>
                        </div>
                        <div class="row justify-content-center">
                        <?php if($job['JobStatus']!='published'):?>
                        <input type="submit" value="Publish" class="col-md-3 col-6 btn btn-outline-dark mt-3"/>
                        <?php else: ?>
                        <a class="btn btn-outline-dark col-md-3 col-6 mt-3" href="<?php echo base_url()?>index.php/Jobs/jobUnpublish/<?php echo $job['JobID'];?>">Unpublish</a>
                        <?php endif;?>
                        </div>
                    </form>
                </div>

            </div>
            <!-- Publish tab end -->
        </div>
        <!-- Tab content End -->


</div> <!-- container -->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Vue -->
<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
<!-- check if the user did save the page or not after doing changes -->
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
        userFiles: <?php echo json_encode($userFiles)?>,
        jobID: "<?php echo $job['JobID'];?>",
        clientTitle: "<?php echo $job['ClientTitle'];?>",
        clientName: "<?php echo $job['ClientName'];?>",
        company: "<?php echo $job['Company'];?>",
        email: "<?php echo $job['Email'];?>",
        contactNumber: "<?php echo $job['ContactNumber'];?>",
        jobTitle: "<?php echo $job['JobTitle'];?>",
        jobType: "<?php echo $job['JobType'];?>",
        address: "<?php echo $job['Address'];?>",
        city: "<?php echo $job['City'];?>",
        suburb: "<?php echo $job['Suburb'];?>",
        
        chosenFile: "",
        labelFile: "",
        TOBselected: "<?php if(empty($job['TOB'])){ echo 'Open this select menu';} else { echo $job['TOB'];}?>",
        updatedTime: "<?php echo $job['UpdateDate'];?>",
        candidates: <?php echo json_encode($candidatesData); ?>,
        candidatesCopy: <?php echo json_encode($candidatesData); ?>,
        candidatesDataStack: [],
        toggleEdit: false,
    },
    methods: {
        uploadFiles: function() {
            console.log(this.jobID);
            this.message = "";
            var userFiles = document.getElementById("userFiles");
            var len = userFiles.files.length;
            for (var i = 0; i < len; i++) {
                console.log(userFiles.files[i].name)
                var formData = new FormData();
                formData.append('jobID', this.jobID);
                formData.append('userFile', userFiles.files[i]);
                var urllink = "<?php echo base_Url(); ?>" + 'index.php/jobs/uploadFiles/'
                this.$http.post(urllink, formData).then(function(res) {
                    var result = res.body
                    if(result.length>this.userFiles.length){
                    this.message = "Successful in uploading files"
                    this.userFiles = result
                    this.updatedTime = this.getCurrentDateTime()
                    } else {
                        this.message = 'Failure in uploading file, unallowed extensions or file is too big';
                    }
                }, function(res) {
                    this.message = res.body
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
            console.log(this.jobID);
            this.message = "";
                
             
                var formData = new FormData();
                formData.append('jobID', this.jobID);
                formData.append('userFile', userFileX);
                var urllink = "<?php echo base_Url(); ?>" + 'index.php/jobs/removeFile/'
                this.$http.post(urllink, formData).then(function(res) {
                    var result = res.body
                    if(result.length<this.userFiles.length){
                        this.message = "Successful in removing files"
                        this.userFiles = res.body
                        this.updatedTime = this.getCurrentDateTime()
                    } else {
                        this.message = "Failure in removing files"
                    }
                }, function(res) {
                    this.message = "Failure in removing files, Server Error"
                })
            
            $('#myModal').modal('show')
    
        },
        updateTOB: function(){
            this.message = "";
            this.updatedTime = this.getCurrentDateTime()
                var formData = new FormData();
                formData.append('jobID', this.jobID);
                formData.append('TOBfile', this.TOBselected);
                var urllink = "<?php echo base_Url(); ?>" + 'index.php/jobs/updateTOBfile/'
                this.$http.post(urllink, formData).then(function(res) {
                    var result = res.body
                    
                }, function(res) {
                    // this.message = "Failure in removing files, Server Error"
                })
            
            // $('#myModal').modal('show')
        },
        //toggle readonly and some other hidden element, so user can edit the input
        editButton: function(){
            this.toggleEdit = !this.toggleEdit
           
            if(this.toggleEdit){
                //since their indexes are at the beginning and they are sticking together
                //we are making it easy by just cycling the specific indexes 10 input and 1 textarea, and it wont affect other input
                for (i = 0; i < 10; i++) {
                    document.getElementsByTagName("input")[i].removeAttribute("readonly");
                }
                for (i = 0; i < 1; i++) {
                    document.getElementsByTagName("textarea")[i].removeAttribute("readonly");
                }
                
            } else {
                //since their indexes are at the beginning and they are sticking together
                //we are making it easy by just cycling the specific indexes 10 input and 1 textarea, and it wont affect other input
                for (i = 0; i < 10; i++) {
                    document.getElementsByTagName("input")[i].setAttribute("readonly", "readonly"); 
                }
                for (i = 0; i < 1; i++) {
                    document.getElementsByTagName("textarea")[i].setAttribute("readonly", "readonly");
                }
            }
        },
        submitButton: function() {
            
            var formData = new FormData()
            formData.append('jobID',this.jobID);
            formData.append('clientTitle',this.clientTitle)
            formData.append('clientName',this.clientName)
            formData.append('company',this.company)
            formData.append('email',this.email)
            formData.append('contactNumber',this.contactNumber)
            formData.append('jobTitle',this.jobTitle)
            formData.append('jobType',this.jobType)
            formData.append('address',this.address)
            formData.append('city',this.city)
            formData.append('suburb',this.suburb)
            formData.append('description',document.getElementById('descriptionID').value);
            
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/Jobs/updateJobData/'
            this.$http.post(urllink, formData).then(function(res) {
               
                //let the changes saved text appear with animation fade in fade out
                document.getElementById("savedMessage").removeAttribute("hidden");
                //document.getElementById("changeSavedBtn").classList
                document.getElementById("savedMessage").style.opacity = 0;
                document.getElementById('savedMessage').innerHTML = 'Changes Saved . . .'
                //add class transition animation from css file to savedMessage div
                document.getElementById("savedMessage").classList.add("fadeOutIn");
                //remove it after using it
                setTimeout(function(){document.getElementById("savedMessage").classList.remove("fadeOutIn");}, 1100);
                this.updatedTime = this.getCurrentDateTime()
            }, function(res) {
                // error callback
            });
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
        removeAssignedCandidate: function(candidateID){
            
            var formData = new FormData();
            formData.append('candidateID', candidateID);
            formData.append('jobID', this.jobID);
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/jobs/removeAssignedCandidate/'
            this.$http.post(urllink, formData).then(function(res) {
                var result = res.body
                this.candidates = result
            }, function(res) {
                // this.message = "Failure in removing applicant, Server Error"
            })
            this.updatedTime = this.getCurrentDateTime()
        },
        updateCandidateNotes: function(candidateID){
            
            var formData = new FormData();
            formData.append('candidateID', candidateID);
            formData.append('candidateNotes', document.getElementById('candidateNotes'+candidateID).value);
            formData.append('jobID',this.jobID);
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/jobs/updateCandidateNotes/'
            this.$http.post(urllink, formData).then(function(res) {
                var result = res.body
                this.candidates = result
                
                // this.message = res.body
                // $('#myModal').modal('show')
            }, function(res) {
                // this.message = "Failure in updating the notes"
            })
            this.updatedTime = this.getCurrentDateTime()
            
        },
        updateJobRate: function(candidateID){
            
            var jobRate = document.getElementById('jobRate'+candidateID).value;
            var index = -1;
            if(jobRate){
                if(isNaN(jobRate)){ alert('You cant enter a text for this field, please enter a number')} else {
                    
                    for(var i = 0 ; i < this.candidatesCopy.length; i++){
                        if(this.candidatesCopy[i]['CandidateID']== candidateID){
                            index = i;
                        }
                    }

                    var formData = new FormData();
                    formData.append('candidateID', candidateID);
                    formData.append('workingHoursSaved',this.candidatesCopy[index]['CandidateHoursWorked'])
                    formData.append('jobRate', jobRate);
                    formData.append('jobID',this.jobID);
                    var urllink = "<?php echo base_Url(); ?>" + 'index.php/jobs/updateJobRate/'
                    this.$http.post(urllink, formData).then(function(res) {
                        var result = res.body
                        this.candidates = result
                        
                        this.candidatesDataStack[candidateID].push(this.candidates[index])
                        this.updatedTime = this.getCurrentDateTime()
                    }, function(res) {
                        // this.message = "Failure in updating the notes"
                    })
                }
            }
        },
        updateHoursWorked: function(candidateID){
            
            var hoursWorked = document.getElementById('hoursWorked'+candidateID).value;
            var index = -1;
            if(hoursWorked){
                if(isNaN(hoursWorked)){ alert('You cant enter a text for this field, please enter a number')} else {
                    
                    for(var i = 0 ; i < this.candidatesCopy.length; i++){
                        if(this.candidatesCopy[i]['CandidateID']== candidateID){
                            index = i;
                        }
                    }

                    var formData = new FormData();
                    formData.append('candidateID', candidateID);
                    
                    formData.append('hoursWorked', hoursWorked);
                    formData.append('jobID',this.jobID);
                    var urllink = "<?php echo base_Url(); ?>" + 'index.php/jobs/updateHoursWorked/'
                    this.$http.post(urllink, formData).then(function(res) {
                        var result = res.body
                        this.candidates = result
                        this.candidatesDataStack[candidateID].push(this.candidates[index])
                        this.updatedTime = this.getCurrentDateTime()
                    }, function(res) {
                        // this.message = "Failure in updating the notes"
                    })
                }
            }
        },
        resetCandidateData: function(candidateID){
            
            var index = -1;
            for(var i = 0 ; i < this.candidatesCopy.length; i++){
                    if(this.candidatesCopy[i]['CandidateID']== candidateID){
                    index = i;
                }
            }

            var formData = new FormData();
            formData.append('candidateID', candidateID);
            formData.append('jobID', this.jobID);
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/jobs/resetCandidateData/'
            this.$http.post(urllink, formData).then(function(res) {
                var result = res.body
                this.candidates = result
                document.getElementById('hoursWorked'+candidateID).value = 0;
                document.getElementById('jobRate'+candidateID).value = 0;

                
                this.candidatesDataStack[candidateID].push(this.candidates[index])
            }, function(res) {
                // this.message = "Failure in removing applicant, Server Error"
            })
            this.updatedTime = this.getCurrentDateTime()
            
        },
        // to be able to select the input box inside the table and edit it
        // without this it wont work because we implement special scrollable
        targetThisBox: function(elementID){
            const input = document.getElementById(elementID);
            input.focus();
            input.select();
        },
        undoData: function(candidateID){
            
            var index = -1;
            //get index
            for(var i = 0 ; i < this.candidatesCopy.length; i++){
                    if(this.candidatesCopy[i]['CandidateID']== candidateID){
                    index = i;
                }
            }
           
            //check if it;s not empty
            if(this.candidatesDataStack[candidateID].length>0){
                //pop once
                var candidateData = this.candidatesDataStack[candidateID].pop()
                //there is a glitch with jobrate that prevent the user to undo the data because of 2 floating point conversion
                //and have to click twice
                while(candidateData['CandidateHoursWorked'] == this.candidates[index]['CandidateHoursWorked'] && candidateData['JobRate'] == this.candidates[index]['JobRate']){
                    candidateData = this.candidatesDataStack[candidateID].pop()
                }
            } else {
                //get the default value if it's empty
                var candidateData = this.candidatesCopy[index];
            }
                //update the data in document
                document.getElementById('hoursWorked'+candidateID).value = candidateData['CandidateHoursWorked'];
                
                document.getElementById('jobRate'+candidateID).value = candidateData['JobRate'];
        
                document.getElementById('candidateEarnings'+candidateID).value = candidateData['CandidateEarnings'];
                //update the database
                var formData = new FormData();
                formData.append('candidateID', candidateID);
                formData.append('jobID', this.jobID);
                formData.append('hoursWorked',document.getElementById('hoursWorked'+candidateID).value);
                formData.append('jobRate',document.getElementById('jobRate'+candidateID).value);
                formData.append('candidateEarnings',document.getElementById('candidateEarnings'+candidateID).value);
                var urllink = "<?php echo base_Url(); ?>" + 'index.php/jobs/undoCandidateData/'
                this.$http.post(urllink, formData).then(function(res) {
                    var result = res.body
                    this.candidates = result
                    
                }, function(res) {
                    // this.message = "Failure in removing applicant, Server Error"
                })
                this.updatedTime = this.getCurrentDateTime()
            
        }
    },
    mounted: function(){
        this.candidatesDataStack = [];
        for(var i = 0; i<this.candidatesCopy.length; i++){
            this.candidatesDataStack[this.candidatesCopy[i]['CandidateID']] = []
            this.candidatesDataStack[this.candidatesCopy[i]['CandidateID']].push(this.candidatesCopy[i])
        }
    }
});
</script>

<script>
    CKEDITOR.replace( 'editor1' );
</script>

