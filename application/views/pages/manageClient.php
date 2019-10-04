<div id="app">


    <div style="height: 50px;"></div>

    <h2 v-if="fromPage != 'submitVacancy'" class="text-center">Manage Clients</h2>
    <h2 v-else class="text-center">Add Vacancy for Clients</h2>
    <hr />
    
    <div class="container ">
        <a v-if="fromPage != 'submitVacancy'" style="position:fixed;right: 20px; bottom:20px;z-index:1" href="<?php echo base_url()?>index.php/Jobs/addClientStaffOnly">
            <button type="button"  class="btn btn-dark btn-lg border-white">
                <div class="textInfoPosLeft" ><span style="font-size:16px;width:150px;" class="textInfoLeft text-center bg-dark text-light font-weight-bold border border-white" >Add New Client</span> <i style="font-size:30px;" class="icon ion-md-add m-1"></i></div>
            </button>
            
        </a>
        <button v-if="fromPage != 'submitVacancy'" type="button" @click="showRemoveTab" style="position:fixed;right: 20px; bottom:95px;z-index:1" class="btn btn-outline-danger bg-danger">
        <div class="textInfoPosLeft" ><span style="font-size:16px;width:200px;" class="textInfoLeft text-center bg-danger text-light font-weight-bold border border-white" >Toggle Remove Client</span>  <img style="height:39px; width:35px;" src="<?php echo base_url()?>lib/images/papershreeder.png"></div>
    
       
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
                    <label class="text-dark font-weight-bold" for="ContactPerson">Contact Name:</label>
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
                        <!-- <th scope="col" v-bind:class="{ 'd-none': !showAssignCandidate }"><a href="#" class="text-dark ml-2">Assign&nbsp;Applicant</a></th> -->
                        <th scope="col" v-bind:class="{ 'd-none': ! showRemoveStatus }"><a href="#" class="text-dark">Remove</a></th>
                        <th v-if="fromPage =='submitVacancy'" scope="col" ><a href="#" class="text-dark text-center" @click.stop.prevent="">Add&nbsp;Vacancy</a></th>
                        <th v-if="fromPage !='submitVacancy'" scope="col" ><a href="#" class="text-dark" @click.stop.prevent="">Details</a></th>
                        <!-- <th scope="col" >TOB</th> -->
                        <th scope="col" ><a href="#" class="text-dark py-2" @click.stop.prevent="sortBy('UpdateDate')">Update&nbsp;Date<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>
                        <!-- <th scope="col" ><a href="#" class="text-dark " @click.stop.prevent="sortBy('JobStatus')">Order&nbsp;Status<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th> -->
                        <!-- <th scope="col" ><a href="#" class="text-dark p-2 pr-3" @click.stop.prevent="sortBy('ClientTitle')">Title</a></th> -->
                        <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="sortBy('Company')">Company<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>

                        <th scope="col" ><a href="#" class="text-dark " @click.stop.prevent="sortBy('ClientName')">Contact&nbsp;Name<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>
                        
                        
                        <!-- <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="sortBy('JobTitle')">Job&nbsp;Title<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th> -->
                        <!-- <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="sortBy('JobType')">Job Type</a></th> -->
                        <th scope="col" ><a href="#" class="text-dark  p-2 pr-3" @click.stop.prevent="sortBy('City')">City<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>
                        <th scope="col" ><a href="#" class="text-dark" @click.stop.prevent="sortBy('Address')">Address<div class="d-md-inline d-none"><i class="ml-1 icon ion-md-arrow-dropdown"></i><i class="icon ion-md-arrow-dropup"></i></div></a></th>
                        <th scope="col" >Contact&nbsp;Number</th>
                        <th scope="col" >Email</th>
                        <!-- <th scope="col" >Description</th> -->
                        <!-- <th scope="col" ><a href="#" class="text-dark py-2" @click.stop.prevent="sortBy('JobSubmittedDate')">DateSubmitted</a></th>
                        -->
                    </tr>
                </thead>
                <tbody class="font-weight-bold">
                    <tr v-for="client in jobs" v-bind:class="{ 'font-italic text-danger': compareDate(client.UpdateDate) }" :key="client.ClientID" :id="'row'+client.ClientID">
                        
                        <!-- <td > <input type="checkbox" :id="client.bookmarkUrl" v-on:click="updateBookmark(client.ClientID)" :checked="client.bookmarkStat"></td> -->
                        <!-- <th class="textInfoPos text-center" v-bind:class="{ 'd-none': !showAssignCandidate }"><span class="textInfo text-center" style="left: 0px;overflow:initial;">Assign client <br>to this Applicant</span><a v-on:click="AssignIDURL(client.ClientID)" role="button" class="text-info"><i style="font-size:30px;" class="ml-1 icon ion-md-contacts mx-3"></i></a></th> -->
                        <th class="textInfoPos" v-bind:class="{ 'd-none': ! showRemoveStatus }"><button type="button" v-on:click="removeclientApp(client.ClientID)" class="btn btn-danger"><img src="<?php echo base_url()?>lib/images/papershreeder.png" style="height:35px;width:35px;"></button></th>
                        <td v-if="fromPage =='submitVacancy'" class="textInfoPos pl-4" ><span class="textInfo text-center" style="left: 10px;width:100px;">Add Vacancy</span><a :href="client.ref" role="button"><i style="font-size:30px;" class="ml-1 icon ion-md-add-circle mx-3"></i></a></td>
                        <td v-if="fromPage !='submitVacancy'" class="textInfoPos" ><span class="textInfo text-center" style="left: 0px;width:100px;">See Client's<br/> Details</span><a :href="client.ref" role="button"><i style="font-size:30px;" class="ml-1 icon ion-md-document mx-3"></i></a></td>
                        <!-- <th class="textInfoPos" ><span class="textInfo text-center" style="left: -45px;width:160px;">Download TOB</span><a class="btn btn-outline-dark px-2" :href="'<?php echo base_Url(); ?>index.php/clients/downloadTOB/'+ client.ClientID +'/'+client.TOB">TOB</a></th> -->
                        <td class="font-weight-normal" v-text="client.UpdateDate"></td>
                        <!-- <td class="font-weight-normal" v-text="client.clientStatus" ></td> -->
                        <!-- <td class="font-weight-normal" v-text="client.ClientTitle" ></td> -->
                        <td class="font-weight-normal" v-text="client.Company" ></td>
                        <td class="font-weight-normal" v-text="client.ClientName" ></td>
                        
                       
                       
                        <!-- <td class="font-weight-normal" v-text="client.clientTitle" ></td> -->
                        <!-- <td class="font-weight-normal" v-text="client.clientType" ></td> -->
                        
                        <td class="font-weight-normal" v-text="client.City" ></td>
                        <td class="font-weight-normal" v-text="client.Address" ></td>
                        <td class="font-weight-normal" v-text="client.ContactNumber" ></td>
                        <td class="font-weight-normal" v-text="client.Email" ></td>
                        <!-- <td v-text="client.Description" ></td> -->
                        <!-- <td v-text="client.clientSubmittedDate" ></td> -->
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
                    <a class="page-link"  href="#" @click.stop.prevent="getClients(pageNum.id)">{{ pageNum.id + 1 }}</a>
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
        // showAssignCandidate: '<?php// if(sizeof($candidateData)>0){echo true;} else { echo false;};?>',
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
            formData.append('clientID',elementID)
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/jobs/removeClientApplication/'
            this.$http.post(urllink, formData).then(function(res) {
                
            }, function(res) {
                
            })
            $('#row'+elementID).addClass('text-muted');
            $('#row'+elementID).css('background-color',"#F0F0F0");
        },
        getClients: function(offset){
            for(var i=0; i<this.pageNums.length; i++){
                if(this.pageNums[i].id == offset){
                    this.pageNums[i].isActive = true;
                } else {
                    this.pageNums[i].isActive = false;
                }
            }
            var formData = new FormData()
            formData.append('offset', offset);
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/Jobs/getActiveClient'
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
        // updateBookmark: function(ClientID){
        //     var xRequest = new XMLHttpRequest;
        //     var bookmarkVal = "";
        //     if(document.getElementById("Bookmark"+ClientID).checked){
        //         bookmarkVal = "true";
        //         for(i=0;i<this.jobs.length;i++){
        //             if(this.jobs[i]['ClientID']==ClientID){
        //                 this.jobs[i]['bookmarkStat'] = true;
        //             }
        //         }
        //     } else {
        //         bookmarkVal = "false";
        //         for(i=0;i<this.jobs.length;i++){
        //             if(this.jobs[i]['ClientID']==ClientID){
        //                 this.jobs[i]['bookmarkStat'] = false;
        //             }
        //         }
        //     }
        //    var the_data = 'bookmarkValue='+bookmarkVal

        // xRequest.open("POST",'<?php echo base_url()?>index.php/Jobs/updateBookmark/'+ClientID,true)
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
