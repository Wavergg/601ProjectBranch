

<div id="app" hidden>    
<div style="height: 45px;"></div>

<div class="d-md-flex d-row">
  <div class="col-4"></div>
  <h2 class="text-center customPop col-md-4"><?php echo $title; ?></h2>
  <div class="col-2"></div>
  <div class="col align-self-end row justify-content-end mr-1 mt-2">
      <button type="button" class="mx-1" v-bind:class="{ 'bg-secondary': status == 'default' }" @click="setToDefault" id="DefaultPane">
        <i  class="icon ion-md-expand"></i>
      </button>
      <button type="button" class="mx-1" v-bind:class="{ 'bg-secondary': status == '2by2Big' }" @click="setTo2By2Big" id="Big2By2Pane">
        <i  class="icon ion-md-browsers"></i>
      </button>
      <button type="button" class="mx-1" v-bind:class="{ 'bg-secondary': status == '1rowSmall' }" @click="setTo1RowSmall" id="small2By2Pane">
        <i  class="icon ion-md-apps"></i>
      </button>
      <button type="button" class="mx-1" v-bind:class="{ 'bg-secondary': status == '2by2Small' }" @click="setTo2By2Small" id="2by2SmallPane">
        <i  class="icon ion-md-calculator"></i>
      </button>
  </div>
</div>

<h2 class="text-center customPop d-none"><?php echo $title; ?></h2>
<hr />
<!-- <p>Welcome back, <?php echo $firstName; ?>!</p>
<p>Your cannot see this page without login.</p> -->

<div class="this container-fluid pb-5">
<div class="card-group" v-if="status == 'default'">
  
  <div class="card text-center">
    <a href="<?php echo base_url()?>index.php/Personcenter/personalInfo" style="text-decoration:none;">
    <div class="row justify-content-center mt-3 ">
    <img src="<?php echo base_url()?>lib/images/settings.png" :style="'width:'+paneWidth+'px;height:'+paneHeight+'px;'" class="card-img-top" alt="">
    </div>
    <div class="card-body">
      <h5 class="card-title text-dark">Settings</h5>
      <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    </div>
    <div class="card-footer">
    </div>
    </a>
  </div>
  <div class="card text-center">
    <a href="<?php echo base_url()?>index.php/Jobs/manageClient" style="text-decoration:none;">
    <div class="row justify-content-center mt-3 ">
    <img src="<?php echo base_url()?>lib/images/Client.png" :style="'width:'+paneWidth+'px;height:'+paneHeight+'px;'" class="card-img-top" alt="">
    </div>
    <div class="card-body">
      <h5 class="card-title text-dark">Manage Client</h5>
      <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    </div>
    <div class="card-footer">
    </div>
    </a>
  </div>
  <div class="card text-center">
    <a href="<?php echo base_url()?>index.php/candidateMission/manageCandidate/" style="text-decoration:none;">
    <div class="row justify-content-center mt-3 ">
    <img src="<?php echo base_url()?>lib/images/CandidatesBK.png" :style="'width:'+paneWidth+'px;height:'+paneHeight+'px;'" class="card-img-top" alt="">
    </div>
    <div class="card-body px-2">
      <h5 class="card-title text-dark">Manage Applicant</h5>
      <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    </div>
    <div class="card-footer">
    </div>
    </a>
  </div>
  <div class="card text-center">
    <a href="<?php echo base_url()?>index.php/Archive" style="text-decoration:none;">
    <div class="row justify-content-center mt-3 ">
    <img src="<?php echo base_url()?>lib/images/ArchiveBK.png" :style="'width:'+paneWidth+'px;height:'+paneHeight+'px;'" class="card-img-top" alt="">
    </div>
    <div class="card-body">
      <h5 class="card-title text-dark">Archive</h5>
      <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    </div>
    <div class="card-footer">
    </div>
    </a>
  </div>
</div>
<!-- big2by2 -->
<div class="card-group" v-if="status == '2by2Big'">
  
  <div class="card text-center">
    <a href="<?php echo base_url()?>index.php/Personcenter/personalInfo" style="text-decoration:none;">
    <div class="row justify-content-center mt-3 ">
    <img src="<?php echo base_url()?>lib/images/settings.png" :style="'width:'+paneWidth+'px;height:'+paneHeight+'px;'" class="card-img-top" alt="">
    </div>
    <div class="card-body">
      <h5 class="card-title text-dark">Settings</h5>
      <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    </div>
    <div class="card-footer">
    </div>
    </a>
  </div>
  <div class="card text-center">
    <a href="<?php echo base_url()?>index.php/Jobs/manageClient" style="text-decoration:none;">
    <div class="row justify-content-center mt-3 ">
    <img src="<?php echo base_url()?>lib/images/Client.png" :style="'width:'+paneWidth+'px;height:'+paneHeight+'px;'" class="card-img-top" alt="">
    </div>
    <div class="card-body">
      <h5 class="card-title text-dark">Manage Client</h5>
      <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    </div>
    <div class="card-footer">
    </div>
    </a>
  </div>
