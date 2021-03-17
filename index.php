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
    <!-- Masthead-->
    <header class="masthead">
        <div class="wraper">
            <div class="slide">
                <div class="slide_1 ra">

                </div>
                <div class="slide_2">

                </div>
                <div class="slide_3">

                </div>
            </div>
            <div class="nut">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
        </div>
    </header>
    <!-- About-->
    <section class="about-section text-center" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1 class="text-white mb-4">Football prediction website</h2>
                        <p class="text-white-50">
                            Welcome!
                        </p>
                </div>

    </section>
    <!-- Scored Board -->
    <section class="projects-section bg-light" id="cl">
        <div class="container">
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-6 col-lg-7" style="text-align: center; display: block;">
                <?php
                 $conn = mysqli_connect("localhost", "root", "password", "bundesliga");
                 if ($conn->connect_error) {
                     die("Connection failed: ". $conn-> connect_error);
                 }
                 $sql = "SELECT logo from league";
                 $result = $conn-> query($sql);
                 $resultCheck = mysqli_num_rows($result);

                 if ($resultCheck > 0){
                     while ($row = mysqli_fetch_assoc($result)){
                         echo "<img class=\"img-fluid mb-3 mb-lg-0\" src=\"assets/img/bdlg.jpg\" alt=\"\" />";
                     }
                    }
                ?>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <div class="featured-text-left text-center text-lg-left">
                        <h2>Bundesliga 2020</h2>
                        <table width="100%">
                            <col style="width:50%">
                            <col style="width:12.5%">
                            <col style="width:12.5%">
                            <col style="width:12.5%">
                            <col style="width:12.5%">
                            <thead>
                                <tr>
                                    <th id="team-checkboard">Position</th>
                                    <th id="point">W</th>
                                    <th id="point">L</th>
                                    <th id="point">D</th>
                                    <th id="point">PTS</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                                    $conn = mysqli_connect("localhost", "root", "password", "bundesliga");
                                    if ($conn->connect_error) {
                                        die("Connection failed: ". $conn-> connect_error);
                                    }
                                    $sql = "SELECT rank,team_id, logo, team_name, wins, loses, draws, points from standings LIMIT 5";
                                    $result = $conn-> query($sql);
                                    $resultCheck = mysqli_num_rows($result);

                                    if ($resultCheck > 0){
                                        while ($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>
                                            <td id=\"team-checkboard\">
                                                <p>"."0".$row['rank']."</p>
                                                <img src=\"".$row['logo']."\" alt=\"\" style=\"width: 30px; height: 30px;\">
                                                <a style=\"padding-left:8px;\" href=\"club-detail.php?teamid=".$row["team_id"]."&league=bundesliga\">".$row['team_name']."</a>
                                            </td>
                                            <td id=\"point\">".$row['wins']."</div></td>
                                            <td id=\"point\">".$row['loses']."</td>
                                            <td id=\"point\">".$row['draws']."</td>
                                            <td id=\"point\">".$row['points']."</td>
                                        </tr>";
                                        }
                                    
                                    }

                                    
                                ?>


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-6 col-lg-5">
                    <div class="featured-text-right text-center text-lg-right">
                        <h2>La Liga 2020</h2>
                        <table width="100%">
                            <col style="width:50%">
                            <col style="width:12.5%">
                            <col style="width:12.5%">
                            <col style="width:12.5%">
                            <col style="width:12.5%">
                            <thead>
                                <tr>
                                    <th id="team-checkboard">Position</th>
                                    <th id="point">W</th>
                                    <th id="point">L</th>
                                    <th id="point">D</th>
                                    <th id="point">PTS</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $conn = mysqli_connect("localhost", "root", "password", "laliga");
                                    if ($conn->connect_error) {
                                        die("Connection failed: ". $conn-> connect_error);
                                    }
                                    $sql = "SELECT rank,team_id, logo, team_name, wins, loses, draws, points from standings LIMIT 5";
                                    $result = $conn-> query($sql);
                                    $resultCheck = mysqli_num_rows($result);

                                    if ($resultCheck > 0){
                                        while ($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>
                                            <td id=\"team-checkboard\">
                                                <p>"."0".$row['rank']."</p>
                                                <img src=\"".$row['logo']."\" alt=\"\" style=\"width: 30px; height: 30px;\">
                                                <a style=\"padding-left:8px;\" href=\"club-detail.php?teamid=".$row["team_id"]."&league=laliga\">".$row['team_name']."</a>
                                            </td>
                                            <td id=\"point\">".$row['wins']."</div></td>
                                            <td id=\"point\">".$row['loses']."</td>
                                            <td id=\"point\">".$row['draws']."</td>
                                            <td id=\"point\">".$row['points']."</td>
                                        </tr>";
                                    }
                                    
                                    }

                                    
                                ?>


                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-7" style="text-align: center; display: block;">
                <?php
                 $conn = mysqli_connect("localhost", "root", "password", "laliga");
                 if ($conn->connect_error) {
                     die("Connection failed: ". $conn-> connect_error);
                 }
                 $sql = "SELECT logo from league";
                 $result = $conn-> query($sql);
                 $resultCheck = mysqli_num_rows($result);

                 if ($resultCheck > 0){
                     while ($row = mysqli_fetch_assoc($result)){
                         echo "<img class=\"img-fluid mb-3 mb-lg-0\" src=\"assets/img/llg.jpg\" alt=\"\" />";
                     }
                    }
                ?>
                </div>
            </div>

            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-6 col-lg-7" style="text-align: center; display: block;">
                <?php
                 $conn = mysqli_connect("localhost", "root", "password", "seriea");
                 if ($conn->connect_error) {
                     die("Connection failed: ". $conn-> connect_error);
                 }
                 $sql = "SELECT logo from league";
                 $result = $conn-> query($sql);
                 $resultCheck = mysqli_num_rows($result);

                 if ($resultCheck > 0){
                     while ($row = mysqli_fetch_assoc($result)){
                         echo "<img class=\"img-fluid mb-3 mb-lg-0\" src=\"assets/img/seria2.jpg\" alt=\"\" />";
                     }
                    }
                ?>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <div class="featured-text-left text-center text-lg-left">
                        <h2>Serie A 2020</h2>
                        <table width="100%">
                            <col style="width:50%">
                            <col style="width:12.5%">
                            <col style="width:12.5%">
                            <col style="width:12.5%">
                            <col style="width:12.5%">
                            <thead>
                                <tr>
                                    <th id="team-checkboard">Position</th>
                                    <th id="point">W</th>
                                    <th id="point">L</th>
                                    <th id="point">D</th>
                                    <th id="point">PTS</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $conn = mysqli_connect("localhost", "root", "password", "seriea");
                                    if ($conn->connect_error) {
                                        die("Connection failed: ". $conn-> connect_error);
                                    }
                                    $sql = "SELECT rank,team_id ,logo, team_name, wins, loses, draws, points from standings LIMIT 5";
                                    $result = $conn-> query($sql);
                                    $resultCheck = mysqli_num_rows($result);

                                    if ($resultCheck > 0){
                                        while ($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>
                                            <td id=\"team-checkboard\">
                                                <p>"."0".$row['rank']."</p>
                                                <img src=\"".$row['logo']."\" alt=\"\" style=\"width: 30px; height: 30px;\">
                                                <a style=\"padding-left:8px;\" href=\"club-detail.php?teamid=".$row["team_id"]."&league=seriea\">".$row['team_name']."</a>
                                            </td>
                                            <td id=\"point\">".$row['wins']."</div></td>
                                            <td id=\"point\">".$row['loses']."</td>
                                            <td id=\"point\">".$row['draws']."</td>
                                            <td id=\"point\">".$row['points']."</td>
                                        </tr>";
                                    }
                                    
                                    }
                                    
                                ?>


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-6 col-lg-5">
                    <div class="featured-text-right text-center text-lg-right">
                    <h2>Premiere League 2020</h2>
                        <table width="100%">
                            <col style="width:50%">
                            <col style="width:12.5%">
                            <col style="width:12.5%">
                            <col style="width:12.5%">
                            <col style="width:12.5%">
                            <thead>
                                <tr>
                                    <th id="team-checkboard">Position</th>
                                    <th id="point">W</th>
                                    <th id="point">L</th>
                                    <th id="point">D</th>
                                    <th id="point">PTS</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $conn = mysqli_connect("localhost", "root", "password", "footballbasic");
                                    if ($conn->connect_error) {
                                        die("Connection failed: ". $conn-> connect_error);
                                    }
                                    $sql = "SELECT rank, team_id,logo, team_name, wins, loses, draws, points from standings LIMIT 5";
                                    $result = $conn-> query($sql);
                                    $resultCheck = mysqli_num_rows($result);

                                    if ($resultCheck > 0){
                                        while ($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>
                                            <td id=\"team-checkboard\">
                                                <p>"."0".$row['rank']."</p>
                                                <img src=\"".$row['logo']."\" alt=\"\" style=\"width: 30px; height: 30px;\">
                                                <a style=\"padding-left:8px;\" href=\"club-detail.php?teamid=".$row["team_id"]."&league=footballbasic\">".$row['team_name']."</a>
                                            </td>
                                            <td id=\"point\">".$row['wins']."</div></td>
                                            <td id=\"point\">".$row['loses']."</td>
                                            <td id=\"point\">".$row['draws']."</td>
                                            <td id=\"point\">".$row['points']."</td>
                                        </tr>";
                                    }
                                    
                                    }

                                    
                                ?>
                        
                            
                                
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-7" style="text-align: center; display: block;">
                <?php
                 $conn = mysqli_connect("localhost", "root", "password", "footballbasic");
                 if ($conn->connect_error) {
                     die("Connection failed: ". $conn-> connect_error);
                 }
                 $sql = "SELECT logo from league";
                 $result = $conn-> query($sql);
                 $resultCheck = mysqli_num_rows($result);

                 if ($resultCheck > 0){
                     while ($row = mysqli_fetch_assoc($result)){
                         echo "<img class=\"img-fluid mb-3 mb-lg-0\" src=\"assets/img/pl2.jpg\" alt=\"\" />";
                     }
                    }
                ?>
                </div>
            </div>

            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-6 col-lg-7" style="text-align: center; display: block;">
                <?php
                 $conn = mysqli_connect("localhost", "root", "password", "ligue1");
                 if ($conn->connect_error) {
                     die("Connection failed: ". $conn-> connect_error);
                 }
                 $sql = "SELECT logo from league";
                 $result = $conn-> query($sql);
                 $resultCheck = mysqli_num_rows($result);

                 if ($resultCheck > 0){
                     while ($row = mysqli_fetch_assoc($result)){
                         echo "<img class=\"img-fluid mb-3 mb-lg-0\" src=\"assets/img/l2.jpg\" alt=\"\" />";
                     }
                    }
                ?>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <div class="featured-text-left text-center text-lg-left">
                        <h2>Ligue 1 2020</h2>
                        <table width="100%">
                            <col style="width:50%">
                            <col style="width:12.5%">
                            <col style="width:12.5%">
                            <col style="width:12.5%">
                            <col style="width:12.5%">
                            <thead>
                                <tr>
                                    <th id="team-checkboard">Position</th>
                                    <th id="point">W</th>
                                    <th id="point">L</th>
                                    <th id="point">D</th>
                                    <th id="point">PTS</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $conn = mysqli_connect("localhost", "root", "password", "ligue1");
                                    if ($conn->connect_error) {
                                        die("Connection failed: ". $conn-> connect_error);
                                    }
                                    $sql = "SELECT rank, logo,team_id, team_name, wins, loses, draws, points from standings LIMIT 5";
                                    $result = $conn-> query($sql);
                                    $resultCheck = mysqli_num_rows($result);
                                    if ($resultCheck > 0){
                                        while ($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>
                                            <td id=\"team-checkboard\">
                                                <p>"."0".$row['rank']."</p>
                                                <img src=\"".$row['logo']."\" alt=\"\" style=\"width: 30px; height: 30px;\">
                                                <a style=\"padding-left:8px;\" href=\"club-detail.php?teamid=".$row["team_id"]."&league=ligue1\">".$row['team_name']."</a>
                                            </td>
                                            <td id=\"point\">".$row['wins']."</div></td>
                                            <td id=\"point\">".$row['loses']."</td>
                                            <td id=\"point\">".$row['draws']."</td>
                                            <td id=\"point\">".$row['points']."</td>
                                        </tr>";
                                    }
                                    
                                    }

                                    
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
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
    <!-- Footer-->
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