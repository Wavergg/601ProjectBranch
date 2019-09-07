</div> <!-- App -->
<?php if(strlen($message)>0):?>
    <div class="mt-3 row offset-md-3" >
        <p class="text-danger"><?php echo "<script type='text/javascript'>alert('$message');</script>"; ?></p>
    </div>
<?php endif; ?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Action Failed</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Password and their validation did not match</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>

<script>
var app = new Vue({
        el: '#app',
        data: {
            //personalInfo
            notMatchPasswordError: "",
            confirmNewPassword: "",
            newPassword: "",
            //manageStaff
            confirmPassword: "",
            password: "",
            passwordError: "",
            updateStaffPassword: "",
            confirmUpdate: "",
            errMessage: "Failed",
            toggle: true,
            staffs: [
              <?php foreach ($staffs as $staff): ?>
            {id: "<?php echo $staff['UserID']; ?>",
            email: "<?php echo $staff['Email']; ?>",
            firstName: "<?php echo $staff['FirstName']; ?>",
            lastName: "<?php echo $staff['LastName']; ?>",
            city: "<?php echo $staff['City']; ?>",
            address: "<?php echo $staff['Address']; ?>",
            phoneNumber: "<?php echo $staff['PhoneNumber']; ?>"},
      <?php endforeach; ?>
            ]
        },
        methods: {
            //for update personal info password
            checkForm: function(e){
                if(this.confirmNewPassword == this.newPassword){
                    if(this.newPassword.length<6){
                        this.notMatchPasswordError = "The password is too short"
                        e.preventDefault()
                    } else {
                        this.notMatchPasswordError = ""
                    }
                   
                } else {
                    this.notMatchPasswordError = "New Password did not match"
                    e.preventDefault()
                }
                
            },
            
          sortBy: function(sortKey) {
            this.toggle = !this.toggle;
            if(this.toggle){
                this.staffs.sort(function(a, b){
                    return a[sortKey].localeCompare(b[sortKey]);
                })
            } else {
                this.staffs.sort(function(a, b){
                    return b[sortKey].localeCompare(a[sortKey]);
                })
            }
          },
          checkDataForm: function(e,confirm,passwd){
              if(confirm == passwd){
                if(passwd.length<6){
                        this.passwordError = "Password is too short"
                        e.preventDefault();
                    } else {
                        return true
                  }
              } else {
                e.preventDefault();
                $('#exampleModal').modal('show')
              }
            },
            clearErrMess: function(){
              this.password = "";
              this.confirmPassword= "";
              this.passwordError = "";
            }
        },
        
    })
</script>