</div>
<div class="card-group" v-if="status == '2by2Big'">
  <div class="card text-center">
    <a href="<?php echo base_url()?>index.php/candidateMission/manageCandidate/" style="text-decoration:none;">
    <div class="row justify-content-center mt-3 ">
    <img src="<?php echo base_url()?>lib/images/CandidatesBK.png" :style="'width:'+paneWidth+'px;height:'+paneHeight+'px;'" class="card-img-top" alt="">
    </div>
    <div class="card-body px-2">
      <h5 class="card-title text-dark">Manage Applicant</h5>
      <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    </div>
    <div class="card-footer">
    </div>
    </a>
  </div>
  <div class="card text-center">
    <a href="<?php echo base_url()?>index.php/Archive" style="text-decoration:none;">
    <div class="row justify-content-center mt-3 ">
    <img src="<?php echo base_url()?>lib/images/ArchiveBK.png" :style="'width:'+paneWidth+'px;height:'+paneHeight+'px;'" class="card-img-top" alt="">
    </div>
    <div class="card-body">
      <h5 class="card-title text-dark">Archive</h5>
      <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    </div>
    <div class="card-footer">
    </div>
    </a>
  </div>
</div>
<!-- end big2by2 -->
<!-- startsmall 1 row -->
<div class="row justify-content-center" v-if="status == '1rowSmall'">
<div class="card-group" >
  
  <div class="card text-center">
    <a href="<?php echo base_url()?>index.php/Personcenter/personalInfo" style="text-decoration:none;">
    <div class="row justify-content-center mt-3 ">
    <img src="<?php echo base_url()?>lib/images/settings.png" :style="'width:'+paneWidth+'px;height:'+paneHeight+'px;'" class="card-img-top" alt="">
    </div>
    <div class="card-body">
      <h5 class="card-title text-dark">Settings</h5>
      <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    </div>
    <div class="card-footer">
    </div>
    </a>
  </div>
  <div class="card text-center">
    <a href="<?php echo base_url()?>index.php/Jobs/manageClient" style="text-decoration:none;">
    <div class="row justify-content-center mt-3 ">
    <img src="<?php echo base_url()?>lib/images/Client.png" :style="'width:'+paneWidth+'px;height:'+paneHeight+'px;'" class="card-img-top" alt="">
    </div>
    <div class="card-body">
      <h5 class="card-title text-dark">Manage Client</h5>
      <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    </div>
    <div class="card-footer">
    </div>
    </a>
  </div>
</div>
<div class="card-group" >
  <div class="card text-center">
    <a href="<?php echo base_url()?>index.php/candidateMission/manageCandidate/" style="text-decoration:none;">
    <div class="row justify-content-center mt-3 ">
    <img src="<?php echo base_url()?>lib/images/CandidatesBK.png" :style="'width:'+paneWidth+'px;height:'+paneHeight+'px;'" class="card-img-top" alt="">
    </div>
    <div class="card-body px-2">
      <h5 class="card-title text-dark">Manage Applicant</h5>
      <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    </div>
    <div class="card-footer">
    </div>
    </a>
  </div>
  <div class="card text-center">
    <a href="<?php echo base_url()?>index.php/Archive" style="text-decoration:none;">
    <div class="row justify-content-center mt-3 ">
    <img src="<?php echo base_url()?>lib/images/ArchiveBK.png" :style="'width:'+paneWidth+'px;height:'+paneHeight+'px;'" class="card-img-top" alt="">
    </div>
    <div class="card-body">
      <h5 class="card-title text-dark">Archive</h5>
      <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    </div>
    <div class="card-footer">
    </div>
    </a>
  </div>
</div>
</div>
<!-- endrow1small -->
<!-- 2by2small start -->
<div class="row justify-content-center" v-if="status == '2by2Small'">
<div class="card-group col-md-4" >
  
  <div class="card text-center" >
    <a href="<?php echo base_url()?>index.php/Personcenter/personalInfo" style="text-decoration:none;">
    <div class="row justify-content-center mt-3 ">
    <img src="<?php echo base_url()?>lib/images/settings.png" :style="'width:'+(paneWidth-10)+'px;height:'+(paneHeight-10)+'px;'" class="card-img-top" alt="">
    </div>
    <div class="card-body">
      <h5 class="card-title text-dark" style="font-size:16px;">Settings</h5>
      <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    </div>
    
    </a>
  </div>
  <div class="card text-center">
    <a href="<?php echo base_url()?>index.php/Jobs/manageClient" style="text-decoration:none;">
    <div class="row justify-content-center mt-3 ">
    <img src="<?php echo base_url()?>lib/images/Client.png" :style="'width:'+paneWidth+'px;height:'+paneHeight+'px;'" class="card-img-top" alt="">
    </div>
    <div class="card-body">
      <h5 class="card-title text-dark" style="font-size:16px;">Manage Client</h5>
      <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    </div>
    </a>
  </div>
