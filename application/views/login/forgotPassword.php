<div class="container pb-5" id="app">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <h3 class="mt-5">Retrieve your account</h3><br>
            <div class="shadow-lg bg-white rounded p-md-5 p-4 mb-5">

                <span>We will send an email to your account to retrieve it</span>
                <input type="email" class="form-control mt-2" placeholder="Please enter your email" v-model="userEmail">
                <button class="btn btn-info mt-3" @click="sendEmail">Send Email</button>

            </div>
        </div>
    </div>

    <!-- A Modal -->
    <div class="modal" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ messages }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <!-- A Modal End -->

</div> <!-- App -->


<!-- Vue -->
<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            messages: "",
            userEmail: ""
        },
        methods: {
            sendEmail: function(){
                
                var formData = new FormData()
                formData.append('email', this.userEmail)
                var urllink = "<?php echo base_Url(); ?>" + 'index.php/register/sendPasswd/'
                this.$http.post(urllink, formData).then(res => {
                    var result = res.body
                    this.messages = result
                    $('#myModal').modal('show')
                }, res => {
                    // error callback
                    this.messages = "Reset failed, please try again later.";
                    $('#myModal').modal('show')
                })
            }
        }
        
    })
</script>