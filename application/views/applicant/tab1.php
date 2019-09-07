<div class="tab-pane fade show active" id="lastclients" role="tabpanel" aria-labelledby="lastclients-tab">
    <!-- Collapse -->
    <br />
    <div class="container">
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
    </div>
    <!-- Collapse End -->

    <!-- Table -->
    <div class=" mb-5 px-5">
        <div class="dragscroll" style="overflow: scroll; cursor: grab; cursor : -o-grab; cursor : -moz-grab; cursor : -webkit-grab;" >
        
            <table class="table table-hover mt-5 mr-5">
           
                <thead>
                    <tr>
                        <th scope="col" class="pl-1" v-bind:class="{ 'd-none': ! showClientCheck }"><a href="#"  @click.stop.prevent="sortBy('bookmark')" class="text-dark "><i style="font-size:22px;" class="icon ion-md-checkbox-outline ml-2"></i></a></th>
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
</div>