</div>
</div>
<div class="row justify-content-center" v-if="status == '2by2Small'">
<div class="card-group col-md-4">
  <div class="card text-center" class="col-md-6">
    <a href="<?php echo base_url()?>index.php/candidateMission/manageCandidate/" style="text-decoration:none;">
    <div class="row justify-content-center mt-3 ">
    <img src="<?php echo base_url()?>lib/images/CandidatesBK.png" :style="'width:'+paneWidth+'px;height:'+paneHeight+'px;'" class="card-img-top" alt="">
    </div>
    <div class="card-body px-2">
      <h5 class="card-title text-dark" style="font-size:16px;">Manage Applicant</h5>
      <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    </div>
    </a>
  </div>
  <div class="card text-center">
    <a href="<?php echo base_url()?>index.php/Archive" style="text-decoration:none;">
    <div class="row justify-content-center mt-3 ">
    <img src="<?php echo base_url()?>lib/images/ArchiveBK.png" :style="'width:'+(paneWidth-15)+'px;height:'+paneHeight+'px;'" class="card-img-top" alt="">
    </div>
    <div class="card-body">
      <h5 class="card-title text-dark" style="font-size:16px;">Archive</h5>
      <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    </div>
    </a>
  </div>
</div>
</div>
<!--  -->
</div>


</div> <!-- App -->


<!-- Vue -->
<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>

<script>
var app = new Vue({
    el: '#app',
    data: {
       paneWidth: "<?php if($_SESSION['preferencePanel']=="2by2Small"){ echo 67; } else if ($_SESSION['preferencePanel']=="1rowSmall"){echo 100;} else if ($_SESSION['preferencePanel']=="2by2Big"){echo 150;} else {echo 140;};?>",
       paneHeight: "<?php if($_SESSION['preferencePanel']=="2by2Small"){ echo 67; } else if ($_SESSION['preferencePanel']=="1rowSmall"){echo 100;} else if ($_SESSION['preferencePanel']=="2by2Big"){echo 150;} else {echo 140;};?>",
       status: "<?php echo $_SESSION['preferencePanel'];?>",
       userID: "<?php echo $_SESSION['userID'];?>",
    },
    methods: {
      setToDefault: function(){
        this.status = "default"
        this.paneWidth = "140"
        this.paneHeight = "140"
        var formData = new FormData();
          formData.append('userID', this.userID);
          formData.append('preferencePanel',"default");
          var urllink = "<?php echo base_Url(); ?>" + 'index.php/Personcenter/updatePanelPreference/'
          this.$http.post(urllink, formData).then(function(res) {
                       
                        
            }, function(res) {
            // this.message = "Failure in updating the panelpreference"
        })
      },
      setTo2By2Big: function(){
        this.status = "2by2Big"
        this.paneWidth = "160"
        this.paneHeight = "160"
        var formData = new FormData();
          formData.append('userID', this.userID);
          formData.append('preferencePanel',"2by2Big");
          var urllink = "<?php echo base_Url(); ?>" + 'index.php/Personcenter/updatePanelPreference/'
          this.$http.post(urllink, formData).then(function(res) {
                       
                        
            }, function(res) {
            // this.message = "Failure in updating the panelpreference"
        })
      },
      setTo1RowSmall: function(){
        this.status = "1rowSmall"
        this.paneWidth = "100"
        this.paneHeight = "100"
        var formData = new FormData();
          formData.append('userID', this.userID);
          
          formData.append('preferencePanel',"1rowSmall");
          var urllink = "<?php echo base_Url(); ?>" + 'index.php/Personcenter/updatePanelPreference/'
          this.$http.post(urllink, formData).then(function(res) {
                       
              
            }, function(res) {
            // this.message = "Failure in updating the panelpreference"
        })
      },
      setTo2By2Small: function(){
        this.status = "2by2Small"
        this.paneWidth = "67"
        this.paneHeight = "67"
        var formData = new FormData();
          formData.append('userID', this.userID);
          formData.append('preferencePanel',"2by2Small");
          var urllink = "<?php echo base_Url(); ?>" + 'index.php/Personcenter/updatePanelPreference/'
          this.$http.post(urllink, formData).then(function(res) {
                       
                        
            }, function(res) {
            // this.message = "Failure in updating the panelpreference"
        })
      }
    },
    mount: function(){
      this.status = "<?php echo $_SESSION['preferencePanel'];?>"
      
    },
    created: function(){
      document.getElementById("app").removeAttribute("hidden");
    }
});
        
</script>