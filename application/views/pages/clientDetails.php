
<div class="container mt-2" id="app">
    <!-- CandidateMission/applyJob/ -->
    <h2 class="text-warning ml-0 my-3 mt-5">Client's details</h2>
    <hr />

    <div class="col-12">
            
            <form class="mx-md-5 mb-5">
            <div class="row">
                <div class="col-2 p-0">
                <label for="clientTitleID" class="font-weight-bold">Title</label>

                <select class="form-control p-2" type="text" v-model="clientTitle" name="clientTitle" id="clientTitleID" >
                    <option value="-" selected>-</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Miss">Miss</option>
                    <option value="Ms.">Ms.</option>
                    <option value="Dr.">Dr.</option>
                </select>
                </div>
                <div class="col-5 px-1 px-md-4">
                <label for="clientNameID" class="font-weight-bold"><small class="text-danger mr-1">*</small>Contact Person:</label>
                <input type="text" placeholder="Enter Name" v-model="clientName" @change="checkName" class="form-control" name="clientName" id="clientNameID" required>
                <div class="mt-3" v-if="clientNameError.length">
                        <p class="text-danger" v-text="clientNameError"></p>
                    </div>
                </div>
                <div class="col-5 p-0">
                <label for="clientCompanyID" class="font-weight-bold"><small class="text-danger mr-1">*</small>Company Name:</label>
                <input type="text" placeholder="Company Name" class="form-control" v-model="company" id="clientCompanyID" required/>
                </div>
                
            </div>
            
            
           

            <div class="row mt-3">
             <div class="col-6 col-md-3 pl-0">
                 <label for="clientCityID" class="font-weight-bold"><small class="text-danger mr-1">*</small>City:</label>
                 <select class="form-control" type="text" @change="checkCity" v-model="city" name="city" id="clientCityID" required>
                    <option selected>Enter City</option>
                    <?php foreach($cities as $city): ?>
                    <option value="<?php echo $city['CityName']; ?>"><?php echo $city['CityName']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="container mt-3" v-if="cityError.length">
                    <span class="text-danger" v-text="cityError"></span>
                </div>
            </div>
                <div class="col-md-3 col-6 pr-md-3 pr-0 pl-0">
                 <label for="SuburbID" class="font-weight-bold">Suburb:</label>
                 <input type="text" placeholder="Enter Suburb Name" class="form-control" v-model="suburb" id="SuburbID" required/>
                </div>
                <div class="col-md-6 col-12 pr-0 pl-md-3 pl-0 mt-md-0 mt-3">
                 <label for="clientAddressID" class="font-weight-bold"><small class="text-danger mr-1">*</small>Address Number:</label>
                 <input type="text" placeholder="Enter Address Number" @change="checkAddress" v-model="address" class="form-control" name="clientAddress" id="clientAddressID" required/>
                 <div class="mt-3" v-if="addressError.length">
                        <p class="text-danger" v-text="addressError"></p>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                
                <div class="col-6 p-0 pr-3">
                    <label for="clientEmailID" class="font-weight-bold">Email:</label>
                    <input type="email" v-model="email" @change="checkEmail" placeholder="Enter Email" class="form-control" name="clientEmail" id="clientEmailID" />
                    <div class="mt-3" v-if="emailError.length">
                        <span class="text-danger" v-text="emailError"></span>
                    </div>
                </div>
                <div class="col-6 p-0 pl-3">
                <label for="clientContactID" class="font-weight-bold"><small class="text-danger mr-1">*</small>Contact Number:</label>
                <input type="text" v-model="contact" @change="checkContact" placeholder="Enter Contact Number" class="form-control" name="clientContact" id="clientContactID" required/>
                </div>
                
            </div>

            
             <div class="row mt-4 justify-content-center">
            <input type="button" value="Update Client's information" @click="submitForm" class="btn btn-warning font-weight-bold m-0" :disabled="isButton">
            </div> 
            </form>

        </div> <!--container-->
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
                    <p v-text="message"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div> <!--App-->



<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            clientID: "<?php echo $client['ClientID'];?>",
            clientTitle: "<?php echo $client['ClientTitle'];?>",
            city: "<?php echo $client['City'];?>",
            cityError: "",
            company: "<?php echo $client['Company'];?>",
            address: "<?php echo $client['Address'];?>",
            addressError: "",
            suburb: "<?php echo $client['Suburb'];?>",
            contactError: "",
            contact: "<?php echo $client['ContactNumber'];?>",
            clientName: "<?php echo $client['ClientName'];?>",
            clientNameError: "",
            emailError: "",
            email: "<?php echo $client['Email'];?>",
            message: "",
            isButton: false
        },
        methods: {
            submitForm: function(){
                if(this.city=="Enter City" || this.city.length<1){
                    this.cityError="Please enter the city"
                } else {
                    var formData = new FormData()
                    formData.append('clientID',this.clientID);
                    formData.append('clientTitle',this.clientTitle);
                    formData.append('clientName', this.clientName);
                    formData.append('clientCompany',this.company);
                    formData.append('clientCity',this.city);
                    formData.append('clientAddress',this.address);
                    formData.append('clientSuburb',this.suburb);
                    formData.append('clientEmail',this.email);
                    formData.append('clientContact',this.contact);
               
                    var urllink = "<?php echo base_Url(); ?>" + 'index.php/Jobs/updateClientData'
                    this.$http.post(urllink, formData).then(function(res) {
                        var result = res.body
                        this.message = res.body
                    }, function(res) {
                        this.message = "Failure in updating client's data"
                    })
                    $('#myModal').modal('show');
                }
            },
            checkEmail: function(){
                    if(!this.validEmail(this.email)){
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
                if(!this.validContact(this.contact)){
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
                } else { 
                    this.addressError = "Please fill the address input box"
                    this.isButton = true
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