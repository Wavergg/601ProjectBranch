

<div id="app">    
<div style="height: 50px;"></div>

<h2 class="text-center customPop"><?php echo $title; ?></h2>
<hr />
<!-- <p>Welcome back, <?php echo $firstName; ?>!</p>
<p>Your cannot see this page without login.</p> -->

<div class="this container-fluid pb-5">
<div class="card-group">
  <div class="card text-center">
    <a href="<?php echo base_url()?>index.php/Personcenter/personalInfo" style="text-decoration:none;">
    <div class="row justify-content-center mt-3 ">
    <img src="<?php echo base_url()?>lib/images/settings.png" style="width:140px;height:140px;" class="card-img-top" alt="">
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
    <img src="<?php echo base_url()?>lib/images/Client.png" style="width:140px;height:140px;" class="card-img-top" alt="">
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
    <img src="<?php echo base_url()?>lib/images/Candidates.png" style="width:140px;height:140px;" class="card-img-top" alt="">
    </div>
    <div class="card-body">
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
    <img src="<?php echo base_url()?>lib/images/Archive.png" style="width:140px;height:140px;" class="card-img-top" alt="">
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


</div> <!-- App -->


<!-- Vue -->
<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            
        },
        methods: {

        }
        
    })
</script>