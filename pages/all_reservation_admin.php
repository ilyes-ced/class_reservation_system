<?php

if ($_COOKIE['admin'] == 'adminp') {
  if ($_COOKIE['admin'] == null) {
    header("Location: login");
  }
} else {
  if ($_COOKIE['login'] == null) {
    header("Location: login");
  }
  if ($_COOKIE['admin'] == null) {
    header("Location: login");
  }
  $username = $_COOKIE['login'];
  $user =  $_COOKIE['login'];
}


function check_accs()
{

  require('connect.php');




  $req = $bdd->query('SELECT * from users where expiration_date<>"none"');
  while ($rr = $req->fetch()) {

    if (date("Y-m-d") > $rr['expiration_date']) {
      $bdd->query('UPDATE users SET expiration_date="none",status="unactive" where id=' . $rr["id"]);
    }
  }




  require('disconnect.php');
}
check_accs();




$error = '';

if (isset($_POST['added'])) {


  require('connect.php');
  $co = 0;
  $req = $bdd->query('SELECT * from rooms WHERE room="AMPHI "');
  while ($result = $req->fetch()) {
    if ($result['indexes'] == $_POST['added']) {
      $co++;
    }
  }

  if ($co == 0) {

    $req = $bdd->prepare('INSERT INTO rooms(room,indexes) VALUES(:v,:r)');
    $req->execute(array(
      'v' => 'AMPHI ',
      'r' => $_POST['added'],
    ));




    $req2 = $bdd->query('SELECT number_of_periods FROM time');
    $result = $req2->fetch();

    for ($i = 1; $i <= $result['number_of_periods']; $i++) {
      $sql = ('ALTER TABLE table_amphi ADD cell' . ($_POST['added'] - 1) * $result['number_of_periods'] + $i . ' varchar(30) DEFAULT("/")');
      $bdd->exec($sql);
    }

    // header("Refresh:0; url=all_reservation_admin.php");

  } else {
    $error = 'do not add duplicate rooms';
  }

  require('disconnect.php');
}





if (isset($_POST['added2'])) {
  require('connect.php');


  $co = 0;
  $req = $bdd->query('SELECT * from rooms WHERE room="TD "');
  while ($result = $req->fetch()) {
    if ($result['indexes'] == $_POST['added2']) {
      $co++;
    }
  }

  if ($co == 0) {
    $req = $bdd->prepare('INSERT INTO rooms(room,indexes) VALUES(:v,:r)');
    $req->execute(array(
      'v' => 'TD ',
      'r' => $_POST['added2'],
    ));



    $req2 = $bdd->query('SELECT number_of_periods FROM time');
    $result = $req2->fetch();

    for ($i = 1; $i <= $result['number_of_periods']; $i++) {
      $sql = ('ALTER TABLE table_td ADD box' . ($_POST['added2'] - 1) * $result['number_of_periods'] + $i . ' varchar(30) DEFAULT("/")');
      $bdd->exec($sql);
    }
    //header("Refresh:0; url=all_reservation_admin.php");

  } else {
    $error = 'do not add duplicate rooms';
  }



  require('disconnect.php');
}





if (isset($_POST['added3'])) {
  require('connect.php');





  $co = 0;
  $req = $bdd->query('SELECT * from rooms WHERE room="TP "');
  while ($result = $req->fetch()) {
    if ($result['indexes'] == $_POST['added3']) {
      $co++;
    }
  }

  if ($co == 0) {
    $req = $bdd->prepare('INSERT INTO rooms(room,indexes) VALUES(:v,:r)');
    $req->execute(array(
      'v' => 'TP ',
      'r' => $_POST['added3'],
    ));



    $req2 = $bdd->query('SELECT number_of_periods FROM time');
    $result = $req2->fetch();

    for ($i = 1; $i <= $result['number_of_periods']; $i++) {
      $sql = ('ALTER TABLE table_tp ADD square' . ($_POST['added3'] - 1) * $result['number_of_periods'] + $i . ' varchar(30) DEFAULT("/")');
      $bdd->exec($sql);
    }
    //  header("Refresh:0; url=all_reservation_admin.php");

  } else {
    $error = 'do not add duplicate rooms';
  }


  require('disconnect.php');
}










