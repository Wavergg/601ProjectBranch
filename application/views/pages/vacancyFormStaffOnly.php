<div class="container mt-5 " id="app">

    <a href="<?php echo base_url()?>index.php/Jobs/manageClient/submitVacancy" style="position:fixed;right: 15px; bottom:20px;z-index:1"
        class=" btn-sm btn-dark border border-secondary">
        <div class="textInfoPosLeft" ><span class="textInfoLeft text-center bg-dark text-light font-weight-bold border border-white" style="width:230px;">Go back to Submit Vacancy page</span><i style="font-size:30px;" class="icon ion-md-redo m-1"></i></div>
        
    </a>

            <span class="display-4">Vacancy Application</span>
            <hr>
           
            
            <div class="pb-5">
            
            <form action="<?php echo base_url()?>index.php/EmployerMission/addJob/" class="m-md-5" method="POST" @submit="checkForm">
            <div class="row">
                <div class="col-2 p-0">
                <label for="clientTitleID" class="font-weight-bold">Title</label>

                <select class="form-control p-2" v-model="clientTitle" type="text" name="clientTitle" id="clientTitleID" >
                    <option value="-" >-</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Miss">Miss</option>
                    <option value="Ms.">Ms.</option>
                    <option value="Dr.">Dr.</option>
                </select>
                </div>
                <div class="col-5 px-1 px-md-4">
                <label for="clientNameID" class="font-weight-bold">Contact Person:</label>
                <input type="text" placeholder="Enter Name" v-model="clientName" @change="checkName" class="form-control" name="clientName" id="clientNameID" >
                <div class="mt-3" v-if="clientNameError.length">
                        <p class="text-danger" v-text="clientNameError"></p>
                    </div>
                </div>
                <div class="col-5 p-0">
                <label for="clientCompanyID" class="font-weight-bold">Company Name:</label>
                <input type="text" placeholder="Company Name" v-model="company" class="form-control" name="clientCompany" id="clientCompanyID" />
                </div>
                
            </div>
            <div class="row mt-3">
             <div class="col-12 p-0">
                 <label for="clientEmailID" class="font-weight-bold">Email:</label>
                 <input type="email" v-model="email" @change="checkEmail" placeholder="Enter Email" class="form-control" name="clientEmail" id="clientEmailID" />
            </div>
            <div class="container mt-3" v-if="emailError.length">
                <span class="text-danger" v-text="emailError"></span>
            </div>
            </div>
            <div class="row mt-3">
             <div class="col-12 p-0">
                 <label for="clientContactID" class="font-weight-bold">Contact Number:</label>
                 <input type="text" v-model="contact" @change="checkContact" placeholder="Enter Contact Number" class="form-control" name="clientContact" id="clientContact" />
            </div>
            <div class="container mt-3" v-if="contactError.length">
                <span class="text-danger" v-text="contactError"></span>
            </div>
            </div>
            <div class="row mt-3">
             <div class="col-6 col-md-3 pl-0">
                 <label for="clientCityID" class="font-weight-bold">City:</label>
                 <select class="form-control" type="text" @change="checkCity" v-model="city" name="clientCity" id="clientCityID" >
                    <option>Enter City</option>
                    <?php foreach($cities as $city): ?>
                    <option value="<?php echo $city['CityName'];?>"><?php echo $city['CityName']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="container mt-3" v-if="cityError.length">
                    <span class="text-danger" v-text="cityError"></span>
                </div>
            </div>
                <div class="col-md-3 col-6 pr-md-3 pr-0 pl-0">
                 <label for="SuburbID" class="font-weight-bold">Suburb:</label>
                 <input type="text" placeholder="Enter Suburb Name" v-model="suburb" class="form-control" name="clientSuburb" id="Suburb" />
                </div>
                <div class="col-md-6 col-12 pr-0 pl-md-3 pl-0 mt-md-0 mt-3">
                 <label for="clientAddressID" class="font-weight-bold">Address Number:</label>
                 <input type="text" placeholder="Enter Address Number"  @change="checkAddress" v-model="address" class="form-control" name="clientAddress" id="clientAddress" />
                 <div class="mt-3" v-if="addressError.length">
                        <p class="text-danger" v-text="addressError"></p>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
             <div class="col-6 pl-0">
                 <label for="clientJobTitleID" class="font-weight-bold">Job Title:</label>
                 <input type="text" placeholder="Enter Job Title" class="form-control" name="clientJobTitle" id="clientJobTitleID" />
                </div>
                <div class="col-6 pr-0">
                <label for="clientJobTypeID" class="font-weight-bold">Job Type:</label>
                 <select class="form-control" v-model="jobType" type="text" name="clientJobType" id="clientJobTypeID" >
                    <option selected>Enter Job Type</option>
                    <option value="PartTime">Part Time</option>
                    <option value="FullTime">Full Time</option>
                </select> 
                    <div class="mt-3" v-if="jobTypeError.length">
                        <p class="text-danger" v-text="jobTypeError"></p>
                    </div>
            </div>
                
            </div>
            <div class="row mt-3">
                <div class="col-12 p-0">
                    <div class="form-group">
                    <label for="descriptionID" class="font-weight-bold">Description:</label>
                    <textarea class="form-control" rows="5" name="description" id="descriptionID"></textarea>
                    </div>
                </div>
             </div>
             <div class="row">
            <input type="hidden" value="VacancyPage" name="fromPage">
            <input type="submit" value="Submit Vacancy" class="btn btn-primary m-0" :disabled="isButton">
            </div> 
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            
            suburb: "<?php echo $client['Suburb'];?>",
            clientTitle: "<?php echo $client['ClientTitle'];?>",
           
            company: "<?php echo $client['Company'];?>",
            city: "<?php echo $client['City'];?>",
            cityError: "",
            jobType: "",
            jobTypeError: "",
            address: "<?php echo $client['Address'];?>",
            addressError: "",
            contactError: "",
            contact: "<?php echo $client['ContactNumber'];?>",
            clientName: "<?php echo $client['ClientName'];?>",
            
            clientNameError: "",
            emailError: "",
            email: "<?php echo $client['Email'];?>",
            isButton: false
        },
        methods: {
            checkForm: function(e){
                return true
            },
            checkEmail: function(){
                    if(this.email.length>0 && !this.validEmail(this.email)){
                        this.emailError = "Invalid Email Address"
                        this.isButton = true
                    } else {
                    this.emailError = ""
                    this.isButton = false
                    }
                },
            
            validEmail: function(email){
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email)
            },
            checkContact: function(){
                if(this.contact.length>0 && !this.validContact(this.contact)){
                    this.contactError = "Invalid Contact"
                    this.isButton = true
                } else {
                    this.contactError = ""
                    this.isButton = false
                }
            },
            validContact: function(contact){
                var regex = /^[\+]?\(?[\+]?[0-9]{2,4}\)?[- \.]?\(?[0-9]{2,4}[-\. ]?[0-9]{2,4}[-\. ]?[0-9]{0,6}?\)?$/;
                return regex.test(contact)
            },
            checkAddress: function(){
                if(this.address.length>0){
                    var re = /^([a-zA-Z\.\,\'"&:/\- ]+[ ]?[#]?[0-9][a-zA-Z0-9 ]*|[#]?[ ]?[0-9]+[ ]?[\-/]?[0-9]*[ ]?[a-zA-Z][ a-zA-Z0-9\.\,\'"&:/\-]*)$/;
                    if(re.test(this.address)){
                        this.addressError = ""
                        this.isButton = false
                    } else {
                        this.addressError = "Incorrect address number"
                        this.isButton = true
                    }
                }
            },
            checkCity: function(){
                if(this.city.length>0){
                    this.cityError = ""
                }
            },
            checkName: function(){
                if(this.clientName.length>0){
                    var re = /^[a-zA-Z\.\'\-:\"\, /&]{2,}$/;
                    if(re.test(this.clientName)){
                        this.clientNameError = ""
                        this.isButton = false
                    } else {
                        this.clientNameError = "Invalid name"
                        this.isButton = true
                    }
               
                } else {
                    
                }
            }
        },
        
    })
</script>