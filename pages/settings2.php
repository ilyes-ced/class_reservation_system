<?php


function ggjj($classes)
{
  require('connect.php');


  $req2 = $bdd->query('SELECT number_of_periods FROM time');
  $result = $req2->fetch();



  while ($rr = $classes->fetch()) {

    $req = $bdd->query('INSERT INTO rooms(room,indexes) VALUES("' . $rr['room'] . '","' . $rr['indexes'] . '")');

    if ($rr['room'][0] == 'A') {

      for ($i = 1; $i <= $result['number_of_periods']; $i++) {
        $sql = ('ALTER TABLE table_amphi ADD cell' . ($rr['indexes'] - 1) * $result['number_of_periods'] + $i . ' varchar(30) DEFAULT("/")');
        $bdd->exec($sql);
      }
    } elseif ($rr['room'][1] == 'D') {

      for ($i = 1; $i <= $result['number_of_periods']; $i++) {
        $sql = ('ALTER TABLE table_td ADD box' . ($rr['indexes'] - 1) * $result['number_of_periods'] + $i . ' varchar(30) DEFAULT("/")');
        $bdd->exec($sql);
      }
    } elseif ($rr['room'][1] == 'P') {

      for ($i = 1; $i <= $result['number_of_periods']; $i++) {
        $sql = ('ALTER TABLE table_tp ADD square' . ($rr['indexes'] - 1) * $result['number_of_periods'] + $i . ' varchar(30) DEFAULT("/")');
        $bdd->exec($sql);
      }
    }
  }
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
if ($_COOKIE['mode'] != 'light' and $_COOKIE['mode'] != 'dark') {
  $_COOKIE['mode'] = 'dark';
}




require('connect.php');
function tab($table)
{
  global $bdd;
  try {
    $bdd->query("SELECT 1 FROM " . $table . " ");
  } catch (PDOException $e) {
    return 0;
  }
  return 1;
}
//require('disconnect.php');
if (isset($_POST['type'])) {




  $classes = $bdd->query('SELECT * FROM rooms;');



  $req = $bdd->query('DROP TABLE table_amphi');
  $req = $bdd->query('DROP TABLE table_td');
  $req = $bdd->query('DROP TABLE table_tp');
  $req = $bdd->query('DELETE FROM rooms WHERE 1=1;');
  $req = $bdd->query('DELETE FROM reservations1 WHERE 1=1;');
  $req = $bdd->query('DELETE FROM reservations2 WHERE 1=1;');
  $req = $bdd->query('DELETE FROM reservations3 WHERE 1=1;');
  $req = $bdd->query('DELETE FROM contact WHERE 1=1;');
  $req = $bdd->query('DELETE FROM demands WHERE 1=1;');




  $sql = 'create table table_amphi (
      datee varchar(20)   NOT NULL,
      PRIMARY KEY (datee)
  )';
  $bdd->exec($sql);


  $sql = 'create table table_td (
  datee varchar(20)   NOT NULL,
  PRIMARY KEY (datee)
  )';
  $bdd->exec($sql);


  $sql = 'create table table_tp (
  datee varchar(20)   NOT NULL,
  PRIMARY KEY (datee)
  )';
  $bdd->exec($sql);





  if (tab('time') == 1) {
    $req = $bdd->query('DROP TABLE time');
  }


  $sql = 'CREATE TABLE time(number_of_periods varchar(20))';
  $bdd->exec($sql);

  $co = 1;
  for ($i = 1; $i <= $_POST['type'] * 2; $i += 2) {
    $ti = $_POST['tt' . $i] . ' - ' . $_POST['tt' . $i + 1];
    $sql = ('ALTER TABLE time ADD period' . $co . ' varchar(30) DEFAULT("' . $ti . '")');
    $bdd->exec($sql);


    $co++;
  }

  $req = $bdd->query('INSERT INTO time(number_of_periods) VALUES("' . $_POST['type'] . '")');
  ggjj($classes);
}

