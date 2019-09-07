

<div id="app" class="container m-md-5">    
<span class="display-4">Please Supply your email</span>
<hr>
<br />
    <!-- Forgot Password Form -->
    
        
        <div class="form-group row">
            <label for="email" class="offset-md-2 col-md-2 col-form-label text-right">Email:</label>
            <div class="col-md-4"> 
                <input type="text" name="email" class="form-control" placeholder="Email" v-model="userEmail">
            </div>
            <button class="btn btn-primary" @click="sendEmail">Submit</button>
        </div>
       
    
    <!-- form end -->
    
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