if (isset($_POST['change_mode'])) {


  if ($_COOKIE['mode'] == 'light') {
    setcookie('mode', 'dark', time() + 365 * 24 * 3600, '/');
    $_COOKIE['mode'] = 'dark';
  } elseif ($_COOKIE['mode'] == 'dark') {
    setcookie('mode', 'light', time() + 365 * 24 * 3600, '/');
    $_COOKIE['mode'] = 'light';
  } else {
    setcookie('mode', 'dark', time() + 365 * 24 * 3600, '/');
    $_COOKIE['mode'] = 'dark';
  }
}




if (isset($_COOKIE['mode'])) {
} else {
  setcookie('mode', 'light', time() + 365 * 24 * 3600, '/');
  $_COOKIE['mode'] = 'light';
}



$rr = array();
$vv = array();

$cols = json_decode($_COOKIE['colors'], true);
$cols2 = json_decode($_COOKIE['colors']);


foreach ($cols as $key => $value) {


  array_push($rr, $key, $value);
}

$vv = implode('|', $rr);







if (isset($date2)) {
  $date1 = $date2;
} elseif (isset($_POST['the_date'])) {
  $date1 = $_POST['the_date'];
} else {
  if (isset($_POST['this_date'])) {
    $date1 = ($_POST['this_date']);
  } else {
    $jj = new DateTime();
    $date1 = $jj->format('Y-m-d');
  }
}

if (isset($_POST['this_date'])) {
  setcookie('dater', $_POST['this_date'], time() + 600, '/');
  $_COOKIE['dater'] = $_POST['this_date'];
} else {

  if (isset($_COOKIE['dater'])) {
    $date1 = $_COOKIE['dater'];
  } else {
    setcookie('dater', $date1, time() + 600, '/');
    $_COOKIE['dater'] = $date1;
  }
}








function f1($xx)
{
  if ($xx == 'amphi') {
    $table = 'table_amphi';
    $room = 'AMPHI ';
    $cont = 'cell';
    $array = 'ara';
  } elseif ($xx == 'td') {
    $table = 'table_td';
    $room = 'TD ';
    $cont = 'box';
    $array = 'ara2';
  } elseif ($xx == 'tp') {
    $table = 'table_tp';
    $room = 'TP ';
    $cont = 'square';
    $array = 'ara3';
  }

  $exists = 0;
  global $date1;
  $ara = array();
  require('connect.php');

  $req = $bdd->query('SELECT datee FROM ' . $table);

  while ($result = $req->fetch()) {
    if ($result['datee'] == $date1) {
      $exists = 1;
      break;
    } else {
      $exists = 0;
    }
  }




  if ($exists == 1) {
    $req = $bdd->prepare('SELECT * FROM ' . $table . ' WHERE datee= :d');
    $req->execute(array(
      'd' => $date1
    ));


    while ($dd = $req->fetch()) {


      $req2 = $bdd->query('SELECT number_of_periods FROM time');
      $result = $req2->fetch();

      $req3 = $bdd->query('SELECT indexes FROM rooms WHERE room="' . $room . '" order by indexes');



      while ($bb = $req3->fetch()) {
        global  ${$array . $bb['indexes']};
        ${$array . $bb['indexes']} = array();



        for ($i = 1; $i <= $result['number_of_periods']; $i++) {


          $name = $cont . ($bb['indexes'] - 1) * $result['number_of_periods'] + $i;

          array_push(${$array . $bb['indexes']}, $dd[$name]);
        }
      }
    }
  } else {
    $req = $bdd->prepare('INSERT INTO ' . $table . '(datee) VALUES(:v0)');
    $req->execute(array(
      'v0' => $date1,

    ));

    $req = $bdd->prepare('SELECT * FROM ' . $table . ' WHERE datee= :d');
    $req->execute(array(
      'd' => $date1
    ));

    while ($dd = $req->fetch()) {


      $req2 = $bdd->query('SELECT number_of_periods FROM time');
      $result = $req2->fetch();

      $req3 = $bdd->query('SELECT indexes FROM rooms WHERE room="' . $room . '" order by indexes');



      while ($bb = $req3->fetch()) {

        global  ${$array . $bb['indexes']};
        ${$array . $bb['indexes']} = array();



        for ($i = 1; $i <= $result['number_of_periods']; $i++) {


          $name = $cont . ($bb['indexes'] - 1) * $result['number_of_periods'] + $i;

          array_push(${$array . $bb['indexes']}, $dd[$name]);
        }
      }
    }
  }


  require('disconnect.php');
}