if (isset($_POST['disable'])) {



  $req = $bdd->query('select * from users where id=' . $_POST['disable']);
  while ($result = $req->fetch()) {
    if ($result['status'] == 'active') {
      $bdd->query('UPDATE  users SET status ="unactive" where id=' . $_POST['disable']);
    } else {
      $bdd->query('UPDATE  users SET status ="active" where id=' . $_POST['disable']);
    }
  }
}

if (isset($_POST['delete'])) {



  $bdd->query('DELETE FROM users WHERE id=' . $_POST['delete']);
}

if (isset($_POST['teachers'])) {



  if (isset($_POST['grade'])) {
    $bdd->query("UPDATE users SET grade='" . $_POST['grade'] . "' WHERE username='" . $_POST['teachers'] . "' ");
  }
  if (isset($_POST['dep'])) {
    $bdd->query("UPDATE users SET departement='" . $_POST['dep'] . "' WHERE username='" . $_POST['teachers'] . "' ");
  }
  if (isset($_POST['type_pers'])) {
    $bdd->query("UPDATE users SET type='" . $_POST['type_pers'] . "' WHERE username='" . $_POST['teachers'] . "' ");
  }
}

if (isset($_POST['disact'])) {
  $bdd->query("UPDATE users SET status='unactive' WHERE username='" . $_POST['disact'] . "' ");
}

if (isset($_POST['act'])) {
  $bdd->query("UPDATE users SET status='active' WHERE username='" . $_POST['act'] . "' ");
}

if (isset($_POST['added_grade'])) {
  $bdd->query("INSERT INTO grades VALUES('" . $_POST['added_grade'] . "')");
}

if (isset($_POST['added_dep'])) {
  $bdd->query("INSERT INTO departements VALUES('" . $_POST['added_dep'] . "')");
}

if (isset($_POST['remove_dep'])) {

  $bdd->query("DELETE FROM departements WHERE departements='" . $_POST['remove_dep'] . "'");
}

if (isset($_POST['remove_grade'])) {


  $bdd->query("DELETE FROM grades WHERE grades='" . $_POST['remove_grade'] . "'");
}

if (isset($_POST['add_special'])) {
  $oo = explode('|', $_POST['add_special']);
  $bdd->query("UPDATE rooms SET special='special' WHERE room='" . $oo[0] . "' AND indexes='" . $oo[1] . "'");
}

if (isset($_POST['remove_special'])) {
  $bdd->query("UPDATE rooms SET special='no' WHERE room='" . $_POST['remove_special'] . "' AND indexes='" . $_POST['remove_special2'] . "'");
}

if (isset($_POST['submit2'])) {





  $password_hash = password_hash($_POST['pass'], PASSWORD_BCRYPT);
  if (isset($_POST['exp_date'])) {

    $col = str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);


    $req = $bdd->prepare('INSERT INTO users(username,password,email,type,color,grade,departement,expiration_date) VALUES(:v1,:v2,:v3,:v4,:v0,:v5,:v6,:v7)');
    $req->execute(array(

      'v1' => $_POST['fname'] . " " . $_POST['name'],
      'v2' => $password_hash,
      'v3' => $_POST['mail'],
      'v4' => $_POST['type_pers'],
      'v0' => $col,
      'v5' => $_POST['grade'],
      'v6' => $_POST['dep'],
      'v7' => $_POST['exp_date'],
    ));
  } else {
    $col = str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    $req = $bdd->prepare('INSERT INTO users(username,password,email,type,color,grade,departement) VALUES(:v1,:v2,:v3,:v4,:v0,:v5,:v6)');
    $req->execute(array(
      'v1' => $_POST['fname'] . " " . $_POST['name'],
      'v2' => $password_hash,
      'v3' => $_POST['mail'],
      'v4' => $_POST['type_pers'],
      'v0' => $col,
      'v5' => $_POST['grade'],
      'v6' => $_POST['dep'],
    ));
  }
}

