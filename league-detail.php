<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>USTH Football</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
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
            <a class="navbar-brand js-scroll-trigger" href="index.php">USTH Football</a>
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

    <!-- Match History-->
    <section class="about-section text-center" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <?php
                        $league = $_GET["league"];
                        if ($league == "footballbasic"){
                            echo "<p class=\"text-white\">
                            The Premier League, often referred to outside the UK as the English Premier League, or sometimes the EPL, (legal name: The Football Association Premier League Limited) is the top level of the English football league system.
                    </p>";
        
                        }
                        elseif ($league == "laliga"){
                            echo "<p class=\"text-white\">The Campeonato Nacional de Liga de Primera División, commonly known simply as La Liga and officially as LaLiga Santander for sponsorship reasons, stylized as LaLiga, is the men's top professional football division of the Spanish football league system.</p>";
                        }

                        elseif ($league == "seriea"){
                            echo "<p class=\"text-white\">Serie A (Italian pronunciation: [ˈsɛːrje ˈa]), also called Serie A TIM due to sponsorship by TIM, is a professional league competition for football clubs located at the top of the Italian football league system and the winner is awarded the Scudetto and the Coppa Campioni d'Italia.</p>";
                        }

                        elseif ($league == "bundesliga"){
                            echo "<p class=\"text-white\">The Bundesliga (German: [ˈbʊndəsˌliːɡa] lit. 'Federal League'), sometimes referred to as the Fußball-Bundesliga ([ˌfuːsbal-]) or Bundesliga, is a professional association football league in Germany.</p>";
                        }

                        else {
                            echo "<p class=\"text-white\">Ligue 1, officially known as Ligue 1 Uber Eats for sponsorship reasons, is a French professional league for men's association football clubs.</p>";
                        }
                    ?>
                </div>
            </div>
            
            <div class="history-container">
                <table class="stats-table-1" width=40% style="margin: 0 1.5%">
                    <thead style="border-top: 2px solid #ad974f;">
                        <tr>
                            <th class="text-white" rowspan="1.5" style="text-align: left; font-size: 25px;">History</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $league = $_GET["league"];
                            $conn = mysqli_connect("localhost", "root", "password", $league);
                            if ($conn->connect_error) {
                                die("Connection failed: ". $conn-> connect_error);
                            }
                            $sql = "SELECT fixture_id, home_name, away_name, home_logo, away_logo, home_goals, away_goals, venue_name, date from fixtures WHERE status='Match Finished' ORDER BY date DESC LIMIT 10";
                            $result = $conn-> query($sql);
                            $resultCheck = mysqli_num_rows($result);
                            
                            if ($resultCheck > 0){
                            while ($row = mysqli_fetch_assoc($result)){
                                 echo "<tr>
                            <td>
                                <a class=\"match-history-container\" href=\"overview.php?fixture=".$row["fixture_id"]."&league=".$league."\" style=\"text-decoration: none;\">
                                    
                    
                                    <div class=\"match-history\">
                                        <img class=\"logo-left\" src=\"".$row["home_logo"]."\" alt=\"\">
                                        <p class=\"team-left text-white\">".$row["home_name"]."</p>
                                        <div class=\"result\">
                                            <p class=\"result-left text-white\">".$row["home_goals"]."</p>
                                            <p class=\"text-white\"> - </p>
                                            <p class=\"result-right text-white\">".$row["away_goals"]."</p>
                                        </div>
                                        <p class=\"team-right text-white\">".$row["away_name"]."</p>
                                        <img class=\"logo-right\" src=\"".$row["away_logo"]."\" alt=\"\">
                                    </div>
                    
                                </a>
                            </td>
                        </tr>";
                            }
                        }
                        ?>
                        
                    </tbody>
                </table>
                <table class="stats-table-1" width=53% style="margin: 0 1.5%">
                    <thead style="border-top: 2px solid #ad974f;">
                        <tr>
                            <th class="text-white" rowspan="1.5" style="text-align: left; font-size: 25px;">Predict</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                             $league = $_GET["league"];
                             $conn = mysqli_connect("localhost", "root", "password", $league);
                             if ($conn->connect_error) {
                                 die("Connection failed: ". $conn-> connect_error);
                             }
                             $sql = "SELECT fixture_id,home_id,away_id,home_per,away_per,draw_per, home_name, away_name, home_logo, away_logo, home_goals, away_goals, venue_name, date from fixtures WHERE status='Not Started' ORDER BY date ASC LIMIT 10";
                             $result = $conn-> query($sql);
                             $resultCheck = mysqli_num_rows($result);
                             
                             if ($resultCheck > 0){
                             while ($row = mysqli_fetch_assoc($result)){
                            echo "<tr>
                            <td>
                                <div class=\"predict-container\">
                                    <div class=\"sort-by-date\">
                                        <p class=\"text-white\">".$row["venue_name"]."</p>
                    <p class=\"match-date text-white\">".$row["date"]."</p>
                                    </div>
                    
                                    <div class=\"match-history\" onclick=\"toggle()\">
                                        <img class=\"logo-left\" src=\"".$row["home_logo"]."\" alt=\"\">
                                        <a href=\"club-detail.php?league=".$league."&teamid=".$row["home_id"]."\" class=\"team-left text-white\">".$row["home_name"]."</a>
                                        <div class=\"prediction\">
                                            <table>
                                                <tr>
                                                    <th class=\"text-white\">Home</th>
                                                    <th class=\"text-white\">Draw</th>
                                                    <th class=\"text-white\">Away</th>
                                                </tr>
                                                <tr>
                                                    <td class=\"text-white\" id=\"home-rate\">".$row["home_per"]."</td>
                                                    <td class=\"text-white\" id=\"draw-rate\">".$row["draw_per"]."</td>
                                                    <td class=\"text-white\" id=\"away-rate\">".$row["away_per"]."</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <a href=\"club-detail.php?league=".$league."&teamid=".$row["away_id"]."\" class=\"team-right text-white\">".$row["away_name"]."</a>
                                        <img class=\"logo-right\" src=\"".$row["away_logo"]."\" alt=\"\">
                                    </div>
                    
                                </div>
                            </td>
                        </tr>";
                             }
                            }
                        ?>
        
                    </tbody>
                </table>
                
            </div>
            

            


        </div>
    </section>
    <script>
        function toggle() {
            var ele = document.getElementById("prediction");
            if (ele.style.display == "block") {
                ele.style.display = "none";
            } else {
                ele.style.display = "block";
            }
        }
    </script>
    <!-- Contact-->
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
                            <div class="small text-black-50"><a href="#!">kienlt.bi9131@st.usth.edu.vn</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50">+84 3823 1241</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="https://twitter.com/KapitanKien"><i class="fab fa-twitter"></i></a>
                <a class="mx-2" href="https://www.facebook.com/lethuckien/"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="https://github.com/nhatanhnguyenbui/group_project_draft"><i class="fab fa-github"></i></a>
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