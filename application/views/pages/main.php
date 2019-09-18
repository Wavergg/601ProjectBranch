<main>
  <!-- Pic + Button -->
<div id="content">
  <div class="centerY">
    <div class="container text-center ">
      <div class="row justify-content-center">
        <div>
        <a href="<?php echo base_url() ?>index.php/EmployerMission/index/3" class="btn customButton customText mr-md-4 mr-2 lead">Seek a staff</a>
        </div>
        <div>
        <a href="<?php echo base_url() ?>index.php/CandidateMission/index/active/" class="btn customButton customText ml-md-4 ml-2 lead">Seek a Job</a>
        </div>
      </div>
      </div>
  </div>
</div>

<!-- FormPHP -->
<div class="container border-bottom">
  <div class="row p-4 justify-content-around">

  <form action="<?php echo base_url();?>index.php/Jobs" method="POST">
            <div class="row">
                <div class="col-md-4">
                <label for="JobTitleID" class="font-weight-bold">Job Title:</label>
                <input class="form-control" name="jobTitle" type="text" placeholder="Keywords" id="JobTitle" aria-label="JobTitle">
            </div>
                <div class="col-md-3 ">
                <label for="JobType" class="font-weight-bold">Job Type:</label>
          <select class="form-control" name="jobType" type="text" id="JobType" aria-label="JobType">
              <option selected>Enter Job Type</option>
              <option value="PartTime">Part Time</option>
              <option value="FullTime">Full Time</option>
          </select>
                </div>
                <div class="col-md-4">
            <label for="Location" class="font-weight-bold">Location:</label>

          <select class="form-control" name="location" type="text" id="Location" aria-label="Location">
          <option selected>Enter Location</option>
          <?php foreach($cities as $city): ?>
                    <option value="<?php echo $city['CityName']; ?>"><?php echo $city['CityName']; ?></option>
                    <?php endforeach; ?>
          </select>
                </div>
                <div class="col-md-1 align-self-end my-3 my-md-0">
          <input type="submit" value="Search" class="btn btn-primary">
          </div>
            </div>
        </form> 

  </div>
</div>

<!-- BriefOfLeeRecruitment -->
<div class="display-4 mt-5 ml-5 pl-3" style="font-size:3rem">Company Profile</div>
<hr>
<div class="container row col-md-12 align-items-center mb-5 mx-1">
<div class="col-1"></div>
  <div class="col-md-7 lead text-md-justify" style="font-size:1.1rem">
    <p>Lee Recruitment started in 2013. It is a locally owned and operated recruitment agency with an
    aim to help build a better community for all of us through meaningful employment. </p>
    <p>Our Goal is to find suitable employment for people in accordance with their skills and ambitions. </p>
    <p>Our moving force and the first contact person is Mark Lee - Director of Lee Recruitment. Mark
    has been in the recruitment industry for over 14 years. He has broad experience in all aspects of
    recruitment, and has a certain understanding of working conditions, requirements and the
    general trading environment, which helps him to find the most qualified and skilled personnel.</p>
    <p>He thoroughly enjoys the process of 'putting good people into good jobs' and is driven to help
    people achieve their employment goals.</p>
  </div>
  <div class="col-md-3 text-center mt-4">
    <img src="<?php echo base_url();?>lib/images/MarkLee.jpg" class="img-fluid">
  </div>
</div>

<!-- LatestJobsPHP -->
  <span class="display-4 ml-5 pl-3" style="font-size:3rem">Latest Jobs</span>
  <hr>
  <div class="container">
  <div class="row mt-5">
      <?php foreach($jobs as $job):?>
        <div class="col-md-4 mt-4">
          <a class="text-dark" style="text-decoration: none;" href="<?php echo base_url()?>index.php/Jobs/jobInfo/<?php echo $job['JobID'];?>">
            <div class="card" style="width: 18rem;">
              <?php if(!empty($job['JobImage'])): ?>
                <img src="<?php echo base_url() . 'lib/jobImages/' .$job['JobImage']?>" class="card-img-top image img-fluid" style="height:157px;" alt="<?php echo $job['JobTitle']. $job['City'];?>">
              <?php else : ?>
                <img src="<?php echo base_url()?>lib/images/facebook.jpg" class="card-img-top image img-fluid" style="height:157px;" alt="<?php echo $job['JobTitle']. $job['City'];?>">
                <?php endif;?>
                <div class="card-body">
                <p class="font-weight-bold p-0 mb-1"> <?php echo $job['PublishTitle'];?></p>
                 <p class="text-justify">   <?php echo $job['ThumbnailText'];?></p>
                </div>
            </div>
          </a>
        </div>
        <?php endforeach ?>
  </div>
        <!--end row-->
        <div class="row justify-content-end m-5">
        <a href="<?php echo base_url()?>index.php/Jobs" class="btn btn-outline-dark "> More Jobs</a>
      </div> <!--end row-->

    </div> <!--end container-->

<!-- Testimonial -->
<hr>
<span class="display-4 ml-5 pl-3" style="font-size:3rem">Testimonial</span>
  <hr>
  <div class="container mb-5 mt-4">
      <b class="text-warning">Testimonial from Findlater Sawmilling Ltd</b>
   <div class="font-italic mx-2">
  <p>
  <br>
    "We have used the services of Lee Recruitment since the conception of the business.
    Mark Lee although the principle of his own business has become an integral part of Findlater Sawmilling.<br>
    Mark has worked tirelessly to provide short term and permanent staff for our company. He puts a great deal of effort into finding the right staff to enhance our business. The relationship has given us a recruitment provider who understands the nature and culture of our business."
</p><p>"Mark provides an excellent follow up service and maintains regular contact with us and his employees, and is pro-active in correcting any problems which may arise.
    It is essential in developing a business to have a recruitment provider, which lifts the capability of that business. Mark has managed to do this, employment is and never will be an exacting since but continuous improvement is paramount."
  </p>
  <p>
    "For key roles Mark has been instrumental in locating personnel who have been greatly beneficial to the function of our business."
  </p>
  <p>
  "I would while heartedly recommend Mark's services to any employer." 
  </p>
    C.T. Findlater
  <br>
  <br>
   Director
</div> 
</div>
</main>