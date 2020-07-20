<?php
session_start();
$severName ="DESKTOP-73HCV5N\SQLEXPRESS";
$connectionInfo = array("Database"=>"nguoi_dung");
$conn = sqlsrv_connect($severName,$connectionInfo);

if($conn){
    echo "Connection established <br/>";
}
else{
    echo "Connection could not be establish<br/>";
    die(print_r(sqlsrv_error(),true));
}
$sql = "select * from dbo.Song";
$stmt = sqlsrv_query($conn,$sql);
if($stmt==false){
    die(print_r(sqlsrv_error(),true));
}
echo" ";
while($row=sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC)){
    $songs[] =$row['SongFileName'];
}
echo json_encode($songs);
//Album

$sql1 = "select * from dbo.Album ";
$stmt1 = sqlsrv_query($conn,$sql1);
if($stmt1==false){
    die(print_r(sqlsrv_error(),true));
}
echo" ";
while($row1=sqlsrv_fetch_Array($stmt1,SQLSRV_FETCH_ASSOC)){
    $image[] =$row1['ImageName']; 
}
    echo json_encode($image);
?>
<?php
$servername = "localhost";
$username = "root";
$password = "123456";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>
<script>    
    var songs = <?php echo json_encode($songs); ?>;
    var poster = <?php echo json_encode($image); ?>;
    

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
        <?php next($image);?>
    }
    function pre(){
        
        currentSong--;
        if(currentSong < 0){
            currentSong = songs.length;
        }
        playSong();
        <?php prev($image);?>
        // $("#poster img").attr("src",poster[currentSong]);
        
        
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
   
    
</script>

<!DOCTYPE html>
<html lang="en">    

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>JonasMuzik</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link href="style.css" rel="stylesheet">
    
    <link rel="shortcut icon" href="https://d29fhpw069ctt2.cloudfront.net/icon/image/37740/preview.svg">
</head>

<body id="home">
   
    <header id="header">
        <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
            <div class="container-fluid">
                <a class="navbar-branch" href="#">
                    <img src="https://d29fhpw069ctt2.cloudfront.net/icon/image/37740/preview.svg" height="30px">
                    <a class="navbar-brand" href="idk.html">Jonas<b>MUZIK</b></a>
                </a>
                <button class="navbar-toggler" type="button" vata-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="Upload/upload.php"><img id="upload" style="cursor: pointer;" src="logo/upload.png"  ></a>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#playing-music">Music</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#hot-album">Top album</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" 
                                href="Login/login.php">Log-out</a>
                        </li>
                        <li>
                            <label style="padding-top: 10px;padding-left: 5px;">Hello <?php echo $_SESSION['user_name']; ?> ! </label>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--/header-->

    <div id="slides" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
            <li data-target="#slides" data-slide-to="3"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img
                    src="https://images.unsplash.com/photo-1581974944026-5d6ed762f617?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80">
                <div class="carousel-caption">
                    <h2 class="display-2">JonasMuzik</h2>
                    <h3>Play music, free your soul</h3>
                    <hr>
                    <button type="button" class="btn bZtn-outline-light btn-lg">
                        Play music
                    </button>
                    <button type="button" class="btn btn-primary btn-lg">More information</button>
                    <hr>
                </div>
            </div>
            <div class="carousel-item">
                <img
                    src="https://images.unsplash.com/photo-1567020992371-bcc7c617a372?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80">
            </div>
            <div class="carousel-item">
                <img
                    src="https://images.unsplash.com/photo-1501527459-2d5409f8cf9f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80">
            </div>
            <div class="carousel-item">
                <img
                    src="https://images.unsplash.com/photo-1583681716866-c0d24d132420?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2000&q=80">
            </div>
        </div>
    </div>

    <section id="playing-music" class="audio-main">
        <div class="container">
            <div class="poster" id="poster">
                <img src="img/bbag.jpg" />
            </div>
            <div class="song-title" id="songTitle">
                Last Dance
            </div>
            <div class="btn-audio-player">
                <button id="pre" onclick="pre()">
                    <i class="fa fa-step-backward" aria-hidden="true"></i>
                </button>
                <button id="play" onclick="playPauseSong()">
                    <i class="fa fa-play" aria-hidden="true"></i>
                </button>
                <button id="next" onclick="next()">
                    <i class="fa fa-step-forward" aria-hidden="true"></i>
                </button>

            </div>
            <div class="seek-bar">
                <div id="fill" class="fill" type="range" min="0" max="100"></div>
                <div id="handle" class="handle"></div>
            </div>
            <div id="currentTime">
                00:00 / 00:00
            </div>
            <div id="repeatBtn">
                <button id="repeat_ne" onclick="thu_cai()">
                    <img src="logo/repeat.png">
                </button>
            </div>
        </div>
    </section>
    <!--/#Playing-music-->
    <!--Hot album-->
    <div id="hot-album" class="label-hot-album">
        <h3>Hot album 100</h3>
        <div class="border"></div>
    </div>
    <div class="hot-album">
        <div>
            <img src="img/bp.png" alt="" id="bp">
        </div>
        <div>
            <img src="img/bb.jpg" id="bb">
        </div>
        <div>
            <img src="img/niziu.jpg" alt="">
        </div>
        <div>
            <img src="img/bts.jpg" alt="">
        </div>
        <div>
            <img src="img/rv.png" alt="">
        </div>
        <div>
            <img src="img/tw.jpg" alt="">
        </div>
        <div>
            <img src="img/exo.jpg" alt="">
        </div>
        <div>
            <img src="img/st.jpg" alt="">
        </div>
        <div>
            <img src="img/bbag.jpg" alt="">
        </div>
        <div>
            <img src="img/mm.jpg" alt="">
        </div>
        <div>
            <img src="img/iu.jpg" alt="">
        </div>
        <div>
            <img src="img/itzy.jpg" alt="">
        </div>


    </div>
    
    <footer id="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2020 JonasMuzik. Template by <a target="_blank" href="idk.html">JonasMuzik</a>
                </div>
                <div class="social-media">
                    <span>
                        <a href="https://facebook.com/JonasMuzik-107294897717104"><img src="logo/facebook.png"></a>
                        <a href="https://twitter.com"><img src="logo/twitter.png"></i></a>
                        <a href="https://google.com"><img src="logo/google.png"></i></a>
                        <a href="https://linkedin.com"><img src="logo/linkedin.png"></i></a>
                        <a href="https://youtube.com"><img src="logo/youtube.png"></i></a>
                        <a href="https://github.com"><img src="logo/github.png"></i></a>
                    </span>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

</body>


</html>