/*
$am='amphi';
$td='td';
$tp='tp';
f1($am);
f1($td);
f1($tp);
*/

f1('amphi');
f1('td');
f1('tp');



















if (isset($_POST['del_td'])) {
  require('connect.php');

  $pieces = explode("|", $_POST['del_td']);
  $bdd->query("DELETE FROM rooms WHERE room='" . $pieces[0] . "' AND indexes='" . $pieces[1] . "'");

  $req = $bdd->query('SELECT number_of_periods FROM time');
  $result = $req->fetch();
  for ($i = 1; $i <= $result['number_of_periods']; $i++) {
    //echo ($pieces[1]-1)*$result['number_of_periods']+$i;
    $sql = ('ALTER TABLE table_td DROP COLUMN  box' . ($pieces[1] - 1) * $result['number_of_periods'] + $i);
    $bdd->exec($sql);
  }
  require('disconnect.php');
}

if (isset($_POST['del_tp'])) {
  require('connect.php');

  $pieces = explode("|", $_POST['del_tp']);
  $bdd->query("DELETE FROM rooms WHERE room='" . $pieces[0] . "' AND indexes='" . $pieces[1] . "'");


  $req = $bdd->query('SELECT number_of_periods FROM time');
  $result = $req->fetch();
  for ($i = 1; $i <= $result['number_of_periods']; $i++) {
    $sql = ('ALTER TABLE table_tp DROP COLUMN  square' . ($pieces[1] - 1) * $result['number_of_periods'] + $i);
    $bdd->exec($sql);
  }

  require('disconnect.php');
}

if (isset($_POST['del_amphi'])) {
  require('connect.php');
  $pieces = explode("|", $_POST['del_amphi']);
  $bdd->query("DELETE FROM rooms WHERE room='" . $pieces[0] . "' AND indexes='" . $pieces[1] . "'");


  $req = $bdd->query('SELECT number_of_periods FROM time');
  $result = $req->fetch();
  for ($i = 1; $i <= $result['number_of_periods']; $i++) {
    $sql = ('ALTER TABLE table_amphi DROP COLUMN  cell' . ($pieces[1] - 1) * $result['number_of_periods'] + $i);
    $bdd->exec($sql);
  }

  require('disconnect.php');
}


?>

<!DOCTYPE html>


<html>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NTIC</title>
  <link rel="icon" type="image/x-icon" href="../assets/images/fafa.png">



  <!--
  
      <script src="../assets/js/popper.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">



      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   


 -->




  <link rel="stylesheet" href="../assets/styles/style7.php">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/bootstrap-icons.css">



</head>











