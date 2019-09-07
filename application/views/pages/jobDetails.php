
<div id="app">
<div style="height: 50px;"></div>

<h2 class="text-center"><?php echo $title; ?></h2>
<hr />

<div class="container mb-2 p-md-3">
<div class="row justify-content-center">

<div class="col-md-5">
<h2 class="text-lg-left text-center text-inline pb-3">Client's Brief: <b><?php if(empty($job['JobStatus'])){ echo "NULL";} else { echo strtoupper($job['JobStatus']);}?></b></h2>
    
    <table class="table table-sm table-hover">
    
    
    <tbody>
        <?php foreach($job as $key => $value):?>
        <?php if($key == 'JobID' || $key == 'Description' || $key == 'Editor1' || $key == 'ThumbnailText' || $key == 'JobStatus' || $key == 'PublishTitle' || $key == "PublishDate" || $key == "Bookmark" || $key == "JobImage" || $key == "Checked")  :?>
        <?php else :?>
        <tr>
        <th><?php if($key == 'Client Title'){ echo 'Client Title';} elseif ($key == 'ClientName') {
            echo 'Client Name';
        } elseif ($key == 'ContactNumber') {echo 'Contact Number';} elseif ($key == 'JobTitle') {
            echo 'Job Title';
        } elseif ($key == 'JobType') { echo 'Job Type';} elseif ($key == 'JobSubmittedDate') { echo 'Job Submitted Date';} else { echo $key;};?></th>
        <td><?php echo $value?></th>
        </tr>
            <?php endif?>
        <?php endforeach;?>
        
    </tbody>
    </table>
    </div>
    <div class="col-md-7 mt-4 mt-md-0">
    <div class="container">
        <h2 class="text-center font-weight-bold pb-2">Job Description</h2>
        <hr/>
        <textarea readonly class="form-control-plaintext ml-3" id="exampleFormControlTextarea1" rows="5">
            <?php echo $job['Description'] ;?>
        </textarea>
    </div>
    </div>
</div>
<hr />
    <div class="row justify-content-center">
    <?php if( sizeof($candidatesData)>0 && $job['JobStatus'] != "completed") :?>
        <a class="btn btn-outline-danger col-md-3 col-9 m-2" href="<?php echo base_url()?>index.php/Jobs/updateJobToArchive/<?php echo $job['JobID'];?>">Send job to Archive</a>
    <?php endif;?>
    <?php if( $job['JobStatus'] == 'published') :?>
        <a class="btn btn-outline-dark col-md-3 col-9 m-2" href="<?php echo base_url()?>index.php/Jobs/jobUnpublish/<?php echo $job['JobID'];?>">Unpublish job</a>
    <?php endif;?>
    </div>
</div>
    


<!-- Editable Page For Job -->
<h2 class="text-center mt-md-0 mt-5">WebContent</h2>
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
<div class="container-fluid">
<div class="dragscroll" style="overflow: scroll; cursor: grab; cursor : -o-grab; cursor : -moz-grab; cursor : -webkit-grab;">
        <div  id="ajax-content">
        <table class="table border-bottom border-dark"><thead>
        <tr>
        <th scope="col"></th>
        <th scope="col"></th>
        <!-- <th scope="col">UndoSession</th> -->
        <th scope="col">Applicant_Name</th>
        <th scope="col">Contact_Number</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Job_Type</th>
        <th scope="col">Hours_worked</th>
        <th scope="col">Job_Rates</th>
        <th scope="col">Total_Earned</th>
        <th scope="col">Employee Notes</th>
        </tr>
    	</thead><tbody class="align-items-center">
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
</div>
   
</div>
    <div class="row justify-content-center">
        <a href="<?php echo base_url()?>index.php/CandidateMission/manageCandidate/jobDetails/<?php echo $job['JobID'];?>" class="col-md-3 col-6 btn btn-info my-5">Assign Candidate </a>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<script>
    CKEDITOR.replace( 'editor1' );
</script>
<script>
    //to be able to select the input box inside the table and edit it // without this it wont work because we implement scrollable
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