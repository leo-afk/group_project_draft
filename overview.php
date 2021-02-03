<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Football Prediction Site</title>
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
            <div class="match-history-container">
                <?php
                    $fixture = $_GET['fixture'];
                    $league = $_GET['league'];

                    $conn = mysqli_connect("localhost", "root", "password", $league);
                    if ($conn->connect_error) {
                        die("Connection failed: ". $conn-> connect_error);
                    }
                    $sql = "SELECT venue_name, date, home_logo, away_logo, home_name, away_name, home_goals, away_goals from fixtures WHERE fixture_id=$fixture";
                    $result = $conn-> query($sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            echo "<div class=\"sort-by-date\">
                            <p class=\"text-white\">".$row['venue_name']."</p>
                            <p class=\"match-date text-white\">".$row['date']."</p>
                        </div>

                        <div class=\"match-history\">
                            <img class=\"logo-left\" src=\"".$row['home_logo']."\" alt=\"\">
                            <p class=\"team-left text-white\">".$row['home_name']."</p>
                            <div class=\"result\">
                                <p class=\"result-left text-white\">".$row['home_goals']."</p>
                                <p class=\"text-white\"> - </p>
                                <p class=\"result-right text-white\">".$row['away_goals']."</p>
                            </div>
                            <p class=\"team-right text-white\">".$row['away_name']."</p>
                            <img class=\"logo-right\" src=\"".$row['away_logo']."\" alt=\"\">
                        </div>
                        <br>
                        <table width=\"50%\" class=\"align-items-center\" style=\"margin-left: 25%;\">
                            <col style=\"width:25%\">
                            <col style=\"width:50%\">
                            <col style=\"width:25%\">
                            <thead style=\"border: 1px solid white\">
                                <tr>
                                    <th class=\"text-white\" colspan=\"3\">GAME STATISTICS</th>
                                </tr>
                            </thead>
                            <tbody style=\"border: 1px solid white\">

                                <tr>
                                    <td class=\"text-white-small\">84.5%</td>
                                    <td class=\"text-white-50-small\">SHOT ACCURACY</td>
                                    <td class=\"text-white-small\">74.6%</td>
                                </tr>

                                <tr>
                                    <td class=\"text-white-small\">84.5%</td>
                                    <td class=\"text-white-50-small\">PASS ACCURACY</td>
                                    <td class=\"text-white-small\">74.6%</td>
                                </tr>

                                <tr>
                                    <td class=\"text-white-small\">25(14)</td>
                                    <td class=\"text-white-50-small\">SHOTS(ON GOAL)</td>
                                    <td class=\"text-white-small\">16(6)</td>
                                </tr>

                                <tr>
                                    <td class=\"text-white-small\">9</td>
                                    <td class=\"text-white-50-small\">CORNER KICKS</td>
                                    <td class=\"text-white-small\">7</td>
                                </tr>

                                <tr>
                                    <td class=\"text-white-small\">8</td>
                                    <td class=\"text-white-50-small\">SAVES</td>
                                    <td class=\"text-white-small\">5</td>
                                </tr>

                                <tr>
                                    <td class=\"text-white-small\">0</td>
                                    <td class=\"text-white-50-small\">YELLOW CARDS</td>
                                    <td class=\"text-white-small\">2</td>
                                </tr>

                                <tr>
                                    <td class=\"text-white-small\">1</td>
                                    <td class=\"text-white-50-small\">RED CARDS</td>
                                    <td class=\"text-white-small\">0</td>
                                </tr>
                            </tbody>
                        </table>";
                    }
                    }

                ?>
                <div class="tab">
                    <button class="tablinks text-white-small active" onclick="opencity(event, 'home')">#Name1</button>
                    <button class="tablinks text-white-small" onclick="opencity(event, 'away')">#Name2</button>
                </div>

                <!-- Tab content -->
                <div id="home" class="tabcontent" style="display: block;">
                    <table width="80%" style="margin-left: 10%;">
                        <col style="width:13%">
                        <col style="width:13%">
                        <col style="width:22%">
                        <col style="width:13%">
                        <col style="width:13%">
                        <col style="width:13%">
                        <col style="width:13%">
                        <thead style="border: 0.5px solid white">
                            <tr>
                                <th class="text-white-small">NBR</th>
                                <th class="text-white-small">POS</th>
                                <th class="text-white-small">PLAYER NAME</th>
                                <th class="text-white-small">FOOT</th>
                                <th class="text-white-small">AGE</th>
                                <th class="text-white-small">HEIGHT</th>
                                <th class="text-white-small">WEIGHT</th>
                            </tr>
                        </thead>
                        <tbody style="border: 0.5px solid white">

                            <tr>
                                <td class="text-white-small">01</td>
                                <td class="text-white-small">GK</td>
                                <td class="text-white-small">John</td>
                                <td class="text-white-small">Left</td>
                                <td class="text-white-small">20</td>
                                <td class="text-white-small">170</td>
                                <td class="text-white-small">70</td>
                            </tr>

                            <tr>
                                <td class="text-white-small">01</td>
                                <td class="text-white-small">GK</td>
                                <td class="text-white-small">John</td>
                                <td class="text-white-small">Left</td>
                                <td class="text-white-small">20</td>
                                <td class="text-white-small">170</td>
                                <td class="text-white-small">70</td>
                            </tr>

                            <tr>
                                <td class="text-white-small">01</td>
                                <td class="text-white-small">GK</td>
                                <td class="text-white-small">John</td>
                                <td class="text-white-small">Left</td>
                                <td class="text-white-small">20</td>
                                <td class="text-white-small">170</td>
                                <td class="text-white-small">70</td>
                            </tr>

                            <tr>
                                <td class="text-white-small">01</td>
                                <td class="text-white-small">GK</td>
                                <td class="text-white-small">John</td>
                                <td class="text-white-small">Left</td>
                                <td class="text-white-small">20</td>
                                <td class="text-white-small">170</td>
                                <td class="text-white-small">70</td>
                            </tr>

                            <tr>
                                <td class="text-white-small">01</td>
                                <td class="text-white-small">GK</td>
                                <td class="text-white-small">John</td>
                                <td class="text-white-small">Left</td>
                                <td class="text-white-small">20</td>
                                <td class="text-white-small">170</td>
                                <td class="text-white-small">70</td>
                            </tr>


                        </tbody>
                    </table>

                </div>

                <div id="away" class="tabcontent">
                    <table width="80%" style="margin-left: 10%;">
                        <col style="width:13%">
                        <col style="width:13%">
                        <col style="width:22%">
                        <col style="width:13%">
                        <col style="width:13%">
                        <col style="width:13%">
                        <col style="width:13%">
                        <thead style="border: 0.5px solid white">
                            <tr>
                                <th class="text-white-small">NBR</th>
                                <th class="text-white-small">POS</th>
                                <th class="text-white-small">PLAYER NAME</th>
                                <th class="text-white-small">FOOT</th>
                                <th class="text-white-small">AGE</th>
                                <th class="text-white-small">HEIGHT</th>
                                <th class="text-white-small">WEIGHT</th>
                            </tr>
                        </thead>
                        <tbody style="border: 0.5px solid white">

                            <tr>
                                <td class="text-white-small">02</td>
                                <td class="text-white-small">GK</td>
                                <td class="text-white-small">John</td>
                                <td class="text-white-small">Left</td>
                                <td class="text-white-small">20</td>
                                <td class="text-white-small">170</td>
                                <td class="text-white-small">70</td>
                            </tr>

                            <tr>
                                <td class="text-white-small">02</td>
                                <td class="text-white-small">GK</td>
                                <td class="text-white-small">John</td>
                                <td class="text-white-small">Left</td>
                                <td class="text-white-small">20</td>
                                <td class="text-white-small">170</td>
                                <td class="text-white-small">70</td>
                            </tr>

                            <tr>
                                <td class="text-white-small">02</td>
                                <td class="text-white-small">GK</td>
                                <td class="text-white-small">John</td>
                                <td class="text-white-small">Left</td>
                                <td class="text-white-small">20</td>
                                <td class="text-white-small">170</td>
                                <td class="text-white-small">70</td>
                            </tr>

                            <tr>
                                <td class="text-white-small">02</td>
                                <td class="text-white-small">GK</td>
                                <td class="text-white-small">John</td>
                                <td class="text-white-small">Left</td>
                                <td class="text-white-small">20</td>
                                <td class="text-white-small">170</td>
                                <td class="text-white-small">70</td>
                            </tr>

                            <tr>
                                <td class="text-white-small">02</td>
                                <td class="text-white-small">GK</td>
                                <td class="text-white-small">John</td>
                                <td class="text-white-small">Left</td>
                                <td class="text-white-small">20</td>
                                <td class="text-white-small">170</td>
                                <td class="text-white-small">70</td>
                            </tr>


                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </section>
    <script>
        function opencity(evt, name) {
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

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(name).style.display = "block";
            evt.currentTarget.className += " active";
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
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container">Copyright © Your Website 2020</div>
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