<?php



if (isset($_POST['idid_refuse'])) {
  require('connect.php');
  $req = $bdd->query('DELETE  FROM  demands WHERE id=' . $_POST['idid_refuse']);
}



$user =  $_COOKIE['login'];






if (isset($_POST['idid_accept'])) {
  require('connect.php');

  $req2 = $bdd->query('SELECT * FROM demands where id=' . $_POST['idid_accept']);
  while ($gg = $req2->fetch()) {
    $id = $gg['id'];
    $cell = $gg['cell'];
    $sender = $gg['sender'];
    $date = $gg['date'];
    $dd = $gg['devices'];
  }


  $ind = (int) filter_var($cell, FILTER_SANITIZE_NUMBER_INT);









  if ($cell[0] == 'c') {
    $req = $bdd->prepare('UPDATE table_amphi SET cell' . $ind . '=:new_user WHERE cell' . $ind . ' ="/" ');
  } elseif ($cell[0] == 'b') {
    $req = $bdd->prepare('UPDATE table_td SET box' . $ind . '=:new_user WHERE box' . $ind . ' ="/"');
  } elseif ($cell[0] == 's') {
    $req = $bdd->prepare('UPDATE table_tp SET square' . $ind . '=:new_user WHERE square' . $ind . ' ="/"');
  }









  $req->execute(array(

    'new_user' => $sender,


  ));


  $kk11 = 'none';
  $kk22 = 'none';
  $kk33 = 'none';
  $kk44 = 'none';

  $dev = explode('|', $dd);
  if ($dev[0] != '') {
    $kk11 = $dev[0];
  }
  if ($dev[1] != '') {
    $kk22 = $dev[1];
  }
  if ($dev[2] != '') {
    $kk33 = $dev[2];
  }
  if ($dev[3] != '') {
    $kk44 = $dev[3];
  }



  if ($cell[0] == 'c') {
    $req = $bdd->prepare('INSERT INTO  reservations1 VALUES(:v1,:v2,:v3,:v4,:v5,:v6,:v7)');
  } elseif ($cell[0] == 'b') {
    $req = $bdd->prepare('INSERT INTO  reservations2 VALUES(:v1,:v2,:v3,:v4,:v5,:v6,:v7)');
  } elseif ($cell[0] == 's') {
    $req = $bdd->prepare('INSERT INTO  reservations3 VALUES(:v1,:v2,:v3,:v4,:v5,:v6,:v7)');
  }
  $req->execute(array(

    'v1' => $sender,
    'v2' => $date,
    'v3' => $cell,
    'v4' => $kk11,
    'v5' => $kk22,
    'v6' => $kk33,
    'v7' => $kk44,
  ));

  // header("Refresh:0");
  $req = $bdd->query('DELETE  FROM  demands WHERE id=' . $_POST['idid_accept']);
}





