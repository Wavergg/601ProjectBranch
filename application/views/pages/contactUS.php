<div class="container m-md-5 m-2" id="app">
    <span class="display-4 text-md-left text-center">Contact Lee Recruitment </span>
    <hr />
    <div class="row mt-5 ">

        <div class="offset-md-1 col-md-6">

            <div style="width: 100%">
                <iframe width="100%" height="322"
                    src="https://maps.google.com/maps?width=100%&amp;height=320&amp;hl=en&amp;coord=-46.4044829 , 168.3470484&amp;q=228%20Dee%20St%2C%20Avenal%20%2C%20Invercargill+(Lee%20Recruitment)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                </iframe></div><br />
        </div>
        <div class="col-md-5">
            <div class="container">
                <h3 class="text-warning">Address:</h3>
                <ul class="list-unstyled">
                    <li>228 Dee Street</li>
                    <li>PO Box 5223, Waikiwi</li>
                    <li>INVERCARGILL 9843</li>
                    <li>E-mail: <u style="color: black;"><a
                                href="mailto:mark@leerecruitment.co.nz">mark@leerecruitment.co.nz</a></u></li>
                    <li>Phone: (03) 928 5062</li>
                    <li class="font-weight-bold">Mobile: 021 08 323 373</li>
                    <li class="font-weight-bold">Contact: Mark Lee</li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">

        <h3 class="text-warning col text-center">Send Us a Message</h3>
        <div class="container m-1 mt-4">
            <div class="row">
                <div class="offset-md-2 col-md-2">
                    <label for="NameID"> Name</label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="name" id="NameID" v-model="userName">
                </div>
            </div>
            <div class="row mt-3">
                <div class="offset-md-2 col-md-2">
                    <label for="EmailID"> Email</label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="Email" id="EmailID" v-model="userEmail">
                </div>
            </div>
            <div class="row mt-3">
                <div class="offset-md-2 col-md-2">
                    <label for="ContactNumberID"> Contact Number</label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="ContactNumber" id="ContactNumberID" v-model="userContact">
                </div>
            </div>
            <div class="row mt-3">
                <div class="offset-md-2 col-md-2">
                    <label for="MessageID"> Message</label>
                </div>
                <div class="col-md-5">
                    <textarea rows="5" type="text" class="form-control" name="Message" id="MessageID" v-model="userMessage"></textarea>
                </div>
            </div>

            <div class="row mt-3">
                <div class="offset-md-2 col-md-2">
                </div>
                <div class="col-md-5 text-center">
                    <button class="btn btn-warning" @click="sendEmail">Send Message</button>
                    
                </div>
            </div>
        </div>


    </div>

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

</div>

<!-- Vue -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>

<script>
var app = new Vue({
    el: '#app',
    data: {
        message: "",
        userMessage: "",
        userEmail: "",
        userContact: "",
        userName: ""
    },
    methods: {
        sendEmail: function() {

            var formData = new FormData()
            formData.append('userName', this.userName)
            formData.append('userEmail', this.userEmail)
            formData.append('userContact', this.userContact)
            formData.append('userMessage', this.userMessage)
            var urllink = "<?php echo base_Url(); ?>" + 'index.php/contactUs/sendMessage'
            this.$http.post(urllink, formData).then(res => {
                var result = res.body
                this.messages = result
                $('#myModal').modal('show')
            }, res => {
                // error callback
                this.message = "Failed, please try again later.";
                $('#myModal').modal('show')
            })
        }
    }

})
</script>