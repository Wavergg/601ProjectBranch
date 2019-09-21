
<div id="app">
    <div style="height: 50px;"></div>

    <h2 class="text-center"><?php echo $title; ?></h2>
    <hr />
    
    <ul class="nav nav-tabs flex-sm-row" id="myTab" role="tablist">
        <li class="nav-item ml-auto text-sm-center">
            <a class="nav-link active" id="OrdersArchives-tab" data-toggle="tab" href="#OrdersArchives" role="tab" aria-controls="OrdersArchives" aria-selected="true">Orders Archives</a>
        </li>
        <li class="nav-item mr-auto text-sm-center">
            <a class="nav-link " id="applicantsArchives-tab" data-toggle="tab" href="#applicantsArchives" role="tab" aria-controls="applicantsArchives" aria-selected="false">Applicants Archives</a>
        </li>
    </ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="OrdersArchives" role="tabpanel" aria-labelledby="OrdersArchives-tab">
        <div class="container mt-5">

        <!-- Collapse -->
        <a class="btn btn-outline-dark border border-dark form-control" style="border-radius: 15px 15px 0px 0px;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        <span class="font-weight-bold">Order Filters</span><i class="ml-1 icon ion-md-barcode mx-3"></i></a>

        <div class="collapse border border-dark p-5 bg-white" style="border-radius: 0px 0px 15px 15px;" id="collapseExample">
            <div class="form-row mt-1">
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="company">Company:</label>
                    <input type="text" class="form-control" name="companyName" v-model="jobFilterCompany" id="company" placeholder="Company Name">
                </div>
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="city">City:</label>
                    <input type="text" class="form-control" name="cityName" v-model="jobFilterCity" id="city" placeholder="City">
                </div>
                <!-- <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="jobTitle">Job Title:</label>
                    <input type="text" class="form-control" name="jobTitleName" v-model="filterJobTitle" id="jobTitle" placeholder="Job Title">
                </div> -->
                <!-- <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="ContactNumber">Contact Number:</label>
                    <input type="text" class="form-control" name="contactNumberName" v-model="filterContactNumber" id="ContactNumber" placeholder="Contact Number">
                </div> -->
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="ContactPerson">Contact person name:</label>
                    <input type="text" class="form-control" name="contactPersonName" v-model="jobFilterContactPerson" id="ContactPerson" placeholder="Contact person name">
                </div>
            </div>
            <button class="btn btn-outline-info " @click="jobApplyFilters">Apply</button>
            <a href="<?php echo base_url()?>index.php/Archive" class="btn btn-outline-dark mx-2">Clear</a>

        </div>
        <!-- Collapse End -->



        </div>
        <!-- Table -->
        <div class=" mb-5 px-5">
        <div class="dragscroll" style=" overflow: scroll; cursor: grab; cursor : -o-grab; cursor : -moz-grab; cursor : -webkit-grab;" >

            <table class="table table-hover mt-5 mr-5">
        
                <thead>
                    <tr>
                        <!-- <th scope="col" ><a href="#"  @click.stop.prevent="sortBy('Bookmark')" class="text-dark "><img src="<?php echo base_url();?>lib/images/Bookmark1.png" style="height: 16px; width:16px;"></a></th> -->
                        <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="">Details</a></th>
                        <th scope="col" >TOB</th>
                        <th scope="col" ><a href="#" class="text-dark py-2" @click.stop.prevent="sortBy('UpdateDate')">Update_Date</a></th>
                        <th scope="col" ><a href="#" class="text-dark p-2 pr-3" @click.stop.prevent="jobSortBy('ClientTitle')">Title</a></th>
                        <th scope="col" ><a href="#" class="text-dark p-2 pr-3" @click.stop.prevent="jobSortBy('ClientName')">Name</a></th>
                        <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="jobSortBy('Company')">Company</a></th>
                        <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="jobSortBy('Email')">Email</a></th>
                        <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="jobSortBy('ContactNumber')">Contact Number</a></th>
                        <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="jobSortBy('JobTitle')">Job Title</a></th>
                        <!-- <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="sortBy('JobType')">Job Type</a></th> -->
                        <!-- <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="sortBy('Address')">Address</a></th> -->
                        <th scope="col" ><a href="#" class="text-dark  p-2 pr-3" @click.stop.prevent="jobSortBy('City')">City</a></th>
                        <!-- <th scope="col" >Description</th> -->
                        <!-- <th scope="col" ><a href="#" class="text-dark py-2" @click.stop.prevent="sortBy('JobSubmittedDate')">DateSubmitted</a></th> -->
                    
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="job in jobs" :key="job.JobID">
                        
                        <!-- <td ><input type="checkbox" :id="job.bookmarkUrl" v-on:click="updateBookmark(job.JobID)" :checked="job.bookmarkStat"></td> -->
                        <td class="textInfoPos"><span class="textInfo text-center" style="left: -35px;width:190px;">See Job's Details</span><a :href="job.ref" role="button"><i style="font-size:30px;" class="ml-1 icon ion-md-document mx-3"></i></a></td>
                        <th class="textInfoPos" ><span class="textInfo text-center" style="left: -45px;width:160px;">Download TOB</span><a class="btn btn-outline-dark px-2" :href="'<?php echo base_Url(); ?>index.php/Jobs/downloadTOB/'+ job.JobID +'/'+job.TOB">TOB</a></th>
                        <td v-text="job.UpdateDate"></td>
                        <td v-text="job.ClientTitle" ></td>
                        <td v-text="job.ClientName" ></td>
                        <td v-text="job.Company" ></td>
                        <td v-text="job.Email" ></td>
                        <td v-text="job.ContactNumber"></td>
                        <td v-text="job.JobTitle" ></td>
                        <!-- <td v-text="job.JobType" ></td>
                        <td v-text="job.Address" ></td> -->
                        <td v-text="job.City" ></td>
                        <!-- <td v-text="job.Description" ></td>
                        <td v-text="job.JobSubmittedDate" ></td> -->
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
        <!-- Table End --> 
        <div class="row  justify-content-center mb-4">
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item" v-for="pageNum in jobPageNums" :key="pageNum.id" :class="{ active: pageNum.isActive }">
                <div v-if="pageNum.id >= jobCurrentPageID-2 && pageNum.id <= jobCurrentPageID + 2">
                    <a class="page-link"  href="#" @click.stop.prevent="getJobs(pageNum.id)">{{ pageNum.id + 1 }}</a>
                </div>
            </li>
        </ul>
        </nav>
        </div>
  </div> <!--end order tab-->
  <!-- start applicant Tab -->
  <div class="tab-pane fade" id="applicantsArchives" role="tabpanel" aria-labelledby="applicantsArchives-tab">
  <div class="container mt-5">
        <!-- <a href="<?php echo base_url()?>index.php/CandidateMission/addingNewCandidateStaffOnly">
            <button type="button" style="position:fixed;right: 20px; bottom:20px;z-index:1" class="btn btn-dark btn-lg border-white">
            <i style="font-size:30px;" class="icon ion-md-add m-1 text-white"></i>
            </button>
        </a> -->
        <!-- Collapse -->
        <a class="btn btn-outline-dark border border-dark form-control" style="border-radius: 15px 15px 0px 0px;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        <span class="font-weight-bold">Applicant Filters</span><i class="ml-1 icon ion-md-barcode mx-3"></i></a>

        <div class="collapse border border-dark p-5 bg-white" style="border-radius: 0px 0px 15px 15px;" id="collapseExample">
            <div class="form-row mt-1">
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="JobInterest">Profession:</label>
                    <input type="text" class="form-control" v-model="filterCandidateJobInterest" id="JobInterest" placeholder="Job Interest">
                </div>
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="FirstName">First Name:</label>
                    <input type="text" class="form-control" v-model="filterCandidateFirstName" id="FirstName" placeholder="FirstName">
                </div>
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="LastName">Last Name:</label>
                    <input type="text" class="form-control" v-model="filterCandidateLastName" id="LastName" placeholder="LastName">
                </div>
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="City">City:</label>
                    <input type="text" class="form-control" v-model="filterCandidateCity" id="City" placeholder="City">
                </div>
                
            </div>
            <button class="btn btn-outline-info " @click="candidateApplyFilters">Apply</button>
            <button class="btn btn-outline-dark mx-2" @click="clearFilters">Clear</button>

            
        </div>
        <!-- Collapse End -->

        
        
    </div>
    <!-- Table -->
    <div class=" mb-5 px-5">
    <div class="dragscroll" style="overflow: scroll; cursor: grab; cursor : -o-grab; cursor : -moz-grab; cursor : -webkit-grab;" >
        
            <table class="table table-hover mt-5 mr-5" id="candidateTable">
           
                <thead>
                    <tr>
                        <th scope="col"><a href="#" class="text-dark" @click.stop.prevent="">Details</a></th>
                        <th scope="col" >CV</th>
                        <th scope="col" ><a href="#" class="text-dark pr-5" @click.stop.prevent="candidateSortBy('ApplyDate')">Updated_Date</a></th>
                        <th scope="col" ><a href="#" class="text-dark pr-5" @click.stop.prevent="candidateSortBy('FirstName')">First_Name</a></th>
                        <th scope="col" ><a href="#" class="text-dark pr-5" @click.stop.prevent="candidateSortBy('LastName')">Last_Name</a></th>
                        <th scope="col" ><a href="#" class="text-dark pt-5 pr-5 pb-3 pl-0" @click.stop.prevent="candidateSortBy('JobInterest')">Profession</a></th>
                        
                        <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="">Phone_Number</a></th>
                        <th scope="col" ><a href="#" class="text-dark pt-5 pr-5 pb-3 pl-0" @click.stop.prevent="candidateSortBy('City')">City</a></th>
                        
                        <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="">Email</a></th>
                      
                        <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="">Notes</a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="candidate in candidatesCopy" :key="candidate.CandidateID" :id="'row'+candidate.CandidateID">
                        <th class="textInfoPos"><span class="textInfo text-center" style="left: -35px;width:190px;">See Candidate's Details</span><a v-on:click="getUrl(candidate.CandidateID)" role="button" class="text-primary"><i style="font-size:30px;" class="ml-1 icon ion-md-document mx-3"></i></a></th>
                        <th class="textInfoPos" ><span class="textInfo text-center" style="left: -45px;width:160px;">Download <br>Candidate's CV</span><a class="btn btn-outline-dark px-2" :href="'<?php echo base_Url(); ?>index.php/candidateMission/downloadCV/' + candidate.JobCV">CV</a></th>
                        <th v-text="candidate.ApplyDate"></th>
                        <th v-text="candidate.FirstName" ></th>
                        <th v-text="candidate.LastName" ></th>
                        <th v-text="candidate.JobInterest" ></th>
                        <th v-text="candidate.PhoneNumber" ></th>
                        <th v-text="candidate.City" ></th>
                        <th v-text="candidate.Email" ></th>
                        <th ><input type="text" @click="targetThisBox(candidate.CandidateID)" v-on:keyup.enter="clearSelection()" :id="candidate.CandidateID" v-on:change="updateNotes(candidate.CandidateID)" :value="candidate.CandidateNotes"></th>

                    </tr>
                </tbody>
                
            </table>
           
        </div>
    </div>
    <!-- Table End -->

    <!-- Pagination -->
    <nav aria-label="Candidate Page">
        <ul class="pagination justify-content-center">
            
            <li class="page-item" v-for="candidatePageNum in candidatePageNums" :key="candidatePageNum.id" :class="{ active: candidatePageNum.isActive }">
                <div v-if="candidatePageNum.id >= candidateCurrentPageID-2 && candidatePageNum.id <= candidateCurrentPageID + 2">
                    <a class="page-link"  href="#" @click.stop.prevent="getCandidates(candidatePageNum.id)">{{ candidatePageNum.id + 1 }}</a>
                </div>
            </li>
            
            
        </ul>
    </nav>
  </div>
  <!-- end applicant tab -->
