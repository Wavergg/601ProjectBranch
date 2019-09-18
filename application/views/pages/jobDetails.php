
<div id="app">
    <div style="height: 50px;"></div>
    <div class="container mb-2 p-md-3">
        <h2 class="text-center"><?php echo $title; ?></h2>
        <hr />
        <div class="d-flex">
            <small class="ml-auto text-muted pt-1">Last Updated: <span v-text="updatedTime"></span></small>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">

            <li class="nav-item">
                <a class="nav-link active" id="orderBrief-tab" data-toggle="tab" href="#orderBrief" role="tab"
                    aria-controls="orderBrief" aria-selected="true">Order Brief</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="attachment-tab" data-toggle="tab" href="#attachment" role="tab"
                    aria-controls="attachment" aria-selected="false">Attachment</a>
            </li>
        </ul>
        
        <!-- Tab content -->
        <div class="tab-content mt-4" id="myTabContent">
            <!-- Order Brief Tab -->
            <div class="tab-pane fade  show active" id="orderBrief" role="tabpanel" aria-labelledby="orderBrief-tab">
            
                <!-- Client Breief and Job Description -->
                <div class="row justify-content-center">
                    <!-- Client Brief -->
                    <div class="col-md-5">
                        <h2 class="text-lg-left text-center text-inline pb-3">Client's Brief: <b><?php if(empty($job['JobStatus'])){ echo "NULL";} else { echo strtoupper($job['JobStatus']);}?></b></h2>
                        <table class="table table-sm table-hover">
                            <tbody>
                                <?php foreach($job as $key => $value):?>
                                <?php if($key == 'JobID' || $key=='TOB' || $key=='UpdateDate' || $key == 'Description' || $key == 'Editor1' || $key == 'ThumbnailText' || $key == 'JobStatus' || $key == 'PublishTitle' || $key == "PublishDate" || $key == "Bookmark" || $key == "JobImage" || $key == "Checked")  :?>
                                <?php else :?>
                                <tr>
                                <th><?php if($key == 'Client Title'){ echo 'Client Title';} elseif ($key == 'ClientName') {
                                    echo 'Client Name';
                                } elseif ($key == 'ContactNumber') {echo 'Contact Number';} elseif ($key == 'JobTitle') {
                                    echo 'Job Title';
                                } elseif ($key == 'JobType') { echo 'Job Type';} elseif ($key == 'JobSubmittedDate') { echo 'Job Submitted Date';} else { echo $key;};?></th>
                                <td><?php if($key=='JobSubmittedDate'){ $newVal = explode(' ',$value); echo $newVal[0];} else {echo $value;}?></th>
                                </tr>
                                    <?php endif?>
                                <?php endforeach;?>
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- Client Brief End -->
                    <!-- Job Description -->
                    <div class="col-md-7 mt-4 mt-md-0">
                        <div class="container">
                            <h2 class="text-center font-weight-bold pb-2">Job Description</h2>
                            <hr/>
                            <textarea readonly class="form-control-plaintext ml-3" id="exampleFormControlTextarea1" rows="5">
                                <?php echo $job['Description'] ;?>
                            </textarea>
                        </div>
                    </div>
                    <!-- Job Description End -->
                </div>
                <!-- Client Breief and Job Description End -->
                <hr />
                <!-- Archive Button -->
                <div class="row justify-content-center">
                    <?php if( sizeof($candidatesData)>0 && $job['JobStatus'] != "completed") :?>
                        <a class="btn btn-outline-danger col-md-3 col-9 m-2" href="<?php echo base_url()?>index.php/Jobs/updateJobToArchive/<?php echo $job['JobID'];?>">Send order to Archive</a>
                    <?php elseif( $job['JobStatus'] == 'completed'):?>
                    <a class="btn btn-outline-dark col-md-3 col-9 m-2" href="<?php echo base_url()?>index.php/Jobs/retrieveJob/<?php echo $job['JobID'];?>">Retrieve order from Archive</a>
                    <?php elseif( $job['JobStatus'] == 'published') :?>
                        <a class="btn btn-outline-dark col-md-3 col-9 m-2" href="<?php echo base_url()?>index.php/Jobs/jobUnpublish/<?php echo $job['JobID'];?>">Unpublish order</a>
                    <?php endif;?>
                </div>
                <!-- Archive Button End -->


                <!-- Editable Page For Job -->
                <h2 class="text-center mt-md-0 pt-3 mt-5">WebContent</h2>
                <hr class="border border-dark"/>
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
                        <input type="submit" value="Publish" class="col-md-3 col-6 btn btn-outline-dark mt-3"/>
                        </div>
                    </form>
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
                                    <!-- <th scope="col">UndoSession</th> -->
                                    <th scope="col">Applicant_Name</th>
                                    <th scope="col">Contact_Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Applicant_Address</th>
                                    <th scope="col">Job_Type</th>
                                    <th scope="col">Hours_worked</th>
                                    <th scope="col">Job_Rates</th>
                                    <th scope="col">Total_Earned</th>
                                    <th scope="col">Employee Notes</th>
                                </tr>
                            </thead>
                            <tbody class="align-items-center">
                                <?php foreach ($candidatesData as $candidateData):?>
                                <?php $savedCandidateEarnings[$candidateData['CandidateID']] = $candidateData['CandidateEarnings'];?>
                                <?php $savedWorkRate[$candidateData['CandidateID']] = $candidateData['JobRate'];?>
                                <?php $savedHoursWorked[$candidateData['CandidateID']] = $candidateData['CandidateHoursWorked'];?>
                                <form>
                                <tr id="targetRow<?php echo $candidateData['CandidateID'];?>"><th scope="row">
                                
                                <div class="textInfoPos"><span class="textInfo">Remove Candidate</span><a onclick="removeAssignedCandidate(<?php echo $candidateData['CandidateID']?>)" class="text-danger"><i style="font-size:25px" class="icon ion-md-close-circle"></i> </a></div></th>
                                <td><div class="textInfoPos"><span class="textInfo font-weight-bold" style="left:-50px;">Reset Data to 0</span><a onclick="resetCandidateData(<?php echo $candidateData['CandidateID']?>)" class="text-secondary" ><i style="font-size:25px" class="icon ion-md-trash"></i></a></div></td>
                                <td><?php echo $candidateData['FirstName'] . ' ' . $candidateData['LastName'];?></td>
                                <td><?php echo $candidateData['PhoneNumber'];?></td>
                                <td><?php echo $candidateData['Email'];?></td>
                                <td><?php echo $candidateData['Address'];?></td>
                                <td><?php echo $candidateData['JobType'];?></td>
                                
                                <td><input onclick="targetThisBox('hoursWorked<?php echo $candidateData['CandidateID']?>')" type="text" id="hoursWorked<?php echo $candidateData['CandidateID']?>" onchange="updateHoursWorked(<?php echo $candidateData['CandidateID']?>,<?php echo $savedHoursWorked[$candidateData['CandidateID']] ;?>)" placeholder="<?php echo $candidateData['CandidateHoursWorked'];?>"></td>
                                <td><input onclick="targetThisBox('jobRate<?php echo $candidateData['CandidateID']?>')" type="text" id="jobRate<?php echo $candidateData['CandidateID']?>" onchange="updateJobRate(<?php echo $candidateData['CandidateID']?>,<?php echo $savedHoursWorked[$candidateData['CandidateID']] ;?>)" placeholder="<?php echo $candidateData['JobRate'];?>"></td>
                                <td><input type="text" class="border-0" id="candidateEarnings<?php echo $candidateData['CandidateID']?>" value="<?php printf('%.2f',$candidateData['CandidateEarnings']);?>"> </td>
                                <td><input onclick="targetThisBox('candidateNotes<?php echo $candidateData['CandidateID']?>')" type="text" id="candidateNotes<?php echo $candidateData['CandidateID']?>" onchange="updateCandidateNotes(<?php echo $candidateData['CandidateID']?>,<?php echo $savedHoursWorked[$candidateData['CandidateID']] ;?>)" placeholder="<?php echo $candidateData['CandidateNotes'];?>"></td>
                                
                                </tr>
                                
                                </form>
                                
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div> <!--ajaxContentEnd-->
                </div> <!-- dragscroll -->

                <div class="row justify-content-center">
                    <a href="<?php echo base_url()?>index.php/CandidateMission/manageCandidate/jobDetails/<?php echo $job['JobID'];?>" class="col-md-3 col-6 btn btn-info my-5">Assign Candidate </a>
                </div>
            </div>
            <!-- Order Brief Tab End -->
            <!-- Attachment Tab -->
            <div class="tab-pane fade pb-5" id="attachment" role="tabpanel" aria-labelledby="attachment-tab">
            
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
                <div class="mt-4"><h2 class="text-dark">Files Attached:</h2> </div>
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
            </div>
            <!-- Attachment Tab -->
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

