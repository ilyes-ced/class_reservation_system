<?php
require('../pages/connect.php');



$arrow='';



$output='';







if(isset($_POST['ab'])){
  $d1 = $_POST['ab'];
  $d1 = date('Y-m-d', strtotime($d1));
  $d2 = date('Y-m-d', strtotime($d1 . ' +1 day'));
  $d3 = date('Y-m-d', strtotime($d1 . ' +2 day'));
  $d4 = date('Y-m-d', strtotime($d1 . ' +3 day'));
  $d5 = date('Y-m-d', strtotime($d1 . ' +4 day'));
  $d6 = date('Y-m-d', strtotime($d1 . ' +5 day'));
  $d7 = date('Y-m-d', strtotime($d1 . ' +6 day'));

}



$req = $bdd->query("SELECT * FROM time");
$result = $req->fetch();



if($result['number_of_periods']>=1){
$row1='<div class="table-row "><div class="table-cell">
<a>'.$result['period1'].'</a>
</div>';}

if($result['number_of_periods']>=2){
$row2='<div class="table-row "><div class="table-cell">
<a>'.$result['period2'].'</a>
</div>';}

if($result['number_of_periods']>=3){
$row3='<div class="table-row "><div class="table-cell">
<a>'.$result['period3'].'</a>
</div>';}

if($result['number_of_periods']>=4){
$row4='<div class="table-row "><div class="table-cell">
<a>'.$result['period4'].'</a>
</div>';}

if($result['number_of_periods']>=5){
$row5='<div class="table-row "><div class="table-cell">
<a>'.$result['period5'].'</a>
</div>';}

if($result['number_of_periods']>=6){
$row6='<div class="table-row "><div class="table-cell">
<a>'.$result['period6'].'</a>
</div>';}

if($result['number_of_periods']>=7){
$row7='<div class="table-row "><div class="table-cell">
<a>'.$result['period7'].'</a>
</div>';}

if($result['number_of_periods']>=8){
$row8='<div class="table-row "><div class="table-cell">
<a>'.$result['period8'].'</a>
</div>';}





$res1 = $bdd->query("SELECT * FROM reservations1 where users='".$_COOKIE['login']."'and datee='".$d1."' union SELECT * FROM reservations2 where users='".$_COOKIE['login']."'and datee='".$d1."' union SELECT * FROM reservations3 where users='".$_COOKIE['login']."'and datee='".$d1."'");
$res2 = $bdd->query("SELECT * FROM reservations1 where users='".$_COOKIE['login']."'and datee='".$d2."' union SELECT * FROM reservations2 where users='".$_COOKIE['login']."'and datee='".$d2."' union SELECT * FROM reservations3 where users='".$_COOKIE['login']."'and datee='".$d2."'");
$res3 = $bdd->query("SELECT * FROM reservations1 where users='".$_COOKIE['login']."'and datee='".$d3."' union SELECT * FROM reservations2 where users='".$_COOKIE['login']."'and datee='".$d3."' union SELECT * FROM reservations3 where users='".$_COOKIE['login']."'and datee='".$d3."'");
$res4 = $bdd->query("SELECT * FROM reservations1 where users='".$_COOKIE['login']."'and datee='".$d4."' union SELECT * FROM reservations2 where users='".$_COOKIE['login']."'and datee='".$d4."' union SELECT * FROM reservations3 where users='".$_COOKIE['login']."'and datee='".$d4."'");
$res5 = $bdd->query("SELECT * FROM reservations1 where users='".$_COOKIE['login']."'and datee='".$d5."' union SELECT * FROM reservations2 where users='".$_COOKIE['login']."'and datee='".$d5."' union SELECT * FROM reservations3 where users='".$_COOKIE['login']."'and datee='".$d5."'");
$res6 = $bdd->query("SELECT * FROM reservations1 where users='".$_COOKIE['login']."'and datee='".$d6."' union SELECT * FROM reservations2 where users='".$_COOKIE['login']."'and datee='".$d6."' union SELECT * FROM reservations3 where users='".$_COOKIE['login']."'and datee='".$d6."'");
$res7 = $bdd->query("SELECT * FROM reservations1 where users='".$_COOKIE['login']."'and datee='".$d7."' union SELECT * FROM reservations2 where users='".$_COOKIE['login']."'and datee='".$d7."' union SELECT * FROM reservations3 where users='".$_COOKIE['login']."'and datee='".$d7."'");

$array1=array();
$array2=array();
$array3=array();
$array4=array();
$array5=array();
$array6=array();
$array7=array();

$ar1=array();
$ar2=array();
$ar3=array();
$ar4=array();
$ar5=array();
$ar6=array();
$ar7=array();


  

while($f1=$res1->fetch()){

  if(isset($f1['cell'])){
  $cell= $f1['cell'];
  }
  if(isset($f1['box'])){
  $cell= $f1['box'];
  }
  if(isset($f1['square'])){
  $cell= $f1['square'];
  }

  $ind= (int) filter_var($cell, FILTER_SANITIZE_NUMBER_INT);  
  if($ind%$result['number_of_periods']==0){
    $time=$result['period'.$result['number_of_periods']];
  }else{ 
    $time=$result['period'.$ind%$result['number_of_periods']];
  } 

  array_push($array1,$time);
  array_push($ar1,$cell);
}
while($f2=$res2->fetch()){
  


  $cell=$f2['cell'];

  $ind= (int) filter_var($cell, FILTER_SANITIZE_NUMBER_INT);  
  if($ind%$result['number_of_periods']==0){
    $time=$result['period'.$result['number_of_periods']];
  }else{ 
    $time=$result['period'.$ind%$result['number_of_periods']];
  } 

  array_push($array2,$time);
  array_push($ar2,$cell);
}
while($f3=$res3->fetch()){
  


  $cell=$f3['cell'];

  $ind= (int) filter_var($cell, FILTER_SANITIZE_NUMBER_INT);  
  if($ind%$result['number_of_periods']==0){
    $time=$result['period'.$result['number_of_periods']];
  }else{ 
    $time=$result['period'.$ind%$result['number_of_periods']];
  } 

  array_push($array3,$time);
  array_push($ar3,$cell);
}
while($f4=$res4->fetch()){
  


  $cell=$f4['cell'];

  $ind= (int) filter_var($cell, FILTER_SANITIZE_NUMBER_INT);  
  if($ind%$result['number_of_periods']==0){
    $time=$result['period'.$result['number_of_periods']];
  }else{ 
    $time=$result['period'.$ind%$result['number_of_periods']];
  } 

  array_push($array4,$time);
  array_push($ar4,$cell);
}
while($f5=$res5->fetch()){
  


  $cell=$f5['cell'];

  $ind= (int) filter_var($cell, FILTER_SANITIZE_NUMBER_INT);  
  if($ind%$result['number_of_periods']==0){
    $time=$result['period'.$result['number_of_periods']];
  }else{ 
    $time=$result['period'.$ind%$result['number_of_periods']];
  } 

  array_push($array5,$time);
  array_push($ar5,$cell);
}
while($f6=$res6->fetch()){
  


  $cell=$f6['cell'];

  $ind= (int) filter_var($cell, FILTER_SANITIZE_NUMBER_INT);  
  if($ind%$result['number_of_periods']==0){
    $time=$result['period'.$result['number_of_periods']];
  }else{ 
    $time=$result['period'.$ind%$result['number_of_periods']];
  } 

  array_push($array6,$time);
  array_push($ar6,$cell);
}
while($f7=$res7->fetch()){
  


  $cell=$f7['cell'];

  $ind= (int) filter_var($cell, FILTER_SANITIZE_NUMBER_INT);  
  if($ind%$result['number_of_periods']==0){
    $time=$result['period'.$result['number_of_periods']];
  }else{ 
    $time=$result['period'.$ind%$result['number_of_periods']];
  } 

  array_push($array7,$time);
  array_push($ar7,$cell);
}




function fa($array1,$ar1){
  global $result;
  global $row1;
  global $row2;
  global $row3;
  global $row4;
  global $row5;
  global $row6;
  global $row7;
  global $row8;
  global $time;

  if(count($array1)==0){
    if($result['number_of_periods']>=1){
    $row1.='<div class="table-cell empt">
        <a ></a>
        </div>';}
  if($result['number_of_periods']>=2){
  $row2.='<div class="table-cell empt">
        <a ></a>
        </div>';}
  if($result['number_of_periods']>=3){
  $row3.='<div class="table-cell empt">
        <a ></a>
        </div>';}
  if($result['number_of_periods']>=4){
  $row4.='<div class="table-cell empt">
        <a ></a>
        </div>';}
  if($result['number_of_periods']>=5){
  $row5.='<div class="table-cell empt">
        <a ></a>
        </div>';}
  if($result['number_of_periods']>=6){
  $row6.='<div class="table-cell empt">
        <a ></a>
        </div>';}
  if($result['number_of_periods']>=7){
  $row7.='<div class="table-cell empt">
        <a ></a>
        </div>';}
  if($result['number_of_periods']>=8){
  $row8.='<div class="table-cell empt">
        <a ></a>
        </div>';}
        
  }
for($i=0;$i<count($array1);$i++){

 
 



   


  if($result['number_of_periods']>=1){
  if(in_array($result['period1'],$array1)){

  $index = array_search($result['period1'],$array1);
  $id=$c=$ar1[$index];
  $ind= (int) filter_var($c, FILTER_SANITIZE_NUMBER_INT);  
  if($c[0]=='c'){
    $c='AMPHI '.ceil(($ind/$result['number_of_periods']));
  }elseif($c[0]=='b'){
    $c='TD '.ceil(($ind/$result['number_of_periods']));
  }elseif($c[0]=='s'){
    $c='TP '.ceil(($ind/$result['number_of_periods']));
  }
  if($index !== FALSE){
    unset($array1[$index]);
    unset($ar1[$index]);
  }

  $row1.='<div class="table-cell" id="'.$c[1].'">
    <a id="'.$id.'">'.$c.'</a>
    </div>';
  }else{
      $row1.='<div class="table-cell empt">
      <a ></a>
      </div>';
  }
  }



  if($result['number_of_periods']>=2){
  if(in_array($result['period2'],$array1)){
  $index = array_search($result['period2'],$array1);
  $id=$c=$ar1[$index];
   $ind= (int) filter_var($c, FILTER_SANITIZE_NUMBER_INT);  
  if($c[0]=='c'){
    $c='AMPHI '.ceil(($ind/$result['number_of_periods']));
  }elseif($c[0]=='b'){
    $c='TD '.ceil(($ind/$result['number_of_periods']));
  }elseif($c[0]=='s'){
    $c='TP '.ceil(($ind/$result['number_of_periods']));
  }
  if($index !== FALSE){
    unset($array1[$index]);
  }
    $row2.='<div class="table-cell" id="'.$c[1].'">
      <a id="'.$id.'">'.$c.'</a>
      </div>';
  }else{
        $row2.='<div class="table-cell empt">
        <a ></a>
        </div>';
  }
  }





  if($result['number_of_periods']>=3){
  if(in_array($result['period3'],$array1)){
    $index = array_search($result['period3'],$array1);
    $id=$c=$ar1[$index];
    $ind= (int) filter_var($c, FILTER_SANITIZE_NUMBER_INT);  
    if($c[0]=='c'){
      $c='AMPHI '.ceil(($ind/$result['number_of_periods']));
    }elseif($c[0]=='b'){
      $c='TD '.ceil(($ind/$result['number_of_periods']));
    }elseif($c[0]=='s'){
      $c='TP '.ceil(($ind/$result['number_of_periods']));
    }
    if($index !== FALSE){
      unset($array1[$index]);
      unset($ar1[$index]);
  }
    $row3.='<div class="table-cell" id="'.$c[1].'">
      <a id="'.$id.'">'.$c.'</a>
      </div>';
  }else{
        $row3.='<div class="table-cell empt">
        <a ></a>
        </div>';
  }
  }




  if($result['number_of_periods']>=4){
  if(in_array($result['period4'],$array1)){
      $index = array_search($result['period4'],$array1);
      $id=$c=$ar1[$index];
      $ind= (int) filter_var($c, FILTER_SANITIZE_NUMBER_INT);  
      if($c[0]=='c'){
        $c='AMPHI '.ceil(($ind/$result['number_of_periods']));
      }elseif($c[0]=='b'){
        $c='TD '.ceil(($ind/$result['number_of_periods']));
      }elseif($c[0]=='s'){
        $c='TP '.ceil(($ind/$result['number_of_periods']));
      }
  if($index !== FALSE){
    unset($array1[$index]);
    unset($ar1[$index]);
  }
    $row4.='<div class="table-cell" id="'.$c[1].'">
      <a id="'.$id.'">'.$c.'</a>
      </div>';
  }else{
        $row4.='<div class="table-cell empt">
        <a ></a>
        </div>';
  } 
  }




  
  if($result['number_of_periods']>=5){
  if(in_array($result['period5'],$array1)){
      $index = array_search($result['period5'],$array1);
      $id=$c=$ar1[$index];
      $ind= (int) filter_var($c, FILTER_SANITIZE_NUMBER_INT);  
      if($c[0]=='c'){
        $c='AMPHI '.ceil(($ind/$result['number_of_periods']));
      }elseif($c[0]=='b'){
        $c='TD '.ceil(($ind/$result['number_of_periods']));
      }elseif($c[0]=='s'){
        $c='TP '.ceil(($ind/$result['number_of_periods']));
      }
  if($index !== FALSE){
    unset($array1[$index]);unset($ar1[$index]);
  }
    $row5.='<div class="table-cell" id="'.$c[1].'">
      <a id="'.$id.'">'.$c.'</a>
      </div>';
  }else{
        $row5.='<div class="table-cell empt">
        <a ></a>
        </div>';
  }
  }






  if($result['number_of_periods']>=6){
  if(in_array($result['period6'],$array1)){
      $index = array_search($result['period6'],$array1);
      $id=$c=$ar1[$index];
      $ind= (int) filter_var($c, FILTER_SANITIZE_NUMBER_INT);  
      if($c[0]=='c'){
        $c='AMPHI '.ceil(($ind/$result['number_of_periods']));
      }elseif($c[0]=='b'){
        $c='TD '.ceil(($ind/$result['number_of_periods']));
      }elseif($c[0]=='s'){
        $c='TP '.ceil(($ind/$result['number_of_periods']));
      }
  if($index !== FALSE){
    unset($array1[$index]);unset($ar1[$index]);
  }
    $row6.='<div class="table-cell" id="'.$c[1].'">
      <a id="'.$id.'">'.$c.'</a>
      </div>';
  }else{
        $row6.='<div class="table-cell empt">
        <a ></a>
        </div>';
  }
  }






  if($result['number_of_periods']>=7){
  if(in_array($result['period7'],$array1)){
      $index = array_search($result['period7'],$array1);
      $id=$c=$ar1[$index];
      $ind= (int) filter_var($c, FILTER_SANITIZE_NUMBER_INT);  
      if($c[0]=='c'){
        $c='AMPHI '.ceil(($ind/$result['number_of_periods']));
      }elseif($c[0]=='b'){
        $c='TD '.ceil(($ind/$result['number_of_periods']));
      }elseif($c[0]=='s'){
        $c='TP '.ceil(($ind/$result['number_of_periods']));
      }
  if($index !== FALSE){
    unset($array1[$index]);unset($ar1[$index]);
  }
    $row7.='<div class="table-cell" id="'.$c[1].'">
      <a id="'.$id.'">'.$c.'</a>
      </div>';
  }else{
        $row7.='<div class="table-cell empt">
        <a ></a>
        </div>';
  }
  }






  
  if($result['number_of_periods']>=8){
  if(in_array($result['period8'],$array1)){
      $index = array_search($result['period8'],$array1);
      $id=$c=$ar1[$index];
      $ind= (int) filter_var($c, FILTER_SANITIZE_NUMBER_INT);  
      if($c[0]=='c'){
        $c='AMPHI '.ceil(($ind/$result['number_of_periods']));
      }elseif($c[0]=='b'){
        $c='TD '.ceil(($ind/$result['number_of_periods']));
      }elseif($c[0]=='s'){
        $c='TP '.ceil(($ind/$result['number_of_periods']));
      }
  if($index !== FALSE){
    unset($array1[$index]);unset($ar1[$index]);
  }
    $row8.='<div class="table-cell" id="'.$c[1].'">
      <a id="'.$id.'">'.$c.'</a>
      </div>';
  }else{
        $row8.='<div class="table-cell empt">
        <a ></a>
        </div>';
  }
  }



}



}


fa($array1,$ar1);
fa($array2,$ar2);
fa($array3,$ar3);
fa($array4,$ar4);
fa($array5,$ar5);
fa($array6,$ar6);
fa($array7,$ar7);






$row1.='</div>';
$row2.='</div>';
$row3.='</div>';
$row4.='</div>';
$row5.='</div>';
$row6.='</div>';
$row7.='</div>';
$row8.='</div>';

$output.="".$row1;
$output.=$row2;
$output.=$row3;
$output.=$row4;
$output.=$row5;
$output.=$row6;
$output.=$row7;
$output.=$row8;
echo $output;


?>