    
    var songs = ["mp3/RT.mp3","mp3/HYLT.mp3","mp3/MYH.mp3","mp3/Why.mp3"];
    var poster = ["img/bbag.jpg","img/bp.png","img/niziu.jpg", "img/bb.jpg"]
    var songName =["RingTone","How you like that - BlackPink", "Make you happy - Niziu", "Why - Bệt band"]

    var songTitle = document.getElementById("songTitle");
    var fillBar =document.getElementById("fill");
    var handleDot = document.getElementById("handle");
    var buttonLogin = document.getElementById("login");
    
    var song = new Audio();
    var currentSong = 0;
    


    window.onload = playSong;
    function playSong(){
        song.src = songs[currentSong];
        songTitle.textContent = songs[currentSong];
        song.play();
        
    }
    $(document).ready(function(){
        $("#uploadMusic").hide()
        $("#upload").click(function(){
            $("#uploadMusic").show()
            $("#slides").hide()
            $('.hot-album').hide()
            $("#playing-music").hide()
            $("#hot-album").hide()
        });
        $("#bb").click(function(){
            $("#uploadMusic").show()
            $("#hot-album").hide()
            $(".hot-album").hide()
            
        });
        $("#back").click(function(){
            $("#uploadMusic").hide()
            $("#slides").show()
            $("#hot-album").show()
            $('.hot-album').show()
            $("#playing-music").show()
        });
        $("#UploadMusic").click(function(){
            $("#slides").hide()
            $("#playing-music").hide()
            $("#hot-album").hide()
            $("#uploadMusic").show()
        });
    });
    function playPauseSong()
    {        
            if(song.paused){
                song.play();
                $("#play i").attr("class","fa fa-pause");
            }
            else{
                song.pause();
                $("#play i").attr("class","fa fa-play");
                
            }
    }
    song.addEventListener('timeupdate',function(){ 
            
            var position = song.currentTime / song.duration;
            
            fillBar.style.width = position * 100 +'%';
            convertTime(Math.round(song.currentTime));
            
            if(song.ended)
                next();
        });
   
    function convertTime(seconds ){
        var min = Math.floor(seconds/60);
        var sec  = seconds % 60;
        min = (min<10)?"0"+min : min;
        sec = (sec <10)?"0"+sec:sec;
        currentTime.textContent =  min +":" +sec;

        totalTime(Math.round(song.duration));
    }
    function totalTime(seconds)
    {
        var min = Math.floor(seconds/60);
        var sec  = seconds % 60;
        min = (min<10)?"0"+min : min;
        sec = (sec <10)?"0"+sec:sec;
        
        currentTime.textContent +=" / " + min +":" +sec;
    }  
    function next(){
        
        currentSong++;
        if(currentSong >= songs.length){
            currentSong = 0;
        }
        playSong();
        
        $("#poster img").attr("src",poster[currentSong]);
    }
    function pre(){
        
        currentSong--;
        if(currentSong < 0){
            currentSong = songs.length;
        }
        playSong();
        
        $("#poster img").attr("src",poster[currentSong]);
    }
    function thu_cai(){
        if(song.loop == false){
            song.loop = true;
            song.load();
            $("#repeat_ne img").attr("src","logo/repeat1.png");
        }
        else if(song.loop == true){
            song.loop = false;
            song.load();
            $("#repeat_ne img").attr("src","logo/repeat.png");
        }
    }
   
        