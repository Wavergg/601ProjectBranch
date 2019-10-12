

<div id="app">    
<div style="height: 50px;"></div>

<h2 class="text-center"><?php echo $title; ?></h2>

<hr />

</div> <!-- App -->


<!-- Vue -->
<script src="<?php echo base_Url(); ?>lib/vue/vue-2.4.0.js"></script>
<script src="<?php echo base_Url(); ?>lib/vue-resource/vue-resource-1.5.1.min.js"></script>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            
        },
        methods: {

        }
        
    })
</script>