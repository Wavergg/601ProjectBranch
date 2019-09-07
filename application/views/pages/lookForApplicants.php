<div id="app">
    <div style="height: 50px;"></div>

    <h2 class="text-center">Last Clients</h2>
    <hr />
    
    
    <div class="container ">

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
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="jobTitle">Job Title:</label>
                    <input type="text" class="form-control" v-model="filterJobTitle" id="jobTitle" placeholder="Job Title">
                </div>
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="ContactNumber">Contact Number:</label>
                    <input type="text" class="form-control" v-model="filterContactNumber" id="ContactNumber" placeholder="Contact Number">
                </div>
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="ContactPerson">Contact person name:</label>
                    <input type="text" class="form-control" v-model="filterContactPerson" id="ContactPerson" placeholder="Contact person name">
                </div>
            </div>
            <button class="btn btn-outline-info " @click="applyFilters">Apply</button>
            <button class="btn btn-outline-dark mx-2" @click="clearFilters">Clear</button>

            <p class="mt-md-5 mt-3 text-dark font-weight-bold">Shows column:</p>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showClientCheck" id="showClientCheck">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showClientCheck">
                    Bookmark
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showDetails" id="showDetails">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showDetails">
                    Details
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showClientTitle" id="showClientTitle">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showClientTitle">
                    Title
                </label>
                
            </div>
            
            <div class="form-check form-check-inline col-md-2">
            <input class="form-check-input" type="checkbox" v-model="showClientName" id="showClientName">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showClientName">
                    Name
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showCompany" id="showCompany">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showCompany">
                    Company
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showClinetEmail" id="showClinetEmail">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showClinetEmail">
                    Email
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showContactNumber" id="showContactNumber">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showContactNumber">
                    Contact Number
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showJobTitle" id="showJobTitle">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showJobTitle">
                    Job Title
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showJobType" id="showJobType">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showJobType">
                    Job Type
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showClientAddress" id="showClientAddress">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showClientAddress">
                    Address
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showClientCity" id="showClientCity">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showClientCity">
                    City
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showDescription" id="showDescription">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showDescription">
                    Description
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showDateSubmitted" id="showDateSubmitted">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showDateSubmitted">
                    DateSubmitted
                </label>
            </div>
        </div>
        <!-- Collapse End -->

        
        
    </div>
    <!-- Table -->
    <div class=" mb-5 px-5">
    <div style="overflow:auto" >
        
            <table class="table table-hover mt-5 mr-5">
           
                <thead>
                    <tr>
                        <th scope="col" v-bind:class="{ 'd-none': ! showClientCheck }"><a href="#"  @click.stop.prevent="sortBy('bookmark')" class="text-dark "><img src="<?php echo base_url();?>lib/images/Bookmark1.png" style="height: 16px; width:16px;"></a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showDetails }"><a href="#" class="text-dark" @click.stop.prevent="">Details</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showClientTitle }"><a href="#" class="text-dark" @click.stop.prevent="sortBy('clientTitle')">Title</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showClientName }"><a href="#" class="text-dark" @click.stop.prevent="sortBy('clientName')">Name</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showCompany }"><a href="#" class="text-dark" @click.stop.prevent="sortBy('company')">Company</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showClinetEmail }"><a href="#" class="text-dark" @click.stop.prevent="sortBy('email')">Email</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showContactNumber }"><a href="#" class="text-dark" @click.stop.prevent="sortBy('contactNumber')">Contact Number</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showJobTitle }"><a href="#" class="text-dark" @click.stop.prevent="sortBy('jobTitle')">Job Title</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showJobType }"><a href="#" class="text-dark" @click.stop.prevent="sortBy('jobType')">Job Type</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showClientAddress }"><a href="#" class="text-dark" @click.stop.prevent="sortBy('address')">Address</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showClientCity }"><a href="#" class="text-dark" @click.stop.prevent="sortBy('city')">City</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showDescription }">Description</th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showDateSubmitted }"><a href="#" class="text-dark" @click.stop.prevent="sortBy('dateSubmitted')">DateSubmitted</a></th>
                       
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="job in jobs" :key="job.id">
                        
                        <td v-bind:class="{ 'd-none': ! showClientCheck }"> <input type="checkbox" :id="job.bookmarkUrl" v-on:click="checkClient(job.id)" :checked="job.checked"></td>
                        <td v-bind:class="{ 'd-none': ! showDetails }"><a :href="job.ref" role="button"><i style="font-size:30px;" class="ml-1 icon ion-md-document mx-3"></i></a></td>
                        <td v-text="job.clientTitle" v-bind:class="{ 'd-none': ! showClientTitle }"></td>
                        <td v-text="job.clientName" v-bind:class="{ 'd-none': ! showClientName }"></td>
                        <td v-text="job.company" v-bind:class="{ 'd-none': ! showCompany }"></td>
                        <td v-text="job.email" v-bind:class="{ 'd-none': ! showClinetEmail }"></td>
                        <td v-text="job.contactNumber" v-bind:class="{ 'd-none': ! showContactNumber }"></td>
                        <td v-text="job.jobTitle" v-bind:class="{ 'd-none': ! showJobTitle }"></td>
                        <td v-text="job.jobType" v-bind:class="{ 'd-none': ! showJobType }"></td>
                        <td v-text="job.address" v-bind:class="{ 'd-none': ! showClientAddress }"></td>
                        <td v-text="job.city" v-bind:class="{ 'd-none': ! showClientCity }"></td>
                        <td v-text="job.description" v-bind:class="{ 'd-none': ! showDescription }"></td>
                        <td v-text="job.dateSubmitted" v-bind:class="{ 'd-none': ! showDateSubmitted }"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Table End -->


    <!-- Candidate Part -->
    <h2 class="text-center">Last Candidates</h2>
    <hr />
    
    
    <div class="container ">

        <!-- Collapse -->
        <a class="btn btn-outline-dark border border-dark form-control" style="border-radius: 15px 15px 0px 0px;" data-toggle="collapse" href="#collapseCondidate" role="button" aria-expanded="false" aria-controls="collapseCondidate">
        <span class="font-weight-bold">Filters</span><i class="ml-1 icon ion-md-barcode mx-3"></i></a>

        <div class="collapse border border-dark p-5 bg-white" style="border-radius: 0px 0px 15px 15px;" id="collapseCondidate">
            <div class="form-row mt-1">
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="JobInterest">Job Interest:</label>
                    <input type="text" class="form-control" v-model="filterJobInterest" id="JobInterest" placeholder="Job Interest">
                </div>
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="JobType">Job Type:</label>
                    
                    <select class="form-control p-2" type="text" v-model="filterJobType" id="jobTypeID">
                        <option selected></option>
                        <option value="Full Time">Full Time</option>
                        <option value="Part Time">Part Time</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="FirstName">First Name:</label>
                    <input type="text" class="form-control" v-model="filterFirstName" id="FirstName" placeholder="FirstName">
                </div>
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="LastName">Last Name:</label>
                    <input type="text" class="form-control" v-model="filterLastName" id="LastName" placeholder="LastName">
                </div>
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="City">City:</label>
                    <input type="text" class="form-control" v-model="filterCity" id="City" placeholder="City">
                </div>
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="Suburb">Suburb:</label>
                    <input type="text" class="form-control" v-model="filterSuburb" id="Suburb" placeholder="Suburb">
                </div>
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="PhoneNumber">Phone Number:</label>
                    <input type="text" class="form-control" v-model="filterPhoneNumber" id="PhoneNumber" placeholder="PhoneNumber">
                </div>
                <div class="form-group col-md-3">
                    <label class="text-dark font-weight-bold" for="Email">Email:</label>
                    <input type="text" class="form-control" v-model="filterEmail" id="Email" placeholder="Email">
                </div>
                
            </div>
            <button class="btn btn-outline-info " @click="candidateFilters">Apply</button>
            <button class="btn btn-outline-dark mx-2" @click="clearCandidateFilters">Clear</button>

            <p class="mt-md-5 mt-3 text-dark font-weight-bold">Shows column:</p>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showPhoneNumber" id="showPhoneNumber">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showPhoneNumber">
                    Phone Number
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showDOB" id="showDOB">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showDOB">
                    Date Of Birth
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showEmail" id="showEmail">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showEmail">
                    Email
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showCity" id="showCity">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showCity">
                    City
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showAddress" id="showAddress">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showAddress">
                   Address
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showSuburb" id="showSuburb">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showSuburb">
                   Suburb
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showGender" id="showGender">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showGender">
                   Gender
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showJobInterest" id="showJobInterest">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showJobInterest">
                    Job Interest
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showJobType" id="showJobType">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showJobType">
                    Job Type
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showTransportation" id="showTransportation">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showTransportation">
                    Transportation
                </label>
            </div>
            
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showCitizenship" id="showCitizenship">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showCitizenship">
                    Citizenship
                </label>
            </div>
            
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showCompensationInjury" id="showCompensationInjury">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showCompensationInjury">
                    Compensation Injury
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showCompensationDateFrom" id="showCompensationDateFrom">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showCompensationDateFrom">
                    Compensation Date From
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showCompensationDateTo" id="showCompensationDateTo">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showCompensationDateTo">
                Compensation Date To
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showHealthConditions" id="showHealthConditions">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showHealthConditions">
                    Health Conditions
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showDependants" id="showDependants">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showDependants">
                    Dependants
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showSmoke" id="showSmoke">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showSmoke">
                    Smoke
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showConviction" id="showConviction">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showConviction">
                    Conviction
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showConvictionDetails" id="showConvictionDetails">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showConvictionDetails">
                    Conviction Detail
                </label>
            </div>
            <div class="form-check form-check-inline col-md-2">
                <input class="form-check-input" type="checkbox" v-model="showCandidateNotes" id="showCandidateNotes">
                <label style="font-size: 1em;" class="form-check-label my-1" for="showCandidateNotes">
                    Notes
                </label>
            </div>
        </div>
        <!-- Collapse End -->

        
        
    </div>
    <!-- Table -->
    <div class=" mb-5 px-5">
    <div class="dragscroll" style="overflow: scroll; cursor: grab; cursor : -o-grab; cursor : -moz-grab; cursor : -webkit-grab;" v-if="candidates.length > 0">
        
            <table class="table table-hover mt-5 mr-5">
           
                <thead>
                    <tr>
                    <th scope="col" v-bind:class="{ 'd-none': ! showClientCheck }"><a href="#"  @click.stop.prevent="sortCandidate('bookmark')" class="text-dark "><img src="<?php echo base_url();?>lib/images/Bookmark1.png" style="height: 16px; width:16px;"></a></th>
                        <th scope="col"><a href="#" class="text-dark" @click.stop.prevent="">Details</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showFirstName }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('FirstName')">First Name</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showLastName }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('LastName')">Last Name</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showLastName }">CV</th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showPhoneNumber }"><a href="#" class="text-dark" @click.stop.prevent="">Phone Number</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showDOB }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('DOB')">Date Of Birth</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showEmail }"><a href="#" class="text-dark" @click.stop.prevent="">Email</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showCity }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('City')">City</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showAddress }"><a href="#" class="text-dark" @click.stop.prevent="">Address</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showSuburb }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('Suburb')">Suburb</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showGender }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('Gender')">Gender</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showJobInterest }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('jobInterest')">Job Interest</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showJobType }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('jobType')">Job Type</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showTransportation }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('transportation')">Transportation</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showCitizenship }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('citizenship')">Citizenship</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showCompensationInjury }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('compensationInjury')">Compensation Injury</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showCompensationDateFrom }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('compensationDateFrom')">Compensation From</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showCompensationDateTo }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('compensationDateTo')">Compensation To</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showHealthConditions }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('healthProblem')">Health Problem</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showDependants }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('dependants')">Dependants</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showSmoke }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('smoke')">Smoke</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showConviction }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('conviction')">Conviction</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showConvictionDetails }"><a href="#" class="text-dark" @click.stop.prevent="sortCandidate('convictionDetails')">Conviction Detail</a></th>
                        <th scope="col" v-bind:class="{ 'd-none': ! showCandidateNotes }"><a href="#" class="text-dark" @click.stop.prevent="">Notes</a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="candidate in candidatesCopy" :key="candidate.CandidateID">
                        <td v-bind:class="{ 'd-none': ! showCandidateCheck }"> <input type="checkbox" v-on:click="checkCandidate(candidate.CandidateID)" :checked="candidate.Checked"></td>
                        <td><a v-on:click="getUrl(candidate.CandidateID)" role="button" class="text-primary"><i style="font-size:30px;" class="ml-1 icon ion-md-document mx-3"></i></a></td>
                        <td v-text="candidate.FirstName" v-bind:class="{ 'd-none': ! showFirstName }"></td>
                        <td v-text="candidate.LastName" v-bind:class="{ 'd-none': ! showLastName }"></td>
                        <td><a class="text-dark" :href="'<?php echo base_Url(); ?>index.php/candidateMission/downloadCV/' + candidate.jobCV" target="_blank">CV</a></td>
                        <td v-text="candidate.PhoneNumber" v-bind:class="{ 'd-none': ! showPhoneNumber }"></td>
                        <td v-text="candidate.DOB" v-bind:class="{ 'd-none': ! showDOB }"></td>
                        <td v-text="candidate.Email" v-bind:class="{ 'd-none': ! showEmail }"></td>
                        <td v-text="candidate.City" v-bind:class="{ 'd-none': ! showCity }"></td>
                        <td v-text="candidate.Address" v-bind:class="{ 'd-none': ! showAddress }"></td>
                        <td v-text="candidate.Suburb" v-bind:class="{ 'd-none': ! showSuburb }"></td>
                        <td v-text="candidate.Gender" v-bind:class="{ 'd-none': ! showGender }"></td>
                        <td v-text="candidate.JobInterest" v-bind:class="{ 'd-none': ! showJobInterest }"></td>
                        <td v-text="candidate.JobType" v-bind:class="{ 'd-none': ! showJobType }"></td>
                        <td v-text="candidate.Transportation" v-bind:class="{ 'd-none': ! showTransportation }"></td>
                        <td v-text="candidate.Citizenship" v-bind:class="{ 'd-none': ! showCitizenship }"></td>
                        <td v-text="candidate.CompensationInjury" v-bind:class="{ 'd-none': ! showCompensationInjury }"></td>
                        <td v-text="candidate.CompensationDateFrom" v-bind:class="{ 'd-none': ! showCompensationDateFrom }"></td>
                        <td v-text="candidate.CompensationDateTo" v-bind:class="{ 'd-none': ! showCompensationDateTo }"></td>
                        <td v-text="candidate.healthProblem" v-bind:class="{ 'd-none': ! showHealthConditions }"></td>
                        <td v-text="candidate.Dependants" v-bind:class="{ 'd-none': ! showDependants }"></td>
                        <td v-text="candidate.Smoke" v-bind:class="{ 'd-none': ! showSmoke }"></td>
                        <td v-text="candidate.Conviction" v-bind:class="{ 'd-none': ! showConviction }"></td>
                        <td v-text="candidate.ConvictionDetails" v-bind:class="{ 'd-none': ! showConvictionDetails }"></td>
                        <td v-bind:class="{ 'd-none': ! showCandidateNotes }"><input type="text" :id="candidate.CandidateID" v-on:change="updateNotes(candidate.CandidateID)" :value="candidate.CandidateNotes"></td>
                    
                        
                    </tr>
                </tbody>
                
            </table>
           
        </div>
    </div>
    <!-- Table End -->

    <!-- Candidate Part End -->
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
        jobs: [
            <?php foreach ($jobs as $job): ?> {
                id: "<?php echo $job['JobID']; ?>",
                
                clientTitle: "<?php echo $job['ClientTitle']; ?>",
                clientName: "<?php echo $job['ClientName']; ?>",
                company: "<?php echo $job['Company']; ?>",
                email: "<?php echo $job['Email']; ?>",
                contactNumber: "<?php echo $job['ContactNumber']; ?>",
                jobTitle: "<?php echo $job['JobTitle']; ?>",
                jobType: "<?php echo $job['JobType']; ?>",
                address: "<?php echo $job['Address']; ?>",
                city: "<?php echo $job['City']; ?>",
                description: "<?php echo $job['Description']; ?>",
                dateSubmitted: "<?php echo $job['JobSubmittedDate']?>",
                ref: "<?php echo base_url()?>index.php/Jobs/jobDetails/<?php echo $job['JobID'];?>",
                checked: "<?php if($job['Checked']=="true"){ echo true; } else { echo false;};?>",
            },
            <?php endforeach; ?>
        ],
        jobsCopy: [],
        showClientCheck: true,
        showDetails: true,
        showClientTitle: true,
        showClientName: true,
        showCompany: true,
        showClinetEmail: true,
        showContactNumber: true,
        showJobTitle : true,
        showJobType: true,
        showClientAddress: true,
        showClientCity: true,
        showDescription: true,
        showDateSubmitted: true,
        
        // filters
        filterCompany: "",
        filterCity: "",
        filterJobTitle: "",
        filterContactNumber: "",
        filterContactPerson: "",

        candidates: <?php echo json_encode($candidates); ?>,
        candidatesCopy: [],
        showCandidateCheck: true,
        showFirstName: true,
        showLastName: true,
        showJobInterest: true,
        showJobType: true,
        showTransportation: true,
        showCitizenship: true,
        showCompensationInjury: true,
        showCompensationDateFrom: false,
        showCompensationDateTo: false,
        showHealthConditions: true,
        showDependants: false,
        showSmoke: false,
        showConviction: true,
        showConvictionDetails: false,
        showCandidateNotes: true,
        showPhoneNumber: true,
        showDOB: true,
        showEmail: true,
        showCity: true,
        showAddress: false,
        showSuburb: true,
        showGender: false,

        // filters
        filterJobInterest: "",
        filterJobType: "",
        filterFirstName: "",
        filterCity: "",
        filterLastName: "",
        filterSuburb: "",
        filterPhoneNumber: "",
        filterEmail: "",
        
    },
    methods: {
        applyFilters: function(){
            this.jobs = [];
            for(var i=0; i<this.jobsCopy.length; i++){
                let company = this.jobsCopy[i].company.toLowerCase();
                let city = this.jobsCopy[i].city.toLowerCase();
                let jobTitle = this.jobsCopy[i].jobTitle.toLowerCase();
                let contactNumber = this.jobsCopy[i].contactNumber.toLowerCase();
                let contactPerson = this.jobsCopy[i].clientName.toLowerCase();
                if(company.search(this.filterCompany.toLowerCase()) >= 0
                    && city.search(this.filterCity.toLowerCase()) >= 0
                    && jobTitle.search(this.filterJobTitle.toLowerCase()) >= 0
                    && contactNumber.search(this.filterContactNumber.toLowerCase()) >= 0
                    && contactPerson.search(this.filterContactPerson.toLowerCase()) >= 0){
                    this.jobs.push(this.jobsCopy[i]);
                }
            }
        },
        clearFilters: function(){
            this.filterCompany = "";
            this.filterCity = "";
            this.filterJobTitle = "";
            this.filterContactNumber = "";
            this.filterContactPerson = "";
            this.jobs = this.jobsCopy;
        },
        candidateFilters: function(){
            this.candidatesCopy = [];
            for(var i=0; i<this.candidates.length; i++){
                let jobInterest = this.candidates[i].JobInterest.toLowerCase();
                let jobType = this.candidates[i].JobType.toLowerCase();
                let firstName = this.candidates[i].FirstName.toLowerCase();
                let city = this.candidates[i].City.toLowerCase();
                let lastName = this.candidates[i].LastName.toLowerCase();
                let suburb = this.candidates[i].Suburb.toLowerCase();
                let phoneNumber = this.candidates[i].PhoneNumber.toLowerCase();
                let email = this.candidates[i].Email.toLowerCase();
                if(jobInterest.search(this.filterJobInterest.toLowerCase()) >= 0
                    && jobType.search(this.filterJobType.toLowerCase()) >= 0
                    && firstName.search(this.filterFirstName.toLowerCase()) >= 0
                    && city.search(this.filterCity.toLowerCase()) >= 0
                    && lastName.search(this.filterLastName.toLowerCase()) >= 0
                    && suburb.search(this.filterSuburb.toLowerCase()) >= 0
                    && phoneNumber.search(this.filterPhoneNumber.toLowerCase()) >= 0
                    && email.search(this.filterEmail.toLowerCase()) >= 0){
                    this.candidatesCopy.push(this.candidates[i]);
                }
            }
        },
        clearCandidateFilters: function(){
            this.filterJobInterest = "";
            this.filterJobType = "";
            this.filterFirstName = "";
            this.filterCity = "";
            this.filterLastName = "";
            this.filterPhoneNumber = "";
            this.filterEmail = "";
            this.candidatesCopy = this.candidates;
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
        sortCandidate: function(sortKey){
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
        checkClient: function(jobID){
            console.log(jobID);
        },
        checkCandidate: function(candidateID){
            console.log(candidateID);
        }
        
    },
    mounted: function(){
        this.jobsCopy = this.jobs;

        for(var i=0; i<this.candidates.length; i++){
            if(this.candidates[i].Asthma == 'true' || this.candidates[i].BlackOut == 'true' || 
                this.candidates[i].Diabetes == 'true' || this.candidates[i].Bronchitis == 'true' ||
                this.candidates[i].BackInjury == 'true' || this.candidates[i].Deafness == 'true' ||
                this.candidates[i].Dermatitis == 'true' || this.candidates[i].SkinInfection == 'true' ||
                this.candidates[i].Allergies == 'true' || this.candidates[i].Hernia == 'true' ||
                this.candidates[i].HighBloodPressure == 'true' || this.candidates[i].HeartProblems == 'true' ||
                this.candidates[i].UsingDrugs == 'true' ||
                this.candidates[i].RSI == 'true'){
                this.candidates[i].healthProblem = 'YES';
            } else {
                this.candidates[i].healthProblem = 'NO';
            }
            
        }
        this.candidatesCopy = this.candidates;
    }

})
</script>