</div>
    
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Action {{ errMessage }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ errors }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal END -->
</div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>

<script>
var app = new Vue({
    el: '#app',
    data: {
        errMessage: "",
        errors: "",
        bookmarkID: "",
        toggle: false,
        //jobArchive
        jobs: <?php echo json_encode($jobs); ?>,
        jobsCopy: [],
        archiveJobNum: <?php echo $archiveJobNum;?>,
        // filters job archive
        jobFilterCompany: "",
        jobFilterCity: "",
        jobFilterContactPerson: "",
        jobPageNums:[
            {id: 1, isActive: true}
        ],
        //candidateArchive
        candidates: <?php echo json_encode($candidates); ?>,
        candidatesCopy: [],
        candidateNum: <?php echo $candidateNum; ?>,
        fromPage: "<?php echo $fromPage;?>",
        // filters
        filterCandidateJobInterest: "",
        filterCandidateFirstName: "",
        filterCandidateCity: "",
        filterCandidateLastName: "",
        // pages
        candidatePageNums:[
            {id: 1, isActive: true}
        ],
    },
    methods: {
        //sort function by clicking on table header
        jobSortBy: function(sortKey) {
            this.toggle = !this.toggle;
            if(this.toggle){
                this.jobs.sort(function(a, b){
                    return a[sortKey].localeCompare(b[sortKey]);
                })
            } else {
                this.jobs.sort(function(a, b){
                    return b[sortKey].localeCompare(a[sortKey]);
                })
            }
        },
        //get next page
        getJobs: function(offset){
            for(var i=0; i<this.jobPageNums.length; i++){
                if(this.jobPageNums[i].id == offset){
                    this.jobPageNums[i].isActive = true;
                } else {
                    this.jobPageNums[i].isActive = false;
                }
            }
            var formData = new FormData()
            formData.append('offset', offset);
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/Archive/getJobsArchive'
            this.$http.post(urllink, formData).then(function(res) {
                var result = res.body
                this.jobs = result
            }, function(res) {
                // error callback
                
            })
        },
        jobApplyFilters: function(){
            
            var formData = new FormData()
            formData.append('companyName',this.jobFilterCompany);
            formData.append('cityName', this.jobFilterCity);
            // formData.append('jobTitleName',this.filterJobTitle);
            // formData.append('contactNumberName',this.filterContactNumber);
            formData.append('contactPersonName',this.jobFilterContactPerson);
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/Archive/applyFilterArchive'
            this.$http.post(urllink, formData).then(function(res) {
                var result = res.body
                this.jobs = result
                //initialize new pagenum
                this.jobPageNums = [];
                for(var i=0; i<this.jobs.length; i=i+10){
                    this.jobPageNums.push({id: i, isActive: false});
                }
                this.jobPageNums[0].isActive = true;
                
            }, function(res) {
                // error callback
                
            })
        },
        candidateApplyFilters: function(){
            var formData = new FormData()
            formData.append('offset',1)
            formData.append('jobInterest',this.filterCandidateJobInterest);
            formData.append('city', this.filterCandidateCity);
            formData.append('firstName',this.filterCandidateFirstName);
            formData.append('lastName',this.filterCandidateLastName);
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/CandidateMission/applyFilterCandidate/<?php echo $fromPage;?>'
            this.$http.post(urllink, formData).then(function(res) {
                var result = res.body

                this.candidatesCopy = result
            
                this.candidatePageNums = [];
                for(var i=0; i<this.candidatesCopy.length; i=i+10){
                    this.candidatePageNums.push({id: i, isActive: false});
                }
                this.candidatePageNums[0].isActive = true;
                
            }, function(res) {
            })
        },
        clearFilters: function(){
           
            this.filterCandidateJobInterest = "";
            this.filterCandidateFirstName = "";
            this.filterCandidateCity = "";
            this.filterCandidateLastName = "";
            this.candidateApplyFilters();
            
        },
        candidateSortBy: function(sortKey) {
            this.toggle = !this.toggle;
            if(this.toggle){
                this.candidatesCopy.sort(function(a, b){
                    return a[sortKey].localeCompare(b[sortKey]);
                })
            } else {
                this.candidatesCopy.sort(function(a, b){
                    return b[sortKey].localeCompare(a[sortKey]);
                })
            }
        },
        targetThisBox: function(elementID){
            const input = document.getElementById(elementID);
            input.focus();
            input.select();
        },
        clearSelection: function(){
            if (window.getSelection) {window.getSelection().removeAllRanges();document.activeElement.blur();}
            else if (document.selection) {document.selection.empty();}
        },
        getCandidates: function(offset){
            for(var i=0; i<this.candidatePageNums.length; i++){
                if(this.candidatePageNums[i].id == offset){
                    this.candidatePageNums[i].isActive = true;
                } else {
                    this.candidatePageNums[i].isActive = false;
                }
            }
            var formData = new FormData()
            formData.append('offset',offset)
            formData.append('jobInterest',this.filterCandidateJobInterest);
            formData.append('city', this.filterCandidateCity);
            formData.append('firstName',this.filterCandidateFirstName);
            formData.append('lastName',this.filterCandidateLastName);
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/CandidateMission/getCandidates/<?php echo $fromPage;?>'
            this.$http.post(urllink, formData).then(function(res) {
                var result = res.body
                this.candidatesCopy = result
            }, function(res) {
            })
        },
        updateNotes: function(candidateID){
            
            var formData = new FormData()
            formData.append('candidateNotes', document.getElementById(candidateID).value);
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/Jobs/updateCandidateNotes/'+candidateID+'/'+'manageCandidate'
            this.$http.post(urllink, formData).then(function(res) {
                var result = res.body;
                //update the changes into the data in current page.
                for(var i=0; i<this.candidates.length; i++){
                    if(this.candidates[i].CandidateID == candidateID){
                        this.candidates[i].CandidateNotes = document.getElementById(candidateID).value;
                        this.candidatesCopy[i].CandidateNotes = this.candidates[i].CandidateNotes;
                    }
                }
                
                $('#'+candidateID).html(result);
            }, function(res) {
                // error callback
                
            })
        },
        getUrl: function(candidateID){
            var issetJob = "<?php if(isset($job['JobID'])){ echo $job['JobID'];}?>"
            var goToUrl = "<?php echo base_url() . 'index.php/CandidateMission/candidateDetails/';?>"+candidateID +"/"+issetJob;
            document.location.href = goToUrl;
        },
        updateBookmark: function(jobID){
            var xRequest = new XMLHttpRequest;
            var bookmarkVal = "";
            if(document.getElementById("Bookmark"+jobID).checked){
                bookmarkVal = "true";
               
            } else {
                bookmarkVal = "false";
            }
           var the_data = 'bookmarkValue='+bookmarkVal

        xRequest.open("POST",'<?php echo base_url()?>index.php/Jobs/updateBookmark/'+jobID,true)
        xRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
        xRequest.send(the_data);
           
        }
    },
    computed: {
        jobCurrentPageID: function(){
            let result;
            for(var i=0; i<this.jobPageNums.length; i++){
                if(this.jobPageNums[i].isActive){
                    result = this.jobPageNums[i].id;
                }
            }
            return result;
        },
        candidateCurrentPageID: function(){
            let result;
            for(var i=0; i<this.candidatePageNums.length; i++){
                if(this.candidatePageNums[i].isActive){
                    result = this.candidatePageNums[i].id;
                }
            }
            return result;
        }
    },
    mounted: function(){
        this.jobPageNums = [];
        if(this.archiveJobNum == 0){
            this.jobPageNums.push({id: 0, isActive: false})
        } else {
            for(var i=0; i<this.archiveJobNum; i=i+10){
                this.jobPageNums.push({id: i/10, isActive: false});
            }
        }
        this.jobPageNums[0].isActive = true;
        this.candidatesCopy = this.candidates;

        // inite pageNums
        this.candidatePageNums = [];
        if(this.candidateNum == 0){
            this.candidatePageNums.push({id:0,isActive:false})
        } else {
            for(var i=0; i<this.candidateNum; i=i+10){
                this.candidatePageNums.push({id: i/10, isActive: false});
            }
        }
        this.candidatePageNums[0].isActive = true;

    }

})
</script>
