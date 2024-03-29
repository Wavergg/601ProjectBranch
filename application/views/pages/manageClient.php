<div id="app">

<?php if(!empty($fromPage)&& sizeof($candidateData)>0):?>
<div class="form-control bg-success text-center text-white font-weight-bold rounded-0" style="position:fixed; top:0px;z-index:1;opacity:0.9">
    Assigning Order to <?php echo $candidateData['FirstName'];?>, Profession 1: <?php echo $candidateData['JobInterest'] . ', Profession 2: ' . $candidateData['JobInterest2'] . ' in ' . $candidateData['City'];?>
</div>
<?php endif;?>
    <div style="height: 50px;"></div>

    <h2 class="text-center">Manage Clients</h2>
    <hr />
    
    
    <div class="container ">
        <a href="<?php echo base_url()?>index.php/EmployerMission/index/3">
            <button type="button" style="position:fixed;right: 20px; bottom:20px;z-index:1" class="btn btn-dark btn-lg border-white">
            <i style="font-size:30px;" class="icon ion-md-add m-1 text-white"></i>
            </button>
        </a>
        <button type="button" @click="showRemoveTab" style="position:fixed;right: 20px; bottom:95px;z-index:1" class="btn btn-outline-danger bg-danger">
            <img style="height:39px; width:35px;" src="<?php echo base_url()?>lib/images/papershreeder.png">
        </button>
        <!-- Collapse -->
        <a class="btn btn-outline-dark border border-dark form-control" style="border-radius: 15px 15px 0px 0px;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        <span class="font-weight-bold">Filters</span><i class="ml-1 icon ion-md-barcode mx-3"></i></a>

        <div class="collapse border border-dark p-5 bg-white" style="border-radius: 0px 0px 15px 15px;" id="collapseExample">
            <div class="form-row mt-1">
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="company">Company:</label>
                    <input type="text" class="form-control" v-model="filterCompany" id="company" placeholder="Company Name">
                </div>
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="city">City:</label>
                    <input type="text" class="form-control" v-model="filterCity" id="city" placeholder="City">
                </div>
                <!-- <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="jobTitle">Job Title:</label>
                    <input type="text" class="form-control" v-model="filterJobTitle" id="jobTitle" placeholder="Job Title">
                </div> -->
                <!-- <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="ContactNumber">Contact Number:</label>
                    <input type="text" class="form-control" v-model="filterContactNumber" id="ContactNumber" placeholder="Contact Number">
                </div> -->
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="ContactPerson">Contact person name:</label>
                    <input type="text" class="form-control" v-model="filterContactPerson" id="ContactPerson" placeholder="Contact person name">
                </div>
                <!-- <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="JobStatusID">Job Status:</label>
                    <select class="form-control p-2" type="text" v-model="filterJobStatus" id="JobStatusID" >
                        <option selected></option>
                        <option value="NoAction">Unpublished / No Action</option>
                        <option value="published">Published</option>
                        <option value="active">Active</option>
                    </select>
                </div> -->
                <!-- <div class="form-group col-md-3 align-self-end">
                    <div class="row justify-content-start">
                    <div class="form-check form-check-inline ml-3 mb-1">
                        <label style="font-size: 1em;" class="form-check-label my-1 mr-2 font-weight-bold" for="filterBookmark">
                            Filter by Bookmark:
                        </label>
                        <input class="form-check-input" type="checkbox" class="ml-5" v-model="filterBookmark" @change="filterByBookmark()" id="filterBookmark">
                        
                    </div>
                    </div>
                </div> -->
            </div>
            <button class="btn btn-outline-info " @click="applyFilters">Apply</button>
            <!-- <a href="<?php echo base_url()?>index.php/Jobs/manageClient" id="clearBtn" class="btn btn-outline-dark mx-2">Clear</a> -->
            <button class="btn btn-outline-dark mx-2" @click="clearFilters">Clear</button>
            
        </div>
        <!-- Collapse End -->

        
        
    </div>
    <!-- Table -->
    <div class=" mb-5 ">
    <div class="dragscroll" style=" overflow: scroll; cursor: grab; cursor : -o-grab; cursor : -moz-grab; cursor : -webkit-grab;" >
        
            <table class="table table-hover mt-5 mr-5">
           
                <thead>
                    <tr>
                        <!-- <th scope="col" ><a href="#"  @click.stop.prevent="sortBy('Bookmark')" class="text-dark pr-3 pt-3"><img src="<?php echo base_url();?>lib/images/Bookmark1.png" style="height: 16px; width:16px;"></a></th> -->
                        <th scope="col" v-bind:class="{ 'd-none': !showAssignCandidate }"><a href="#" class="text-dark ml-2">Assign Applicant</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showRemoveStatus }"><a href="#" class="text-dark">Remove</a></th>
                        <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="">Details</a></th>
                        <th scope="col" >TOB</th>
                        <th scope="col" ><a href="#" class="text-dark py-2" @click.stop.prevent="sortBy('UpdateDate')">Update_Date<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>
                        <th scope="col" ><a href="#" class="text-dark " @click.stop.prevent="sortBy('JobStatus')">Order_Status<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>
                        <!-- <th scope="col" ><a href="#" class="text-dark p-2 pr-3" @click.stop.prevent="sortBy('ClientTitle')">Title</a></th> -->
                        <th scope="col" ><a href="#" class="text-dark " @click.stop.prevent="sortBy('ClientName')">Contact_Person<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>
                        <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="sortBy('Company')">Company<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>
                        <th scope="col" >Email</th>
                        <th scope="col" >Contact_Number</th>
                        <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="sortBy('JobTitle')">Job_Title<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>
                        <!-- <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="sortBy('JobType')">Job Type</a></th> -->
                        <!-- <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="sortBy('Address')">Address</a></th> -->
                        <th scope="col" ><a href="#" class="text-dark  p-2 pr-3" @click.stop.prevent="sortBy('City')">City<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>
                        <!-- <th scope="col" >Description</th> -->
                        <!-- <th scope="col" ><a href="#" class="text-dark py-2" @click.stop.prevent="sortBy('JobSubmittedDate')">DateSubmitted</a></th>
                        -->
                    </tr>
                </thead>
                <tbody class="font-weight-bold">
                    <tr v-for="job in jobs" v-bind:class="{ 'font-italic text-danger': compareDate(job.UpdateDate) }" :key="job.JobID" :id="'row'+job.JobID">
                        
                        <!-- <td > <input type="checkbox" :id="job.bookmarkUrl" v-on:click="updateBookmark(job.JobID)" :checked="job.bookmarkStat"></td> -->
                        <th class="textInfoPos text-center" v-bind:class="{ 'd-none': !showAssignCandidate }"><span class="textInfo text-center" style="left: 0px;overflow:initial;">Assign job <br>to this Applicant</span><a v-on:click="AssignIDURL(job.JobID)" role="button" class="text-info"><i style="font-size:30px;" class="ml-1 icon ion-md-contacts mx-3"></i></a></th>
                        <th class="textInfoPos" v-bind:class="{ 'd-none': ! showRemoveStatus }"><button type="button" v-on:click="removeJobApp(job.JobID)" class="btn btn-danger"><img src="<?php echo base_url()?>lib/images/papershreeder.png" style="height:35px;width:35px;"></button></th>
                        <td class="textInfoPos" ><span class="textInfo text-center" style="left: 0px;width:100px;">See Order<br/> Details</span><a :href="job.ref" role="button"><i style="font-size:30px;" class="ml-1 icon ion-md-document mx-3"></i></a></td>
                        <th class="textInfoPos" ><span class="textInfo text-center" style="left: -45px;width:160px;">Download TOB</span><a class="btn btn-outline-dark px-2" :href="'<?php echo base_Url(); ?>index.php/Jobs/downloadTOB/'+ job.JobID +'/'+job.TOB">TOB</a></th>
                        <td class="font-weight-normal" v-text="job.UpdateDate"></td>
                        <td class="font-weight-normal" v-text="job.JobStatus" ></td>
                        <!-- <td class="font-weight-normal" v-text="job.ClientTitle" ></td> -->
                        <td class="font-weight-normal" v-text="job.ClientName" ></td>
                        <td class="font-weight-normal" v-text="job.Company" ></td>
                        <td class="font-weight-normal" v-text="job.Email" ></td>
                        <td class="font-weight-normal" v-text="job.ContactNumber" ></td>
                        <td class="font-weight-normal" v-text="job.JobTitle" ></td>
                        <!-- <td class="font-weight-normal" v-text="job.JobType" ></td>
                        <td class="font-weight-normal" v-text="job.Address" ></td> -->
                        <td class="font-weight-normal" v-text="job.City" ></td>
                        <!-- <td v-text="job.Description" ></td> -->
                        <!-- <td v-text="job.JobSubmittedDate" ></td> -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Table End -->  
    <div class="justify-content-center mb-4">
        <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item" v-for="pageNum in pageNums" :key="pageNum.id" :class="{ active: pageNum.isActive }">
                <div v-if="pageNum.id >= currentPageID-2 && pageNum.id <= currentPageID + 2">
                    <a class="page-link"  href="#" @click.stop.prevent="getJobs(pageNum.id)">{{ pageNum.id + 1 }}</a>
                </div>
            </li>
        </ul>
        </nav>
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
        lastVisitedClient: '<?php echo $lastVisitClient;?>',
        toggle: false,
        jobs: <?php echo json_encode($jobs)?>,
        jobsCopy: [],
        activeJobNum: <?php echo $activeJobNum;?>,
        showRemoveStatus: false,
        candidateID: "<?php if(!empty($candidateData['CandidateID'])){echo $candidateData['CandidateID'];}?>",
        showAssignCandidate: '<?php if(sizeof($candidateData)>0){echo true;} else { echo false;};?>',
        // filters
        filterCompany: "",
        filterCity: "<?php if(!empty($candidateData['City'])){echo $candidateData['City'];}?>",
        fromPage: "<?php echo $fromPage;?>",
        // filterJobTitle: "",
        // filterContactNumber: "",
        filterContactPerson: "",
        // filterJobStatus: "",
        // filterBookmark: false,
        pageNums:[
            {id: 1, isActive: true}
        ]
    },
    methods: {
        applyFilters: function(){
            var formData = new FormData()
            formData.append('companyName',this.filterCompany);
            formData.append('cityName', this.filterCity);
            formData.append('candidateID',this.candidateID);
            // formData.append('jobTitleName',this.filterJobTitle);
            // formData.append('contactNumberName',this.filterContactNumber);
            formData.append('contactPersonName',this.filterContactPerson);
            // formData.append('jobStatus',this.filterJobStatus);
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/Jobs/applyFilterActiveJob'
            this.$http.post(urllink, formData).then(function(res) {
                var result = res.body
                this.jobs = result
                this.pageNums = [];
                for(var i=0; i<this.jobs.length; i=i+10){
                    this.pageNums.push({id: i, isActive: false});
                }
                this.pageNums[0].isActive = true;
            }, function(res) {
            })
        },
        clearFilters: function(){
            if(this.fromPage != "candidatePage"){
                document.location.reload();
            } else {
            this.filterCompany = "";
            this.filterCity = "";
            this.filterContactPerson = "";
            this.applyFilters();
            }
        },
        showRemoveTab: function(){
            this.showRemoveStatus = !this.showRemoveStatus
        },
        removeJobApp: function(elementID){
            var formData = new FormData()
            formData.append('jobID',elementID)
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/jobs/removeJobApplication/'
            this.$http.post(urllink, formData).then(function(res) {
                
            }, function(res) {
                
            })
            $('#row'+elementID).addClass('text-muted');
            $('#row'+elementID).css('background-color',"#F0F0F0");
        },
        getJobs: function(offset){
            for(var i=0; i<this.pageNums.length; i++){
                if(this.pageNums[i].id == offset){
                    this.pageNums[i].isActive = true;
                } else {
                    this.pageNums[i].isActive = false;
                }
            }
            var formData = new FormData()
            formData.append('offset', offset);
            if(this.fromPage == "candidatePage"){
                formData.append('candidateID',candidateID)
            }
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/Jobs/getActiveJob'
            this.$http.post(urllink, formData).then(function(res) {
                var result = res.body
                this.jobs = result
            }, function(res) {
                // error callback
                
            })
        },
        sortBy: function(sortKey) {
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
        compareDate: function(updateDate){
            if(updateDate>=this.lastVisitedClient){
                return true;
            } else{
                return false;
            }
        },
        AssignIDURL: function(jobID){
            var goToUrl = "<?php echo base_url() . 'index.php/Jobs/assignCandidate/';?>"+this.candidateID +"/"+jobID;
            document.location.href = goToUrl;
        },
        // updateBookmark: function(jobID){
        //     var xRequest = new XMLHttpRequest;
        //     var bookmarkVal = "";
        //     if(document.getElementById("Bookmark"+jobID).checked){
        //         bookmarkVal = "true";
        //         for(i=0;i<this.jobs.length;i++){
        //             if(this.jobs[i]['JobID']==jobID){
        //                 this.jobs[i]['bookmarkStat'] = true;
        //             }
        //         }
        //     } else {
        //         bookmarkVal = "false";
        //         for(i=0;i<this.jobs.length;i++){
        //             if(this.jobs[i]['JobID']==jobID){
        //                 this.jobs[i]['bookmarkStat'] = false;
        //             }
        //         }
        //     }
        //    var the_data = 'bookmarkValue='+bookmarkVal

        // xRequest.open("POST",'<?php echo base_url()?>index.php/Jobs/updateBookmark/'+jobID,true)
        // xRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
        // xRequest.send(the_data);
           
        // }
    },
    computed: {
        currentPageID: function(){
            let result;
            for(var i=0; i<this.pageNums.length; i++){
                if(this.pageNums[i].isActive){
                    result = this.pageNums[i].id;
                }
            }
            return result;
        }
    },
    mounted: function(){
        this.jobsCopy = this.jobs;
        this.pageNums = [];
        for(var i=0; i<this.activeJobNum; i=i+10){
            this.pageNums.push({id: i/10, isActive: false});
        }
        this.pageNums[0].isActive = true;
    }

})
</script>
