<?php

  session_start();
  $username = $_SESSION['login_user'];
  $data = json_decode($_POST['data']);
  // SQL Insert Query of the data.
  include_once '../external/connect_db.php';
  $sql = "REPLACE INTO user_data (username, timestampMs, latitudeE7, longitudeE7, activity) values";
  for( $index = 0; $index < sizeof($data) ; $index++ ){
    $timestampMs = $data[$index][0];
    $latitudeE7 = $data[$index][1];
    $longitudeE7 = $data[$index][2];
    $activity = $data[$index][3];
    $sql = $sql."('$username','$timestampMs',$latitudeE7,$longitudeE7,'$activity'),";
}
$sql = substr($sql, 0, -1);
$sql = $sql.";";
if (mysqli_query($conn, $sql)) {
 echo "Markers saved successfully";
} else {
 echo "Error: " . mysqli_error($conn);
}

   $countf= 0;
   $countv= 0;
   $sql = "REPLACE INTO user_score (username,score,score_date) values";
   $timestampMs = $data[0][0];
   $seconds = $timestampMs/ 1000;
   $tmp= date("Y-m-00", $seconds);
   for( $i = 0 ; $i < sizeof($data); $i++ ){
     $activity = $data[$i][3];
     $timestampMs = $data[$i][0];
     $seconds = $timestampMs/ 1000;
     $dt= date("Y-m-00", $seconds);
     if ($tmp != $dt){
       $countf = 0;
       $countv = 0; }
     if ($activity == 'ON_FOOT' || $activity == 'WALKING' || $activity == 'ON_BICYCLE' || $activity == 'RUNNING' ) {
        $countf = $countf + 1; }
      if ($activity == 'IN_VEHICLE' || $activity == 'IN_RAIL_VEHICLE') {
        $countv = $countv+ 1; }
         $tmp =$dt;
    if ($countf==0 && $countv==0) {
    $score = 0 ;   }
    else {
    $score=($countf/($countf+ $countv))*100; }
     $sql = $sql."('$username','$score','$dt'),";  }

     $sql = substr($sql, 0, -1);
     $sql = $sql.";";
     if (mysqli_query($conn, $sql)) {
      echo "\nScore updated successfully";
     } else {
      echo "Error: " . mysqli_error($conn);
     }

     $query = "SELECT MIN(score_date) AS min , MAX(score_date) AS max FROM user_score";
     $result = mysqli_query($conn, $query);
     $result = mysqli_fetch_row($result);
     $min = $result[0];
     $max = $result[1];

     $upload_date = new DateTime("now", new DateTimeZone('Europe/Bucharest') );
     $upload_date= $upload_date->format('Y-m-d H:i:s');
  
     $sql = "REPLACE INTO upload (username,upload_date) values";
     $sql = $sql."('$username','$upload_date'),";
     $sql = substr($sql, 0, -1);
     $sql = $sql.";";
     if (mysqli_query($conn, $sql)) {
       echo "\nUpload date: $upload_date ";
     } else {
      echo "Error: " . mysqli_error($conn);
     }

?>
