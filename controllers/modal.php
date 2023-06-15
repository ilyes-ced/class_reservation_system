<?php
    require('../pages/connect.php');


    if($_POST['idddd'][0]=='c'){
        $rr=$bdd->query('SELECT * from reservations1 where users="'.$_COOKIE['login'].'" and cell="'.$_POST['idddd'].'" and datee="'.$_POST['date'].'"');
    }elseif($_POST['idddd'][0]=='b'){
        $rr=$bdd->query('SELECT * from reservations2 where users="'.$_COOKIE['login'].'" and box="'.$_POST['idddd'].'" and datee="'.$_POST['date'].'"');
    }elseif($_POST['idddd'][0]=='s'){
        $rr=$bdd->query('SELECT * from reservations3 where users="'.$_COOKIE['login'].'" and square="'.$_POST['idddd'].'" and datee="'.$_POST['date'].'"');
    }

    $rere=$rr->fetch();

    $fff=explode("-",$_POST["date"]);

        if($_COOKIE['mode']=='dark'){
            echo '
                <div class="up">
                <div style="height:20px;"  class="del_icon_container">
                <i class="bi bi-trash del_icon"></i>
                </div>
                <p  style="color:white" class="int" id="int1">date : '.$fff[2]."-".$fff[1]."-".$fff[0].'</p>
                <p style="color:white"  class="int" id="int2">class : '.$_POST['name'].'</p>
                </div>
                <span class="devider hhj"></div>
                <div class="below">
                <p style="color:white" class="dev">device 1 : '.$rere['device1'].'</p>
                <p style="color:white"  class="dev">device 2 : '.$rere['device2'].'</p>
                <p style="color:white"  class="dev">device 3 : '.$rere['device3'].'</p>
                <p style="color:white"  class="dev">device 4 : '.$rere['device4'].'</p>
                </div>  
                <script>


            ';

        }else{
            echo '
                <div class="up">
                <div style="height:20px;" class="del_icon_container">
                <i class="bi bi-trash del_icon"></i>
                </div>
                <p  style="color:black" class="int" id="int1">date : '.$fff[2]."-".$fff[1]."-".$fff[0].'</p>
                <p style="color:black"  class="int" id="int2">class : '.$_POST['name'].'</p>
                </div>
                <span class="devider hhj"></div>
                <div class="below">
                <p style="color:black" class="dev">device 1 : '.$rere['device1'].'</p>
                <p style="color:black"  class="dev">device 2 : '.$rere['device2'].'</p>
                <p style="color:black"  class="dev">device 3 : '.$rere['device3'].'</p>
                <p style="color:black"  class="dev">device 4 : '.$rere['device4'].'</p>
                </div>  
                <script>
            ';  

    }



?>