<body class="light">

  <?php
  require('connect.php');
  $req = $bdd->query("SELECT * FROM time");
  $result = $req->fetch();

  if (isset($_COOKIE['login'])) { ?>
    <script>
      var user1 = '<?php echo $_COOKIE['login']; ?>';
      var times = '<?php echo $result['number_of_periods']; ?>';
      var colors_array = '<?php echo $vv; ?>';
    </script>
  <?php
  } else {
  ?>
    <script>
      var colors_array = '<?php echo $vv; ?>';
    </script>

  <?php
  }
  ?>



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
        ?>

      </button>







      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="all_reservation_admin">home</a>
          </li>
          <li class="nav-item">
            <a lang='en' class="nav-link" href="my_reservation_page">My Reservations</a>

          </li>
          <li class="nav-item">





            <?php

            require('connect.php');




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



          </li>


          <?php
          require('connect.php');
          $req = $bdd->query("select image from users where username='" . $_COOKIE['login'] . "'");


          $row = $req->fetch();

          if ($row['image'] == 'none') {
            $image_src = 'images/avatar.png';
          } else {
            $image_src = $row['image'];
          }
          require('disconnect.php'); ?>




          <li class="nav-item jj">

            <img class="ll cir nav-link" src='../assets/<?php echo $image_src;  ?>' />
          </li>

          <li class="nav-item jj">

          <li class="nav-item jj">

            <a onclick="myFunction()" style='cursor: pointer;' class="mm nav-link active"><?php echo $_COOKIE['login']; ?></a>

          </li>
          <li class="nav-item jj">

            <div class="dropdown">
              <button onclick="myFunction()" class="dropbtn">

                <?php
                if ($_COOKIE['mode'] == 'light') {
                  echo ' <svg width="24px" height="24px" fill="black" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <g>
      <path fill="none" d="M0 0h24v24H0z"/>
      <path d="M12 14l-4-4h8z"/>
  </g>
</svg>';
                } else {
                  echo ' <svg width="24px" height="24px" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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

                  echo '<a href="#" id="change_the_mode"><i class="bi bi-moon"></i></i>dark mode</a>';
                } else {
                  echo '<a href="#" id="change_the_mode"><i class="bi bi-sun"></i></i>light mode</a>';
                }
                ?>

                <span class="devider"></span>

                <a class="nav-link ww" href="my_profile_page"><i class="bi bi-person"></i>profile</a>
                <span class="devider"></span>
                <a class="nav-link ww" href="settings2"><i class="bi bi-gear"></i>settings</a>


                <span class="devider"></span>

                <a class="nav-link ww" href="stats"><i class="bi bi-graph-up"></i>
                  statistics</a>

                <span class="devider"></span>

                <form id='logout_form' action='delete_user_info.php' id="ninja" method="post">
                  <a id='logout' class="nav-link ww" href="#" onclick="document.getElementById('logout_form').submit()"><i class="bi bi-box-arrow-right"></i>logout</a>
                </form>

              </div>
            </div>


          </li>


        </ul>

      </div>
    </div>




  </nav>








  <!--


<?php
require('connect.php');

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
          <a style="color: red;" class="nav-link" href="msg">REQUESTS</a>
      </li>';
}