<script>
var app = new Vue({
    el: '#app',
    data: {
        message: "",
        userFiles: <?php echo json_encode($userFiles)?>,
        jobID: "<?php echo $job['JobID'];?>",
        chosenFile: "",
        labelFile: "",
        TOBselected: "<?php if(empty($job['TOB'])){ echo 'Open this select menu';} else { echo $job['TOB'];}?>",
        updatedTime: "<?php echo $job['UpdateDate'];?>",
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
                this.$http.post(urllink, formData).then(res => {
                    var result = res.body
                    if(result.length>this.userFiles.length){
                    this.message = "Successful in uploading files"
                    this.userFiles = result
                    this.updatedTime = this.getCurrentDateTime()
                    } else {
                        this.message = 'Failure in uploading file, unallowed extensions or file is too big';
                    }
                }, res => {
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
        updateTOB: function(){
            this.message = "";
            this.updatedTime = this.getCurrentDateTime()
                var formData = new FormData();
                formData.append('jobID', this.jobID);
                formData.append('TOBfile', this.TOBselected);
                var urllink = "<?php echo base_Url(); ?>" + 'index.php/jobs/updateTOBfile/'
                this.$http.post(urllink, formData).then(res => {
                    var result = res.body
                    
                }, res => {
                    // this.message = "Failure in removing files, Server Error"
                })
            
            // $('#myModal').modal('show')
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
    }
});
</script>

<script>
    CKEDITOR.replace( 'editor1' );
</script>
<script>
    //to be able to select the input box inside the table and edit it
    // without this it wont work because we implement scrollable
        function targetThisBox(elementID){
            const input = document.getElementById(elementID);
            input.focus();
            input.select();
        }
var xRequest = new XMLHttpRequest();
function updateHoursWorked($candidateID,$workingHoursSaved) {
        var hoursWorked = document.getElementById('hoursWorked'+$candidateID).value;
        if(hoursWorked){
            if(isNaN(hoursWorked)){ alert('You cant enter a text for this field, please enter a number')} else {
            var the_data = 'candidateID='+$candidateID+'&hoursWorked='+hoursWorked+'&workingHoursSaved='+$workingHoursSaved;
            xRequest.open("POST",'<?php echo base_url()?>index.php/Jobs/updateHoursWorked/'+$candidateID,true)
            xRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
                xRequest.send(the_data);
                xRequest.onload = function(){
                        document.getElementById('targetRow'+$candidateID).innerHTML = xRequest.responseText;
                };
            };
        }
    }

function updateJobRate($candidateID,$workingHoursSaved) {
    var jobRate = document.getElementById('jobRate'+$candidateID).value;
    if(jobRate){
        if(isNaN(jobRate)){ alert('You cant enter a text for this field, please enter a number')} else {
        var the_data = 'jobRate='+jobRate+'&workingHoursSaved='+$workingHoursSaved;
        
        xRequest.open("POST",'<?php echo base_url()?>index.php/Jobs/updateJobRate/'+$candidateID,true)
        xRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
            xRequest.send(the_data);
            xRequest.onload = function(){
                document.getElementById('targetRow'+$candidateID).innerHTML = xRequest.responseText;
            };
        };
    }
}

function updateCandidateNotes($candidateID,$workingHoursSaved){
    var the_data = 'candidateNotes='+document.getElementById('candidateNotes'+$candidateID).value+'&workingHoursSaved='+$workingHoursSaved;

    xRequest.open("POST",'<?php echo base_url()?>index.php/Jobs/updateCandidateNotes/'+$candidateID+'/'+'jobDetails',true)
    xRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    xRequest.send(the_data);
    xRequest.onload = function(){
        document.getElementById('targetRow'+$candidateID).innerHTML = xRequest.responseText;
    };
}

function removeAssignedCandidate($candidateID){
    var the_data = 'candidateID='+$candidateID;
    xRequest.open("POST","<?php echo base_url()?>index.php/Jobs/removeAssignedCandidate/"+$candidateID+"/<?php echo $job['JobID'];?>",true)
    
    xRequest.send(the_data);
    xRequest.onload = function(){
        document.getElementById('ajax-content').innerHTML = xRequest.responseText;
    };
}

function resetCandidateData($candidateID){
    
    var the_data = 'workingHoursSaved='+0;
    xRequest.open("POST","<?php echo base_url()?>index.php/Jobs/resetCandidateData/"+$candidateID,true)
    xRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xRequest.send(the_data);
    xRequest.onload = function(){
        document.getElementById('targetRow'+$candidateID).innerHTML = xRequest.responseText;
    };
}

</script>