if (isset($_POST['change_mode'])) {


  if ($_COOKIE['mode'] == 'light') {
    setcookie('mode', 'dark', time() + 365 * 24 * 3600, "/");
    $_COOKIE['mode'] = 'dark';
  } elseif ($_COOKIE['mode'] == 'dark') {
    setcookie('mode', 'light', time() + 365 * 24 * 3600, "/");
    $_COOKIE['mode'] = 'light';
  } else {
    setcookie('mode', 'dark', time() + 365 * 24 * 3600, "/");
    $_COOKIE['mode'] = 'dark';
  }
}
if (isset($_COOKIE['mode'])) {
} else {
  $_COOKIE['mode'] = 'dark';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NTIC</title>
  <link rel="icon" type="image/x-icon" href="../assets/images/fafa.png">

  <!--
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
-->



  <link rel="stylesheet" href="../assets/css/bootstrap-icons.css">

  <link rel="stylesheet" href="../assets/styles/style4.php">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>

<body class="light">


  <nav class="navbar navbar-expand-lg navbar-light">
    <div class=" container">
      <img src="../assets/images/logo-black.png" class="navbar-brand" href="hero_page.html"></img>
      <button style="border:  0px solid;" class="navbar-toggler" id='navnav' type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">




        <?php
        if ($_COOKIE['mode'] == 'light') {
          echo '<i class="bi bi-list " style="font-size:30px; margin:0px !important;"></i>';
        } else {
          echo '<i class="bi bi-list" style="font-size:30px;color:rgb(200,200,200);text-align:center !important;margin:0px !important;"></i>';
        }
        ?> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">

            <a class="nav-link active" aria-current="page" href="all_reservation_admin">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="my_reservation_page">My Reservations</a>
          </li>







          <?php
          require('connect.php');
          if (isset($_COOKIE['admin'])) {



            $req = $bdd->query('SELECT * FROM demands');

            $number_of_rows = $req->Rowcount();
            if ($number_of_rows == 0) {
              echo '<li class="nav-item">
                    <a class="nav-link" href="demande">DEMANDS</a>
                </li>';
            } else {
              echo '<li class="nav-item">
                  <a style="color: rgb(248,72,56) !important;" class="nav-link" href="demande">DEMANDS<span style="background-color:rgb(248,72,56) !important;" class="badge rounded-circle bg-danger">' . $number_of_rows . '</span></a>
              </li>';
            }
          }



          $req = $bdd->prepare('SELECT * FROM contact WHERE reciever=:v');
          $req->execute(array(
            'v' => $_COOKIE['login'],
          ));

          $number_of_rows = $req->Rowcount();
          if ($number_of_rows == 0) {
            echo '<li class="nav-item">
            <a class="nav-link" href="msg">REQUESTS</a>
        </li>';
          } else {
            echo '<li class="nav-item">
          <a style="color: rgb(248,72,56) !important;" class="nav-link" href="msg">REQUESTS<span style="background-color:rgb(248,72,56) !important;" class="badge rounded-circle bg-danger">' . $number_of_rows . '</span></a>
      </li>';
          }



          $req = $bdd->query("select image from users where username='" . $_COOKIE['login'] . "'");


          $row = $req->fetch();

          if ($row['image'] == 'none') {
            $image_src = 'images/avatar.png';
          } else {
            $image_src = $row['image'];
          }

          require('disconnect.php');

          ?>


          <script>
            function myFunction() {
              document.getElementById("myDropdown").classList.toggle("show");
            }


            window.onclick = function(event) {
              if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                  }
                }
              }
            }
          </script>



          <li class="nav-item jj">

            <img class="ll cir nav-link" src='../assets/<?php echo $image_src;  ?>' />
          </li>



          <li class="nav-item jj">
            <a href='' class="mm nav-link active "><?php echo $_COOKIE['login']; ?></a>

          </li>
          <li class="nav-item jj">

            <div class="dropdown">
              <button onclick="myFunction()" class="dropbtn">

                <?php
                if ($_COOKIE['mode'] == 'light') {
                  echo ' <svg id="hhjj" width="24px" height="24px" fill="black" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <g>
      <path fill="none" d="M0 0h24v24H0z"/>
      <path d="M12 14l-4-4h8z"/>
  </g>
</svg>';
                } else {
                  echo ' <svg id="hhjj" width="24px" height="24px" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <g>
      <path fill="none" d="M0 0h24v24H0z"/>
      <path d="M12 14l-4-4h8z"/>
  </g>
</svg>';
                }
                ?>

              </button>
              <div id="myDropdown" class="dropdown-content">


                <?php
                if ($_COOKIE['mode'] == 'light') {

                  echo '<a href="#" id="change_the_mode"><i class="bi bi-moon"></i>dark mode</a>';
                } else {
                  echo '<a href="#" id="change_the_mode"><i class="bi bi-sun"></i>light mode</a>';
                }
                ?>
                <span class="devider"></span>

                <a class="nav-link" href="my_profile_page"><i class="bi bi-person"></i>profile</a>

                <span class="devider"></span>

                <a class="nav-link ww" href="stats"><i class="bi bi-graph-up"></i>
                  statistics</a>

                <span class="devider"></span>


                <?php
                if (isset($_COOKIE['admin'])) {
                  echo '          <a class="nav-link" href="settings2"><i class="bi bi-gear"></i>settings</a>
     <span class="devider"></span> ';
                } ?>





                <form id='logout_form' action='delete_user_info' id="ninja" method="post">
                  <a id='logout' class="nav-link" href="#" onclick="document.getElementById('logout_form').submit()"><i class="bi bi-box-arrow-right"></i>logout</a>
                </form>
              </div>
            </div>


          </li>


        </ul>

      </div>
    </div>
  </nav>





  <div class="container mt-5">

    <h3>Demands</h3>
















    <?php
    require('connect.php');

    $reqreq = $bdd->query("SELECT * from demands");
    require('disconnect.php');

    $number_of_rows = $reqreq->Rowcount();
    if ($number_of_rows == 0) {
      echo '<br/><br/><br/><h3 class="mb-5" style="text-align-last:center">no demands made</h3>';
    } else {
      echo '

  <div class="table-box">
    <div class="table-row table-head">
        <div style="width:16.6666666667%;" class="table-cell first-cell table-head-one">
            <a>Name</a>
        </div>
        <div style="width:16.6666666667%;" class="table-cell">
            <a>Date</a>
        </div>
        <div style="width:16.6666666667%;" class="table-cell">
          <a>Room</a>
      </div>
        <div style="width:16.6666666667%;" class="table-cell">
          <a>Time</a>
      </div>
      <div style="width:16.6666666667%;" class="table-cell">
          <a>Devices</a>
      </div>
     

    <div style="width:16.6666666667%;" class="table-cell last-cell">
      <a>Agree / Disagree</a>
  </div> 
    </div>


';
    }



    ?>



    <form action='demande' id="mode_hidden_form" method="post">
      <input type="hidden" id="some_some" name="change_mode" required />

    </form>



    <?php



    $h = '';
    $array_ids = array();






    require('connect.php');



    $req = $bdd->query('SELECT  * FROM  demands');
    $number_of_rows = $req->Rowcount();
    while ($dd = $req->fetch()) {
      array_push($array_ids, $dd['id']);
    }



    for ($j = 0; $j < $number_of_rows; $j++) {

      $req2 = $bdd->query('SELECT * FROM time ');
      $req3 = $bdd->query('SELECT * FROM rooms');
      $result = $req2->fetch();
      $result2 = $req3->fetch();
      $req2 = $bdd->query('SELECT * FROM demands where id=' . $array_ids[$j]);
      while ($gg = $req2->fetch()) {
        $id = $gg['id'];
        $cell = $gg['cell'];
        $sender = $gg['sender'];
        $date = $gg['date'];
        $dd = $gg['devices'];
      }


      $ind = (int) filter_var($cell, FILTER_SANITIZE_NUMBER_INT);


      if ($ind % $result['number_of_periods'] == 0) {
        $time = $result['period' . $result['number_of_periods']];
      } else {
        $time = $result['period' . $ind % $result['number_of_periods']];
      }


      if ($cell[0] == 'c') {
        $room = 'AMPHI ' . ceil(($ind / $result['number_of_periods']));
      } elseif ($cell[0] == 'b') {
        $room = 'CLASS TD ' . ceil(($ind / $result['number_of_periods']));
      } elseif ($cell[0] == 's') {
        $room = 'CLASS TP ' . ceil(($ind / $result['number_of_periods']));
      }

      $kk = '';

      $dev = explode('|', $dd);
      if ($dev[1] != 'none') {
        $kk .= '<a class="to_be_colored d2">' . $dev[1] . "</a>";
      }
      if ($dev[2] != 'none') {
        $kk .= '<a class="to_be_colored d33">' . $dev[2] . "</a><br/>";
      }

      if ($dev[0] != 'none') {
        $kk .= '<a class="to_be_colored d">' . $dev[0] . "</a><br/>";
      }
      if ($dev[3] != 'none') {
        $kk .= '<a class="to_be_colored d4">' . $dev[3] . "</a>";
      }

      $fff = explode("-", $date);



      $h .= '
    <div id="' . $id . '" class="table-row ">
        <div style="width:16.666666666%;" class="table-cell first-cell ">
            <a class="pp">' . $sender . '</a>
        </div>
        <div style="width:16.666666666%;" class="table-cell">
            <a class="pp">' . $fff[2] . "-" . $fff[1] . "-" . $fff[0] . '</a>
        </div>

        <div style="width:16.666666666%;" class="table-cell">
        <a class="pp">' . $room . '</a>
    </div> 

        <div style="width:16.666666666%;" class="table-cell">
          <a class="pp">' . $time . '</a>
      </div> 

      <div style="width:16.666666666%;" class="text_alig table-cell">
          <a class="pp">' . $kk . '</a>
      </div> 

        <div style="width:16.666666666%;" class="table-cell">
        <form action="demande" id="form_accept" method="post">
        <button type="button" class="btn btn-success accept_btn2">Agree</button>
        <button type="button" class="btn btn-danger refuse_btn2">Disagree</button>
        <input type="hidden"  id="accept_hidden" name="accept" required/>
        </form>       

        <form  action="demande" id="form_refuse" method="post">
          <input type="hidden" id="refuse_hidden" name="refuse" required/>
          </form>     </div> 
    </div>';
    }

    echo $h;
    require('disconnect.php');


    ?>



  </div>



  <footer class="text-center text-lg-start text-muted">
    <div class="container">
      <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <div class="me-5 d-none d-lg-block">
        </div>

        <div>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-google"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-github"></i>
          </a>
        </div>
      </section>

      <section class="">
        <div class="container text-center text-md-start mt-5">
          <div class="row mt-3">
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <h6 class="text-uppercase fw-bold mb-4">
                <img src="../assets/images/logo-black.png" class="footer-logo">
              </h6>
              <p class="ppp">
                This Is Not The Officaily Website Of Constantine 2 University
              </p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <h6 class="text-uppercase fw-bold mb-4">
                Website
              </h6>
              <p>
                <a href="#!" class="text-reset text-light">Home</a>
              </p>
              <p>
                <a href="#!" class="text-reset text-light">How Does It Work</a>
              </p>
              <p>
                <a href="#!" class="text-reset text-light">Admin</a>
              </p>
              <p>
                <a href="#!" class="text-reset text-light">Sign Up</a>
              </p>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Useful Links
              </h6>
              <p>
                <a href="#!" class="text-reset text-light">Privicy</a>
              </p>
              <p>
                <a href="#!" class="text-reset text-light">Policy</a>
              </p>
              <p>
                <a href="#!" class="text-reset text-light">Contact</a>
              </p>
              <p>
                <a href="#!" class="text-reset text-light">Help</a>
              </p>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <h6 class="text-uppercase fw-bold mb-4">
                Contact
              </h6>
              <p> Constantine, NV 10012</p>
              <p>
                info@example.com
              </p>
              <p> + 213 234 567 88</p>
              <p> + 213 234 567 89</p>
            </div>
          </div>
        </div>
      </section>
      <hr>
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0);">
        © 2021 Copyright: Made By LATRAOUI Walid | OUCHETATI Ilyes
      </div>
    </div>
  </footer>
  <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        -->


  <script src="../assets/js/bootstrap.js"></script>
  <script src="../assets/js/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/javascript2.js"></script>
</body>

</html>