if (isset($_POST['submit_edit'])) {
  $bdd->query('UPDATE users SET grade="' . $_POST["grade_edit"] . '", departement="' . $_POST["dep_edit"] . '", type="' . $_POST["type_edit"] . '" WHERE id="' . $_POST['edit_id_hidden'] . '"');
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

  <link rel="stylesheet" href="../assets/css/bootstrap-icons.css">

  <link rel="stylesheet" href="../assets/css/animate.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/styles/style_s.php">





</head>

<body>

  <script>
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
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
          <li class="nav-item">





            <?php


            require('connect.php');





            if (isset($_COOKIE['admin'])) {

              $req = $bdd->query('SELECT * FROM demands');


              $req = $bdd->query('SELECT * FROM demands');

              $number_of_rows = $req->Rowcount();
              if ($number_of_rows == 0) {
                echo '<li class="nav-item">
                      <a class="nav-link" href="demande">DEMANDS</a>
                  </li>';
              } else {
                echo '<li class="nav-item">
                    <a style="color: rgb(248,72,56) !important;" class="nav-link" href="demande">DEMANDS<span style="background-color:rgb(248,72,56) !important;" class="badge rounded-circle bg-danger">' . $number_of_rows . '</st></a>
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
          <a style="color: rgba(248,72,56) !important;" class="nav-link" href="msg">REQUESTS<span style="background-color:rgb(248,72,56) !important;" class="badge rounded-circle bg-danger">' . $number_of_rows . '</span></a>
      </li>';
            }






            ?>







          </li>



          <?php
          $req = $bdd->query("select image from users where username='" . $_COOKIE['login'] . "'");


          $row = $req->fetch();

          if ($row['image'] == 'none') {
            $image_src = 'images/avatar.png';
          } else {
            $image_src = $row['image'];
          } ?>




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
                ?></button>
              <div id="myDropdown" class="dropdown-content">


                <?php
                if ($_COOKIE['mode'] == 'light') {

                  echo '<a href="#" id="change_the_mode"><i class="bi bi-moon"></i>dark mode</a>';
                } else {
                  echo '<a href="#" id="change_the_mode"><i class="bi bi-sun"></i>light mode</a>';
                }
                ?>
                <span class="devider2"></span>
                <a class="nav-link" href="my_profile_page"><i class="bi bi-person"></i>profile</a>
                <span class="devider2"></span>


                <a class="nav-link ww" href="stats"><i class="bi bi-graph-up"></i>
                  statistics</a>
                <span class="devider2"></span>
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




    <form action='settings2' id="mode_hidden_form" method="post">
      <input type="hidden" id="some_some" name="change_mode" required />

    </form>










    <form action='settings2' id="dis_form" method="post">
      <input type="hidden" id="disable" name="disable" required />
    </form>
    <form action='settings2' id="del_form" method="post">
      <input type="hidden" id="delete" name="delete" required />

    </form>



    <form action='settings2' id="del_grade_form" method="post">
      <input type="hidden" id="delete1" name="remove_grade" required />

    </form>

    <form action='settings2' id="del_dep_form" method="post">
      <input type="hidden" id="delete2" name="remove_dep" required />

    </form>

    <form action='settings2' id="del_spec_form" method="post">
      <input type="hidden" id="delete3" name="remove_special" required />
      <input type="hidden" id="delete4" name="remove_special2" required />

    </form>

    <form action='settings2' id="edit_modal" method="post">
      <input type="hidden" id="modal_hidden" name="modal_id" required />
    </form>








    <div class='select_pages'>
      <h3 id='u' class='pointer' onclick="openPage('users')" style='background-color:rgb(0,176,116) ;'>Users</h3>
      <h3 id='t' class='pointer' onclick="openPage('time')">Time</h3>
      <h3 id='e' class='pointer' onclick="openPage('extras')">Extras</h3>
    </div>

    <div id='users' class="table-box divdiv">

      <div class="table-row table-head">
        <div class="table-cell first-cell table-head-one">
          <a>User</a>
        </div>
        <div class="table-cell">
          <a>Email</a>
        </div>
        <div class="table-cell">
          <a>Type</a>
        </div>
        <div class="table-cell">
          <a>Grade</a>
        </div>
        <div class="table-cell">
          <a>Departement</a>
        </div>
        <div class="table-cell">
          <a>Status</a>
        </div>
        <div class="table-cell">
          <a>Settings</a>
        </div>


      </div>










      <?php

      require('connect.php');



      $req = $bdd->query('SELECT * from users where username NOT IN("' . $_COOKIE['login'] . '")');




      while ($result = $req->fetch()) {




        if ($result['image'] == 'none') {

          $image_src = 'images/avatar.png';
        } else {
          $image_src = $result['image'];
        }





        if ($result['status'] == 'active') {
          $style = ' padding-left: 12px;
padding-right: 12px;
padding-bottom: 3px;
padding-top: 3px;
border-radius: 15px 15px 15px 15px;
border: solid 2px rgb(0,176,116);
color: rgb(0,176,116) !important;
text-align: center;
background: rgb(0,176,116,0.25);

';
          $im = 'disable';
        } else {
          $style = 'padding-left: 12px;
padding-right: 12px;
padding-bottom: 3px;
padding-top: 3px;
border-radius: 15px 15px 15px 15px;
border: solid 2px rgb(248,72,56);
color: rgb(248,72,56) !important;
text-align: center;
background: rgb(248,72,56,0.25);

';
          $im = 'enable';
        }







        echo '

    <div class="table-row">
    <div class="table-cell first-cell">
    <a class="pp" > <img   style=" width: 40px;height: 40px;border-radius: 5px;margin-top:5px;" src="../assets/' . $image_src . '" /><br/>' . $result['username'] . '</a>
    </div>
    <div class="table-cell">
      <a class="pp" >' . $result['email'] . '</a>
    </div>
    <div class="table-cell">
      <a class="pp" >' . $result['type'] . '</a>
    </div>
    <div class="table-cell">
      <a class="pp" >' . $result['grade'] . '</a>
    </div>
    <div class="table-cell">
      <a class="pp" >' . $result['departement'] . '</a>
    </div>
    <div class="table-cell">
      <a class="pp" style="' . $style . '" >' . $result['status'] . '</a>
    </div>
    <div class="table-cell">
      
      <img id=' . $result['id'] . ' src="../assets/images/pen.svg" style="padding:5px;" class="p1">
      <img id=' . $result['id'] . ' src="../assets/images/' . $im . '.svg" style="padding:5px;"  class="p2">
      <img id=' . $result['id'] . ' src="../assets/images/trash2.svg"  style="padding:5px;" class="p3">
     
    </div>
    
  
    </div>';








        $req2 = $bdd->query('SELECT * from grades where grades NOT IN("' . $result['grade'] . '")');
        $req3 = $bdd->query('SELECT * from departements where departements NOT IN("' . $result['departement'] . '")');


        $var_grade = '';
        $var_dep = '';
        while ($result2 = $req2->fetch()) {
          $var_grade .= "<option value='" . $result2["grades"] . "'>" . $result2["grades"] . "</option>";
        }

        while ($result3 = $req3->fetch()) {
          $var_dep .= "<option value='" . $result3["departements"] . "'>" . $result3["departements"] . "</option>";
        }

        if ($result['type'] == 'admin') {
          $tpe = "teacher";
        } else {
          $tpe = "admin";
        }

        echo '
    
        <form style="display:none;" id="' . $result['id'] . 'ff"  action="settings2" class="grid1 kakakaka" method="post">
    
        <input type="hidden" name="edit_id_hidden"  value="' . $result['id'] . '"/>
    
     
    <div class="to_be_spaces">
    
    <select  name="grade_edit" id="" class="select5 ghgh">        
    <option  selected value="' . $result["grade"] . '">' . $result["grade"] . '</option>
    ' . $var_grade . '
    </select>     
    
    
   
    
    
    <select  name="dep_edit" id="" class="select5 ghgh">
    <option  selected value="' . $result["departement"] . '" >' . $result["departement"] . '</option>
    ' . $var_dep . '
    </select>   
    

    <select  name="type_edit" id="klklm" class="select5">
    <option  selected value=' . $result["type"] . ' >' . $result["type"] . '</option>
    <option value="teacher"  >' . $tpe . '</option>
    </select>     
    
   </div>

   <div class="frezghrtehrth">
    <input  type="submit" name="submit_edit" style="text-align:center;height:40px;float:right;  margin-bottom:15px;"  value="CONFIRM"  class="btn btn-secondary ">
    </div>

    
    </form>
  ';









        echo '
    <span class="devider"></span>
    
    
    
    
    ';
      }
      ?>
      <form style='display:none;' class='adadad' action='settings2' name='form_add' id="form_add" method="post">

        <h1 style='text-align:center; margin-bottom:40px'>Adding a new user</h1>


        <input class='text2 ' style='text-align-last:center;' type='text' name='fname' placeholder='First name' required>

        <input class='text2' style='text-align-last:center;' type='text' name='name' placeholder='Name' required>

        <input class='text2 ' style='text-align-last:center;' type='email' name='mail' placeholder='Email' required>

        <input class='text2' style='text-align-last:center;' type='text' name='pass' placeholder='Password' minlength="8" data-toggle="tooltip" data-placement="top" title="password must be 8 chars long" required>







        <select required style="text-align-last:center;" name="dep" class="select2">
          <option disabled selected value>Select Departement</option>
          <?php
          $req = $bdd->query('SELECT * FROM departements order by departements');
          while ($result = $req->fetch()) {
            $v = '<option value="' . $result['departements'] . '">' . $result['departements'] . '</option>';
            echo $v;
          }
          ?>
        </select>





        <select required style="text-align-last:center;" name="grade" class="select2">
          <option disabled selected value>Select Grade</option>
          <?php
          $req = $bdd->query('SELECT * FROM grades order by grades');
          while ($result = $req->fetch()) {
            $v = '<option value="' . $result['grades'] . '">' . $result['grades'] . '</option>';
            echo $v;
          }
          ?>
        </select>


        <div class='concon' style='width:40%;float:left;  margin-right:5%;
    margin-left:5%;'>
          <select required style="text-align-last:center;width:50%;margin-right:0% !important;
    margin-left:0% !important;" id="lifespan2" class="select2">
            <option disabled selected value>Lifespan Type</option>
            <option value="limited">limited</option>
            <option value="premanent">permanent</option>
          </select>


          <input style='width:50%;' required id='lifespan_date2' class='date space' name='exp_date' type='date' disabled>
        </div>






        <select required style="text-align-last:center;" name="type_pers" class="select2">
          <option disabled selected value>Select Type</option>
          <option value="teacher">Teacher</option>
          <option value="admin">Admin</option>

        </select>









        <input type="submit" name='submit2' style='width:90%;margin-left:5% !important;margin-right:5% !important;' id='confirm2' value='ADD' class="btn btn-secondary ">


      </form>
      <?php

      echo ' 
<div class="table-row last-row last-row_add">


<div class="table-cell ">
 <img  src="../assets/images/add.svg" style="padding:10px;"><a style="font-size: 18px;color:rgb(0,176,116) !important;" >Add a new user</a>
</div>



</div>';
      //require('disconnect.php');
      ?>

    </div>



    <div id='time' class="table-box divdiv">


      <h3 style="text-align:center;margin-top:80px;margin-bottom:20px" id='h3'>changing it will delete all reservations</h3>
      <form action='settings2' method="post">

        <div class="form-group">

          <select style="text-align-last:center;width:100%;" name="type" id="type_time" class="select">
            <option disabled selected value>select number of columns</option>
            <option value="1">1 column</option>
            <option value="2">2 column</option>
            <option value="3">3 column</option>
            <option value="4">4 column</option>
            <option value="5">5 column</option>
            <option value="6">6 column</option>
            <option value="7">7 column</option>
            <option value="8">8 column</option>
          </select>
        </div>

        <br /><br />
        <br />
        <label id='l1' style="display:none">period1:</label>
        <div id="div_time1" style="display:none">


          <input type="time" class='times hh' id="appt1" name="tt1" min="08:00" max="18:00" step="1800">
          <input type="time" class='times' id="appt2" name="tt2" min="08:00" max="18:00" step="1800">

          <br /><br />
        </div>
        <label id='l2' style="display:none">period2:</label>

        <div id="div_time2" style="display:none">


          <input type="time" class='times hh' id="appt3" name="tt3" min="08:00" max="18:00" step="1800">


          <input type="time" class='times' id="appt4" name="tt4" min="08:00" max="18:00" step="1800">
        </div>
        <label id='l3' style="display:none">period3:</label>

        <div id="div_time3" style="display:none">
          <br /><br />


          <input type="time" class='times hh' id="appt5" name="tt5" min="08:00" max="18:00" step="1800">


          <input type="time" class='times' id="appt6" name="tt6" min="08:00" max="18:00" step="1800">
        </div>
        <label id='l4' style="display:none">period4:</label>

        <div id="div_time4" style="display:none">

          <br /><br />

          <input type="time" class='times hh' id="appt7" name="tt7" min="08:00" max="18:00" step="1800">


          <input type="time" class='times' id="appt8" name="tt8" min="08:00" max="18:00" step="1800">
        </div>
        <label id='l5' style="display:none">period5:</label>

        <div id="div_time5" style="display:none">
          <br /><br />


          <input type="time" class='times hh' id="appt9" name="tt9" min="08:00" max="18:00" step="1800">


          <input type="time" class='times' id="appt10" name="tt10" min="08:00" max="18:00" step="1800">
        </div>
        <label id='l6' style="display:none">period6:</label>

        <div id="div_time6" style="display:none">

          <br /><br />

          <input type="time" class='times hh' id="appt11" name="tt11" min="08:00" max="18:00" step="1800">



          <input type="time" class='times' id="appt12" name="tt12" min="08:00" max="18:00" step="1800">
        </div>
        <label id='l7' style="display:none">period7:</label>

        <div id="div_time7" style="display:none">

          <br /><br />

          <input type="time" class='times hh' id="appt13" name="tt13" min="08:00" max="18:00" step="1800">



          <input type="time" class='times' id="appt14" name="tt14" min="08:00" max="18:00" step="1800">
        </div>
        <label id='l8' style="display:none">period8:</label>

        <div id="div_time8" style="display:none">
          <br /><br />


          <input type="time" class='times hh' id="appt15" name="tt15" min="08:00" max="18:00" step="1800">



          <input type="time" class='times' id="appt16" name="tt16" min="08:00" max="18:00" step="1800">
        </div>

        <br /><br />


        <input style='display:none !important;' type="submit" class='btn btn-secondary' id="sub" onclick="return confirm('pressing ok will delete all reservations');">



      </form>
    </div>

    <div id='extras' class="table-box divdiv">

      <div class='the_tables_container'>

        <div class='tables'>


          <div class="table-row table-head">
            <div class="table-cell first-cell table-head-one">
              <a>grade</a>
            </div>
            <div class="table-cell">
              <a>delete</a>
            </div>
          </div>




          <?php

          require('connect.php');



          $req = $bdd->query('SELECT * from grades');




          while ($result = $req->fetch()) {



            echo '

    <div class="table-row">
    <div class="table-cell first-cell">
    
    <a class="pp" >' . $result['grades'] . '</a>
    </div>
   
    
    <div class="table-cell">
      <img id="' . $result['grades'] . '" style="text-align: center !important"  src="../assets/images/trash3.svg"  style="padding:1px;" class="pp3 del_grade ">
     
    </div>
    
  
    </div>
    
    
    <span class="devider"></span>
    
    
    
    
    ';
          }


          echo ' 
<div class="table-row last-row last_row_grade">


<div class="table-cell ">
<a id="gg" style="font-size: 14px;color:rgb(0,176,116) !important;" > <img  src="../assets/images/add.svg" style="height:20px !important;width:20px !important; padding-right:5px;margin-bottom:2px;">add a new grade</a>
</div>



</div>';
          //require('disconnect.php');
          ?>
        </div>



        <div class='tables'>


          <div class="table-row table-head">
            <div class="table-cell first-cell table-head-one">
              <a>departement</a>
            </div>
            <div class="table-cell">
              <a>delete</a>
            </div>
          </div>




          <?php
          require('connect.php');



          $req = $bdd->query('SELECT * from departements');




          while ($result = $req->fetch()) {



            echo '

    <div class="table-row">
    <div class="table-cell first-cell">
    <a class="pp" >' . $result['departements'] . '</a>

    </div>
   
    
    <div class="table-cell">
      <img id="' . $result['departements'] . '" src="../assets/images/trash3.svg"  style="padding:1px;" class="pp3 del_dep ">
     
    </div>
    
  
    </div>
    
    
    <span class="devider"></span>
    
    
    
    
    ';
          }


          echo ' 
<div class="table-row last-row last_row_dep">


<div class="table-cell ">
<a id="dd" style="font-size: 14px;color:rgb(0,176,116) !important;" > <img  src="../assets/images/add.svg" style="height:20px !important;width:20px !important; padding-right:5px;margin-bottom:2px;">add a new departement</a>
</div>



</div>';
          //require('disconnect.php');
          ?>
        </div>


        <div class='tables'>


          <div class="table-row table-head">
            <div class="table-cell first-cell table-head-one">
              <a>special classes</a>
            </div>
            <div class="table-cell">
              <a>delete</a>
            </div>
          </div>




          <?php
          require('connect.php');



          $req = $bdd->query('SELECT * from rooms where special="special"');




          while ($result = $req->fetch()) {



            echo '

    <div class="table-row">
    <div class="table-cell first-cell">
    <a class="pp" >' . $result['room'] . " " . $result['indexes'] . '</a>

    </div>
   
    
 
    <div class="table-cell">
      <img id="' . $result['room'] . "/" . $result['indexes'] . '" src="../assets/images/trash3.svg"  style="padding:1px;" class="pp3 del_spec">
     
    </div>
    
  
    </div>
    
    
    <span class="devider"></span>
    
    
    
    
    ';
          }


          echo ' 
<div class="table-row last-row last_row_spec">


<div class="table-cell ">
<a id="ss" style="font-size: 14px;color:rgb(0,176,116) !important;" > <img style="height:20px !important;width:20px !important; padding-right:5px;margin-bottom:2px;"  src="../assets/images/add.svg" style="padding:10px;">add a new special class</a>
</div>



</div>';
          //require('disconnect.php');
          ?>
        </div>


      </div>



    </div>

  </div>


  <div id="myModal_grade" class="modal_grade">


    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modal-container row">
        <div class=" col-6">

          <form action='settings2' name='form_add' id="form_add" method="post">

            <h1>add a new grade</h1>


            <input class='text kkk' style='text-align-last:center;width:100%;margin-bottom:30px' type='text' name='added_grade' placeholder='grade' required>


            <input type="submit" name='s1' style='width:100%;' value='RESERVE' class="btn btn-secondary ">


          </form>
        </div>

      </div>

    </div>

  </div>


  <div id="myModal_dep" class="modal_dep">


    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modal-container row">
        <div class=" col-6">

          <form action='settings2' name='form_add' id="form_add" method="post">

            <h1>add a new departement</h1>


            <input class='text kkk' style='text-align-last:center;width:100%;margin-bottom:30px' type='text' name='added_dep' placeholder='dep name' required>


            <input type="submit" name='s2' style='width:100%;' value='RESERVE' class="btn btn-secondary ">


          </form>
        </div>

      </div>

    </div>

  </div>

  <div id="myModal_spec" class="modal_spec">


    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modal-container row">
        <div class=" col-6">

          <form action='settings2' name='form_add' id="form_add" method="post">

            <h1>add a new special classs</h1>



            <select style='text-align-last:center;width:100%;margin-bottom:30px' name="add_special" id="special" class='select kkk'>
              <option disabled selected value>select class</option>
              <?php
              $req = $bdd->query('SELECT * FROM rooms WHERE special="no"  order by room,indexes');
              while ($result = $req->fetch()) {
                echo $result['room'] . '|' . $result['indexes'];
                $v = '<option value="' . $result['room'] . '|' . $result['indexes'] . '">' . $result['room'] . '   ' . $result['indexes'] . '</option>';
                echo $v;
              }
              ?>
            </select>

            <input type="submit" name='s3' style='width:100%;' value='RESERVE' class="btn btn-secondary ">


          </form>
        </div>

      </div>

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
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
  <script src="../assets/js/bootstrap.js"></script>
  <script src="../assets/js/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/javascript3.js"></script>
</body>

</html>