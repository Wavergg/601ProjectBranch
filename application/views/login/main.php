
<div id="app" class="mb-5">    
   
<div class="container">
<div class="row justify-content-center">    
<div class="col-md-5 mt-5">
<h3 class="mt-5">Log In</h3 ><br>
    <form action="<?php echo base_Url(); ?>index.php/login/login" method="post" class="border bg-outline-secondary rounded p-md-5 p-4 mb-5" @submit="checkForm">

        <label for="EmailID" class="font-weight-bold">Email:</label>
        <input type="email" class="shadow-none rounded-0 form-control border-dark border-top-0 border-left-0 border-right-0" placeholder="Enter email" id="EmailID" name="Email"/>
        
        <label for="PasswordID" class="font-weight-bold mt-4">Password:</label>
        <input type="password" v-model="password" class="shadow-none rounded-0 form-control border-dark border-top-0 
        border-left-0 border-right-0 " placeholder="Enter Password" id="PasswordID" name="Password"/>
        <!-- a message if the user entered a wrong info -->
        <div class="row mt-3 text-justify" v-if="passwdError.length">
            <small class="text-danger text-muted" v-text="passwdError"></small>
        </div>
        <?php if($wrongInfo!='undefined') { echo '<small class="text-danger"> You entered either incorrect email or password, please try again. </small>';} ?>
        <input type="submit" class="border-secondary btn btn-warning form-control mt-5" value="Log In">
        
        <!-- <a href="<?php echo base_url() ?>index.php/Register" class="btn btn-outline-dark form-control mt-3"> Register</a> -->
        
        <input type="hidden" name="submittedLoginForm" value="TRUE" />
    </form>
</div> 
</div> 
</div>
</div> <!-- App -->

<!-- Vue -->
<script src="<?php echo base_Url(); ?>lib/vue/vue-2.4.0.js"></script>
<script src="<?php echo base_Url(); ?>lib/vue-resource/vue-resource-1.5.1.min.js"></script>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            passwdError: "",
            password: "",
        },
        methods: {
            checkForm: function(e){
                    if(this.password.length<6){
                        this.passwdError = "Password is too short. In our website, it should atleast be 6 characters in length."
                        e.preventDefault()
                    } else {
                        return true
                    }
            },
        }
        
    })
</script>
