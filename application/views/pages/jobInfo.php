<div class="container mb-5">
        <div class="row justify-content-start">
            <div class="col-12 mt-4 pt-5">
                <span type="text" class="text-center" style="height:80px;font-size:36px;"><?php echo $job['PublishTitle'];?></span>
            </div>
            
        </div>
        <hr/>
        <div class="row mt-4">
            <div class="col-md-8">
            <table class="table table-sm table-hover">
                <tbody>
                <legend class="text-md-left text-center">Job's classifications:</legend>
                    <?php foreach($job as $key => $value):?>
                        <?php if(($key == 'JobTitle' || $key == 'JobType' || $key == 'City' || $key == 'Suburb' || $key == 'PublishDate') && $value != NULL):?>
                        <tr>
                        <th><?php echo $key . ':';?></th>
                        <td><?php echo $value?></th>
                        </tr>
                        <?php endif?>
                    <?php endforeach;?>
                </tbody>
            </table>
            </div>
            <div class="mt-4 col-md-4 ">
                <div class="row justify-content-md-start justify-content-center">
                      <?php if($job['JobImage'] == 0 || $job['JobImage'] == NULL || $job['JobImage'] == ""):?>
                        <img src="<?php echo base_url()?>lib/images/facebook.jpg">
                    <?php else :?>
                        <img src="<?php echo base_url() . 'lib/jobImages/' . $job['JobImage']?>" class="mx-md-2" style="width:275px;height:165px;">
                    <?php endif;?>
                    </div>
            </div>
        </div>
        <p class="mt-5"><?php echo $job['ThumbnailText'];?></p>
         <div >
            <p class="mt-3"><?php echo $job['Editor1'];?></p>  
        </div>
        <div class="text-right pt-3">
            <h4><u><a href="<?php echo base_url()?>index.php/Jobs" class="font-weight-bold text-dark">Back To Jobs</a></u></h4>
        </div>
</div>  