require('disconnect.php');
?>

        -->


















  <form action='all_reservation_admin' id="mode_hidden_form" method="post">
    <input type="hidden" id="some_some" name="change_mode" required />

  </form>


































  <div class="container mt-5">

    <form id='this_form' action="all_reservation_admin" method="post">
      <div class="row justify-content-md-center">
        <div class="col">
          <div class="form-group">

            <div class="input-group">
              <div class="input-group-prepend">
              </div>
              <input style='width:40%;margin-right: 10px;' name='this_date' type="date" value='<?php echo $date1; ?>' class="form-control date-input date" id="pure-date" aria-describedby="date-design-prepend">





              <select style="text-align-last:center;width:40%;margin-left: 10px;" name="type" id="the_display" class="form-control select">
                <option disabled selected value>select display</option>
                <option value="all">ALL</option>
                <option value="amphi">AMPHI</option>
                <option value="td">TD</option>
                <option value="tp">TP</option>
              </select>

            </div>
          </div>
        </div>

    </form>


    <br /><br />

    <?php
    if ($error != '') {
      echo '<h3 style="text-align:center;margin-top:50px;color:rgb(248,72,56) !important;">' . $error . '</h3>
';
    }
    ?>



    <div class="table-box mt-5">
      <div id='dis_amphi' class="amphi_tables">


        <h3 class="mb-5 ">AMPHI</h3>




        <?php
        require('connect.php');
        $req = $bdd->query("SELECT number_of_periods FROM time");
        $req2 = $bdd->query("SELECT * FROM time");
        $result = $req->fetch();
        $result2 = $req2->fetch();
        $width = 100 / ($result['number_of_periods'] + 1);



        $req3 = $bdd->query("SELECT * FROM rooms where room='AMPHI '");
        if ($req3->rowCount() > 0) {


          $html = '<div class="table-box mt-5">
<div class="table-row table-head">
    <div style="width:' . $width . '%" class="table-cell first-cell table-head-one">
        <a>AMPHI</a>
    </div>';



          echo $html;




          $html = '';

          for ($i = 1; $i <= $result['number_of_periods']; $i++) {

            $html .= '
 
<div style="width:' . $width . '%" class="table-cell">
<a>' . $result2['period' . $i . ''] . '</a>
</div>
';
          }


          echo $html;
        } else {
          echo '<div class="table-box mt-5">
  <h3 class="mb-5" style="text-align-last:center">no amphis added</h3>';
        }



        echo '  </div>';








        $req = $bdd->prepare('SELECT * FROM rooms WHERE room=:v order by indexes');
        $req->execute(array(
          'v' => 'AMPHI '
        ));

        while ($result3 = $req->fetch()) {
          if ($result3['special'] == 'special') {
            $sp = 'special';
            $r = '(S)';
          } else {
            $sp = '';
            $r = '';
          }

          $var = '<div class="table-row">
  <div style="width:' . $width . '%" class="table-cell first-cell">
      <a class="pp">' . $result3['room'] . " " . $result3['indexes'] . ' ' . $r . '</a>
  </div>';



          if ($result['number_of_periods'] > 1) {
            for ($i = 1; $i <= $result['number_of_periods'] - 1; $i++) {
              $id = ($result3['indexes'] - 1) * $result['number_of_periods'] + $i;

              $var .= '
     
    <div style="width:' . $width . '%" class="table-cell">
    

    <a id="cell' . $id . '" class="pp">' . ${'ara' . $result3['indexes']}[$i - 1] . '</a>
    <div class="contact">
      <a href="login">Send A Msg </a>
    </div>
    <div class="reservation">
      <a>Reserver</a>
    </div>


    </div>
    ';
            }
          } else {
            $id = $result3['indexes'] - 1;
            $i = 1;
          }




          $var .= '<div style="width:' . $width . '%" class="table-cell last-cell">
    <a id="cell' . $id + 1 . '" class="pp">' . ${'ara' . $result3['indexes']}[$i - 1] . '</a>
    <div class="contact">
      <a href="msg_page.html">Send A Msg</a>
    </div>
    <div class="reservation">
      <a>Reserver</a>
    </div>
  </div>
  </div>';
          echo $var;
        }
        require('disconnect.php');
        ?>

        <button style='font-size:12px !important;' type="button" class="btn btn-secondary float-end m-2" data-bs-toggle="modal" data-bs-target="#edit1">
          ADD
        </button>
        <button style='font-size:12px !important;' type="button" class="btn btn-secondary float-end m-2" data-bs-toggle="modal" data-bs-target="#edit5">
          REMOVE
        </button>


      </div>



    </div>


    <div class="modal fade" id="edit1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add A New Amphi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action='all_reservation_admin' method="post">
            <div class="mb-3">
              <input name='added' type="number" placeholder="enter number only" class="form-control" aria-describedby="emailHelp" min="1" max="10" autofocus>
            </div>
            <button style='width:100%' type="submit" class="btn btn-secondary">Save</button>

          </form>
        </div>
      </div>
    </div>





    <div class="modal fade" id="edit5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">remove room</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action='all_reservation_admin' method="post">
            <div class="mb-3">
              <select style="text-align-last:center;" name="del_amphi" id="type_time" class="form-control mb-4">
                <option disabled selected value>select class to delete</option>


                <?php





                $req = $bdd->query('SELECT * FROM rooms WHERE room="amphi" order by room,indexes');


                while ($result = $req->fetch()) {

                  $v = '<option value="' . $result['room'] . '|' . $result['indexes'] . '">' . $result['room'] . $result['indexes'] . '</option>';

                  echo $v;
                }

                ?>






              </select>
              <button style='width:100%' type="submit" class="btn btn-secondary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div id='dis_td'>

      <h3 class="mb-5">TD Classes</h3>

      <div class="table-box mt-5">




        <?php
        require('connect.php');
        $req = $bdd->query("SELECT number_of_periods FROM time");
        $req2 = $bdd->query("SELECT * FROM time");
        $result = $req->fetch();
        $result2 = $req2->fetch();
        $width = 100 / ($result['number_of_periods'] + 1);

        $req3 = $bdd->query("SELECT * FROM rooms where room='TD '");
        if ($req3->rowCount() > 0) {



          $html = '<div class="table-box mt-5">
<div class="table-row table-head">
    <div style="width:' . $width . '%" class="table-cell first-cell table-head-one">
        <a>TD Classes</a>
    </div>';



          echo $html;




          $html = '';

          for ($i = 1; $i <= $result['number_of_periods']; $i++) {

            $html .= '
 
<div style="width:' . $width . '%" class="table-cell">
<a>' . $result2['period' . $i . ''] . '</a>
</div>
';
          }


          echo $html;
          echo '  </div>';
        } else {
          echo '<div class="table-box mt-5">
  <h3 class="mb-5" style="text-align-last:center">no td classes added</h3>';
        }








        $req = $bdd->prepare('SELECT * FROM rooms WHERE room=:v order by indexes');
        $req->execute(array(
          'v' => 'TD '
        ));

        while ($result3 = $req->fetch()) {
          if ($result3['special'] == 'special') {
            $sp = 'special';
            $r = '(S)';
          } else {
            $sp = '';
            $r = '';
          }

          $var = '<div class="table-row">
  <div style="width:' . $width . '%" class="table-cell first-cell">
      <a class="pp">' . $result3['room'] . " " . $result3['indexes'] . ' ' . $r . '</a>
  </div>';



          if ($result['number_of_periods'] > 1) {

            for ($i = 1; $i <= $result['number_of_periods'] - 1; $i++) {
              $id = ($result3['indexes'] - 1) * $result['number_of_periods'] + $i;

              $var .= '
     
    <div style="width:' . $width . '%" class="table-cell">
    

    <a id="box' . $id . '" class="pp">' . ${'ara2' . $result3['indexes']}[$i - 1] . '</a>
    <div class="contact">
      <a href="login">Send A Msg </a>
    </div>
    <div class="reservation">
      <a>Reserver</a>
    </div>


    </div>
    ';
            }
          } else {
            $id = $result3['indexes'] - 1;
            $i = 1;
          }


          $var .= '<div style="width:' . $width . '%" class="table-cell last-cell">
    <a id="box' . $id + 1 . '" class="pp">' . ${'ara2' . $result3['indexes']}[$i - 1] . '</a>
    <div class="contact">
      <a href="msg_page.html">Send A Msg</a>
    </div>
    <div class="reservation">
      <a>Reserver</a>
    </div>
  </div>
  </div>';

          echo $var;
        }

        require('disconnect.php');
        ?>

        <div>

          <button style='font-size:12px !important;' type="button" class="btn btn-secondary float-end m-2" data-bs-toggle="modal" data-bs-target="#edit2">
            ADD
          </button>
          <button style='font-size:12px !important;' type="button" class="btn btn-secondary float-end m-2" data-bs-toggle="modal" data-bs-target="#edit6">
            REMOVE
          </button>
        </div>

      </div>
    </div>
  </div>



  <div id='dis_tp'>


    <h3 class=" mb-5">TP Classes</h3>
    <div class="table-box mt-5">

      <?php
      require('connect.php');
      $req = $bdd->query("SELECT number_of_periods FROM time");
      $req2 = $bdd->query("SELECT * FROM time");
      $result = $req->fetch();
      $result2 = $req2->fetch();
      $width = 100 / ($result['number_of_periods'] + 1);




      $req3 = $bdd->query("SELECT * FROM rooms where room='TP '");
      if ($req3->rowCount() > 0) {


        $html = '<div class="table-box mt-5">
<div class="table-row table-head">
<div style="width:' . $width . '%" class="table-cell first-cell table-head-one">
  <a>TP Classes</a>
</div>';



        echo $html;




        $html = '';

        for ($i = 1; $i <= $result['number_of_periods']; $i++) {

          $html .= '

<div style="width:' . $width . '%" class="table-cell">
<a>' . $result2['period' . $i . ''] . '</a>
</div>
';
        }


        echo $html;
        echo '  </div>';
      } else {
        echo '<div class="table-box mt-5">
  <h3 class="mb-5" style="text-align-last:center">no tp classes added</h3>';
      }










      $req = $bdd->prepare('SELECT * FROM rooms WHERE room=:v order by indexes');
      $req->execute(array(
        'v' => 'TP '
      ));

      while ($result3 = $req->fetch()) {
        if ($result3['special'] == 'special') {
          $sp = 'special';
          $r = '(S)';
        } else {
          $sp = '';
          $r = '';
        }

        $var = '<div class="table-row">
<div style="width:' . $width . '%" class="table-cell first-cell">
<a class="pp">' . $result3['room'] . " " . $result3['indexes'] . ' ' . $r . '</a>
</div>';



        if ($result['number_of_periods'] > 1) {

          for ($i = 1; $i <= $result['number_of_periods'] - 1; $i++) {
            $id = ($result3['indexes'] - 1) * $result['number_of_periods'] + $i;

            $var .= '

<div style="width:' . $width . '%" class="table-cell">


<a id="square' . $id . '" class="pp">' . ${'ara3' . $result3['indexes']}[$i - 1] . '</a>
<div class="contact">
<a href="msg_page.html">Send A Msg </a>
</div>
<div class="reservation">
<a>Reserver</a>
</div>


</div>
';
          }
        } else {
          $id = $result3['indexes'] - 1;
          $i = 1;
        }







        $var .= '<div style="width:' . $width . '%" class="table-cell last-cell">
<a id="square' . $id + 1 . '" class="pp">' . ${'ara3' . $result3['indexes']}[$i - 1] . '</a>
<div class="contact">
<a href="msg_page.html">Send A Msg</a>
</div>
<div class="reservation">
<a>Reserver</a>
</div>
</div>
</div>';
        echo $var;
      }





      require('disconnect.php');


      ?>



      <button style='font-size:12px !important;' type="button" class="btn btn-secondary float-end m-2" data-bs-toggle="modal" data-bs-target="#edit3">
        ADD
      </button>
      <button style='font-size:12px !important;' type="button" class="btn btn-secondary float-end m-2" data-bs-toggle="modal" data-bs-target="#edit7">
        REMOVE
      </button>
    </div>
  </div>
  </div>



  <div class="modal fade" id="edit2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add A New Class</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action='all_reservation_admin' method="post">
          <div class="mb-3">
            <input name='added2' type="number" placeholder="enter number only" class="form-control" aria-describedby="emailHelp" min="1" max="50">
          </div>
          <button style='width:100%' type="submit" class="btn btn-secondary">Save</button>

        </form>
      </div>
    </div>
  </div>



  <div class="modal fade" id="edit6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">remove room</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action='all_reservation_admin' method="post">
          <select style="text-align-last:center;" name="del_td" id="type_time" class="form-control mb-4">
            <option disabled selected value>select class to delete</option>


            <?php




            $req = $bdd->query('SELECT * FROM rooms WHERE room="td" order by room,indexes');


            while ($result = $req->fetch()) {

              $v = '<option value="' . $result['room'] . '|' . $result['indexes'] . '">' . $result['room'] . $result['indexes'] . '</option>';

              echo $v;
            }
            ?>





          </select>
          <button style='width:100%' type="submit" class="btn btn-secondary">Save</button>

        </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="edit3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add A New tp class</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action='all_reservation_admin' method="post">
          <div class="mb-3">
            <input name='added3' type="number" placeholder="enter number only" class="form-control" aria-describedby="emailHelp" min="1" max="50">
          </div>
          <button style='width:100%' type="submit" class="btn btn-secondary">Save</button>

        </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="edit7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">remove tp room</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action='all_reservation_admin' method="post">
          <select style="text-align-last:center;" name="del_tp" id="type_time" class="form-control mb-4">
            <option disabled selected value>select class to delete</option>
      </div>
    </div>
  </div>

  <?php




  $req = $bdd->query('SELECT * FROM rooms WHERE room="tp" order by room,indexes');


  while ($result = $req->fetch()) {

    $v = '<option value="' . $result['room'] . '|' . $result['indexes'] . '">' . $result['room'] . $result['indexes'] . '</option>';

    echo $v;
  }
  ?>





  </select>
  <button style='width:100%' type="submit" class="btn btn-secondary">Save</button>

  </form>
  </div>



  </div>


  </div>


  <div id="myModal" class="modal">


    <div class="modal-content">
      <span class="close the_special">&times;</span>
      <div class="modal-container row">
        <div class=" col-6">

          <form action='all_reservation_page' id="ninja" method="post">
            <div class="form-check">
              <input name='check[]' class="form-check-input" type="checkbox" value="datashow" id="dev_cell1">
              <label class="form-check-label" for="defaultCheck1">
                datashow
              </label>
            </div>
            <div class="form-check">
              <input name='check[]' class="form-check-input" type="checkbox" value="router" id="dev_cell2">
              <label class="form-check-label" for="defaultCheck1">
                router
              </label>
            </div>
            <div class="form-check">
              <input name='check[]' class="form-check-input" type="checkbox" value="switch" id="dev_cell3">
              <label class="form-check-label" for="defaultCheck1">
                switch
              </label>
            </div>
            <div class="form-check">
              <input name='check[]' class="form-check-input" type="checkbox" value="access point" id="dev_cell4">
              <label class="form-check-label" for="defaultCheck1">
                access point
              </label>
            </div>
        </div>



      </div>

      </form>
      <button id='reserve' type="button" class="btn btn-secondary mt-3">RESERVE</button>
    </div>

  </div>


  <div id="myModal2" class="modal2">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modal-container row">
        <div class=" col-6 herehere">




        </div>

      </div>


    </div>

  </div>








  <input type='hidden' id='some_cell'>
  <input type='hidden' id='some_date'>
  <input type='hidden' id='some_reciever'>






  <div id="suc" class="suc">

    <!-- Modal content -->
    <div class="modal-content">

      <div class="modal-container row">
        <div class=" col-6">


          <p style='text-align:center;padding-top:10px;' class='p1'>
            message sent successfully
          </p>

        </div>

      </div>


    </div>

  </div>




  <div id="suc2" class="suc2">

    <!-- Modal content -->
    <div class="modal-content">

      <div class="modal-container row">
        <div class=" col-6">


          <p style='text-align:center;padding-top:10px;' class='p1'>
            reservation made successfully
          </p>

        </div>

      </div>


    </div>

  </div>








  <div id="suc3" class="suc3">

    <!-- Modal content -->
    <div class="modal-content">

      <div class="modal-container row">
        <div class=" col-6">


          <p style='text-align:center;padding-top:10px;' class='p1'>
            demand sent successfully
          </p>

        </div>

      </div>


    </div>

  </div>



  <div id="myModal3" class="modal3">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modal-container row">
        <div class=" col-6">

          <form action='all_reservation_page' id="ninja_2" method="post">
            <div class="form-check">
              <input name='check[]' class="form-check-input" type="checkbox" value="datashow" id="dev_box1">
              <label class="form-check-label" for="defaultCheck1">
                DATASHOW
              </label>
            </div>
            <div class="form-check">
              <input name='check[]' class="form-check-input" type="checkbox" value="router" id="dev_box2">
              <label class="form-check-label" for="defaultCheck1">
                router
              </label>
            </div>
            <div class="form-check">
              <input name='check[]' class="form-check-input" type="checkbox" value="switch" id="dev_box3">
              <label class="form-check-label" for="defaultCheck1">
                switch
              </label>
            </div>
            <div class="form-check">
              <input name='check[]' class="form-check-input" type="checkbox" value="access point" id="dev_box4">
              <label class="form-check-label" for="defaultCheck1">
                access point
              </label>
            </div>
        </div>



      </div>

      </form>
      <button id='reserve2' type="button" class="btn btn-secondary mt-3">RESERVE</button>
    </div>

  </div>


  <div id="myModal4" class="modal4">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modal-container row">
        <div class=" col-6">

          <form action='all_reservation_page' id="ninja_3" method="post">
            <div class="form-check">
              <input name='check[]' class="form-check-input" type="checkbox" value="datashow" id="dev_square1">
              <label class="form-check-label" for="defaultCheck1">
                datashow
              </label>
            </div>
            <div class="form-check">
              <input name='check[]' class="form-check-input" type="checkbox" value="router" id="dev_square2">
              <label class="form-check-label" for="defaultCheck1">
                router
              </label>
            </div>
            <div class="form-check">
              <input name='check[]' class="form-check-input" type="checkbox" value="switch" id="dev_square3">
              <label class="form-check-label" for="defaultCheck1">
                switch
              </label>
            </div>
            <div class="form-check">
              <input name='check[]' class="form-check-input" type="checkbox" value="access point" id="dev_square4">
              <label class="form-check-label" for="defaultCheck1">
                access point
              </label>
            </div>
        </div>



      </div>


      </form>
      <button id='reserve3' type="button" class="btn btn-secondary mt-3">RESERVE</button>
    </div>

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

  <!--<script src="../assets/js/popper.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

-->



  <script src="../assets/js/bootstrap.js"></script>
  <script src="../assets/js/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/javascript.js"></script>




</body>

</html>