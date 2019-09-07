        <div class="tab-pane fade" id="lastcondidates" role="tabpanel" aria-labelledby="lastcondidates-tab">
            <!-- Collapse -->
            <br />
            <div class="container">
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
            </div>
            <!-- Collapse End -->

            <!-- Table -->
            <div class=" mb-5 px-5">
                <div class="dragscroll" style="overflow: scroll; cursor: grab; cursor : -o-grab; cursor : -moz-grab; cursor : -webkit-grab;" v-if="candidates.length > 0">
                
                    <table class="table table-hover mt-5 mr-5">
                
                        <thead>
                            <tr>
                            <th scope="col" class="pl-1" v-bind:class="{ 'd-none': ! showClientCheck }"><a href="#"  @click.stop.prevent="sortCandidate('bookmark')" class="text-dark "><i style="font-size:22px;" class="icon ion-md-checkbox-outline ml-2"></i></a></th>
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
                                <td><a class="text-dark" :href="'<?php echo base_Url(); ?>index.php/candidateMission/downloadCV/' + candidate.JobCV" target="_blank">CV</a></td>
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

        </div>
    </div> <!-- tab content -->
