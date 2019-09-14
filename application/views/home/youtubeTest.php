<div id="app">
    <div style="height: 50px;"></div>
        <div class="container">
        <label for="youtubeLinksID" class="display-4 font-weight-bold">Enter URL:</label>
        <input type="text" id="youtubeLinksID"  v-model="urlLink" @change="loadVideo" class="form-control" >
        </div>
        <div class="container my-4 ">
          <!-- <div class="row justify-content-center"> -->
            <div id="video justify-content-center row">
                <div class="wrapper">
                    <iframe id="video-preview" style="display:none" src=""></iframe>
                </div>
            </div>
        </div>
   <!--  </div> -->
</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>

<script>
    var app = new Vue({
        el: '#app',
        data: {
        urlLink: "",
        },
        methods: {
            
            loadVideo: function(){
                var videoUrl = document.getElementById('youtubeLinksID').value
                if(videoUrl.length < 1){
          
                    document.getElementById('video-preview').style.display = "none";
                } else {
                    var urlID = this.urlLink.split("=")
                    document.getElementById("video-preview").src = 'https://youtube.com/embed/'+urlID[1];
                    document.getElementById('video-preview').style.display = "block";
                }
            }
        },
        mounted: function() {
           this.urlLink = 'https://www.youtube.com/watch?v=c1xVsgekJr0';
           if(this.urlLink.length>0){
                var urlID = this.urlLink.split("=")
                document.getElementById("video-preview").src = 'https://youtube.com/embed/'+urlID[1];
                document.getElementById('video-preview').style.display = "block";
                document.getElementById('video').style.display = "block";
           }
        }
        
    })
</script>


