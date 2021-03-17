<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Football Prediction Site</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Google maps-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhD4zlmASnendn0zHZRhiIrleBz5yrn4o&callback=initMap&libraries=&v=weekly" defer></script>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="index.php">FootballPrediction</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <?php
                        echo "<li class=\"nav-item\"><a class=\"nav-link js-scroll-trigger\" href=\"league-detail.php?league=bundesliga\">Bundesliga</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link js-scroll-trigger\" href=\"league-detail.php?league=laliga\">La Liga</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link js-scroll-trigger\" href=\"league-detail.php?league=seriea\">Serie A</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link js-scroll-trigger\" href=\"league-detail.php?league=footballbasic\">Premiere League</a></li>
                        <li class=\"nav-item\"><a class=\"nav-link js-scroll-trigger\" href=\"league-detail.php?league=ligue1\">League 1</a></li>"
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <section class="about-section text-center" id="about">
        <div class="container">
            <div>
                <?php
                    $league = $_GET["league"];
                    $conn = mysqli_connect("localhost", "root", "password", $league);
                    if ($conn->connect_error) {
                        die("Connection failed: ". $conn-> connect_error);
                    }
                    $teamid = $_GET["teamid"];
                    $sql = "SELECT name, logo FROM teams WHERE id=$teamid";
                    $result = $conn-> query($sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            echo "<img class=\"logo-club-detail\" src=\"".$row['logo']."\" alt=\"\">
                    <div id=\"club-name\" class=\"text-white\" style=\"font-size: 27px;\">".$row["name"]."</div>";
                        }
                    }
                    
                ?>
            </div>
            <div class="tab" style="width: 100%;">
                <button class="tablinks js-scroll-trigger text-white active " onclick="opentab(event, 'overview')" href="#overview">Overview</button>
                <button class="tablinks js-scroll-trigger text-white" onclick="opentab(event, 'squad')" href="#squad">Squad</button>
                <button class="tablinks js-scroll-trigger text-white" onclick="opentab(event, 'stats')" href="#stats">Stats</button>
                <button class="tablinks js-scroll-trigger text-white" onclick="opentab(event, 'stadium')" href="#stadium">Stadium</button>

            </div>


            <div id="overview" class="tabcontent stats-table" style="display: block">
                    <?php
                        $league = $_GET["league"];
                        $conn = mysqli_connect("localhost", "root", "password", $league);
                        if ($conn->connect_error) {
                            die("Connection failed: ". $conn-> connect_error);
                        }
                        $teamid = $_GET["teamid"];
                        $sql = "SELECT form FROM team_stats_form WHERE team_id=$teamid";
                        $result = $conn-> query($sql);
                        $resultCheck = mysqli_num_rows($result);
                        echo "<p class=\"text-white\" style=\"margin-left: auto;margin-right: auto\">Team recent form: ";
                        if ($resultCheck > 0){
                            while ($row = mysqli_fetch_assoc($result)){
                                $array = str_split($row["form"]);
                                foreach($array as $form) {
                                    if ($form == "L"){
                                        echo "<span style=\"color:red;font-weight:bold;\">".$form."</span>";
                                    }
                                    elseif ($form == "W"){
                                        echo "<span style=\"color:green;font-weight:bold;\">".$form."</span>";
                                    }
                                    else {
                                        echo "<span style=\"color:grey;font-weight:bold;\">".$form."</span>";
                                    }
                                }
                            }
                        }
                        echo "</p>";
                    ?>
            </div>

            <div id="squad" class="tabcontent stats-table">
                <div id="player">
                    <div id="player-container">
                        <div id="nbr">1</div>
                        <div id="name">Leno</div>
                        <div id="pos">Goalkeeper</div>
                        <img src="assets/img/nation.png" alt="">
                    </div>
                    <div id="player-image">
                        <img src="assets/img/player.png" alt="">
                    </div>
                </div>
                <div id="player">
                    <div id="player-container">
                        <div id="nbr">1</div>
                        <div id="name">Leno</div>
                        <div id="pos">Goalkeeper</div>
                        <img src="assets/img/nation.png" alt="">
                    </div>
                    <div id="player-image">
                        <img src="assets/img/player.png" alt="">
                    </div>
                </div>
                <div id="player">
                    <div id="player-container">
                        <div id="nbr">1</div>
                        <div id="name">Leno</div>
                        <div id="pos">Goalkeeper</div>
                        <img src="assets/img/nation.png" alt="">
                    </div>
                    <div id="player-image">
                        <img src="assets/img/player.png" alt="">
                    </div>
                </div>
            </div>

            <div id="stats" class="tabcontent">
                <table class="stats-table" width=22% style="display: inline-block; margin: 0 1.5%">
                    <col style="width:80%">
                    <col style="width:20%">
                    <thead style="border-top: 2px solid #ad974f;">
                        <tr>
                            <th class="text-white" colspan="2" rowspan="1.5" style="text-align: left; font-size: 25px;">Attack</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Goals</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Goals per match</td>
                            <td class="text-white-small" style="text-align: right;">1.76</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Shots</td>
                            <td class="text-white-small" style="text-align: right;">8464</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Shots on target</td>
                            <td class="text-white-small" style="text-align: right;">3063</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Shooting accuracy %</td>
                            <td class="text-white-small" style="text-align: right;">36%</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Penalties scored</td>
                            <td class="text-white-small" style="text-align: right;">62</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Big Chances Created</td>
                            <td class="text-white-small" style="text-align: right;">762</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Hit woodwork</td>
                            <td class="text-white-small" style="text-align: right;">238</td>
                        </tr>


                    </tbody>
                </table>


                <table class="stats-table-1" width=22% style="display: inline-block; margin: 0 1.5%">
                    <col style="width:80%">
                    <col style="width:20%">
                    <thead style="border-top: 2px solid #ad974f;">
                        <tr>
                            <th class="text-white" colspan="2" rowspan="1.5" style="text-align: left; font-size: 25px;">Team Play</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Passes</td>
                            <td class="text-white-small" style="text-align: right;">295977</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Passes per match</td>
                            <td class="text-white-small" style="text-align: right;">270</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Pass accuracy %</td>
                            <td class="text-white-small" style="text-align: right;">84%</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Crosses</td>
                            <td class="text-white-small" style="text-align: right;">12004</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Cross accuracy %</td>
                            <td class="text-white-small" style="text-align: right;">21%</td>
                        </tr>



                    </tbody>
                </table>

                <table class="stats-table-2" width=22% style="display: inline-block; margin: 0 1.5%">
                    <col style="width:80%">
                    <col style="width:20%">
                    <thead style="border-top: 2px solid #ad974f;">
                        <tr>
                            <th class="text-white" colspan="2" rowspan="1.5" style="text-align: left; font-size: 25px;">Defence</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Clean sheets</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Goals Conceded</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Goals conceded per match</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Saves</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Tackles</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Tackle success %</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Blocked shots</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Interceptions</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Clearances</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Headed Clearance</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Aerial Battles/Duels Won</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Error leading to goal</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Own goals</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>


                    </tbody>
                </table>

                <table class="stats-table-3" width=22% style="display: inline-block; margin: 0 1.5%">
                    <col style="width:80%">
                    <col style="width:20%">
                    <thead style="border-top: 2px solid #ad974f;">
                        <tr>
                            <th class="text-white" colspan="2" rowspan="1.5" style="text-align: left; font-size: 25px;">Discipline</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Yellow cards</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Red cards</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Fouls</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>
                        <tr>
                            <td class="text-white-small" style="text-align: left;">Offsides</td>
                            <td class="text-white-small" style="text-align: right;">1924</td>
                        </tr>

                    </tbody>
                </table>

            </div>

            <div id="stadium" class="tabcontent stats-table">
                <div class="venue-info">
                   <?php
                    $league = $_GET["league"];
                    $conn = mysqli_connect("localhost", "root", "password", $league);
                    if ($conn->connect_error) {
                        die("Connection failed: ". $conn-> connect_error);
                    }
                    $teamid = $_GET["teamid"];
                    $sql = "SELECT venue_name,venue_image, venue_capacity, venue_surface from teams WHERE id=$teamid";
                    $result = $conn-> query($sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            echo "<div id=\"venue-name\" class=\"text-white\">
                     Name: ".$row["venue_name"]."
                 </div>
                 <div id=\"venue-capacity\" class=\"text-white\">
                     Capacity: ".$row["venue_capacity"]."
                 </div>
                 <div id=\"venue-surface\" class=\"text-white\">
                     Surface: ".$row["venue_surface"]."
                 </div>
                 </div>
                 <div id=\"map\" style=\"background-image: url('".$row["venue_image"]."')\">
                 
                </div>";
                        }
                    }
                     
                    
                   ?>
                
                
            </div>
            <!-- <script>
                // Initialize and add the map
                function initMap() {
                    // The location of Uluru
                    const uluru = {
                        lat: -25.344,
                        lng: 131.036
                    };
                    // The map, centered at Uluru
                    const map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 4,
                        center: uluru,
                    });
                    // The marker, positioned at Uluru
                    const marker = new google.maps.Marker({
                        position: uluru,
                        map: map,
                    });
                }
            </script> -->



        </div>
        <script>
            function opentab(evt, name) {
                // Declare all variables
                var i, tabcontent, tablinks;

                // Get all elements with class="tabcontent" and hide them
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Get all elements with class="tablinks" and remove the class "active"
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                if (name == 'stats') {
                    document.getElementById(name).style.alignItems = "flex-start";

                } else if (name == 'squad') {
                    document.getElementById(name).style.flexWrap = "wrap";
                }
                // Show the current tab, and add an "active" class to the button that opened the tab
                document.getElementById(name).style.display = "flex";
                evt.currentTarget.className += " active";
            }
        </script>
    </section>
    <section class="contact-section bg-black">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50">18B Hoang Quoc Viet Street, Hanoi</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50"><a href="#!">abc@gmail.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50">+84 123456789</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </section>
    <footer class="footer bg-black small text-center text-white-50">
        
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>